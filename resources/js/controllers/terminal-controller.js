import { Controller } from 'stimulus';

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

        return axios(`api/${input}`).then((response) => {
            return response.data;
        }).then(this.render.bind(this));
    }

    render(output) {
        this.outputTarget.innerHTML += output;
        this.inputTarget.value = '';
        this.inputTarget.focus();
        window.scrollTo(0,document.body.scrollHeight);
    }

    clear(e) {
        if (e) e.preventDefault();

        axios('api/clear').then((response) => {
            return response.data;
        }).then((output) => {
            this.outputTarget.innerHTML = output;
            this.inputTarget.value = '';
            this.inputTarget.focus();
            window.scrollTo(0,document.body.scrollHeight);
        });
    }
}
