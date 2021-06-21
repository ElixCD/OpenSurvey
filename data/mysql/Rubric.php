<?php

namespace Data\MySql;

use Data;
use Exception;

class Rubric implements Data\Interfaces\IRubric
{
    public $rubrics = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbMySQL();
    }

    function GetRubric(int $idRubric)
    {
        $this->rubrics = $this->connection->QuerySelect("SELECT * FROM rubrics WHERE idrubric = '" . $idRubric . "'");

        foreach ($this->rubrics as $key => $value) {
            if ($value['idrubric'] == $idRubric) {
                return $value;
            }
        }
        return false;
    }

    function GetRubrics(int $idFactor, int $numberPage=1)
    {
        $this->rubrics = $this->connection->QuerySelect("SELECT * FROM rubrics WHERE factors_idfactor = " . $idFactor);
        return $this->rubrics;
    }

    function SaveRubric($rubrics)
    {
        try {
            $param = $rubrics['description'];
            return $this->connection->QueryTransaction("INSERT INTO rubrics VALUES (NULL, '" . $rubrics['description'] . "', '" . $rubrics['value'] . "', '" . $rubrics['idfactor'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateRubric($rubrics = [])
    {
        try {
            $query = "UPDATE rubrics SET value = '" . $rubrics['value'] . "', factors_idfactor = '" . $rubrics['idfactor'] . "', description = '" . $rubrics['description'] . "' WHERE idrubric = " . (int) $rubrics['idrubric'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteRubric($rubrics)
    {
        try {
            $param = $rubrics['idrubric'];
            return $this->connection->QueryTransaction("DELETE FROM rubrics WHERE idrubric = '" . $param . "' ");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function IsSuccess() : bool{
        return $this->connection->QuerySuccess();
    }

    function GetMessage() : string{
        return $this->connection->GetMessage();
    }

    private function Validar($rubrics)
    {
        if (!array_key_exists('idrubric', $rubrics) || !array_key_exists('description', $rubrics)) {
            throw new Exception();
        }
    }
}
