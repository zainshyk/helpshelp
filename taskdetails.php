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





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Team</title>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <link href="CSS/style.css" rel="stylesheet">



<!-- Begin emoji-picker JavaScript -->
<link href='http://onesignal.github.io/emoji-picker/lib/css/emoji.css' rel='stylesheet' type='text/css'>
    <script src="http://onesignal.github.io/emoji-picker/lib/js/config.js"></script>
    <script src="http://onesignal.github.io/emoji-picker/lib/js/util.js"></script>
    <script src="http://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="http://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js"></script>
    <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
    <!-- End emoji-picker JavaScript -->











</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
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
                          <a href="tasks.php">/ All Tasks</a>
                      </div>
                      <div>
                          <p>/ Task Details</p>
                      </div>
                  </div>
                  </div>
              </div>
          </div>

      </div>
      <!-- Navbar & Hero End -->
        

        <!-- Team Start -->
        <div class="container-fluid">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb accountnav ps-2 rounded-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="tasks.php">All Tasks</a></li>
              <li class="breadcrumb-item">Task Details</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="wow fadeInUp mt-5 mb-5" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Make Offer & Get This Service<span></span></p>
                </div>

<div class="container">

          

  <!-- Main content -->
<?php

include 'Admin/conn.php';

$get = $_GET['ID'];

$display = "SELECT task.*, users.ID AS UserID, users.Image AS UserImage, users.`First Name` AS UserName FROM task JOIN users ON task.User = users.ID WHERE task.ID = '$get'";
$query = mysqli_query($conn, $display);
while($data= mysqli_fetch_array($query)){
?>

  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card details mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <?php
    // Display icon and text based on status
    switch ($data['Status']) {
        case 0:
            echo '<span class="badge rounded-3 bg-primary ms-4 ps-3 pe-3">OPEN</span>';
            break;
        case 1:
            echo '<span class="badge rounded-pill bg-danger ms-4">ASSIGNED</span>';
            break;
        case 2:
            echo '<span class="badge rounded-3 bg-secondary ms-4 ps-2 pe-2">COMPLETE</span>';
            break;
        default:
            echo 'Unknown';
            break;
    }
    ?>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>
                    <div class="ms-3 mb-2">
                      <h4 class="mb-0" class="text-reset"><?php echo $data ['Title'];?></h4>
                      <span class="small"><?php echo $data ['Description'];?></span>
                    </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
               <tr>
                    <td class="d-flex">
                    <a href="userprofile.php?ID=<?php echo $data ['UserID']; ?> "><div>
                    <?php if(!empty($data['UserImage'])) { ?>
                      <?php if (filter_var($data['UserImage'], FILTER_VALIDATE_URL)) { ?>
                      <img src="<?php echo $data['UserImage']; ?>"  class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                      <?php } else { ?>
                      <img src="userimage/<?php echo $data['UserImage']; ?>"  class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                      <?php } ?>
                      <?php } else { ?>
                                <img src="./userimage/user.jpg" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border:2px solid rgb(172, 172, 172);">
                                <?php } ?>
                    </div></a>
                    <div>
                    <h2>POSTED BY</h2>
                    <a class="username" href="userprofile.php?ID=<?php echo $data ['UserID']; ?> "><?php echo $data['UserName']; ?></a>
                    </div>
                    </td>
               </tr>
              <tr>
                <td colspan="2"><h3><i class="fa-solid fa-location-dot pe-4"></i>LOCATION <?php echo $data['Location']; ?></h3></td>
                <tr class="location">
                <td colspan="2">
                    <iframe src="https://www.google.com/maps?q=<?php echo $data['Latitude']; ?>,<?php echo $data['Longitude']; ?>&hl=es;z=14&output=embed"></iframe>
                </td>
          </tr>
              </tr>
              <tr>
              <td colspan="2"><h3><i class="fa-solid fa-phone-flip pe-4"></i>PHONE NUMBER</h3><a href="tel:+92<?php echo $data['Number']; ?>" class="datedata">+92<?php echo $data['Number']; ?></a></td>
              </tr>
              <tr>
                <td colspan="2"><h3><i class="fa-regular fa-calendar pe-4"></i>DUE DATE</h3><p class="datedata"><?php echo $data['Date']; ?></p></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
</div>
      <div class="col-lg-4">
          <div class="card details mb-4 pb-3">
            <!-- Shipping information -->
            <div class="card-body text-center">
              <h4>TASK BUDGET ESTIMATE</h4>
              <hr>
              <h1>Rs: <?php echo $data['Budget']; ?></h1>
              <a class="offer" href="#" onclick="document.getElementById('id09').style.display='block'">MAKE AN OFFER</a>
            </div>
          </div>
        </div>
</div>
  <?php
                    };
                    ?>





