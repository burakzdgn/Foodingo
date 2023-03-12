<?php 
require('connection.php');

if(isset($_GET['id'])){
    $order = mysqli_query($conn, "SELECT * FROM order WHERE id = '" . $_GET["id"] . "'");
    if (!mysqli_num_rows($order)) {
        header("location:adminpanel.php");
        exit();
    }
    else{
        $deleteOrder = mysqli_query($conn, "DELETE FROM order WHERE id = '" . $_GET["id"] . "'");
        header("location:adminpanel.php");
    }
}
else{
    header("location:adminpanel.php");
    exit();
}
?>