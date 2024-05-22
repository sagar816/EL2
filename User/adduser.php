<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
if(isset($_POST['usrsignup']) && isset($_POST['usrname']) && isset($_POST['usrEmail']) && isset($_POST['usrPass'])){

    $usrname = $_POST['usrname'];
    $usremail = $_POST['usrEmail'];
    $usrpass = $_POST['usrPass'];

    $sql = "INSERT INTO user(usr_name, usr_email, usr_pass) VALUES('$usrname', '$usremail', '$usrpass')";

    if($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

// User Login Verification

if(!isset($_SESSION['is_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['usrLogEmail']) && isset($_POST['usrLogPass']) ){
    $usrLogEmail = $_POST['usrLogEmail'];
    $usrLogPass = $_POST['usrLogPass'];

    $sql = "SELECT usr_email, usr_pass, usr_id FROM user WHERE usr_email = '".$usrLogEmail."' AND usr_pass = '".$usrLogPass."' ";

    $result = $conn->query($sql);

    $row = $result->num_rows;

    if($row === 1){
        $userData = $result->fetch_assoc();
        $_SESSION['is_login'] = TRUE;
        $_SESSION['usrLogEmail'] = $usrLogEmail;
        $_SESSION['usrId'] = $userData['usr_id'];
        echo json_encode($row);
    } else if ($row === 0){
        echo json_encode($row);
    }
    }
}
?>