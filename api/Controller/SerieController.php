<?php namespace Controller;
    use Core\HttpResponse;
class SerieController extends BaseController
{
    public function get() : array
    {
        if($this->id == 0){
            return ["result" => "Read all Series"];
        }
        return ["result" => "Read Serie with id = " . $this->id];
        
    }
    public function post() : array
    {
        return ["result" => "Create an Serie"];
    }
    public function put() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Update Serie with id = " . $this->id];
    }
    public function delete() : array
    {
        HttpResponse::SendNotFound($this->id <= 0);
        return ["result" => "Delete Serie with id = " . $this->id];
    }
}