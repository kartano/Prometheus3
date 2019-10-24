<?php
/**
 * Abstract class for all repositories.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version     1.0.0           Prototype.
 */
namespace SunsetCoders\Core\Repositories;
use SunsetCoders\Exception;

/**
 * Class Repository
 * @package SunsetCoders\Core\Repositories
 */
abstract class Repository
{
    /**
     * Handles loads from data source.
     * @throws Exception\UnimplementedException
     */
    public function load()
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }

    /**
     * Handles updates of data.
     * @throws Exception\UnimplementedException
     */
    public function save()
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }

    /**
     * Handles deletion of data.
     * @throws Exception\UnimplementedException
     */
    public function delete()
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }
}
