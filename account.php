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
  mysqli_query($conn, "DELETE FROM `users` WHERE ID = '$remove_id'");
  header('location:logout.php');
};
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

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
    

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




        <?php

        include 'Admin/conn.php';
        
        $get = $_GET['ID'];
        $display = "SELECT * FROM `users` WHERE id='$get'";
        $query = mysqli_query($conn, $display);
        $data = mysqli_fetch_array($query);
        
            if(isset($_POST['update'])){
                $FirstName = $_POST['firstname'];
                $LastName = $_POST['lastname'];
                $Bio = $_POST['bio'];
                $Email = $_POST['email'];
                $Skills = $_POST['skills'];
                $Location = $_POST['location'];
        
                $update = "UPDATE `users` SET `First Name`='$FirstName',`Last Name`='$LastName',`Bio`='$Bio',`Email`='$Email',
        `Skills`='$Skills',`Location`='$Location' WHERE id='$get'";
        
        $query = mysqli_query($conn, $update);
        
            if($query){
                  header('location:index.php');
               }
        
            }
        
            ?>

<?php

        include 'Admin/conn.php';
        
        $get = $_GET['ID'];
        $display1 = "SELECT * FROM `users` WHERE id='$get'";
        $query1 = mysqli_query($conn, $display1);
        $data1 = mysqli_fetch_array($query1);
        
            if(isset($_POST['updateimage'])){
              $image = $_FILES['image']; 
$filename = $image['name'];
move_uploaded_file($image['tmp_name'],'userimage/'.$filename);
        
                $update1 = "UPDATE `users` SET `Image`='$filename' WHERE id='$get'";
        
        $query1 = mysqli_query($conn, $update1);
        
            if($query1){
                  header('location:index.php');
               }
        
            }
        
            ?>











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
                            <p>/ Account Details</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->


        <!-- Tasks Start -->
        <div class="container">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb accountnav ps-2 rounded-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Account Details</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 d-none d-md-block">
              <div class="card">
                <div class="card-body">
                  <nav class="nav flex-column nav-pills nav-gap-y-1">
                    <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Profile Information
                    </a>
       
                    <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>Change Image
                    </a>

                    <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Account Settings
                    </a>
                    <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>Security
                    </a>
                    <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell mr-2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>Notification
                    </a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                  <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                    <li class="nav-item accountnav">
                      <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                    </li>
                    <li class="nav-item">
                      <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                    </li>
                    <li class="nav-item">
                      <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
                    </li>
                    <li class="nav-item">
                      <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></a>
                    </li>
                    <li class="nav-item">
                      <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                    </li>
                  </ul>
                </div>
                <form method="POST" enctype="multipart/form-data">
                <div class="card-body tab-content">
                  <div class="tab-pane active" id="profile">
                    <h6>YOUR PROFILE INFORMATION</h6>
                    <hr>
                    
                      <div class="form-group">
                        <label for="fullName">First Name</label>
                        <input type="text" name= "firstname" class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your firstname" value="<?php echo $data ['First Name'];?>">
                        <small id="fullNameHelp" class="form-text text-muted">Your name may appear around here where you are mentioned. You can change or remove it at any time.</small>
                      </div>
                      <div class="form-group">
                        <label for="fullName">Last Name</label>
                        <input type="text" name= "lastname" class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your lastname" value="<?php echo $data ['Last Name'];?>">
                        <small id="fullNameHelp" class="form-text text-muted">Your name may appear around here where you are mentioned. You can change or remove it at any time.</small>
                      </div>
                      <div class="form-group">
                        <label for="bio">Your Bio</label>
                        <textarea class="form-control autosize" name= "bio" id="bio" placeholder="Write something about you" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;"><?php echo $data ['Bio'];?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="url">Your Skills</label>
                        <input type="text" name= "skills" class="form-control" id="url" placeholder="e.g: Electrician , Plumber , Web Developer" value="<?php echo $data ['Skills'];?>">
                      </div>
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name= "location" class="form-control" id="location" placeholder="Lahore, Pakistan" value="<?php echo $data ['Location'];?>">
                      </div>
                      <div class="form-group small text-muted">
                        All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears.
                      </div>
                      <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
                  </div>
                  <div class="tab-pane" id="account">
                    <h6>ACCOUNT SETTINGS</h6>
                    <hr>
                      <div class="form-group">
                        <label for="username">Email Address</label>
                        <input type="email" name= "email" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="example@gmail.com" value="<?php echo $data ['Email'];?>">
                        <small id="usernameHelp" class="form-text text-muted">Now u can change your email address any time any where!</small>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label class="d-block text-danger">Delete Account</label>
                        <p class="text-muted font-size-sm">Once you delete your account, there is no going back. Please be certain.</p>
                      </div>
                      <a href="account.php?remove=<?php echo $user; ?>" onclick="return confirm('Are you Confirm to Delete your Account?')" class="btn btn-danger text-white" type="button">Delete Account</a>
                  </div>
                  <div class="tab-pane" id="security">
                    <h6>SECURITY SETTINGS</h6>
                    <hr>
                      <div class="form-group">
                        <label class="d-block">Change Password</label>
                        <input type="text" class="form-control" placeholder="Enter your old password">
                        <input type="text" class="form-control mt-1" placeholder="New password">
                        <input type="text" class="form-control mt-1" placeholder="Confirm new password">
                      </div>
                    <hr>
                      <div class="form-group">
                        <label class="d-block">Two Factor Authentication</label>
                        <button class="btn btn-info" type="button">Enable two-factor authentication</button>
                        <p class="small text-muted mt-2">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.</p>
                      </div>
                    <hr>
                      <div class="form-group mb-0">
                        <label class="d-block">Sessions</label>
                        <p class="font-size-sm text-secondary">This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.</p>
                        <ul class="list-group list-group-sm">
                          <li class="list-group-item has-icon">
                            <div>
                              <h6 class="mb-0">San Francisco City 190.24.335.55</h6>
                              <small class="text-muted">Your current session seen in United States</small>
                            </div>
                            <button class="btn btn-light btn-sm ml-auto" type="button">More info</button>
                          </li>
                        </ul>
                      </div>
                  </div>
                  <div class="tab-pane" id="notification">
                    <h6>NOTIFICATION SETTINGS</h6>
                    <hr>
                      <div class="form-group">
                        <label class="d-block mb-0">Security Alerts</label>
                        <div class="small text-muted mb-3">Receive security alert notifications via email</div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                          <label class="custom-control-label" for="customCheck1">Email each time a vulnerability is found</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                          <label class="custom-control-label" for="customCheck2">Email a digest summary of vulnerability</label>
                        </div>
                      </div>
                      <div class="form-group mb-0">
                        <label class="d-block">SMS Notifications</label>
                        <ul class="list-group list-group-sm">
                          <li class="list-group-item has-icon">
                            Comments
                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </li>
                          <li class="list-group-item has-icon">
                            Updates From People
                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                              <input type="checkbox" class="custom-control-input" id="customSwitch2">
                              <label class="custom-control-label" for="customSwitch2"></label>
                            </div>
                          </li>
                          <li class="list-group-item has-icon">
                            Reminders
                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                              <input type="checkbox" class="custom-control-input" id="customSwitch3" checked="">
                              <label class="custom-control-label" for="customSwitch3"></label>
                            </div>
                          </li>
                          <li class="list-group-item has-icon">
                            Events
                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                              <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                              <label class="custom-control-label" for="customSwitch4"></label>
                            </div>
                          </li>
                          <li class="list-group-item has-icon">
                            Pages You Follow
                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                              <input type="checkbox" class="custom-control-input" id="customSwitch5">
                              <label class="custom-control-label" for="customSwitch5"></label>
                            </div>
                          </li>
                        </ul>
                      </div>
                  </div>

                  <div class="tab-pane" id="billing">
                    <h6>Change Profile Picture</h6>
                    <hr>
                      <div class="form-group">
                      <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
        <?php if(!empty($data['Image'])) { ?>
        <?php if (filter_var($data['Image'], FILTER_VALIDATE_URL)) { ?>
            <div id="imagePreview" style="background-image: url('<?php echo $data1 ['Image'];?>');">
            <?php } else { ?>
            <div id="imagePreview" style="background-image: url('./userimage/<?php echo $data1 ['Image'];?>');">
            <?php } ?>
            <?php } else { ?>
              <div id="imagePreview" style="background-image: url('./userimage/user.jpg');">
              <?php } ?>
            </div>
        </div>
    </div>
                        <button class="btn btn-primary" name="updateimage" type="submit">Save Changes</button>
                      </div>
            
                      </div>


                    
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
    
        </div>
        <!-- Tasks End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


          <!-- Footer Start -->
        <?php
        include 'footer.php'
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
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="JS/main.js"></script>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>



</body>

</html>