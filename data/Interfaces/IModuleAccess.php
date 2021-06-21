<?php

namespace Data\Interfaces;

interface IModuleAccess
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getModulesAccesse(int $idModuleAccess);

    function getModuleAccess(int $numberPage);

    function saveModuleAccess($moduleAccess);

    function updateModuleAccess($moduleAccess);

    function deleteModuleAccess($moduleAccess);

    function validar($moduleAccess);
}
