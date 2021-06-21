<?php

namespace Data\Interfaces;

interface IModule
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getModule(int $idModule);

    function getModules(int $numberPage);

    function saveModule($name, $idmodule_type);

    function updateModule($Module);

    function deleteModule($Module);

    function validar($Module);
}
