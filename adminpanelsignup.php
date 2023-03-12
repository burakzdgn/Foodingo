<?php
require('connection.php');

if (isset($_POST["adminusername"])) {
    $admin = mysqli_query($conn, "INSERT INTO admin (`username`, `password`) VALUES ('" . $_POST['adminusername'] . "','" . $_POST['adminpassword'] . "') ");
    echo "<script>alert('Admin signed-up succesfully. Admin id: " . mysqli_insert_id($conn) . "');window.location.href='adminpanellogin.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Foodingo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="logo-container">
            <div class="row">
                <a href="index.php"><img class="logo-image" src="assets/img/hamburger.png" alt="logo"></a>
            </div>
            <div class="row">
                <a href="index.php" class="text-decoration-none text-white"><h3>FoodinGO</h3></a>
            </div>
        </div>
        <ul class="nav-menu">
        </ul>
    </nav>
    <section class="page-section" id="adminpanelsignup">
        <div class="container mt-lg-5" id="adminpanelgiris">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Admin Sign-up</h2>
            <div class="row mt-lg-5">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="adminusername" type="text" placeholder="Username"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="adminpassword" type="password" placeholder="Password"
                                    required="required" />
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-danger" type="submit">Sign-up</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small class="text-dark">Copyright © Burak Çetin 2022</small></div>
    </div>