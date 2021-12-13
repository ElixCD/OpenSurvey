<?php

namespace Data\MySql;

use Data;
use Exception;

class UserSurvey implements Data\Interfaces\IUserSurvey
{
    private $UserSurvey = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbMySQL();
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

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetUserSurveys(int $idUserSurvey)
    {
        $this->UserSurvey = $this->connection->QuerySelect("SELECT * FROM user_surveys WHERE users_iduser = '" . $idUserSurvey . "'");
        return $this->UserSurvey;
    }

    function SaveUserSurvey($userSurveys)
    {
        try {
            return $this->connection->QueryTransaction("INSERT INTO user_surveys VALUES (NULL, '" . $userSurveys['iduser'] . "', '" . $userSurveys['idsurvey'] . "' , '" . $userSurveys['propietary'] . "',, " . $userSurveys['complete'] . ", , '" . $userSurveys['start_date'] . "', , '" . $userSurveys['finish_date'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUserSurvey($userSurveys)
    {
        try {
            $query = "UPDATE user_surveys SET users_iduser = '" . $userSurveys['iduser'] . "', surveys_idsurvey='" . $userSurveys['idsurvey'] . "', propietary=" . $userSurveys['propietary'] . ", complete=" . $userSurveys['complete'] . ", star_date='" . $userSurveys['star_date'] . "', finish_date='" . $userSurveys['finish_date'] . "' WHERE users_iduser = " . (int) $userSurveys['users_iduser'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteUserSurvey($userSurveys)
    {
        try {
            $param = $userSurveys['users_iduser'];
            return $this->connection->QueryTransaction("DELETE FROM user_surveys WHERE users_iduser = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($userSurveys)
    {
        if (!array_key_exists('users_iduser', $userSurveys) || !array_key_exists('description', $userSurveys)) {
            throw new Exception();
        }
    }
}
