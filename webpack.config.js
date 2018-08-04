const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
const MinifyPlugin = require('babel-minify-webpack-plugin');
const workboxPlugin = require('workbox-webpack-plugin');
const dist = 'dist';

const extractSass = new ExtractTextPlugin({
    filename: "styles/[name].css",
    disable: process.env.NODE_ENV === "development"
});

module.exports = {
    entry: {
        app: [
            path.resolve(__dirname, "./assets/scripts/main.js"),
            path.resolve(__dirname, "./assets/styles/main.scss")
        ]
    },
    output: {
        path: path.resolve(__dirname, "dist"),
        publicPath: '/wp-content/themes/sage/dist/',
        filename: "scripts/[name].js"
    },
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
                        loader: "css-loader",
                        options: {
                            minimize: true
                        }
                    }, {
                        loader: "sass-loader"
                    }],
                    // use style-loader as fallback
                    fallback: "style-loader"
                })
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'images/'
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
                NODE_ENV: '"production"'
            }
        }),
        new MinifyPlugin({}, {comments: false}),
        new workboxPlugin({
            globDirectory: path.resolve(__dirname, "./dist/"),
            globPatterns: ['**\/*.{html,js,css}'],
            swDest: path.join(dist, 'sw.js'),
            clientsClaim: true,
            skipWaiting: true,
            runtimeCaching: [
                {
                    urlPattern: /(.jpg$|.png$|.gif$)/,
                    handler: 'staleWhileRevalidate',
                    options: {
                        cacheName: 'images-cache',
                        cacheExpiration: {
                            maxEntries: 10
                        }
                    }
                },
                {
                    urlPattern: /\/$/,
                    handler: 'staleWhileRevalidate',
                    options: {
                        cacheName: 'page-cache',
                        cacheExpiration: {
                            maxEntries: 10
                        }
                    }
                },
                {
                    urlPattern: new RegExp('(/wp-admin/|/wp-includes/)'),
                    handler: 'networkOnly'
                }
            ]
        })
    ],
    externals: {
        jquery: 'jQuery'
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    }
};
