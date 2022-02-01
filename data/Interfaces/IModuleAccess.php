<?php

namespace OurVoice\Data;

interface IModuleAccess
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetModulesAccess(int $idModuleAccess);

    function GetModuleAccess(int $numberPage);

    function SaveModuleAccess($moduleAccess);

    function UpdateModuleAccess($moduleAccess);

    function DeleteModuleAccess($moduleAccess);

    function Validar($moduleAccess);
}
