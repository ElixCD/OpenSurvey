<?php

use OurVoice\Config;

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

// $Config = new Config();

$GLOBALS['Config'] = new Config();

// $GLOBALS['Config'] = new Config();

// echo "hola";
