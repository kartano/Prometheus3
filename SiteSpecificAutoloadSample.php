<?php
/**
 * Class SiteSpecificAutoloadSample
 * DO NOT USE YOUR SITE SPECIFIC AUTOLOADER TO INCLUDE CORE CLASSES!!!!!
 * INCLUDE ONLY MAPINGS TO YOUR SITE SPECIFIC CLASSES INSTEAD!!!!
 *
 * @author Simon Mitchell <kartano@gmail.com?
 *
 * @version         1.0.0           An example autoloader that can be used for site specific classes.
 *                                  This should be renamed to "SiteSpecificAutoload.php" in order for the index.php in
 *                                  the root directory to find it.
 */

require_once('SunsetCodersClassAutoloader.php');

class SampleSiteSpecificAutoloadSample
{
    /**
     * SiteSpecificAutoloadSample constructor.
     */
    public function __construct()
    {
        foreach (self::getClassMap() as $namespacePrefix => $baseDir) {
            $SunsetCodersAutoloader = new SunsetCodersClassAutoloader();
            // SM:  Specify which class files we are covering.
            // SM:  Map the namespace to the base path.
            $SunsetCodersAutoloader->addNamespace($namespacePrefix, $baseDir);
            $SunsetCodersAutoloader->register();
        }
    }

    /**
     * @return array Array of classes and physical locations to map namespaces.
     */
    private static function getClassMap(): array
    {
        // SM:  At the very least, you should have this:
        return [
            'SunsetCoders\SiteSpecific\Models' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'SiteSpecific'.DIRECTORY_SEPARATOR.'Models'
        ];

        /*
        return [
            'SunsetCoders\Config' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Config',
            'SunsetCoders\Core\Models' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'Models',
            'SunsetCoders\DataAccess' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'DataAccess',
            'SunsetCoders\Exception' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Exception',
            'SunsetCoders\PageRender' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'PageRender',
        ];
        */
    }

}