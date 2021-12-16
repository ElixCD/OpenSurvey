<?php

namespace Domain;

// session_start();

use OurVoice\Data\IUser;
use OurVoice\Security;

class UserDomain
{
    private IUser $User;
    private bool $isSuccess;
    private string $message;

    function __construct()
    {
        $this->message = "";
        $this->User = new $GLOBALS['Config']::$User();
    }

    //Region Single Crud
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
        $security = new Security();

        $user = $this->GetUserDataById($datos['iduser']);

        $password = $security->ValidatePassword($datos['password'], $user['password']);

        if ($password != 0) {
            $datos['password'] = $password;
            $this->User->UpdatePassword($datos);
        }

        if ($datos['name'] != "" && $datos['idrol'] != 0)
        {
            $this->User->updateUser($datos);
        }

        if ($this->User->IsSuccess()) {
            $userRol = new $GLOBALS['Config']::$UserRol;
            if ($userRol->GetUserRolesByUser($datos["iduser"]) == false) {
                $userRol->SaveUserRol($datos);
            } else {
                $userRol->UpdateUserRol($datos);
            }
        }
        // return $result;
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
    //endregion

    /***************************  ***************************/

    //Region User Data
    function GetUserDataById($idUser)
    {
        $dbUserRol = new $GLOBALS['Config']::$UserRol;

        $user = $this->User->GetUserById($idUser);
        $userRoles = $dbUserRol->GetUserRolesByUser($idUser);
        $user["roles"] = $userRoles;

        return $user;
    }

    function GetUserByEmail($email)
    {
        $dbUserRol = new $GLOBALS['Config']::$UserRol;

        $user = $this->User->GetUserById($email);
        $userRoles = $dbUserRol->GetUserRolesByUser($email);
        $user["roles"] = $userRoles;

        return $user;
    }

    function GetUserById($email)
    {
        $dbUserRol = new $GLOBALS['Config']::$UserRol;

        $user = $this->User->GetUserById($email);
        $userRoles = $dbUserRol->GetUserRolesByUser($email);
        $user["roles"] = $userRoles;

        return $user;
    }

    function GetUserSurveys($idUser)
    {
        $dbUserSurvey = new $GLOBALS['Config']::$UserSurvey;
        $dbSurvey = new $GLOBALS['Config']::$Survey;

        $usersSurvey = $dbUserSurvey->GetUserSurveys($idUser);

        foreach ($usersSurvey as $key => $userSurvey) {
            $survey = $dbSurvey->GetSurvey($userSurvey['surveys_idsurvey']);

            if ($survey != false) {
                $usersSurvey[$key] = array_merge($userSurvey, $survey);
            }
        }

        return $usersSurvey;
    }

    function GetUserSurveysPropetary($idUser)
    {
        $suerveyList = $this->GetUserSurveys($idUser);

        $filtro = function ($array) {
            return ($array['propietary'] == true ? true : false);
        };

        $return = array_filter($suerveyList, $filtro);

        return $return;
    }

    function GetUserSurveysStarted($idUser)
    {
        $suerveyList = $this->GetUserSurveys($idUser);

        $filtro = function ($array) {
            return ($array['propietary'] == false ? true : false);
        };

        $return = array_filter($suerveyList, $filtro);

        return $return;
    }

    function GetUserSurveysNotStarted($idUser)
    {
        $suerveyList = $this->GetUserSurveys($idUser);

        $filtro = function ($array) {
            return ($array['propietary'] == true ? true : false);
        };

        $return = array_filter($suerveyList, $filtro);

        return $return;
    }
    //endregion
}
