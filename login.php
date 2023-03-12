<?php
require('connection.php');
include('header.php');
if (!isset($_SESSION)) {
    ob_start();
    session_start();
} else {
    session_destroy();
}
if (isset($_SESSION['customer'])) {
    die("<script> alert('You are already logged in!.');window.location.href = 'index.php'; </script>");
}
?>
<section class="page-section" id="ogin">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Login</h2>
        <div class="row mt-lg-5">
            <div class="col-lg-8 mx-auto">
                <form method="POST">
                    <div class="control-group">
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="email" type="text" placeholder="example@example.com"
                                required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="password" type="password" placeholder="Password"
                                required="required" />
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Login</button>
                        <a class="btn btn-danger text-white" href="signup.php" type="submit">Register</a>
                    </div>
                </form>
                <?php
                    if (isset($_POST['email']) && isset($_POST['password'])) {
                        $user = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '" . $_POST["email"] . "' AND `password` = '" . $_POST["password"] . "'");
                        if (mysqli_num_rows($user)) {
                            $userInfo = $user->fetch_assoc();
                            $_SESSION['customer'] = true;
                            $_SESSION['customer_id'] = $userInfo['id'];
                            header("location:index.php");
                            exit();
                        } else {
                            echo 'User not found!';
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</section>