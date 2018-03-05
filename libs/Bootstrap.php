<?php

class Bootstrap {
    
    function __construct() {        
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        if(empty($url[1])){
            require 'controllers/index.php';
            $controller = new Index();
            $controller->getFilmsList(0);
            return false;
        }

        $file = 'controllers/' . $url[1] . ".php";
        if(file_exists($file))
        {
            require $file;
        }
        else
        {
            require 'controllers/error.php';
            $controller = new Error();
            $controller->index();
            return false;
        }
        $controller = new $url[1]();
        
        if(isset($url[4]) )
        {
            if(method_exists($url[1], $url[2]))
            {
                $controller->{$url[2]}($url[3],$url[4]);
            }
            else
            {
                require 'controllers/error.php';
                $controller = new Error();
                $controller->index();
                return false;
            }
        }  
        elseif (isset($url[3])) 
        {
            if(method_exists($url[1], $url[2]))
            {
                $controller->{$url[2]}($url[3]);
            }
            else
            {
                require 'controllers/error.php';
                $controller = new Error();
                $controller->index();
                return false;
            }
        }
        elseif (isset($url[2])) 
        {
            if(method_exists($url[1], $url[2]))
            {
                $controller->{$url[2]}();
            }
            else
            {
                require 'controllers/error.php';
                $controller = new Error();
                $controller->index();
                return false;
            }
        }
        else 
        {
            $controller->index();
        }
    }
}