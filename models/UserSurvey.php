<?php

namespace Models;

use Sysurvey;
use Exception;

class UserSurvey
{
    private $UserSurvey = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    // function getUserSurvey(int $idUserSurvey)
    // {
    //     $this->UserSurvey = $this->connection->querySelect("SELECT * FROM user_surveys WHERE iduser_survey = '" . $idUserSurvey . "'");

    //     foreach ($this->UserSurvey as $key => $value) {
    //         if ($value['iduser_survey'] == $idUserSurvey) {
    //             return $value;
    //         }
    //     }
    //     return false;
    // }

    function getUserSurveys(int $idUserSurvey)
    {
        $this->UserSurvey = $this->connection->querySelect("SELECT * FROM user_surveys WHERE iduser_survey = '" . $idUserSurvey . "'");
        return $this->UserSurvey;
    }

    function saveUserSurvey($userSurveys)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO user_surveys VALUES (NULL, '" . $userSurveys['iduser'] . "', '" . $userSurveys['idsurvey'] . "' , '" . $userSurveys['propietary'] . "',, " . $userSurveys['complete'] . ", , '" . $userSurveys['start_date'] . "', , '" . $userSurveys['finish_date'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateUserSurvey($userSurveys)
    {
        try {
            $query = "UPDATE user_surveys SET users_iduser = '" . $userSurveys['iduser'] . "', surveys_idsurvey='" . $userSurveys['idsurvey'] . "', propietary=" . $userSurveys['propietary'] . ", complete=" . $userSurveys['complete'] . ", star_date='" . $userSurveys['star_date'] . "', finish_date='" . $userSurveys['finish_date'] . "' WHERE iduser_survey = " . (int) $userSurveys['iduser_survey'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteUserSurvey($userSurveys)
    {
        try {
            $param = $userSurveys['iduser_survey'];
            return $this->connection->queryTransaction("DELETE FROM user_surveys WHERE iduser_survey = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($userSurveys)
    {
        if (!array_key_exists('iduser_survey', $userSurveys) || !array_key_exists('description', $userSurveys)) {
            throw new Exception();
        }
    }
}
