<?php

namespace Data\Interfaces;

interface IUserRol
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function GetUserRolesByUser(int $idUser);

    function GetUserRolesByRol(int $idRol);

    function SaveUserRol($userRoles);

    function UpdateUserRol($userRoles);

    function DeleteUserRoles($userRoles);

}
