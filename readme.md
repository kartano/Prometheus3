# Prometheus 3
## Introduction
Prometheus 3 is a basic web framework for use in creating websites for SunsetCoders.
It is designed to operated with a standard LAMP stack.
The framework is design to allow for:
*  Website agnostic.  Nothing in the framework should have any tight binding to any particular site or project.
*  Secured database connection objects that abstract out hard-coded database methods from PHP.
*  A page generation library to make the rendering of web pages cacheable and provide a single point of truth for the
   implementation of themes.
*  To allow for the standarized handling of user logins and security.
*  To allow for Composer as the main PHP package manager.
*  To employ Bootstrap 4, jQuery and  as the main UI tools.jQueryUI
## Pre-requisites
*  LAMP stack, using the [XAMPP Library](https://www.apachefriends.org/index.html) available online will cover all these requirements.
**  PHP 7.2.11 as a minimum.[1]
**  MariaDB 10.1.38.[2]
**  Apache 2.4.38[3]
**  Composer[4]
**  Bower[5]
**  NPM[6]
## Setting up for development
1. Clone the git repository into the required web directory.
2. Install the necessary PHP libraries via Composer
```
    composer install
```
3. Install the necessary client resource libraries via Bower
```
    bower install
```
4. Install the necessary client resource libraries via NPM
```
    npm install
```
## Licenses
The third party libraries used are subject to their license terms. To see a list
 of the libraries used, refer to the composer.json, bower.json and package.json files.
 [1]: http://us1.php.net/downloads.php "PHP"
 [2]: https://www.mysql.com/downloads/ "MySQL"
 [3]: https://httpd.apache.org/download.cgi "Apache2"
 [4]: https://getcomposer.org "Composer"
 [5]: https://bower.io "Bower"
 [6]: https://www.npmjs.com/get-npm "NPM"
