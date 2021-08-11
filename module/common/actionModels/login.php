<?php
require '../../../vendor/autoload.php';
// OurVoice\SesionStatus::startSession();

use Domain\SessionDomain;

$email = $_POST['email'];
$password = $_POST['password'];

$user = new SessionDomain();
$user->GetUserLogin($email, $password);

if ($user->IsSuccess()) {
    $currentUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $posModule = stripos($currentUrl,"module");
    $url = substr($currentUrl, 0, $posModule);
    
    $arr = ['isSuccess' => $user->IsSuccess(), 'message' => $user->GetMessage(), 'url' => $url."module/admin"];
    $json = json_encode($arr);
    echo $json;  
} else {

    $arr = ['isSuccess' => $user->IsSuccess(), 'message' => $user->GetMessage()];
    $json = json_encode($arr);
    echo $json;    
}
