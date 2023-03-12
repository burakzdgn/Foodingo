<?php
require('connection.php');
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
                <a href="index.php" class="text-decoration-none text-white">
                    <h3>FoodinGO</h3>
                </a>
            </div>

        </div>
        <ul class="nav-menu">
        </ul>
    </nav>
    <section class="page-section" id="adminpanelogin">
        <div class="container mt-lg-5">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Admin Login</h2>
            <div class="row mt-lg-5">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="username" type="text" placeholder="Username"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="password" type="password" placeholder="Password"
                                    required="required" />
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Login</button>
                            <a class="btn btn-danger text-white" href="adminpanelsignup.php" type="submit">Register</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) {
                        $admin = mysqli_query($conn, "SELECT `username`,`password` FROM `admin` WHERE `username` = '" . $_POST["username"] . "' AND `password` = '" . $_POST["password"] . "'");
                        if (mysqli_num_rows($admin)) {
                            session_start();
                            $_SESSION['admins'] = true;
                            header("location:adminpanel.php");
                            exit();
                        } else {
                            echo 'Admin not found!';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>