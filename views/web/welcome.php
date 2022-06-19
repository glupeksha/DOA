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
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>Welcome To DOA</p>
            <h1 class="display-5 mb-4">
              Why You Should Visit
              <span class="text-primary">DOA</span>!
            </h1>
            <p class="mb-4">
              Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
              stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo
              nonumy clita sit at, sed sit sanctus dolor eos.
            </p>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Free Car
              Parking
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Natural
              Environment
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Professional
              Guide & Security
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>World Best
              Animals
            </h5>
            <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
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
    <a href="<?php echo PUBLIC_FOLDER; ?>/web_assets/#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <?php include "../views/web/partials/bottom_imports.php" ?>
  </body>
</html>
