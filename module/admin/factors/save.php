<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newFactor = [
    "idsurvey" => isset($_POST['idsurvey']) ? (int) $_POST['idsurvey'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "users_iduser" => 1
];

// print_r(json_encode($newSurvey));

$arr = [];
$factor = new Models\Factor(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $result = $factor->saveFactor($newFactor);
            break;
        }
    case 'update': {
            $result = $factor->saveFactor($newFactor);
            break;
        }
    case 'delete': {
            $result = $factor->saveFactor($newFactor);
            break;
        }
    default:
        $result = false;
        break;
}

if ($result) {
    $arr = ["msj" => $result, "error" => false];
} else {
    $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
}

$json = json_encode($arr);
print_r($result);
