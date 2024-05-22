<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<!-- Bootstap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">


<!-- Fonr Awesome CSS -->

<link rel="stylesheet" href="../css/all.min.css">


<!-- Google Font -->

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<!-- Custom Css -->
<link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php"> Referral System <span class="fs-4 fw-lighter text-info text-decoration-underline">Admin Area</span></a>   
    </nav>  

<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top: 40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">                        
                        <a class="nav-link" href="adminDashboard.php">
                        <i class="fa-solid fa-gauge"></i>
                            Dashboard
                        </a>
                    </li>
                  <!--  <li class="nav-item">                        
                        <a class="nav-link" href="users.php">
                        <i class="fa-solid fa-users"></i>
                            Users
                        </a>
                    </li> -->
                    <li class="nav-item">                        
                        <a class="nav-link" href="referrals.php">
                        <i class="fa-solid fa-users-viewfinder"></i>
                            Referrals
                        </a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" href="redeempoints.php">
                        <i class="fa-solid fa-crown"></i>
                            Redeem Points
                        </a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" href="../logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>