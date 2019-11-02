<?php
/**
 * Wrapper for INBOUND service requests from a client.
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version         1.0.0           Prototype/
 */

namespace SunsetCoders\Core\WebServices;

/**
 * Class ServiceRequest
 * @package SunsetCoders\Core\WebServices
 */
class ServiceRequest
{
    /** @var WebServicePropertyBag $propertyBag Property bag containing headers SENT to the web service from the client. */
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
