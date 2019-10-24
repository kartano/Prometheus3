# Prometheus 3
## Introduction
Prometheus 3 is a basic web framework for use in creating websites for SunsetCoders.
It is designed to operated with a standard LAMP stack.
The framework is design to allow for:
*  Website agnostic.  Nothing in the framework should have any tight binding to any particular site or project.
*  Secured database connection objects that abstract out hard-coded database methods from PHP.
*  A page generation library to make the rendering of web pages cacheable and provide a single point of truth for the
   implementation of themes.
*  To allow for the standardized handling of user logins and security.
*  To allow for Composer as the main PHP package manager.
*  To employ Bootstrap 4, jQuery and  as the main UI tools jQueryUI.
## Overall Design Goals for this Framework
1.  The entire framework should be drop-in.  If we add features, or fix bugs, the entire framework should just drop straight into ANY existing site using it with no need for modifications.
2.  The framework should allow modules for common website sites.  E-commerce, photo galleries etc.
3.  The framework should allow for multiple JS frameworks including Angular (which is my personal favorite).
4.  The framework should be completely site agnostic.  NOTHING in the code should be aimed specifically at a particular site, except for the logic within modules (such as e-commerce).
5.  Maintenance of all sites should be done using PHP-CLI scripts - somewhat akin to Symfony 4.
6.  All sites will have common DB tables.  Tables within the DB that are particular to modules such as e-commerce will be pre-pended with terms to help group tables within the schema.
7.  All code will be PHP 7.2 as a minimum.
8.  All code MUST follow the PSR standards.
9.  I plan to use DOCKER so that developers can work with local development on sites.
10.  I plan to use PHPDocumentor to keep technical documentation of the framework up to date at all times.  To this end, ALL CODE MUST contain PHP Doc Blocks.
11.  Additional libraries will be brought into the framework using NPM, Bowser, and Composer.
12.  All version control is through GIT.
13.  Multilingual.  I'm aiming to provide language translation files to allow for different locales - in a style very similar to Symfony.
## Pre-requisites
*  LAMP stack, using the [XAMPP Library][1] available online will cover all these requirements.
*  [PHP 7.2.11 as a minimum][2]
*  [MariaDB 10.1.38.][3]
*  [Apache 2.4.38][4]
*  [Composer][5]
*  [Bower][6]
*  [NPM][7]
*  [YARN][8]
## Setting up for development
1. Clone the git repository into the required web directory.
2. Install the necessary PHP libraries via Composer
```bash
    composer install
```
3. Install the necessary client resource libraries via Bower
```bash
    bower install
```
4. Install the necessary client resource libraries via NPM
```bash
    npm install
```
5. Install the necessary files via YARN.
```bash
    yarn install
```
6. If you are using WINDOWS, be sure to uncomment the following line from the PHP.INI file:
```bash
    extension=intl
```
7. Be sure to create a SunsetCoders\SiteSpecific\Config\Config.yaml file.  Use the sample_config.yaml as a guide.
8. Setup your own site specific autoloader class in the root directory.  Use the SampleSiteSpecificAutoload
class as a guide.  Be sure to rename this to "SiteSpecificAutoload" class once you are ready.

* All of your own classes should be contained in or within subfolders under the SunsetCoders\SiteSpecific folder, OR the \Public
folder.
    * **DO NOT** put your own site specific classes in ANY OTHER FOLDER.
    * Use a copy of the \SiteSpecificAutoloadExample.php class to build your own class autoloader.  This class contains its OWN class map, so you do not need a second class map.

# Directory Structure

```text
SiteSpecificAutoloadSample.php      -   A sample file showing how to build a site specific autoloader for your classes.
                                        This should be SITE AGNOSTIC.
SunsetCodersClassAutoloader.php     -   Autoloader class to build autoloaders for SITE AGNOSTIC classes from the classmap.
                                        You should NEVER NEED TO CHANGE THIS FILE.
SunsetCodersClassMap.php            -   Contains an array to map namespaces to specific folders and classes.
                                        SITE AGNOSTIC - DO NOT CHANGE.
                                        If you wish to map your OWN classes for a specific site,
                                        use your own SpecificAutoloadSample.php instead.                                     
\Public                             -   All of your classes used to render pages for the end user go in this folder.
                                        It is the ONLY folder accessible to the web.
\SunsetCoders                       -   All code specific to Prom3 will mostly stored under here.
                                        NONE of this is visible to the web.
    \Config                         -   The configuration class providing access to site specific settings is in here.
    \Core                           -   Core modules and controllers that are NOT site specific are in here.
        \Controllers                -   Core controller classes.
        \Models                     -   Generic models classes.
        \Repositories               -   Generic repository classes.
    \DataAccess                     -   DB access classes and utilities reside here.
    \Exception                      -   Common exceptions to ALL sites will sit in here.
    \Maintenance                    -   CLI based scripts for site management and construction appear here.
    \PageRender                     -   Classes to control page rendering are in here.  These are SITE AGNOSTIC!!!!!!
    \SiteSpecific                   -   Any classes or resources specific to a particular site appear inside here.
        \Config                     -   Site specific config files (DB passwords etc etc) appear here.
        \Controllers                -   Site specific controllers for models will appear here.
        \Models                     -   Site specific models will appear here.
        \Repositories               -   Site specific repositories for all models will appear here.
```

## Licenses
The third party libraries used are subject to their license terms. To see a list of the libraries used, refer to the composer.json, bower.json and package.json files.

[1]: https://www.apachefriends.org/index.html "XAMPP" 
[2]: http://us1.php.net/downloads.php "PHP"
[3]: https://www.mysql.com/downloads/ "MySQL"
[4]: https://httpd.apache.org/download.cgi "Apache2"
[5]: https://getcomposer.org "Composer"
[6]: https://bower.io "Bower"
[7]: https://www.npmjs.com/get-npm "NPM"
[8]: https://yarnpkg.com/en/docs/install#windows-stable "YARN"
