
import { Request } from '../http/request'

export class TerminalRequest {
    constructor(input) {
        this.input = input
    }

    async execute() {
        const response = await new Request('get', '/' + this.input).execute()

        return await response.html
    }
}