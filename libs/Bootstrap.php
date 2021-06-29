<?php

class Bootstrap{

    function __construct()  {

        $url = 'index';
        if (isset($_GET['url'])) {
        $url = $_GET['url']; // name in $_GET['url'] is ok, so you can set it
        }
        $url=rtrim($url,'/');
        $url = explode('/', $url);
        // print_r($url); debugging

        $file = 'controllers/'.$url[0].'.php';
        if(file_exists($file))  {
            require_once($file);
        } else {
            require_once('controllers/errormsg.php');
            $controller = new Errormsg();
            return false;
        }
        $controller=new $url[0];

        if(isset($url[2]))
            {
                $controller->{$url[1]}($url[2]);
            }
        else{
            if(isset($url[1]))
            {
                $controller->{$url[1]}();
            }
        }
    }
}

?>