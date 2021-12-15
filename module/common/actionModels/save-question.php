<?php
require '../../../vendor/autoload.php';

$action = $_POST['action'];
$newQuestion = [
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "idsurvey" => isset($_POST['idSurvey']) ? (int) $_POST['idSurvey'] : "",
    "value" => isset($_POST['d']) ? $_POST['d'] : "",
    "mandatory" => isset($_POST['mandatory']) ? (bool) $_POST['mandatory'] : false,
    "idquestion" => isset($_POST['idQuestion']) ? $_POST['idQuestion'] : ""
];

$arr = [];
$question = new Domain\QuestionDomain();
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

if ($question->IsSuccess()) {
    $arr = ["msj" => "Operacion realizada con exito", "error" => false, "opt" => $result];
} else {
    $arr = ["msj" => $question->GetMessage(), "error" => true];
}

$json = json_encode($arr);

print_r($json);
