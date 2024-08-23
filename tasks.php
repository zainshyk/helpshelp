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
?>




<?php
$allcategories = array(
    "AC Technician",
    "Architect",
    "Auto Mechanic",
    "Electrician",
    "Hospital & Clinics",
    "Web Developer",
    "Graphic Designer",
    "Labour",
    "Painter",
    "Plumber",
    "Rent Car & Bikes",
    "Jobs & Others",
);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tasks</title>
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <link href="CSS/style.css" rel="stylesheet">
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
                            <p>/ All Tasks</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->


        <!-- Tasks Start -->
        
                <!-- Breadcrumb -->
                <div class="container-fluid py-4">
          <nav aria-label="breadcrumb" class="main-breadcrumb accountnav ps-2 me-2 rounded-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-danger"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">All Tasks</li>
            </ol>
          </nav>
        </div>
          <!-- /Breadcrumb -->
          <div class="container-fluid">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Complete Tasks & Earn Money<span></span></p>
                </div>
                <div class="wrapper">
                    <form action="" method="GET">
  <div class="searchBar searchbarr">
    <input id="searchQueryInput" type="text" required name="search" class="form-control" placeholder="Search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
    <button id="searchQuerySubmit" type="submit">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
      </svg>
    </button>
  </div>
</form>
</div>
</div>
                <div class="container-xxl py-5">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="d-flex">
                            <div class="col-3 category">
                            <div class="categories">
                                <h6>Task Categories</h6>
                                <hr class="hrr">
                                <?php
            foreach ($allcategories as $category) {
            ?>
                                <p><a href="category.php?Category=<?php echo $category; ?>"><?php echo $category; ?></a></p>
                                <?php
            }
            ?>
                            </div>
                        </div>
<div class="container pt-0">
                <div class="row pt-0">
                        <form action="" method="GET">
      <div class="searchBar ms-0">
        <input style="width:150px;height:30px; font-size: 11px; padding-left: 15px;" id="searchQueryInput" type="text" required name="searchlocation" class="form-control" placeholder="Search Location" value="<?php if(isset($_GET['searchlocation'])){echo $_GET['searchlocation']; } ?>">
        <button id="searchQuerySubmit" type="submit">
          <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
          </svg>
        </button>
      </div>
    </form>
                    
                <?php
      include 'Admin/conn.php';
      $search = '';
      $searchlocation = '';
      if(isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
    }
    if(isset($_GET['searchlocation'])) {
        $searchlocation = mysqli_real_escape_string($conn, $_GET['searchlocation']);
    }
                                    
    $displayQuery = "SELECT task.*, users.Image AS UserImage FROM task JOIN users ON task.User = users.ID WHERE 1";

    if(!empty($search)) {
        $displayQuery .= " AND task.Title LIKE '%$search%'";
    }
    
    if(!empty($searchlocation)) {
        $displayQuery .= " AND task.Location LIKE '%$searchlocation%'";
    }
    
    $displayQuery .= " ORDER BY ID DESC";

    $displayResult = mysqli_query($conn, $displayQuery);

if(mysqli_num_rows($displayResult) > 0) {
    while($data = mysqli_fetch_assoc($displayResult)) {
      ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-3 mb-sm-0 wow fadeInUp">
                        <form action="" method="POST">
                      <a href="taskdetails.php?ID=<?php echo $data ['ID']; ?>"><div class="card taskcard border-0 bg-light mb-4">
                              <div class="taskmoney">
                              <small><i class="fa-solid fa-minus"></i> Rs: <?php echo $data['Budget']; ?></small>
                              </div>
                        <div class="card-body">
                         <div class="d-flex">
                            <?php if (!empty($data['UserImage'])) { ?>
                                <?php if (filter_var($data['UserImage'], FILTER_VALIDATE_URL)) { ?>
                                    <!-- If UserImage is a URL -->
                                    <img src="<?php echo $data['UserImage']; ?>" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                                <?php } else { ?>
                                    <!-- If UserImage is a filename -->
                                    <img src="userimage/<?php echo $data['UserImage']; ?>" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                                <?php } ?>
                            <?php } else { ?>
                                <!-- Display a default image if UserImage is empty -->
                                <img src="./userimage/user.jpg" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                            <?php } ?>
                          <h6 class="card-title"><?php echo $data['Title']; ?></h6>
                    </div>
                          <p class="card-text mb-0 mt-2"><i class="fa-solid fa-location-dot"></i> <?php echo $data['Location']; ?></p>
                          <div class="d-flex justify-content-between">
                           <div>
                          <p class="card-text mb-2"><i class="fa-regular fa-calendar"></i> <?php echo $data['Date']; ?></p>
                        </div>
                          </div>
                          <hr class="mt-0 mb-2">
                          <div class="taskstatus">
                          <?php
    // Display icon and text based on status
    switch ($data['Status']) {
        case 0:
            echo '<small>Open</small>';
            break;
        case 1:
            echo '<small>Assigned</small>';
            break;
        case 2:
            echo '<small class="bg-secondary">Complete</small>';
            break;
        default:
            echo 'Unknown';
            break;
    }
    ?>
                          <div>
                          <span><i class="fa-solid fa-layer-group"></i> <?php echo $data['Category']; ?></span>
                        </div>
                    </div>
                        </div>
                      </div></a>
                    </form>
                    </div>


<!-- Modal -->
<div id="id04" class="modal">
    <form class="modal-content animate" action="#" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close">&times;</span>
        </div>
        <div class="container-xxl">
            <div class="container">
                <div class="row g-4">
                    <h2 class="startedhead">Choose One for Sign Up</h2>
                    <div class="col-lg-12 col-xl-6">
                        <div class="started rounded text-center p-4">
                            <h4 class="mb-1">Provider</h4>
                            <img src="./img/provider.png" alt="">
                            <a href="provider-signup.php" class="py-2 px-4 d-none d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="started rounded text-center p-4">
                            <h4 class="mb-1">User</h4>
                            <img src="./img/user.png" alt="">
                            <a href="signup.php" class="py-2 px-4 d-none d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



                    <?php
      };
    } else {
        echo "No Task Found.";
    }
      ?>
                  </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Tasks End -->
        

        <!-- Footer Start -->
        <?php
        include 'footer.php'
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <script src="JS/main.js"></script>

<script>
    function openModal(event) {
        event.preventDefault();
        document.getElementById('id04').style.display = 'block';
    }
</script>
        
</body>

</html>