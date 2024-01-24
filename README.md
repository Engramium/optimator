# Optimator
Simplify and streamline WordPress by removing unnecessary data and functionalities.

## Build & Required Tech Stack
- React.js 18.2.43
- Vite 5.0.8
- PHP 7.4 or greater
- WordPress 5.0 or greater

## 📦 What it ships with?

 - Modern PHP codebase with [namespace](http://php.net/manual/en/language.namespaces.php) support


## 🚚 Running

1. Clone this repository in your plugins folder
2. Activate the plugin

## 👨‍💻 Post Installation

1. Run `composer install`
2. Run `npm install`
3. To start developing, run `npm run dev` 🤘
4. For production build, run `npm run build` 👍

## ⛑ Some Instructions/ Features
- For activating auto reloading with the browser with **Vite** you have to create a `.env` from the `.env-example` file and replace `VITE_PORT` with your app settings page URL and `VITE_PORT` with your desired port.
- It supports JavaScript string translation. Many people struggle to make translatable react component strings. It supports that but you have to generate `.pot` file by `WP-CLI`. Just install [WP-CLI](https://make.wordpress.org/cli/handbook/guides/installing/) and run `npm run wp-cli-pot`


## About

Made by [Sayedul Sayem](https://sayedulsayem.com).

*Found anything that can be improved? You are welcome to contribute.*
