<?php
namespace AsyncPhp;

class Response
{
    /**
     * @var Array
     */
    protected $output = Array();


    /**
     * Query specific element(s) using a CSS selector
     * Actions are nested:
     * Response->query("#element")->call('addClass', "newclass");
     *
     * @param   String  $selector   CSS selector
     * @param   String  $context    Context to search in
     * @return  Response\Query
     */
    public function query($selector, $context = null)
    {
        $return   = new Response\Query($selector, $context);
        $output[] = $return;
        return $return;
    }


    /**
     * Perform generic JS framework function call
     *
     * @param   String  $method Method to call
     * @param   Array   $args   Arguments to pass
     * @return  Response\Call
     */
    public function call($method, $args = null)
    {
        $return   = new Response\Call($method, $args);
        $output[] = $return;
        return $return;
    }


    /**
     * Block of JS to execute
     *
     * @param   String  $script Javascript to execute in the browser
     * @return  Response
     */
    public function script($script)
    {
        $return   = new Response\Script($script);
        $output[] = $return;
        return $return;
    }


    /**
     * Finished defining actions, return AJAX response
     *
     */
    public function finish()
    {

    }
}

