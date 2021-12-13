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

    function GetMessage()
    {
        return $this->connection->GetMessage();
    }

    function GetUserLogin(string $email, string $password)
    {
        $params = [];
        $query = "SELECT * FROM users WHERE email= :email and password= :password ";

        $params = [':email' => $email, ':password' => $password];
        $this->users = $this->connection->QuerySelect($query, $params);
        foreach ($this->users as $key => $value) {
            return $value;
        }

        return false;
    }

    function GetUser(int $idUser)
    {
        $params = [];
        $params = [':idUser' => $idUser];
        $this->users = $this->connection->QuerySelect("SELECT * FROM users WHERE iduser= :idUser ", $params);

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
        return $this->users;
    }

    function SaveUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            $query = "INSERT INTO users VALUES (NULL , :email, :name, :password, :active, :last_login, :register_date)";
            $lastLogin = ($user['last_login'] != null ? "'" . $user["last_login"] . "'" : 'NULL');
            $register_date = gmdate("Y/m/d H:i:s", time());
            $params = [':email' => $user['email'], ':name' => $user['name'], ':password' => $user['password'], ':active' => (bool) $user['active'], ':last_login' => $lastLogin, ':register_date' => $register_date];
            return $this->connection->QueryTransaction($query, $params);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateUser($user)
    {
        try {
            date_default_timezone_set('UTC');

            $query = "UPDATE users SET name = :name, active = :active WHERE iduser= :iduser";
            $params = [':name' => $user['name'], ':active' => (bool) $user['active'], ':iduser' => (int) $user['iduser']];

            // $query = "UPDATE users SET name = '" . $user['name'] . "', active = " . (bool) $user['active'] . " WHERE iduser= " . (int) $user['iduser'];
            return $this->connection->QueryTransaction($query, $params);
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
