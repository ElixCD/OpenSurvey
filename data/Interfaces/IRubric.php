<?php

namespace Data\Interfaces;

interface IRubric
{
    function getRubric(int $idRubric);

    function getRubrics(int $idFactor, int $numberPage=1);

    function saveRubric($rubrics);

    function updateRubric($rubrics = []);

    function deleteRubric($rubrics);

    function IsSuccess() : bool;

    function GetMessage() : string;

}
