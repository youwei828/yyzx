//引入常量
import { HTTP_GET, CONTENT_TYPE_FROM_URLENCODED, CONTENT_TYPE_JSON } from './constant.js';
//引入默认参数
import DEFAULTS from './defaults.js';
//引入工具类
import { serialize, addURLData, serializeJSON } from './utils.js';
class ajax {
    //ajax类
    constructor(url, options) {
        this.url = url;
        this.options = Object.assign({}, DEFAULTS, options);
        this.init();
    }

    //初始化
    init() {
        //初始化创建xhr对象
        const xhr = new XMLHttpRequest();
        this.xhr = xhr;
        //绑定响应事件处理程序
        this.bindEvents();
        //准备发送请求
        xhr.open(this.options.method, this.url + this.addParam(), true);
        //设置responseType
        this.setResponseType();
        //设置跨域是否携带cookie
        this.setCookie();
        //设置超时响应
        this.setTimeout();
        //发送请求
        this.setData();
    }
    //绑定响应事件处理程序
    bindEvents() {
        const xhr = this.xhr;
        //解构options
        const { success, HttpCodeError, error, abort, timeout } = this.options;
        //load事件
        xhr.addEventListener(
            //如果考虑兼容性的话就使用readystatechange()
            'load',
            () => {
                if (this.ok()) {
                    success(xhr.response, xhr);
                } else {
                    HttpCodeError(xhr.status, xhr);
                }
            },
            false
        );
        //error事件
        xhr.addEventListener(
            //如果考虑兼容性的话就使用readystatechange()
            //error事件
            'error',
            () => {
                error(xhr);
            },
            false
        );

        //abort
        xhr.addEventListener(
            //如果考虑兼容性的话就使用readystatechange()
            //abort事件
            'abort',
            () => {
                abort(xhr);
            },
            false
        );
        //timeout事件
        xhr.addEventListener(
            //如果考虑兼容性的话就使用readystatechange()
            //timneout事件
            'timeout',
            () => {
                timeout(xhr);
            },
            false
        );
    }
    //检测响应的HTTP状态码是否正常
    ok() {
        const xhr = this.xhr;
        return (xhr.status >= 200 && xhr.status < 300) || xhr.status === 304;
    }
    //在地址上添加数据
    addParam() {
        const { params } = this.options;
        if (!params) return '';
        return addURLData(this.url, serialize(params));
    }
    //设置responseType
    setResponseType() {
        this.xhr.responseType = this.options.responseType;
    }
    //设置跨域是否携带cookie
    setCookie() {
        if (this.options.withCredentials) {
            this.xhr.withCredentials = true;
        }
    }
    //设置超时响应
    setTimeout() {
        const { timeoutTime } = this.options;
        if (this.timeoutTime > 0) {
            this.xhr.timeout = timeoutTime;
        }
    }
    //发送请求
    setData() {
        const xhr = this.xhr;
        if (!this.isSendData) {
            return xhr.send(null);
        }
        let resultData = null;
        const { data } = this.options;
        //发送FormData格式的数据
        if (this.resultData) {
            resultData = data;
        } else if (this.isFormURLEncodedData()) {
            //发送applocation/x-www-form-urlencoded格式的数据
            this.setContnetType();
            resultData = serialize(data);
        } else if (this.isJSONData()) {
            this.setContnetType();
            //发送applocation/json格式的数据
            resultData = serializeJSON(data);
        } else {
            //发送其他数据
            this.setContnetType();
            resultData = data;
        }

        xhr.send(resultData);
    }
    //是否需要使用send发送数据
    isSendData() {
        const { data, method } = this.options;
        if (!data) return false;
        if (method.toLowerCase() === HTTP_GET.toLowerCase()) return false;
        return true;
    }
    //是否发送Formdata格式的数据
    isFormdata() {
        //判断是否是Formd的实例，返回布尔值
        return this.options.data instanceof FormData;
    }
    //是否发送applocation/x-www-form-urlencoded格式的数据
    isFormURLEncodedData() {
        return this.options.contentType.toLowerCase().includes(CONTENT_TYPE_FROM_URLENCODED);
    }
    //是否发送applocation/json格式的数据
    isJSONData() {
        return this.options.contentType.toLowerCase().includes(CONTENT_TYPE_JSON);
    }
    //设置ContentType
    setContnetType(contentType = this.options.contentType) {
        if (!contentType) return;
        this.xhr.setRequestHeader('Content-Type', contentType);
    }
    //获取xhr对象
    getXHR() {
        return this.xhr;
    }
}
export default ajax;
