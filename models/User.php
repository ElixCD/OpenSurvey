<?php

namespace Models;

use Sysurvey;
use Exception;

class User
{
    public $users = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getUser(int $idUser)
    {
        $this->users = $this->connection->querySelect("SELECT * FROM users WHERE iduser= '" . $idUser . "'");

        foreach ($this->users as $key => $value) {
            if ($value['iduser'] == $idUser) {
                return $value;
            }
        }
        return false;
    }

    function getUsers(int $numberPage)
    {
        $this->users = $this->connection->querySelect("SELECT * FROM users");
        return $this->users;
    }

    function saveUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            return $this->connection->queryTransaction("INSERT INTO users VALUES (NULL , '" . $user['email'] . "' , '" . $user['name'] . "', '" . $user['password'] . "', " . $user['active'] . ", " . ($user['last_login'] != null ? "'" . $user["last_login"] . "'" : 'NULL') . ", " . ($user['register_date'] != null ?  "'" . $user["register_date"] . "'" : 'NULL') . ")");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            $query = "UPDATE users SET name = '" . $user['name'] . "', active = " . $user['active'] . " WHERE iduser= " . (int) $user['iduser'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteUser($user)
    {
        try {
            $param = $user['iduser'];
            return $this->connection->queryTransaction("DELETE FROM users WHERE iduser= '" . $param . "'");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($user)
    {
        if (!array_key_exists('iduser', $user) || !array_key_exists('description', $user)) {
            throw new Exception();
        }
    }
}
