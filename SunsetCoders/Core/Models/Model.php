<?php
/**
 * Abstract core class model.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */

namespace SunsetCoders\Config\Models;
use SunsetCoders\Exception;

/**
 * Class Model
 * @package SunsetCoders\Config\Models
 */
abstract class Model
{
    /**
     * Load the models data from the DB.
     * @param int $id The ID with with to load this model from the DB.
     * @throws Exception\UnimplementedException
     * @return void
     */
    public function load(int $id): void
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }

    /**
     * Initialize the model with data from an array.
     * @param array $data
     * @throws Exception\UnimplementedException
     */
    public function initialize(array $data): void
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }

    /**
     * Delete this model from the database.
     * @throws Exception\UnimplementedException
     */
    public function delete(): void
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }

    /**
     * Save the contents of this model to the database.
     * @throws Exception\UnimplementedException
     */
    public function save(): void
    {
        throw new Exception\UnimplementedException(__METHOD__.' is not implemented.');
    }
}