import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    static targets = [ 'copyable' ]

    // Actions

    copy(e) {
        let text = this.getCopyableText()

        navigator.clipboard
            .writeText(text)
            .then(() => {
                e.target?.dispatchEvent(new CustomEvent(`${this.identifier}:copied`))
            })
    }

    // Private

    getCopyableText() {
        let target = this.copyableTarget

        if (target.hasAttribute('value')) {
            return target.value
        }

        return target.innerText
    }
}