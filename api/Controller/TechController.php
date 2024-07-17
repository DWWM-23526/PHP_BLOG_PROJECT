<?php namespace Controller;
    use Core\HttpResponse;
class TechController extends BaseController
{
    public function get() : array
    {
        if($this->id == 0){
            return ["result" => "Read all Techs"];
        }
        return ["result" => "Read Tech with id = " . $this->id];
        
    }
    public function post() : array
    {
        return ["result" => "Create an Tech"];
    }
    public function put() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Update Tech with id = " . $this->id];
    }
    public function delete() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Delete Tech with id = " . $this->id];
    }
}