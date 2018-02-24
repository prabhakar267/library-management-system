# Library Management System

> An automated system to manage a public library. Admin panel for librarians to control and manage the system easily through an interactive interface.

 + [Development](#development)
 + [Setup](#setup)
 + [Features](#features)
 + [Screenshots](meta/README.md)

## Development
The backend of the system is developed on **[Laravel 4.2 PHP MVC Framework](http://laravel.com/)** and requires PHP 5.6 with the appropriate MCrypt extension.
The front end is built on **[Edmin Responsive Bootstrap Admin Template](http://egrappler.com/responsive-bootstrap-admin-template-edmin/)** ([Demo](http://www.egrappler.com/edmin/index.html)) which is built on [Bootstrap v2.2.2](http://bootstrapdocs.com/v2.2.2/docs/) using [jQuery](https://blog.jquery.com/2013/02/04/jquery-1-9-1-released/) and [Underscore-Dot-JS](http://underscorejs.org/)

## Setup
### Unix / Linux / Mac Setup

*NOTE:* PHP 5.6 and mcrypt extension are required for this project:

* `apt-get update`

* `apt-get install php5.6 php5.6-mcrypt`

* `git clone https://github.com/prabhakar267/library-management-system`

* `cd library-management-system`

* `[sudo] chmod -R 755 app/storage`

* `composer install`

 * Edit [mysql.config.php.sample](app/config/mysql.config.php.sample) according to your MySQL configurations and save it in the same directory as ```mysql.config.php```

* `php artisan migrate`

* `php artisan serve`

### Windows Setup

*Some notes on Windows setup:*

*Obtaining the `mcrypt` extension for PHP 7+ is not trivial and involves compiling your own PHP build.
If your PHP version does not support `mcrypt` (i.e. if you have PHP 7+), then the easiest way to run Laravel 4.2 applications is to [download a compatible version of XAMPP](https://www.apachefriends.org/xampp-files/5.6.33/xampp-win32-5.6.33-0-VC11-installer.exe) and make sure the app is run with it.*

With the above notes in mind, Windows setup is not too tricky:

* Open git shell;

* `cd C:/path/to/xampp/htdocs`;

* `git clone https://github.com/prabhakar267/library-management-system`;

* `cd library-management-system`;

* `composer update`;

* **NOTE:** If your PHP version is not compatible with `mcrypt` you will receive an error here. Do not worry, simply perform these additional two steps:
 * `C:/path/to/xampp5.6.33/php/php.exe artisan clear-compiled`
 * `C:/path/to/xampp5.6.33/php/php.exe artisan cache:clear`

* Create a table for the app via phpmyadmin (or however you prefer);

* Edit `app/config/mysql.config.php.sample` according to your MySQL configurations and save it in the same directory as `mysql.config.php`;

* `php artisan migrate`

 **OR IF YOUR PHP IS NOT `mcrypt` COMPATIBLE:**

 `C:/path/to/xampp5.6.33/php/php.exe artisan migrate`

* `php artisan serve`

 **OR IF YOUR PHP IS NOT `mcrypt` COMPATIBLE:**

 `C:/path/to/xampp5.6.33/php/php.exe artisan serve`

## Features
 + Librarians can be given their authorized login ID and password without which system can not be accessed.
 + Students can access only limited features, i.e., public access level features which include **searching a book** and **student registration form**
 + After logging in librarians can search for a book, book issue or a student from home panel itself
 + Librarians need to make an entry for new books, to automate the process they simply need to enter the number of issues and the Issue ID for each book issue would generate automatically
 + Another responsibility of a librarian is to make approve students because the documents are to verified (or some manual work) so they have a panel to simply approve / reject students and to view all approved students. The librarian ID also gets stored along with each approved/rejected student to keep a track for future.
 + The most important feature for any library is to issue and return books. A panel to view all outstanding logs and a super simple panel to issue and return books for all librarians


![](meta/screencapture-library-local-1450375427449.png)

--------------------------
Feel free to contact me via [email](http://goo.gl/68kmd6)
