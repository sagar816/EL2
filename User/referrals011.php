<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
include('./usrInclude/header.php');

if(isset($_SESSION['is_login'])){
    $usrEmail = $_SESSION['usrLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM user WHERE usr_email='$usrEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$usrId = $row["usr_id"];
}

if(isset($_REQUEST['submitReferralBtn'])){
    if(($_REQUEST['refName'] = "")){
        // msg displayed if required field is missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $refName = $_REQUEST["refName"];
        
        $sql = "INSERT INTO referrals (ref_name, usr_id) VALUES ('$refName', '$usrId')";

        if($conn->query($sql) == TRUE) {
            //below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submitted Successfully </div>';
        } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit</div>';
        }
        }
    }
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="usrId">User ID </label>
            <input type="text" class="form-control" id="usrId" name="usrId" value=" <?php if(isset($usrId)) {echo $usrId;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="refName">Name </label>
            <input type="text" class="form-control" id="refName" name="refName">
        </div>
        <button type="submit" class="btn btn-primary" name="submitReferralBtn">Submit </button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>
</div>

</div> <!-- Close Row Div From Header file -->

<?php 
include('./usrInclude/footer.php');
?>