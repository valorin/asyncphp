<?php
namespace AsyncPhp;

class Request
{
    /**
     * @var Array   HTTP Methods
     */
    const HTTP_GET    = 1;
    const HTTP_POST   = 2;
    const HTTP_PUT    = 4;
    const HTTP_DELETE = 8;
    const HTTP_ALL    = 15;


    /**
     * Checks the HTTP method used
     *
     * @param   Integer $method HTTP method
     * @return  Boolean
     */
    public function isMethod($method)
    {

    }


    /**
     * Retrieve all request parameters
     *
     * @param   Integer $method HTTP Method
     * @return  Array
     */
    public function getParams($method = self::HTTP_ALL)
    {

    }


    /**
     * Retrieve specific value from parameters given the key
     * \w optional default value and HTTP method limiter
     *
     * @param   String  $key        Parameter key
     * @param   Mixed   $default    Default response value
     * @param   Integer $method     HTTP Method
     * @return  Mixed
     */
    public function getParam($key, $default = null, $method = self::HTTP_ALL)
    {

    }
}
