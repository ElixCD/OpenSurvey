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
    
    function IsSuccess() : bool{
        return $this->connection->querySuccess();
    }

    function GetMessage() : string{
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
            return $this->connection->QueryTransaction("INSERT INTO surveys VALUES (NULL, '" . $survey['name'] . "', " . $survey['active'] . "  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateSurvey($survey)
    {
        try {
            $query = "UPDATE surveys SET name = '" . $survey['name'] . "', active = " . $survey['active'] . " WHERE idsurvey = " . (int) $survey['idsurvey'];
            return $this->connection->QueryTransaction($query);
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
