<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;

$action = $_POST['action'];
$newUser = [
    "iduser" => isset($_POST['iduser']) ? (int) $_POST['iduser'] : "",
    "email" => isset($_POST['email']) ? $_POST['email'] : "",
    "name" => isset($_POST['name']) ? $_POST['name'] : "",
    "password" => isset($_POST['password']) ? $_POST['password'] : "",
    "active" => isset($_POST['active']) ? $_POST['active'] : false,
    "last_login" =>  NULL,
    "register_date" => NULL,
    "idrol" => isset($_POST['idrol']) ? $_POST['idrol'] : 0
];


// print_r(json_encode($newUser));

$arr = [];
$user = new Models\User(new Db());
$userRol = new Models\UserRol(new Db());

$result = null;

switch ($action) {
    case 'new': {
            $newUser["register_date"] = date("Y-m-d h:i:s");
            $result = $user->saveUser($newUser);
            $newUser["iduser"] = $result;
            $userRol->saveUserRol($newUser);
            break;
        }
    case 'update': {
            // $newUser["last_login"] = date("Y-m-d h:i:s");
            $result = $user->updateUser($newUser);

            if ($userRol->getUserRolesByUser($newUser["iduser"]) == false) {
                $userRol->saveUserRol($newUser);
            } else {
                $userRol->updateUserRol($newUser);
            }

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
