<?php

namespace Models;

use Sysurvey;
use Exception;



class Survey
{
    public $surveys = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getSurvey(int $idSurvey)
    {
        $this->surveys = $this->connection->querySelect("SELECT * FROM survey WHERE idsurvey = '" . $idSurvey . "'");

        foreach ($this->surveys as $key => $value) {
            if ($value['idsurvey'] == $idSurvey) {
                return $value;
            }
        }
        return false;
    }

    function getSurveys(int $numberPage)
    {
        $this->surveys = $this->connection->querySelect("SELECT * FROM survey");
        return $this->surveys;
    }

    function saveSurvey($survey)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO survey VALUES (NULL, '" . $survey['name'] . "', '" . $survey['idmodule'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateSurvey($survey = [])
    {
        try {
            $query = "UPDATE survey SET name = '" . $survey['name'] . "', idmodule = '" . $survey['idmodule'] . "' WHERE idsurvey = " . (int) $survey['idsurvey'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteSurvey($survey)
    {
        try {
            $param = $survey['idsurvey'];
            return $this->connection->queryTransaction("DELETE FROM survey WHERE idsurvey = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($survey)
    {
        if (!array_key_exists('idSurvey', $survey) || !array_key_exists('description', $survey)) {
            throw new Exception();
        }
    }
}
