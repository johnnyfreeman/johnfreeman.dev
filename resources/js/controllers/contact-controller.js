import { Controller } from 'stimulus';
import Api from '../api';
import morphdom from 'morphdom';

export default class extends Controller {
    static targets = [ 'form', 'submit' ];

    connect() {
        this.terminalController = this.application.getControllerForElementAndIdentifier(document.body, 'terminal');
    }

    submit(e) {
        e.preventDefault();

        this.submitTarget.innerHTML = 'sending';

        return Api.post(`contact`, new FormData(this.formTarget)).then((response) => {
            return response.data;
        }).then((output) => {
            morphdom(this.element, output);
        }).catch((e) => {
            // console.log(e, e.response);
            this.terminalController.write(e.message);
        });
    }
}
