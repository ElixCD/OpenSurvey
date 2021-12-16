<?php

namespace OurVoice\Data;

interface IDb
{
    function GetConnection();
    // function QuerySelect(string $query): array;
    function QuerySelect(string $query, array $parameters = []);
    // function QueryTransaction(string $query);

    function QueryTransaction(string $query, array $parameters = []);

    // function Query(string $query);

    function QuerySuccess(): bool;
    function GetMessage();
}
