<?php

namespace Data\Interfaces;

interface IModule
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetModule(int $idModule);

    function GetModules(int $numberPage);

    function SaveModule($name, $idmodule_type);

    function UpdateModule($Module);

    function DeleteModule($Module);

    function Validar($Module);
}
