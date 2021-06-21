<?php

namespace Data\Interfaces;

interface ISurvey
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getSurvey(int $idSurvey);

    function getSurveys(int $numberPage);

    function saveSurvey($survey);

    function updateSurvey($survey);

    function deleteSurvey($survey);

}
