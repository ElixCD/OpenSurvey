<?php
$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];

$newFactor = [
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "idsurvey" => isset($_POST['idSurvey']) ? (int) $_POST['idSurvey'] : "",

];

$arr = [];
$factor = new Models\Factor(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $result = $factor->saveFactor($newFactor);
            break;
        }
    case 'update': {
            $result = $factor->updateFactor($newFactor);
            break;
        }
    case 'delete': {    
            $result =$factor->deleteFactor($newFactor);
            break;
        }
    default:
        # code...
        break;
}

if ($result) {
    $arr = ["msj" => "Operación realizada satisfactoriamente.", "error" => false];
} else {
    $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
}

$json = json_encode($arr);
print_r($json);
