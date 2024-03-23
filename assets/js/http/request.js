import { Response } from './response'

window.breakAllFetchRequestsForTests = false

export class Request {
    constructor(method, url, options = { headers: {} }) {
        this.method = method
        this.url = window.breakAllFetchRequestsForTests ? 'about:blank' : url
        this.options = options
    }

    async execute() {
        const response = new Response(this, await fetch(this.url, this.fetchOptions))
        if (response.unauthenticated && response.authenticationURL) {
            return Promise.reject(window.location.href = response.authenticationURL)
        }
        return response
    }

    get fetchOptions() {
        return {
            method: this.method,
            headers: this.headers,
            body: this.options.body,
            credentials: 'same-origin',
            redirect: 'follow'
        }
    }

    get headers() {
        return compact({
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': this.csrfToken,
            'Accept': 'text/html, application/xhtml+xml',
            ...this.options.headers
        })
    }

    get csrfToken() {
        return document.head.querySelector('meta[name=csrf-token]')?.content
    }
}

function compact(object) {
    let result = {}
    for (let key in object) {
        let value = object[key]
        if (value !== undefined) {
            result[key] = value
        }
    }
    return result
}

export async function request(method, url, options) {
    let response = await new Request(method, url, options).execute()
    if (response.ok) {
        return response.text
    }
    let error = new Error(response.statusCode)
    error.response = response
    throw error
}

export function get(url, options) {
    return request('get', url, options)
}

export function post(url, options) {
    return request('post', url, options)
}