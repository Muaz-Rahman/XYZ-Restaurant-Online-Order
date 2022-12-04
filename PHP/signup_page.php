<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/signup_page.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
    <section class="clean-hero">
        <div style="height: 100%;background-position: center;background-size: cover;background-repeat: no-repeat;">
            <div class="d-flex justify-content-center align-items-center cover"
                 style="height: inherit;min-height: initial;left: 0;width: 100%;">
                <div class="container bg-white"
                     style="margin-right: 12px;margin-left: 12px;padding: 40px 6px 40px 6px;">
                    <div class="row">
                        <div class="col-10 col-sm-10 col-md-10 offset-1 offset-sm-1 offset-md-1 text-start align-content-md-center">
                            <form action="signup_success.php" method="post">
                                <h2 class="text-center" style="margin-bottom: 20px;color: #38414b;">
                                    Sign up, and get quality food delivered to your doorsteps</h2>
                                <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;margin-top: 10px;color: #505E6C;"><strong>Email</strong><br></label>
                                    <input class="form-control" type="text" style="margin-bottom: 20px;" placeholder="yourname@gmail.com" name="email">
                                </div>

                                <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;margin-top: 10px;color: #505E6C;"><strong>Phone Number</strong><br></label>
                                    <input class="form-control" type="text" style="margin-bottom: 20px;" placeholder="01812345678" name="phone">
                                </div>

                                <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;margin-top: 10px;color: #505E6C;"><strong>Password</strong></label>
                                    <input class="form-control" type="password" id="password" placeholder="Use combination of number and letter" style="margin-bottom: 20px;" name="password">
                                </div>

                                <div class="row">
                                    <div class="col-md-3" style="margin-top: 20px;"><a class="btn btn-secondary d-block d-lg-flex justify-content-lg-center w-100" role="button" href="../index.php">Go Back</a></div>
                                    <div class="col-md-3" style="margin-top: 20px;"><button class="btn btn-primary d-block d-lg-flex justify-content-lg-center w-100" id="submitButton" type="submit">Create Account</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>