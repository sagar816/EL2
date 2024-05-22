<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php; </script>";    
}


if(isset($_REQUEST['referralSubmitBtn'])){
    //Checking for empty fields
    if(($_REQUEST['referral_name'] == "") || ($_REQUEST['referral_contact'] == "") || ($_REQUEST['referral_email'] == "") || ($_REQUEST['referral_status'] == "") || ($_REQUEST['referral_points'] == "")){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all Fields </div>';
    } else {
    $referral_name = $_REQUEST['referral_name'];
    $referral_contact = $_REQUEST['referral_contact'];
    $referral_email = $_REQUEST['referral_email'];
    $referral_status = $_REQUEST['referral_status'];
    $referral_points = $_REQUEST['referral_points'];

    $sql = "INSERT INTO referrals (ref_name, ref_contact, ref_email, ref_status, ref_points) VALUES ('$referral_name', '$referral_contact', '$referral_email',  '$referral_status', '$referral_points') ";

    if($conn->query($sql) == TRUE) {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Referral Added Successfully</div> ';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Referral </div> ';
    }

    }
}
?>

<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Add New Referral</h3>
    <form action="" method="POST">
        <div class="mb-3">
         <label for="referral_name" class="form-label">Referral Name</label>
            <input type="text" class="form-control" id="referral_name" name="referral_name">
        </div>
        <div class="mb-3">
         <label for="referral_contact" class="form-label">Referral contact</label>
            <input type="text" class="form-control" id="referral_contact" name="referral_contact">
        </div>
        <div class="mb-3">
         <label for="referral_email" class="form-label">Referral email </label>
            <input type="email" class="form-control" id="erferral_email" name="referral_email">
        </div>
        <div class="mb-3">
         <label for="referral_status" class="form-label">Referral Status</label>
            <input type="text" class="form-control" id="referral_status" name="referral_status">
        </div>
        <div class="mb-3">
         <label for="referral_points" class="form-label">Referral Points</label>
            <input type="text" class="form-control" id="referral_points" name="referral_points">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="referralSubmitBtn" name="referralSubmitBtn">Submit</button>
            <a href="./referrals.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> <!--div row close from header -->
</div> <!-- div Container fluid close from header --> 

<?php
include('./admininclude/footer.php');
?>