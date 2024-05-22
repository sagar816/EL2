<?php
include_once('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $usrLogEmail = $_SESSION['usrLogEmail'];
    $userId=  $_SESSION['usrId'];
}
//else {
    // echo "<script> location.href='../index.php'; </script>";
// }
if(isset($usrLogEmail)){
    $sql = "SELECT usr_img FROM user WHERE usr_id = '$userId'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $usr_img = $row['usr_img'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
  
  <link rel="stylesheet" href="../css/style.css">

   <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="../css/usrstyle.css">

  <title>Profile</title>

</head>

<body>
<!-- Top navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userProfile.php">Referral System </a>
    </nav>

<!-- Side Bar --> 
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img src="<?php echo $usr_img ?>" alt="userimage" class="img-thumbnail rounded-circle">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userProfile.php">
                        <i class="fas fa-user"></i>
                        Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="referrals.php">
                        <i class="fa-solid fa-user-group"></i>
                            My Referrals
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userChangePass.php">
                        <i class="fa-solid fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>






