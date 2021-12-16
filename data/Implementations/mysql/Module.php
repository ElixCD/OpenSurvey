<?php

namespace Data\MySql;

use OurVoice;
use Exception;

class Module implements OurVoice\Data\IModule
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
        $query = "SELECT * FROM modules WHERE idmodule = :idModule";
        $parameters = [':idModule ' => $idModule];
        $this->Module = $this->connection->QuerySelect($query, $parameters);

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
            $query = "INSERT INTO modules VALUES (NULL, :name )";
            $parameters = [':name' => $name];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateModule($Module)
    {
        try {
            $query = "UPDATE modules SET name = :name WHERE idmodule = :idmodule";
            $parameters = [':name' => $Module['name'],  ':idmodule' => (int) $Module['idmodule']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteModule($Module)
    {
        try {
            $query = "DELETE FROM modules WHERE idmodule = :idmodule )";
            $param = [':idmodule' => $Module['idmodule']];
            return $this->connection->QueryTransaction($query, $param);
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
