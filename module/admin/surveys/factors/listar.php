<?php

use Sysurvey\Db;

$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';

$id = $_GET['idSurvey'];

$factor = new Models\Factor(new Db);
$factors = $factor->getFactors($id, 1);
$headers = ["Id", "Descripción"];
?>
