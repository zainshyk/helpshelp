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
	<!-- Google Web Fonts -->
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
      
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
      
          <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
      
          <!-- Icon Font Stylesheet -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      
          <!-- Libraries Stylesheet -->
          <link href="lib/animate/animate.min.css" rel="stylesheet">
          <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
          <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
      
          <link href="CSS/bootstrap.min.css" rel="stylesheet">
      
          <link href="CSS/style.css" rel="stylesheet">
          <link href="CSS/emergency.scss" rel="stylesheet">


<style>
html,
body,
.intro {
  height: 100%;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

thead th,
tbody th {
  color: #000000;
  font-family: 'Nunito', sans-serif;
}

tbody td {
  font-weight: 500;
  color: rgba(65, 65, 65, 0.65);
  font-family: 'Nunito', sans-serif;
}
</style>



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
                            <p>/ Emergency Contacts</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->
        <div class="bg-light">
        <div>
          <p class="section-title bg-light text-secondary justify-content-center pt-5"><span></span>Complete Tasks & Earn Money<span></span></p>
      </div>
      <div class="wrapper">
          <form action="" method="GET">
<div class="searchBar">
<input id="searchQueryInput" type="text" required name="search" class="form-control bg-white" placeholder="Search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
<button id="searchQuerySubmit" type="submit">
<svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
</svg>
</button>
</div>
</form>
</div>
</div>



        <section class="intro bg-light pt-5">
          <div class="h-100">
            <div class="mask d-flex align-items-center h-100">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <tr>
                            <th scope="col">SUPPLIERS</th>
                            <th scope="col">NUMBER</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">CITY</th>
                            <th scope="col">CONTACT</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

include 'Admin/conn.php';
$search = '';
if(isset($_GET['search'])) {
$search = mysqli_real_escape_string($conn, $_GET['search']);
}

$display = "SELECT * FROM `emergency` WHERE emergency.Name LIKE '%$search%'";
$query = mysqli_query($conn, $display);
if(mysqli_num_rows($query) > 0) {
while($data = mysqli_fetch_assoc($query)) {
?>
                          <tr>
                            <th scope="row"><?php echo $data['Name']; ?></th>
                            <td><?php echo $data['Number']; ?></td>
                            <td><?php echo $data['Address']; ?></td>
                            <td><?php echo $data['City']; ?></td>
                            <td><a class="text-primary" href="tel:<?php echo $data['Number']; ?>"><i class="fa-solid fa-phone-flip pe-2"></i>Call Now</a></td>
                          </tr>
                          <?php
      };
    } else {
        echo "No Task Found.";
    }
      ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>











</div>

<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->


          <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
	<script src="js/main.js"></script>


</body>
</html>