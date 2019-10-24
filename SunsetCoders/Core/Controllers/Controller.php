<?php
/**
 * Abstract class for Controllers.
 *
 * @author      Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */

namespace SunsetCoders\Core\Controllers;
use SunsetCoders\Core\Models as Models;

/**
 * Class Controller
 * @package SunsetCoders\Core\Controllers
 */
abstract class Controller
{
    /** @var Models\Model The Model being manipulated by this Controller. */
    private $Model;

    /**
     * Controller constructor.
     * @param Models\Model $Model
     */
    public function __construct(Models\Model $Model)
    {
        $this->Model=$Model;
    }
}
