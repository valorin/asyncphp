<?php
namespace AsyncPhp;

class Manager
{
    /**
     * Retrieve Instance of AsyncPhp\Manager
     *
     * @return  Manager
     */
    static public function getInstance()
    {

    }


    /**
     * Add a function in the provided class to the listeners to be triggered if called
     *
     * @param   Object  $class      Class with function to call
     * @param   String  $function   Function to call
     * @return  Manager
     */
    public function addFunction($class, $function)
    {

    }


    /**
     * Adds a custom location which can be used for incoming ajax requests
     *
     * @param   String  $name   Location name/identifier
     * @param   String  $url    Location URL that will be called
     * @return  Manager
     */
    public function addLocation($name, $url)
    {

    }


    /**
     * Checks if the flag has been triggered in the JS
     *
     * @param   String  $flag   Flag to check for
     * @return  Boolean
     */
    public function isTriggered($flag)
    {

    }


    /**
     * Retrieve the AsyncPhp request object
     *
     * @return  Request
     */
    public function getRequest()
    {

    }


    /**
     * Retrieve a new response object to be built and returned
     *
     * @return  Response
     */
    public function newResponse()
    {

    }
}
