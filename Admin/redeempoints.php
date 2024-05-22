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


//points redeem code
if(isset($_REQUEST['pointsredeem'])){
        $rid = $_REQUEST['id'];
        $rpoints = '0';

        $sql = "UPDATE referrals SET ref_points = '$rpoints', red_req = '0' WHERE ref_id= '$rid'";
        if($conn -> query($sql) == TRUE){ 
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Accepted Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Accept </div>';
        }
    }
?>

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-3">Reedeems requested</p>
    <?php
        $sql = "SELECT * FROM referrals WHERE red_req = '1' " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead class="table">
            <tr> 
                <th scope="col">User Name</th>               
                <th scope="col">Ref Name</th>
                <th scope="col">Ref Contact</th>
                <th scope="col">Ref Email</th>
                <th scope="col">Ref Status</th>
                <th scope="col">Ref Points</th>               
                <th scope="col">Redeem Request</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){ 
            echo ' <tr>';
            echo ' <th scope="row">'.$row['usr_name'].'</th> ';
            echo ' <td>'.$row['ref_name'].'</td>';  //column ka name - got through db
            echo ' <td>'.$row['ref_contact'].'</td>';
            echo ' <td>'.$row['ref_email'].'</td>';
            echo ' <td>'.$row['ref_status'].'</td>';
            echo ' <td>'.$row['ref_points'].'</td>';            
            echo ' <td>';
            echo '
                <form action="" method="POST">
                <input type="hidden" name="id" value='.$row["ref_id"].'>
                    <button
                    type="submit"
                    class="btn btn-info mx-4"
                    name="pointsredeem"
                    value="pointsredeem"
                    >
                   Accept
                    </button>
                </form>
                </td>     
            </tr>';
         } ?>
         <?php if(isset($msg)) {echo $msg;} ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Results ";
    }   
    
    ?>
</div>
</div>


<!-- div Row CLose from header -->

</div>
<!-- div Container - fluid close from header --> 

















<?php
include('./admininclude/footer.php');
?>