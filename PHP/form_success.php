<!DOCTYPE html>
<html lang="en">
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];
$support = $_POST["support"] ?? 0;
$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
$sql_writer = $con->prepare("INSERT INTO messages_table (message_name, message_phone, message_email, message_content, message_type) VALUES (?,?,?,?,?)");
$sql_writer->bind_param("ssssi", $name, $phone, $email, $message, $support);
$sql_writer->execute();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Recorded Successfully!</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>

<body style="background-color: #256dd9">
<nav class="navbar navbar-light navbar-expand-md sticky-top py-3" id="mainNav" style="background: var(--bs-gray-500);position: sticky;">
    <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="../index.php">
            <span style="margin-right: 5%"><img src="../assets/img/logo.png" width="40px" height="60px"></span><span>XYZ Food Orders</span></a>
    </div>
</nav>

<div class="container">
    <div class="container" style="margin-top: 5%; color: white;">
        <h1 class="text-center" >Your message has been sent successfully!</h1>
        <h3 class="text-center" style="margin-top: 10%">In case of support messages, you can expect to hear from us within the next 24 hours.</h3>
        <h3 class="text-center" style=" margin-top: 10%"><a href="../index.php" style="color: white;">Go back to Home Page</a></h3>
    </div>
</div>

</body>