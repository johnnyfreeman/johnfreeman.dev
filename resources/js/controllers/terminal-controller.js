import { Controller } from 'stimulus';
import axios from 'axios';

export default class extends Controller {
    static targets = [ 'input', 'output' ];

    initialize() {
        this.api = axios.create({
            headers: {
                'Accept': 'text/html, */*',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            }
        });
    }

    execute(e) {
        e.preventDefault();

        const input = e.type == 'click'
            ? e.currentTarget.dataset.terminalInput
            : this.inputTarget.value;

        if (this[input]) {
            return this[input](e);
        }

        return this.api(`partials/${input}`).then((response) => {
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

        return this.api('partials/clear').then((response) => {
            return response.data;
        }).then((output) => {
            this.outputTarget.innerHTML = output;
            this.inputTarget.value = '';
            window.scrollTo(0,document.body.scrollHeight);
        });
    }

    focus(e) {
        if (e.key == '/') {
            e.preventDefault();
            this.inputTarget.focus();
        }
    }
}
