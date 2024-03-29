<?php
/**
 * Common requires and includes useful for any maintenance scripts.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */

// SM:  Handle SunsetCoders autoloaders.
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'SunsetCodersClassAutoloader.php');
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'SunsetCodersClassMap.php');
foreach(SunsetCodersClassMap::getClassMap() as $namespacePrefix => $baseDir) {
    $SunsetCodersAutoloader = new SunsetCodersClassAutoloader();
    // SM:  Specify which class files we are covering.
    // SM:  Map the namespace to the base path.
    $SunsetCodersAutoloader->addNamespace($namespacePrefix, $baseDir);
    $SunsetCodersAutoloader->register();
}

// SM:  If we find a composer autoloader, bring that in.
$composerAutoloadFile=dirname(__FILE__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
if (file_exists($composerAutoloadFile)) {
    require_once $composerAutoloadFile;
}
