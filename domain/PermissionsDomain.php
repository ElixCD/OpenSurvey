<?php

namespace Domain;
use OurVoice\Data\IPermission;

class PermisionsDomain
{
    private IPermission $Permission;

    function __construct()
    {
        $this->Permission = new $GLOBALS['Config']::$Permission;
    }

    function IsSuccess(){
        return $this->Permission->IsSuccess();
    }

    function GetMessage(){
        return $this->Permission->GetMessage();
    }

    function GetPermissions(int $numberPage = 1)
    {
        return $this->Permission->GetPermissions($numberPage);
    }

    function GetPermissionRol(int $idRol)
    {
        return $this->Permission->GetPermissions($idRol);
    }

    function SavePermission(array $datos){
        return $this->Permission->SavePermission($datos);
    }

    function UpdatePermission(array $datos){
        return $this->Permission->UpdatePermission($datos);
    }

    function DeletePermission(array $datos){
        return $this->Permission->DeletePermission($datos);
    }

    /****** ********/
    function GetPermission(int $idPermission)
    {
        return $this->Permission->GetPermissions($idPermission);
    }
    
}
