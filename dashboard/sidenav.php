<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <div>
        <img src="../../uploads/admin/<?php echo $_SESSION['avatar'] ?>" width="80px" height="80px" style="border-radius: 50%;" alt="">
        <p><?php echo $_SESSION['name'] ?></p>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../admin/updateAdmin.php">
        <span class="menu-title"> تعديل الملف الشخصى</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../admin/updatePassword.php">
        <span class="menu-title">تغيير كلمه السر</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="../dashboard.php">
        <span class="menu-title">لوحه التحكم</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../admin/displayAdmin.php">
        <span class="menu-title">متحكمين</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../doctors/displayDoctors.php">
        <span class="menu-title">الاطباء</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../users/displayUsers.php">
        <span class="menu-title">المرضى</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="../doctorSchedule/displayDoctorSchedule.php">
              <span class="menu-title">المواعيد</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../appointment/displayAppointment.php">
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