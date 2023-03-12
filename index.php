<?php
require('connection.php');
include('header.php');
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}

?>

<section class="page-section" id="index">
    <div class="container mt-lg-5">
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="row">
                <?php
                if (!isset($_GET['search'])) {
                    $foodSql = "SELECT * FROM foods";
                } else {
                    $foodSql = "SELECT * FROM foods WHERE `name` LIKE '%" . $_GET['search'] . "%'";
                }
                $food = $conn->query($foodSql);
                $foodInf = $food;
                if (isset($_POST['foodId'])) {
                    $foodId = $_POST['foodId'];
                    $foodSql2 = "SELECT * FROM foods WHERE id = $foodId";
                    $foodInf = $conn->query($foodSql2);
                    $cusId = $_SESSION['customer'];
                    $insertFood = mysqli_query($conn, "INSERT INTO orders (`userid`, `foodid`, `orderdate`) VALUES ($cusId, $foodId, NOW())");
                    $foodInfo = $foodInf->fetch_assoc();
                    echo '<script>alert("Your order '.$foodInfo['name'].' has been taken successfully!");</script>';
                }
                if ($food->num_rows > 0):
                    while ($row = $food->fetch_assoc()) {?>  
                <div class="col-4">
                    <div class="card gallery mt-4">
                        <img src="/Foodingo/<?php echo $row["photo"] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"] ?></h5>
                            <h6 class="card-title">Ingredients: <?php echo $row["ingredients"] ?> </h6>
                                <h6 class="card-title"><b><?php echo $row["price"] ?>₺</b></h6>
                            <?php if (isset($_SESSION['customer'])): ?>
                            <form action="" method="POST">
                                <input type="hidden" name="foodId" value="<?php echo $row["id"] ?>">
                                <button class="btnn">Buy</button>
                            </form><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php } ?><?php endif; ?>
            </div>
        </div>
    </div>
</section>