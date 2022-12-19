<?php
ob_start();
include('dashboard/function.php');
if(!isset($_SESSION['user_id'])){
	header('location: signIn.php');
}
$doctor_id = $_GET['doctor_id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		$doctor_idd = "'" . $_GET['doctor_id'] . "'";

		$patient_id = "'" . $_SESSION['user_id'] . "'";
		$appointment_id = "'" . $_POST['appointment_id'] . "'";
		$Symptom = "'" . $_POST['Symptom'] . "'";
		$comment = "'" . $_POST['comment'] . "'";

		$Appointment->addAppointment($patient_id, $doctor_idd, $appointment_id, $Symptom, $comment);
		$DoctorSchedule->updateDoctorSchedule($appointment_id);
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
	<?php include('header.php'); ?>

	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Book your Seat</span>
						<h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>

						<!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
          </ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="appoinment section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="mt-3">
						<div class="feature-icon mb-3">
							<i class="icofont-support text-lg"></i>
						</div>
						<span class="h3">Call for an Emergency Service!</span>
						<h2 class="text-color mt-3">+84 789 1256 </h2>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
						<h2 class="mb-2 title-color">Book an appoinment</h2>
						<p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
						<form class="forms-sample" method="post">

							<div class="form-group">
								<label>Symptom</label>
								<input type="text" class="form-control" placeholder="Symptom - الاعراض" name="Symptom" required>
							</div>
							<label>Pick a Date</label>

							<ul class="list">
								<?php
								foreach ($DoctorSchedule->getData() as $doctorSchedule) :
									if ($doctorSchedule['doctor_id'] == $doctor_id) :
									if ($doctorSchedule['available'] == 1) :

								?>
										<li>

											<input type="radio" id="<?php echo $doctorSchedule['id'] ?>" name="appointment_id" class="dddd" value="<?php echo $doctorSchedule['id'] ?>">
											<label for="<?php echo $doctorSchedule['id'] ?>"><?php echo $doctorSchedule['date'] ?> <br>
												<?php echo $doctorSchedule['start_date'] ?>--<?php echo $doctorSchedule['end_date'] ?></label>
										</li>

								<?php
									endif;

									endif;
								endforeach;


								?>
							</ul>
							<label for="">Comment</label>
							<textarea name="comment" rows="10" class="form-control"></textarea>
							<button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
							<button class="btn btn-light" type="reset">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- footer Start -->
	<footer class="footer section gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 mr-auto col-sm-6">
					<div class="widget mb-5 mb-lg-0">
						<div class="logo mb-4">
							<img src="images/logo.png" alt="" class="img-fluid">
						</div>
						<p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur veritatis eveniet distinctio possimus.</p>

						<ul class="list-inline footer-socials mt-4">
							<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a></li>
							<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a></li>
							<li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="widget mb-5 mb-lg-0">
						<h4 class="text-capitalize mb-3">Department</h4>
						<div class="divider mb-4"></div>

						<ul class="list-unstyled footer-menu lh-35">
							<li><a href="#">Surgery </a></li>
							<li><a href="#">Wome's Health</a></li>
							<li><a href="#">Radiology</a></li>
							<li><a href="#">Cardioc</a></li>
							<li><a href="#">Medicine</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="widget mb-5 mb-lg-0">
						<h4 class="text-capitalize mb-3">Support</h4>
						<div class="divider mb-4"></div>

						<ul class="list-unstyled footer-menu lh-35">
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Company Support </a></li>
							<li><a href="#">FAQuestions</a></li>
							<li><a href="#">Company Licence</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="widget widget-contact mb-5 mb-lg-0">
						<h4 class="text-capitalize mb-3">Get in Touch</h4>
						<div class="divider mb-4"></div>

						<div class="footer-contact-block mb-4">
							<div class="icon d-flex align-items-center">
								<i class="icofont-email mr-3"></i>
								<span class="h6 mb-0">Support Available for 24/7</span>
							</div>
							<h4 class="mt-2"><a href="tel:+23-345-67890">Support@email.com</a></h4>
						</div>

						<div class="footer-contact-block">
							<div class="icon d-flex align-items-center">
								<i class="icofont-support mr-3"></i>
								<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
							</div>
							<h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-btm py-4 mt-5">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-6">
						<div class="copyright">
							&copy; Copyright Reserved to <span class="text-color">Novena</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
							<form action="#" class="subscribe">
								<input type="text" class="form-control" placeholder="Your Email address">
								<a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
							</form>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						<a class="backtop js-scroll-trigger" href="#top">
							<i class="icofont-long-arrow-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- 
    Essential Scripts
    =====================================-->


	<!-- Main jQuery -->
	<script src="plugins/jquery/jquery.js"></script>
	<!-- Bootstrap 4.3.2 -->
	<script src="plugins/bootstrap/js/popper.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/counterup/jquery.easing.js"></script>
	<!-- Slick Slider -->
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<!-- Counterup -->
	<script src="plugins/counterup/jquery.waypoints.min.js"></script>

	<script src="plugins/shuffle/shuffle.min.js"></script>
	<script src="plugins/counterup/jquery.counterup.min.js"></script>
	<!-- Google Map -->
	<script src="plugins/google-map/map.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

	<script src="js/script.js"></script>
	<script src="js/contact.js"></script>

</body>

</html>