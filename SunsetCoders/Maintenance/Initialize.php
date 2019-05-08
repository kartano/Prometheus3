<?php
/**
 * Initialize script - initializes the database and pre-configures Prometheus 3 for a basic
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */

use SunsetCoders\DataAccess;

require_once('Common.php');

echo 'Initialization Commencing.'.PHP_EOL;

try {
    $db = DataAccess\DataAccess::getRootConnection();
} catch (\Exception $exception) {
    die($exception);
}

$db->beginTransaction();

// SM:  Create the migrations table if it doesn't exist.
if (!$db->tableExists('_migrations')) {
    echo "\t\tCreating Migrations table.".PHP_EOL;
    $query="CREATE TABLE `prometheus3`.`_migrations`  (
        `MigrationID` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
        `InstalledDate` datetime(6) NOT NULL,
        `ScriptName` varbinary(255) NOT NULL,
        PRIMARY KEY (`MigrationID`),
        UNIQUE INDEX(`ScriptName`)
        );";
    try {
        $db->prepare($query)->execute();
    } catch (\PDOException $exception) {
        $db->rollBack();
        die($exception);
    }
    echo "\t\tCreated.".PHP_EOL;
} else {
    echo "\t\tSKIPPED:  Table exists.".PHP_EOL;
}

$db->commit();

echo 'Initialization Completed Successfully.'.PHP_EOL;
