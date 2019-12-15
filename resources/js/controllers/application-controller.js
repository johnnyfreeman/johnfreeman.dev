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
        function endProgressAndReject(error) {
            NProgress.done();
            this.terminal.write('vibrating');
            this.terminal.write(error.response.data);
            navigator.vibrate([100]);
            return Promise.reject(error);
        };

        axios.interceptors.request.use(function (config) {
            NProgress.start();
            return config;
        }, endProgressAndReject);

        axios.interceptors.response.use(function (response) {
            NProgress.done();
            return response.data;
        }, endProgressAndReject);

        // axios.defaults.baseURL = 'https://johnfreeman.dev/';
        axios.defaults.headers.common['Accept'] = 'text/html, */*';
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

        return axios;
    }
}
