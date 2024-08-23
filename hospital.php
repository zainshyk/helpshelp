<?php
session_start();
include 'Admin/conn.php';

// Checking session for email/password login
if(isset($_SESSION['aid'])){
    $aid=$_SESSION['aid'];
    $FirstName=$_SESSION['firstname'];
    $Email = $_SESSION['email'];
    $Image = $_SESSION['image'];
}

// Checking session for Google login
if (!isset($_SESSION['access_token'])) {
}
?>

<?php

include 'Admin/conn.php';

if(isset($_SESSION['email'])) {
$userid = $_SESSION['email'];
$query = "SELECT * FROM `users` WHERE Email = '$userid'";
$query = mysqli_query($conn, $query);
$row =mysqli_fetch_array($query);
if($row) {
  $user = $row['ID'];
} else {
}
}



if(isset($_POST['finish'])){

	$Patient = $_POST['name'];
	$Email = $_POST['email'];
	$Number = $_POST['number'];
	$Description = $_POST['description'];
	$Hospital = $_POST['hospital'];
	$Address = $_POST['address'];
	$City = $_POST['city'];
	$Date = $_POST['year'];
	$Month = $_POST['month'];
       
	$hospital = "SELECT * FROM `hospital` WHERE User = '$user'";
	$hospital = mysqli_query($conn, $hospital);
      
	   $inserthospital = "INSERT INTO `hospital`(`User`, `Patient`, `Email`, `Number`, `Disease`, `Hospital`, `Address`, `City`, `Date`, `Month`) 
	   VALUES ('$user','$Patient','$Email','$Number','$Description','$Hospital','$Address','$City','$Date','$Month')";
	   $query = mysqli_query($conn, $inserthospital);
	};


?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hospital & Clinics</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
          <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">
	<!-- Font-->
          <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/raleway-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->

	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

          <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hospital.css"/>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>



<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            
            <?php
            include 'navbar.php';
            ?>

            <div class="container-xxl bg-primary firsttop">
            <div class="container py-5">
                    <div class="row py-4">
                        <div class="top d-flex">
                            <div>
                            <a href="index.php">Home</a>
                        </div>
                        <div>
                            <p>/ Hospital & Clients</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->

          
	<div class="page-content" style="background-image: url('images/wizard-v1.jpg')">
		<div class="wizard-v1-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-number">Step 1</span>
			            	<span class="step-text">Patient Details</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="name">Patient Name*</label>
										<input type="text" placeholder="Full Name" class="form-control" id="name" name="name" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="email">Email*</label>
										<input type="email" placeholder="Enter your Email" class="form-control" id="email" name="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
									</div>
									<div class="form-holder">
										<label for="number">Phone Number*</label>
										<input type="number" placeholder="Enter your Phone Number" class="form-control" id="number" name="number" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="description">Write your Disease*</label>
										<textarea type="text" placeholder="Please tell us about your disease" class="form-control" id="description" name="description" required ></textarea>
									</div>
								</div>
								
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-card"></i></span>
			            	<span class="step-number">Step 2</span>
			            	<span class="step-text">Appoinment Details</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-3">
										<label for="hospital">Hospital OR Clinics</label>
										<input type="text" name="hospital" class="card-number" id="hospital" placeholder="Search hospital OR clinics" required>
									</div>
									
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-3">
										<label for="hospital">Your Address</label>
										<input type="text" name="address" class="card-number" id="address" placeholder="e.g: Home no: 123 , Street no: 4 , Behria Town" required>
									</div>
									<div class="form-holder">
										<label for="city">Your City</label>
										<input type="text" name="city" class="cvc" id="city" placeholder="Enter your city" required>
									</div>
								</div>
								<div class="form-row form-row-2">
									
									<div class="form-holder">
										<label for="year">Appoinment Date</label>
										<select name="year" id="year" class="form-control" required>
											<option value="" disabled selected>Appoinment Date</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
										</select>
									</div>
									<div class="form-holder">
										<label for="month">Appoinment Month</label>
										<select name="month" id="month" class="form-control" required>
											<option value="" disabled selected>Appoinment Month</option>
											<option value="January">January</option>
											<option value="February">February</option>
											<option value="March">March</option>
											<option value="April">April</option>
											<option value="May">May</option>
											<option value="June">June</option>
											<option value="July">July</option>
											<option value="August">August</option>
											<option value="September">September</option>
											<option value="October">October</option>
											<option value="November">November</option>
											<option value="December">December</option>
										</select>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-number">Step 3</span>
			            	<span class="step-text">Confirm Details</span>
			            </h2>
			            <section class="patientdetails">
			                <div class="inner">
			                	<h3>Comfirm Details</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Patient Name:</th>
												<td id="name-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email Address:</th>
												<td id="email-val"></td>
											</tr>
											<tr class="space-row">
												<th>Phone Number:</th>
												<td id="number-val"></td>
											</tr>
											<tr class="space-row">
												<th>Hospital OR Clinic:</th>
												<td id="hospital-val"></td>
											</tr>
											<tr class="space-row">
												<th>Address:</th>
												<td id="address-val"></td>
											</tr>
											<tr class="space-row">
												<th>City:</th>
												<td id="city-val"></td>
											</tr>
											<tr class="space-row">
												<th>Appoinment Date:</th>
												<td id="year-val"></td>
											</tr>
											<tr class="space-row">
												<th>Appoinment Month:</th>
												<td id="month-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
<?php
if(isset($_SESSION['email']) || isset($_SESSION['aid'])) {
?>
					<div class="finishbtn">
					<button class="rounded-circle bg-primary" type="submit" name="finish"><i class="fa-solid fa-upload" style="color: #ffffff;"></i></button>
				</div>
<?php
} else {
?>
<div class="finishbtn">
<button class="rounded bg-primary" disabled>Login <i class="fa-solid fa-angles-right"></i></button>
</div>
<?php 
} 
?>
			            </section>

				
		        	</div>
		        </form>
			</div>
		</div>
	</div>

</div>

<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->


          <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="JS/hospital.js"></script>
	<script src="js/main.js"></script>

<script>
$(function(){
    $("#form-register").validate({
        messages: {
            name: {
                required: "Please provide your fullname"
            },
            email: {
                required: "Please provide an email"
            },
            description: {
                required: "Please enter your disease"
            },
            number: {
                required: "Please provide your phone number",
            },
	  hospital: {
                required: "Please select hopital OR clinic"
            },
            address: {
                required: "Please provide your address"
            },
            city: {
                required: "Please enter your city"
            },
        }
    });
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        // enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back',
            next : '<i class="fa-solid fa-angles-right"></i>',
            finish : '<i class="zmdi zmdi-arrow-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            var name = $('#name').val();
            var email = $('#email').val();
	  var number = $('#number').val();
            var hospital = $('#hospital').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var month = $('#month').val();
            var year = $('#year').val();

            $('#name-val').text(name);
            $('#email-val').text(email);
	  $('#number-val').text(number);
            $('#hospital-val').text(hospital);
            $('#address-val').text(address);
            $('#city-val').text(city);
            $('#month-val').text(month);
            $('#year-val').text(year);

            $("#form-register").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-register").valid();
        }
    });
});

</script>



</body>
</html>