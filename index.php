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
    <title>Help Shelp - Home</title>
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
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
           integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/CSS/lightbox.min.css" rel="stylesheet">

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


        <!-- Navbar -->
        <?php
        include 'navbar.php'
        ?>


         <div class="container-xxl position-relative p-0">
            <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-end">
                        <div class="col-lg-7 mt-3 text-center text-lg-start">
                            <h2 class="text-white mb-4 animated slideInDown">Register Your Account Now Or Contact Our Team To Get All Kinds Of Services</h2>
                            <p class="text-white pb-3 animated slideInDown">Discover top-tier Professional Services for all your Home and Commercial needs. From expert maintenance to specialized solutions, we've got you covered with quality, reliability, and professionalism at every step.</p>
                            <a type="button" onclick="document.getElementById('id01').style.display='block'" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInUp">Get Started</a>

                            <a href="about.php" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInUp">Read More</a>
                        </div>
                        <div class="col-lg-5 text-center text-lg-start">
                            <div class="float">
                                <img class="float1 rounded-circle" src="./img/IMG-20240323-WA0007.jpg" alt="">
                                <img class="float2 rounded-circle" src="./img/IMG-20240323-WA0009.jpg"><br>
                                <img class="float3 rounded-circle" src="./img/IMG-20240323-WA0003.jpg" alt="">
                                <img class="float4 rounded-circle" src="./img/IMG-20240323-WA0008.jpg" alt="">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item active">
            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-end">
                        <div class="col-lg-7 mt-3 text-center text-lg-start">
                            <h2 class="text-white mb-4 animated slideInDown">Now Avail Professional Services With Only One Click Or a Phone Call</h2>
                            <p class="text-white pb-3 animated slideInDown">Discover top-tier Professional Services for all your Home and Commercial needs. From expert maintenance to specialized solutions, we've got you covered with quality, reliability, and professionalism at every step.</p>
                            <a type="button" onclick="document.getElementById('id01').style.display='block'" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInUp">Get Started</a>
                            <a href="about.php" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInUp">Read More</a>
                        </div>
                        <div class="col-lg-5 text-center text-lg-start">
                            <div class="float">
                                <img class="float1 rounded-circle" src="./img/IMG-20240323-WA0002.jpg" alt="">
                                <img class="float2 rounded-circle" src="./img/IMG-20240323-WA0005.jpg" alt=""><br>
                                <img class="float3 rounded-circle" src="./img/IMG-20240323-WA0006.jpg" alt="">
                                <img class="float4 rounded-circle" src="./img/IMG-20240323-WA0004.jpg" alt="">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
         </div>
        </div>


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Our Services<span></span></p>
                    <h1 class="text-center mb-5">What Services We Provide</h1>
                </div>
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="category.php?Category=AC%20Technician"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/ac technician.png" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>AC Technician</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Architect"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/architector.png" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Architect</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="category.php?Category=Auto%20Mechanic"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/auto mechanic.png" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Auto Mechanic</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="category.php?Category=Electrician"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/electrician.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Electrician</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="hospital.php"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/hospital and clinics.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Hospital & Clinics</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="category.php?Category=Labour"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/labour.jpeg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Labour</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Web%20Developer"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/web developers.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Web Developer</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Graphic%20Designer"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/graphic design.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Graphic Designer</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Rent%20Car%20&%20Bikes"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/rent car.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Rent Car & Bikes</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Painter"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/painters.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Painter</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Plumber"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/plumber.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Plumber</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="category.php?Category=Jobs%20&%20Others"><div class="popularcat">
                            <div class="image-container">
                                <img src="./img/jobs.jpg" width="100%" height="150px">
                                <div class="overlay1">
                                  <h3>Jobs & Others</h3>
                                  <p>(11 Products)</p>
                              </div>
                            </div>
                          </div></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->



                <!-- Feature Start -->
                <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa-solid fa-3x fa-hand-pointer text-primary mb-4"></i>
                            <h5 class="mb-3">Choose What To Do</h5>
                            <p class="m-0">Find exciting activities, events, and experiences to make the most of your free time effortlessly.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa fa-3x fa-search text-primary mb-4"></i>
                            <h5 class="mb-3">Find What You Want</h5>
                            <p class="m-0">Discover services with our user-friendly website, offering intuitive navigation and powerful search features.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa-solid fa-3x fa-paper-plane text-primary mb-4"></i>
                            <h5 class="mb-3">Amazing Places</h5>
                            <p class="m-0">Your destination for discovering exceptional services and experiences, tailored to exceed your expectations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <p class="section-title text-white justify-content-center"><span></span>Newsletter<span></span></p>
                        <h1 class="text-center text-white mb-4">Stay Always In Touch</h1>
                        <p class="text-white mb-4">Get the latest updates and exclusive services delivered to your inbox with our newsletter. Subscribe for a quick dose of insights and stay in the know!</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-2 me-2"><i class="fa fa-paper-plane text-primary fs-4 pt-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


        <!-- Projects Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Our Projects<span></span></p>
                    <h1 class="text-center mb-5">Recently Completed Projects</h1>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="mx-2 active" data-filter="*">All</li>
                            <li class="mx-2" data-filter=".first">Electrical</li>
                            <li class="mx-2" data-filter=".second">Architect</li>
                            <li class="mx-2" data-filter=".third">Plumber</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/service-01.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/service-01.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Architect</p>
                                <h5 class="lh-base mb-0">Thoughened Glass Fitting Service</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/service-03.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/service-03.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Electrical</p>
                                <h5 class="lh-base mb-0">Electric Panel Repairing Service Availablity</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/Architect.webp" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/Architect.webp" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Architect</p>
                                <h5 class="lh-base mb-0">Hire a Best Architect for Making Futuristic Buildings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item third wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/Plumber.png" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/Plumber.png" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Plumber</p>
                                <h5 class="lh-base mb-0">Hire a Best Plumber if you have any issue of Water Supply</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/service-7.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/service-7.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Electrical</p>
                                <h5 class="lh-base mb-0">Expert Electrical Work for Home Services</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item third wow fadeInUp" data-wow-delay="0.5s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/service-8.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/service-8.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">Plumber</p>
                                <h5 class="lh-base mb-0">Hire a Expert Plumber for better water supply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
                <h1 class="text-center mb-5">What Say Our Clients!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <section>
            <div class="container-xxl py-5">
                <div class="container py-5 px-lg-5">
              <div class="row align-items-center">
                <div class="col-md-5 col-lg-7 order-md-1 text-center text-md-start z-index-2 cta-image wow fadeInUp" data-wow-delay="0.5s"><img class="img-fluid mb-4 mb-md-0" src="img/cta.png" width="850" alt="" /></div>
                <div class="col-md-7 col-lg-5 text-center text-md-start wow fadeInUp" data-wow-delay="0.5s">
                  <h1 class="display-3 fw-bold lh-sm">Download our App now</h1>
                  <p class="my-4"> The rise of mobile devices transforms the way we consume information entirely and the world's most elevant channels such as Facebook.</p>
                  <div class="d-flex justify-content-center d-md-inline-block"><a class="pe-2 pe-sm-3 pe-md-4" href="!#"><img src="img/googleplay.svg" width="160" alt="" /></a><a href="!#"><img src="img/appstore.svg" width="160" alt="" /></a></div>
                </div>
              </div>
            </div>
        </div>
          </section>
        <!-- Team End -->
        

        <!-- Footer -->
        <?php
        include 'footer.php'
        ?>
         <!-- Footer END -->

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
    <script src="lib/lightbox/JS/lightbox.min.js"></script>


    <script src="JS/main.js"></script>
    <script src="JS/js/bootstrap.bundle.min.js"></script>
    <script src="JS/js/bootstrap.min.js"></script>
    
</body>

</html>