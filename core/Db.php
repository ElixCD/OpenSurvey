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
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    function getConnection()
    {
        return $this->gbd;
    }

    function querySelect(string $query) : array
    {
        try {
            $result = array();
            $salida = $this->gbd->query($query, PDO::FETCH_ASSOC);
            if ($salida != false) {
                foreach ($salida as $row) {
                    array_push($result, $row);
                }
            }else{
                $result = false;
            }
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function queryTransaction(string $query) : bool
    {
        try {
            $this->gbd->beginTransaction();
            $gsent = $this->gbd->prepare($query);
            $gsent->execute();
            return $this->gbd->commit();
        } catch (\Throwable $th) {
            $this->gbd->rollBack();
            throw $th;
        }
    }
}
