<?php

namespace Data\MySql;

use Data;
use Exception;

class Module implements Data\Interfaces\IModule
{
    public $Module = [];

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

    function GetModule(int $idModule)
    {
        $this->Module = $this->connection->QuerySelect("SELECT * FROM modules WHERE idmodule = '" . $idModule . "'");

        foreach ($this->Module as $key => $value) {
            if ($value['idmodule'] == $idModule) {
                return $value;
            }
        }
        return false;
    }

    function GetModules(int $numberPage)
    {
        $this->Module = $this->connection->QuerySelect("SELECT * FROM modules");
        return $this->Module;
    }

    function SaveModule($name, $idmodule_type)
    {
        try {
            return $this->connection->QueryTransaction("INSERT INTO modules VALUES (NULL, '" . $name . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateModule($Module)
    {
        try {
            $query = "UPDATE modules SET name = '" . $Module['name'] . "' WHERE idmodule = " . (int) $Module['idmodule'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteModule($Module)
    {
        try {
            $param = $Module['idmodule'];
            return $this->connection->QueryTransaction("DELETE FROM modules WHERE idmodule = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function Validar($Module)
    {
        if (!array_key_exists('idModules', $Module) || !array_key_exists('description', $Module)) {
            throw new Exception();
        }
    }
}
