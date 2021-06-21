<?php

use OurVoice\Config;

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

$GLOBALS['Config'] = new Config();
