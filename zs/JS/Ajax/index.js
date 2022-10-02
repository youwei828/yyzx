import ajax from './ajax.js';
//常量
import {
    ERROR_HTTP_CODE,
    ERROR_HTTP_CODE_TEXT,
    ERROR_REQUEST,
    ERROR_REQUEST_TEXT,
    ERROR_TIMEOUT,
    ERROR_TIMEOUT_TEXT,
    ERROR_ABORT,
    ERROR_ABORT_TEXT,
} from './constant.js';
const index_ajax = (url, options) => {
    // return new ajax(url, options).getXHR();
    let xhr;
    const p = new Promise((reslove, rejest) => {
        xhr = new ajax(url, {
            ...options,
            ...{
                success(response) {
                    reslove(response);
                },
                httpCodeError(status) {
                    rejest({
                        type: ERROR_HTTP_CODE,
                        text: `${ERROR_HTTP_CODE_TEXT}${status}`,
                    });
                },
                error(status) {
                    rejest({
                        type: ERROR_REQUEST,
                        text: `${ERROR_REQUEST_TEXT}${status}`,
                    });
                },
                abort(status) {
                    rejest({
                        type: ERROR_ABORT,
                        text: `${ERROR_ABORT_TEXT}${status}`,
                    });
                },
                timeout(status) {
                    rejest({
                        type: ERROR_TIMEOUT,
                        text: `${ERROR_TIMEOUT_TEXT}${status}`,
                    });
                },
            },
        }).getXHR();
    });
    p.xhr = xhr;
    p.ERROR_HTTP_CODE = ERROR_HTTP_CODE;
    p.ERROR_ABORT = ERROR_ABORT;
    p.ERROR_REQUEST = ERROR_REQUEST;
    p.ERROR_TIMEOUT = ERROR_TIMEOUT;
    return p;
};
const get = (url, options) => {
    return index_ajax(url, { ...options, method: 'GET' });
};
const getJSON = (url, options) => {
    return index_ajax(url, { ...options, method: 'post', responseType: 'json' });
};
const post = (url, options) => {
    return index_ajax(url, { ...options, method: 'POST' });
};
export { index_ajax, get, getJSON, post };
