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
*  To employ Bootstrap 4, jQuery and  as the main UI tools jQueryUI.
## Pre-requisites
*  LAMP stack, using the [XAMPP Library][1] available online will cover all these requirements.
*  [PHP 7.2.11 as a minimum][2]
*  [MariaDB 10.1.38.][3]
*  [Apache 2.4.38][4]
*  [Composer][5]
*  [Bower][6]
*  [NPM][7]
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
5. If you are using WINDOWS, be sure to uncomment the following line from the PHP.INI file:
```bash
    extension=intl
```
6. Be sure to create a SunsetCoders\SiteSpecific\Config\Config.yaml file.  Use the sample_config.yaml as a guide.
7. Setup your own site specific autoloader class in the root directory.  Use the SampleSiteSpecificAutoload
class as a guide.  Be sure to rename this to "SiteSpecificAutoload" class once you are ready.

* All of your own classes should be contained in or within subfolders under the SunsetCoders\SiteSpecific folder, OR the \Public
folder.
    * **DO NOT** put your own site specific classes in ANY OTHER FOLDER.
    * Use a copy of the \SiteSpecificAutoloadExample.php class to build your own class autoloader.  This class contains its OWN class map, so you do not need a second class map.

# Directory Structure

```text
.htaccess                           -   Apache settings to force URL rewrites.
index.php                           -   The access point to your website.  All autoloaders are loaded here.
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
        \Models                     -   Generic models that will be available to ALL websites are in here.
    \DataAccess                     -   DB access classes and utilities reside here.
    \Exception                      -   Common exceptions to ALL sites will sit in here.
    \Maintenance                    -   CLI based scripts for site management and construction appear here.
    \PageRender                     -   Classes to control page rendering are in here.  These are SITE AGNOSTIC!!!!!!
    \SiteSpecific                   -   Any classes or resources specific to a particular site appear inside here.
        \Config                     -   Your site specific config files (DB passwords etc etc) appear here.
        \Models                     -   Site specific models appear in here.
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

