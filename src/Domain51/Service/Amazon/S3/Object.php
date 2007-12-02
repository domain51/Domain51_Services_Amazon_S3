<?php

class Domain51_Service_Amazon_S3_Object
{
    private $_data = array(
        'contents' => "This is a sample file to be uploaded to S3",
    );
    
    private $_connection = null;
    
    public function __construct(Domain51_Service_Amazon_S3_Uri $uri, Domain51_Service_Amazon_S3_Connection $connection)
    {
        $this->_data['bucket'] = $uri->bucket;
        $this->_data['name'] = $uri->object;
        $this->_data['full_name'] = (string)$uri;
        $this->_data['uri'] = $uri;
        $this->_data['params'] = array();
        
        $this->_connection = $connection;
    }
    
    public function __call($method, $arguments)
    {
        return $this;
    }
    
    public function __set($key, $value)
    {
        // @todo check for valid type
        $this->_data[$key] = $value;
    }
    
    public function __get($key)
    {
        // @todo check for valid type
        return $this->_data[$key];
    }
    
    public function put()
    {
        // pseudo code
        return $this->_connection->put(
            $this->uri,
            $this->params
        );
    }
}