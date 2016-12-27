# Library Management System

> An automated system to manage a public library. Admin panel for librarians to control and manage the system easily through an interactive interface.

 + [Development](#development)
 + [Setup](#setup)
 + [Features](#features)
 + [Screenshots](meta/README.md)

## Development
The backend of the system is developed on **[Laravel 4.2 PHP MVC Framework](http://laravel.com/)**
The front end is built on **[Edmin Responsive Bootstrap Admin Template](http://egrappler.com/responsive-bootstrap-admin-template-edmin/)** ([Demo](http://www.egrappler.com/edmin/index.html)) which is built on [Bootstrap v2.2.2](http://bootstrapdocs.com/v2.2.2/docs/) using [jQuery](https://blog.jquery.com/2013/02/04/jquery-1-9-1-released/) and [Underscore-Dot-JS](http://underscorejs.org/)

## Setup

```shell
git clone https://github.com/prabhakar267/library-management-system.git
cd library-management-system
```

```shell
[sudo] chmod -R 755 app/storage
```

```shell
composer install
```

 + Edit [mysql.config.php.sample](app/config/mysql.config.php.sample) according to your MySQL configurations and save it in the same directory as ```mysql.config.php```
 + Open your MySQL console / MySQL administration tool (like [phpMyAdmin](https://www.phpmyadmin.net/)) and import the [database dump](database/library.sql)

```shell
php artisan migrate
```

```shell
php artisan serve
```

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

