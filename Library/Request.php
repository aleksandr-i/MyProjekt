<?php

class Request
{
    public $get;
    private $post;
    private $server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }

    /**
     * @param $key
     * @return null
     */
    public function post($key)
    {
        // if else ?
        return isset($this->post[$key]) ? $this->post[$key] : null;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        // if else ?
        return isset($this->get[$key]) ? $this->get[$key] : null;
    }

    /**
     * @param $key
     * @return null
     */
    public function server($key)
    {
        if (isset($this->server[$key])) {
            return $this->server[$key];
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        //return (bool)$this->post;
        return strtolower($this->server('REQUEST_METHOD')) == 'post';
    }

    /**
     * @return null
     */
    public function getIpAddress()
    {
        return $this->server('REMOTE_ADDR');
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $uri = $this->server('REQUEST_URI'); // $_SERVER['REQUEST_URI']
        $uri = explode('?', $uri);
        return $uri[0];
    }

    /**
     * @param array $params
     */
    public function mergeGet(array $params)
    {
        $this->get += $params;
        $_GET += $params;
    }
}