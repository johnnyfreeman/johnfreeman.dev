import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'form', 'submit' ];

    connect() {
        this.submitHTML = this.submitTarget.innerHTML;
    }

    // Actions

    submit(e) {
        e.preventDefault();
        this.submitTarget.innerHTML = 'sending';
        return this.api.post(`contact`, new FormData(this.formTarget))
            .then(output => this.terminal.write(output))
            .finally(this.replaceSubmitHTML.bind(this));
    }

    // Private

    replaceSubmitHTML() {
        this.submitTarget.innerHTML = this.submitHTML;
    }
}
