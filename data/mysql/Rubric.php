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
        $query = "SELECT * FROM rubrics WHERE idrubric = :idRubric";
        $param = [':idRubric' => $idRubric];
        $this->rubrics = $this->connection->QuerySelect($query, $param);

        foreach ($this->rubrics as $key => $value) {
            if ($value['idrubric'] == $idRubric) {
                return $value;
            }
        }
        return false;
    }

    function GetRubrics(int $idFactor, int $numberPage = 1)
    {
        $query = "SELECT * FROM rubrics WHERE factors_idfactor = :idFactor";
        $param = [':idFactor' => $idFactor];
        $this->rubrics = $this->connection->QuerySelect($query, $param);
        return $this->rubrics;
    }

    function SaveRubric($rubrics)
    {
        try {
            $query = "INSERT INTO rubrics VALUES (NULL, :description, :value, :idfactor )";
            $param = [':description' => $rubrics['description'], ':value' => $rubrics['value'], ':idfactor' => $rubrics['idfactor']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateRubric($rubrics = [])
    {
        try {
            $query = "UPDATE rubrics SET value = :value, factors_idfactor = :idfactor, description = :description WHERE idrubric = :idrubric";
            $param = [':value' => $rubrics['value'], ':idfactor' =>  $rubrics['idfactor'], ':description' => $rubrics['description'], ':idrubric' => (int) $rubrics['idrubric']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteRubric($rubrics)
    {
        try {
            $query = "DELETE FROM rubrics WHERE idrubric = :idrubric ";
            $param = [':idrubric' => $rubrics['idrubric']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    private function Validar($rubrics)
    {
        if (!array_key_exists('idrubric', $rubrics) || !array_key_exists('description', $rubrics)) {
            throw new Exception();
        }
    }
}
