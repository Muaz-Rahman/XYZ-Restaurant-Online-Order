<?php
session_start();
if(isset($_SESSION["admin_email"])) header("Location: admin_page.php");
if(isset($_SESSION["email"])) header("Location: user_page.php");
$con = new mysqli("localhost","root","","xyz_order_db");
if($con->connect_error) die("Connection to database has failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login to XYZ</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md sticky-top py-3" id="mainNav" style="background: var(--bs-gray-500);position: sticky;">
    <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="../index.php"><span style="margin-right: 5%"><img src="../assets/img/logo.png" width="40px" height="60px"></span><span>XYZ Food Orders</span></a>
    </div>
</nav>
<div class="cover">
    <section class="position-relative py-4 py-xl-5">
        <div class="container" style="margin-top: 10%;">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in to XYZ Orders</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                                <svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                     fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg>
                            </div>

                            <form class="text-center" method="post" action="">
                                <div class="mb-3"><input class="form-control" type="email" name="email"
                                                         placeholder="Email" required autofocus></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password"
                                                         placeholder="Password" required></div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit" name="login">Login
                                    </button>
                                </div>
                                <p class="text-muted">Don't have an account? <a href="signup_page.php">Sign up!</a></p>

                                <?php
                                $email = $_POST["email"] ?? null;
                                $password = $_POST["password"] ?? null;
                                $clicked = $_POST["login"] ?? null;
                                $sql_email = $sql_password = "";

                                $sql_writer_admin = $con->prepare("SELECT admin_email,admin_password FROM admin_table WHERE admin_email = '$email' LIMIT 1");
                                if (!$sql_writer_admin) {
                                    echo "failed";
                                }
                                $sql_writer_admin->bind_result($sql_email, $sql_password);
                                $sql_writer_admin->execute();
                                $sql_writer_admin->fetch();
                                if (isset($clicked)) {
                                    if ($email == $sql_email && $password == $sql_password) {
                                        $_SESSION["admin_email"] = $sql_email;
                                        header("Location: admin_page.php");
                                        die();
                                    }
                                }
                                $sql_writer_admin->close();
                                //                               Next query is for normal users
                                $sql_writer = $con->prepare("SELECT user_email,user_password FROM user_table WHERE user_email = '$email' LIMIT 1");
                                if (!$sql_writer) {
                                    echo "failed";
                                }
                                $sql_writer->bind_result($sql_email, $sql_password);
                                $sql_writer->execute();
                                $sql_writer->fetch();

                                if (isset($clicked)) {
                                    if ($email == $sql_email && $password == $sql_password) {
                                        $_SESSION["email"] = $sql_email;
                                        header("Location: user_page.php");
                                    } else echo "<span style='color: red'>Login Failed! Try Again</span>";
                                }
                                $sql_writer->close();
                                $con->close();
                                ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>

</html>
