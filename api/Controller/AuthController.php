<?php namespace Controller;
    use Core\HttpReqAttr;
    use Core\HttpRequest;
    use Core\HttpResponse;
    use Repository\AppuserRepository;

class AuthController 
{
    private string $method;
    protected array $additionnalParams;
    public function __construct($method, $additionnalParams)
    {
        HttpResponse::SendNotFound(!isset($method)); 
        $this->method = $method;
        $methodNotExists = !method_exists(get_called_class(), $this->method);
        HttpResponse::SendNotFound($methodNotExists); 
        $this->additionnalParams = $additionnalParams; 
    }
    public function execute() : string
    {
        $result = $this->{$this->method}();
        return json_encode($result);
    }
    public function check() : array
    {
        if($this->additionnalParams[0] == 'pseudo'){
            return $this->checkPseudoNotExists();
        }
    }

    private function checkPseudoNotExists() : array
    {
        $pseudo = HttpRequest::get(HttpReqAttr::BODY)['pseudo'];
        $repositoryClassName = new AppuserRepository();
        $users = $repositoryClassName->getAll(["where"=>"pseudo = '$pseudo'"]);
        return ['result' => count($users) == 0];
    }
}