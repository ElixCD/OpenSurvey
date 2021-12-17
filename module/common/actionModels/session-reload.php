<?php
require '../../../vendor/autoload.php';
use Domain\SessionDomain;

$sessionName = $_POST['name'];

$user = OurVoice\SessionStatus::GetSessionData($sessionName);

$userDomain = new SessionDomain();
$userDomain->GetUserById($user['iduser']);
