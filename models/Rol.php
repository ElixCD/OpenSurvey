<?php

namespace Models;

use Sysurvey;
use Exception;

class Rol
{
    private $Rol = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getRol(int $idRol)
    {
        $this->Rol = $this->connection->querySelect("SELECT * FROM roles WHERE idrol = '" . $idRol . "'");

        foreach ($this->Rol as $key => $value) {
            if ($value['idrol'] == $idRol) {
                return $value;
            }
        }
        return false;
    }

    function getRoles(int $numberPage)
    {
        $this->Rol = $this->connection->querySelect("SELECT * FROM roles");
        return $this->Rol;
    }

    function saveRol($rol)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO roles(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUES (NULL, '" . $rol['iduser_type'] . "', '" . $rol['idmodule'] . "' , '" . $rol['idpermission'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateRol($rol)
    {
        try {
            $query = "UPDATE roles SET user_types_iduser_type = '" . $rol['iduser_type'] . "', modules_idmodule='" . $rol['idmodule'] . "', permissions_idpermission='" . $rol['idpermission'] . "' WHERE idrol = " . (int) $rol['idrol'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteRol($rol)
    {
        try {
            $param = $rol['idrol'];
            return $this->connection->queryTransaction("DELETE FROM roles WHERE idrol = '" . $param . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($rol)
    {
        if (!array_key_exists('idrol', $rol) || !array_key_exists('description', $rol)) {
            throw new Exception();
        }
    }
}
