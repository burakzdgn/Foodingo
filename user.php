<?php
require('connection.php');
include('header.php');
if (!isset($_SESSION)) {
    ob_start();
    session_start();
} else {
    session_destroy();
}
if (!isset($_SESSION['customer'])) {
    die("<script> window.location.href = 'login.php'; </script>");
}
if (isset($_SESSION['customer_id'])) {
    $id = $_SESSION['customer_id'];
}
?>

<section class="page-section" id="Orders">
    <div class="container mt-lg-5">
        <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Orders</h2>
        <div class="row mt-lg-3">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Food Name</td>
                    <td>Price</td>
                    <td>Order Date</td>
                    <td></td>
                </tr>
                <?php
                $sqlOrder = "SELECT * FROM  orders where userid = $id";
                $resultOrder = $conn->query($sqlOrder);
                if ($resultOrder->num_rows > 0) {
                    while ($rowOrder = $resultOrder->fetch_assoc()) { ?>
                <tr>
                    <td><?php
                        //Food Name
                        $foodName = "SELECT * FROM foods where id='" . $rowOrder["foodid"] . "'";
                        $resultFood = $conn->query($foodName);
                        $resName = $resultFood->fetch_assoc();
                        echo $resName["name"];
                    ?>
                    </td>
                    <td><?php
                        //Price
                        $price = "SELECT * FROM foods where id='" . $rowOrder["foodid"] . "'";
                        $resultPrice = $conn->query($price);
                        $price = $resultPrice->fetch_assoc();
                        echo $price["price"];
                    ?>
                    </td>
                    <td><?php echo $rowOrder["orderdate"]; ?></td>
                    <td><a class="btn btn-danger text-white" href="cancelorder.php?id=<?php echo $rowFood['id'] ?>" type="submit">Cancel Order</a></td>
                </tr>
                <?php }}?>
            </table>
        </div>
    </div>
</section>