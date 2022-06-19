<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <?php include "../views/web/partials/top_imports.php" ?>
</head>

<body>
    <!-- Spinner Start -->
    <?php include "../views/web/partials/spinner.php" ?>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <?php include "../views/web/partials/topbar.php" ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include "../views/web/partials/menu.php" ?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <?php include "../views/web/partials/header.php"; ?>
    <!-- Page Header End -->

     <!-- Flash Message Start -->
     <?php include "../views/web/partials/flash_message.php"; ?>
    <!-- Flash Message End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
    <div class="mb-5">
                If you already have a account, click here to <a href="/login">login</a>.
            </div>
        <div class="container">
            
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <form class="mx-1 mx-md-4" method="POST" action="/register-user">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label" for="name">Your Name</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="email" id="email" name="email" class="form-control" />
                                <label class="form-label" for="email">Your Email</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="password" id="password" name="password" class="form-control" />
                                <label class="form-label" for="password">Password</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                <label class="form-label" for="confirm_password">Repeat your password</label>
                            </div>
                        </div>

                        <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="" id="is_agree" name="is_agree"/>
                            <label class="form-check-label" for="is_agree">
                                I agree all statements in <a href="#!">Terms of service</a>
                            </label>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="<?php echo PUBLIC_FOLDER; ?>/web_assets/img/illustrations/Happy female farmer working with smart farm.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    <?php include "../views/web/partials/footer.php"; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="<?php echo PUBLIC_FOLDER; ?>/web_assets/#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php include "../views/web/partials/bottom_imports.php" ?>
</body>

</html>