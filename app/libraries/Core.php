<?php
// App Core class
//create URL & loads controller
//URL format /controller / method/ params


class Core
{
    //nusistatom pradines default reiksmes
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
//        print_r($this->getUrl());
        $url = $this->getUrl();
        //check if user asked for controllers
        if (isset($url[0])) {
            //look into controllers dir for the controller name
            //if such file exists
            if (file_exists("../app/controllers/" . ucfirst($url[0]) . ".php")) {
                $this->currentController = ucfirst($url[0]);
                //clean value that was taken
                unset($url[0]);
            }
        }
        //require the contoller that user asked
        require_once "../app/controllers/" . $this->currentController . '.php';
        //instanciate an object of current class
        //if entered pages
        //Pages = new Pages;
        $this->currentController = new $this->currentController;

        //check for second (method) values in url params
        if (isset($url[1])) {
            //check if there is a method name is in the class
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //clean value that was taken
                unset($url[1]);
            }
        }
        //to test if it works
        //echo 'our current method : ' . $this->currentMethod;

        //Get params from url
        if (isset($url[2])) {
            $this->params = $url ? array_values($url) : [];
        }
//        print_r($this->params);

        //wee call current contoller and method and params if present
        //uzkrauna posts/index
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    //return url parameter
    public
    function getUrl()
    {
        if (isset($_GET['url'])) {
            //nutrinam slesiuka is desines
            $url = rtrim($_GET['url'], '/');

            //sanitize url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //make url into array
            $url = explode('/', $url);

            return $url;
        }
    }

}
