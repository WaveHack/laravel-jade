## laravel-jade

[![Build Status](https://travis-ci.org/WaveHack/laravel-jade.svg?branch=master)](https://travis-ci.org/WaveHack/laravel-jade)
[![Dependency Status](https://gemnasium.com/badges/github.com/WaveHack/laravel-jade.svg)](https://gemnasium.com/github.com/WaveHack/laravel-jade)
![Packagist](https://img.shields.io/packagist/dm/wavehack/laravel-jade.svg)
[![MIT licensed](https://img.shields.io/github/license/wavehack/laravel-jade.svg?maxAge=2592000)](https://opensource.org/licenses/MIT)

laravel-jade is a library that adds [JadePHP templating](https://github.com/maht0rz/jade.php) support to Laravel 5.x through [maht0rz's](https://github.com/maht0rz) [JadePHP package](https://github.com/maht0rz/jade.php).

## Installation

Require this package with composer:

`composer require wavehack/laravel-jade`

Add the ServiceProvider to the providers array in config/app.php:

`LaravelJade\ServiceProvider::class,`

## Usage

Create views as you would normally, suffixed with .jade.php. The view rendering engine should resolve and compile them as Jade templates automatically. 

## License

laravel-jade is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).
