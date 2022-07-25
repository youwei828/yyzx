let tabs = document.getElementById('tabs');
let lis = tabs.getElementsByTagName('li');
let list = document.getElementById('list').getElementsByTagName('ul');
//标签和商品的切换
for (let i = 0; i < lis.length; i++) {
    lis[i].addEventListener('click', function (e) {
        for (let i = 0; i < lis.length; i++) {
            if (lis[i] === this) {
                lis[i].className = 'active';
                list[i].className = 'clearfix active';
            } else {
                lis[i].className = '';
                list[i].className = 'clearfix';
            }
        }
    });
}
//固定标签滚动
window.onscroll = () => {
    let sco = document.documentElement.scrollTop || document.body.scrollTop || window.pageYOffset || 0;
    if (sco >= 260) {
        document.getElementById('scroll').className = 'seckill-nav seckill-navfixed';
    } else {
        document.getElementById('scroll').className = 'seckill-nav';
    }
};
