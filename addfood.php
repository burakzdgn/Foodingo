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
if (isset($_POST["foodName"])) {
    $target_dir = "assets/img/foods/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $catId = $_POST['foodCategory'];
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $ingredients = $_POST['ingredients'];

    if (isset($_POST["foodName"])) {
        $restaurant = mysqli_query($conn, "INSERT INTO foods (`categoryid`, `name`, `price`, `ingredients`, `photo`) VALUES ($catId,  '$foodName', $price, '$ingredients', '$target_file')");
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        header("location:adminpanel.php");
    }

}

?>

<section class="page-section" id="addfood">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Add Food</h2>
        <div class="row mt-lg-5">
            <div class="col-lg-8 mx-auto">
                <form method="POST" enctype="multipart/form-data">
                    <div class="control-group">
                        
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="foodName" type="text" placeholder="Food Name"
                                required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="price" type="number" placeholder="69₺"
                                required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="ingredients" type="text" placeholder="Food Ingredients"
                                value=" "/>
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <!--Food Category-->
                            <select class="form-control" id="foodCategory" name="foodCategory">
                                <?php
                                    $sqlCategory = "SELECT * FROM foodcategories";
                                    $resultCategory = $conn->query($sqlCategory);
                                    if ($resultCategory->num_rows > 0) {
                                        while ($rowCategory = $resultCategory->fetch_assoc()) {

                                            ?>
                                            <option name="foodcat" value="<?php echo $rowCategory["id"] ?>"> <?php echo $rowCategory["category"]; ?> </option>
                                    <?php }
                                        }
                                      ?>
                            </select>
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="fileToUpload" type="file" id="fileToUpload"
                                placeholder="Photo" required="required" />
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-danger" type="submit">Add Food</button></div>
                </form>
            </div>
        </div>
    </div>
</section>