<?php
session_start();
$email = $_SESSION["admin_email"];
if(!isset($email)) header("Location: error.php");
header("refresh:5; url = admin_page.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Success!</title>
</head>
<body style="background-color: rgba(171,66,66,0.7)">

<?php
$con = new mysqli("localhost", "root", "", "xyz_order_db");
if ($con->connect_error) die("Connection to database has failed");
?>

<div class="container" style="color: white">
    <h1 style="text-align: center;margin-top: 3%;">A new item has been added to the menu successfully!</h1>
    <h2 style="text-align: center;margin-top: 5%;">Taking you back to the&nbsp;<a href="admin_page.php">admin home page</a>&nbsp;now...</h2>
</div>

<div class="container">
    <?php
    $food_name = $_POST["food_name"];
    $food_price = $_POST["food_price"];
    $food_details = $_POST["food_details"];
    $food_picture = "'../assets/menu/".$_FILES["food_picture"]["name"]."'";
    $sql_writer = $con->prepare("INSERT INTO menu_table (item_name, item_pic, item_description, item_price) VALUES (?,?,?,?)");
    if(!isset($sql_writer)) echo "Failed to perform the requested query";
    $sql_writer->bind_param("sssi",$food_name, $food_picture, $food_details, $food_price);
    $sql_writer->execute();
    $sql_writer->close();
    $con->close();
    $food_picture = trim($food_picture, "'");
    $file_tmp_location = $_FILES["food_picture"]["tmp_name"];
    move_uploaded_file($file_tmp_location, $food_picture);
    ?>
</div>

</body>
</html>