<?php

namespace Data\MySql;

use Data;
use Exception;

class ModuleAccess implements Data\Interfaces\IModuleAccess
{
    private $ModuleAccess = [];

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
    
    function GetModulesAccesse(int $idModuleAccess)
    {
        $this->ModuleAccess = $this->connection->QuerySelect("SELECT * FROM module_access WHERE idmodule_access = '" . $idModuleAccess . "'");

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
            return $this->connection->QueryTransaction("INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, '" . $moduleAccess['iduser_type'] . "', '" . $moduleAccess['idmodule'] . "' , '" . $moduleAccess['idpermission'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateModuleAccess($moduleAccess)
    {
        try {
            $query = "UPDATE module_access SET user_types_iduser_type = '" . $moduleAccess['iduser_type'] . "', modules_idmodule='" . $moduleAccess['idmodule'] . "', permissions_idpermission='" . $moduleAccess['idpermission'] . "' WHERE idmodule_access = " . (int) $moduleAccess['idmodule_access'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteModuleAccess($moduleAccess)
    {
        try {
            $param = $moduleAccess['idmodule_access'];
            return $this->connection->QueryTransaction("DELETE FROM module_access WHERE idmodule_access = '" . $param . "' )");
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
