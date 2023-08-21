<?php

session_start();

$configFile = __DIR__ . '/../db.php'; if (!file_exists($configFile)) {
    die('config.php does not exist');
}
require_once $configFile;


//show goto admin button
if($_SESSION["priv"] > 0){
    ?>

    <a href="../admin/">ADMIN</a>

    <?php
}

if($_SESSION["priv"] > 1){
    ?>

    <a href="../superAdmin/">SUPER ADMIN</a>

    <?php
}





?>

<a href="../teacher/">TEACHER</a>
<a href="./../teacher/logOut.php">Logout</a>

----Header end----