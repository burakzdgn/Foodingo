<?php 
require('connection.php');
if(isset($_GET['id'])){
    $category = mysqli_query($conn, "SELECT * FROM foodcategories WHERE id = '" . $_GET["id"] . "'");
    if (!mysqli_num_rows($category)) {
        header("location:adminpanel.php");
        exit();
    }
    else{
        $deleteCategory = mysqli_query($conn, "DELETE FROM foodcategories WHERE id = '" . $_GET["id"] . "'");
        header("location:adminpanel.php");
    }
}
else{
    header("location:adminpanel.php");
    exit();
}
?>