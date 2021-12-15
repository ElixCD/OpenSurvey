<?php

namespace Domain;

use OurVoice\SesionStatus;
use Data\Interfaces\IUser;

class SessionDomain
{

    private IUser $User;
    private bool $isSuccess;
    private $message;

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
        $user = $this->User->GetUserLogin($email, $password);        
        $this->ValidateUser($user);
    }

    function UserLogout(){
        SesionStatus::EndSession("user");
    }


    function GetUserById(string $id)
    {
        $user = $this->User->GetUser($id);
        $this->ValidateUser($user);       
    }

    private function ValidateUser($user){

        if(!$this->User->IsSuccess()){
            $this->isSuccess = false;
            $this->message = $this->User->GetMessage();
            return;
        }

        if(count($this->User->users) <= 0){
            $this->isSuccess = false;
            $this->message = "El usuario no existe.";
            return;
        }

        $dbUser = new UserDomain;
        $user = $dbUser->GetUserData($user['iduser']);

        if (!$dbUser->IsSuccess()){
            $this->isSuccess = false;
            $this->message = "El usuario no tiene roles asignados.";
            return;
        }

        SesionStatus::CreateSession("user", $user);

        // if ($dbUser->IsSuccess()) {
        //     SesionStatus::CreateSession("user", $user);
        // }
        // else{
        //     $this->isSuccess = false;
        //     $this->message = "El usuario no tiene roles asignados.";
        // }

        // if ($this->User->IsSuccess()) {
        //     if(count($this->User->users) > 0){
        //         $dbUser = new UserDomain;
        //         $user = $dbUser->GetUserData($user['iduser']);
        //         if ($dbUser->IsSuccess()) {
        //             SesionStatus::CreateSession("user", $user);
        //         }
        //         else{
        //             $this->isSuccess = false;
        //             $this->message = "El usuario no tiene roles asignados.";
        //         }
        //     }
        //     else{
        //         $this->isSuccess = false;
        //         $this->message = "El usuario no existe.";
        //     }
        // }
        // else{
        //     $this->isSuccess = false;
        //     $this->message = $this->User->GetMessage();
        // }
    }

}
