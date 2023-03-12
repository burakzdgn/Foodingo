<?php 
require('connection.php');
if(isset($_GET['id'])){
    $user = mysqli_query($conn, "SELECT * FROM user WHERE id = '" . $_GET["id"] . "'");
    if (!mysqli_num_rows($user)) {
        header("location:adminpanel.php");
        exit();
    }
    else{
        $deleteUser = mysqli_query($conn, "DELETE FROM user WHERE id = '" . $_GET["id"] . "'");
        header("location:adminpanel.php");
    }
}
else{
    header("location:adminpanel.php");
    exit();
}

?>