<?php
include('./conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Company - Real Estate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responshive.css">
    <script src="/js/main.js"></script>
<style>
     .img_blog{
           width: 100%;
           height:301px;
     }
</style>
</head>

<body>
<?php
include('conn.php'); // Database connection

// ✅ Fetch active navbar links
$navbar_result = $conn->query("SELECT * FROM navbar WHERE status = 'active' ORDER BY created_at ASC");

// ✅ Fetch website logo
$logo_result = $conn->query("SELECT * FROM logo ORDER BY created_at DESC LIMIT 1");
$logo_row = $logo_result->fetch_assoc();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <!-- ✅ Display dynamic logo -->
        <a class="navbar-brand" href="#">
        <img src="admin/<?= htmlspecialchars($logo_row['image']); ?>" class="w-50" alt="Website Logo">

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto text-center">
                <?php while ($row = $navbar_result->fetch_assoc()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= htmlspecialchars($row['link']); ?>"><?= htmlspecialchars($row['name']); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>




    <!-- navbar start  -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/buldingimg/logo.png" class="w-50" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#popular">Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn text-white bg-dark px-3" aria-current="page" href="#contact">Contact</a>
                    </li>


            </div>
        </div>
    </nav> -->
    <!-- navbar end  -->

    <!-- hero section start  -->





    <?php 


// Fetch all slides from the database
$result = $conn->query("SELECT * FROM carousel");
?>

<section id="home">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php 
            $i = 0;
            while ($i < $result->num_rows) { ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></button>
            <?php 
                $i++;
            } 
            ?>
        </div>

        <div class="carousel-inner">
            <?php 
            $isFirst = true;
            while ($row = $result->fetch_assoc()) { ?>
                <div class="carousel-item <?= $isFirst ? 'active' : '' ?>">
                    <img src="admin/<?= $row['image'] ?>" class="d-block w-100" alt="Slide Image">
                    <div class="carousel-caption">
                        <h1 class="fw-bold"><?= $row['title_home'] ?></h1>
                        <p class="lead"><?= $row['description_home'] ?></p>
                        <!-- <a href="#" class="btn hero-btn mt-3">Explore More</a> -->
                        <a href="<?= htmlspecialchars($row['link_home']) ?>" class="btn btn hero-btn mt-3">
    <?= htmlspecialchars($row['button_home']) ?>
</a>

                       
                    </div>
                </div>
            <?php 
                $isFirst = false;
            } 
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>








  <!-- Hero Section with Carousel -->
   <!-- <section id="#home" >


  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active btn"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        
        <div class="carousel-item active">
            <img src="/buldingimg/home8.jpg" class="d-block w-100" alt="Hotel">
            <div class="carousel-caption">
                <h1 class="fw-bold">Welcome to Our Luxurious </h1>
                <p class="lead">Experience comfort and elegance at its</p>
                <a href="#" class="btn hero-btn mt-3">Book Now</a>
            </div>
        </div>

        
        <div class="carousel-item">
            <img src="/buldingimg/home6.jpg" class="d-block w-100" alt="Resort">
            <div class="carousel-caption">
                <h1 class="fw-bold">Enjoy a Relaxing Stay</h1>
                <p class="lead">A paradise for your dream vacation</p>
                <a href="#" class="btn hero-btn mt-3">Explore More</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="/buldingimg/home7.jpg" class="d-block w-100" alt="Room">
            <div class="carousel-caption">
                <h1 class="fw-bold">Luxury Rooms & Suites</h1>
                <p class="lead">Elegance and comfort blended perfectly</p>
                <a href="#" class="btn hero-btn mt-3">View Rooms</a>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

    </div>
</section> -->
    <!-- hero section end  -->

  
<?php

// ✅ Fetch all properties from the database
$result = $conn->query("SELECT * FROM services_");
?>

<section class="container p-5 p-lg-0">
    <p class="mt-5 fw-bold">Popular Properties</p>
    <div class="d-flex">
        <h5>Our Popular Residences</h5>
        <h6 class="ms-auto">Explore All <span class="arrow-icon">&rarr;</span></h6>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2 p-lg-5">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col">
                <div class="card border-0 rounded-0 shadow-lg">
                    <!-- ✅ Dynamic Image -->
                   
                    <img src="admin/<?= htmlspecialchars($row['image']); ?>" class="img-fliud" alt="">
                    <div class="card-body">
                        <!-- ✅ Dynamic Location -->
                        <p class="card-text text-muted"><i class="fa fa-map-marker"></i> <?= htmlspecialchars($row['location']); ?></p>

                        <div class="d-flex justify-content-center mt-3">
                            <!-- ✅ Dynamic Property Details -->
                            <p class="mx-4 text-muted fw-bold card-text"><i class="fa fa-bed"></i> <?= htmlspecialchars($row['size']); ?></p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-ruler-combined"></i> <?= htmlspecialchars($row['length']); ?></p>
                        </div>

                        <div class="d-flex my-2">
                            <!-- ✅ Dynamic Button Name -->
                            <a href="#" class="btn btn-lg text-white bg-dark px-4 rounded-0"><?= htmlspecialchars($row['buttonname']); ?></a>
                            <!-- ✅ Dynamic Price -->
                            <h5 class="my-auto ms-auto">$<?= number_format($row['price'], 2); ?></h5>
                        </div>

                       
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
















    <!-- popular sections start -->
<!-- 
    <section class="container p-5 p-lg-0" id="popular">
        <p class=" mt-5 fw-bold">Popular</p>
        <div class="d-flex">
            <h5>Our Popular Residence</h5>
            <h6 class="ms-auto">
                Explore All <span class="arrow-icon">&rarr;</span>
            </h6>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2 p-lg-5">
            <div class="col">
                <div class="card border-0 rounded-0">
                    <img src="/buldingimg/home1.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-muted">Wakad, Pune</p>
                        <div class="d-flex justify-content-center mt-3">
                            <p class="mx-4 text-muted card-text"><i class="fa fa-car"> bed</i></p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-play"></i> 8 * 8</p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-compass"></i>2000 m2</p>
                        </div>

                        <div class="d-flex my-2">
                            <button class="btn btn-lg text-white bg-dark px-4 rounded-0">Book Now</button>
                            <h5 class="my-auto ms-auto">$12000</h5>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col">
                <div class="card border-0 rounded-0">
                    <img src="/buldingimg/home4.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-muted">Kothrud.Pune </p>
                        <div class="d-flex justify-content-center mt-3">
                            <p class="mx-4 text-muted card-text"><i class="fa fa-car"> bed</i></p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-play"></i> 16 * 16</p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-compass"></i>2000 m2</p>
                        </div>

                        <div class="d-flex my-2">
                            <button class="btn btn-lg text-white bg-dark px-4 rounded-0">Book Now</button>
                            <h5 class="my-auto ms-auto">$50000</h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card border-0 rounded-0">
                    <img src="/buldingimg/home2.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-muted">Badra.Mumbai </p>
                        <div class="d-flex justify-content-center mt-3">
                            <p class="mx-4 text-muted card-text"><i class="fa fa-car"> bed</i></p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-play"></i> 12 * 12</p>
                            <p class="mx-4 text-muted card-text"><i class="fa fa-compass"></i>5000 m2</p>
                        </div>

                        <div class="d-flex my-2">
                            <button class="btn btn-lg text-white bg-dark px-4 rounded-0">Book Now</button>
                            <h5 class="my-auto ms-auto">$78000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </section> -->
    <!-- popular sections end -->

    <!-- dark background and logs  -->

    <section class="bg-dark" style="margin-top: -15%;" id="" >
        <div class="container pt-5 ">
            <div class="row" style="margin-top: 25%;">
                <div class="col-lg-4">
                    <h2 style="color: #b5b5b5;">Hamid Razza</h2>
                    <p style="color: #b5b5b5;">Founder SALORES</p>
                </div>

                <div class="col-lg-8 mb-5">
                    <h6 class="" style="color: #b5b5b5;">&ldquo;Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit.
                        Ipsa maiores in, animi quam accusantium error inventore itaque ipsum sapiente ea temporibus,
                        autem
                        numquam hic laborum repellendus maxime similique aspernatur omnis ut dolorem aperiam neque
                        reiciendis? Ea perspiciatis doloribus saepe? Iste possimus odio suscipit repellendus aperiam
                        eaque
                        pariatur ipsam! Laborum, deleniti?</h6>

                    <!-- Nested col-lg-8 -->

                </div>
            </div>

            <hr class="text-light">

            <div class="container mt-5 pb-5">
                <div class="row text-center">
                    <div class="col-md-3 col-sm-6">
                        <img src="buldingimg/logo1.png" alt="" style="width: 55%;">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="buldingimg/logo2.png" alt="" style="width: 55%;">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="buldingimg/logo3.png" alt="" style="width: 55%;">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <img src="buldingimg/logo4.png" alt="" style="width: 55%;">
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <!-- end  -->


      <!-- our services start  -->
         <section class="about section-padding" style="margin-top: 40px;" id="services">
         <div class="text-center pb-5">
              <h2>Our Services</h2>
         </div>

         <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="d-flex">
                     <div class="about-img mx-2">
                        <img src="buldingimg//about1.png" class="img-fluid h-100 mt-4" alt="">
                     </div>

                     <div class="about-img">
                        <img src="buldingimg//about2.png" class="img-fluid h-75" alt="">
                     </div>
                    </div>
                   </div>

                   <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5" style="margin-top: 40px;">
                     <div class="about-text">
                      <h2>Comfort os our <br>Top Priority for Your</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus facere, numquam saepe quae voluptatem amet aliquam quia at nesciunt odit recusandae, laudantium neque ex libero cumque? Cumque labore explicabo laboriosam asperiores necessitatibus, esse provident est deleniti eveniet dignissimos nulla debitis officiis doloribus itaque praesentium facilis fugiat maxime nesciunt repellat dolores maiores, eligendi quibusdam tempore. Itaque repudiandae dolor voluptas, repellat dicta exercitationem mollitia quaerat soluta excepturi dolorem laudantium ad pariatur quis ab natus animi dolorum modi sed deserunt vero unde cumque quibusdam non? At ullam officia perspiciatis cumque id dolorem quod distinctio molestias a  </p>
                      <a href="" class="btn text-white bg-dark px-3 rounded-0">See More</a>
                     </div>

                   </div>

            </div>
         </div>
         </section>
       <!-- our services end -->


       <!-- blog start  -->
       <!-- <section class="container p-5 p-lg-0" id="blog">
        <p class="p-2  mt-5">Popular</p>
        <div class="d-flex">
            <h5>Letest Housing Information</h5>
            
            <button class="btn text-white bg-dark px-4 btn-md ms-auto rounded-0">See All Articles</button>
        </div>

        <div class="row row-cols-1 row-cols-md- row-cols-lg-3 g-4 mt-2">
            <div class="col">
                <div class="card border-0 rounded-0">
                    <img src="/buldingimg/home1.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-muted">04 Feb 2021</p>
                        <p class="card-text text-muted">Lorem ipsum dolor sit amet.</p>
                            <button class="btn text-primary px-4 btn-lg rounded-0" style="background: #d4e9ff;">Read More</button>
                            
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card border-0 rounded-0">
                        <img src="/buldingimg/home4.jpg" alt="">
                        <div class="card-body">
                            <p class="card-text text-muted">04 May 2023</p>
                            <p class="card-text text-muted">Lorem ipsum dolor sit amet.</p>
                                <button class="btn text-primary px-4 btn-lg rounded-0" style="background: #d4e9ff;">Read More</button>
                                
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card border-0 rounded-0">
                            <img src="/buldingimg/home2.jpg" alt="">
                            <div class="card-body">
                                <p class="card-text text-muted">04 April 2024</p>
                                <p class="card-text text-muted">Lorem ipsum dolor sit amet.</p>
                                    <button class="btn text-primary px-4 btn-lg rounded-0" style="background: #d4e9ff;">Read More</button>
                                    
                                </div>
                            </div>
                        </div>
            </div>




            
        </div>

      
    </section>
         blog end  -->


         <!-- blog satrt  -->

         <?php


// ✅ Fetch all blogs from the database
$result = $conn->query("SELECT * FROM blog");
?>

<section class="container p-5 p-lg-0" id="blog">
    <p class="p-2 mt-5">Popular</p>
    <div class="d-flex">
        <h5>Latest Housing Information</h5>
        <button class="btn text-white bg-dark px-4 btn-md ms-auto rounded-0">See All Articles</button>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col">
                <div class="card border-0 rounded-0">
                <img src="admin/<?= htmlspecialchars($row['image']); ?>" 
     alt="" 
     class="img-fluid" 
     style="width:100%; height:250px; object-fit:cover;">

                    <div class="card-body">
                        <p class="card-text fw-bold text-muted"><?= htmlspecialchars($row['published_date']); ?></p>
                        <p class="card-text fw-bold text-muted"><?= htmlspecialchars(substr($row['description'], 0, 50)); ?>...</p>
                        <a href="blog_details.php?id=<?= $row['id'] ?>" class="btn text-primary px-4 btn-lg rounded-0" style="background: #d4e9ff;">Read More</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>





         <!-- reviews section start -->
<!--  
         <section class="bg-dark" style="margin-top: 100px;" id="team">
         <div class="container pt-5 mt-2">
               <div class="d-flex" style="margin-top: 40px;">
               <h2 class="text-light">
                This Is <br> Our Team
               </h2>
               <div class="ms-auto">
                 <button class="btn btn-md text-light"><span class="arrow-icon mx-2">&rarr;</span></button>
                 <button class="btn btn-md text-light"><span class="arrow-icon mx-2">&rarr;</span></button>
               </div>
               </div>
         </div>

         <div class="container mx-auto row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 pb-5 mt-3">
         <div class="card border-0 rounded-0 bg-transparent col-md-8">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="/buldingimg/team-1.png" class="img-fluid rounded" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title text-light">Amar Malikv</h5>
                  <p class="card-text text-light">This is a wider card with supporting text below as a natural lead-in to additional longer.</p>
                  <p class="card-text"><small class="text-light">Lead Designer</small></p>
                </div>
              </div>
            </div>
          </div>


          <div class="card border-0 rounded-0 bg-transparent col-md-8">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="/buldingimg/team-2.png" class="img-fluid rounded" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title text-light">Manve desoxa</h5>
                  <p class="card-light text-light">This is a wider card with supporting text below as a natural lead-in to additional  longer.</p>
                  <p class="card-text"><small class="text-light">Lead Enginer</small></p>
                </div>
              </div>
            </div>
          </div>

          <div class="card border-0 rounded-0 bg-transparent col-md-8">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="/buldingimg/team-3.png" class="img-fluid rounded" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title text-light">lenn karvka</h5>
                  <p class="card-text text-light ">This is a wider card with supporting text below as a natural lead-in to additional  longer.</p>
                  <p class="card-text"><small class="text-light"> Designer</small></p>
                </div>
              </div>
            </div>
          </div>
          </div> -->
         <!-- </section> -->









         <?php



$result = $conn->query("SELECT * FROM team");
?>

<section class="bg-dark" style="margin-top: 100px;" id="team">
    <div class="container pt-5 mt-2">
        <div class="d-flex" style="margin-top: 40px;">
            <h2 class="text-light">This Is <br> Our Team</h2>
            <div class="ms-auto">
                <button class="btn btn-md text-light"><span class="arrow-icon mx-2">&rarr;</span></button>
                <button class="btn btn-md text-light"><span class="arrow-icon mx-2">&rarr;</span></button>
            </div>
        </div>
    </div>

    <div class="container mx-auto row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 pb-5 mt-3">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card border-0 rounded-0 bg-transparent col-md-8">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="admin/<?= htmlspecialchars($row['image']); ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title text-light"><?= htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text text-light"><?= htmlspecialchars($row['description']); ?></p>
                            <p class="card-text"><small class="text-light"><?= htmlspecialchars($row['role']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php $conn->close(); ?>

          <!-- reviews section end -->

          <!-- Contact us start  -->
            <section id="contact" class="bg-dark mt-lg-5 p-lg-5 p-4">
          <div class="container mt-5 shadow  ">
            <div class="row ">
                <div class="col-md-4 bg-primary p-5 text-white order-sm-first order-last ">
                    <h2>Let's get in touch</h2>
                    <p>We're open for any suggestion or just to have a chat</p>
                    <div class="d-flex mt-2">
                        <i class="bi bi-geo-alt"></i>
                        <p class="mt-3 ms-3">Address : Road 198 West 21th Street, Suite 721 Singapor WW 10016</p>
                    </div>
                    <div class="d-flex mt-2">
                        <i class="bi bi-telephone-forward"></i>
                        <p class="mt-4 ms-3">Phone : 8888888888</p>
                    </div>
                    <div class="d-flex mt-2">
                        <i class="bi bi-envelope"></i>
                        <p class="mt-4 ms-3">Email : contactform@gmail.com</p>
                    </div>
                    <div class="d-flex mt-2">
                        <i class="bi bi-youtube"></i>
                        <p class="mt-4 ms-3">Channel : www.contactform.com/</p>
                    </div>
                </div>
                <div class="col-md-8 p-lg-5 text-white">
                    <h2>Get in touch</h2>
                    <form class="row g-3 contactForm mt-4">
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label text-white">First Name</label>
                          <input type="email" class="form-control" id="inputEmail4" required>
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label text-white">Last Name</label>
                          <input type="password" class="form-control" id="inputPassword4" required>
                        </div>
                        <div class="col-12">
                          <label for="inputAddress" class="form-label text-white">Subject</label>
                          <input type="text" class="form-control" id="inputAddress" required>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label text-white">Email Id</label>
                            <input type="text" class="form-control" id="inputAddress" required>
                          </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label text-white">City</label>
                          <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label text-white">Contact Number</label>
                            <input type="text" class="form-control" id="inputCity" required>
                          </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary mt-3 ">Sign in</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </section>
          
          <!-- Contact us end  -->
          <!-- Footer section start  -->
              <footer class="bg-dark bg-footer " style="margin-top: 80px;">
                <div class="container">
                  <div class="row">
                   <div class="col-lg-6">
                      <h5 class="text-light">
                        About Us
                      </h5>
                      <p class="text-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, quibusdam.</p>
                      <p class="text-light"><i class="fa fa-location"></i>123 456 897</p>
                      <p class="text-light"><i class="fa fa-phone"></i>(98) 9855213455</p>
                      <p class="text-light"><i class="fa fa-envelope"></i>info@gmail.com</p>
                   </div>

                   <div class="col-lg-3">
                    <h5 class="text-light">Quick Links</h5>
                     <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#popular">Popular</a></li>
                        <li><a href="#services">Services</a>
                        </li>
                        <li><a href="#team">team</a></li>
                        <li><a href="#contact">contact</a></li>

                     </ul>
                </div>

                <div class="col-lg-3">
                  <h5 class="text-light">Stay Connected</h5>
                  <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fab-facebook"></i>Facebook</a></li>
                    <li><a href="#"><i class="fa fab-linkedin"></i>Linkedin</a></li>
                    <li><a href="#"><i class="fa fab-instagram"></i>Instagram</a></li>
                    <li><a href="#"><i class="fa fab-twitter"></i>Twitter</a></li>
                  </ul>
                </div>
                  </div>
                  <hr>

                  <div class="row">
                   <div class="col-lg-12">
                     <p class="text-center text-light">
                        Copyright &copy:2025 <a href="#"> Real Estate co</a>.All Rigts Resreved
                     </p>
                   </div>
                  </div>
                </div>
              </footer>
          <!-- Footer section end  -->

          <script>
            document.addEventListener("DOMContentLoaded", function () {
                var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
                var navbarCollapse = document.querySelector(".navbar-collapse");
        
                navLinks.forEach(function (link) {
                    link.addEventListener("click", function () {
                        if (window.innerWidth < 992) { // Close only on tablets & mobile
                            navbarCollapse.classList.remove("show");
                        }
                    });
                });
            });
        </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <body>

</html>