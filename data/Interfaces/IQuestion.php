<?php

namespace Data\Interfaces;

interface IQuestion
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetQuestion(int $idQuestion);

    function GetQuestions(int $idSurvey, int $numberPage);

    function SaveQuestion($question);

    function UpdateQuestion($question);

    function DeleteQuestion($questions);
}
