<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo PUBLIC_FOLDER; ?>/portal_assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <?php include "../views/portal/partials/top_imports.php" ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include "../views/portal/partials/menu.php" ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include "../views/portal/partials/navbar.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Users</h4>
            <div class="card">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        
                        <th>Registered Services</th>
                        <th>Is Admin</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($users as $user): ?>
                              <tr>
                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $user->getName(); ?></strong></td>
                              <td><?= $user->getEmail();?>'</td>
                              <td><?= implode(" ",array_map(function($service){return '<span class="badge bg-label-secondary">'.$service->getName().'</span>';},$user->services()));?></td>
                              <td><?php if ($user->getIsAdmin()==0) echo "No"; else echo "Yes";?></td>
                              <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- / Content -->
            <!-- Footer -->
            <?php include "../views/portal/partials/footer.php" ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include "../views/portal/partials/bottom_imports.php" ?>
  </body>
</html>
