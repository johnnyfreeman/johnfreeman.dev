import axios from 'axios';
import NProgress from 'nprogress';

axios.interceptors.request.use(function (config) {
    NProgress.start();
    return config;
}, function (error) {
    NProgress.done();
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    NProgress.done();
    return response;
}, function (error) {
    NProgress.done();
    return Promise.reject(error);
});

// axios.defaults.baseURL = 'https://johnfreeman.dev/';
axios.defaults.headers.common['Accept'] = 'text/html, */*';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

export default axios;
