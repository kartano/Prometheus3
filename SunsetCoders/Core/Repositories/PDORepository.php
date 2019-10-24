<?php
/**
 * Abstract class for a Repository that retrieves data from a PDO database source.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype
 */

namespace SunsetCoders\Core\Repositories;
use SunsetCoders\DataAccess;
use SunsetCoders\Exception;

/**
 * Class PDORepository
 * @package SunsetCoders\Core\Repositories
 */
abstract class PDORepository extends Repository
{
    /** @var DataAccess\DataAccess Instance of database. */
    private $db;

    /**
     * PDORepository constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->db=DataAccess\DataAccess::getConnection();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

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
