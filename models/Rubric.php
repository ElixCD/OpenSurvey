<?php

namespace Models;

use Sysurvey;
use Exception;

class Rubric
{
    public $rubrics = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getRubric(int $idRubric)
    {
        $this->rubrics = $this->connection->querySelect("SELECT * FROM rubrics WHERE idrubric = '" . $idRubric . "'");

        foreach ($this->rubrics as $key => $value) {
            if ($value['idrubric'] == $idRubric) {
                return $value;
            }
        }
        return false;
    }

    function getRubrics(int $idFactor, int $numberPage=1)
    {
        $this->rubrics = $this->connection->querySelect("SELECT * FROM rubrics WHERE factors_idfactor = " . $idFactor);
        return $this->rubrics;
    }

    function saveRubric($rubrics)
    {
        try {
            $param = $rubrics['description'];
            return $this->connection->queryTransaction("INSERT INTO rubrics VALUES (NULL, '" . $rubrics['value'] . "', '" . $rubrics['idsurvey'] . "', '" . $rubrics['idfactor'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateRubric($rubrics = [])
    {
        try {
            $query = "UPDATE rubrics SET value = '" . $rubrics['value'] . "', idsurvey = '" . $rubrics['idsurvey'] . "' idfactor = '" . $rubrics['idfactor'] . "' WHERE idrubric = " . (int) $rubrics['idrubric'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteRubric($rubrics)
    {
        try {
            $param = $rubrics['idrubric'];
            return $this->connection->queryTransaction("DELETE FROM rubrics WHERE idrubric = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($rubrics)
    {
        if (!array_key_exists('idrubric', $rubrics) || !array_key_exists('description', $rubrics)) {
            throw new Exception();
        }
    }
}
