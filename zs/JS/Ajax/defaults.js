//引入常量
import { HTTP_GET, CONTENT_TYPE_FROM_URLENCODED } from './constant.js';

//默认参数
const DEFAULTS = {
    method: HTTP_GET,
    //请求头携带的数据
    params: null,
    // params: {
    //     username: 'alex',
    //     age: 18,
    // },
    data: null,
    // data: {
    //     username: 'alex',
    //     age: 18,
    // },
    //data:FormData数据
    contentType: CONTENT_TYPE_FROM_URLENCODED,
    responseType: '',
    timeoutTime: 0,
    withCredetials: false,

    //方法
    success() {},
    httpCodeError() {},
    error() {},
    abort() {},
    timeout() {},
};
export default DEFAULTS;
