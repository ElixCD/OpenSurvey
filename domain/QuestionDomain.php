<?php

namespace Domain;
use Data\Interfaces\IQuestion;

class QuestionDomain
{

    private IQuestion $Question;

    function __construct()
    {
        $this->Question = new $GLOBALS['Config']::$Question();
    }

    function IsSuccess(){
        return $this->Question->IsSuccess();
    }

    function GetMessage(){
        return $this->Question->GetMessage();
    }

    function GetQuestions(int $idFactor, int $page = 1)
    {
        return $this->Question->GetQuestions($idFactor, $page);
    }

    function SaveQuestion(array $datos){
        return $this->Question->SaveQuestion($datos);
    }

    function UpdateQuestion(array $datos){
        return $this->Question->UpdateQuestion($datos);
    }

    function DeleteQuestion(array $datos){
        return $this->Question->DeleteQuestion($datos);
    }
    
}
