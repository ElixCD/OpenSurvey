<?php

namespace Data\MySql;

use Data;
use Exception;

class Factor implements Data\Interfaces\IFactor
{
    private $connection;

    function __construct()
    {
        $this->connection = new DbMySQL();
    }

    function IsSuccess() : bool{
        return $this->connection->QuerySuccess();
    }

    function GetMessage() : string{
        return $this->connection->GetMessage();
    }

    function GetFactor(int $idFactor)
    {
        $this->factors = $this->connection->QuerySelect("SELECT * FROM factors WHERE idfactor = '" . $idFactor . "'");

        foreach ($this->factors as $key => $value) {
            if ($value['idfactor'] == $idFactor) {
                return $value;
            } 
        }

        return false;
    }

    function GetFactors(int $idUser, int $numberPage = 1)
    {
        $this->factors = $this->connection->QuerySelect("SELECT * FROM factors");
        return $this->factors;
    }

    function SaveFactor($factor)
    {
        try {
            return $this->connection->QueryTransaction("INSERT INTO factors VALUES (NULL, '" . $factor['description'] . "', '" . $factor['users_iduser'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateFactor($factor)
    {
        try {
            $query = "UPDATE factors SET description = '" . $factor['description'] . "' WHERE idfactor = " . (int) $factor['idfactor'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteFactor($factor)
    {
        try {
            $param = $factor['idfactor'];
            return $this->connection->QueryTransaction("DELETE FROM factors WHERE idfactor = '" . $param . "'");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function Validar($factor)
    {
        if (!array_key_exists('idfactor', $factor) || !array_key_exists('description', $factor)) {
            throw new Exception();
        }
    }
}
