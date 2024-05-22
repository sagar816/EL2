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

?>


<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-3">Referrals</p>
    <?php
        $sql = "SELECT * FROM referrals";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead class="table">
            <tr>                
                <th scope="col">Ref Name</th>
                <th scope="col">Ref Contact</th>
                <th scope="col">Ref Email</th>
                <th scope="col">Ref Status</th>
                <th scope="col">Ref Points</th>
                <th scope="col">User Name</th>
                <th scope="col">Actions</th>
                <th scope="col">Update Status</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){ 
            echo ' <tr>';
            echo ' <th scope="row">'.$row['ref_name'].'</th>';  //column ka name - got through db
            echo '<td>'.$row['ref_contact'].'</td>';
            echo ' <td>'.$row['ref_email'].'</td>';
            echo ' <td>'.$row['ref_status'].'</td>';
            echo ' <td>'.$row['ref_points'].'</td>';
            echo ' <td>'.$row['usr_name'].'</td> ';
            echo '  <td>';
            echo '
                <form action="editReferral.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["ref_id"].'>
                    <button
                    type="submit"
                    class="btn btn-info mr-3"
                    name="view"
                    value="View"
                    >
                    <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </form>

                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["ref_id"].'>
                <button
                    type="submit"
                    class="btn btn-danger"
                    name="delete"
                    value="Delete"
                >
                <i class="fa-solid fa-trash"></i>
                </button>
                </form>
                </td>';
                echo '  <td>';
                echo '
                <form action="updateStatus.php" method="POST" class="d-inline">
                <input type="hidden" name="idu" value='.$row["ref_id"].'>
                    <button
                    type="submit"
                    class="btn btn-info mr-3"
                    name="viewu"
                    value="Viewu"
                    >
                    View 
                    </button>
                </form>     
            </tr>';
         } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Results ";
    } 
    
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM referrals WHERE ref_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
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
include('./admininclude/footer.php');
?>