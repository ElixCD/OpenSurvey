<?php

namespace Data\Interfaces;

interface IPermission
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function GetPermission(int $idPermission);

    function GetPermissions(int $numberPage);

    function SavePermission($description);

    function UpdatePermission($permission);

    function DeletePermission($permission);

}
