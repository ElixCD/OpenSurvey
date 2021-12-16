<?php

namespace OurVoice\Data;

interface IRol
{
    function IsSuccess(): bool;

    function GetMessage();

    function GetRol(int $idRol);

    function GetRoles(int $numberPage = 1);

    function SaveRol($rol);

    function UpdateRol($rol);

    function DeleteRol($rol);
}
