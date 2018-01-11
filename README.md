# [Sage](https://roots.io/sage/)
[![Build Status](https://travis-ci.org/roots/sage.svg)](https://travis-ci.org/roots/sage)
[![devDependency Status](https://david-dm.org/roots/sage/dev-status.svg)](https://david-dm.org/roots/sage#info=devDependencies)

Sage is a WordPress starter theme based on HTML5 Boilerplate, webpack and Bootstrap Sass, that will help you make better themes.

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 7.x      | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js 8.9.4   | `node -v`    | [nodejs.org](http://nodejs.org/) |
| Webpack 3.x     | `gulp -v`    | [webpack.js.org](https://webpack.js.org) |

For more installation notes, refer to the [Install gulp and Bower](#install-gulp-and-bower) section in this document.

## Features

* [webpack](https://webpack.js.org) build script that compiles Sass, checks for JavaScript errors, concatenates and minifies files
* [Bootstrap](http://getbootstrap.com/)
* [Theme wrapper](https://roots.io/sage/docs/theme-wrapper/)
* ARIA roles and microformats
* Posts use the [hNews](http://microformats.org/wiki/hnews) microformat
* [Multilingual ready](https://roots.io/wpml/) and over 30 available [community translations](https://github.com/roots/sage-translations)

## Theme setup

Edit `lib/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, post formats, and sidebars.

## Theme development

Sage uses [webpack](https://webpack.js.org) as its build system.

### Install node modules

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install the modules with `npm install` inside the theme folder.

You now have all the necessary dependencies to run the build process.

### Available npm commands

* `npm run dev` — Compile and optimize the files from your assets directory to the dist directory, watches for changes
* `npm run build` — Compile, optimize and minify the files from your assets directory to the dist directory

## Documentation

Sage documentation is available at [https://roots.io/sage/docs/](https://roots.io/sage/docs/).
