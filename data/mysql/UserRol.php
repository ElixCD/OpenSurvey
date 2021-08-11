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

    function IsSuccess() : bool{
        return $this->connection->QuerySuccess();
    }

    function GetMessage() : string{
        return $this->connection->GetMessage();
    }

    function GetUserRolesByUser(int $idUser)
    {
        $this->UserRol = $this->connection->QuerySelect("SELECT * FROM user_roles WHERE users_iduser = '" . $idUser . "'");
        foreach ($this->UserRol as $key => $value) {
            return $value;
        }
        return array();
    }

    function GetUserRolesByRol(int $idRol)
    {
        $this->UserRol = $this->connection->QuerySelect("SELECT * FROM user_roles WHERE roles_idrol = '" . $idRol . "'");
        return $this->UserRol;
    }

    function SaveUserRol($userRoles)
    {
        try {
            return $this->connection->QueryTransaction("INSERT INTO user_roles(users_iduser, roles_idrol) VALUES ('" . $userRoles['iduser'] . "', '" . $userRoles['idrol'] . "' )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUserRol($userRoles)
    {
        try {
            $query = "UPDATE user_roles SET users_iduser = '" . $userRoles['iduser'] . "', roles_idrol='" . $userRoles['idrol'] . "' WHERE users_iduser = " . (int) $userRoles['iduser'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteUserRoles($userRoles)
    {
        try {
            $param = $userRoles['iduser'];
            return $this->connection->QueryTransaction("DELETE FROM user_roles WHERE users_iduser = '" . $param . "'");
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
