<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>XYZ Online Food Order Service</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/features-image-images.css">
    <link rel="stylesheet" href="assets/css/features-large-icons-icons.css">
</head>

<body>
<nav id="mainNav" class="navbar navbar-light navbar-expand-md sticky-top py-3" style="background: var(--bs-gray-500);position: sticky;">
    <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="#"><span style="margin-right: 5%"><img src="assets/img/logo.png" width="40px" height="60px"></span><span>XYZ Food Orders</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div id="navcol-2" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="PHP/menu.php">Today's Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="PHP/feedback_form.php" style="color: var(--bs-navbar-active-color);">Contact Us</a></li>
            </ul><a class="btn btn-primary ms-md-2" role="button" href="PHP/login_page.php">Log In</a>
            <a class="btn btn-primary ms-md-2" role="button" href="PHP/signup_page.php" style="margin-left: 2%;">Sign Up</a>

        </div>
    </div>
</nav>
    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" id="carousel-1" style="height: 600px;">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/carousel_1.jpg" alt="Slide Image" style="z-index: -1;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Quality at its best!</h1>
                                <p class="my-3">Our ingredients are chosen carefully and food quality is ensured before sending it to your doorsteps!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/carousel_2.jpg" alt="Slide Image" style="z-index: -1;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Authentic cuisine at your fingertips!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/carousel_3.jpg" alt="Slide Image" style="z-index: -1;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">reasonable pricing for good food</h1>
                                <p class="my-3">Quality doesn't always have to mean pricey. We believe in it, and hopefully so will you after trying our recipes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
        </ol>
    </div>

<div class="container" style="margin-top: 5%;">
    <h1 class="text-center">Why choose our service?</h1>
</div>
<div class="container py-4 py-xl-5">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col"><img class="rounded w-100 h-100 fit-cover" style="min-height: 300px;" src="assets/img/left_half_view.jpg"></div>
        <div class="col d-flex flex-column justify-content-center p-4">
            <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                    </svg></div>
                <div>
                    <h4>Authentic foods with authentic taste</h4>
                    <p>Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p><a href="#">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                </div>
            </div>
            <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                    </svg></div>
                <div>
                    <h4>Prepared fresh, delivered fast</h4>
                    <p>Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p><a href="#">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                </div>
            </div>
            <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                    </svg></div>
                <div>
                    <h4>Online ordering available 24/7</h4>
                    <p>Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p><a href="#">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h1>Some messages we received from our customers...</h1>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
        <div class="col">
            <div>
                <p class="bg-light border rounded border-0 border-light p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex justify-content-lg-center">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                        <p class="text-muted mb-0" style="text-align: center;">Erat netus</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-light border rounded border-0 border-light p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex justify-content-lg-center">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                        <p class="text-muted mb-0" style="text-align: center;">Erat netus</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-light border rounded border-0 border-light p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex justify-content-lg-center">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                        <p class="text-muted mb-0" style="text-align: center;">Erat netus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "reusable_html/footer_dark.html" ?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>