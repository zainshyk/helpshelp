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
    <title>FAQs</title>
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
                            <p>/ FAQs</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->
        <div class="container">
            <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb accountnav ps-2 rounded-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">FAQs</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
        </div>


        <!-- FAQs Start -->
        <div class="accordion wow fadeInUp" data-wow-delay="0.1s">
        <p class="section-title text-secondary justify-content-center"><span></span>FAQs<span></span></p>
    <h1>Frequently Asked Questions</h1>
    <div class="accordion-item">
        <input type="checkbox" id="accordion1">
        <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What services do you offer?</label>
        <div class="accordion-item-desc">We offer a wide range of services including Construction, Car Wash, Plumbing, Electric,
             Computer, Lawyer, Machenic, Tailer, Graphic Designer, Cooking, Cleaning, Painter, Carpenter, Developer, Teacher & many
              more catering to specific needs or industries.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion2">
        <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How do I request a service?</label>
        <div class="accordion-item-desc">You can request a service by method such as filling out an online form, calling our hotline, 
            or using our mobile app. Simply provide details about the service you need, and we'll take care of the rest.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion3">
        <label for="accordion3" class="accordion-item-title"><span class="icon"></span>Are your service providers qualified and experienced?</label>
        <div class="accordion-item-desc">Yes, all our service providers are highly qualified and experienced professionals in their respective fields.
             We ensure that they undergo rigorous training and background checks to guarantee the highest level of expertise.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion4">
        <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How do I make payments for the services?</label>
        <div class="accordion-item-desc">We offer various payment methods including credit/debit cards, bank transfers, and online payment platforms. 
            You can choose the most convenient option for you during the checkout process.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion5">
        <label for="accordion5" class="accordion-item-title"><span class="icon"></span>Can I schedule appointments online?</label>
        <div class="accordion-item-desc">Yes, you can easily schedule appointments online through our website or mobile app. Simply select
             your preferred date and time, and we'll confirm your appointment shortly.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion6">
        <label for="accordion6" class="accordion-item-title"><span class="icon"></span>What is your response time for service requests?</label>
        <div class="accordion-item-desc">We strive to respond to service requests promptly. Our typical response time is [mention response time, e.g., 
            within 24 hours], but it may vary depending on the nature of the service requested and current demand.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion7">
        <label for="accordion7" class="accordion-item-title"><span class="icon"></span>Do you offer any discounts or promotions?</label>
        <div class="accordion-item-desc">Yes, we periodically offer discounts and promotions on our services. Be sure to check our website 
            regularly or subscribe to our newsletter to stay updated on the latest offers.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion8">
        <label for="accordion8" class="accordion-item-title"><span class="icon"></span>How can I contact customer support?</label>
        <div class="accordion-item-desc">You can contact our customer support team via phone, email, or live chat. Our friendly representatives
             are available 24/7 hours to assist you with any inquiries or concerns you may have.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion9">
        <label for="accordion9" class="accordion-item-title"><span class="icon"></span>Can I track the progress of my service request?</label>
        <div class="accordion-item-desc">Yes, you can track the progress of your service request through your account dashboard or by contacting
             our customer support team. We provide regular updates on the status of your request to ensure transparency and peace of mind.</div>
    </div>

    <div class="accordion-item">
        <input type="checkbox" id="accordion10">
        <label for="accordion10" class="accordion-item-title"><span class="icon"></span>What happens if I'm not satisfied with the service provided?</label>
        <div class="accordion-item-desc">Your satisfaction is our top priority. If you're not satisfied with the service provided, please contact us immediately,
             and we'll work to resolve the issue promptly. We stand by our work and strive to ensure that every customer is happy with the results.</div>
    </div>

</div>
        <!-- FAQs End -->
        

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
</body>

</html>