import { Controller } from 'stimulus';
import Api from '../api';

export default class extends Controller {
    static targets = [ 'form', 'submit' ];

    connect() {
        this.submitHTML = this.submitTarget.innerHTML;
    }

    // Actions

    submit(e) {
        e.preventDefault();
        this.submitTarget.innerHTML = 'sending';
        return Api.post(`contact`, new FormData(this.formTarget))
            .then(output => window.terminal.write(output))
            .finally(this.replaceSubmitHTML.bind(this));
    }

    // Private

    replaceSubmitHTML() {
        this.submitTarget.innerHTML = this.submitHTML;
    }
}
