# [Comp-586-Project](http://alan-laravel-spa.herokuapp.com/)

You can view the live application [here](http://alan-laravel-spa.herokuapp.com/).

I utilized one of Laravel's templates to create this so there is some boilerplate code that is not utilized.

### Test Accounts
- Account #1
  - username: test@gmail.com
  - password: password
- Account #2
  - username: test2@gmail.com
  - password: password
  
### Main folders of interest
- `apps/Models` - Models
- `app/Http/Controllers` - Controllers
- `routes/api.php` - REST API
- `resources/js/pages/` - Vue pages
- `database/factories` - Factories for testing
- `database/migrations` - Database schema definition for ORM
- `app/ViewModels` - For view model

### Tech Stack
- Laravel 8 (Back-end)
- Vue.js + VueRouter + Vuex + VueI18n (Front-end)
- Bootstrap 4 (Front-end)

### Features of the application
- SPA
- ORM
- View Model
- MVC (server-side)
- JWT Authentication
- OAuth with GitHub
- Responsive Design
- 3 Tables (cars, users, and oauth_providers)
- Each user has their own list of cars (i.e. users don't share the same car list)

### Installation

You can follow the steps [here](https://laravel.com/docs/8.x) to install Laravel.

#### Prerequisites
- PHP (7.4.13)
- Composer (2.0.8)
- Node (12.20.0)
- NPM (6.14.8)
- Laravel (8.12.3)
- Make sure you have a MySQL database locally and go in the `.env` file to edit database settings

#### Installation commands
- `composer install` to install composer dependencies
- `npm install` to install npm dependencies
- `npm run watch` to compile and watch JS changes
- `php artisan key:generate` to generate laravel key
- `php artisan jwt:secret` to generate jwt auth key
- `php artisan migrate` to create database with models
- `php artisan serve` to serve server to localhost

