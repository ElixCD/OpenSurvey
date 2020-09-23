<?php

namespace Models\DTO;

use Sysurvey;
use Exception;
use Models\Factor;
use Models\Question;

class FactorDTO
{
    public $factors = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getFactor(int $idFactor)
    {
        $this->factors = $this->connection->querySelect("SELECT * FROM factor WHERE idfactor = '" . $idFactor . "'");

        foreach ($this->factors as $key => $value) {
            if ($value['idfactor'] == $idFactor) {


                return $value;
            }
        }
        return false;
    }

    function getFactors(int $idSurvey, int $numberPage)
    {
        $factors = new Factor($this->connection);
        
        $factorsList = $factors->getFactors($idSurvey, 1);

        foreach ($factorsList as $key => $value) {
            $questions = new Question($this->connection);
            $questionsList = $questions->getQuestions($key);
        }

        $this->factors = $this->connection->querySelect("SELECT * FROM factor WHERE idsurvey = '$idSurvey'");
        return $this->factors;
    }

    function saveFactor($factor)
    {
        try {
            // $param = $factor['description'];
            return $this->connection->queryTransaction("INSERT INTO factor VALUES (NULL, '" . $factor['description'] . "', '".$factor['idsurvey']."' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateFactor($factor = [])
    {
        try {
            $query = "UPDATE factor SET description = '" . $factor['description'] . "' WHERE idfactor = " . (int) $factor['idfactor'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteFactor($factor)
    {
        try {
            $param = $factor['idfactor'];
            return $this->connection->queryTransaction("DELETE FROM factor WHERE idfactor = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($factor)
    {
        if (!array_key_exists('idfactor', $factor) || !array_key_exists('description', $factor)) {
            throw new Exception();
        }
    }
}
