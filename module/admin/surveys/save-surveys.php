<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newSurvey = [
    "idsurvey" => isset($_POST['idsurvey']) ? (int) isset($_POST['idsurvey']) : "",
    "name" => isset($_POST['d']) ? $_POST['d'] : "",
    "idmodule" => 2
];

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
            $result =$survey->deleteSurvey($newSurvey);
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
