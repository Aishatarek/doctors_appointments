<?php
ob_start();
include('dashboard/function.php');
if (isset($_SESSION['doctor_id'])) {
  header("Location: dashboard/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {
    $email = "'" . $_POST['email'] . "'";
    $password = "'" . md5($_POST['password']) . "'";
    $Doctors->signIn($email, $password);
  }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Novena- Health & Care Medical template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

<!-- register section starts  -->
<?php include("header.php") ; ?>
<section class="container">
<div class="thesignin">
    <div class="theform2">
      <div class="card my-5">
        <div class="card-body">
          <form action="" method="POST" class="forms-sample">
            <h3>Sign in</h3>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="email" name="email" required>
            </div>
            <div class="form-group">
              <label>password</label>
              <input type="password" class="form-control" placeholder="Password " name="password" required>
            </div>
            <button name="submit"  class="btn btn-gradient-primary me-2">Sign in</button>
          </form>
        </div>
      </div>
    </div>

  </div>


</section>

<!-- container-scroller -->
    <!-- plugins:js -->
    <script src="dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="dashboard/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="dashboard/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="dashboard/assets/js/off-canvas.js"></script>
    <script src="dashboard/assets/js/hoverable-collapse.js"></script>
    <script src="dashboard/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="dashboard/assets/js/dashboard.js"></script>
    <script src="dashboard/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>