<?php

namespace Domain;
use OurVoice\Data\IModule;

class ModulesDomain
{
    private IModule $Module;

    function __construct()
    {
        $this->Module = new $GLOBALS['Config']::$Module;
    }

    function IsSuccess(){
        return $this->Module->IsSuccess();
    }

    function GetMessage(){
        return $this->Module->GetMessage();
    }

    function GetModules(int $numberPage = 1)
    {
        return $this->Module->GetModules($numberPage);
    }

    function GetModulesRol(int $idRol)
    {
        
        return $this->Module->GetModules($idRol);
    }

    // function SaveModule(array $datos){
    //     return $this->Module->SaveModule($datos);
    // }

    function UpdateModule(array $datos){
        return $this->Module->UpdateModule($datos);
    }

    function DeleteModule(array $datos){
        return $this->Module->DeleteModule($datos);
    }

    /****** ********/
    function GetModule(int $idModule)
    {
        return $this->Module->GetModules($idModule);
    }
    
}
