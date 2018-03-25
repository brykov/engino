const path = require('path');
const r = path.resolve.bind(this, __dirname);

module.exports = {
    devtool: "source-map",
    entry: {
        js: r('admin/assets/application.js'),
        css: r('admin/assets/application.css')
    },
    output: {
        path: r('public/assets'),
        filename: 'application.[name]',
        publicPath: '/assets/'
    },
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                include: [
                    r('admin/assets/js')
                ],
                exclude: /(node_modules|bower_components)/,
                loader: "babel-loader",
                options: {
                    presets: ['es2015']
                }
            },
            {
                rules: [
                    {
                        test: /\.css$/,
                        use: [ 'style-loader', 'css-loader' ]
                    }
                ]
            }
        ]
    },
    devServer: {
        contentBase: r('public/assets'),
        compress: true,
        host: '0.0.0.0',
        port: 9000
    }
};