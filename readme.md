## Laravel-passport is a basic API server build using Laravel, Passport, and Vue.js [![License](http://jeremykenedy.com/license-mit.svg)](LICENSE) [![Build Status](https://travis-ci.org/jeremykenedy/laravel-passport.svg?branch=master)](https://travis-ci.org/jeremykenedy/laravel-passport)

This will act as the API server for laravel-consume. It is recommended that you setup and use Laravel Homestead
as your development environment for this project.

Personal Token Scoped with middleware for API routes is configured and ready to go.

Included Laravel Scaffolding **User**, **Editor**, and **Administrator Authentication**
with CRUD (Create, Read, Update, Delete) user management.


### Quick Project Setup
###### (Not including the dev environment)

1. Run `sudo git clone https://github.com/jeremykenedy/laravel-passport.git laravel-passport`
2. Run `sudo composer update` from the projects root folder
3. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database passport;```
    * ```\q```
4. From the projects root run `cp .env.example .env`
5. Enter your database settings in the `.env` file
6. From the projects root folder run `sudo chmod -R 755 ../laravel-passport`
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `sudo composer dump-autoload`
10. From the projects root folder run `php artisan db:seed`
11. From the projects root folder run `php artisan passport:install`
11. From the projects root folder run `sudo npm install`
12. From the projects root folder run `sudo gulp`
13. From the projects root folder run `php artisan config:cache`

### Testing the API with Postman:

##### Postman Settings
###### GET:
	http://laravel.local/api/user
	http://laravel.local/api/orders

###### Headers:
	Authorization:  	Bearer + TOKEN
	Accept:				application/json

---

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
