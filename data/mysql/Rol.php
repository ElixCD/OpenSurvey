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
        $this->Rol = $this->connection->QuerySelect("SELECT * FROM roles WHERE idrol = '" . $idRol . "'");

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
            return $this->connection->QueryTransaction("INSERT INTO roles(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, '" . $rol['iduser_type'] . "', '" . $rol['idmodule'] . "' , '" . $rol['idpermission'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateRol($rol)
    {
        try {
            $query = "UPDATE roles SET user_types_iduser_type = '" . $rol['iduser_type'] . "', modules_idmodule='" . $rol['idmodule'] . "', permissions_idpermission='" . $rol['idpermission'] . "' WHERE idrol = " . (int) $rol['idrol'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteRol($rol)
    {
        try {
            $param = $rol['idrol'];
            return $this->connection->QueryTransaction("DELETE FROM roles WHERE idrol = '" . $param . "' )");
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
