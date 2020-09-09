<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

use Sysurvey\Db;

$accion = $_POST['accion'];
$newFactor = [
    "idfactor" => isset($_POST['idfactor']) ? (int) isset($_POST['idfactor']) : "",
    "description" => isset($_POST['d']) ? $_POST['d'] : ""
];

$arr = [];
$factor = new Sysurvey\Factor(new Db());

switch ($accion) {
    case 'new': {
            if ($factor->saveFactor($newFactor)) {
                $arr = ["msj" => "Factor creado satisfactoriamente.", "error" => false];
            } else {
                $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
            }
            break;
        }
    case 'update': {
            if ($msj = $factor->updateFactor($newFactor)) {
                $arr = ["msj" => "Factor actualizado satisfactoriamente", "error" => false];
            } else {
                $arr = ["msj" => $msj, "error" => true];
            }
            break;
        }
    case 'delete': {
            if ($factor->deleteFactor($newFactor)) {
                $arr = ["msj" => "Factor actualizado satisfactoriamente.", "error" => false];
            } else {
                $arr = ["msj" => "Lo sentimos, ha ocurrido un error.", "error" => true];
            }
            break;
        }
    default:
        # code...
        break;
}
$json = json_encode($arr);
print_r($json);
