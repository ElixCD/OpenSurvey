<?php

namespace Models;

use Sysurvey;
use Exception;

class Factor
{
    public $factors = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getFactor(int $idFactor)
    {
        $this->factors = $this->connection->querySelect("SELECT * FROM factors WHERE idfactor = '" . $idFactor . "'");

        foreach ($this->factors as $key => $value) {
            if ($value['idfactor'] == $idFactor) {
                return $value;
            }
        }
        return false;
    }

    function getFactors(int $idUser, int $numberPage = 1)
    {
        // $this->factors = $this->connection->querySelect("SELECT * FROM factors WHERE users_iduser = '$idUser'");
        $this->factors = $this->connection->querySelect("SELECT * FROM factors");

        return $this->factors;
    }

    function saveFactor($factor)
    {
        try {
            // $param = $factor['description'];
            return $this->connection->queryTransaction("INSERT INTO factors VALUES (NULL, '" . $factor['description'] . "', '" . $factor['users_iduser'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateFactor($factor = [])
    {
        try {
            $query = "UPDATE factors SET description = '" . $factor['description'] . "' WHERE idfactor = " . (int) $factor['idfactor'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteFactor($factor)
    {
        try {
            $param = $factor['idfactor'];
            return $this->connection->queryTransaction("DELETE FROM factors WHERE idfactor = '" . $param . "'");
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
