class _Response {
    constructor(request, response) {
        this.request = request
        this.response = response
    }

    get statusCode() {
        return this.response.status
    }

    get ok() {
        return this.response.ok
    }

    get unauthenticated() {
        return [401, 419].includes(this.statusCode)
    }

    get authenticationURL() {
        return this.response.headers.get("WWW-Authenticate")
    }

    get contentType() {
        const contentType = this.response.headers.get("Content-Type") || ""
        return contentType.replace(/;.*$/, "")
    }

    get headers() {
        return this.response.headers
    }

    get html() {
        if (this.isHtml) {
            return this.response.text()
        }
        return Promise.reject(`Expected an HTML response but got "${this.contentType}" instead`)
    }

    get json() {
        if (this.isJson) {
            return this.response.json()
        }
        return Promise.reject(`Expected a JSON response but got "${this.contentType}" instead`)
    }

    get text() {
        return this.response.text()
    }

    get url() {
        return this.response.url
    }

    get redirected() {
        return this.response.redirected
    }

    get isHtml() {
        return this.contentType.match(/^(application|text)\/(html|xhtml\+xml)$/)
    }

    get isJson() {
        return this.contentType.match(/^application\/json/)
    }
}

export { _Response as Response }
    