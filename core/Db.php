<?php

namespace Sysurvey;

use PDO;
use PDOException;

class Db implements IDb
{
    private $gbd;

    function __construct()
    {
        try {
            $this->gbd = new PDO('mysql:dbname=' . $_ENV['DB'] . ';host=' . $_ENV['HOST'] . ';', $_ENV['USR'], $_ENV['SECRET_KEY']);
        } catch (PDOException $e) {
            throw new PDOException('Connection error: ' . $e->getMessage(), 1);
        }
    }

    function getConnection()
    {
        return $this->gbd;
    }

    function querySelect(string $query): array
    {
        try {
            $result = array();
            $salida = $this->gbd->query($query, PDO::FETCH_ASSOC);
            if ($salida != false) {
                foreach ($salida as $row) {
                    array_push($result, $row);
                }
            } else {
                $result = false;
            }
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function queryTransaction(string $query)
    {
        try {
            $last = 0;
            $this->gbd->beginTransaction();
            $gsent = $this->gbd->prepare($query);

            if ($gsent->execute()) {
                $last = $this->gbd->lastInsertId();
            }
            if ($this->gbd->commit()) {
                if ($last != 0) {
                    return $last;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->gbd->rollBack();
            throw $th;
        }
    }
}
