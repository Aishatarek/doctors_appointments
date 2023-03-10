<?php
ob_start();
include('../function.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $doctor_id = "'" . $_POST['doctor_id'] . "'";
        $date = "'" . date('Y-m-d', strtotime($_POST['date'])) . "'";
        $start_date = "'" . $_POST['start_date'] . "'";
        $end_date = "'" . $_POST['end_date'] . "'";
        $DoctorSchedule->addDoctorSchedule($doctor_id, $date, $start_date, $end_date);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.html"><img src="../assets/images/logo.svg" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg"
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
            <?php
            include("../sidenav.php")
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">add appointment</h4>
                                    <form class="forms-sample" method="post">

                                        <div class="form-group">
                                            <label>name</label>
                                            <select name="doctor_id" class="form-control">
                                                <option value="" hidden>--????????--</option>
                                                <?php
                                                foreach ($Doctors->getData() as $doctors) {
                                                ?>
                                                    <option value="<?php echo $doctors['id'] ?>"><?php echo $doctors['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>date</label>
                                            <input type="date" class="form-control" placeholder="date" name="date" required>
                                        </div>
                                        <div class="form-group">
                                            <label>time</label>
                                            <input type="time" class="form-control" placeholder="time" name="start_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label>time</label>
                                            <input type="time" class="form-control" placeholder="time" name="end_date" required>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                        <button class="btn btn-light" type="reset">Cancel</button>
                                    </form>
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
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>