<?php
require('connection.php');
require('users/users.php');

require('admin/admin.php');
require('doctors/doctors.php');
require('doctorSchedule/doctorSchedule.php');
require('appointment/appointment.php');



$db = new DBController();
$Users=new Users($db);
$Admin = new Admin($db);
$Doctors= new Doctors($db);
$DoctorSchedule= new DoctorSchedule($db);
$Appointment= new Appointment($db);
