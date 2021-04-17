import ApplicationController from './application-controller'
import parseArgs from 'minimist'

export default class extends ApplicationController {
    static targets = [ 'inputField', 'history', 'outputContainer', 'output' ]

    // Actions

    execute(event) {
        event.preventDefault()

        const input = this.getInput(event)

        if (input.length === 0) return

        this.selectedInput = undefined

        let argv = parseArgs(input.split(' '), { default: { fresh: false }})

        if (this[argv._[0]] && !argv.fresh) {
            return this[argv._[0]](event)
        }

        return this.axios.get('/' + argv._.join('/'))
            .then(this.write.bind(this))
    }

    listenToKeys(event) {
        const terminalHasFocus = document.activeElement === this.element
        const inputFieldHasFocus = document.activeElement === this.inputFieldTarget
        if (event.key == '/' && terminalHasFocus) this.focus(event)
        if (event.key == 'ArrowUp' && (terminalHasFocus || inputFieldHasFocus)) this.previousInput(event)
        if (event.key == 'ArrowDown' && (terminalHasFocus || inputFieldHasFocus)) this.nextInput(event)
        if (event.key == 'Enter' && (terminalHasFocus || inputFieldHasFocus)) this.execute(event)
    }

    focus(event) {
        event.preventDefault()
        this.inputFieldTarget.focus()
    }

    clear(event) {
        if (event) event.preventDefault()

        this.outputContainerTarget.innerHTML = ''
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

    write(output) {
        this.outputContainerTarget.insertAdjacentHTML('beforeend', output)
        this.inputFieldTarget.value = ''
        this.lastOutput.scrollIntoView()
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
