<?php
require '../../../vendor/autoload.php';

$action = $_POST['action'];
$newFactor = [
    "idsurvey" => isset($_POST['idsurvey']) ? (int) $_POST['idsurvey'] : "",
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "users_iduser" => 1
];

$arr = [];
$factor = new Domain\FactorDomain();
$result = false;

switch ($action) {
    case 'new': {
            $result = $factor->SaveFactor($newFactor);
            break;
        }
    case 'update': {
            $result = $factor->UpdateFactor($newFactor);
            break;
        }
    case 'delete': {
            $result = $factor->DeleteFactor($newFactor);
            break;
        }
    default:
        $result = false;
        break;
}

if ($factor->IsSuccess()) {
    $arr = ["msj" => "Operacion realizada con exito", "error" => false, "opt" => $result];
} else {
    $arr = ["msj" => $factor->GetMessage(), "error" => true];
}

$json = json_encode($arr);

print_r($json);
