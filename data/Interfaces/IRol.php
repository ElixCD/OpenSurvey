<?php

namespace Data\Interfaces;

interface IRol
{
    function IsSuccess() : bool;

    function GetMessage() : string;

    function getRol(int $idRol);

    function getRoles(int $numberPage = 1);

    function saveRol($rol);

    function updateRol($rol);

    function deleteRol($rol);

}
