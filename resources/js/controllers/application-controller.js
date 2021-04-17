import { Controller } from 'stimulus'
import axios from 'axios'
import NProgress from 'nprogress'

export default class extends Controller {

    // Private

    get terminal() {
        return this.application
            .getControllerForElementAndIdentifier(document.body, 'terminal')
    }

    get axios() {
        let newInstance = axios.create()

        function endProgressAndReject(error) {
            NProgress.done()
            navigator.vibrate([100])
            this.terminal.write(error.response.data)
            return Promise.reject(error)
        }

        newInstance.interceptors.request.use(function (config) {
            NProgress.start()
            return config
        }, endProgressAndReject.bind(this))

        newInstance.interceptors.response.use(function (response) {
            if (response.status >= 400) {
                navigator.vibrate([100])
            }

            NProgress.done()
            return response.data
        }, endProgressAndReject.bind(this))

        // axios.defaults.baseURL = 'https://johnfreeman.dev/'
        newInstance.defaults.headers.common['Accept'] = 'text/html, */*'
        newInstance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
        newInstance.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content

        return newInstance
    }
}
