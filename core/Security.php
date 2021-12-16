<?php

namespace OurVoice;

use OurVoice\Data\IUser;

class Security
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

    function ValidateUserLogin(string $email, string $password)
    {
        $user = $this->User->GetUserByEmail($email);
        $this->ValidateUser($user);

        if ($this->isSuccess) {
            $hash = password_hash($password, PASSWORD_BCRYPT);

            if (password_verify($password, $hash) && password_verify($password, $user['password'])) {
                $this->isSuccess = true;
                return  $user;
            } else {
                $this->isSuccess = false;
                $this->message = "Clave de ingreso no valida";
            }
        }
    }

    function ValidatePassword(string $newPassword, string $oldPassword) {
        $hash = password_hash($newPassword, PASSWORD_BCRYPT);
        if (password_verify($newPassword, $hash) && password_verify($newPassword, $oldPassword)) {
            return 0;            
        } else {
           return $hash;            
        }
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

        $this->isSuccess = true;
    }
}
