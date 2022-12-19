<?php
include("function.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/media.css">

  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg"
            alt="logo" /></a>
      </div> -->
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>


        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div>
              <img src="../uploads/admin/<?php echo $_SESSION['avatar'] ?>" width="80px" height="80px" style="border-radius: 50%;" alt="">
              <p><?php echo $_SESSION['name'] ?></p>
            </div>
          </li>
          <li class="nav-item">
      <a class="nav-link" href="./admin/updateAdmin.php">
        <span class="menu-title"> تعديل الملف الشخصى</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/updatePassword.php">
        <span class="menu-title">تغيير كلمه السر</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <span class="menu-title">لوحه التحكم</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./admin/displayAdmin.php">
              <span class="menu-title">متحكمين</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./doctors/displayDoctors.php">
              <span class="menu-title">الاطباء</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./users/displayUsers.php">
              <span class="menu-title">المرضى</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./doctorSchedule/displayDoctorSchedule.php">
              <span class="menu-title">المواعيد</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./appointment/displayAppointment.php">
              <span class="menu-title">المواعيد المحجوزه</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">
              <span class="menu-title">Logout</span>
              <i class="mdi mdi-door menu-icon"></i>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel maindashboard">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>


          <div class="row">
            <div class="col-12 grid-margin">
              <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3"> الاطباء <i class="mdi mdi-dropbox  mdi-24px float-right"></i>
                      </h4>
                      <h2 class="mb-5 text-center"><?php echo count($Doctors->getData()); ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3"> المرضى
                        <i class="mdi mdi-store mdi-24px float-right"></i>
                      </h4>
                      <h2 class="mb-5 text-center"><?php echo count($Users->getData()); ?></h2>
                    </div>
                  </div>
                </div>

              </div>

          </div>


          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>