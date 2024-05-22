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
$count_ref = $result1->num_rows;

$sql = "SELECT * FROM user";
$result2 = $conn->query($sql);
$count_user = $result2->num_rows;

?>



<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Users </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $count_user ?>
                    </h4>
                    <!-- <a class="btn text-white" href="#"> View </a> -->
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Referrals </div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $count_ref ?>
                    </h4>
                    <!-- <a class="btn text-white" href="#"> View </a> -->
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem; color:red;">
                <div class="card-header">Successful referrals</div>
                <div class="card-body">
                    <h4 class="card-title">
                        0
                    </h4>
                    <!-- <a class="btn text-white" href="#"> View </a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-3">Referrals</p>
    <?php
        $sql = "SELECT * FROM referrals";
        $result = $conn->query($sql);
        $count_ref = $result1->num_rows;
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
                <!-- <th scope="col">Actions</th> -->
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
            // echo '  <td>';
            // echo '
            //     <form action="editReferral.php" method="POST" class="d-inline">
            //     <input type="hidden" name="id" value='.$row["ref_id"].'>
            //         <button
            //         type="submit"
            //         class="btn btn-info mr-3"
            //         name="view"
            //         value="View"
            //         >
            //         <i class="fa-solid fa-pen-to-square"></i>
            //         </button>
            //     </form>

            //     <form action="" method="POST" class="d-inline">
            //     <input type="hidden" name="id" value='.$row["ref_id"].'>
            //     <button
            //         type="submit"
            //         class="btn btn-danger"
            //         name="delete"
            //         value="Delete"
            //     >
            //     <i class="fa-solid fa-trash"></i>
            //     </button>
            //     </form>
            //     </td>     
            // </tr>';
         } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Results ";
    } 
    ?>
    </div>
    </div>

</div> <!-- div row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
include('./admininclude/footer.php');
?>