<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/feedback_form.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top py-3" id="mainNav" style="background: var(--bs-gray-500);position: sticky;">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="../index.php"><span style="margin-right: 5%"><img src="../assets/img/logo.png" width="40px" height="60px"></span><span>XYZ Food Orders</span></a>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="shadow contact-clean" style="background: rgb(3,77,139);">
        <div class="row">
            <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                <div>
                    <h1 class="text-uppercase fw-bold mb-3" style="color: var(--bs-white);">Let us hear from you!</h1>
                    <p class="mb-4" style="color: var(--bs-white);font-weight: bold;">Our team would love to know what you have to say, if there are any room for growth, or something is wrong. Please fill up the form below.</p>
                </div>
            </div>
        </div>
        <form class="bg-light border rounded border-secondary shadow-lg" method="post" action="form_success.php" style="background: rgb(248,248,249);">
            <h2 class="text-center">Contact Us</h2>
            <div class="form-group mb-3"><input class="form-control" type="text" name="name" placeholder="Name" required></div>
            <div class="form-group mb-3"><input class="form-control" type="text" name="phone" placeholder="Phone" required></div>
            <div class="form-group mb-3"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group mb-3"><textarea class="form-control" name="message" placeholder="Message" rows="14" required></textarea></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="support" value="1"><label class="form-check-label" for="formCheck-1">This message is regarding a problem that needs assistance</label></div>
            <div class="form-group mb-3"><button class="btn btn-primary" type="submit">send </button></div>
        </form>
    </section>

    <?php include "../reusable_html/footer_dark.html" ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>