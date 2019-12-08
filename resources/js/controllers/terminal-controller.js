import { Controller } from 'stimulus';
import Api from '../api';

export default class extends Controller {
    static targets = [ 'input', 'output' ];

    connect() {
        window.terminal = this;
    }

    // Actions

    execute(event) {
        event.preventDefault();

        const input = event.type == 'click'
            ? event.currentTarget.dataset.terminalInput
            : this.inputTarget.value;

        if (this[input]) {
            return this[input](event);
        }

        return Api.get(`commands/${input}`)
            .then(this.write.bind(this));
    }

    focusIfForwardSlash(event) {
        if (event.key == '/') this.focus(event);
    }

    focus(event) {
        event.preventDefault();
        this.inputTarget.focus();
    }

    clear(event) {
        if (event) event.preventDefault();

        this.outputTarget.innerHTML = '';
        this.inputTarget.value = '';
    }

    // Private

    write(output) {
        this.outputTarget.insertAdjacentHTML('beforeend', output);
        this.inputTarget.value = '';
        this.lastOutput.scrollIntoView();
    }

    get lastOutput() {
        return this.outputTarget.lastElementChild;
    }
}
