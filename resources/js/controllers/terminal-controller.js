import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'inputField', 'input', 'outputContainer', 'output' ];

    // Actions

    execute(event) {
        event.preventDefault();

        const input = event.type == 'click'
            ? event.currentTarget.dataset.terminalInput
            : this.inputFieldTarget.value;

        if (input.length === 0) return;

        if (this[input]) {
            return this[input](event);
        }

        return this.axios.get(`commands/${input}`)
            .then((output) => {
                this[input] = () => this.write(output);
                this.write(output);
            });
    }

    listenToKeys(event) {
        if (event.key == '/') this.focus(event);
        if (event.key == 'ArrowUp') this.previousInput(event);
        if (event.key == 'ArrowDown') this.nextInput(event);
        if (event.key == 'Enter') this.execute(event)
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
        this.inputFieldTarget.value = this.previousInputText;
    }

    nextInput(event) {
        event.preventDefault();
        this.inputFieldTarget.value = this.nextInputText;
    }

    write(output) {
        this.outputContainerTarget.insertAdjacentHTML('beforeend', output);
        this.inputFieldTarget.value = '';
        this.lastOutput.scrollIntoView();
    }

    get lastOutput() {
        return this.outputTargets[this.outputTargets.length-1];
    }

    get previousInputText() {
        const intendedIndex = this.selectedInput - 1;

        if (this.selectedInput == undefined || !this.inputTargets.hasOwnProperty(intendedIndex)) {
            this.selectedInput = this.inputTargets.length - 1;
        } else {
            this.selectedInput = intendedIndex;
        }

        return this.inputTargets[this.selectedInput].value;
    }

    get nextInputText() {
        const intendedIndex = this.selectedInput + 1;

        if (this.selectedInput == undefined || !this.inputTargets.hasOwnProperty(intendedIndex)) {
            this.selectedInput = 0;
        } else {
            this.selectedInput = intendedIndex;
        }

        return this.inputTargets[this.selectedInput].value;
    }
}
