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
        $userRoles = $dbUserRol->getUserRolesByUser($idUser);

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
            $survey = $dbSurvey->getSurvey($userSurvey['surveys_idsurvey']);

            if($survey != false){
                $usersSurvey[$key] = array_merge($userSurvey, $survey);
            }
        }

        return $usersSurvey;
    }

    function getUserSurveysPropetary($idUser)
    {
        $suerveyList = $this->getUserSurveys($idUser);

        $filtro = function($array){
            return ($array['propietary'] == true ? true : false);
        };

        $return = array_filter( $suerveyList, $filtro);

        return $return;
    }

    function getUserSurveysStarted($idUser)
    {
        $suerveyList = $this->getUserSurveys($idUser);

        $filtro = function($array){            
            return ($array['propietary'] == false ? true : false);
        };

        $return = array_filter( $suerveyList, $filtro);

        return $return;
    }

    function getUserSurveysNotStarted($idUser)
    {
        $suerveyList = $this->getUserSurveys($idUser);

        $filtro = function($array){
            return ($array['propietary'] == true ? true : false);
        };

        $return = array_filter( $suerveyList, $filtro);

        return $return;
    }

}
