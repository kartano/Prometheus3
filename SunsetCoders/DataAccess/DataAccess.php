<?php
/**
 * SunsetCoders DataAccess class.
 * An extension of PHP's PDO class.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.0			Prototype.
 */

namespace SunsetCoders\DataAccess;
use SunsetCoders\Config;

/**
 * Class DataAccess
 * @package SunsetCoders\DataAccess
 */
class DataAccess extends \PDO
{
	/**
	 * Get a standard connection to the database.
	 * @return \PDO A new standard connection to the database.
	 * @throws \Exception Thrown if PDO does not connect, or if there is a configuration fault.
	 */
	public static function getConnection()
	{
		try {
			$settings=[
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
				\PDO::ATTR_PERSISTENT => true
			];

			$catalogue=Config\Config::getSettings()['database']['standard']['catalogue'];
			$host=Config\Config::getSettings()['database']['standard']['host'];
			$user=Config\Config::getSettings()['database']['standard']['user'];
			$password=Config\Config::getSettings()['database']['standard']['password'];
			$dsn = 'mysql:dbname='.$catalogue.';host='.$host;
			return new \PDO($dsn, $user, $password, $settings);
		} catch (\Exception $exception) {
			throw $exception;
		}
	}

	/**
	 * Get a ROOT connection to the database.  You should NEVER BE USING THIS for regular work in the system!!!!!
	 * @return \PDO A new standard connection to the database.
	 * @throws \Exception Thrown if PDO does not connect, or if there is a configuration fault.
	 */
	public static function getRootConnection()
	{
		try {
			$settings=[
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
				\PDO::ATTR_PERSISTENT => true
			];

			$catalogue=Config\Config::getSettings()['database']['root']['catalogue'];
			$host=Config\Config::getSettings()['database']['root']['host'];
			$user=Config\Config::getSettings()['database']['root']['user'];
			$password=Config\Config::getSettings()['database']['root']['password'];
			$dsn = 'mysql:dbname='.$catalogue.';host='.$host;
			return new \PDO($dsn, $user, $password, $settings);
		} catch (\Exception $exception) {
			throw $exception;
		}
	}
}
