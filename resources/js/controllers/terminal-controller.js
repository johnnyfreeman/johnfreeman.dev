import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'inputField', 'input', 'outputContainer', 'output' ];

    connect() {
        this.updateOnlineStatus = this.updateOnlineStatus.bind(this);
        window.addEventListener('online',  this.updateOnlineStatus);
        window.addEventListener('offline', this.updateOnlineStatus);
    }

    disconnect() {
        window.removeEventListener('online',  this.updateOnlineStatus);
        window.removeEventListener('offline', this.updateOnlineStatus);
    }

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
        if (event.key == 'Enter') this.execute(event);
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

    updateOnlineStatus(event) {
        this.write(navigator.onLine
            ? `<div class="mt-8 bg-green-400 text-white p-3 rounded-lg" data-target="terminal.output">You are back online</div>`
            : `<div class="mt-8 bg-red-400 text-white p-3 rounded-lg" data-target="terminal.output">You are now offline</div>`
        );
    }

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

        return this.inputTargets[this.selectedInput].innerText;
    }

    get nextInputText() {
        const intendedIndex = this.selectedInput + 1;

        if (this.selectedInput == undefined || !this.inputTargets.hasOwnProperty(intendedIndex)) {
            this.selectedInput = 0;
        } else {
            this.selectedInput = intendedIndex;
        }

        return this.inputTargets[this.selectedInput].innerText;
    }
}
