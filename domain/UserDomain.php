<?php

namespace Domain;

// session_start();

use OurVoice\Data\IUser;
use OurVoice\Security;
use OurVoice\SessionStatus;

class UserDomain
{
    private IUser $User;
    private bool $isSuccess = false;
    private $message;

    function __construct()
    {
        $this->message = "";
        $this->User = new $GLOBALS['Config']::$User();
    }

    function IsSuccess()
    {
        return $this->isSuccess;
    }

    function GetMessage()
    {
        if ($this->isSuccess == "")
            return $this->User->GetMessage();
        else
            return $this->message;
    }

    function GetUsers()
    {
        $user = SessionStatus::GetSessionData('user');

        $rol = $user['roles'][0];

        if ($rol == 1) {
            return $this->GetUsersGeneral(1);
        } else {
            return $this->GetUsersByParent($user['iduser'], 1);
        }
    }

    function GetUsersGeneral(int $numberPage = 1)
    {
        $salida =  $this->User->GetUsers($numberPage);
        $this->isSuccess = $this->User->isSuccess;
        $this->message = $this->User->GetMessage();
        return $salida;
    }

    function GetUsersByParent(int $idParent, int $numberPage = 1)
    {
        $salida = $this->User->GetUsersByParent($idParent, $numberPage);
        $this->isSuccess = $this->User->isSuccess();
        $this->message = $this->User->GetMessage();
        return $salida;
    }

    function SaveUser(array $datos)
    {
        $datos["register_date"] = date("Y-m-d h:i:s");
        $result = $this->User->SaveUser($datos);

        $this->isSuccess = $this->User->isSuccess;
        $this->message = $this->User->GetMessage();

        if ($this->User->IsSuccess()) {
            $datos["iduser"] = $result;
            $userRol = new $GLOBALS['Config']::$UserRol;
            $userRol->SaveUserRol($datos);

            $this->isSuccess = $userRol->isSuccess;
            $this->message = $userRol->GetMessage();
        }

        return $result;
    }

    function UpdateUser(array $datos)
    {
        $security = new Security();

        $user = $this->GetUserById($datos['iduser']);

        // $roles = $this->GetUserRolesById($datos['iduser']);

        $password = $security->ValidatePassword($datos['password'], $user['password']);

        if ($password != 0) {
            $datos['password'] = $password;
            $this->User->UpdatePassword($datos);
        }

        if ($datos['name'] != "" && $datos['idrol'] != 0) {
            $this->User->updateUser($datos);
        }

        $this->isSuccess = $this->User->isSuccess;
        $this->message = $this->User->GetMessage();

        if ($this->User->IsSuccess()) {
            $userRol = new $GLOBALS['Config']::$UserRol;
            if ($userRol->GetUserRolesByUser($datos["iduser"]) == false) {
                $userRol->SaveUserRol($datos);
            } else {
                $userRol->UpdateUserRol($datos);
            }
            $this->isSuccess = $userRol->isSuccess;
            $this->message = $userRol->GetMessage();
        }
        // return $result;
    }

    function DeleteUser(array $datos)
    {
        $userRol = new $GLOBALS['Config']::$UserRol;
        $userRol->DeleteUserRoles($datos);

        $this->isSuccess = $userRol->IsSuccess();
        $this->message = $userRol->GetMessage();

        $salida = [];
        if ($this->User->IsSuccess) {
            $salida = $this->User->DeleteUser($datos);
            $this->isSuccess = $this->User->IsSuccess();
            $this->message = $this->User->GetMessage();
        }

        return $salida;
    }
    //endregion

    /***************************  ***************************/

    //Region User Data
    // function GetUserRoles($user)
    // {
    //     $user["roles"] = [];
    //     $dbUserRol = new $GLOBALS['Config']::$UserRol;
    //     $userRoles = $dbUserRol->GetUserRolesByUser($user['iduser']);
    //     $user["roles"] = $userRoles;
    //     $this->isSuccess = $userRoles->IsSuccess();
    //     $this->message = $userRoles->GetMessage();
    //     return $user;
    // }

    function GetUserRolesByIdUser($idUser)
    {
        $user["roles"] = [];
        $dbUserRol = new $GLOBALS['Config']::$UserRol;
        $user = $this->User->GetUserById($idUser);
        $this->isSuccess = $this->User->IsSuccess();
        $this->message = $this->User->GetMessage();

        if ($this->isSuccess) {
            $userRoles = $dbUserRol->GetUserRolesByUser($idUser);
            $user["roles"] = $userRoles;
            $this->isSuccess = $dbUserRol->IsSuccess();
            $this->message = $dbUserRol->GetMessage();
        }

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
