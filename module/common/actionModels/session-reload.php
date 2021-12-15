<?php
require '../../../vendor/autoload.php';
use Domain\SessionDomain;

$sesionName = $_POST['name'];

$user = OurVoice\SesionStatus::GetSessionData($sesionName);

$userDomain = new SessionDomain();
$userDomain->GetUserById($user['iduser']);
