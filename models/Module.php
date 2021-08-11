<?php

namespace OurVoice\Models;

class Mosule{
    private int $idModule;
    private string $name;

    public function getId() : int {
        return $this->idModule;
    }

    public function setId($value) : void {
        $this->idModule = $value;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName($value) : void {
        $this->name = $value;
    }

}