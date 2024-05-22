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

?>


<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-3">My Referrals</p>
    <?php
        $sql = "SELECT * FROM referrals WHERE usr_id='$userId' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead class="table">
            <tr>                
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Points</th>
                <th scope="col">Redeem Request</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){ 
            echo '<tr>';
            echo ' <th scope="row">'.$row['ref_name'].'</th>';  //column ka name - got through db
            echo ' <td>'.$row['ref_contact'].'</td>';
            echo ' <td>'.$row['ref_email'].'</td>';
            echo ' <td>'.$row['ref_status'].'</td>';
            echo ' <td>'.$row['ref_points'].'</td>';
            echo '  <td>';
            echo '
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["ref_id"].'>
                <button
                    type="submit"
                    class="btn btn-info mx-3"
                    name="redreq"
                    value="redreq"
                >
                Request
                </button>
                </form>
                 </td>     
            </tr>';
         } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Results ";
    } 
    
    if(isset($_REQUEST['redreq'])){
        $rid = $_REQUEST['id'];
        $sql = "UPDATE referrals SET red_req = '1' WHERE ref_id= '$rid'";
        $conn -> query($sql) == TRUE;       
    }
    
    
    ?>
</div>
</div>


<!-- div Row CLose from header -->
<div>
    <a class="btn btn-info box" href="./addReferral.php">Add Referral  <i class="fas fa-plus a-2x"></i></a>
</div>
</div>
<!-- div Container - fluid close from header --> 


<?php
include('./usrInclude/footer.php');
?>