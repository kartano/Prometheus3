<?php
/**
 * Entry point for access to SunsetCoders sight.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.0			Prototype
 */

require_once('SunsetCodersClassAutoloader.php');
require_once('SunsetCodersClassMap.php');
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
