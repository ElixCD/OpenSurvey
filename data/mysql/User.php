<?php

namespace Data\MySql;

use Data;
use Exception;

class User implements Data\Interfaces\IUser
{
    public $users = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbMySQL();
    }

    function IsSuccess(): bool
    {
        return $this->connection->QuerySuccess();
    }

    function GetMessage(): string
    {
        return $this->connection->GetMessage();
    }

    function GetUserLogin(string $email, string $password)
    {
        $this->users = $this->connection->QuerySelect("SELECT * FROM users WHERE email= '" . $email . "' and password= '" . $password . "'");

        foreach ($this->users as $key => $value) {
            return $value;
        }

        return false;
    }

    function GetUser(int $idUser)
    {
        $this->users = $this->connection->QuerySelect("SELECT * FROM users WHERE iduser= '" . $idUser . "'");

        foreach ($this->users as $key => $value) {
            if (is_array($value)) {
                if ($value['iduser'] == $idUser) {
                    return $value;
                }
            }
        }

        return false;
    }

    function GetUsers(int $numberPage)
    {
        $this->users = $this->connection->QuerySelect("SELECT * FROM users");
        // if()
        return $this->users;
    }

    function SaveUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            return $this->connection->QueryTransaction("INSERT INTO users VALUES (NULL , '" . $user['email'] . "' , '" . $user['name'] . "', '" . $user['password'] . "', " . $user['active'] . ", " . ($user['last_login'] != null ? "'" . $user["last_login"] . "'" : 'NULL') . ", " . ($user['register_date'] != null ?  "'" . $user["register_date"] . "'" : 'NULL') . ")");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            $query = "UPDATE users SET name = '" . $user['name'] . "', active = " . (bool) $user['active'] . " WHERE iduser= " . (int) $user['iduser'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteUser($user)
    {
        try {
            $param = $user['iduser'];
            return $this->connection->QueryTransaction("DELETE FROM users WHERE iduser= '" . $param . "'");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($user)
    {
        if (!array_key_exists('iduser', $user) || !array_key_exists('description', $user)) {
            throw new Exception();
        }
    }
}
