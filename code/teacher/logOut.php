<?php

session_start();

session_destroy();

$configFile = __DIR__ . '/../config.php'; if (!file_exists($configFile)) {
    die('config.php does not exist');
}
require_once $configFile;

header( "Location: " . $baseAddress . "/teacher/login.php" );