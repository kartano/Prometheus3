<?php
/**
 * Abstract repository class for REST based repositories.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */
namespace SunsetCoders\Core\Repositories;
use SunsetCoders\Exception;

abstract class RESTRepository extends Repository
{
    /**
     * @throws \SunsetCoders\Exception\UnimplementedException
     */
    public function load()
    {
        try {
            parent::load();
        } catch (Exception\UnimplementedException $exception) {
            throw $exception;
        }
    }

    /**
     * @throws Exception\UnimplementedException
     */
    public function save()
    {
        try {
            parent::save();
        } catch (Exception\UnimplementedException $exception) {
            throw $exception;
        }
    }

    /**
     * @throws Exception\UnimplementedException
     */
    public function delete()
    {
        try {
            parent::save();
        } catch (Exception\UnimplementedException $exception) {
            throw $exception;
        }
    }
}
