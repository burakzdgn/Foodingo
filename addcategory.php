<?php
require('connection.php');
include('adminpanelheader.php');
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}
else{
    session_destroy();
}
if (!isset($_SESSION['admins'])) {
    die("<script> window.location.href = 'adminpanellogin.php'; </script>");
}



if (isset($_POST["categoryName"])) {
    $categoryName = $_POST['categoryName'];
    $restaurant = mysqli_query($conn, "INSERT INTO foodcategories (`category`) VALUES ('$categoryName')");
    header("location:adminpanel.php");
}



?>

<section class="page-section" id="addcategory">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Add Category</h2>
        <div class="row mt-lg-5">
            <div class="col-lg-8 mx-auto">
                <form method="POST">
                    <div class="control-group">
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="categoryName" type="text" placeholder="Category Name"
                                required="required" />
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-danger" type="submit">Add Category</button></div>
                </form>
            </div>
        </div>
    </div>
</section>