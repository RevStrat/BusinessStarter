const path = require('path');

module.exports = {
    mode: 'development',
    entry: {
        app: ['./javascript/index.js', './scss/layout.scss', './scss/editor.scss', './scss/typography.scss']
    },
    output: {
        path: path.resolve(__dirname, '../'),
        filename: 'javascript/[name].js',
    },
    module: {
        rules: [
            /**
             * Running Babel on JS files.
             */
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        plugins: ['lodash']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'css/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader'
                    },
                    {
                        loader: 'css-loader?-url'
                    },
                    {
                        loader: 'postcss-loader'
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            }
        ]
    },
};