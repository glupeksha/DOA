<nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <a href="<?php echo PUBLIC_FOLDER; ?>/web_assets/index.html" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="<?php echo PUBLIC_FOLDER; ?>/web_assets/img/icon/icon-10.png" alt="Icon" />
        <h1 class="m-0 text-primary">DOA</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="/" class="nav-item nav-link <?php if($menu=="home") echo "active"; ?>">Home</a>
          <a href="/" class="nav-item nav-link <?php if($menu=="about") echo "active"; ?>">About</a>
          <a href="/services" class="nav-item nav-link <?php if($menu=="services") echo "active"; ?>">Services</a>
          <a href="/contact" class="nav-item nav-link <?php if($menu=="contact") echo "active"; ?>">Contact</a>
        </div>
        <?php if(App\Auth::getUser()!=null):?>
          <a href="/my-services" class="btn btn-primary"><?=App\Auth::getUser()->getName();?><i class="fa fa-arrow-right ms-3"></i></a>
        <?php else: ?>
          <a href="/register" class="btn btn-primary"
          >Register<i class="fa fa-arrow-right ms-3"></i
        ></a>
        <?php endif; ?>
      </div>
    </nav>