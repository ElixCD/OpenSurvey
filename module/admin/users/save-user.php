<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newUser = [
    "iduser" => isset($_POST['idUser']) ? (int) $_POST['idUser'] : "",
    "email" => isset($_POST['email']) ? $_POST['email'] : "",
    "name" => isset($_POST['name']) ? $_POST['name'] : "",
    "password" => isset($_POST['password']) ? $_POST['password'] : "",
    "active" => isset($_POST['active']) ? $_POST['active'] : false,
    "last_login" =>  NULL,
    "register_date" => NULL,
];

// print_r(json_encode($newUser));

$arr = [];
$user = new Models\User(new Db());
$result = null;

switch ($action) {
    case 'new': {
            $newUser["register_date"] = date("Y-m-d h:i:s");
            $result = $user->saveUser($newUser);
            break;
        }
    case 'update': {
            $newUser["last_login"] = date("Y-m-d h:i:s");
            $result = $user->updateUser($newUser);
            break;
        }
    case 'delete': {
            $result = $user->deleteUser($newUser);
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
