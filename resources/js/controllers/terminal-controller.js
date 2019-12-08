import { Controller } from 'stimulus';
import Api from '../api';

export default class extends Controller {
    static targets = [ 'input', 'output' ];

    execute(e) {
        e.preventDefault();

        const input = e.type == 'click'
            ? e.currentTarget.dataset.terminalInput
            : this.inputTarget.value;

        if (this[input]) {
            return this[input](e);
        }

        return Api.get(`partials/${input}`).then((response) => {
            return response.data;
        }).then(this.write.bind(this));
    }

    write(output) {
        this.outputTarget.insertAdjacentHTML('beforeend', output);
        this.inputTarget.value = '';
        window.scrollTo(0,document.body.scrollHeight);
    }

    clear(e) {
        if (e) e.preventDefault();

        this.outputTarget.innerHTML = '';
        this.inputTarget.value = '';
        window.scrollTo(0,document.body.scrollHeight);
    }

    focus(e) {
        if (e.key == '/') {
            e.preventDefault();
            this.inputTarget.focus();
        }
    }
}
