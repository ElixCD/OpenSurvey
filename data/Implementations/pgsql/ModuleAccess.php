<?php

namespace Data\PgSql;

use OurVoice;
use Exception;

class ModuleAccess implements OurVoice\Data\IModuleAccess
{
    private $ModuleAccess = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbPgSql();
    }

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetModulesAccess(int $idModuleAccess)
    {
        $query = "SELECT * FROM module_access WHERE idmodule_access = '" . $idModuleAccess . "'";
        $parameters = [':idmodule_access' => $idModuleAccess];
        $this->ModuleAccess = $this->connection->QuerySelect($query, $parameters);

        foreach ($this->ModuleAccess as $key => $value) {
            if ($value['idmodule_access'] == $idModuleAccess) {
                return $value;
            }
        }
        return false;
    }

    function GetModuleAccess(int $numberPage)
    {
        $this->ModuleAccess = $this->connection->QuerySelect("SELECT * FROM module_access");
        return $this->ModuleAccess;
    }

    function SaveModuleAccess($moduleAccess)
    {
        try {
            $query = "INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, :iduser_type, :idmodule, :idpermission )";
            $parameters = [':iduser_type' => $moduleAccess['iduser_type'], ':idmodule' => $moduleAccess['idmodule'], ':idpermission' => $moduleAccess['idpermission']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateModuleAccess($moduleAccess)
    {
        try {
            $query = "UPDATE module_access SET user_types_iduser_type = :iduser_type, modules_idmodule = :idmodule, permissions_idpermission= :idpermission WHERE idmodule_access = :idmodule_access";
            $parameters = [':iduser_type' => $moduleAccess['iduser_type'], ':idmodule' => $moduleAccess['idmodule'], ':idpermission' => $moduleAccess['idpermission'], ':idmodule_access' => (int) $moduleAccess['idmodule_access']];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteModuleAccess($moduleAccess)
    {
        try {
            $query = "DELETE FROM module_access WHERE idmodule_access = :idmodule_access )";
            $param = [':idmodule_access' => $moduleAccess['idmodule_access']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function Validar($moduleAccess)
    {
        if (!array_key_exists('idmodule_access', $moduleAccess) || !array_key_exists('description', $moduleAccess)) {
            throw new Exception();
        }
    }
}
