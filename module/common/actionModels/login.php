<?php
require '../../../vendor/autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];

$userlogin = new Domain\SessionDomain();

$userlogin->GetUserLogin($email, $password);

if ($userlogin->IsSuccess()) {
    
    $currentUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $posModule = stripos($currentUrl, "module");
    $url = substr($currentUrl, 0, $posModule);

    $arr = ['isSuccess' => $userlogin->IsSuccess(), 'message' => $userlogin->GetMessage(), 'url' => $url . "module/admin"];
    $json = json_encode($arr);
    echo $json;
} else {
    $arr = ['isSuccess' => $userlogin->IsSuccess(), 'message' => $userlogin->GetMessage()];
    $json = json_encode($arr);
    echo $json;
}
