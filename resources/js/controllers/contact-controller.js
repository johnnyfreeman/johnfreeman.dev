import { Controller } from 'stimulus';
import axios from 'axios';
import morphdom from 'morphdom';

export default class extends Controller {
    static targets = [ 'form', 'submit' ];

    initialize() {
        this.api = axios.create({
            headers: {
                'Accept': 'text/html, */*',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            }
        });
    }

    connect() {
        this.terminalController = this.application.getControllerForElementAndIdentifier(document.body, 'terminal');
    }

    submit(e) {
        e.preventDefault();

        this.submitTarget.innerHTML = 'sending';

        return this.api.post(`contact`, new FormData(this.formTarget)).then((response) => {
            return response.data;
        }).then((output) => {
            morphdom(this.element, output);
        }).catch((e) => {
            // console.log(e, e.response);
            this.terminalController.write(e.message);
        });
    }
}
