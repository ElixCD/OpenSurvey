<?php

namespace Data\Interfaces;

interface ISurvey
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function GetSurvey(int $idSurvey);

    function GetSurveys(int $numberPage);

    function SaveSurvey($survey);

    function UpdateSurvey($survey);

    function DeleteSurvey($survey);

}
