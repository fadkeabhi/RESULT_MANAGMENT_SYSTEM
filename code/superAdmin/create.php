<?php
require_once "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //Handle get request
    ?>
        Create teacher
        <form method="POST">
        regNo<input name="regNo" type="number">
        firstName<input name="firstName" type="text">
        lastName<input name="lastName" type="text">
        email<input name="email" type="email">
        phone<input name="phone" type="number">
        isAdmin<input name="isAdmin" type="checkbox" value=1>
            <input type="submit">
            <input type="button" value="cancel">
        </form>
        <?php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST["regNo"]) || $_POST["regNo"] == "" || !ctype_digit($_POST["regNo"])) {
        header("Location: ./create.php?error=invalidRegNo");
        exit();
    }
    if (!isset($_POST["firstName"]) || !ctype_alnum(str_replace(' ', '', $_POST["firstName"]))) {
        header("Location: ./create.php?error=invalidFirstName");
        exit();
    }
    if (!isset($_POST["lastName"]) || !ctype_alnum(str_replace(' ', '', $_POST["lastName"]))) {
        header("Location: ./create.php?error=invalidLastName");
        exit();
    }
    if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        header("Location: ./create.php?error=invalidEmail");
        exit();
    }
    if (!isset($_POST["phone"]) || $_POST["phone"] == "" || !ctype_digit($_POST["phone"])) {
        header("Location: ./create.php?error=invalidPhone");
        exit();
    }


    $isAdmin = 0;
    if (isset($_POST["isAdmin"]) && $_POST["isAdmin"] == 1) {
        $isAdmin = 1;
    }

    $regNo = $_POST["regNo"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $password = md5(md5($defaultPassword));
    $email = $_POST["email"];
    $phone = $_POST["phone"];


    //check if regNo , email already exists





    //insert record
    $sql = "INSERT INTO teacher
    VALUES ('$regNo','$firstName','$lastName','$password','$email',$phone,$isAdmin)";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
        header("Location: ./create.php?error=userCreated");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}