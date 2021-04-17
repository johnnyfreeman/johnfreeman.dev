import { Request } from './request'

export class FormRequest {
    constructor(element) {
        this.element = element
    }

    async execute() {
        return await (new Request(this.method, this.url, this.options)).execute()
    }

    get options() {
        return { body: this.body }
    }

    get body() {
        if (this.method != 'get') {
            return new FormData(this.element)
        }
    }

    get method() {
        return this.element.getAttribute('method').toLowerCase()
    }

    get url() {
        let url = new URL(this.element.getAttribute('action') || window.location.href)
        if (this.method == 'get') url.search = new URLSearchParams(new FormData(this.element))
        return url
    }
}