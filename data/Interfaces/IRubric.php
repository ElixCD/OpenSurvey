<?php

namespace Data\Interfaces;

interface IRubric
{
    function GetRubric(int $idRubric);

    function GetRubrics(int $idFactor, int $numberPage=1);

    function SaveRubric($rubrics);

    function UpdateRubric($rubrics = []);

    function DeleteRubric($rubrics);

    function IsSuccess() : bool;

    function GetMessage() : string;

}
