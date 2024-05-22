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


//update code
if(isset($_REQUEST['requpdate'])){
    //Checking for empty fields
    if(($_REQUEST['referral_name'] == "") || ($_REQUEST['referral_contact'] == "")  || ($_REQUEST['referral_email'] == "") || ($_REQUEST['referral_status'] == "") || ($_REQUEST['referral_points'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields </div>';
    } else {
        $rid = $_REQUEST['referral_id'];
        $rname = $_REQUEST['referral_name'];
        $rcontact = $_REQUEST['referral_contact'];
        $remail = $_REQUEST['referral_email'];
        $rstatus = $_REQUEST['referral_status'];
        $rpoints = $_REQUEST['referral_points'];

        if($rpoints == "1000"){
            $sql = "UPDATE referrals SET ref_id = '$rid', ref_name = '$rname', ref_contact = '$rcontact', ref_email = '$remail', ref_status = '$rstatus', ref_points = '$rpoints', enrolled_ts = NOW() WHERE ref_id= '$rid'";
        } else if ($rpoints == "2000"){
            $sql = "UPDATE referrals SET ref_id = '$rid', ref_name = '$rname', ref_contact = '$rcontact', ref_email = '$remail', ref_status = '$rstatus', ref_points = '$rpoints', docs_rcvd_ts = NOW() WHERE ref_id= '$rid'";
        } else if ($rpoints == "3000"){
            $sql = "UPDATE referrals SET ref_id = '$rid', ref_name = '$rname', ref_contact = '$rcontact', ref_email = '$remail', ref_status = '$rstatus', ref_points = '$rpoints', in_progress_ts = NOW() WHERE ref_id= '$rid'";
        } else if ($rpoints == "5000") {
            $sql = "UPDATE referrals SET ref_id = '$rid', ref_name = '$rname', ref_contact = '$rcontact', ref_email = '$remail', ref_status = '$rstatus', ref_points = '$rpoints',completed_ts = NOW() WHERE ref_id= '$rid'";
        }
    if($conn -> query($sql) == TRUE){ 
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update </div>';
    }
}
}
?>

<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Update Referral Details</h3>

    <?php
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM referrals WHERE ref_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form action="" method="POST">
        <div class="mb-3">
         <label for="referral_id" class="form-label">Referral ID</label>
            <input type="text" class="form-control" id="referral_id" name="referral_id" 
            value = "<?php if(isset($row['ref_id']) ){ echo $row['ref_id']; } ?>" readonly >
        </div>
        <div class="mb-3">
         <label for="referral_name" class="form-label">Referral Name</label>
            <input type="text" class="form-control" id="referral_name" name="referral_name" 
            value = "<?php if(isset($row['ref_name']) ){ echo $row['ref_name']; } ?>" >
        </div>
        <div class="mb-3">
         <label for="referral_contact" class="form-label">Referral contact</label>
            <input type="text" class="form-control" id="referral_contact" name="referral_contact"
            value = "<?php if(isset($row['ref_contact']) ){ echo $row['ref_contact']; } ?>">
        </div>
        <div class="mb-3">
         <label for="referral_email" class="form-label">Referral email </label>
            <input type="email" class="form-control" id="rerferral_email" name="referral_email"
            value = "<?php if(isset($row['ref_email']) ){ echo $row['ref_email']; } ?>">
        </div>
        <!-- <div class="mb-3">
         <label for="referral_status" class="form-label">Referral Status</label>
            <input type="text" class="form-control" id="referral_status" name="referral_status"
            value = "<?php// if(isset($row['ref_status']) ){ echo $row['ref_status']; } ?>">
        </div> -->
        <div class="mb-3">
         <label for="referral_status" class="form-label">Referral Status</label>
            <!-- <input type="text" class="form-control" id="referral_status" name="referral_status"> -->
            <select class="form-select" aria-label="Default select example" id="referral_status" name="referral_status">
            <option selected><?php if(isset($row['ref_status']) ){ echo $row['ref_status']; } ?></option>
            <option value="Enrolled">Enrolled</option>
            <option value="Document Recieved">Document Recieved</option>
            <option value="In-Progress">In-Progress</option>
            <option value="Completed">Completed</option>
            </select>
        </div> 
        <div class="mb-3">
         <label for="referral_points" class="form-label">Referral Points</label>
            <!-- <input type="text" class="form-control" id="referral_status" name="referral_status"> -->
            <select class="form-select" aria-label="Default select example" id="referral_points" name="referral_points">
            <option selected><?php if(isset($row['ref_points']) ){ echo $row['ref_points']; } ?></option>
            <option value="1000">Enrolled: 1000</option>
            <option value="2000">Document Recieved: 2000</option>
            <option value="3000">In-Progress: 3000</option>
            <option value="5000">Completed: 5000</option>
            </select>
        </div>          
        <!-- <div class="mb-3">
         <label for="referral_points" class="form-label">Referral Points</label>
            <input type="text" class="form-control" id="referral_points" name="referral_points"
            value = "<?php // if(isset($row['ref_points']) ){ echo $row['ref_points']; } ?>" >
        </div> -->
        <!-- <div class="mb-3">
         <label for="referral_points" class="form-label">Referral Points</label>
            <input type="text" class="form-control" id="referral_points" name="referral_points"
            value = "<?php //if($row['ref_status'] == "sam" ){ echo $row['ref_points']; } ?>" >
        </div> -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary me-md-3" id="requpdate" name="requpdate">Update</button>
            <a href="./referrals.php" class="btn btn-danger ">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> <!--div row close from header -->
</div> <!-- div Container fluid close from header --> 


<?php
include('./admininclude/footer.php');
?>