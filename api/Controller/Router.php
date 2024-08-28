<?php namespace Controller;
    use Core\HttpRequest;
    use Core\HttpReqAttr;
    use Core\HttpResponse;

class Router{//TODO: refactor Base and Auth Controllers in MotherController class ?
    private BaseController $controllerInstance;
    private AuthController $authControllerInstance;
    public function __construct() 
    {
        $table = HttpRequest::get(HttpReqAttr::ROUTE)[0];
        $controllerClassName = "Controller\\".ucfirst(empty($table) ? "Home" : $table)."Controller";
        $controllerFilePath = "$controllerClassName.php";
        HttpResponse::SendNotFound(!file_exists($controllerFilePath));
        if($table == "auth"){
            $method = HttpRequest::get(HttpReqAttr::ROUTE)[1] ?? null;
            $additionnalParams = array_slice(HttpRequest::get(HttpReqAttr::ROUTE), 2);
            $this->authControllerInstance = new $controllerClassName($method, $additionnalParams);
        }
        else {
            $method = strtolower(HttpRequest::get(HttpReqAttr::METHOD));
            $id = intval(HttpRequest::get(HttpReqAttr::ROUTE)[1] ?? 0);
            $this->controllerInstance = new $controllerClassName($method, $id);
        }
    }
    public function start() : void
    {
        if(isset($this->controllerInstance))
            HttpResponse::SendOK($this->controllerInstance->execute());

        if(isset($this->authControllerInstance))
            HttpResponse::SendOK($this->authControllerInstance->execute());

        HttpResponse::SendNotFound();
    }
}