<?php

class Domain51_Service_Amazon_S3_Connection
{
    private $_access_key = null;
    private $_secret_key = null;
    private $_adapter = null;
    
    public function __construct($access_key, $secret_key, $connection_type)
    {
        $this->_access_key = $access_key;
        $this->_secret_key = $secret_key;
        
        $adapter_name = 'Domain51_Service_Amazon_S3_Connection_Adapter_' . $connection_type;
        // @todo add check for adapter existence
        // @todo check that adapter implements Domain51_Service_Amazon_S3_Connection_Adapter interface
        $this->_adapter = new $adapter_name();
    }
    
    /**
     * @todo gracefully handle unknown request types
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array(
            array($this->_adapter, $method),
            $arguments
        );
    }
}