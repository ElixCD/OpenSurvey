<?php

namespace Domain;

use OurVoice;

class UserDomain
{
    private $User;
    private bool $isSuccess;
    private string $message;

    function __construct()
    {
        $this->message = "";
        $this->User = new $GLOBALS['Config']::$User;
    }

    function IsSuccess()
    {
        if ($this->message == "")
            return $this->User->IsSuccess();
        else
            return $this->isSuccess;
    }

    function GetMessage()
    {
        if ($this->message == "")
            return $this->User->GetMessage();
        else
            return $this->message;
    }

    function GetUsers(int $numberPage = 1)
    {
        return $this->User->GetUsers($numberPage);
    }

    function SaveUser(array $datos)
    {
        $datos["register_date"] = date("Y-m-d h:i:s");
        $result = $this->User->SaveUser($datos);
        if ($this->User->IsSuccess()) {
            $datos["iduser"] = $result;
            $userRol = new $GLOBALS['Config']::$UserRol;
            $userRol->SaveUserRol($datos);
        }
        return $result;
    }

    function UpdateUser(array $datos)
    {
        $result = $this->User->updateUser($datos);

        if ($this->User->IsSuccess()) {
            $userRol = new $GLOBALS['Config']::$UserRol;
            if ($userRol->GetUserRolesByUser($datos["iduser"]) == false) {
                $userRol->SaveUserRol($datos);
            } else {
                $userRol->UpdateUserRol($datos);
            }
        }
        return $result;
    }

    function DeleteUser(array $datos)
    {
        $userRol = new $GLOBALS['Config']::$UserRol;
        $userRol->DeleteUserRoles($datos);

        if ($this->User->IsSuccess) {
            return $this->User->DeleteUser($datos);
        } else {
            $this->isSuccess = $userRol->IsSuccess();
            $this->message = $userRol->GetMessage();
            return array();
        }
    }
}
