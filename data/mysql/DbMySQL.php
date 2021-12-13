<?php

namespace Data\MySql;

use PDO;
use PDOException;
use Data;

class DbMySQL implements Data\Interfaces\IDb
{
    private $gbd;
    private bool $success;
    private $message;

    function __construct()
    {
        try {
            $this->gbd = new PDO('mysql:dbname=' . $_ENV['DB'] . ';host=' . $_ENV['HOST'] . ';', $_ENV['USR'], $_ENV['SECRET_KEY']);
        } catch (PDOException $e) {
            throw new PDOException('Connection error: ' . $e->getMessage(), 1);
        }
    }

    function GetConnection()
    {
        return $this->gbd;
    }

    function QuerySelect(string $query, array $parameters = []): array
    {
        try {
            $result = array();
            if (isset($salida)) $salida = null;

            $executeParameters = true;

            foreach ($parameters as $key => $value) {
                if (strpos($query, $key) == false) {
                    $executeParameters = false;
                    break;
                }
            }

            if ($executeParameters) {
                $sth = $this->gbd->prepare($query);
                $sth->execute($parameters);
                $salida = $sth->fetchAll();
            } else {
                $salida = $this->gbd->query($query, PDO::FETCH_ASSOC);
            }

            if ($salida != false) {
                foreach ($salida as $row) {
                    array_push($result, $row);
                }
                $this->success = true;
            } else {
                $this->message = $this->gbd->errorInfo();
                $this->success = false;
            }
            return $result;
        } catch (\Throwable $th) {
            $this->success = false;
            throw $th;
        }
    }

    function QueryTransaction(string $query, array $parameters = [])
    {
        try {
            $result = array();
            $last = 0;
            $executeParameters = true;
            $this->gbd->beginTransaction();

            $gsent = $this->gbd->prepare($query, [PDO::PARAM_NULL]);

            foreach ($parameters as $key => $value) {
                if (strpos($query, $key) == false) {
                    $executeParameters = false;
                    break;
                }
            }

            if ($executeParameters) {
                $gsent = $this->gbd->prepare($query);

                foreach ($parameters as $key => $value) {
                    if ($value === "NULL")
                        $gsent->bindValue($key, $value, PDO::PARAM_NULL);
                    else
                        $gsent->bindValue($key, $value);
                }
            }

            if ($gsent->execute()) {
                $last = $this->gbd->lastInsertId();
            }

            $this->success = $this->gbd->commit();

            if ($this->success) {
                if ($last != 0) {
                    return $last;
                } else {
                    return true;
                }
            } else {
                $this->message = $this->gbd->errorInfo();
                return false;
            }
        } catch (\Throwable $th) {
            $this->success = false;
            $this->gbd->rollBack();
            throw $th;
        }
    }

    function QuerySuccess(): bool
    {
        return $this->success;
    }

    function GetMessage()
    {
        return $this->message;
    }
}
