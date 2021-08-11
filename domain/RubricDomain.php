<?php

namespace Domain;
use Data\Interfaces\IRubric;

class RubricDomain
{

    private IRubric $Rubric;

    function __construct()
    {
        $this->Rubric = new $GLOBALS['Config']::$Rubric;
    }

    function IsSuccess(){
        return $this->Rubric->IsSuccess();
    }

    function GetMessage(){
        return $this->Rubric->GetMessage();
    }

    function GetRubrics(int $idFactor, int $page = 1)
    {
        return $this->Rubric->GetRubrics($idFactor, $page);
    }

    function SaveRubric(array $datos){
        return $this->Rubric->SaveRubric($datos);
    }

    function UpdateRubric(array $datos){
        return $this->Rubric->UpdateRubric($datos);
    }

    function DeleteRubric(array $datos){
        return $this->Rubric->DeleteRubric($datos);
    }
    
}
