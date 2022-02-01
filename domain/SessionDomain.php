<?php

namespace Domain;

use OurVoice\SessionStatus;
use OurVoice\Data\IUser;
use OurVoice\Security;

class SessionDomain
{

    private IUser $User;
    private bool $isSuccess;
    private $message;

    function __construct()
    {
        $this->message = "";
        $this->User = new $GLOBALS['Config']::$User();
        $this->isSuccess = false;
    }

    function IsSuccess()
    {
        return $this->isSuccess;
    }

    function GetMessage()
    {
        return $this->message;
    }

    function GetUserLogin(string $email, string $password)
    {
        $sec = new Security();
        $user = $sec->ValidateUserLogin($email, $password);
        $this->isSuccess = $sec->IsSuccess();

        if ($sec->IsSuccess()) {
            $this->GetUserById((int) $user['iduser']);
        }
        else{
            $this->message = $sec->GetMessage();
        }
    }

    function UserLogout()
    {
        SessionStatus::EndSession("user");
    }

    function GetUserById(int $id)
    {
        $user =   $this->User->GetUserById($id);
        $this->ValidateUser($user);
    }

    private function ValidateUser($user)
    {

        if (!$this->User->IsSuccess()) {
            $this->isSuccess = false;
            $this->message = $this->User->GetMessage();
            return;
        }

        if (count($this->User->users) <= 0) {
            $this->isSuccess = false;
            $this->message = "El usuario no existe.";
            return;
        }

        $dbUser = new UserDomain;
        $user = $dbUser->GetUserRolesByIdUser($user['iduser']);

        if (!$dbUser->IsSuccess()) {
            $this->isSuccess = false;
            $this->message = "El usuario no tiene roles asignados.";
            return;
        }

        $dbModules = new ModulesDomain();

        $this->User->UpdateLastLogin($user['iduser']);
        SessionStatus::CreateSession("user", $user);
    }
}
