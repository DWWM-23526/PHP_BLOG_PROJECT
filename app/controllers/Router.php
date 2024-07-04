<?php namespace Controllers;

class Router{

    public function __construct() 
    {
        $route = filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);
        $routeParts = explode('/', $route);
        $controllerName = ucfirst(array_shift($routeParts));
        if(empty($controllerName)){
            $controllerName = "Home";
        }
        $controllerClassName = "Controllers\\".$controllerName."Controller";
        $controllerFilePath = lcfirst($controllerClassName).".php";
        if(!file_exists($controllerFilePath)){
            header('HTTP/1.0 404 Not Found');
            die();
        }
        include_once $controllerFilePath;
        $controllerInstance = new $controllerClassName($routeParts);
        $controllerInstance->{$controllerInstance->actionName}();
    }

}