<?php
if(isset($_POST['send'])){

	$Chat= $_POST['message'];

     $insertchat = "INSERT INTO `chat`(`User`, `Task`, `Message`) 
                        VALUES ('$user','$get','$Chat')";
     $query = mysqli_query($conn, $insertchat);
     if($query){
      ?>
          <script>
                    alert('Sorry! Data not inserted');
          </script>
          <?php
          }
  }
?>
        <div id="id09" class="modal pt-3">
          <form class="modal-content animate" action="#id09" method="POST">
                      <div class="row">
                          <div class="col-lg-12 col-xl-12">
                                <div id="framechat">
                                  <div class="content">
          
                                    <div class="header">
                                      <i class="fa fa-comments"></i>
                                      <p>CHATBOX</p>
                                      <span onclick="document.getElementById('id09').style.display='none'" class="close mt-4" title="Close">&times;</span>
                                    </div>
                                    <div class="messages">
                                      <ul>
  <?php 
	// $get = $_GET['ID'];
  $chatquery = "SELECT * FROM `chat`";
  $chatquery = mysqli_query($conn, $chatquery);

		 			if (mysqli_num_rows($chatquery) > 0){
		 				while ($chatrow=mysqli_fetch_array($chatquery)) {
		 				if ($chatrow['User'] == $user) {
		 					?>
                                        <li class="replies">
                                          <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                          <p><?php echo $chatrow['Message'];?></p>
                                        </li>

            <?php 
		 				}else{
		 					?>
                                        <li class="sent">
                                          <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                          <p><?php echo $chatrow['Message'];?></p>
                                        </li>

            <?php 
		 				}
		 			}
		 		}
		 		?>
                                      </ul>
                                    </div>
                                    <div id="sendmessage">
                                      <input type="text" name="message" value="Send message..." required/>
                                      <button type="submit" name="send"></button>
                                  </div>
                                  </div>
                                </div>
                          </div>
                      </div>
          </form>
      </div>















<?php
// Count comments
$commentQuery = "SELECT COUNT(*) AS commentCount FROM `comments` WHERE Task = '$get'";
$commentResult = mysqli_query($conn, $commentQuery);
$commentData = mysqli_fetch_assoc($commentResult);
$commentCount = $commentData['commentCount'];

// Count replies
$replyQuery = "SELECT COUNT(*) AS replyCount FROM `reply` WHERE Comment IN (SELECT ID FROM `comments` WHERE Task = '$get')";
$replyResult = mysqli_query($conn, $replyQuery);
$replyData = mysqli_fetch_assoc($replyResult);
$replyCount = $replyData['replyCount'];

// Total count of comments and replies
$totalCount = $commentCount + $replyCount;

// Output the total count
?>
                    <div class="col-lg-8">
                      <div class="card details ps-4 pe-4">
                    <div class="be-comment-block">
                      <div class="page-header d-flex justify-content-between">
                        <h4 class="reviews">Leave your comment</h4>
                        <div class="pt-1 comments">
                                <span class="glyphicon glyphicon-off"></span>( <?php echo $totalCount; ?> Comments )                                    
                        </div>
                    </div>
                    <hr>



