<?php
ob_start();
include('../function.php');
$item_id=$_SESSION['doctor_id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $Appointment->deleteAppointment($_POST['item_id']);
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
            include("../doctorSidenav.php")
            ?>
            <!-- partial -->
            <div class="main-panel maindashboard">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">جميع المواعيد المحجوزه</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> المريض</th>
                                                    <th> تاريخ اليوم </th>
                                                    <th> من </th>
                                                    <th> الى </th>
                                                    <th> - </th>
                                                    <th> اعراض </th>
                                                    <th> تعليق </th>

                                                    <th> Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($Appointment->getData() as $appointment) :
                                                    if($appointment['doctor_id']==$item_id):
                                                ?>
                                                    <tr>

                                                        <td>
                                                            <?php
                                                            foreach ($Users->getData() as $users) :
                                                                if ($users['id'] == $appointment["patient_id"]) :
                                                                    echo $users["name"];
                                                                endif;
                                                            endforeach;
                                                            ?>
                                                        </td>
                                                        <?php
                                                            foreach ($DoctorSchedule->getData() as $doctorSchedule) :
                                                                if ($doctorSchedule['id'] == $appointment["appointment_id"]) :
                                                                    echo "<td>".$doctorSchedule["date"]."</td>";
                                                                    echo "<td>".$doctorSchedule["start_date"]."</td>";
                                                                    echo "<td>".$doctorSchedule["end_date"]."</td>";
                                                                    echo "<td>".$doctorSchedule["available"]."</td>";


                                                                endif;
                                                            endforeach;
                                                            ?>
                                                        <td><?php echo $appointment["Symptom"] ?></td>
                                                        <td><?php echo $appointment["comment"] ?></td>
                                                        <td>
                                                            <form method="post">
                                                                <input type="hidden" value="<?php echo $appointment["id"] ?>" name="item_id">
                                                                <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                                                            </form>
                                                        </td>


                                                    </tr>
                                                <?php
                                                endif;
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
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