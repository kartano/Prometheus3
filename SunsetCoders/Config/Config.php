<?php
/**
 * Prometheus 3 configuration class
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.0			Prototype.
 */

namespace SunsetCoders\Config;

/**
 * Class Config
 * @package SunsetCoders\Config
 */
final class Config
{
	/** @var array Contents of parsed configuration file. */
	static $parsedFile=null;

	/**
	 * Config constructor.
	 * @throws \Exception If parsing of the config.yaml file fails.
	 */
	public function __construct()
	{
		if (!file_exists('config.yaml')) {
			throw new \Exception('No configuration file was found.');
		}
		try {
			self::reparseConfigFile();
		} catch (\Exception $exception) {
			throw $exception;
		}
	}

	/**
	 * Returns the settings array.
	 * @return array
	 * @throws \Exception
	 */
	public static function getSettings() : array
	{
		try {
			if (self::$parsedFile==null) {
				self::reparseConfigFile();
			}
			return self::$parsedFile;
		} catch (\Exception $exception) {
			throw $exception;
		}
	}

	/**
	 * Reparses the contents of the config.yaml file.
	 * @throws \Exception  If parsing of the config.yaml file fails.
	 */
	protected static function reparseConfigFile() : void
	{
		self::$parsedFile=yaml_parse_file('config.yaml');
		if (!self::$parsedFile) {
			throw new \Exception('Failed to parse configuration file');
		}
	}
}
