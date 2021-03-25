<?php

namespace Models;

use Sysurvey;
use Exception;

class ModuleAccess
{
    private $ModuleAccess = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getModulesAccesse(int $idModuleAccess)
    {
        $this->ModuleAccess = $this->connection->querySelect("SELECT * FROM module_access WHERE idmodule_access = '" . $idModuleAccess . "'");

        foreach ($this->ModuleAccess as $key => $value) {
            if ($value['idmodule_access'] == $idModuleAccess) {
                return $value;
            }
        }
        return false;
    }

    function getModuleAccess(int $numberPage)
    {
        $this->ModuleAccess = $this->connection->querySelect("SELECT * FROM module_access");
        return $this->ModuleAccess;
    }

    function saveModuleAccess($moduleAccess)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, '" . $moduleAccess['iduser_type'] . "', '" . $moduleAccess['idmodule'] . "' , '" . $moduleAccess['idpermission'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateModuleAccess($moduleAccess)
    {
        try {
            $query = "UPDATE module_access SET user_types_iduser_type = '" . $moduleAccess['iduser_type'] . "', modules_idmodule='" . $moduleAccess['idmodule'] . "', permissions_idpermission='" . $moduleAccess['idpermission'] . "' WHERE idmodule_access = " . (int) $moduleAccess['idmodule_access'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteModuleAccess($moduleAccess)
    {
        try {
            $param = $moduleAccess['idmodule_access'];
            return $this->connection->queryTransaction("DELETE FROM module_access WHERE idmodule_access = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($moduleAccess)
    {
        if (!array_key_exists('idmodule_access', $moduleAccess) || !array_key_exists('description', $moduleAccess)) {
            throw new Exception();
        }
    }
}
