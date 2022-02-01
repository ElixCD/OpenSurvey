<?php

namespace Data\PgSql;

use OurVoice;
use Exception;

class User implements OurVoice\Data\IUser
{
    public $users = [];

    private $connection;

    function __construct()
    {
        $this->connection = new DbPgSql();
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

    function GetUserById(int $idUser)
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

    function GetUserByEmail(string $email)
    {
        $params = [];
        $params = [':email' => $email];
        $this->users = $this->connection->QuerySelect("SELECT * FROM users WHERE email= :email ", $params);

        foreach ($this->users as $key => $value) {
            if (is_array($value)) {
                if ($value['email'] == $email) {
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

    function GetUsersByParent(int $idParent, int $numberPage = 1)
    {
        $query = "SELECT u1.* FROM users AS u
        LEFT JOIN user_relations AS ur ON ur.users_iduser_admin = u.iduser
        LEFT JOIN users AS u1 ON u1.iduser = ur.users_iduser_user
        WHERE ur.users_iduser_admin = :iduser_admin";
        $param = [':iduser_admin' => $idParent];

        $this->users = $this->connection->QuerySelect($query, $param);
        return $this->users;
    }

    function SaveUser($user)
    {
        try {
            date_default_timezone_set('UTC');
            $query = "INSERT INTO users VALUES (NULL , :email, :name, :password, :active, :last_login, :register_date)";
            $lastLogin = ($user['last_login'] != null ? "'" . $user["last_login"] . "'" : 'NULL');
            $register_date = gmdate("Y/m/d H:i:s", time());
            $params = [':email' => $user['email'], ':name' => $user['name'], ':password' => $user['password'], ':active' => (int) $user['active'], ':last_login' => $lastLogin, ':register_date' => $register_date];
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

            $params = [':name' => $user['name'], ':active' => (int) $user['active'], ':iduser' => (int) $user['iduser']];

            return $this->connection->QueryTransaction($query, $params);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdatePassword($user)
    {
        try {
            date_default_timezone_set('UTC');

            $query = "UPDATE users SET password = :password WHERE iduser= :iduser";
            $params = [':password' => $user['password'], ':iduser' => (int) $user['iduser']];

            return $this->connection->QueryTransaction($query, $params);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateLastLogin(int $iduser)
    {
        try {
            date_default_timezone_set('UTC');

            $lastLogin = gmdate("Y/m/d H:i:s", time());

            $query = "UPDATE users SET last_login = :lastLogin WHERE iduser= :iduser";
            $params = [':lastLogin' => $lastLogin, ':iduser' => $iduser];

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
