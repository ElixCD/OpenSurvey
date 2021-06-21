<?php
require '../../../vendor/autoload.php';

$action = $_POST['action'];
$newRubric = [
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "idrubric" => isset($_POST['idrubric']) ? (int) $_POST['idrubric'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "value" => isset($_POST['v']) ? $_POST['v'] : ""
];

$arr = [];
$rubric = new Domain\RubricDomain();
$result = false;

switch ($action) {
    case 'new': {
            $result = $rubric->SaveRubric($newRubric);
            break;
        }
    case 'update': {
            $result = $rubric->UpdateRubric($newRubric);
            break;
        }
    case 'delete': {
            $result = $rubric->DeleteRubric($newRubric);
            break;
        }
    default:
        $result = false;
        break;
}

if ($rubric->IsSuccess()) {
    $arr = ["msj" => "Operacion realizada con exito", "error" => false, "opt" => $result];
} else {
    $arr = ["msj" => $rubric->GetMessage(), "error" => true];
}

$json = json_encode($arr);

print_r($json);
