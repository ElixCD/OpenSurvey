<?php

namespace Data\Interfaces;

interface IUser
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getUser(int $idUser);

    function getUsers(int $numberPage);

    function saveUser($user);

    function updateUser($user);

    function deleteUser($user);

}
