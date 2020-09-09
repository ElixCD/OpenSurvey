<?php
namespace Models;

class Factor{
    public int $id;

    public string $description;

    function __construct($id=null, $description=null)
    {
        $this->id = $id;
        $this->description = $description;

        
    }

    // public $factors = [
    //     new Factor(1, "hola 1"),
    //     new Factor(2, "hola 2"),
    //     new Factor(3, "hola 3"),
    //     new Factor(4, "hola 4"),
    //     new Factor(5, "hola 5"),
    //     new Factor(6, "hola 6"),
    // ];
}