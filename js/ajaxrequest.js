function addusr() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    let usrname = $("#usrname").val();
    let usrEmail = $("#usrEmail").val();
    let usrPass = $("#usrPass").val();
    // console.log(usrname)
    // console.log(usrEmail)
    // console.log(usrPass)
// Now need to send this data which came in this variables to server database using 

// Checking Form Fields on Form Submission
if (usrname.trim() == ""){
    $("#statusMsg1").html(
        '<small style="color:red;">Please Enter Name !</small>'
    );
    $("#usrname").focus();
    return false;
} else if (usrEmail.trim() == ""){
    $("#statusMsg2").html(
        '<small style="color:red;">Please Enter Email !</small>'
    );
    $("#usrEmail").focus();
    return false;
} else if (usrEmail.trim() !== "" && !reg.test(usrEmail)){
    $("#statusMsg2").html(
        '<small style="color:red;">Please Enter Valid Email ! (e.g: example@mail.com) </small>'
    );
    $("#usrEmail").focus();
    return false;
} else if (usrPass.trim() == ""){
    $("#statusMsg3").html(
        '<small style="color:red;">Please Enter Password !</small>'
    );
    $("#usrPass").focus();
    return false;
} else {
    $.ajax({
        url:'User/adduser.php',
        method: 'POST',
        dataType: "json",
        data:{
            usrsignup: "usrsignup",
            usrname: usrname,
            usrEmail: usrEmail,
            usrPass: usrPass,
        },
        success:function(data){
            console.log(data);
            if(data == "OK"){
                $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>")
                clearUsrRegField();
            } else if (data == "Failed") {
                $("#successMsg").html("<span class='alert alert-danger'>Unable to Register</span>");
            }
        }
    })
}
}

//Empty All Fields

function clearUsrRegField() {
    $("#usrRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

//Ajax call for User Login Verification

function checkUsrLogin() {
    // console.log("Login Clicked");
    var usrLogEmail = $("#usrLogEmail").val();
    var usrLogPass = $("#usrLogPass").val();
    $.ajax({
        url: "User/adduser.php",
        method: "POST",
        data: {
            checkLogemail: "checklogmail",
            usrLogEmail: usrLogEmail,
            usrLogPass: usrLogPass,
        },
        success: function(data) {
            console.log(data);
            if (data == 0) {
                $("#statusLogMsg").html(
                    '<small class="alert alert-danger">Invalid Email Id or Password ! </small>'
                );
            } else if (data == 1 ) {
                $("#statusLogMsg").html(
                    '<div class="spinner-border text-success" role="status"></div>'
                );
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1000);
            }
        },
    });
}