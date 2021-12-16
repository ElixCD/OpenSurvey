<?php

namespace OurVoice\Data;

interface ISurvey
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetSurvey(int $idSurvey);

    function GetSurveys(int $numberPage);

    function SaveSurvey($survey);

    function UpdateSurvey($survey);

    function DeleteSurvey($survey);
}
