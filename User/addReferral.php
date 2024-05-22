<?php
if(!isset($_SESSION)){
    session_start();
}

include('./usrInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $usrEmail = $_SESSION['usrLogEmail'];
    $userId=  $_SESSION['usrId'];
} else {
    echo "<script> location.href='../index.php; </script>";    
}

$sql = "SELECT * FROM user WHERE usr_id='$userId' ";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $usrEmail = $row["usr_email"];
    $usrName = $row["usr_name"];
    $usrId = $row["usr_id"];
}


if(isset($_REQUEST['referralSubmitBtn'])){
    //Checking for empty fields
    if(($_REQUEST['referral_name'] == "") || ($_REQUEST['referral_contact'] == "") || ($_REQUEST['referral_email'] == "")){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all Fields </div>';
    } else {
    $referral_name = $_REQUEST['referral_name'];
    $referral_contact = $_REQUEST['referral_contact'];
    $referral_email = $_REQUEST['referral_email'];
    $user_email = $_REQUEST['user_email'];
    $user_name = $_REQUEST['user_name'];
    $user_id = $_REQUEST['id'];
    // $referral_status = $_REQUEST['referral_status'];
    // $referral_points = $_REQUEST['referral_points'];

    $sql = "INSERT INTO referrals (ref_name, ref_contact, ref_email, usr_email, usr_name, usr_id) VALUES ('$referral_name', '$referral_contact', '$referral_email', '$user_email', '$user_name', $user_id) ";

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
         <label for="user_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" 
            value = "<?php if(isset($row['usr_name']) ){ echo $row['usr_name']; } ?>" readonly >
        </div>
        <div class="mb-3">
         <label for="user_id" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="user_email" name="user_email" 
            value = "<?php if(isset($row['usr_email']) ){ echo $row['usr_email']; } ?>" readonly >
        </div>
        <div class="mb-3">
         <label for="referral_name" class="form-label">Referral Name</label>
            <input type="text" class="form-control" id="referral_name" name="referral_name">
        </div>
        <div class="mb-3">
         <label for="referral_email" class="form-label">Referral email </label>
            <input type="email" class="form-control" id="rerferral_email" name="referral_email">
        </div>
        <div class="mb-3">
         <label for="referral_contact" class="form-label">Referral contact</label>
            <input type="text" class="form-control" id="referral_contact" name="referral_contact">
        </div>
        <div class="mb-3">
        <input type="hidden" name="id" value = "<?php echo $usrId ?>" >
        </div>
       
        <!-- <div class="mb-3">
         <label for="referral_status" class="form-label">Referral Status</label>
            <input type="text" class="form-control" id="referral_status" name="referral_status">
        </div>
        <div class="mb-3">
         <label for="referral_points" class="form-label">Referral Points</label>
            <input type="text" class="form-control" id="referral_points" name="referral_points">
        </div> -->
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
include('./usrInclude/footer.php');
?>