<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <title>Referral System</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark ps-5 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Referral System</a>
      <!-- <span class="navbar-text">Refer and Earn</span> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-nav ps-5">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <?php
            session_start();
            if(isset($_SESSION['is_login'])){
              echo '<li class="nav-item custom-nav-item"><a href="user/userProfile.php" class="nav-link">My Profile</a></li>   
              <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
            } else {
              echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
              data-bs-target="#usrLoginModalCenter">Login</a></li>
              <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
              data-bs-target="#usrRegModalCenter">SignUp</a></li>';
            }
          ?>
          
        
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->