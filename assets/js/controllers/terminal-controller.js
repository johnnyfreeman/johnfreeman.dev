import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static targets = [ 'inputField', 'history', 'outputContainer', 'output' ]

    // Actions

    listenToKeys(event) {
        const terminalHasFocus = document.activeElement === this.element
        const inputFieldHasFocus = document.activeElement === this.inputFieldTarget
        if (event.key == '/' && terminalHasFocus) this.focus(event)
        if (event.key == 'ArrowUp' && (terminalHasFocus || inputFieldHasFocus)) this.previousInput(event)
        if (event.key == 'ArrowDown' && (terminalHasFocus || inputFieldHasFocus)) this.nextInput(event)
    }

    focus(event) {
        event.preventDefault()
        this.inputFieldTarget.focus()
    }

    clear(event) {
        this.inputFieldTarget.value = ''
    }

    // Private

    previousInput(event) {
        event.preventDefault()
        this.inputFieldTarget.value = this.previousInputText
    }

    nextInput(event) {
        event.preventDefault()
        this.inputFieldTarget.value = this.nextInputText
    }

    scrollToLastOutput() {
        this.lastOutput?.scrollIntoView()
    }

    get lastOutput() {
        return this.outputTargets[this.outputTargets.length-1]
    }

    get previousInputText() {
        const intendedIndex = this.selectedInput - 1

        if (this.selectedInput == undefined || !this.historyTargets.hasOwnProperty(intendedIndex)) {
            this.selectedInput = this.historyTargets.length - 1
        } else {
            this.selectedInput = intendedIndex
        }

        return this.historyTargets[this.selectedInput].value
    }

    get nextInputText() {
        const intendedIndex = this.selectedInput + 1

        if (this.selectedInput == undefined || !this.historyTargets.hasOwnProperty(intendedIndex)) {
            this.selectedInput = 0
        } else {
            this.selectedInput = intendedIndex
        }

        return this.historyTargets[this.selectedInput].value
    }

    getInput(event) {
        let input = event.type == 'click'
            ? event.currentTarget.dataset.terminalInput
            : this.inputFieldTarget.value

        return input.trim().toLowerCase()
    }
}
