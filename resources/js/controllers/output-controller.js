import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'input' ];

    connect() {
        this.terminal[this.input] = () => this.terminal.write(this.element.outerHTML)
    }

    get input() {
        return this.inputTarget.value;
    }
}
