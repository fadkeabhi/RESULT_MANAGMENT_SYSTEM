<?php
require_once "header.php";

//show all teachers
$sql = "SELECT regNo,firstName,lastName,email,phone,isAdmin FROM teacher";
// echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["regNo"] . "</td><td>" .
        $row["firstName"] . "</td><td>" . 
        $row["lastName"] . "</td><td>" . 
        $row["email"] . "</td><td>" . 
        $row["phone"] . "</td><td>";
        if($row["isAdmin"] == 0){
            //promote to admin button
            echo "<a href='./promote.php?regNo=" . $row["regNo"] . "'>promote</a>";
        }
        if($row["isAdmin"] == 1){
            //promote to admin button
            echo "<a href='./demote.php?regNo=" . $row["regNo"] . "'>demote</a>";
        }
    }
    echo "</table>";
    
    
} else {
    
}