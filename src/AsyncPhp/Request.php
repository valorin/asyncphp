<?php
namespace AsyncPhp;

class Request
{
    /**
     * @var Array
     */
    protected $types = Array('call', 'trigger');
    protected $data;


    /**
     * @var String
     */
    protected $type;
    protected $flag;
    protected $fn;
    protected $method;


    /**
     * Constructor
     *
     */
    public function __construct()
    {
        /**
         * Check for XHR request
         */
        if (!$this->isXhr()) {
            return;
        }


        /**
         * Check for 'asyncphp' param
         */
        if (!isset($_REQUEST['asyncphp'])
            || !in_array($_REQUEST['asyncphp'], $this->types)) {
                return;
        }


        /**
         * Parse params
         */
        $this->parseParams();
    }


    /**
     * Checks if the request is an XHR
     *
     * @return Boolean
     */
    public function isXhr()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest");
    }


    /**
     * Checks if the flag has been triggered in the JS
     *
     * @param   String  $flag   Flag to check for
     * @return  Boolean
     */
    public function isTriggered($flag)
    {
        /**
         * Check for flag trigger
         */
        return ($this->type == "trigger" && $this->flag == $flag);
    }


    /**
     * Checks the HTTP method used
     *
     * @param   String  $method HTTP method
     * @return  Boolean
     */
    public function isMethod($method)
    {
        return ($this->method == strtoupper($method));
    }


    /**
     * Retrieve all request parameters
     *
     * @return  Array
     */
    public function getParams()
    {
        return $this->data;
    }


    /**
     * Retrieve specific value from parameters given the key
     * \w optional default value and HTTP method limiter
     *
     * @param   String  $key        Parameter key
     * @param   Mixed   $default    Default response value
     * @return  Mixed
     */
    public function getParam($key, $default = null)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return $default;
    }


    /**
     * Parses the request parameters
     *
     * @return  Request
     */
    protected function parseParams()
    {
        /**
         * Basic params
         */
        $this->type = $_REQUEST['asyncphp'];
        $this->flag = isset($_REQUEST['flag']) ? $_REQUEST['flag'] : null;
        $this->fn   = isset($_REQUEST['fn'])   ? $_REQUEST['fn']   : null;


        /**
         * HTTP Method
         */
        $this->method = $_SERVER['REQUEST_METHOD'];


        /**
         * Save params
         */
        $this->data = $_REQUEST['parameters'];
    }
}

