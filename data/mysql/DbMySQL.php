<?php

namespace Data\MySql;

use PDO;
use PDOException;
use OurVoice;

class DbMySQL implements OurVoice\IDb
{
    private $gbd;
    private bool $success;
    private string $message = "";

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

    function QuerySelect(string $query): array
    {
        try {
            $result = array();
            if( isset($salida)) $salida = null;
            $salida = $this->gbd->query($query, PDO::FETCH_ASSOC);
            if ($salida != false) {
                foreach ($salida as $row) {
                    array_push($result, $row);
                }
                $this->success = true;
            } else {
                $this->message = $this->gdb->errorInfo();
                $this->success = false;
            }
            return $result;
        } catch (\Throwable $th) {
            $this->success = false;
            throw $th;
        }
    }

    function QueryTransaction(string $query)
    {
        try {
            $result = array();
            $last = 0;
            $this->gbd->beginTransaction();
            $gsent = $this->gbd->prepare($query);

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
                $this->message = $this->gdb->errorInfo();
                return false;
            }
        } catch (\Throwable $th) {
            $this->success = false;
            $this->gbd->rollBack();
            throw $th;
        }
    }

    function QuerySuccess():bool{
        return $this->success;
    }

    function GetMessage(): string{
        return $this->message;
    }
}
