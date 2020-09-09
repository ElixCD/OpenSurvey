<?php
namespace Sysurvey;

interface IDb{
    function getConnection();
    function querySelect(string $query);
    // function query(string $query, $parameters = []);
    function queryTransaction(string $query);
}