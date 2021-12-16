<?php

namespace Domain;
use OurVoice\Data\IFactor;

class FactorDomain
{
    private IFactor $Factor;

    function __construct()
    {
        $this->Factor = new $GLOBALS['Config']::$Factor;
    }

    function IsSuccess()
    {
        return $this->Factor->IsSuccess();
    }

    function GetMessage()
    {
        return $this->Factor->GetMessage();
    }

    function GetFactor(int $idFactor)
    {
        return $this->Factor->GetFactor($idFactor);
    }

    function GetFactors(int $page)
    {
        return $this->Factor->GetFactors($page);
    }

    function SaveFactor(array $datos)
    {
        return $this->Factor->SaveFactor($datos);
    }

    function UpdateFactor(array $datos)
    {
        return $this->Factor->UpdateFactor($datos);
    }

    function DeleteFactor(array $datos)
    {
        try {
            $rubric = new $GLOBALS['Config']::$Rubric;
            $list = $rubric->GetRubrics((int) $datos["idfactor"]);

            foreach ($list as $key => $value) {
                $rubric->DeleteRubric($value);
            }
            return $this->Factor->DeleteFactor($datos);
        } catch (\Throwable $th) {
            return array();
        }
    }
}
