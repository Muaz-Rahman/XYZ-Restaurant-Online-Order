<?php
$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
$message_type = $_POST["result_method"];
$message_type_text = "";
if ($message_type==0){
    $message_type_text = "feedback";
}
else $message_type_text = "support ticket";
$message_id = $message_name = $message_phone = $message_email = $message_content = $message_time = "";
$sql_writer = $con->prepare("SELECT message_id, message_name, message_phone, message_email, message_content, message_time FROM messages_table WHERE message_type=$message_type ORDER BY message_time DESC");
if (!$sql_writer) echo "failed";
$sql_writer->bind_result($message_id, $message_name, $message_phone, $message_email, $message_content, $message_time);
$sql_writer->execute();
$sql_writer->store_result();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <title>User Messages</title>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md py-3" style="background: #b087f4;">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="../assets/img/logo.png" style="width: 40px;height: 60px;margin-right: 2%;"><span>XYZ Orders Admin Panel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="navbar-nav ms-auto">
            </ul><a class="btn btn-primary ms-md-2" role="button" href="#">Log Out</a>
        </div>
    </div>
</nav>

<div class="mt-lg-4 mb-lg-4">
    <h2 style="text-align: center">Currently showing the <?=$message_type_text?> messages</h2>
</div>

<div class="container mt-lg-4 mb-lg-4"><a class="btn btn-primary ms-md-2" role="button" onclick="location.reload()">Update List</a></div>

<div class="container mt-lg-4 table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="text-align: center;">Date</th>
            <th>Message id</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php
for ($i=0;$i<$sql_writer->num_rows;$i++){
    $sql_writer->fetch();
    echo "<tr>
            <td style='text-align: center;'>$message_time</td>
            <td>$message_id</td>
            <td>$message_name</td>
            <td>$message_phone</td>
            <td>$message_email</td>
            <td>$message_content</td>
        </tr>";
}
        ?>
        </tbody>
    </table>
</div>

<h3 class="text-center" style=" margin-top: 10%"><a href="admin_page.php">Go back to admin home page</a></h3>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>
