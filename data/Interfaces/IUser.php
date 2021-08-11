<?php

namespace Data\Interfaces;

interface IUser
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function GetUser(int $idUser);

    function GetUsers(int $numberPage);

    function SaveUser($user);

    function UpdateUser($user);

    function DeleteUser($user);

    function GetUserLogin(string $email, string $password);

}
