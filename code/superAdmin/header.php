<?php

require_once "../helpers/header.php";

$configFile = __DIR__ . '/../config.php'; if (!file_exists($configFile)) {
    die('config.php does not exist');
}
require_once $configFile;

if(!isset($_SESSION["priv"]) || $_SESSION["priv"] != 2){
    header( "Location: " . $baseAddress . "/teacher/logIn.php" );
}


?>
<hr>
-----LEVEL 2 header -----

<a href="./">ALL TEACHER</a>
<a href="./create.php">NEW TEACHER</a>

<hr>