<?php
/**
 * Class SunsetCodersClassmap
 * Maps class locations to namespaces.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.1			Added namespace handling for Controllers and Repositories.
 */

class SunsetCodersClassmap
{
	public static function getClassMap()
	{
		return [
            'SunsetCoders\Config' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Config',
            'SunsetCoders\Core\Controllers' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'Controllers',
            'SunsetCoders\Core\Models' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'Models',
            'SunsetCoders\Core\Repositories' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'Repositories',
			'SunsetCoders\DataAccess' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'DataAccess',
            'SunsetCoders\Exception' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'Exception',
            'SunsetCoders\PageRender' => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SunsetCoders'.DIRECTORY_SEPARATOR.'PageRender',
		];
	}
}
