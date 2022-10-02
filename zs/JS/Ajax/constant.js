//常量
const HTTP_GET = 'GET';
const CONTENT_TYPE_FROM_URLENCODED = 'application/x-www-form-urlencoded';
const CONTENT_TYPE_JSON = 'application/json';
export { HTTP_GET, CONTENT_TYPE_FROM_URLENCODED, CONTENT_TYPE_JSON };
export const ERROR_HTTP_CODE = 1;
export const ERROR_HTTP_CODE_TEXT = `HTTP状态码异常:`;

export const ERROR_REQUEST = 2;
export const ERROR_REQUEST_TEXT = `请求被阻止:`;

export const ERROR_TIMEOUT = 3;
export const ERROR_TIMEOUT_TEXT = `请求超时:`;

export const ERROR_ABORT = 4;
export const ERROR_ABORT_TEXT = `请求终止:`;
