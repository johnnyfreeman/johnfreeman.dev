import { Controller } from 'stimulus';
import axios from 'axios';
import NProgress from 'nprogress';

export default class extends Controller {

    // Private

    get terminal() {
        return this.application
            .getControllerForElementAndIdentifier(document.body, 'terminal');
    }

    get api() {
        let api = axios.create();

        function endProgressAndReject(error) {
            NProgress.done();
            navigator.vibrate([100]);
            this.terminal.write(error.response.data);
            return Promise.reject(error);
        };

        api.interceptors.request.use(function (config) {
            NProgress.start();
            return config;
        }, endProgressAndReject.bind(this));

        api.interceptors.response.use(function (response) {
            if (response.status >= 400) {
                navigator.vibrate([100]);
            }

            NProgress.done();
            return response.data;
        }, endProgressAndReject.bind(this));

        // axios.defaults.baseURL = 'https://johnfreeman.dev/';
        api.defaults.headers.common['Accept'] = 'text/html, */*';
        api.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        api.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

        return api;
    }
}
