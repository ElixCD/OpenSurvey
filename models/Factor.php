<?php

namespace OurVoice\Models;

class Factor{
    private int $IdFactor;
    private string $description;
    private int $user_iduser;

    public function getIdFactor() : int {
        return $this->IdFactor;    
    }

    public function setIdFactor(int $value) : void{
        $this->IdFactor = $value;
    }

    public function getDescription() : string {
        return $this->description;    
    }

    public function setDescription(string $value) : void{
        $this->description = $value;
    }

    public function getIdUser() : int {
        return $this->user_iduser;    
    }

    public function setIdUser(int $value) : void{
        $this->user_iduser = $value;
    }

}