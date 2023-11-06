import ApplicationController from './application-controller'

export default class extends ApplicationController {
    static targets = [ 'cache' ]

    connect() {
        if (this.hasCacheTarget) {
            this.terminal[this.cacheTarget.value] = () => this.terminal.write(this.element.outerHTML)
        }
    }
}
