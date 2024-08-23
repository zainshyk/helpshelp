<?php
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



if(isset($_POST['posttask'])){

    $Title = $_POST['title'];
    $Number = $_POST['number'];
    $Description = $_POST['description'];
    $Category = $_POST['category'];
    $Latitude = $_POST['latitude'];
    $Longitude = $_POST['longitude'];
    $Location = $_POST['location'];
    $Budget = $_POST['budget'];
    $Date = date("Y-m-d");
 
    $task = "SELECT * FROM `task` WHERE User = '$user'";
    $task = mysqli_query($conn, $task);

       $inserttask = "INSERT INTO `task`(`User`,`Title`,`Number`, `Description`,`Category`, `Latitude`, `Longitude`, `Location`,`Budget`,`Date`) 
                          VALUES ('$user','$Title','$Number','$Description','$Category','$Latitude','$Longitude','$Location','$Budget','$Date')";
       $query = mysqli_query($conn, $inserttask);
       if($query){
        header('location:tasks.php');
        exit();
    }else {
        echo "Not Found"; // Or handle error message in your preferred way
    }
    };
 
 ?>

<link rel="stylesheet" href="CSS/navbar.css">

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <a href="#" class="navbar-brand p-0">
            <h1 class="m-0">Help Shelp</h1>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <?php
        if(!isset($_SESSION['email']) && !isset($_SESSION['givenName'])) {
        ?>
        <div class="servicemobile">
            <div class="d-flex">
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="nav-item nav-link">Sign Up</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
            </div>
            </div>
                <?php
        }
        ?>
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="#" onclick="document.getElementById('id03').style.display='block'" class="nav-item nav-link servicemodal">Service</a>

                <div id="id03" class="modal">
                    <form class="modal-content animate" id="signUpForm" action="/action_page.php" method="POST">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close">&times;</span>
                        </div>
                        <div class="container-xxl">
                            <div class="container">
                                <div class="row mb-4">
                                    <h2 class="servicehead">Choose a Category</h2>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('AC Technician')" href="#"><img src="./img/air-conditioner.png" width="80px"><br>
                                            <span>AC Technician</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a href="hospital.php"><img src="./img/hospital.png" width="80px"><br>
                                            <span>Hospital & Clinics</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Rent Car & Bikes')" href="#"><img src="./img/car-key.png" width="80px"><br>
                                            <span>Rent Car & Bikes</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Labour')" href="#"><img src="./img/worker.png" width="80px"><br>
                                            <span>Labour</span></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Electrician')" href="#"><img src="./img/socket.png" width="80px"><br>
                                            <span>Electrician</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Web Developer')" href="#"><img src="./img/code.png" width="80px"><br>
                                            <span>Web Developer</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Painter')" href="#"><img src="./img/paint-brush.png" width="80px"><br>
                                            <span>Painter</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Architect')" href="#"><img src="./img/architect.png" width="80px"><br>
                                            <span>Architect</span></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Auto Mechanic')" href="#"><img src="./img/workshop.png" width="80px"><br>
                                            <span>Auto Mechanic</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Graphic Designer')" href="#"><img src="./img/graphic-design.png" width="80px"><br>
                                            <span>Graphic Designer</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Plumber')" href="#"><img src="./img/sink.png" width="80px"><br>
                                            <span>Plumber</span></a>
                                        </div>
                                        <div class="service rounded text-center">
                                            <a onclick="setCategory('Jobs & Others')" href="#"><img src="./img/search-job.png" width="80px"><br>
                                            <span>Jobs & Others</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Task Form -->
                <?php
