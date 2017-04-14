# Idea Diary

This project is a **Idea Diary** built with Nette Framework. Users can add ideas for projects on this website. Users can also view and edit their ideas. Guests can view and comment on the ideas using the comment box.

* Features/Technologies: 
  * Nette Framework
  * MVC, PHP OOP, PHPMyAdmin
  * MySQL CRUD, Superglobals (GET, POST)

## Version
1.0.0

## Live Demo
 [IdeaDiary](http://jyotsnasingh.com/projects/Nette/IdeaDiary/www/)


## Usage

**Home** | **View Idea**
--- | ---
Home Page | View Idea
![alt text](https://github.com/Jyotsna-Singh/Nette-IdeaDiary/blob/master/www/home.PNG)  | ![alt text](https://github.com/Jyotsna-Singh/Nette-IdeaDiary/blob/master/www/idea.PNG)

## Vendors
Nette - [http://nette.org/](http://nette.org/)  
 

## License
MIT License


About Nette 
=================

This is a simple, skeleton application using the [Nette](https://nette.org). This is meant to
be used as a starting point for your new projects.

[Nette](https://nette.org) is a popular tool for PHP web development.
It is designed to be the most usable and friendliest as possible. It focuses
on security and performance and is definitely one of the safest PHP frameworks.


Requirements
------------

PHP 5.6 or higher.


Installation
------------

The best way to install Web Project is using Composer. If you don't have Composer yet,
download it following [the instructions](https://doc.nette.org/composer). Then use command:

	composer create-project nette/web-project path/to/install
	cd path/to/install


Make directories `temp/` and `log/` writable.


Web Server Setup
----------------

The simplest way to get started is to start the built-in PHP server in the root directory of your project:

	php -S localhost:8000 -t www

Then visit `http://localhost:8000` in your browser to see the welcome page.

For Apache or Nginx, setup a virtual host to point to the `www/` directory of the project and you
should be ready to go.

**It is CRITICAL that whole `app/`, `log/` and `temp/` directories are not accessible directly
via a web browser. See [security warning](https://nette.org/security-warning).**
