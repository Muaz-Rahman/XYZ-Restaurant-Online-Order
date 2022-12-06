<?php
session_start();
$email = $_SESSION["admin_email"];
if(!isset($email)) header("Location: error.php");
if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin View</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>

<body style="background: linear-gradient(90deg, var(--bs-gray-200) 2%, var(--bs-gray-400) 38%, var(--bs-teal) 98%);">
    <nav class="navbar navbar-light navbar-expand-md py-3" style="background: #b087f4;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="../index.php"><img src="../assets/img/logo.png" style="width: 40px;height: 60px;margin-right: 2%;"><span>XYZ Orders Admin Panel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="order_list.php" style="color: var(--bs-black);">Order Listing</a></li>
                </ul>
                <form action="" method="post">
                    <button class="btn btn-primary ms-md-2" name="logout">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 style="margin-top: 2%;color: var(--bs-blue);margin-bottom: 3%;">Hello, <?=$email?> </h1>
    </div>

    <div class="container">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Update the active menu</h2>

        <?php
        $con = new mysqli("localhost","root","","xyz_order_db");
        if($con->connect_error) die("Connection to database has failed");
        $sql_writer = $con->prepare("SELECT item_name,item_id FROM menu_table");
        if (!$sql_writer) echo "failed";
        $sql_writer->execute();
        $sql_writer->bind_result($item_name, $item_id);
        $sql_writer->store_result();
        ?>

        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <?php
                    for ($i = 0; $i < $sql_writer->num_rows; $i++) {
                        $sql_writer->fetch();
                        echo "<div class='form-check' style='margin-bottom: 4%;'>
                        <input class='form-check-input' type='checkbox' id='formCheck-1' style='font-size: 1.2rem;' name='arr[]' value=$item_id>
                        <label class='form-check-label' for='formCheck-1' style='font-size: 1.2rem;'>$item_name</label>
                    </div>";
                    }
                    $sql_writer->close();

                    $arr = $_POST["arr"] ?? null;
                    if (isset($arr)) {
                        $sql_writer = $con->prepare("UPDATE menu_table SET item_available = 0 WHERE item_available = 1");
                        $sql_writer->execute();

                        foreach ($arr as $value) {
                            $sql_writer = $con->prepare("UPDATE menu_table SET item_available = 1 WHERE menu_table.item_id = '$value'");
                            $sql_writer->execute();
                            $sql_writer->close();
                        }
                    }
                    ?>

                    <button class="btn btn-primary" type="submit">Update Menu</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Add a new item</h2>

        <form action="menu_add_success.php" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Food Name</label>
                    <input class="form-control" type="text" name="food_name"></div>
                <div class="col"><label class="form-label">Price</label>
                    <input class="form-control" type="number" min="0" name="food_price"></div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Description of the food:</label>
                    <textarea class="form-control" name="food_details"></textarea></div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Sample picture:</label>
                    <input class="form-control" type="file" name="food_picture">
                    <small class="form-text">ONLY upload image files, and ensure that the name of the food is the name of the picture uploaded. e.g. burger.jpg</small></div>
            </div>
            <div class="row">
                <div class="col"><button class="btn btn-primary" type="submit">Add Item</button></div>
            </div>
        </form>

    </div>

    <div class="container mb-lg-4">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Feedback List:</h2>
        <form method="post" action="message_list.php">
            <div class="row" style="margin-bottom: 2%;">
                <div class="col">
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="result_method" value=0 checked="">
                        <label class="form-check-label" for="formCheck-3">See the feedback messages (Latest-&gt;Oldest)</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="result_method" value=1>
                        <label class="form-check-label" for="formCheck-4">See the support messages (Latest-&gt;Oldest)</label></div>
                </div>
            </div>
            <div class="row">
                <div class="col"><button class="btn btn-primary" type="submit">Go</button></div>
            </div>
        </form>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>