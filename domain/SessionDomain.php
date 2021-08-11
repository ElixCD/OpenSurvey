<?php

namespace Domain;

use OurVoice\SesionStatus;
use Data\Interfaces\IUser;

class SessionDomain
{

    private IUser $User;
    private bool $isSuccess;
    private string $message;
    // private SesionStatus $sesion;

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

    function GetUserLogin(string $email, string $password)
    {
        $userData = array();
        $user = $this->User->GetUserLogin($email, $password);
        
        if ($this->User->IsSuccess()) {
            if(count($this->User->users) > 0){
                $userData['name'] = $user['name'];
                $userRol = new $GLOBALS['Config']::$UserRol;
                $rol = $userRol->GetUserRolesByUser($user['iduser']);
                if ($userRol->IsSuccess()) {           
                             
                    $roles = new $GLOBALS['Config']::$Rol;                    
                    $userData['roles'] =  $roles->GetRol($rol['roles_idrol']);
    
                    // $this->sesion = new SesionStatus();                    
                    // $this->sesion->CreateSession("user", $user);
                    SesionStatus::CreateSession("user", $user);
                }
                else{
                    $this->isSuccess = false;
                    $this->message = "El usuario no tiene roles asignados.";
                }
            }
            else{
                $this->isSuccess = false;
                $this->message = "El usuario no existe.";
            }
           
        }
        else{
            $this->isSuccess = false;
            $this->message = $this->User->GetMessage();
        }
    }

    function UserLogout(){
        SesionStatus::EndSession();
    }
}
