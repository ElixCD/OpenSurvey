<?php

namespace Sysurvey;

use Exception;


class Factor
{
    public $factors = [];

    private $connection;

    function __construct(IDb $connection)
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

    function getFactors(int $numberPage)
    {
        $this->factors = $this->connection->querySelect("SELECT * FROM factor LIMIT 0, 20  ");
        return $this->factors;
    }

    function saveFactor($factor)
    {
        try {
            $param = [$factor['description']];
            $this->connection->queryTransaction("INSERT INTO factor VALUES (NULL, '".$param."' )");
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateFactor($factor = [])
    {
        try {
            // $param = ["description" => $factor['description'], "idfactor" => (int) $factor['idfactor']];
            $query = "UPDATE factor SET description = '".$factor['description']."' WHERE idfactor = ".(int) $factor['idfactor'];
            $this->connection->queryTransaction($query);
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
        // return false;
    }

    function deleteFactor($factor)
    {
        try {
            $param = [$factor['idfactor']];
            $this->connection->queryTransaction("DELETE FROM factor WHERE idfactor = ? )", $param);
            return true;
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
