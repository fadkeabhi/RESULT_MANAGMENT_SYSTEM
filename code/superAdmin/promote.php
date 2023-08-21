<?php
require_once "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //Handle get request
    if (!isset($_GET["regNo"])){
        header("Location: ./");
    }
    ?>
    <form method="POST">
        Do you want to promote teacher with REG NO <?php echo $_GET["regNo"];?> to admin.
        <input name="regNo" hidden="hidden" value="<?php echo $_GET["regNo"];?>">
        <input type="submit">
        <input type="button" value="cancel">
    </form>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST["regNo"])){
        header("Location: ./");
    }
    $regNo = $_GET["regNo"];
    $sql = "UPDATE teacher SET isAdmin = 1 WHERE regNo = $regNo;";
    $result = $conn->query($sql);
    header("Location: ./");
}