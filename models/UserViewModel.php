<?php

namespace Models;

use Sysurvey;
use Exception;

use Models\User;
use Models\UserRol;
use Models\Rol;

class UserViewModel
{
    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getUserData($idUser)
    {
        $dbUser = new User($this->connection);
        $dbUserRol = new UserRol($this->connection);
        $dbRol = new Rol($this->connection);

        $user = $dbUser->getUser($idUser);
        $userRoles = $dbUserRol->getUserRoles($idUser);

        foreach ($userRoles as $key => $userRol) {
            $user["roles"][] = $dbRol->getRol($userRol['roles_idrol']);
        }

        return $user;
    }

    function getUserSurveys($idUser)
    {
        $dbUserSurvey = new UserSurvey($this->connection);
        $dbSurvey = new Survey($this->connection);

        $usersSurvey = $dbUserSurvey->getUserSurveys($idUser);

        foreach ($usersSurvey as $key => $userSurvey) {
            $survey = $dbSurvey->getSurvey($userSurvey['users_iduser']);

            if($survey != false){
                // $usersSurvey[$key]["name"] = $survey["name"];
                // $usersSurvey[$key]["active"] = $survey["active"];
                $usersSurvey[$key] = array_merge($userSurvey, $survey);
                // $usersSurvey[$key] = $tmp;
            }
        }

        return $usersSurvey;
    }
}
