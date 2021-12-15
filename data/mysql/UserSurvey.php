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

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
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

    function GetUserSurveys(int $idUserSurvey)
    {
        $query = "SELECT * FROM user_surveys WHERE users_iduser = :idUserSurvey";
        $param = [':idUserSurvey' => $idUserSurvey];
        $this->UserSurvey = $this->connection->QuerySelect($query, $param);
        return $this->UserSurvey;
    }

    function SaveUserSurvey($userSurveys)
    {
        try {
            $query = "INSERT INTO user_surveys VALUES (NULL, :iduser, :idsurvey, :propietary, :complete, :start_date, :finish_date  )";
            $param = [':iduser' => $userSurveys['iduser'], ':idsurvey' => $userSurveys['idsurvey'], ':propietary' => $userSurveys['propietary'], ':complete' => $userSurveys['complete'], ':start_date' => $userSurveys['start_date'], ':finish_date' => $userSurveys['finish_date']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUserSurvey($userSurveys)
    {
        try {
            $query = "UPDATE user_surveys SET users_iduser = :iduser, surveys_idsurvey = :idsurvey, propietary = :propietary, complete = :complete, star_date = :star_date, finish_date = :finish_date WHERE users_iduser = :users_iduser";
            $param = [':iduser' => $userSurveys['iduser'], ':idsurvey' => $userSurveys['idsurvey'], ':propietary' => $userSurveys['propietary'], ':complete' => $userSurveys['complete'], ':star_date' => $userSurveys['star_date'], ':finish_date' => $userSurveys['finish_date'], ':users_iduser' => (int) $userSurveys['users_iduser']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteUserSurvey($userSurveys)
    {
        try {
            $query = "DELETE FROM user_surveys WHERE users_iduser = :users_iduser )";
            $param = [':users_iduser' => $userSurveys['users_iduser']];

            return $this->connection->QueryTransaction($query, $param);
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
