<?php

namespace Data\Interfaces;

interface IUserRol
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getUserRolesByUser(int $idUser);

    function getUserRolesByRol(int $idRol);

    function saveUserRol($userRoles);

    function updateUserRol($userRoles);

    function deleteUserRoles($userRoles);

}
