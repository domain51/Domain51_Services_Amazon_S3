<?php

class Domain51_Service_Amazon_S3
{
    public function __construct()
    {
        
    }
    
    // @todo make capable of creating a bucket as well as an object
    public function create($name)
    {
        return new Domain51_Service_Amazon_S3_Object();
    }
    
    public function bucket($name)
    {
        return new Domain51_Service_Amazon_S3_Bucket();
    }
    
    public function get($name)
    {
        return new Domain51_Service_Amazon_S3_Object();
    }
    
    public function delete($name)
    {
        return true;
    }
}