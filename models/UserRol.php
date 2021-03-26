<?php

namespace Models;

use Sysurvey;
use Exception;

class UserRol
{
    private $UserRol = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getUserRolesByUser(int $idUser)
    {
        $this->UserRol = $this->connection->querySelect("SELECT * FROM user_roles WHERE users_iduser = '" . $idUser . "'");
        return $this->UserRol;
    }

    function getUserRolesByRol(int $idRol)
    {
        $this->UserRol = $this->connection->querySelect("SELECT * FROM user_roles WHERE roles_idrol = '" . $idRol . "'");
        return $this->UserRol;
    }

    function saveUserRol($userRoles)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO user_roles(users_iduser, roles_idrol) VALUES ('" . $userRoles['iduser'] . "', '" . $userRoles['idrol'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateUserRol($userRoles)
    {
        try {
            $query = "UPDATE user_roles SET users_iduser = '" . $userRoles['iduser'] . "', roles_idrol='" . $userRoles['idrol'] . "' WHERE users_iduser = " . (int) $userRoles['iduser'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteUserRoles($userRoles)
    {
        try {
            $param = $userRoles['iduser'];
            return $this->connection->queryTransaction("DELETE FROM user_roles WHERE users_iduser = '" . $param . "'");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($userRoles)
    {
        if (!array_key_exists('iduser_rol', $userRoles) || !array_key_exists('description', $userRoles)) {
            throw new Exception();
        }
    }
}
