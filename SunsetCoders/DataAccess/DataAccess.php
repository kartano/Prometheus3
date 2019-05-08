<?php
/**
 * SunsetCoders DataAccess class.
 * An extension of PHP's PDO class.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version            1.0.0            Prototype.
 */

namespace SunsetCoders\DataAccess;

use SunsetCoders\Config;

/**
 * Class DataAccess
 * @package SunsetCoders\DataAccess
 */
class DataAccess extends \PDO
{
    private $godMode=false;

    public function __constructor()
    {
        // SM:  Squash PDO's constructor.  We use factory methods.
    }

    /**
     * Create a new instance of DataAccess with normal privileges.
     * @return DataAccess New DataAccess class with standard privileges.
     * @throws \Exception Thrown is creating the DB connection fails.
     */
    public static function getConnection() : DataAccess
    {
        try {
            $settings = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                \PDO::ATTR_PERSISTENT => true
            ];

            $catalogue = Config\Config::getSettings()['database']['standard']['catalogue'];
            $host = Config\Config::getSettings()['database']['standard']['host'];
            $user = Config\Config::getSettings()['database']['standard']['user'];
            $password = Config\Config::getSettings()['database']['standard']['password'];
            $dsn = 'mysql:dbname=' . $catalogue . ';host=' . $host;
            $db = new DataAccess($dsn, $user, $password, $settings);
            $db->setGodMode(false);
            return $db;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Create a new instance of DataAccess with GOD level privileges.
     * @return DataAccess ROOT level DataAccess connection.  IT IS NOT RECOMMENDED TO USE THIS!!!!!!!
     * @throws \Exception Thrown is creating the DB connection fails.
     */
    public static function getRootConnection(): DataAccess
    {
        try {
            $settings = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                \PDO::ATTR_PERSISTENT => true
            ];

            $catalogue = Config\Config::getSettings()['database']['root']['catalogue'];
            $host = Config\Config::getSettings()['database']['root']['host'];
            $user = Config\Config::getSettings()['database']['root']['user'];
            $password = Config\Config::getSettings()['database']['root']['password'];
            $dsn = 'mysql:dbname=' . $catalogue . ';host=' . $host;
            $db = new DataAccess($dsn, $user, $password, $settings);
            $db->setGodMode(true);
            return $db;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @return bool  TRUE if this instance of DataAccess is in GOD mode.
     */
    public function isGodMode(): bool
    {
        return $this->godMode;
    }

    /**
     * @param bool $godMode TRUE if this instances is in God/Root mode.
     */
    public function setGodMode(bool $godMode): void
    {
        $this->godMode = $godMode;
    }

    /**
     * @param string $tableName Table to check for.
     * @return bool TRUE if the table exists, FALSE if it doesn't.
     */
    public function tableExists(string $tableName): bool
    {
        try {
            $statement=$this->prepare("SHOW TABLES LIKE :table_name");
            $statement->bindParam(':table_name', $tableName, self::PARAM_STR);
            $statement->execute();
            return $statement->rowCount()==1;
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }
}
