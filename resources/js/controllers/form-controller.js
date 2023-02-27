import ApplicationController from './application-controller'
import { FormRequest } from '../http/form-request'

export default class extends ApplicationController {
    static targets = [ 'form' ]

    // Actions

    async submit(e) {
        e.preventDefault()
        let response = await new FormRequest(this.formTarget).execute()
        this.terminal.write(await response.html)
    }

    async submitIfEnter(e) {
        if (e.key == 'Enter') {
            await this.submit(e)
            e.target.blur()
        }
    }
}