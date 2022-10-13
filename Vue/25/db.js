// 引入mock的包并创建对象
const Mock = require('mockjs');
// 创建随机生成数据的对象
const Random = Mock.Random;
// 导出
module.exports = () => {
    let data = { news: [] };
    for (let i = 0; i < 20; i++) {
        // 将数据压入到data
        data.news.push({
            id: i,
            content: Random.cparagraph(10),
        });
    }
    return data;
};
