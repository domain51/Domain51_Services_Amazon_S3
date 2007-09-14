<?php

class Domain51_Service_Amazon_S3_Bucket
{
    static private $counter = 0;
    public function __construct()
    {
        
    }
    
    public function has($name)
    {
        // hard coded to test
        self::$counter++;
        return (self::$counter % 2 == 0);
    }
    
    public function get($name)
    {
        return new Domain51_Service_Amazon_S3_Object();
    }
}