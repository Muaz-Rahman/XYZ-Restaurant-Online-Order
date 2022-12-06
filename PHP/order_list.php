<?php
session_start();
$email = $_SESSION["admin_email"];
if(!isset($email)) header("Location: error.php");

if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}

$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Order Listings</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">

</head>

<body>
<nav class="navbar navbar-light sticky-top navbar-expand-md py-3" style="background: #b087f4;">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="../index.php">
            <span><img src="../assets/img/logo.png" style="width: 40px;height: 60px;margin-right: 2%;"></span>
            <span>XYZ Orders Admin Panel</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="navbar-nav ms-auto"></ul>
            <form action="" method="post">
                <button class="btn btn-primary ms-md-2" name="logout">Log Out</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h1 style="text-align: center;margin-top: 3%;">Orders Listing Page</h1>
    <button class="btn btn-primary mt-lg-4 mb-lg-2" onclick="location.reload()">Refresh Order List</button>
</div>

<div class="container" style="margin-top: 4%;">
    <h5 style="text-align: left;margin-bottom: 3%;">Note: The orders are sorted by date, from the latest to the
        oldest.</h5>
    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center;">Order Id</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Bill</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_writer = $con->prepare("SELECT order_table.order_id, order_table.order_total, order_table.order_address, order_table.order_amount, user_table.user_email, user_table.user_phone, menu_table.item_name FROM order_table INNER JOIN user_table ON order_table.user_id = user_table.user_id INNER JOIN menu_table ON order_table.food_id = menu_table.item_id WHERE order_status=0 ORDER BY order_date DESC");
                if (!$sql_writer) echo "failed";
                $sql_writer->execute();
                $sql_writer->store_result();
                $sql_writer->bind_result($order_id, $bill, $address, $quantity, $email, $phone, $food_name);

                for ($i = 0; $i < $sql_writer->num_rows; $i++) {
                    $sql_writer->fetch();
                    echo "
                <tr>
                    <td style='text-align: center;'>$order_id</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$food_name: $quantity</td>
                    <td>$address</td>
                    <td>$bill BDT</td>
                    <td><input type='checkbox' name='arr[]' value=$order_id></td>
                    <tr>";
                }
                $sql_writer->free_result();
                $sql_writer->close();

                $arr = $_POST["arr"] ?? null;

                if (isset($arr)) {
                    foreach ($arr as $value) {
                        $sql_writer = $con->prepare("UPDATE order_table SET order_status = '1' WHERE order_table.order_id = '$value'");
                        if (!$sql_writer) echo "failed";
                        $sql_writer->execute();
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <button class="btn btn-primary mt-lg-2" type="submit">Update Order Status</button>
    </form>
</div>

    <div class="container" style="margin-top: 4%;">
        <h5 style="text-align: left;margin-bottom: 3%;">List of completed orders:</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Order Id</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Quantity</th>
                        <th>Bill</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql_writer = $con->prepare("SELECT order_table.order_id, order_table.order_total, order_table.order_address, order_table.order_amount, user_table.user_email, user_table.user_phone, menu_table.item_name FROM order_table INNER JOIN user_table ON order_table.user_id = user_table.user_id INNER JOIN menu_table ON order_table.food_id = menu_table.item_id WHERE order_status=1 ORDER BY order_date DESC");
                $sql_writer->execute();
                $sql_writer->store_result();
                $sql_writer->bind_result($order_id, $bill, $address, $quantity, $email, $phone, $food_name);
                for ($i=0; $i<$sql_writer->num_rows;$i++) {
                    $sql_writer->fetch();
                    echo "
                <tr>
                    <td style='text-align: center;'>$order_id</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$food_name: $quantity</td>
                    <td>$bill BDT</td>
                    <td>$address</td>
                </tr>
                ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container" style="margin-top: 5%;margin-bottom: 5%;">
        <h3 class="text-center"><a href="admin_page.php">Go back to admin home page</a>&nbsp;</h3>
    </div>

<?php include "../reusable_html/footer_gray.html" ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>