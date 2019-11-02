<?php
/**
 * Wrapper for OUTBOUND service responses to a client.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype/
 */

namespace SunsetCoders\Core\WebServices;

/**
 * Class ServiceResponse
 * @package SunsetCoders\Core\WebServices
 */
class ServiceResponse
{
    /** @var WebServicePropertyBag $propertyBag Property bag containing headers TO BE SENT BACK to the web service from the client. */
    private $propertyBag;

    /**
     * ServiceRequest constructor.
     * @param WebServicePropertyBag $propertyBag
     */
    public function __construct(WebServicePropertyBag $propertyBag)
    {
        $this->propertyBag=$propertyBag;
    }

    /**
     * @return WebServicePropertyBag
     */
    public function getProperties(): WebServicePropertyBag
    {
        return $this->propertyBag;
    }
}
