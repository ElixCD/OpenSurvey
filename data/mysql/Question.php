<?php

namespace Data\MySql;

use Data;
use Exception;

class Question implements Data\Interfaces\IQuestion
{
    public $questions = [];

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


    function GetQuestion(int $idQuestion)
    {
        $this->questions = $this->connection->QuerySelect("SELECT * FROM questions WHERE idquestions = '" . $idQuestion . "'");

        foreach ($this->questions as $key => $value) {
            if ($value['idquestions'] == $idQuestion) {
                return $value;
            }
        }
        return false;
    }

    function GetQuestions(int $idSurvey, int $numberPage)
    {
        $this->questions = $this->connection->QuerySelect("SELECT * FROM questions WHERE surveys_idsurvey = " . $idSurvey);
        return $this->questions;
    }

    function SaveQuestion($question)
    {
        try {
            // $param = $question['description'];
            return $this->connection->QueryTransaction("INSERT INTO questions VALUES (NULL, '" . $question['value'] . "', " . $question['mandatory'] . ", " . $question['idfactor'] . ", " . $question['idsurvey'] . " )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateQuestion($question)
    {
        try {
            $query = "UPDATE questions SET value = '" . $question['value'] . "', mandatory = " . $question['mandatory'] . ", surveys_idsurvey = " . $question['idsurvey'] . ", factors_idfactor = " . $question['idfactor'] . " WHERE idquestion = " . (int) $question['idquestion'];
            return $this->connection->QueryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteQuestion($questions)
    {
        try {
            $param = $questions['idquestion'];
            return $this->connection->QueryTransaction("DELETE FROM questions WHERE idquestion = " . $param . "");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function Validar($questions)
    {
        if (!array_key_exists('idquestions', $questions) || !array_key_exists('description', $questions)) {
            throw new Exception();
        }
    }
}
