<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


User Task list
=================================

This is a simple to-do task list application, used to defend my practice skills on final BIT exam. Technologies used:
```
Laravel 4.2.5
jQuery 3.4.1
Bootstrap 4
MYSQL database
```

## Setup

**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

**Setup the Database**

Open `.env` and make sure the `DATABASE_URL` setting is
correct for your system.

Then, create the database and the schema!

```
php bin/console doctrine:schema:create
```

**Start the web server**

You can use Nginx or Apache, but the built-in web server works
great:

```
php -S localhost:8000 -t public
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# exam" 

## Authors
[MarkBukowski](https://github.com/MarkBukowski)
