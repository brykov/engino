const path = require('path');
const r = path.resolve.bind(this, __dirname);

module.exports = {
    devtool: "source-map",
    entry: {
        js: r('admin/assets/application.jsx'),
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
                    r('admin/assets')
                ],
                exclude: /(node_modules|bower_components)/,
                loader: "babel-loader",
                options: {
                    presets: ['react']
                }
            },
            {
                rules: [
                    {
                        test: /\.css$/,
                        use: [
                          'style-loader',
                          {
                            loader: 'css-loader',
                            options: {
                              importLoaders: 1,
                              modules: true,
                            },
                          }
                        ]
                    }
                ]
            }
        ]
    },
    resolve: {
        extensions: ['.js', '.jsx']
    },
    devServer: {
        contentBase: r('public/assets'),
        compress: true,
        host: '0.0.0.0',
        port: 9000
    }
};