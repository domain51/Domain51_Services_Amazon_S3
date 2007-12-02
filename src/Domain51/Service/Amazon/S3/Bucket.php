<?php

class Domain51_Service_Amazon_S3_Bucket
{
    static private $counter = 0;
    private $_connection = null;
    private $_uri = null;
    
    public function __construct($uri, Domain51_Service_Amazon_S3_Connection $connection)
    {
        $this->_uri = $uri;
        $this->_connection = $connection;
    }
    
    public function has($name)
    {
        // hard coded to test
        self::$counter++;
        return (self::$counter % 2 == 0);
    }
    
    public function get($name)
    {
        return new Domain51_Service_Amazon_S3_Object(
            new Domain51_Service_Amazon_S3_Uri("{$this->_uri->bucket}/{$name}"),
            $this->_connection
        );
    }
}