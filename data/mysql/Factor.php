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

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetFactor(int $idFactor)
    {
        $query = "SELECT * FROM factors WHERE idfactor = :idFactor";
        $parameters = [':idFactor' => (int) $idFactor];
        $this->factors = $this->connection->QuerySelect($query, $parameters);

        foreach ($this->factors as $key => $value) {
            if ($value['idfactor'] == $idFactor) {
                return $value;
            }
        }

        return false;
    }

    function GetFactors(int $idUser, int $numberPage = 1)
    {
        $query = "SELECT * FROM factors";
        $this->factors = $this->connection->QuerySelect($query);
        return $this->factors;
    }

    function SaveFactor($factor)
    {
        try {
            $query = "INSERT INTO factors VALUES (NULL, :description, :users_iduser )";
            $parameters = [':description' => $factor['description'], ':users_iduser' => (int) $factor['users_iduser']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateFactor($factor)
    {
        try {
            $query = "UPDATE factors SET description = :description WHERE idfactor = :idfactor";
            $parameters = [':description' => $factor['description'], ':idfactor' => (int) $factor['idfactor']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteFactor($factor)
    {
        try {
            $query = "DELETE FROM factors WHERE idfactor = :idfactor ";
            $parameters = [':idfactor' => $factor['idfactor']];
            return $this->connection->QueryTransaction($query, $parameters);
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
