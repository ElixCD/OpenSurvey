<?php

namespace OurVoice\Data;

interface IUser
{
    function IsSuccess() : bool;

    function GetMessage();

    function GetUserById(int $idUser);

    function GetUserByEmail(string $idUser);

    function GetUsers(int $numberPage);

    function SaveUser($user);

    function UpdateUser($user);

    function UpdatePassword($user);

    function UpdateLastLogin(int $iduser);

    function DeleteUser($user);

    function GetUserLogin(string $email, string $password);

}
