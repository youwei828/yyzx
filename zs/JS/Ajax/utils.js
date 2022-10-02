//工具函数
//序列化参数,将数据序列化成 urlcoded 格式的字符串
//encodeURIComponent()的格式为contentType: 'application/x-www-form-urlencoded'
const serialize = param => {
    const results = [];
    for (const [key, value] of Object.entries(param)) {
        results.push(`${encodeURIComponent(key)}=${encodeURIComponent(value)}`);
    }
    return results.join('&');
};

//将数据序列化成 JSON 格式的字符串
const serializeJSON = param => {
    return JSON.stringify(param);
};

//给URl添加参数
const addURLData = (url, data) => {
    if (!data) return;
    const mark = url.includes('?') ? '&' : '?';
    return `${mark}${data}`;
};
export { serialize, addURLData, serializeJSON };
