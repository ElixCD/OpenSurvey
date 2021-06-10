<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newFactor = [
    "idsurvey" => isset($_POST['idsurvey']) ? (int) $_POST['idsurvey'] : "",
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "users_iduser" => 1
];

$arr = [];
$factor = new Models\Factor(new Db());
$result = false;

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
            $result = $factor->deleteFactor($newFactor);
            break;
        }
    default:
        $result = false;
        break;
}

if ($result) {
    $arr = ["msj" => "Operacion realizada con exito", "error" => false, "opt" => $result];
} else {
    $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
}

$json = json_encode($arr);

print_r($json);
