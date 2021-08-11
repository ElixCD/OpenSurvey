<?php
require '../../../vendor/autoload.php';

use Domain\SessionDomain;

$sesion = new SessionDomain();
$sesion->UserLogout();

$currentUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$posModule = stripos($currentUrl, "module");
$url = substr($currentUrl, 0, $posModule);

$arr = ['isSuccess' => true, 'message' => 'Logout', 'url' => $url ];
$json = json_encode($arr);
echo $json;
