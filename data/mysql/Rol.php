<?php

namespace Data\MySql;

use Data;
use Exception;

class Rol implements Data\Interfaces\IRol
{
    private $Rol = [];

    private $connection;

    function __construct()
    {
        $this->connection =  new DbMySQL();
    }

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetRol(int $idRol)
    {
        $query = "SELECT * FROM roles WHERE idrol = :idRol ";
        $param = [':idRol' => $idRol];
        $this->Rol = $this->connection->QuerySelect($query, $param);

        foreach ($this->Rol as $key => $value) {
            if (is_array($value)) {
                if ($value['idrol'] == $idRol) {
                    return $value;
                }
            } else {
                return $value;
            }
        }
        return false;
    }

    function GetRoles(int $numberPage = 1)
    {
        $this->Rol = $this->connection->QuerySelect("SELECT * FROM roles");
        return $this->Rol;
    }

    function SaveRol($rol)
    {
        try {
            $query = "INSERT INTO roles(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, :iduser_type, :idmodule, :idpermission)";
            $param = [':iduser_type' => $rol['iduser_type'], ':idmodule' => $rol['idmodule'], ':idpermission' => $rol['idpermission']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateRol($rol)
    {
        try {
            $query = "UPDATE roles SET user_types_iduser_type = :iduser_type, modules_idmodule = :idmodule, permissions_idpermission = :idpermission WHERE idrol = :idrol";
            $param = [':iduser_type' => $rol['iduser_type'], ':idmodule' => $rol['idmodule'], ':idpermission' => $rol['idpermission'], ':idrol' => (int) $rol['idrol']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteRol($rol)
    {
        try {
            $query = "DELETE FROM roles WHERE idrol = :idrol )";
            $param = [':idrol' => $rol['idrol']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($rol)
    {
        if (!array_key_exists('idrol', $rol) || !array_key_exists('description', $rol)) {
            throw new Exception();
        }
    }
}
