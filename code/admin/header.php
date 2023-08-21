<?php

require_once "../helpers/header.php";

$configFile = __DIR__ . '/../config.php'; if (!file_exists($configFile)) {
    die('config.php does not exist');
}
require_once $configFile;

if(!isset($_SESSION["priv"]) || !($_SESSION["priv"] > 0)){
    header( "Location: " . $baseAddress . "/teacher/logIn.php" );
}


?>