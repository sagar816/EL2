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

$sql = "SELECT * FROM referrals";
$result1 = $conn->query($sql);

?>

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-3"> Update Status Time Stamp Details </p>
    <?php
    if(isset($_REQUEST['viewu'])){
        $sql = "SELECT * FROM referrals WHERE ref_id = {$_REQUEST['idu']}";
        $result = $conn->query($sql);
    }
    ?>
    <table class="table">
        <thead class="table">
            <tr>                
                <th scope="col">Ref Name</th>
                <th scope="col">Ref Email</th>
                <th scope="col">Enrolled</th>
                <th scope="col">Document Recieved</th>
                <th scope="col">In Progress</th>
                <th scope="col">Completed</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){ 
            echo '<tr>';
            echo ' <th scope="row">'.$row['ref_name'].'</th>';  //column ka name - got through db
            echo ' <td>'.$row['ref_email'].'</td>';
            echo ' <td>'.$row['enrolled_ts'].'</td>';
            echo ' <td>'.$row['docs_rcvd_ts'].'</td>';
            echo ' <td>'.$row['in_progress_ts'].'</td>';
            echo ' <td>'.$row['completed_ts'].'</td>
            </tr>';
         } ?>
        </tbody>
    </table>
</div>


<?php
include('./admininclude/footer.php');
?>