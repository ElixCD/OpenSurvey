<?php

namespace Data\MySql;

use Data;
use Exception;

class UserRol implements Data\Interfaces\IUserRol
{
    private $UserRol = [];

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

    function GetUserRolesByUser(int $idUser)
    {
        $salida = array();
        // $this->UserRol = $this->connection->QuerySelect("SELECT * FROM user_roles WHERE users_iduser = '" . $idUser . "'");
        $query = "SELECT ur.users_iduser, ur.iduser_rol, r.*  FROM user_roles  AS ur INNER JOIN roles AS r ON r.idrol = ur.roles_idrol WHERE users_iduser = :idUser";
        $param = [':idUser' => $idUser];
        $this->UserRol = $this->connection->QuerySelect($query, $param);

        if (!is_array($this->UserRol)) {
            array_push($salida, $this->UserRol);
        } else {
            $salida = $this->UserRol;
        }
        return $salida;
    }

    function GetUserRolesByRol(int $idRol)
    {
        $query = "SELECT * FROM user_roles WHERE roles_idrol = :idRol";
        $param = [':idRol' => $idRol];
        $this->UserRol = $this->connection->QuerySelect($query, $param);
        return $this->UserRol;
    }

    function SaveUserRol($userRoles)
    {
        try {
            $query = "INSERT INTO user_roles(users_iduser, roles_idrol) VALUES (:iduser, :idrol )";
            $param = [':iduser' => $userRoles['iduser'], ':idrol' => $userRoles['idrol']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUserRol($userRoles)
    {
        try {
            $query = "UPDATE user_roles SET users_iduser = :iduser, roles_idrol = :idrol WHERE users_iduser = :iduser";
            $param = [':iduser' => $userRoles['iduser'], ':idrol' => $userRoles['idrol'], ':iduser' => (int) $userRoles['iduser']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteUserRoles($userRoles)
    {
        try {
            $query = "DELETE FROM user_roles WHERE users_iduser = :iduser";
            $param = [':iduser' => $userRoles['iduser']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($userRoles)
    {
        if (!array_key_exists('iduser_rol', $userRoles) || !array_key_exists('description', $userRoles)) {
            throw new Exception();
        }
    }
}
