<?php 
require('connection.php');
if(isset($_GET['id'])){
    $food = mysqli_query($conn, "SELECT * FROM food WHERE id = '" . $_GET["id"] . "'");
    if (!mysqli_num_rows($food)) {
        header("location:adminpanel.php");
        exit();
    }
    else{
        $deleteFood = mysqli_query($conn, "DELETE FROM food WHERE id = '" . $_GET["id"] . "'");
        header("location:adminpanel.php");
    }
}
else{
    header("location:adminpanel.php");
    exit();
}

?>