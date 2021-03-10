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
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon"> 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

  <link rel="stylesheet" type="text/css" href="plugins/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="plugins/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/util (2).css">
    <link rel="stylesheet" type="text/css" href="dist/css/util.css">
    <link rel="stylesheet" type="text/css" href="dist/css/main (2).css">
  <link rel="stylesheet" type="text/css" href="dist/css/main.css">
</head>
<style>
  body{
    height:100;
   background: linear-gradient(rgb(1 51 86 / 99%), rgb(5 162 228 / 0%));
  }
.qwerty{
  height:100%;
   
 

    background: linear-gradient(rgb(0 71 123 / 99%), rgb(0 173 238 / 74%)), url(inc/background.png)!important
}
button{



}

button:hover{


  color: white;
 
  border-style: solid;
  
  border-image: 
    linear-gradient(
      to bottom, 
      #17a2b8, 
      rgba(0, 0, 0, 0)
    ) 1 100%;
    }

.shadows{
     height: 1px;
       margin: 0 5rem 0 5rem;
    background: #2685ae;
    box-shadow: 3px 3px 7px 2px #0a070770, -2em 6px 7em 2px #4e4e495e;
}
    .pading{
      margin-left :2rem;
    }
  .rotate {
  animation: rotation 8s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
 </style>
<body class="hold-transition">
  <div class="container-fluid qwerty" >
  <!-- /.login-logo -->
  <!-- <div class="card card-outline card-primary" >
    <div class="card-header text-center" style="background-color:#2a3f54!important;color:white">
      <a href="index.php" class="h1"><b>CR</b>M</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" >
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
          <div class="col-8"> -->
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->

           <!--  <a href="forgot-password.php">I forgot my password</a>

          </div> -->
          <!-- /.col -->
         <!--  <div class="col-4">
            <button type="submit" name="btn_login" class="btn btn-info btn-block"style=" float: right;  background-color:#000000!important; border-width:thick " >Sign In</button>
          </div> -->
          <!-- /.col -->
       <!--  </div>
      </form> -->

   <!--    <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      /.social-auth-links -->


   
      <div class="wrap-login100 p-t-90 p-b-100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="dist/img/Untitled-5.png" class="rotate" alt="IMG">
           <img src="dist /img/Untitled-4.png" class="pading" alt="IMG">
            <div class="shadows">
            </div>
        </div>

        <form class=" p-t-110 login100-form validate-form" method="post">
          
<div class=" validate-input m-b-16" data-validate="Please enter Username">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
            <span class="btn-show-pass">
              <i class="fa fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="btn_login">
              Login
            </button>
          </div>
</form>
</div>


      <?php

    if(isset($_POST['btn_login'])){
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        
        
        if($username && $password){
		$query = mysqli_query($conn, "select employess.Dep_id,employess.img ,u_id,emp_id,u_name,u_pass,des_id from tbl_users INNER JOIN employess ON tbl_users.emp_id = employess.id where u_name ='$username'");
		$numrow = mysqli_num_rows($query);
		if($numrow !=0){
			while($row = mysqli_fetch_assoc($query)){
                
				$db_userid = $row['u_id'];
        $db_username = $row['u_name'];
				$db_password = $row['u_pass'];
        $db_role = $row['des_id'];
        $dep_id = $row['Dep_id'];
        $db_emp_id = $row['emp_id'];
        $img = $row['img'];
			}
            if($username == $db_username && $password == $db_password)
            {
              $_SESSION['u_id']= $db_userid;    
              $_SESSION['u_name']= $db_username;
				      $_SESSION['des_id']= $db_role;
              $_SESSION['emp_id']= $db_emp_id;
              $_SESSION['dep_id']= $dep_id;
              $_SESSION['img']= $img;
                echo '<script type="text/javascript">
  				 	swal("", "Login Successfully", "success");
             </script>';
             
             echo "<script>window.location.assign('time.php')</script>";
               

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



   

  
    <!-- /.card-body -->
 
  <!-- /.card -->

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
  <script src="plugins/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="plugins/popper/popper.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="plugins/select2/js/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="plugins/daterangepicker/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script src="plugins/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
  <script src="plugins/countdowntime/countdowntime.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

</div>

</body>
</html>
