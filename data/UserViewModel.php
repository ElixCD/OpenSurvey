<?php

namespace Data;

class UserViewModel
{
    private $useUser;
    private $useUserRol;
    private $useRol;
    private $useUserSurvey;
    private $useSurvey;

    function __construct()
    {
        $this->useUser = "Data\\".$_ENV['DBTYPE'] ."\\User";
        $this->useUserRol = "Data\\".$_ENV['DBTYPE'] ."\\UserRol";
        $this->useRol = "Data\\".$_ENV['DBTYPE'] ."\\Rol";
        $this->useUserSurvey = "Data\\".$_ENV['DBTYPE'] ."\\UserSurvey";
        $this->useSurvey = "Data\\".$_ENV['DBTYPE'] ."\\Survey";
    }

    function getUserData($idUser)
    {
        $dbUser = new $this->useUser();
        $dbUserRol = new $this->useUserRol();
        $dbRol = new $this->useRol();

        $user = $dbUser->getUser($idUser);
        $userRoles = $dbUserRol->getUserRolesByUser($idUser);

        foreach ($userRoles as $key => $userRol) {
            if(is_array($userRol )){
                $user["roles"][] = $dbRol->getRol($userRol['roles_idrol']);
            }
        }    
       
        return $user;
    }

    function getUserSurveys($idUser)
    {
        $dbUserSurvey = new $this->useUserSurvey();
        $dbSurvey = new $this->useSurvey();

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
