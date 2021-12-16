<?php

namespace Data\MySql;

use OurVoice;
use Exception;

class Question implements OurVoice\Data\IQuestion
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
        $query = "SELECT * FROM questions WHERE idquestions = :idQuestion";
        $param = [':idQuestion' => $idQuestion];
        $this->questions = $this->connection->QuerySelect($query, $param);

        foreach ($this->questions as $key => $value) {
            if ($value['idquestions'] == $idQuestion) {
                return $value;
            }
        }
        return false;
    }

    function GetQuestions(int $idSurvey, int $numberPage)
    {
        $query = "SELECT * FROM questions WHERE surveys_idsurvey = :idSurvey";
        $param = [':idSurvey' => $idSurvey];
        $this->questions = $this->connection->QuerySelect($query, $param);
        return $this->questions;
    }

    function SaveQuestion($question)
    {
        try {
            $query = "INSERT INTO questions VALUES (NULL, :value, :mandatory, :idfactor, :idsurvey )";
            $param = [':value' => $question['value'], ':mandatory' => (int) $question['mandatory'], ':idfactor' => $question['idfactor'], ':idsurvey' => $question['idsurvey']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function UpdateQuestion($question)
    {
        try {
            $query = "UPDATE questions SET value = :value, mandatory = :mandatory, surveys_idsurvey = :idsurvey, factors_idfactor = :idfactor WHERE idquestion = :idquestion";
            $param = [':value' => $question['value'], ':mandatory' => (int) $question['mandatory'], ':idsurvey' => $question['idsurvey'], ':idfactor' => $question['idfactor'], ':idquestion' => (int) $question['idquestion']];
            return $this->connection->QueryTransaction($query, $param);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function DeleteQuestion($questions)
    {
        try {
            $query = "DELETE FROM questions WHERE idquestion = :idquestion";
            $param = [':idquestion' => $questions['idquestion']];
            return $this->connection->QueryTransaction($query, $param);
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