<?php
if(isset($_POST['addcomment'])){

  $Comment = $_POST['comment'];
  $Date = date("Y-m-d");

  $commentquery = "SELECT * FROM `comments` WHERE User = '$user' AND Task = '$get'";
  $commentquery = mysqli_query($conn, $commentquery);

     $insertcomment = "INSERT INTO `comments`(`User`,`Task`, `Comment`,`Date`) 
                        VALUES ('$user','$get','$Comment','$Date')";
     $query = mysqli_query($conn, $insertcomment);
     $message[] = 'product added to cart succesfully';
  }
?>


<?php
if(isset($_POST['addreply'])){

  $reply = $_POST['reply'];
  $commentId = $_POST['commentId'];
  $Date = date("Y-m-d");

  $replyquery = "SELECT * FROM `reply` WHERE User = '$user' AND Comment = '$commentId'";
  $replyquery = mysqli_query($conn, $replyquery);

     $insertreply = "INSERT INTO `reply`(`User`,`Comment`, `Reply`,`Date`) 
                        VALUES ('$user','$commentId','$reply','$Date')";
     $query = mysqli_query($conn, $insertreply);
     $message[] = 'product added to cart succesfully';
  }
?>



                    <form class="form-block" method="POST">
                      <div class="row">
                        <div class="col-xs-12">									
                          <div class="form-group">
                            <textarea class="form-input" name="comment" required="" placeholder="Make an Offer OR Anything"></textarea>
                          </div>
                        </div>
                        <div class="d-flex justify-content-end">
<?php
if(isset($_SESSION['email']) || isset($_SESSION['aid'])) {
?>
                        <button class="btn btn-primary" type="submit" name="addcomment"><i class="fa-solid fa-paper-plane"></i> SUBMIT</button>
<?php
}else{
?>
      <button class="btn btn-primary disabled"><i class="fa-solid fa-paper-plane"></i> SUBMIT</button>
<?php
}
?>
                      </div>
                      </div>
                    </form>
                    <hr>
                    <?php

include 'Admin/conn.php';

$get = $_GET['ID'];

