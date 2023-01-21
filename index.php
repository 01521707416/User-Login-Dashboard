<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Petology</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="front-end/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="front-end/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="front-end/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="front-end/index.html">
            <img src="front-end/images/logo.png" alt="">
            <span>
              Petology
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="front-end/index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="front-end/service.html">service </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="front-end/pet.html">Pet's gallery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="front-end/clinic.html"> clinic</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="front-end/contact.html">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="front-end/buy.html"> Buy now </a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container  d-flex justify-content-center">
              <a href="">
                Call: +01 1234567890
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <?php
            require_once 'database.php';
            $get_banner_query = "SELECT * FROM banners WHERE active_status = 1";  /* Query for reading table data from database*/
            $banner_from_db = mysqli_query($db_connection, $get_banner_query);
            foreach ($banner_from_db as $banners) :
            ?>

              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4 offset-md-2">
                    <div class="slider_detail-box">
                      <h1>
                        <?= $banners['banner_sub_title'] ?>
                        <span>
                          <?= $banners['banner_title'] ?>
                        </span>
                      </h1>
                      <p>
                        <?= $banners['banner_detail'] ?>
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Buy now
                        </a>
                        <a href="" class="btn-2">
                          Contact
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="slider_img-box">
                      <img src="<?= $banners['image_location'] ?>" alt="">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?php
            endforeach;
        ?>

    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="front-end/images/about.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2 class="custom_heading">
              About Our Pets
              <span>
                Clinic
              </span>
            </h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since theLorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
            </p>
            <div>
              <a href="">
                About More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-2">

          <?php
          $get_service_head_query = "SELECT * from service_heads WHERE active_status = 1";
          $service_head_from_db = mysqli_query($db_connection, $get_service_head_query);
          // $after_assoc = mysqli_fetch_assoc($service_head_from_db);
          ?>
          <?php foreach ($service_head_from_db as $service_head) : ?>

            <h2 class="custom_heading">
              <?= $service_head['black_head'] ?> <span><?= $service_head['blue_head'] ?></span>
            </h2>

            <h6><?= $service_head['service_sub_head'] ?></h6>

          <?php endforeach ?>

          <div class="container layout_padding2">
            <div class="row">

              <?php
              $get_service_item_query = "SELECT * FROM service_items WHERE active_status = 1 ORDER BY id DESC";
              $service_item_from_db = mysqli_query($db_connection, $get_service_item_query);
              foreach ($service_item_from_db as $service_items) :
              ?>

                <div class="col-md-4">
                  <div class="img_box">
                    <img src="<?= $service_items['image_location'] ?>" alt="">
                  </div>
                  <div class="detail_box">
                    <h6>
                      <?= $service_items['service_item_head'] ?>
                    </h6>
                    <p>
                      <?= $service_items['service_item_detail'] ?>
                    </p>
                  </div>
                </div>

              <?php
              endforeach
              ?>

              <div class="col-md-4">
                <img src="front-end/images/tool.png" alt="" class="w-100">
              </div>
            </div>
          </div>
  </section>

  <!-- end service section -->

  <!-- gallery section -->
  <section class="gallery-section layout_padding">
    <div class="container">
      <h2>
        Our Gallery
      </h2>
    </div>
    <div class="container ">
      <div class="img_box box-1">
        <img src="front-end/images/g-1.png" alt="">
      </div>
      <div class="img_box box-2">
        <img src="front-end/images/g-2.png" alt="">
      </div>
      <div class="img_box box-3">
        <img src="front-end/images/g-3.png" alt="">
      </div>
      <div class="img_box box-4">
        <img src="front-end/images/g-4.png" alt="">
      </div>
      <div class="img_box box-5">
        <img src="front-end/images/g-5.png" alt="">
      </div>
    </div>
  </section>



  <!-- end gallery section -->

  <!-- buy section -->

  <section class="buy_section layout_padding">
    <div class="container">
      <h2>
        You Can Buy Pet From Our Clinic
      </h2>
      <p>
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
      </p>
      <div class="d-flex justify-content-center">
        <a href="">
          Buy Now
        </a>
      </div>
    </div>
  </section>

  <!-- end buy section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <h2 class="custom_heading text-center">
        What Say Our
        <span>
          clients
        </span>
      </h2>
      <p class="text-center">
        orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut la
      </p>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="front-end/images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="front-end/images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="front-end/images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>

  </section>
  <!-- end client section -->

  <!-- map section -->

  <section class="map_section">
    <div id="map" class="h-100 w-100 ">
    </div>

    <div class="form_container ">
      <div class="row">
        <div class="col-md-8 col-sm-10 offset-md-4">
          <?php
          if (isset($_SESSION['sent_success'])) {
          ?>
            <div class="alert alert-success" role="alert">
              <?php
              echo $_SESSION['sent_success'];
              unset($_SESSION['sent_success']);
              ?>
            </div>
          <?php
          }
          ?>
          <form action="guest_message_post.php" method="POST">
            <div class="text-center">
              <h3>
                Contact Us
              </h3>
            </div>
            <div>
              <input name='guest_name' type="text" placeholder="Name" class="pt-3">
            </div>
            <div>
              <input name='guest_email' type="email" placeholder="Email">
            </div>
            <div>
              <input name='guest_message' type="text" class="message-box" placeholder="Message">
            </div>
            <div class="d-flex justify-content-center">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </section>


  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="left-content">
            <span>Lorem ipsum dolor sit amet</span>
            <h2>Our solutions for your <em>business growth</em></h2>
            <p>Pellentesque ultrices at turpis in vestibulum. Aenean pretium elit nec congue elementum. Nulla luctus laoreet porta. Maecenas at nisi tempus, porta metus vitae, faucibus augue.
              <br><br>Fusce et venenatis ex. Quisque varius, velit quis dictum sagittis, odio velit molestie nunc, ut posuere ante tortor ut neque.
            </p>
            <a href="" class="filled-button">Read More</a>
          </div>
        </div>
        <div class="col-md-6 align-self-center">
          <div class="row">
            <div class="col-md-6">
              <div class="count-area-content">
                <div class="count-digit">945</div>
                <div class="count-title">Work Hours</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="count-area-content">
                <div class="count-digit">1280</div>
                <div class="count-title">Great Reviews</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="count-area-content">
                <div class="count-digit">578</div>
                <div class="count-title">Projects Done</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="count-area-content">
                <div class="count-digit">26</div>
                <div class="count-title">Awards Won</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- end map section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Location
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                +02 1234567890
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="front-end/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="front-end/js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"> -->
  </script>
  <!-- end google map js -->
</body>
</body>

</html>