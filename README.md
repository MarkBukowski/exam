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
Laravel 4.2
jQuery 3.4
Bootstrap 4
MYSQL database
PHP 8.1
```

## Features

**Frontend**

* Responsive design
* Laravel Lumino theme implementation
* Task and status forms with validations
* WYSIWYG editor implemented (summernote)

**Backend**

* Task and Status CRUD
* Implement user registration and login
* Sort tasks by timestamps (newest at the top)
* All information comes from DB
* DB relations
* Filter tasks by status
* Export to PDF feature

## Setup

**Clone Repository**

Navigate to the location you want to clone the repository via your terminal window and type in:

```
git clone https://github.com/MarkBukowski/exam exam_project
```

Jump up to the cloned project folder and install the Laravel framevowrk alongside with necessary dependencies.

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```
After the setup finishes, install npm:

```
npm install
```

If you receive any vulnerabilities when installing npm modules, after the command finishes, run:

```
npm audit fix
```


**Setup the Database**

Open `.env` and make sure the `DATABASE_URL` setting is
correct for your system.

If there is no such file, copy the `.env.example` file and name it `.env`.

```
copy .env.example .env
```

Then, create the database (I recommend phpmyadmin via xampp) and the schema!

```
php bin/console doctrine:schema:create
```

**Generate key**

Update the `.env` file by generating a new key:

```
php artisan key:generate
```

**Run migrations**

Migrate the tadabase tables to update the newly created DB:

```
php artisan migrate
```

**Start the web server**

You can use Nginx or Apache, but the built-in web server works
great:

```
php -S localhost:8000 -t public
```

## Authors
[MarkBukowski](https://github.com/MarkBukowski)
