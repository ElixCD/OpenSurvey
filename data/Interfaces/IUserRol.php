<?php

namespace Data\Interfaces;

interface IUserRol
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetUserRolesByUser(int $idUser);

    function GetUserRolesByRol(int $idRol);

    function SaveUserRol($userRoles);

    function UpdateUserRol($userRoles);

    function DeleteUserRoles($userRoles);
}
