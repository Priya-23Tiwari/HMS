<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serenita Solare -ABOUT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="CSS/style.css">
  <?php require('inc/links.php'); ?>
  <style>
    .box {
      border-bottom-color: #ffa343 !important;
    }
  </style>

</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center"><span style="color: #ec8211;">ABOUT US</span></h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet,
      consectetur adipisicing elit. Dolore saepe hic ut dolorem <br> voluptas blanditiis voluptatem nobis!
      Eos, ducimus est?
    </p>
  </div>

  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4">
        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Voluptate officiis, ex ipsum dolorum corporis minima sit repellat! Ipsam.
          Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Voluptate officiis, ex ipsum dolorum corporis minima sit repellat! Ipsam.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4">
        <img src="images/about/aboutus.jpeg" class="w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-bottom border-4 text-center box">
          <img src="images/about/hotel.png" width="70px">
          <h4 class="mt-3">200+ Rooms</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-bottom border-4 text-center box">
          <img src="images/about/customers.svg" width="70px">
          <h4 class="mt-3">5000+ Customers</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-bottom border-4 text-center box">
          <img src="images/about/rating.svg" width="70px">
          <h4 class="mt-3">700+ Reviews</h4>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-bottom border-4 text-center box">
          <img src="images/about/staff.svg" width="70px">
          <h4 class="mt-3">400+ Staffs</h4>
        </div>
      </div>

    </div>
  </div>

  <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>

  <div class="container px-4">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <?php  
           $about_r = selectAll('team_detailss');
           $path=ABOUT_IMG_PATH;
           while($row = mysqli_fetch_assoc($about_r)){
            echo<<<data
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                   <img src="$path$row[picture]" class="w-100">
                   <h5 class="mt-2">$row[name]</h5>
                </div>
            data;

           }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


  <script>
    var swiper = new Swiper(".mySwiper", {

      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  </script>

</body>

</html>