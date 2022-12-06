<?php
session_start();
$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
$choice = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Today's Menu</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>

<?php
$sql_writer = $con->prepare("SELECT * FROM menu_table WHERE item_available=1");
if (!$sql_writer) echo "failed";
$sql_writer->execute();
$item_id = $item_name = $item_pic = $item_description = $item_price = $item_available = "";
$sql_writer->bind_result($item_id,$item_name, $item_pic, $item_description, $item_price, $item_available);
$sql_writer->store_result();
?>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top py-3" id="mainNav" style="background: var(--bs-gray-500);position: sticky;">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="../index.php"><span style="margin-right: 5%"><img src="../assets/img/logo.png" width="40px" height="60px"></span><span>XYZ Food Orders</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="feedback_form.php" style="color: var(--bs-navbar-active-color);">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="border rounded border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: linear-gradient(rgba(0,123,255,0.2), rgba(0,123,255,0.2)), url(../assets/img/menu_header.webp) center / cover;height: 500px;">
                <div class="row">
                    <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h1 class="text-uppercase fw-bold mb-3" style="color: var(--bs-white);">Guaranteed satisfaction</h1>
                            <p class="mb-4" style="color: var(--bs-white);font-weight: bold;">Good ingredients, good chefs, good foods- what can go wrong? Nothing, that's what!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h1 class="text-center" style="margin-bottom: 5%;">Ready for Ordering!</h1>

    <form action="checkout.php" method="post">
        <div class="container" style="margin-bottom: 35px;margin-top: 11px;">

            <?php
            for ($i = 0; $i < $sql_writer->num_rows; $i++) {
                $sql_writer->fetch();
                echo(
                " <div class= 'row mb-lg-5'>
                <div class='col' style='margin-top: 5px;'><img class='img-fluid rounded-1' width='300' height='300' style='margin-bottom: 30px;' src=  $item_pic  ></div>
                <div class='col'>
                    <h1> $item_name</h1>
                    <p> $item_description </p>
                    <p><b>BDT $item_price </b></p>
                    <input type='checkbox' name='arr[]' value=$item_id style='width: 50px;height: 50px;'>
                </div>
            </div>"
                );

            }

            $con->close();
            $sql_writer->free_result();
            $sql_writer->close();

            ?>
        </div>

        <div class="container" style="margin-bottom: 35px;margin-top: 11px;">
            <div class="row text-center">
                <div class="col"><button class="btn btn-primary" type="submit" name="checkout" style="background: var(--bs-green);">Proceed To Checkout!</button></div>
            </div>
        </div>
    </form>

    <?php include "../reusable_html/footer_dark.html" ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>