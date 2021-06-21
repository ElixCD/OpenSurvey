<?php

namespace Data\Interfaces;

interface IPermission
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getPermission(int $idPermission);

    function getPermissions(int $numberPage);

    function savePermission($description);

    function updatePermission($permission);

    function deletePermission($permission);

}
