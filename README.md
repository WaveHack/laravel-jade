## LaravelJade
[![Build Status](https://travis-ci.org/rvanasperen/laravel-jade.svg)](https://travis-ci.org/rvanasperen/laravel-jade)
[![License](https://poser.pugx.org/rvanasperen/laravel-jade/license.svg)](https://packagist.org/packages/rvanasperen/laravel-jade)

LaravelJade is a library that adds [JadePHP templating](https://github.com/maht0rz/jade.php) support to Laravel 5.0 through [maht0rz's](https://github.com/maht0rz) [JadePHP package](https://github.com/maht0rz/jade.php).

## Installation

Require this package with composer:

```
composer require "rvanasperen/laravel-jade=~1.0"
```

Add the ServiceProvider to the providers array in config/app.php:

```
'LaravelJade\ServiceProvider',
```

## Usage

Create views as you would normally, suffixed with .jade.php. The view rendering engine should resolve and compile them as Jade templates automatically.

## License

LaravelJade is licensed under the [MIT license](http://opensource.org/licenses/MIT).
