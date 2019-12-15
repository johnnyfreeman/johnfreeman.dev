import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'inputField', 'input', 'outputContainer', 'output' ];

    // Actions

    execute(event) {
        event.preventDefault();

        const input = event.type == 'click'
            ? event.currentTarget.dataset.terminalInput
            : this.inputFieldTarget.value;

        if (this[input]) {
            return this[input](event);
        }

        return this.api.get(`commands/${input}`)
            .then(this.write.bind(this));
    }

    listenToKeys(event) {
        if (event.key == '/') this.focus(event);
        if (event.key == 'ArrowUp') this.previousInput(event);
        if (event.key == 'ArrowDown') this.nextInput(event);
    }

    focus(event) {
        event.preventDefault();
        this.inputFieldTarget.focus();
    }

    clear(event) {
        if (event) event.preventDefault();

        this.outputContainerTarget.innerHTML = '';
        this.inputFieldTarget.value = '';
    }

    // Private

    previousInput(event) {
        event.preventDefault();

        if (!this.inputTargets[this.selectedInput]) {
            this.selectedInput = this.inputTargets.length - 1;
        } else {
            this.selectedInput -= 1;
        }

        this.inputFieldTarget.value = this.selectedInputText;
    }

    nextInput(event) {
        event.preventDefault();

        if (!this.inputTargets[this.selectedInput]) {
            this.selectedInput = 0;
        } else {
            this.selectedInput += 1;
        }

        this.inputFieldTarget.value = this.selectedInputText;
    }

    write(output) {
        this.outputContainerTarget.insertAdjacentHTML('beforeend', output);
        this.inputFieldTarget.value = '';
        this.lastOutput.scrollIntoView();
    }

    get lastOutput() {
        return this.outputTargets[this.outputTargets.length-1];
    }

    get selectedInputText() {
        return this.inputTargets[this.selectedInput].innerText;
    }
}
