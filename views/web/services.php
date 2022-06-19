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

  <!-- Service Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-6">
          <p><span class="text-primary me-2">#</span>Services</p>
          <h1 class="display-5 mb-0">
            You Can Be A Proud Member Of
            <span class="text-primary">DOA</span>
          </h1>
        </div>
        <div class="col-lg-6 text-lg-end">
          <a class="btn btn-primary py-3 px-5" href="/my-services">My Services</a>
        </div>
      </div>
      <div class="row g-4">
        <?php foreach ($services as $service) : ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative">
              <img class="img-fluid" src="<?= PUBLIC_FOLDER; ?><?= $service->getImage() ?>" alt="" />

              <h4 class="text-white mb-3"><?= $service->getName() ?></h4>

              <a class="btn btn-outline-light px-4 mt-3" href="/register-service/<?= $service->getId() ?>">Register</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Service End -->

  <!-- Footer Start -->
  <?php include "../views/web/partials/footer.php"; ?>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="<?php echo PUBLIC_FOLDER; ?>/web_assets/#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <?php include "../views/web/partials/bottom_imports.php" ?>
</body>

</html>