<?php

namespace Data\Interfaces;

interface IUserSurvey
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getUserSurveys(int $idUserSurvey);

    function saveUserSurvey($userSurveys);

    function updateUserSurvey($userSurveys);

    function deleteUserSurvey($userSurveys);

}
