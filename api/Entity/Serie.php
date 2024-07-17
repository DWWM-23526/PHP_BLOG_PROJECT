<?php namespace Entity;

class Serie extends BaseEntity
{
    // public int $id_serie;
    public ?string $title;
    public ?string $summary;
    public ?string $img_src;
    public ?bool $is_deleted;

    // function __construct($fields = []){
    //     foreach($fields as $k => $v){
    //         if(property_exists($this, $k))
    //             $this->{$k} = $v;
    //     }
    // }

}