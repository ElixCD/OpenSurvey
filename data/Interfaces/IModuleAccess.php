<?php

namespace Data\Interfaces;

interface IModuleAccess
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetModulesAccesse(int $idModuleAccess);

    function GetModuleAccess(int $numberPage);

    function SaveModuleAccess($moduleAccess);

    function UpdateModuleAccess($moduleAccess);

    function DeleteModuleAccess($moduleAccess);

    function Validar($moduleAccess);
}
