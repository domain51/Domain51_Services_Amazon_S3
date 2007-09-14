<?php

class Domain51_Service_Amazon_S3_Uri
{
    private $_bucket = false;
    private $_object = false;
    
    public function __construct($uri)
    {
        preg_match('/^(s3:\/\/|\/)?([^\/]+)\/?(.*)$/', $uri, $matches);
        $this->_bucket = $matches[2];
        $this->_object = !empty($matches[3]) ? $matches[3] : false;
    }
    
    public function __get($key)
    {
        // @todo handle unknown property requests
        switch ($key) {
            case 'object' :
                return $this->_object;
            
            case 'bucket' :
                return $this->_bucket;
        }
    }
}