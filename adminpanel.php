<?php
require('connection.php');
include('adminpanelheader.php');
if (!isset($_SESSION)) {
    ob_start();
    session_start();
} else {
    session_destroy();
}
if (!isset($_SESSION['admins'])) {
    die("<script> window.location.href = 'adminpanellogin.php'; </script>");
}
?>

<section class="page-section" id="Categories">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Categories</h2>
        <div class="container d-flex justify-content-end gap-2">
            <a href="addcategory.php" class="btn btn-warning mr-2" id="addcategory" role="button" aria-disabled="true">Add Category</a>
        </div>
        <div class="row mt-lg-3">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Category Id</td>
                    <td>Category Name</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $sqlCategory = "SELECT * FROM  foodcategories";
                $resultCategory = $conn->query($sqlCategory);
                if ($resultCategory->num_rows > 0) {
                    while ($rowCategory = $resultCategory->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $rowCategory["id"]; ?></td>
                            <td>
                                <?php echo $rowCategory["category"]; ?>
                            </td>
                            <td><a class="btn btn-success text-white" href="editcategory.php?id=<?php echo $rowCategory['id'] ?>" type="submit">Update</a>
                            </td>
                            <td><a class="btn btn-danger text-white" href="deletecategory.php?id=<?php echo $rowCategory['id'] ?>" type="submit">Delete</a>
                            </td>
                        </tr>
                        <?php }}?>
            </table>
        </div>
    </div>
</section>

<section class="page-section" id="Foods">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Foods</h2>
        <div class="container d-flex justify-content-end gap-2">
            <a href="addfood.php" class="btn btn-warning mr-2" id="addfood" role="button" aria-disabled="true">Add Food</a>
        </div>
        <div class="row mt-lg-3">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Food Category</td>
                    <td>Food Name</td>
                    <td>Price</td>
                    <td>Ingredients</td>
                    <td>Photo</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $sqlFood = "SELECT * FROM  foods";
                $resultFood = $conn->query($sqlFood);
                if ($resultFood->num_rows > 0) {
                    while ($rowFood = $resultFood->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php
                                //Food Category
                                $categoryName = "SELECT * FROM foodcategories where id='" . $rowFood["categoryid"] . "'";
                                $resultCategory = $conn->query($categoryName);
                                $name = $resultCategory->fetch_assoc();
                                echo $name["category"];
                                ?>
                            </td>
                            <td><?php echo $rowFood["name"]; ?></td>
                            <td><?php echo $rowFood["price"]; ?></td>
                            <td><?php echo $rowFood["ingredients"]; ?></td>
                            <td><?php echo $rowFood["photo"]; ?></td>
                            <td><a class="btn btn-success text-white" href="editfood.php?id=<?php echo $rowFood['id'] ?>"type="submit">Update</a></td>
                            <td><a class="btn btn-danger text-white" href="deletefood.php?id=<?php echo $rowFood['id'] ?>" type="submit">Delete</a></td>
                        </tr>
                        <?php }}?>
            </table>
        </div>
    </div>
</section>

<section class="page-section" id="Orders">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Orders</h2>
        <div class="row mt-lg-3">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Customer Name</td>
                    <td>Food Name</td>
                    <td>Price</td>
                    <td>Order Date</td>
                    <td></td>
                </tr>
                <?php
                $sqlOrder = "SELECT * FROM  orders";
                $resultOrder = $conn->query($sqlOrder);
                if ($resultOrder->num_rows > 0) {
                    while ($rowOrder = $resultOrder->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php
                                //User Info
                                $user = "SELECT * FROM user where id='" . $rowOrder["userid"] . "'";
                                $resultUser = $conn->query($user);
                                $username = $resultUser->fetch_assoc();
                                echo $username["name"] . ' ' . $username["surname"];
                                ?>
                            </td>
                            <td>
                                <?php
                                //Restaurant Name
                                $restaurantName = "SELECT * FROM foods where id='" . $rowOrder["foodid"] . "'";
                                $resultCategory = $conn->query($restaurantName);
                                $resName = $resultCategory->fetch_assoc();
                                echo $resName["name"];
                                ?>
                            </td>
                            <td><?php
                            //Price
                            $price = "SELECT * FROM foods where id='" . $rowOrder["foodid"] . "'";
                            $resultPrice = $conn->query($price);
                            $price = $resultPrice->fetch_assoc();
                            echo $price["price"];
                            ?></td>
                            <td><?php echo $rowOrder["orderdate"]; ?></td>
                            <td><a class="btn btn-danger text-white" href="cancelorder.php?id=<?php echo $rowFood['id'] ?>" type="submit">Cancel Order</a></td>
                        </tr>
                        <?php }}?>
            </table>
        </div>
    </div>
</section>


<section class="page-section" id="Customers">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Customers</h2>
        <div class="row mt-lg-3">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Name Surname</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td></td>
                </tr>
                <?php
                $sqlUser = "SELECT * FROM  user";
                $resultUser = $conn->query($sqlUser);
                if ($resultUser->num_rows > 0) {
                    while ($rowUser = $resultUser->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $rowUser["name"] . ' ' . $rowUser["surname"]; ?></td>
                            <td>
                                <?php echo $rowUser["email"]; ?>
                            </td>
                            <td><?php echo $rowUser["phone"]; ?></td>
                            <td>
                                <?php echo $rowUser["address"]; ?>
                            </td>
                            <td><a class="btn btn-danger text-white" href="deletecustomer.php?id=<?php echo $rowUser['id'] ?>"
                                    type="submit">Delete</a></td>
                        </tr>
                        <?php }
                }
                ?>
            </table>
        </div>
    </div>
</section>