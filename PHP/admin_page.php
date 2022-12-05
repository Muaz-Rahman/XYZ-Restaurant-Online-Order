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
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-black);">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-black);">New Item</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Comments</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <form action="" method="post">
                    <button class="btn btn-primary ms-md-2" name="logout">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 style="margin-top: 2%;color: var(--bs-blue);margin-bottom: 3%;">Hello, <?=$email?> </h1><a class="btn btn-secondary justify-content-lg-center" role="button" href="order_list.php">Go to order listing page</a>
    </div>
    <div class="container">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Update the active menu</h2>
        <div class="row">
            <div class="col">
                <form>
                    <div class="form-check" style="margin-bottom: 4%;"><input class="form-check-input" type="checkbox" id="formCheck-1" style="font-size: 1.2rem;">
                        <label class="form-check-label" for="formCheck-1" style="font-size: 1.2rem;">Burger</label></div><button class="btn btn-primary" type="button">Update Menu</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Add a new item</h2>
        <form>
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Food Name</label><input class="form-control" type="text"></div>
                <div class="col"><label class="form-label">Price</label><input class="form-control" type="number" min="0"></div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Description of the food:</label><textarea class="form-control"></textarea></div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
                <div class="col"><label class="form-label">Sample picture:</label><input class="form-control" type="file">
                    <small class="form-text">Please ensure that the name of the food is the name of the picture uploaded. e.g. burger.jpg</small></div>
            </div>
            <div class="row">
                <div class="col"><button class="btn btn-primary" type="button">Add Item</button></div>
            </div>
        </form>
    </div>

    <div class="container mb-lg-4">
        <h2 style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Feedback List:</h2>
        <form method="post" action="message_list.php">
            <div class="row" style="margin-bottom: 2%;">
                <div class="col">
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="result_method" value=0 checked="">
                        <label class="form-check-label" for="formCheck-3">See the feedback messages only (Latest-&gt;Oldest)</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="result_method" value=1>
                        <label class="form-check-label" for="formCheck-4">See the support messages only (Latest-&gt;Oldest)</label></div>
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