<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newQuestion = [
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "idsurvey" => isset($_POST['idSurvey']) ? (int) $_POST['idSurvey'] : "",
    "value" => isset($_POST['d']) ? $_POST['d'] : "",
    "mandatory" => isset($_POST['mandatory']) ? $_POST['mandatory'] : false,
    "idquestion" => isset($_POST['idQuestion']) ? $_POST['idQuestion'] : ""
];

$arr = [];
$question = new Models\Question(new Db());
$result = false;

switch ($action) {
    case 'new': {
            $result = $question->saveQuestion($newQuestion);
            break;
        }
    case 'update': {
            $result = $question->updateQuestion($newQuestion);
            break;
        }
    case 'delete': {
            $result = $question->deleteQuestion($newQuestion);
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
