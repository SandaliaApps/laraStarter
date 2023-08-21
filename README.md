## Complete Laravel Starter Package

[![SandaliaApps](https://avatars.githubusercontent.com/u/142171757?s=48&v=4)](https://sandalia.com.bd/apps)
LaraStarter is package designed to streamline the process of setting up a Laravel-based web application with a variety of essential features. It appears to offer several components and functionalities that can significantly accelerate the development process, especially for those who are looking to create a web application without having to build the basic foundation from scratch.


## Features

- Multi Auth User Management: This suggests that LaraStarter provides the capability to manage multiple types of users, each with their own authentication and authorization settings.
- ReCAPTCHA v3 on Login & Registration: ReCAPTCHA v3 is a Google service that helps prevent automated bots from interacting with your website. Integrating it with the login and registration process enhances security.
- Email Verification: Email verification is an important security and user validation step, ensuring that users' email addresses are valid and they have control over the email used for registration.
- Password Reset: A password reset feature is crucial for user convenience and security. It allows users to regain access to their accounts in case they forget their passwords.
- AJAX Datatable: AJAX-powered datatables provide a smoother and more interactive user experience when dealing with tabular data, often used for displaying data in a dynamic and responsive manner.
- Basic Essential Site Settings: These settings could include things like site title, description, logo, and other basic configurations that are commonly required for a web application.
- Complete CMS with Categories: This indicates that LaraStarter comes with a Content Management System (CMS) that supports content creation, management, and organization through categories. This is particularly useful for building websites with dynamic content.

## Tech

LaraStarter uses a number of open source projects to work properly:

- [Jquery] - jQuery is a fast, small, and feature-rich JavaScript library.
- [adminlte.io] - Best open source admin dashboard & control panel theme.
- [datatables.net] - DataTables is a plug-in for the jQuery Javascript library.
- [getBootstrap.com] - great UI boilerplate for modern web apps

And of course laraStarter itself is open source with a [public repository][dill]
 on GitHub.

## Installation

LaraStarter requires [Laravel](https://laravel.com/) v10+ to run (laraStarter is not tested with earlier version of Larave yet).

Install a fresh copy of Laravel. Check  [How to Install Laravel](https://laravel.com/docs/10.x#your-first-laravel-project)

****Don't install any authenticatation packages because you won't need any
****Follow the following steps
1. Migrate database using the following command
```sh
php artisan migrate
```
2. Install laraStarter Package
```sh
composer require sandalia-apps/lara-starter
```
3. Publish Assets
```sh
php artisan vendor:publish --tag=public --force
```
4. Migrate database again using the following command
```sh
php artisan migrate
```
5. Seed database with toles & users using the following command
```sh
php artisan db:seed --class="SandaliaApps\\LaraStarter\\Database\\Seeders\\DatabaseSeeder"
```
6. Remove the default (following) route from `routes\web.php` 
```sh
Route::get('/', function () {
    return view('welcome');
});
```
7. Add following CONSTANT in .env file with Recaptch v3 Site_Key & Secret_Key from [Google Recaptcha](https://www.google.com/recaptcha/about/) 
```sh
RECAPTCHA_SITE_KEY=Your_Site_Key
RECAPTCHA_SECRET_KEY=YOur_Secret_Key
```
8. Start Server
```sh
php artisan serve
```
9. Then What! Registration & Login systems are fully operational with beautiful admin panel sucure by google recaptcha v3. Just Try and provide feedback. 
#### Still working on Documentation & many upcomming features soon
#### First stable version will be released soon with full documentation
### Any suggestionations are welcome