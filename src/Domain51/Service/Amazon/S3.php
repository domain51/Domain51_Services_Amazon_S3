<?php

class Domain51_Service_Amazon_S3
{
    static public $connection_type = 'Curl';
    
    private $_connection = null;
    
    public function __construct($access_key, $secret_key)
    {
        $this->_connection = new Domain51_Service_Amazon_S3_Connection(
            $access_key,
            $secret_key,
            Domain51_Service_Amazon_S3::$connection_type
        );
    }
    
    // @todo make capable of creating a bucket as well as an object
    public function create($name)
    {
        $uri = new Domain51_Service_Amazon_S3_Uri($name);
        return new Domain51_Service_Amazon_S3_Object($uri, $this->_connection);
    }
    
    public function bucket($name)
    {
        return new Domain51_Service_Amazon_S3_Bucket(
            new Domain51_Service_Amazon_S3_Uri($name),
            $this->_connection
        );
    }
    
    public function get($name)
    {
        $uri = new Domain51_Service_Amazon_S3_Uri($name);
        return new Domain51_Service_Amazon_S3_Object($uri, $this->_connection);
    }
    
    public function delete($name)
    {
        return true;
    }
}