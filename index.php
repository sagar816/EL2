
<!-- Start Including header  -->

<?php
include('./maininclude/header.php');
?>

<!-- End Including header  -->


  <!-- Start Video Background -->

  <div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
      <video playsinline autoplay muted loop>
        <source src="videos/homepagevid5.mp4">
      </video>
      <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
      <h1 class="my-content">Welcome to Referral System </h1><br>
      <small class="my-content display-6">Refer and Earn </small> <br><br>
      <?php
        if(!isset($_SESSION['is_login'])){
          echo '<a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#usrRegModalCenter"> Register </a>';
        } else {
          echo '<a href="user/userProfile.php" class="btn btn-primary mt-3">My Profile</a>';
        }
      ?>
      
    </div>
  </div>

  <!-- End Video Background -->


  <!-- Start Text Banner -->


  <!-- <div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fas fa-book-open mr-3"></i> 100* Online Cources </h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-users mr-3"></i> Expert Instructors </h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access </h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-solid fa-indian-rupee-sign"></i></i> Money Back Guarantee </h5>
      </div>
 </div>
</div> -->


  <!-- End Text Banner  -->


<!-- Start Including Footer  -->

<?php
include('./maininclude/footer.php');
?>

<!-- End Including Footer  -->