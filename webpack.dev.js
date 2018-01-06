const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
const OfflinePlugin = require('offline-plugin');

const extractSass = new ExtractTextPlugin({ filename: "styles/[name].css" });

module.exports = {
    entry: {
        app: [
            path.resolve(__dirname, "./assets/scripts/main.js"),
            path.resolve(__dirname, "./assets/styles/main.scss")
        ]
    },
    output: {
        path: path.resolve(__dirname, "dist"),
        publicPath: "../",
        filename: "scripts/[name].js"
    },
    devtool: "source-map",
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['babel-preset-env']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: extractSass.extract({
                    use: [{
                        loader: "css-loader", options: {
                            sourceMap: true
                        }
                    }, {
                        loader: "sass-loader", options: {
                            sourceMap: true
                        }
                    }],
                    // use style-loader in development
                    fallback: "style-loader"
                })
            },
            {
                test: /\.(png|jpe?g|gif)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'images/',
                    }
                }]
            },
            {
                test: /\.(svg|ttf|woff|woff2|eot)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts/'
                    }
                }]
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    name: '[name].[ext]'
                }
            }
        ]
    },
    plugins: [
        extractSass,
        new CleanWebpackPlugin(['dist']),
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"development"'
            }
        }),
        new OfflinePlugin({
          autoUpdate: 1000 * 20,
          AppCache: null,
          caches: {
            'main': [
              '/pwa'
            ],
            'additional': [],
            'optional': [],
          }
        })
    ],
    externals: {
        jquery: 'jQuery'
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    watchOptions: {
        ignored: /node_modules/
    }
};
