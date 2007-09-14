<?php

class Domain51_Service_Amazon_S3_Object
{
    public $contents = "This is a sample file to be uploaded to S3";
    public function __construct()
    {
        
    }
    
    public function __call($method, $arguments)
    {
        return $this;
    }
}