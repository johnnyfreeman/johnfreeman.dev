import ApplicationController from './application-controller'

export default class extends ApplicationController {
    static targets = [ 'copyable' ]

    // Actions

    copy(event) {
        this.selectCopyable()

        if (document.execCommand('copy')) {
            this.showSuccessNotice()

            if (this.data.has('deselectOnCopy')) {
                this.deselectCopyable()
            }
        }
    }

    selectCopyable(event) {
        this.copyableTarget.select()
        this.copyableTarget.selectionStart = 0
        this.copyableTarget.selectionEnd = this.copyableTarget.value.length
    }

    deselectCopyable(event) {
        window.getSelection().removeAllRanges()
        this.copyableTarget.blur()
    }

    // Private

    showSuccessNotice() {
        // BC.animateElementWithClass(this.element, this.data.get('successClass'))
    }
}
