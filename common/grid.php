<?php
namespace Utils\Grid;

class Grid{

    private $collection;

    public function __construct($value = null)
    {        
        $this->collection = $value;
    }

    public function setCollection($value){
        $this->collection = $value;
    }

    public function getCollection(){
        return $this->collection;
    }



}