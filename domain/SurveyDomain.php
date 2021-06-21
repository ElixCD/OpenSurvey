<?php
namespace Domain;

class SurveyDomain
{

    private $Survey;

    function __construct()
    {
        $this->Survey = new $GLOBALS['Config']::$Survey();
    }

    function IsSuccess()
    {
        return $this->Survey->IsSuccess();
    }

    function GetMessage()
    {
        return $this->Survey->GetMessage();
    }

    function GetSurvey(int $idSurvey)
    {
        return $this->Survey->GetSurvey($idSurvey);
    }

    function GetSurveys(int $page)
    {
        return $this->Survey->GetSurveys($page);
    }

    function SaveSurvey(array $datos)
    {
        return $this->Survey->SaveSurvey($datos);
    }

    function UpdateSurvey(array $datos)
    {
        return $this->Survey->UpdateSurvey($datos);
    }

    function DeleteSurvey(array $datos)
    {

        try {
            $rubric = new $GLOBALS['Config']::$Rubric();
            $list = $rubric->GetRubrics((int) $datos["idfactor"]);

            foreach ($list as $key => $value) {
                $rubric->DeleteRubric($value);
            }
            return $this->Survey->DeleteSurvey($datos);
        } catch (\Throwable $th) {
            return array();
        }
    }
}
