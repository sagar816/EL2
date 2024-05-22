<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
include('./usrInclude/header.php');

if(isset($_SESSION['is_login'])){
    $usrEmail = $_SESSION['usrLogEmail'];
    $userId=  $_SESSION['usrId'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

if(isset($_REQUEST['usrPassUpdateBtn'])){
    if(($_REQUEST['usrNewPass'] == "")){
        // msg displayed if required field is missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {        
        $sql = "SELECT * FROM user WHERE usr_id = '$userId' ";
        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $usrPass = $_REQUEST['usrNewPass'];
            $sql = "UPDATE user SET usr_pass = '$usrPass' WHERE usr_id = '$userId' ";       

        if($conn->query($sql) == TRUE) {
            //below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
        }
    }
}
?>

<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value= " <?php echo $usrEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password </label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="usrNewPass">
                </div>
                <div>
                <button type="submit" class="btn btn-primary mr-4 mt-4" name="usrPassUpdateBtn"> Update </button>
                <buttom type="reset" class="btn btn-secondary mt-4"> Reset </button>
                </div>
                <?php  if(isset($passmsg)) {echo $passmsg; } ?>
            </form>            
        </div>
       
    </div>
</div>

</div> <!-- Close row div from header file -->

<?php 
include('./usrInclude/footer.php');
?>