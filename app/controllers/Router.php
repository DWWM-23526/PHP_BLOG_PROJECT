<?php namespace Controllers;
      use Core\HttpResponse;

class Router{

    private $controllerInstance;

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
        HttpResponse::SendNotFound(!file_exists($controllerFilePath));
        $this->controllerInstance = new $controllerClassName($routeParts);

    }

    public function start(){
        $action = $this->controllerInstance->actionName;
        $this->controllerInstance->{$action}();
    }

}
