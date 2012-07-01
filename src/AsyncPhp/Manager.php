<?php
namespace AsyncPhp;

class Manager
{
    /**
     * @var String
     */
    const JSFRAMEWORK_JQUERY = 'jQuery';


    /**
     * @var String
     */
    protected $jsFramework   = self::JSFRAMEWORK_JQUERY;
    protected $jsDir         = '/js/';
    protected $jQueryVersion = '1.7.2';
    protected $jsAsyncPhp    = 'asyncphp.js';


    /**
     * @var Manager
     */
    static protected $instance;


    /**
     * @var Request
     */
    protected $request;


    /**
     * Retrieve Instance of AsyncPhp\Manager
     *
     * @return  Manager
     */
    static public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Manager();
        }

        return self::$instance;
    }


    /**
     * Set the URL for the publically available JD directory
     *
     * @param   String  $dir    Directory
     * @return  Manager
     */
    public function setJsDir($dir)
    {
        if (substr($dir, -1) == "/") {
            $dir = substr($dir, 0, -1);
        }
        $this->jsDir = $dir;
        return $this;
    }


    /**
     * Set the JS framework to use
     *
     * @param   String  $framework  Javascript Framework
     * @return  Manager
     */
    public function setJsFramework($framework)
    {
        $this->jsFramework = $framework;
        return $this;
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
     * Retrieve the AsyncPhp request object
     *
     * @return  Request
     */
    public function getRequest()
    {
        if (!$this->request) {
            $this->request = new Request();
        }

        return $this->request;
    }


    /**
     * Retrieve a new response object to be built and returned
     *
     * @return  Response
     */
    public function newResponse()
    {
        return new Response();
    }


    /**
     * Generate JS include script tags
     *
     * @param   String  $indent Indent before the tags (for pretty HTML)
     * @return  String
     */
    public function generateIncludes($indent = "")
    {
        /**
         * Switch framework types
         */
        $scripts = Array();
        switch ($this->jsFramework) {
            case self::JSFRAMEWORK_JQUERY:
                $scripts[] = "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/{$this->jQueryVersion}/jquery.min.js\"></script>";
                $scripts[] = "<script>window.jQuery || document.write('<script src=\"{$this->jsDir}/jquery-{$this->jQueryVersion}.min.js\"><\/script>')</script>";
                break;
        }


        /**
         * Add asyncphp.js
         */
        $scripts[] = "<script src='{$this->jsDir}/{$this->jsAsyncPhp}' type='text/javascript'></script>";


        /**
         * Build and return
         */
        return $indent.implode("\n{$indent}", $scripts)."\n";
    }
}

