
  <!-- Start Footer -->
  <footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white"> Copyright &copy; 2023 || Designed by Decode Digital || <a href="#login"
        data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter"> Admin Login </a> </small>


    <!-- End Footer -->

    <!-- Start User Registration Modal  -->

    <!-- Modal -->
    <div class="modal fade" id="usrRegModalCenter" tabindex="-1" aria-labelledby="usrRegModalCenterLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="usrRegModalCenterLabel">User Registration</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Start User Registration Form  -->
           <?php include('userRegistration.php'); ?>
            <!-- End User Registration Form  -->
          </div>
          <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="btn btn-success" onclick="addusr()">Sign up</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>

    <!-- End User Registration Modal  -->

    <!-- Start User Login Modal  -->

    <!-- Modal -->
    <div class="modal fade" id="usrLoginModalCenter" tabindex="-1" aria-labelledby="usrLoginModalCenterLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="usrLoginModalCenterLabel">User Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Start  Login Form  -->


            <form id="usrLoginForm">
              <div class="mb-3">
                <label for="usrLogEmail" class="fw-bold form-label">Email address</label>
                <input type="email" class="form-control" id="usrLogEmail"
                  name="usrLogEmail" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="usrLogPass" class="form-label fw-bold">Password</label> <!-- 20 -->
                <input type="password" class="form-control" id="usrLogPass" name="usrLogPass" >
              </div>

            </form>
            <!-- End Login Form  -->
          </div>
          <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-success" id="usrLoginBtn" onclick="checkUsrLogin()">Login</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

          </div>
        </div>
      </div>
    </div>

    <!-- End User Login Modal  -->

    <!-- Start Admin Login Modal  -->

    <!-- Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="adminLoginModalCenterLabel">Admin Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


            <!-- Start Admin Login Form  -->
            <form id="adminLoginForm">
              <div class="mb-3">
                <label for="adminLogEmail" class="fw-bold form-label">Email address</label>
                <input type="email" class="form-control"  id="adminLogEmail"
                  name="adminLogEmail" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="adminLogPass" class="form-label fw-bold">Password</label> 
                <input type="password" class="form-control" id="adminLogPass" name="adminLogPass">
              </div>

            </form>
            <!-- End Admin Login Form  -->
          </div>
          <div class="modal-footer">
          <small id="statusAdminLogMsg"></small>
            <button type="button" class="btn btn-success" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

          </div>
        </div>
      </div>
    </div>

    <!-- End Admin Login Modal  -->

    <!-- Jquery and Bootstrap Javascript  -->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS  -->
    <script src="js/all.min.js"></script>

    <!-- User Ajax call Javascript  -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>

    <!-- Admin Ajax call Javascript  -->
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>

</body>

</html>