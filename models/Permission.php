<?php

namespace Models;

use Sysurvey;
use Exception;

class Permission
{
    private $Permission = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getPermission(int $idPermission)
    {
        $this->Permission = $this->connection->querySelect("SELECT * FROM permissions WHERE idpermission = '" . $idPermission . "'");

        foreach ($this->Permission as $key => $value) {
            if ($value['idpermission'] == $idPermission) {
                return $value;
            }
        }
        return false;
    }

    function getPermissions(int $numberPage)
    {
        $this->Permission = $this->connection->querySelect("SELECT * FROM permissions");
        return $this->Permission;
    }

    function savePermission($description)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO permissions VALUES (NULL, '" . $description . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updatePermission($permission)
    {
        try {
            $query = "UPDATE permissions SET description = '" . $permission['description'] . "' WHERE idpermission = " . (int) $permission['idpermission'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deletePermission($permission)
    {
        try {
            $param = $permission['idPermissions'];
            return $this->connection->queryTransaction("DELETE FROM permissions WHERE idpermission = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($permission)
    {
        if (!array_key_exists('idPermissions', $permission) || !array_key_exists('description', $permission)) {
            throw new Exception();
        }
    }
}
