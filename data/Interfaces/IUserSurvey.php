<?php

namespace Data\Interfaces;

interface IUserSurvey
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function GetUserSurveys(int $idUserSurvey);

    function SaveUserSurvey($userSurveys);

    function UpdateUserSurvey($userSurveys);

    function DeleteUserSurvey($userSurveys);

}
