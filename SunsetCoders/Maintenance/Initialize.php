<?php
/**
 * Initialize script - initializes the database and pre-configures Prometheus 3 for a basic
 */

require_once('Commmon.php');

use SunsetCoders\DataAccess;

try {
    $db = DataAccess\DataAccess::getRootConnection();
} catch (\Exception $exception) {
    die($exception);
}

