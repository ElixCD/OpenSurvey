<?php
require '../../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newRubric = [
    "idfactor" => isset($_POST['idfactor']) ? (int) $_POST['idfactor'] : "",
    "idrubric" => isset($_POST['idrubric']) ? (int) $_POST['idrubric'] : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : "",
    "value" => isset($_POST['v']) ? $_POST['v'] : ""
];

// print_r(json_encode($newSurvey));

$arr = [];
$rubric = new Models\Rubric(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $result = $rubric->saveRubric($newRubric);
            break;
        }
    case 'update': {
            $result = $rubric->updateRubric($newRubric);
            break;
        }
    case 'delete': {
            $result = $rubric->deleteRubric($newRubric);
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
