<?php
/**
 * Entry point for access to SunsetCoders sight.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.0			Prototype
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'SunsetCodersClassAutoloader.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'SunsetCodersClassMap.php';

foreach(SunsetCodersClassMap::getClassMap() as $namespacePrefix => $baseDir) {
	$SunsetCodersAutoloader = new SunsetCodersClassAutoloader();
	// SM:  Specify which class files we are covering.
	// SM:  Map the namespace to the base path.
	$SunsetCodersAutoloader->addNamespace($namespacePrefix, $baseDir);
	$SunsetCodersAutoloader->register();
}

// SM:  Load in the site specific autoloader if there is one.
$composerAutoloadFile=dirname(__FILE__).DIRECTORY_SEPARATOR.'SiteSpecificAutoload.php';
if (file_exists($composerAutoloadFile)) {
    require_once $composerAutoloadFile;
}

// SM:  If we find a composer autoloader, bring that in.
$composerAutoloadFile=dirname(__FILE__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
if (file_exists($composerAutoloadFile)) {
	require_once $composerAutoloadFile;
}

// Remember to adjust the DocumentRoot and modrewrite settings to get this to work.
// Also remember the local .htaccess file.

// SEE:  https://www.binpress.com/tutorial/php-bootstrapping-crash-course/146

// SAMPLE OF CONF FILE APACHE:
/*
 * DocumentRoot /path/to/myapp/app/public
<Directory "/path/to/myapp/app/public">
  # other setting here
</Directory>
 */

// Then the local .htaccess looks likes this:
/*
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
 */

$bits = parse_url($_SERVER['REQUEST_URI']);
$query = isset($bits['query']) ? $bits['query'] : '';
$path = $bits['path'];

// SM:  Use $pageHome at this point to switch to what part of the site is being requested.
//      This is be either "home" if no URL was specified; or
//

/*
 * An example of how to process PATH to handle inbound page requests.
 * This is a lift from Prom2
 */
/*
switch(strtolower($path)) {
    case '/':
    case '/index.html':
    case '/index.php':
    case '':
        $options=new PR\PageOptions();
        $page = new Content\HomePage($database,$options);
        $page->renderPage();
        break;
    case '/robots.txt':
        require_once 'robots.php';
        break;
    case '/sitemap.xml':
        require_once 'sitemap.php';
        break;
    case '/admin':
        $options = new PR\PageOptions();
        $options->requires_logged_in=true;
        try {
            $page = new Admin\Prom2Admin($database, $options);
            $page->renderPage();
        } catch (Exceptions\NotLoggedInException $exception) {
            // Squash:  The abstract pagerenderer engine will automatically throw up the LOGIN screen if the user is not logged in.
            //          If they ARE, it will render the Prom2Admin page.
        }
        break;

    //============================================================================
    // TO DO:  This all should be in some kind of sitemap.
    //         Otherwise we will need a new url line in this switch for EVERY PAGE!
    //============================================================================

    case '/admin/useradminpage.php':
        try {
            $page = new Admin\UserAdminPage($database);
            $page->renderPage();
        } catch (Exceptions\NotLoggedInException $exception) {
            // Squash:  The abstract pagerenderer engine will automatically throw up the LOGIN screen if the user is not logged in.
            //          If they ARE, it will render the Prom2Admin page.
        }
        break;
    case '/admin/translationadminpage.php':
        try {
            $page = new Admin\TranslationAdminPage($database);
            $page->renderPage();
        } catch (Exceptions\NotLoggedInException $exception) {
            // Squash:  The abstract pagerenderer engine will automatically throw up the LOGIN screen if the user is not logged in.
            //          If they ARE, it will render the Prom2Admin page.
        }
        break;
    default:
        if (Settings::get('app','debug')) {
            echo "<pre>";
            print_r($path);
            echo "</pre>";
        }
        PR\PageHelper::throwHTTPError(404,'Page not found');
}
*/
