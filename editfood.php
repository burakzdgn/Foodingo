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
if (isset($_GET['id'])) {

    $sql = $conn->query("SELECT * FROM foods WHERE id = '" . $_GET["id"] . "'");
    $foods = mysqli_fetch_assoc($sql);
    if (isset($_POST["foodName"])) {
        $catId = $foods["categoryid"];
        if(isset($_POST["foodCategory"])){
            $catId = $_POST['foodCategory'];
        }
        $foodName = $_POST['foodName'];
        $price = $_POST['price'];
        $ingredients = $_POST['ingredients'];

        if (isset($_POST["foodName"])) {
            $update = mysqli_query($conn, "UPDATE foods SET categoryid = $catId, name = '$foodName', price = $price, ingredients='$ingredients' WHERE id = '" . $_GET["id"] . "'");
            header("location:adminpanel.php");
        }
    }
}
?>
<section class="page-section" id="addfood">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Edit Food</h2>
        <div class="row mt-lg-5">
            <div class="col-lg-8 mx-auto">
                <form method="POST" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="foodName" type="text" placeholder="Food Name"
                                required="required" value="<?php echo $foods["name"]; ?>" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="price" type="number" placeholder="69₺" required="required"
                                value="<?php echo $foods["price"]; ?>" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="ingredients" type="text" placeholder="Food Ingredients"
                                required="required" value="<?php echo $foods["ingredients"]; ?>" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <!--Food Category-->
                            <select class="form-control" id="foodCategory" name="foodCategory">
                                <option disabled selected value="<?php echo $foods["categoryid"]; ?>">
                                    <?php
                                    $sqlCategorySelected = "SELECT * FROM foodcategories where id = '" . $foods["categoryid"] . "'";
                                    $resultCategorySelected = $conn->query($sqlCategorySelected);
                                    $selectedCategory = $resultCategorySelected->fetch_assoc();
                                    echo $selectedCategory["category"];
                                    ?></option>
                                <?php
                                $sqlCategory = "SELECT * FROM foodcategories";
                                $resultCategory = $conn->query($sqlCategory);
                                if ($resultCategory->num_rows > 0) {
                                    while ($rowCategory = $resultCategory->fetch_assoc()) {?>
                                <option name="foodcat" value="<?php echo $rowCategory["id"] ?>"> <?php echo $rowCategory["category"]; ?> </option><?php }}?></select>
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-danger" type="submit">Edit Food</button></div>
                </form>
            </div>
        </div>
    </div>
</section>