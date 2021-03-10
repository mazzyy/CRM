<?php

include("inc/db.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM | Login </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>CR</b>M</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->

            <a href="forgot-password.php">I forgot my password</a>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btn_login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

   <!--    <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      /.social-auth-links -->

      <?php

    if(isset($_POST['btn_login'])){
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        
        if($username && $password){
		$query = mysqli_query($conn, "select u_id,emp_id,u_name,u_pass,des_id from tbl_users INNER JOIN employess ON tbl_users.emp_id = employess.id where u_name ='$username'");
		$numrow = mysqli_num_rows($query);
		if($numrow !=0){
			while($row = mysqli_fetch_assoc($query)){
                
				$db_userid = $row['u_id'];
        $db_username = $row['u_name'];
				$db_password = $row['u_pass'];
				$db_role = $row['des_id'];
				$db_emp_id = $row['emp_id'];
			}
            if($username == $db_username && $password == $db_password)
            {
              $_SESSION['u_id']= $db_userid;    
              $_SESSION['u_name']= $db_username;
				      $_SESSION['des_id']= $db_role;
              $_SESSION['emp_id']= $db_emp_id;

                echo '<script type="text/javascript">
  				 	swal("", "Login Successfully", "success");
             </script>';
             
             echo "<script>window.location.assign('new.php')</script>";
               

          //       if($db_role == "agent"){
					
          //           	echo '<script type="text/javascript">
  				// 	swal("", "Login Agent", "success");
  				// 	</script>';
					
					// echo "<script>window.location.assign('dashboard.php')</script>";
                    
                    
          //     }
          //     else{
          //       echo '<script type="text/javascript">
          //       swal("", "Login Admin", "success");
          //       </script>';
              
          //     echo "<script>window.location.assign('admin/index.php')</script>";
          //     }
                
            }
            else{
				        echo "<script>alert('incorrect username and password')</script>";
			      }
    }
            else{
                echo "<script>alert('user not exists')</script>";
            }
    }
        
        
    }


?>



   

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
</body>
</html>
