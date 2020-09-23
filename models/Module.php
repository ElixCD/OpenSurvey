<?php

namespace Models;

use Sysurvey;
use Exception;

class Module
{
    public $Module = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getModule(int $idModule)
    {
        $this->Module = $this->connection->querySelect("SELECT * FROM module WHERE idmodule = '" . $idModule . "'");

        foreach ($this->Module as $key => $value) {
            if ($value['idmodule'] == $idModule) {
                return $value;
            }
        }
        return false;
    }

    function getModules(int $numberPage)
    {
        $this->Module = $this->connection->querySelect("SELECT * FROM module");
        return $this->Module;
    }

    function saveModule($name, $idmodule_type)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO module VALUES (NULL, '" . $name . "', '" . $idmodule_type . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateModule($Module = [])
    {
        try {
            $query = "UPDATE module SET name = '" . $Module['name'] . "', idmodule_type = '" . $Module['idmodule_type'] . "' WHERE idmodule = " . (int) $Module['idmodule'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteModule($Module)
    {
        try {
            $param = $Module['idModules'];
            return $this->connection->queryTransaction("DELETE FROM module WHERE idmodule = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($Module)
    {
        if (!array_key_exists('idModules', $Module) || !array_key_exists('description', $Module)) {
            throw new Exception();
        }
    }
}
