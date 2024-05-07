<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include ('header.php');
  ?>

  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/w1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1"
            style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">Book Trip
            In Minutes</p>
          <button type="button" class="btn btn-secondary btn-lg"><a href="package-list.php"
              style='text-decoration:none;color:white'>Explore packages</a></button>

        </div>
      </div>
      <div class="carousel-item">
        <img src="images/w5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="color:black">USA</p>
          <button type="button" class="btn btn-secondary btn-lg"><a href="usa_package_list.php"
              style='text-decoration:none;color:white'>Explore packages</a></button>

        </div>
      </div>
      <div class="carousel-item">
        <img src="images/w4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-size:900">Switzerland</p>
          <button type="button" class="btn btn-secondary btn-lg"><a href="switzerland_package_list.php"
              style='text-decoration:none;color:white'>Explore packages</a></button>
        </div>
      </div>
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div><br><br>

  <figure class="text-center">
    <blockquote class="blockquote">
      <h2>Top Destinations</h2>
    </blockquote>
  </figure>


  <div class="container">
    <div class="row">
      <?php

      include ('user_config.php');
      $sql = "SELECT * FROM country";
      $results = $conn->query($sql);
      $country_package_list_pages = array(
        'India' => 'India_package_list.php',
        'USA' => 'USA_package_list.php',
        'Paris' => 'paris_package_list.php',
        'London' => 'London_package_list.php',
        'Switzerland' => 'Switzerland_package_list.php',
        'Dubai' => 'dubai_package_list.php'
      );

      if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) { ?>

          <?php $country_name = $row['country_name'];
          $package_list_page = isset($country_package_list_pages[$country_name]) ? $country_package_list_pages[$country_name] : 'package_list.php'; ?>

          <div class="col-md-4 mb-3">
            <div class="card h-100">
              <a href="<?php echo $package_list_page; ?>">
                <img src="admin/pacakgeimages/<?php echo ($row["country_image"]); ?>" alt="..." height='200px' width='354px'
                  style="border-radius:2px">
              </a>
              <div class="card-body" style="text-align:center;margin:auto;">
                <h5 style="text-align:center;margin:auto;">
                  <a style="text-decoration:none;color:black;" href="<?php echo $package_list_page; ?>">
                    <?php echo $country_name; ?>
                  </a>
                </h5>
              </div>

            </div>
          </div>

        <?php }
      }
      ?>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <?php include ('footer.php') ?>
</body>

</html>