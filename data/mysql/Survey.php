<?php

namespace Data\MySql;

use Data;
use Exception;

class Survey implements Data\Interfaces\ISurvey
{
    public $surveys = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbMySQL();
    }

    function IsSuccess(): bool
    {
        return $this->connection->querySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetSurvey(int $idSurvey)
    {
        $this->surveys = $this->connection->QuerySelect("SELECT * FROM surveys WHERE idsurvey = '" . $idSurvey . "'");

        foreach ($this->surveys as $key => $value) {
            if ($value['idsurvey'] == $idSurvey) {
                return $value;
            }
        }
        return false;
    }

    function GetSurveys(int $numberPage)
    {
        $this->surveys = $this->connection->QuerySelect("SELECT * FROM surveys");
        return $this->surveys;
    }

    function SaveSurvey($survey)
    {
        try {
            $query = "INSERT INTO surveys VALUES (NULL, :name, :active)";
            $parameters = [':name' => $survey['name'], ':active' => (bool) $survey['active']];

            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateSurvey($survey)
    {
        try {
            // $query = "UPDATE surveys SET name = '" . $survey['name'] . "', active = " . $survey['active'] . " WHERE idsurvey = " . (int) $survey['idsurvey'];
            $query = "UPDATE surveys SET name = :name, active = :active WHERE idsurvey = :idsurvey";
            $parameters = [':name' => $survey['name'], ':active' => (bool) $survey['active'], ':idsurvey' => $survey['idsurvey']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteSurvey($survey)
    {
        try {
            $param = $survey['idsurvey'];
            return $this->connection->QueryTransaction("DELETE FROM surveys WHERE idsurvey = '" . $param . "'");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($survey)
    {
        if (!array_key_exists('idSurvey', $survey) || !array_key_exists('description', $survey)) {
            throw new Exception();
        }
    }
}
