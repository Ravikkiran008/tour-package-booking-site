<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="ISO-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="css/signup.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;width:100%;height:80px;">
    <div class="container-fluid" style="background-color: #e3f2fd; width:85%">
      <a class="navbar-brand" href="#">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php" style="font-weight:bolder;font-size:larger;">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage_users.php" style="font-weight:bolder;font-size:larger;">Users</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="manage_bookings.php" style="font-weight:bolder;font-size:larger;">Bookings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage_packages.php" style="font-weight:bolder;font-size:larger;">Packages</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="insert_country.php" style="font-weight:bolder;font-size:larger;">Country</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php" style="font-weight:bolder;font-size:larger;">Logout</a>
          </li>



        </ul>
      </div>
    </div>
  </nav>
</body>

</html>