$display = "SELECT comments.*, users.ID AS UserID, users.Image AS UserImage, users.`First Name` AS UserFirst, users.`Last Name` AS UserLast FROM comments JOIN users ON comments.User = users.ID WHERE Task = '$get'";
$query = mysqli_query($conn, $display);
if(mysqli_num_rows($query) > 0) {
while($datas= mysqli_fetch_array($query)){
?>
                      <form method="POST">
                      <div class="be-comment pt-4">
                        <div class="be-img-comment">	
                          <a href="userprofile.php?ID=<?php echo $datas ['UserID']; ?>">
                          <?php if(!empty($datas['UserImage'])) { ?>
                          <?php if (filter_var($datas['UserImage'], FILTER_VALIDATE_URL)) { ?>
                          <img src="<?php echo $datas['UserImage']; ?>" alt="" class="be-ava-comment">
                          <?php } else { ?>
                          <img src="userimage/<?php echo $datas['UserImage']; ?>" alt="" class="be-ava-comment">
                          <?php } ?>
                            <?php } else { ?>
                              <img src="./userimage/user.jpg" alt="" class="be-ava-comment">
                              <?php } ?>
                          </a>
                        </div>
                        <div class="be-comment-content">
                          <div class="namedate">
                            <span class="be-comment-name">
                              <a href="userprofile.php?ID=<?php echo $datas ['UserID']; ?> "><?php echo $datas['UserFirst'];?> <?php echo $datas['UserLast'];?></a>
                              </span>
                            <span class="be-comment-time">
                              <i class="fa fa-clock-o"></i>
                              <?php echo $datas['Date']; ?>
                            </span>
                          </div>
                    <div class="be-comment-text">
                          <p>
                          <?php echo $datas['Comment']; ?>
                          </p>
                          <div onclick="openReplyModal(<?php echo $datas['ID']; ?>)" class="icon">REPLY</div>
                        </div>
                          
                          
                        </div>
                      </div>
                    </form>


                    <div id="replyModal" class="modal">
                      <form class="modal-content animate" action="" method="POST">
                          <div class="imgcontainer">
                              <span onclick="document.getElementById('replyModal').style.display='none'" class="close" title="Close">&times;</span>
                          </div>
                          <div class="container-xxl">
                              <div class="container px-lg-5">
                                  <div class="row g-4">
                                      <h4 class="startedhead">Add Your Reply</h4>
                                      <div class="col-lg-12 col-xl-12">
                                        <div class="form-group">
                                          <textarea class="form-input" name="reply" required="" placeholder="Make an Offer OR Anything"></textarea>
                                          <input type="hidden" name="commentId" id="commentId" value="">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                          <?php
                                          if(isset($_SESSION['email']) || isset($_SESSION['aid'])) {
                                          ?>
                                                                  <button class="btn btn-primary" type="submit" name="addreply"><i class="fa-solid fa-paper-plane"></i> SUBMIT</button>
                                          <?php
                                          }else{
                                          ?>
                                                <button class="btn btn-primary disabled"><i class="fa-solid fa-paper-plane"></i> SUBMIT</button>
                                          <?php
                                          }
                                          ?>
                                                                </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
      


                

<?php

include 'Admin/conn.php';
$comment = $datas['ID'];
$displayreply = "SELECT reply.*, users.ID AS UserID, users.Image AS UserImage, users.`First Name` AS UserFirst, users.`Last Name` AS UserLast FROM reply JOIN users ON reply.User = users.ID WHERE Comment = '$comment'";
$queryreply = mysqli_query($conn, $displayreply);
while($reply= mysqli_fetch_array($queryreply)){
?>

                  <form method="POST">
                    <div class="be-reply">
                    <div class="be-comment pt-4">
                      <div class="be-img-comment">	
                        <a href="userprofile.php?ID=<?php echo $reply ['UserID']; ?>">
                        <?php if(!empty($reply['UserImage'])) { ?>
                        <?php if (filter_var($reply['UserImage'], FILTER_VALIDATE_URL)) { ?>
                          <img src="<?php echo $reply['UserImage']; ?>" alt="" class="be-ava-comment">
                        <?php } else { ?>
                        <img src="userimage/<?php echo $reply['UserImage']; ?>" alt="" class="be-ava-comment">
                        <?php } ?>
                          <?php } else { ?>
                            <img src="./userimage/user.jpg" alt="" class="be-ava-comment">
                            <?php } ?>
                        </a>
                      </div>
                      <div class="be-comment-content">
                        <div class="namedate">
                          <span class="be-comment-name">
                            <a href="userprofile.php?ID=<?php echo $reply ['UserID']; ?> "><?php echo $reply['UserFirst'];?> <?php echo $reply['UserLast'];?></a>
                            </span>
                          <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            <?php echo $reply['Date']; ?>
                          </span>
                        </div>
                  <div class="be-reply-text">
                        <p>
                        <?php echo $reply['Reply']; ?>
                        </p>
                        <div onclick="openReplyModal(<?php echo $datas['ID']; ?>)" class="icon">REPLY</div>
                      </div>
                        
                        
                      </div>
                    </div>
                  </div>
                  </form>

<?php
} 
?>
<?php
}
}else{
  echo "No comments found.";
}
?>

                    </div>

</div>
</div>
  </div>
        <!-- Team End -->
     
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    function openReplyModal(commentId) {
        document.getElementById('commentId').value = commentId; // Store comment ID in a hidden input field
        document.getElementById('replyModal').style.display = 'block'; // Open the modal
    }
</script>

    
</body>

</html>