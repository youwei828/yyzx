const path = require('path'); //node.js里面的基本包，用来处理路径
//__dirname表示文件相对于工程的路径
const { VueLoaderPlugin } = require('vue-loader');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');
//通过package.json中的script中进行配置
const isDev = process.env.NODE_ENV === 'development';

const config = {
    //设置入口和出口，入口，__dirname是当前文件所在的目录
    entry: path.join(__dirname, './src/index.js'),
    output: {
        filename: 'bundle.[hash:8].js',
        path: path.join(__dirname, 'dist'),
    },
    target: 'web',
    module: {
        rules: [
            {
                //通过vue-loader来识别以vue结尾的文件
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.style$/,
                use: [
                    'style-loader',
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: true,
                        },
                    },
                    'style-loader',
                ],
            },
            {
                test: /\.css$/i, //i表示大小写不敏感
                use: ['style-loader', 'css-loader'],
            },
        ],
    },
    plugins: [
        //确保引入这个插件
        new VueLoaderPlugin(),
        new HtmlWebpackPlugin(),
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: isDev ? '"development"' : '"production"',
            },
        }),
    ],
    mode: 'none',
};

if (isDev) {
    (config.devServer = {
        port: 8081,
        host: '127.0.0.1',
        // overlay: {
        //     errors: true,
        //     warnings: true,
        // },
        //启动成功，自动打开html页面
        open: true,
        //配置不能访问的地址  重定向到一个固定页面
        //historyFallback{}
    }),
        //开发环境中用css
        config.module.rules.push({
            test: /\.scss$/,
            use: ['style-loader', 'css-loader', 'sass-loader', 'postcss-loader'],
        });
}

module.exports = config;
