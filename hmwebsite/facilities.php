<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serenita Solare -FACILITIES</title>
  <link rel="stylesheet" href="CSS/style.css">
  <?php require('inc/links.php'); ?>
  <style>
    .pop:hover{
      border-bottom-color: #ffa343 !important;
      transform: scale(1.05);
      transition: all 0.3s;
    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center"><span style="color: #ec8211;">OUR FACILITIES</span></h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet,
      consectetur adipisicing elit. Dolore saepe hic ut dolorem <br> voluptas blanditiis voluptatem nobis!
      Eos, ducimus est?
    </p>
  </div>
  <div class="container">
    <div class="row">

      <?php 
          $res = selectAll('facilities');
          $path = FACILITIES_IMG_PATH;

          while($row = mysqli_fetch_assoc($res)){
            echo<<<data
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-bottom border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                       <img src="$path$row[icon]" width="40px">
                       <h5 class="m-0 ms-3">$row[name]</h5>
                    </div>
                   <p>
                     $row[description]
                   </p>
                </div>
              </div>
            data;
          }
      ?>
      
    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>
</html>