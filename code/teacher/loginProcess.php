<?php

session_start();

$configFile = __DIR__ . '/../db.php';
if (!file_exists($configFile)) {
    die('db.php does not exist');
}
require_once $configFile;

if (isset($_SESSION["priv"]) && $_SESSION["priv"] == 0) {
    header("Location: " . $baseAddress . "/teacher");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

    //validate email
    if (!isset($_POST["email"]) || (isset($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
        //email not valid
        header("Location: " . $baseAddress . "/teacher/logIn.php?error=invalidEmail");
    }

    if (!isset($_POST["pass"])) {
        //email not valid
        header("Location: " . $baseAddress . "/teacher/logIn.php?error=emptyPassword");
    }

   

    //check for user in database
    $email = $_POST["email"];
    $pass = md5(md5($_POST["pass"]));

    $sql = "SELECT * FROM teacher WHERE email='$email' AND password='$pass'";
    // echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION["regNo"] = $row["regNo"];
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["lastName"] = $row["lastName"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["phone"] = $row["phone"];
            $_SESSION["priv"] = $row["isAdmin"];
        }
        //redirect to index
        header("Location: " . $baseAddress . "/teacher");
        
    } else {
        //user not found
        header("Location: " . $baseAddress . "/teacher/logIn.php?error=invalidCred");
    }
    $conn->close();


}