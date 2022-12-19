<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <div>
        <p><?php echo $_SESSION['name'] ?></p>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../doctors/updateDoctor.php">
        <span class="menu-title"> تعديل الملف الشخصى</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../doctors/updatePassword.php">
        <span class="menu-title">تغيير كلمه السر</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="../doctorDashboard.php">
              <span class="menu-title">لوحه التحكم</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
    <li class="nav-item">
            <a class="nav-link" href="../doctorSchedule/displayDoctorSchedule2.php">
              <span class="menu-title">المواعيد</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../appointment/displayDoctorAppointment.php">
              <span class="menu-title">المواعيد المحجوزه</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
    <li class="nav-item">
      <a class="nav-link" href="../../logout.php">
        <span class="menu-title">Logout</span>
        <i class="mdi mdi-door menu-icon"></i>
      </a>
    </li>

  </ul>
</nav>