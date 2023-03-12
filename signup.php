<?php
require('connection.php');
include('header.php');

if (isset($_POST["name"])) {
    $userAdd = mysqli_query($conn, "INSERT INTO user (`name`, `surname`,`email`,`password`,`phone`,`address`) VALUES ('" . $_POST['name'] . "','" . $_POST['surname'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "') ");
    
    echo "<script>alert('Signed-up succesfully.');window.location.href='login.php';</script>";
}


?>

<section class="page-section" id="signup">
    <div class="container mt-lg-5" >
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Registration</h2>
        <div class="row mt-lg-5">
            <div class="col-lg-8 mx-auto">
                <form method="POST">
                    <div class="control-group">
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="name" type="text" placeholder="Name" required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="surname" type="text" placeholder="Surname" required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="email" type="email" placeholder="example@example.com" required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="password" type="password" placeholder="Password" required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="phone" type="tel" placeholder="5551112233" required="required" />
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                        <div class="form-group controls mb-3 pb-2 mt-4">
                            <input class="form-control" name="address" type="text" placeholder="Address information." required="required" />
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