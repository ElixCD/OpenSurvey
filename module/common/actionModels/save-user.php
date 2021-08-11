<?php
require '../../../vendor/autoload.php';

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

$arr = [];
$user = new Domain\UserDomain();

$result = false;

switch ($action) {
    case 'new': {
            $result = $user->SaveUser($newUser);            
            break;
        }
    case 'update': {
            $result = $user->UpdateUser($newUser);            
            break;
        }
    case 'delete': {           
            $result = $user->DeleteUser($newUser);
            break;
        }
    default:
        $result = false;
        break;
}

if ($user->IsSuccess()) {
    $arr = ["msj" => "Operacion realizada con exito", "error" => false, "opt" => $result];
} else {
    $arr = ["msj" => $user->GetMessage(), "error" => true];
}

$json = json_encode($arr);

print_r($json);
