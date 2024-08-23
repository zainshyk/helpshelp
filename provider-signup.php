<?php
    require_once "Admin/conn.php";
	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	$loginURL = $gClient->createAuthUrl();
	
?>





<?php

          include 'Admin/conn.php';

          if(isset($_POST['signup'])){
          $FirstName = $_POST['firstname'];
          $LastName = $_POST['lastname'];
          $Email = $_POST['email'];
          $Number = $_POST['number'];
          $Password = $_POST['password'];
          $Cpassword = $_POST['cpassword'];
          $Category = $_POST['category'];

          $insertquery = "INSERT INTO `users`(`First Name`,`Last Name`,`Email`,`Number`, `Category`,`Password`, `CPassword`) 
                          VALUES ('$FirstName','$LastName','$Email','$Number','$Category','$Password','$Cpassword')";
          $query = mysqli_query($conn, $insertquery);

          if($query){
                    header("location:login.php");
          }
          else{
          ?>
          <script>
                    alert('Sorry! Data not inserted');
          </script>
          <?php
          }
          }
          ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up Here</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/CSS/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">

    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <link href="CSS/signup.css" rel="stylesheet">
</head>

<body>






    

<!-- Provider Sign Up Start -->
<section class="vh-100 gradient-custom">
    <div class="container py-4 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration mb-4" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h2>Create an Account</h2>
                <p class="hint-text">Sign up with your email address, Don't worry in future you will be able to sign up wih your google account</p>
                <div class="social-btn text-center">
                    <!-- <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a> -->
                    <!-- <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> Twitter</a> -->
                    <a type="button" onclick="window.location = '<?php echo $loginURL ?>';"  name="google" class="btn btn-danger btn-lg w-75"><i class="fa fa-google"></i> Google</a>
                </div>
                <div class="or-seperator"><b>or</b></div>
              <form action="" method="POST" name="myform" onsubmit="return validateForm()">
  
                <div class="row">
                  <div class="col-md-6 mb-3">
  
                    <div class="form-outline">
                        <label class="form-label" for="firstname">First Name</label>
                      <input type="text" name="firstname" id="firstname" class="form-control" />
                      <div class="errorfield" id="fname">
                      <span class="formerror"></span>
           </div>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-3">
  
                    <div class="form-outline">
                        <label class="form-label" for="lastname">Last Name</label>
                      <input type="text" name="lastname" id="lastname" class="form-control" />
                      <div class="errorfield" id="lname">
                        <span class="formerror"></span>
                    </div>
                    </div>
  
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-3 pb-2">
  
                    <div class="form-outline">
                        <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control"/>
                      <div class="errorfield" id="emails">
                        <span class="formerror"></span>
                    </div>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-3 pb-2">
  
                    <div class="form-outline">
                        <label class="form-label" for="number">Phone Number</label>
                      <input type="number" name="number" id="number" class="form-control ps-5"/>
                      <div class="contact">
                        <span>+92</span>
                      </div>
                      <div class="errorfield" id="num">
                        <span class="formerror"></span>
                    </div>
                    </div>
  
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 pb-2">
    
                      <div class="form-outline">
                          <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        <div class="errorfield" id="pass">
                          <span class="formerror"></span>
                      </div>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-3 pb-2">
    
                      <div class="form-outline">
                          <label class="form-label" for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" />
                        <div class="errorfield" id="cpass">
                          <span class="formerror"></span>
                      </div>
                      </div>
    
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <label class="form-label select-label">Choose Category</label>
                      <select name="category" for="category" id="category">
                        <option value="1" selected disabled>Select Category</option>
                          <option>AC Technician</option>
                          <option>Architect</option>
                          <option>Auto Mechanic</option>
                          <option>Electrician</option>
                          <option>Hospital & Clinics</option>
                          <option>Web Developer</option>
                          <option>Graphic Designer</option>
                          <option>Labour</option>
                          <option>Plumber</option>
                          <option>Painter</option>
                          <option>Rent Car & Bikes</option>
                          <option>Jobs & Others</option>
                      </select>
                      <div class="errorfield" id="categories">
                        <span class="formerror"></span>
                    </div>
    
                    </div>
                  </div>
  
                <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg w-100" name="signup" type="submit" value="Sign Up Now" />
                </div>
                <div class="text-center pt-3">Already have an account? <a href="login.php">Login here</a></div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
        <!-- Provider Sign Up End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/js/bootstrap.bundle.min.js"></script>
    <script src="JS/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>



    <script>
      // Validation Form 

function seterror(id, error) {
  element = document.getElementById(id);
  element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function clearErrors() {
  errors = document.getElementsByClassName('formerror');
  for (let item of errors) {
      item.innerHTML = " ";
  }
}

function validateForm() {
  var returnval = true;
  clearErrors();


  
  let firstname = document.forms['myform']["firstname"].value;
  if (firstname.length < 3) {
      seterror("fname", "*Enter your first name!");
      returnval = false;
  }

  let lastname = document.forms['myform']["lastname"].value;
  if (lastname.length < 3) {
      seterror("lname", "*Enter your last name!");
      returnval = false;
  }


  let email = document.forms['myform']["email"].value;
  if (email.length < 10) {
      seterror("emails", "*Enter your valid email address!");
      returnval = false;
  }


  let number = document.forms['myform']["number"].value;
  if (number.length < 10) {
      seterror("num", "*Enter your valid phone number!");
      returnval = false;
  }


  let numbers = document.forms['myform']["number"].value;
  if (numbers.length > 10) {
      seterror("num", "*Enter your valid phone number!");
      returnval = false;
  }


  let password = document.forms['myform']["password"].value;
  if (password.length < 6) {
      seterror("pass", "*Password should be atleast 6 letters!");
      returnval = false;
  }


  let cpassword = document.forms['myform']["cpassword"].value;
  if (cpassword !== password) {
      seterror("cpass", "*Please enter the same password!");
      returnval = false;
  }


  let category = document.forms['myform']["category"].value;
  if (category < 1) {
      seterror("categories", "*Select atleast one Category!");
      returnval = false;
  }

  // let category = document.forms['myform']["category"].value;
  // if (category < 1) {
  //     seterror("categories", "*Please enter the same password!");
  //     returnval = false;
  // }


  return returnval;
}
    </script>
</body>

</html>