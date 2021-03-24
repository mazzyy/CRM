<?php
include("inc/db.php");

session_start();
@$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);


// $newDate = date('m-d-y h:i:sa');
// $datee = date("m-d-Y h:i:sa", strtotime($newDate));
date_default_timezone_set("Asia/Karachi");
$datee = date("m-d-y h:i:sa",time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRM </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						ONE STOP SOLUTIONS 
						<br> 
						<p style="font-size: 12px; font-weight: bold; "> Customer Relationship Management <p> 
						<br>
					</span>
					<span class="login100-form-title p-b-48">
						<img src="images/oss_logo.jpg" class="img-responsive" style="height: 100px;" />
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="User Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="btn_login" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					
	<?php

    if(isset($_POST['btn_login'])){
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        
        
        if($username && $password){
		$query = mysqli_query($conn, "select * from tbl_user where u_name='$username'");
		$numrow = mysqli_num_rows($query);
		if($numrow !=0){
			while($row = mysqli_fetch_assoc($query)){
                
				$db_userid = $row['u_id'];
                $db_username = $row['u_name'];
				$db_password = $row['u_password'];
				$db_status = $row['u_status'];
				$db_role = $row['u_role'];
			}
            if($username == $db_username && $password == $db_password){
                $loginLog = $_SESSION['u_id']= $db_userid;    
                $_SESSION['u_name']= $db_username;
				$_SESSION['u_role']= $db_role;
                
				if($db_status == "Active")
				{
					if($db_role == "agent"){
					
                    	echo '<script type="text/javascript">
  					swal("", "Login Agent", "success");
  					</script>';
					
					echo "<script>window.location.assign('Home/Agent/index.php')</script>";
                    
						$subQuery = "INSERT INTO `tbl_login_details`(`user_id`) VALUES ('$loginLog')";
						
						if (mysqli_query($conn, $subQuery)) {
						}
					
					
					$sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$loginLog','$ip','Successfully logged in', '$datee' )";
					
					 if (mysqli_query($conn, $sqlQuery)) {
						 
					}
					
                    
					}
					
					else if($db_role == "back-office"){
						
                        echo '<script type="text/javascript">
  					swal("", "Login Back Office", "success");
  					</script>';
					
				//	echo "<script>window.location.assign('back-office/index.php')</script>";
                  echo "<script>window.location.assign('Home/Back-office/index.php')</script>";  
$subQuery = "INSERT INTO `tbl_login_details`(`user_id`) VALUES ('$loginLog')";
						
						if (mysqli_query($conn, $subQuery)) {
						}
					
					$sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$loginLog','$ip','Successfully logged in', '$datee' )";
					
					 if (mysqli_query($conn, $sqlQuery)) {
						 
					}
				  
					}
					
					else if($db_role == "hr-attendace"){
						
                        echo '<script type="text/javascript">
  					swal("", "Login Hr Department", "success");
  					</script>';
					
					//echo "<script>window.location.assign('hr_attendance/index.php')</script>";
                      echo "<script>window.location.assign('Home/Hr/index.php')</script>";  
					
					$subQuery = "INSERT INTO `tbl_login_details`(`user_id`) VALUES ('$loginLog')";
						
						if (mysqli_query($conn, $subQuery)) {
						}
					
					$sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$loginLog','$ip','Successfully logged in', '$datee' )";
					
					 if (mysqli_query($conn, $sqlQuery)) {
						 
					}
					
					
					}
					
					
					else if($db_role == "it"){
						
                        echo '<script type="text/javascript">
  					swal("", "Login IT Department", "success");
  					</script>';
					
					//echo "<script>window.location.assign('hr_attendance/index.php')</script>";
                      echo "<script>window.location.assign('Home/IT/index.php')</script>";  
					  
					  $subQuery = "INSERT INTO `tbl_login_details`(`user_id`) VALUES ('$loginLog')";
						
						if (mysqli_query($conn, $subQuery)) {
						}
					
					
					$sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$loginLog','$ip','Successfully logged in', '$datee' )";
					
					 if (mysqli_query($conn, $sqlQuery)) {
						 
					}
					
					
					}
					
					
					
					
					
                else{
					echo '<script type="text/javascript">
					swal("", "Login Admin", "success");
					</script>';
				
				//echo "<script>window.location.assign('admin/index.php')</script>";
                    echo "<script>window.location.assign('Home/Admin/index.php')</script>";
					
					$subQuery = "INSERT INTO `tbl_login_details`(`user_id`) VALUES ('$loginLog')";
					
					if (mysqli_query($conn, $subQuery)) {
				}
				
				$sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$loginLog','$ip','Successfully logged in','$datee' )";
				
				 if (mysqli_query($conn, $sqlQuery)) {
					 
				}
					
				}
				
				
			}
			else{
					
					
					
					echo '<script type="text/javascript">
					swal("Error", "Your Account Status is De-active .. Kindly Contact on Administrator", "error");
  					</script>';
					
				}
				
				
				
				
				
                
                
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

					
				</form>
			</div>
		</div>
	</div>
	


	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>