<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Zoofari - Zoo & Safari Park Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo PUBLIC_FOLDER; ?>/web_assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
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

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1">500</h1>
            <h1 class="mb-4">Server Error</h1>
            <p class="mb-4">
              We’re sorry, something wrong with the server. We will be fixing this issue soon. Please try again later.
            </p>
            <a class="btn btn-primary py-3 px-5" href="/">Go Back To Home</a>
          </div>
        </div>
      </div>
    </div>
    <!-- 404 End -->

    <!-- Footer Start -->
    <?php include "../views/web/partials/footer.php"; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="<?php echo PUBLIC_FOLDER; ?>/web_assets/#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/wow/wow.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo PUBLIC_FOLDER; ?>/web_assets/js/main.js"></script>
  </body>
</html>
