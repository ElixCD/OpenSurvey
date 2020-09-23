<?php

namespace Models;

use Sysurvey;
use Exception;

class ModuleType
{
    public $moduleTypes = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getModuleType(int $idModuleType)
    {
        $this->ModuleTypes = $this->connection->querySelect("SELECT * FROM module_type WHERE idmoduleType = '" . $idModuleType . "'");

        foreach ($this->ModuleTypes as $key => $value) {
            if ($value['idmoduleType'] == $idModuleType) {
                return $value;
            }
        }
        return false;
    }

    function getModuleTypes(int $numberPage)
    {
        $this->ModuleTypes = $this->connection->querySelect("SELECT * FROM module_type");
        return $this->ModuleTypes;
    }

    function saveModuleType($ModuleTypes)
    {
        try {
            $param = $ModuleTypes['description'];
            return $this->connection->queryTransaction("INSERT INTO module_type VALUES (NULL, '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateModuleType($ModuleTypes = [])
    {
        try {
            $query = "UPDATE module_type SET description = '" . $ModuleTypes['description'] . "' WHERE idmoduleType = " . (int) $ModuleTypes['idmoduleType'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteModuleType($ModuleTypes)
    {
        try {
            $param = $ModuleTypes['idModuleTypes'];
            return $this->connection->queryTransaction("DELETE FROM module_type WHERE idmoduleType = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($ModuleTypes)
    {
        if (!array_key_exists('idModuleTypes', $ModuleTypes) || !array_key_exists('description', $ModuleTypes)) {
            throw new Exception();
        }
    }
}
