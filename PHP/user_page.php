<?php
session_start();
$email = $_SESSION["email"];
if(!isset($email)) header("Location: error.php");
if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
$sql_writer = $con->prepare("SELECT user_phone FROM user_table WHERE user_table.user_id = (SELECT user_id FROM user_table WHERE user_email = '$email')");
$sql_writer->bind_result($phone);
$sql_writer->execute();
$sql_writer->fetch();
$sql_writer->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Home</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top py-3" style="background: #adb5bd;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="../index.php"><img src="../assets/img/logo.png" style="width: 40px;height: 60px;margin-right: 2%;"><span>XYZ Food Orders</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="menu.php" style="color: var(--bs-black);">Order a delivery</a></li>
                </ul><form action="" method="post"><button class="btn btn-primary ms-md-2" name="logout">Log Out</button></form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 style="margin-top: 2%;color: var(--bs-blue);margin-bottom: 3%;">Hello, <?=$email?></h1>
    </div>
    <div class="container mt-lg-4">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;" >Account Details:&nbsp;</h2>
        <p>Email: <?=$email?></p>
        <p>Phone Number: <?=$phone?></p>

    </div>
    <div class="container" >
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;" >Account Settings:&nbsp;</h2>
        <form action="" method="post">
            <label class="form-label">Settings to be changed:</label><select class="form-select"
                                                                               style="margin-bottom: 3%;max-width: 400px;"
                                                                               name="change_setting">
                <option value="number" selected="">Phone Number</option>
                <option value="password">Password</option>
            </select><label class="form-label">Enter new value here:</label><input class="form-control" type="text"
                                                                                   style="max-width: 500px;" name="new_value">
            <button class="btn btn-primary" type="submit" style="margin-top: 3%;">Submit changes</button>
        </form>
    </div>
    <?php
    $change_setting = $_POST["change_setting"] ?? null;
    if (isset($change_setting)) {
        if ($change_setting=="number")
        {
            $new_value = $_POST["new_value"];
            $sql_writer = $con->prepare("UPDATE user_table SET user_phone = '$new_value' WHERE user_table.user_id = (SELECT user_id FROM user_table WHERE user_email = '$email')");
            $sql_writer->execute();
            $sql_writer->close();
        }
        elseif ($change_setting=="password")
        {
            $new_value = $_POST["new_value"];
            $sql_writer = $con->prepare("UPDATE user_table SET user_password = '$new_value' WHERE user_table.user_id = (SELECT user_id FROM user_table WHERE user_email = '$email')");
            $sql_writer->execute();
            $sql_writer->close();
        }
    }
    ?>

    <div class="container" style="margin-bottom: 5%;" id="orders">
        <h2 style="text-align: center;margin-top: 5%;">Your Past Orders:</h2>
        <div class="table-responsive" style="margin-top: 5%;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Date Ordered</th>
                        <th>Amount Ordered</th>
                        <th>Sum Total</th>
                        <th>Delivery Location</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql_writer = $con->prepare("SELECT order_id, order_date, order_amount, order_total, order_address FROM order_table WHERE user_id = (SELECT user_id FROM user_table WHERE user_email = '$email') ORDER BY order_date DESC");
                $sql_writer->bind_result($order_id, $order_date, $order_amount, $order_total, $order_address);
                $sql_writer->execute();
                $sql_writer->store_result();
                for ($i = 0; $i < $sql_writer->num_rows; $i++) {
                    $sql_writer->fetch();
                    echo ("
                    <tr>
                        <td>$order_id</td>
                        <td>$order_date</td>
                        <td>$order_amount</td>
                        <td>$order_total</td>
                        <td>$order_address</td>
                    </tr>
                    ");
                }
                $sql_writer->free_result();
                $sql_writer->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "../reusable_html/footer_gray.html" ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>