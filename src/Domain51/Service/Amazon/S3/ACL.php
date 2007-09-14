<?php

/**
 * @todo add support for non-canned ACLs
 */
class Domain51_Service_Amazon_S3_ACL
{
    protected $_valid_canned_policies = array(
        'private',
        'public-read',
        'public-read-write',
    );
    
    private $_canned = false;
    
    public function __construct($canned_access_policy = false)
    {
        if ($canned_access_policy != false && !in_array($canned_access_policy, $this->_valid_canned_policies)) {
            throw new Domain51_Service_Amazon_S3_ACL_UnknownCannedPolicyException($canned_access_policy);
        }
        $this->_canned = $canned_access_policy;
    }
    
    public function isCanned()
    {
        return $this->_canned !== false;
    }
    
    public function __toString()
    {
        return $this->_canned;
    }
}

class Domain51_Service_Amazon_S3_ACL_UnknownCannedPolicyException extends Exception { }
