<?php

namespace OurVoice;

interface IDb
{
    function GetConnection();
    function QuerySelect(string $query): array;
    // function Query(string $query, $parameters = []);
    function QueryTransaction(string $query);
    // function Query(string $query);

    function QuerySuccess():bool;
    function GetMessage(): string;
}
