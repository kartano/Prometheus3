<?php
/**
 * Web Service property bag holder to contain HTTP headers from requests, and to send out with responses.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype.
 */

namespace SunsetCoders\Core\WebServices;

/**
 * Class WebServicePropertyBag
 * @package SunsetCoders\Core\WebServices
 */
class WebServicePropertyBag implements \ArrayAccess, \Iterator, \Countable
{
    /** @var array $properties An array containing header properties for a request or a response. */
    private $properties;

    /** @var int $iteratorPosition Position in use with the Iterator interface */
    private $iteratorPosition;

    /**
     * WebServicePropertyBag constructor.
     * @param array $properties
     */
    public function __construct(array $properties=[])
    {
        $this->properties=$properties;
        $this->iteratorPosition=0;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->properties[] = $value;
        } else {
            $this->properties[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->properties[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->properties[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->properties[$offset]) ? $this->properties[$offset] : null;
    }

    public function rewind()
    {
        $this->iteratorPosition=0;
    }

    public function current()
    {
        return $this->properties[$this->iteratorPosition];
    }

    public function key()
    {
        return $this->iteratorPosition;
    }

    public function next()
    {
        ++$this->iteratorPosition;
    }

    public function valid()
    {
        return isset($this->properties[$this->iteratorPosition]);
    }

    public function count()
    {
        return count($this->properties);
    }
}
