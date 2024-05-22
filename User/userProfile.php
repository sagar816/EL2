<?php
if(!isset($_SESSION)){
    session_start();
}

include('./usrInclude/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $usrEmail = $_SESSION['usrLogEmail'];
    $userId =  $_SESSION['usrId'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM user WHERE usr_id='$userId'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
// $usrId = $row["usr_id"];
$usrName = $row["usr_name"];
$usrOcc = $row["usr_occ"];
$usrImg = $row["usr_img"];
// echo $usrImg;    
}

if(isset($_REQUEST['updateUsrNameBtn'])){
    if(($_REQUEST['usrName'] == "")){
        // msg displayed if required field is missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $usrName = $_REQUEST["usrName"];
        $usrOcc = $_REQUEST["usrOcc"];
        $usr_image = $_FILES['usrImg']['name'];
        $usr_image_temp = $_FILES['usrImg']['tmp_name'];
        $img_folder = '../images/usr/'.$usr_image;
        move_uploaded_file($usr_image_temp, $img_folder);
        
        $sql = "UPDATE user SET usr_name = '$usrName', usr_occ = '$usrOcc', usr_img = '$img_folder' WHERE usr_email = '$usrEmail' ";

        if($conn->query($sql) == TRUE) {
            //below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
        }
    }
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="usrName"> Name </label>
            <input type="text" class="form-control" id="usrName" name="usrName" value = "<?php if(isset($usrName)) {echo $usrName;}?>" >
        </div>
        <div class="form-group">
            <label for="usrEmail">Email</label>
            <input type="email" class="form-control" id="usrEmail" name="usrEmail" value= "<?php echo $usrEmail ?>" readonly>
        </div>
        <div class="form-group">
            <label for="usrOcc"> Occupation </label>
            <input type="text" class="form-control" id="usrOcc" name="usrOcc" value= "<?php if(isset($usrOcc)) {echo $usrOcc;} ?>" >
        </div>
        <div class="form-group">
            <label for="usrImg"> Upload Image </label>
            <input type="file" class="form-control-file" id="usrImg" name="usrImg">
        </div>
        <!-- <div class="mb-3 mt-3">
             <label for="usrImg" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="usrImg" name="usrImg">
        </div> -->
        <button type="submit" class="btn btn-primary" name="updateUsrNameBtn">Update </button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>
</div>

</div> <!-- Close Row Div from header file -->

<?php 
include('./usrInclude/footer.php');
?>