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

    function getUserRoles(int $idUserRol)
    {
        $this->UserRol = $this->connection->querySelect("SELECT * FROM user_roles WHERE iduser_rol = '" . $idUserRol . "'");
        return $this->UserRol;
    }

    function saveUserRol($userRoles)
    {
        try {
            return $this->connection->queryTransaction("INSERT INTO user_roles(users_iduser, roles_idrol) VALUES (NULL, '" . $userRoles['iduser'] . "', '" . $userRoles['idrol'] . "' , '" . $userRoles['idpermission'] . "'  )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateUserRol($userRoles)
    {
        try {
            $query = "UPDATE user_roles SET users_iduser = '" . $userRoles['iduser'] . "', roles_idrol='" . $userRoles['idrol'] . "' WHERE iduser_rol = " . (int) $userRoles['iduser_rol'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteUserRol($userRoles)
    {
        try {
            $param = $userRoles['iduser_rol'];
            return $this->connection->queryTransaction("DELETE FROM user_roles WHERE iduser_rol = '" . $param . "' )");
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
