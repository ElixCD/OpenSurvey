<?php

namespace Data\PgSql;

use OurVoice;
use Exception;

class Permission implements OurVoice\Data\IPermission
{
    private $Permission = [];

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

    function GetPermission(int $idPermission)
    {
        $query = "SELECT * FROM permissions WHERE idpermission = :idPermission";
        $parameters = [':idPermission' => $idPermission];
        $this->Permission = $this->connection->QuerySelect($query, $parameters);

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
            $query = "INSERT INTO permissions VALUES (NULL, :description )";
            $parameters = [':description' => $description];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdatePermission($permission)
    {
        try {
            $query = "UPDATE permissions SET description = :description WHERE idpermission = :idpermission";
            $parameters = [':description' =>  $permission['description'], ':idpermission' => (int) $permission['idpermission']];
            return $this->connection->QueryTransaction($query, $parameters);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeletePermission($permission)
    {
        try {
            $query = "DELETE FROM permissions WHERE idpermission = :idPermissions )";
            $param = [':idPermissions' => $permission['idPermissions']];
            return $this->connection->QueryTransaction($query, $param);
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
