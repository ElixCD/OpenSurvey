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
    //     $this->UserSurvey = $this->connection->querySelect("SELECT * FROM user_surveys WHERE users_iduser = '" . $idUserSurvey . "'");

    //     foreach ($this->UserSurvey as $key => $value) {
    //         if ($value['users_iduser'] == $idUserSurvey) {
    //             return $value;
    //         }
    //     }
    //     return false;
    // }

    function getUserSurveys(int $idUserSurvey)
    {
        $this->UserSurvey = $this->connection->querySelect("SELECT * FROM user_surveys WHERE users_iduser = '" . $idUserSurvey . "'");
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
            $query = "UPDATE user_surveys SET users_iduser = '" . $userSurveys['iduser'] . "', surveys_idsurvey='" . $userSurveys['idsurvey'] . "', propietary=" . $userSurveys['propietary'] . ", complete=" . $userSurveys['complete'] . ", star_date='" . $userSurveys['star_date'] . "', finish_date='" . $userSurveys['finish_date'] . "' WHERE users_iduser = " . (int) $userSurveys['users_iduser'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteUserSurvey($userSurveys)
    {
        try {
            $param = $userSurveys['users_iduser'];
            return $this->connection->queryTransaction("DELETE FROM user_surveys WHERE users_iduser = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($userSurveys)
    {
        if (!array_key_exists('users_iduser', $userSurveys) || !array_key_exists('description', $userSurveys)) {
            throw new Exception();
        }
    }
}
