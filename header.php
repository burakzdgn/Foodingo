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
        <form class="d-flex" action="" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search"
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
            <button class="button my-btn" type="submit">Search</button>
        </form>
        <ul class="nav-menu">
            <li class="menu-item">
                <a href="user.php" rel="noopener noreferrer"><img src="assets/img/login.png" alt=""></a>
            </li>
            <li class="menu-item">
                <a href="exit.php" rel="noopener noreferrer"><img src="assets/img/logout.png" alt=""></a>
            </li>
        </ul>
    </nav>
</body>
</html>