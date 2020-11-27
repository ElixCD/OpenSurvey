<?php
$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newSurvey = [
    "idquestion" => isset($_POST['idquestion']) ? (int) $_POST['idquestion'] : "",
    "value" => isset($_POST['d']) ? $_POST['d'] : "",
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : ""
];

$arr = [];
$survey = new Models\Question(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $result = $survey->saveQuestion($newSurvey);
            break;
        }
    case 'update': {
            $result = $survey->updateQuestion($newSurvey);
            break;
        }
    case 'delete': {
            $result = $survey->saveQuestion($newSurvey);
            break;
        }
    default:
        $result = false;
        break;
}

if ($result) {
    $arr = ["msj" => "Operación realizada satisfactoriamente.", "error" => false];
} else {
    $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
}

$json = json_encode($arr);
print_r($json);
