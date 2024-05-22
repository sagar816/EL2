//Ajax call for Admin Login Verification

function checkAdminLogin() {
    // console.log("Login Clicked");
    var adminLogEmail = $("#adminLogEmail").val();
    var adminLogPass = $("#adminLogPass").val();
    $.ajax({
        url: "Admin/admin.php",
        method: "POST",
        data: {
            checkLogemail: "checklogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success: function (data) {
            //  console.log(data);
            if (data == 0) {
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-danger">Invalid Email Id or Password ! </small>'
                );
            } else if (data == 1) {
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-success">Success Loading ... </small>'
                );
                setTimeout(() => {
                    window.location.href = "Admin/adminDashBoard.php";
                }, 1000);
            }
        },
    });
}