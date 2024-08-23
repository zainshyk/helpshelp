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
include 'Admin/conn.php';
if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `task` WHERE ID = '$remove_id'");
  header('location:tasks.php');
};
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Your Profile</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css">

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
                          <p>/ Your Profile</p>
                      </div>
                  </div>
                  </div>
              </div>
          </div>

      </div>
      <!-- Navbar & Hero End -->
        

        <!-- Team Start -->
        <div class="container-xl container-xxl container-lg container-md">

<div class="container-fluid">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb accountnav ps-2 rounded-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Your Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

  <!-- Main content -->

<div class="container-fluid mt-5 mb-5">

<?php

include 'Admin/conn.php';

$get = $_GET['ID'];

$display = "SELECT * FROM `users` WHERE ID = '$get'";
$query = mysqli_query($conn, $display);
$data = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="text-center border-end">
                                          
                        <?php if(!empty($data['Image'])) { ?>
                            <?php if (filter_var($data['Image'], FILTER_VALIDATE_URL)) { ?>
                            <img src="<?php echo $data['Image']; ?>" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <?php } else { ?>
                            <img src="userimage/<?php echo $data['Image']; ?>" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <?php } ?>
                            <?php } else { ?>
                            <img src="./userimage/user.jpg" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <?php } ?>
                            <h4 class="text-primary font-size-20 mt-3 mb-1"><?php echo $data['First Name']; ?></h4>
                            <h6 class="text-muted font-size-13 mb-2"><?php echo $data['Category']; ?></h6>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <div class="ms-3">
                            <div>
                                <h4 class="card-title mb-2">BIO</h4>
                                <p class="mb-0 text-muted"><?php echo $data['Bio']; ?></p>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <div>
                                        <p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i><?php echo $data['Email']; ?>
                                        </p>
                                        <p class="text-muted fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>+92<?php echo $data['Number']; ?>
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         
                            <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">All Tasks</span>
                                    </a>
                                </li><!-- end li -->
                                <li>
                                    <a class="nav-link px-4 ms-2 text-primary" href="account.php?ID=<?php echo $data ['ID']; ?> " aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fa-solid fa-pen-to-square"></i></span>
                                        <span class="d-none d-sm-block">Edit Profile</span>
                                    </a>
                                </li><!-- end li -->
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">
            <div class="tab-content p-3">
                <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h4 class="card-title mb-4">All Tasks</h4>
                        </div>
                    </div>

                    <div class="row" id="all-projects">

<?php

include 'Admin/conn.php';
$display = "SELECT task.*, users.ID AS UserID, users.Image AS UserImage FROM task JOIN users ON task.User = users.ID WHERE User = '$get' ORDER BY ID DESC";
$query = mysqli_query($conn, $display);
while($data= mysqli_fetch_array($query)){
?>

                        <div class="col-md-6" id="project-items-1">
<form action="" method="POST">
                      <a href="taskdetails.php?ID=<?php echo $data ['ID'];?>"><div class="card taskcard border-0 bg-light">
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
                        <div>
                          <span><?php echo $data['Category']; ?></span>
                        </div>
                          </div>
                          <hr class="mt-0 mb-2">
                          <div class="taskstatus">
                          <form action="profile.php" method="POST">
                          <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>"/>
                          <input type="submit" name="open" value="Open"></input>
                          <input type="submit" name="complete" value="Complete"></input>
                         <a href="profile.php?remove=<?php echo $data['ID']; ?>" onclick="return confirm('Are you Confirm to Delete your Account?')"><input type="button" value="Delete"></input></a>
                          </form>
                    </div>


                    <?php 
                    if(isset($_POST['open'])){
                    
                              $id = $_POST['ID'];
                              $select = "UPDATE `task` SET `Status`='0' WHERE ID = '$id'";
                              $resut = mysqli_query($conn,$select);
                    }
                    
                    
                    if(isset($_POST['complete'])){
                    
                              $id = $_POST['ID'];
                              $select = "UPDATE `task` SET `Status`='2' WHERE ID = '$id'";
                              $resut = mysqli_query($conn,$select);
                    }
                    
                     ?>


                        </div>
                      </div></a>
                    </form>
                        </div><!-- end col -->

<?php
}
?>

                    </div><!-- end row -->
                </div><!-- end tab pane -->
















                

                
            </div>
        </div><!-- end card -->
    </div><!-- end col -->

<?php

include 'Admin/conn.php';

$get = $_GET['ID'];

$display = "SELECT * FROM `users` WHERE ID = '$get'";
$query = mysqli_query($conn, $display);
$data = mysqli_fetch_array($query);
?>
    
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="pb-2">
                    <h4 class="card-title mb-3">About</h4>
                    <p><?php echo $data['Bio']; ?></p>
                    <ul class="ps-3 mb-0">
                        <li>it will seem like simplified.</li>
                        <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                    </ul>
                    <!-- end ul -->
                </div>
                <hr>
                <div class="pt-2">
                    <h4 class="card-title mb-4">My Skill</h4>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge badge-soft-secondary p-2"><?php echo $data['Category']; ?></span>
                        <span class="badge badge-soft-secondary p-2">Add More +</span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Personal Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $data['First Name']; ?> <?php echo $data['Last Name']; ?></td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Location</th>
                                    <td><?php echo $data['Location']; ?></td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>English</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td><?php echo $data['Gender']; ?></td>
                                </tr><!-- end tr -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>

</div>
  
</div>
  </div>
        <!-- Team End -->
        

        <!-- Footer Start -->
        <?php
        include 'footer.php';
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
</body>

</html>