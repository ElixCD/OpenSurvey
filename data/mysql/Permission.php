<?php

namespace Data\MySql;

use Data\Interfaces\IPermission;
use Exception;

class Permission implements IPermission
{
    private $Permission = [];

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

    function GetPermission(int $idPermission)
    {
        $this->Permission = $this->connection->QuerySelect("SELECT * FROM permissions WHERE idpermission = '" . $idPermission . "'");

        foreach ($this->Permission as $key => $value) {
            if ($value['idpermission'] == $idPermission) {
                return $value;
            }
        }
        return false;
    }

    function GetPermissions(int $numberPage)
    {
        $this->Permission = $this->connection->QuerySelect("SELECT * FROM permissions");
        return $this->Permission;
    }

    function SavePermission($description)
    {
        try {
            return $this->connection->QueryTransaction("INSERT INTO permissions VALUES (NULL, '" . $description . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdatePermission($permission)
    {
        try {
            $query = "UPDATE permissions SET description = '" . $permission['description'] . "' WHERE idpermission = " . (int) $permission['idpermission'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeletePermission($permission)
    {
        try {
            $param = $permission['idPermissions'];
            return $this->connection->QueryTransaction("DELETE FROM permissions WHERE idpermission = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($permission)
    {
        if (!array_key_exists('idPermissions', $permission) || !array_key_exists('description', $permission)) {
            throw new Exception();
        }
    }
}
