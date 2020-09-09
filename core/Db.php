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
            $this->gbd = new PDO('mysql:dbname=' . $_ENV['DB'] . ';host=127.0.0.1;', $_ENV['USR'], $_ENV['SECRET_KEY']);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    function getConnection()
    {
        return $this->gbd;
    }

    function querySelect(string $query)
    {
        $result = [];
        foreach ($this->gbd->query($query, PDO::FETCH_ASSOC) as $row) {
            array_push($result, $row);
        }
        return $result;
    }

    function queryTransaction(string $query)
    {
        $this->gbd->beginTransaction();

        try {
            $gsent = $this->gbd->prepare($query);
            $gsent->execute();
            $this->gbd->commit();

        } catch (\Throwable $th) {
            $this->gbd->rollBack();
            throw $th;
        }
    }
}
