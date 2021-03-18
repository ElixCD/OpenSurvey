<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newSurvey = [
    "idsurvey" => isset($_POST['idSurvey']) ? (int) $_POST['idSurvey'] : "",
    "name" => isset($_POST['name']) ? $_POST['name'] : "",
    "active" => isset($_POST['active']) ? $_POST['active'] : false,
    "users_iduser" => 1
];

// print_r(json_encode($newSurvey));

$arr = [];
$survey = new Models\Survey(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $result = $survey->saveSurvey($newSurvey);
            break;
        }
    case 'update': {
            $result = $survey->updateSurvey($newSurvey);
            break;
        }
    case 'delete': {
            $result = $survey->deleteSurvey($newSurvey);
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