if(isset($_SESSION['email']) || isset($_SESSION['aid'])) {
?>
                <div id="id02" class="modal">
                    <form class="modal-content animate myForm" id="signUpForm" action="#!" method="POST" name="myform" onsubmit="return validateForm()">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close pt-0" title="Close">&times;</span>
                        </div>
                        <div class="container-xxl">
                            <div class="container px-lg-3">
                                <div class="row g-4">
                                    <h1 class="text-center fs-4">What work you want to do?</h1>
        <!-- start step indicators -->
        <div class="form-header d-flex mb-4">
            <span class="stepIndicator">Task Details</span>
            <span class="stepIndicator">When & Where</span>
            <span class="stepIndicator">Budget</span>
        </div>
        <!-- end step indicators -->
    
        <!-- step one -->
        <div class="step">
            <div>
                <input type="text" placeholder="Task Title" oninput="this.className = ''" name="title">
                <div class="errorfield" id="titleError">
               <span class="formerror"></span>
           </div>
            </div>
            <div class="mb-2">
                <input type="number" placeholder="e.g:3215678912" oninput="this.className = ''" name="number">
                <div class="errorfield" id="titleError">
               <span class="formerror"></span>
           </div>
            </div>
            <div>
                <textarea type="text" placeholder="e.g: Make a Ecommerce Responsive Website" oninput="this.className = ''" name="description"></textarea>
                <div class="errorfield" id="descriptionError">
               <span class="formerror"></span>
           </div>
            </div>
        </div>
    
        <!-- step two -->
        <div class="step">
        <div>
                <input type="text" placeholder="Enter your Location" oninput="this.className = ''" name="location">
                <div class="errorfield" id="titleError">
               <span class="formerror"></span>
           </div>
            </div>
        <div class="or-seperator"><b>or</b></div>
            <div class="mb-3 locationbtn">
                <button type="button" onclick = "getLocationAndShowMap(); showAlert();" name="submit"><i class="fa-solid fa-location-crosshairs"></i> Click Here to Turn On Location</button>
            </div>
            <div>
                <input type="hidden" placeholder="Twitter" oninput="this.className = ''" name="latitude">
                <div class="errorfield" id="latitudeError">
               <span class="formerror"></span>
           </div>
            </div>
            <div>
                <input type="hidden" placeholder="Auto Location" oninput="this.className = ''" name="longitude">
                <div class="errorfield" id="longitudeError">
               <span class="formerror"></span>
           </div>
            </div>
            <div class="map-container" id="mapContainer" style="display: none;">
        <iframe id="mapFrame" src="" width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
        </div>
    
        <!-- step three -->
        <div class="step">
            <p class="text-center mb-3">What's your budget estimate?</p>
            <div class="mb-5 d-flex">
                <span>Rs</span> <input class="pricebox" type="number" oninput="this.className = ''" name="budget">
                <div class="errorfield" id="budgetError">
               <span class="formerror"></span>
           </div>
            </div>
            
            <div>
                <h6><i class="fa-solid fa-circle-exclamation"></i> Don’t share your personal information & contact details</h6>
            </div>
        </div>

        <input type="hidden" name="category" id="categoryInput">
    
        <!-- start previous / next buttons -->
        <div class="form-footer d-flex">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            <button type="submit" name="posttask" id="submitBtn" style="display: none;">Submit</button>
        </div>
        <!-- end previous / next buttons -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
} else {
?>
<div id="id05" class="modal">
    <form class="modal-content animate" action="/action_page.php">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close">&times;</span>
        </div>
        <div class="container-xxl">
            <div class="container px-lg-5">
                <div class="row g-4">
                    <h2 class="startedhead">To Continue Please Login</h2>
                    <div class="col-lg-12 col-xl-12">
                        <div class="started rounded text-center p-4">
                            <a href="login.php" class="py-2 px-4 d-lg-block">Login  <i class="fa-regular fa-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php 
} 
?>
                <!-- Form END -->
                

                <div class="nav-item dropdown servicemobile">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                    <div class="dropdown-menu categry m-0">
                        <a onclick="setCategory('AC Technician')" href="#" class="dropdown-item">AC Technician</a>
                        <a onclick="setCategory('Electrician')" href="#" class="dropdown-item">Electrician</a>
                        <a href="hospital.php" class="dropdown-item">Hospital & Clinics</a>
                        <a onclick="setCategory('Web Developer')" href="#" class="dropdown-item">Web Developer</a>
                        <a onclick="setCategory('Architect')" href="#" class="dropdown-item">Architect</a>
                        <a onclick="setCategory('Auto Mechanic')" href="#" class="dropdown-item">Auto Mechanic</a>
                        <a onclick="setCategory('Graphic Designer')" href="#" class="dropdown-item">Graphic Designer</a>
                        <a onclick="setCategory('Plumber')" href="#" class="dropdown-item">Plumber</a>
                        <a onclick="setCategory('Painter')" href="#" class="dropdown-item">Painter</a>
                        <a onclick="setCategory('Rent Car & Bikes')" href="#" class="dropdown-item">Rent Car & Bikes</a>
                        <a onclick="setCategory('Labour')" href="#" class="dropdown-item">Labour</a>
                        <a onclick="setCategory('Jobs & Others')" href="#" class="dropdown-item">Jobs & Others</a>
                    </div>
                </div>
                <a href="tasks.php" class="nav-item nav-link">All Tasks</a>
                <a href="emergency.php" class="nav-item nav-link">Emergency</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu m-0">
                        <a href="about.php" class="dropdown-item">About Us</a>
                        <a href="contact.php" class="dropdown-item">Contact Us</a>
                        <a href="team.php" class="dropdown-item">Team Members</a>
                        <a href="404.html" class="dropdown-item">Privacy Policy</a>
                        <a href="404.html" class="dropdown-item">Terms & Condition</a>
                        <a href="faqs.php" class="dropdown-item">FAQs</a>
                    </div>
                </div>

                <?php
        if(isset($_SESSION['email']) || isset($_SESSION['givenName'])) {
        ?>
        <div class="nav-item dropdown servicemobile">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
            <?php
      include 'Admin/conn.php';

      $display = "SELECT * FROM `users` WHERE Email = '$userid'";
      $display = mysqli_query($conn, $display);
      if(mysqli_num_rows($display) > 0){
      while($result = mysqli_fetch_assoc($display)){

      ?>
            <div class="dropdown-menu categry m-0">
            <a href="profile.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Your Profile</a>
            <a href="account.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Settings</a>
            <a href="team.php" class="dropdown-item">Dashboard</a>
            <a href="profile.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Your Task</a>
            <a onclick="document.getElementById('id06').style.display='block'" href="#" class="dropdown-item">Add Account</a>
            <a href="account.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Change Password</a>
            <a href="logout.php" class="dropdown-item">Log Out</a>
            <input type="hidden" name="firstname" value="<?php echo $result['First Name']; ?>">
            <input type="hidden" name="lastname" value="<?php echo $result['Last Name']; ?>">
            <input type="hidden" name="bio" value="<?php echo $result['Bio']; ?>">
            <input type="hidden" name="email" value="<?php echo $result['Email']; ?>">
            <input type="hidden" name="skills" value="<?php echo $result['Skills']; ?>">
            <input type="hidden" name="location" value="<?php echo $result['Location']; ?>">
            </div>
            <?php
        }
    }
    ?>
        </div>
        <?php
        } else {
        } ?>

            </div>
        </div>

        <?php
        if(!isset($_SESSION['email']) && !isset($_SESSION['givenName'])) {
        ?>
        <button class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Get Started</button>
        
        <div id="id01" class="modal">
            <form class="modal-content animate" action="/action_page.php">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
                </div>
                <div class="container-xxl">
                    <div class="container px-lg-5">
                        <div class="row g-4">
                            <h2 class="startedhead">Choose One for Sign Up</h2>
                            <div class="col-lg-12 col-xl-6">
                                <div class="started rounded text-center p-4">
                                    <h4 class="mb-1">Provider</h4>
                                    <img src="./img/provider.png" alt=""><br><br>
                                    <a href="provider-signup.php" class="py-2 px-4 d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="started rounded text-center p-4">
                                    <h4 class="mb-1">User</h4>
                                    <img src="./img/user.png" alt=""><br><br>
                                    <a href="signup.php" class="py-2 px-4 d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <a href="login.php" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Login</a>
        <?php
        } else {
            // Fetch user's profile picture URL
            $Image = isset($_SESSION['image']) ? $_SESSION['image'] : $_SESSION['picture'];
            $defaultimg = './userimage/user.jpg';
        
            ?>
            <?php
      include 'Admin/conn.php';

      $display = "SELECT * FROM `users` WHERE Email = '$userid'";
      $display = mysqli_query($conn, $display);
      if(mysqli_num_rows($display) > 0){
      while($result = mysqli_fetch_assoc($display)){

      ?>

<div class="d-flex msg">
    <a href="#" onclick="document.getElementById('id08').style.display='block'"><i class="fa-regular fa-comment"></i></a>
    <a href=""><i class="fa-regular fa-bell"></i></a>
</div>



<div id="id08" class="modal">
    <form class="modal-content animate" action="/action_page.php">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close">&times;</span>
        </div>
        <div class="container-xxl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div id="chatbox">
                            <div id="friendslist">
                                
                                <div id="search">
                                    <input type="text" id="searchfield" value="Search contacts..." />
                                </div>
                                <div id="friends">
                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg" />
                                        <p>
                                            <strong>Miro Badev</strong><br>
                                            <span>mirobadev@gmail.com</span>
                                        </p>
                                        <div class="status available"></div>
                                    </div>
                                    
                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2_copy.jpg" />
                                        <p>
                                            <strong>Martin Joseph</strong><br>
                                            <span>marjoseph@gmail.com</span>
                                        </p>
                                        <div class="status away"></div>
                                    </div>
                                    
                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3_copy.jpg" />
                                        <p>
                                            <strong>Tomas Kennedy</strong><br>
                                            <span>tomaskennedy@gmail.com</span>
                                        </p>
                                        <div class="status inactive"></div>
                                    </div>
                                    
                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4_copy.jpg" />
                                        <p>
                                            <strong>Enrique	Sutton</strong><br>
                                            <span>enriquesutton@gmail.com</span>
                                        </p>
                                        <div class="status inactive"></div>
                                    </div>
                                    
                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5_copy.jpg" />
                                        <p>
                                        <strong>	Darnell	Strickland</strong><br>
                                            <span>darnellstrickland@gmail.com</span>
                                        </p>
                                        <div class="status inactive"></div>
                                    </div>

                                    <div class="friend">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5_copy.jpg" />
                                        <p>
                                        <strong>Darnell	Strickland</strong><br>
                                        <span>darnellstrickland@gmail.com</span>
                                        </p>
                                        <div class="status inactive"></div>
                                    </div>
                                    
                                </div>                
                                
                            </div>	
                            
                            <div id="chatview" class="p1">  
                                <div id="close">
                                    <div class="cy"></div>
                                    <div class="cx"></div>
                                </div>  	
                                <div id="profile">
                                    <p>Miro Badev</p>
                                    <span>miro@badev@gmail.com</span>
                                </div>
                                <div id="chat-messages">
                                    <label>Thursday 02</label>
                                    
                                    <div class="message">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg" />
                                        <div class="bubble">
                                            Really cool stuff!
                                            <div class="corner"></div>
                                            <span>3 min</span>
                                        </div>
                                    </div>
                                    
                                    <div class="message right">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2_copy.jpg" />
                                        <div class="bubble">
                                            Can you share a link for the tutorial?
                                            <div class="corner"></div>
                                            <span>1 min</span>
                                        </div>
                                    </div>
                                    
                                    <div class="message">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg" />
                                        <div class="bubble">
                                            Yeah, hold on
                                            <div class="corner"></div>
                                            <span>Now</span>
                                        </div>
                                    </div>
                                    
                                    <div class="message right">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2_copy.jpg" />
                                        <div class="bubble">
                                            Can you share a link for the tutorial?
                                            <div class="corner"></div>
                                            <span>1 min</span>
                                        </div>
                                    </div>
                                    
                                    <div class="message">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg" />
                                        <div class="bubble">
                                            Yeah, hold on
                                            <div class="corner"></div>
                                            <span>Now</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div id="sendmessage">
                                    <input type="text" value="Send message..." />
                                    <button id="send"></button>
                                </div>
                            
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


























            <div class="dropdown useraccount">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    Hello, <?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : $_SESSION['givenName'] ?>
                    <?php if(!empty($result['Image'])) { ?>
                    <?php if (filter_var($result['Image'], FILTER_VALIDATE_URL)) { ?>
                        <img src="<?php echo $result ['Image']; ?>" alt="" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px; border:1px solid rgb(212, 212, 212);">
                        <?php } else { ?>
                    <img src="userimage/<?php echo $result ['Image']; ?>" alt="" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px; border:1px solid rgb(212, 212, 212);">
                    <?php } ?>
                    <?php } else { ?>
                        <img src="./userimage/user.jpg" alt="Default Profile Picture" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px; border:1px solid rgb(212, 212, 212);">
                    <?php } ?>
                </a>
                <div class="dropdown-menu m-0">
                    <a href="profile.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Profile</a>
                    <a href="account.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Setting</a>
                    <a href="team.php" class="dropdown-item">Dashboard</a>
                    <a href="profile.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Your Task</a>
                    <a onclick="document.getElementById('id06').style.display='block'" href="#" class="dropdown-item">Add Account</a>
                    <a href="account.php?ID=<?php echo $result ['ID']; ?> " class="dropdown-item">Change Password</a>
                    <a href="logout.php" class="dropdown-item">Log Out</a>
                    <input type="hidden" name="firstname" value="<?php echo $result['First Name']; ?>">
                    <input type="hidden" name="lastname" value="<?php echo $result['Last Name']; ?>">
                    <input type="hidden" name="bio" value="<?php echo $result['Bio']; ?>">
                    <input type="hidden" name="email" value="<?php echo $result['Email']; ?>">
                    <input type="hidden" name="skills" value="<?php echo $result['Skills']; ?>">
                    <input type="hidden" name="location" value="<?php echo $result['Location']; ?>">
                </div>
            </div>
            <div class="usermobile">
                <a href="account.php?ID=<?php echo $result ['ID']; ?> ">
                    <div class= "profiledp">
                    <?php if(!empty($result['Image'])) { ?>
                    <?php if (filter_var($result['Image'], FILTER_VALIDATE_URL)) { ?>
                        <img src="<?php echo $result ['Image']; ?>" alt="" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
                        <?php } else { ?>
                    <img src="userimage/<?php echo $result ['Image']; ?>" alt="" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
                    <?php } ?>
                    <?php } else { ?>
                        <img src="./userimage/user.jpg" alt="Default Profile Picture" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px; border:1px solid rgb(77, 77, 77);">
                    <?php } ?>
                    </div>
                </a>
            </div>
        <?php 
        } 
        ?>
            <?php
                    };
                  };
                    ?>

            <!-- Add Account -->

            <div id="id06" class="modal">
                <form class="modal-content animate" action="/action_page.php">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close">&times;</span>
                    </div>
                    <div class="container-xxl">
                        <div class="container px-lg-5">
                            <div class="row g-4">
                                <h2 class="startedhead">Add a New Account</h2>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="started rounded text-center p-4">
                                        <h4 class="mb-1">Provider</h4>
                                        <img src="./img/provider.png" alt=""><br><br>
                                        <a href="provider-signup.php" class="py-2 px-4 d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="started rounded text-center p-4">
                                        <h4 class="mb-1">User</h4>
                                        <img src="./img/user.png" alt=""><br><br>
                                        <a href="signup.php" class="py-2 px-4 d-lg-block">Sign Up  <i class="fa-regular fa-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- End Add Account -->

    </nav>
</div>
<!-- Navbar & Hero End -->

<script>
    var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>



<script src="JS/navbar.js"></script>

<script>
    function setCategory(category) {
    <?php if(isset($_SESSION['email']) || isset($_SESSION['aid'])) { ?>
    document.getElementById('categoryInput').value = category;
    document.getElementById('id02').style.display = 'block';
    document.getElementById('id03').style.display = 'none';
    <?php } else { ?>
        document.getElementById('id05').style.display = 'block';
        document.getElementById('id03').style.display = 'none';
        <?php } ?>
}
</script>