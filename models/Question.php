<?php

namespace Models;

use Sysurvey;
use Exception;

class Question
{
    public $questions = [];

    private $connection;

    function __construct(Sysurvey\IDb $connection)
    {
        $this->connection = $connection;
    }

    function getQuestion(int $idQuestion)
    {
        $this->questions = $this->connection->querySelect("SELECT * FROM questions WHERE idquestions = '" . $idQuestion . "'");

        foreach ($this->questions as $key => $value) {
            if ($value['idquestions'] == $idQuestion) {
                return $value;
            }
        }
        return false;
    }

    function getQuestions(int $idSurvey, int $numberPage)
    {
        $this->questions = $this->connection->querySelect("SELECT * FROM questions WHERE surveys_idsurvey = " . $idSurvey);
        return $this->questions;
    }

    function saveQuestion($question)
    {
        try {
            // $param = $question['description'];
            return $this->connection->queryTransaction("INSERT INTO questions VALUES (NULL, '" . $question['value'] . "', " . $question['mandatory'] . ", " . $question['idfactor'] . ", " . $question['idsurvey'] . " )");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function updateQuestion($question)
    {
        try {
            $query = "UPDATE questions SET value = '" . $question['value'] . "', mandatory = " . $question['mandatory'] . ", surveys_idsurvey = " . $question['idsurvey'] . ", factors_idfactor = " . $question['idfactor'] . " WHERE idquestion = " . (int) $question['idquestion'];
            return $this->connection->queryTransaction($query);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function deleteQuestion($questions)
    {
        try {
            $param = $questions['idquestion'];
            return $this->connection->queryTransaction("DELETE FROM questions WHERE idquestion = " . $param . "");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function validar($questions)
    {
        if (!array_key_exists('idquestions', $questions) || !array_key_exists('description', $questions)) {
            throw new Exception();
        }
    }
}
