<?php 
    session_start();
    unset($_SESSION["customer"]);
    unset($_SESSION["admins"]);
    session_destroy();
    header('Location: index.php');
    exit;
?>