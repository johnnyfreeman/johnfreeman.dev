import ApplicationController from './application-controller'

export default class extends ApplicationController {
    connect() {
        this.element.focus()
    }
}
