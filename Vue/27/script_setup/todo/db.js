const Mock = require('mockjs');
//Mock.Random 是一个工具类，用于生成各类随机数据
const Random = Mock.Random;

module.exports = () => {
    let data = { news: [] };
    for (let i = 0; i < 6; i++) {
        data.news.push({
            id: i,
            title: Random.cword(10, 20),
            content: Random.cparagraph(10),
        });
    }
    return data;
};
