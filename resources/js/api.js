import axios from 'axios';
import NProgress from 'nprogress';

function endProgressAndReject(error) {
    NProgress.done();
    window.console.log(error, error.response);
    window.terminal.write(error.response.data);
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

export default axios;
