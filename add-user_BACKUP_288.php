<?php

include("inc/db.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM | Add User Form </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.css">
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>
<style type="text/css">
  
 .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.fa-eye:before {
    content: "\f06e";
    margin: 1px 0px 0px -41px;
}
.fa-eye-slash:before {
    content: "\f070";
     margin: 1px 0px 0px -41px;
}
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar Start -->

  <?php include('inc/header.php');  ?>

  <!-- Navbar End -->


  <!-- Main Sidebar Start -->

  <?php include('inc/sidebar.php');  ?>
    <!-- Main Sidebar End -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
          
            <div class="col-md-2"></div>
           <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>
              </div>
              <!-- /.card-header -->
              
    <?php
            
                if(isset($_GET['userID']))
                {
                     $user_get_id = $_GET['userID'];
                    
              $fetch_user = "SELECT tbl_role.role_id , u_name, u_pass, name, u_status, date_time FROM `tbl_users` INNER JOIN tbl_role ON tbl_users.role_id = tbl_role.role_id WHERE u_id = '$user_get_id' ";
    $run_user = mysqli_query($conn, $fetch_user);
    $row_user = mysqli_fetch_array($run_user);
            $user_name = $row_user['u_name'];
            $user_pass = $row_user['u_pass'];
            $user_role = $row_user['name'];
            $user_roleID = $row_user['role_id'];
    }
                
    ?>
              
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
<<<<<<< HEAD
                    <label for="username">Username</label>
                   
                    <input type="text" name="user" id="usersa" class="form-control" placeholder="Enter Username" value="<?php if(isset($user_name)){echo $user_name; } else { echo ""; } ?>" required>
=======
                  <select name="user" class="form-control">

                              <option value="<?php echo $dep_id_fetch; ?>"><?php if(isset($dep_name_fetch)){ echo $dep_name_fetch; } else {echo "Select Department"; } ?></option>
                                  <?php

                                  $select_deparment = "SELECT * FROM `employess` ";
                                  $department_result = mysqli_query($conn, $select_deparment);

                                  while($data = mysqli_fetch_array($department_result)){
                                    $userNameId= $data['id']."-".$data['First_Name'];
                                  ?>
                                  <option value="<?php echo " $userNameId" ?>" id="<?php echo $data['First_Name'] ?>">

                                    <?php

                                    echo ucfirst($data['First_Name']);
                                    }


                                    ?>
                                  </option>

                   </select>
>>>>>>> d30f177089c6453d8f0f0cf94b352d3556e816b6
                  </div>
                  <div id="uname_response"></div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="form-control" id="password-field" placeholder="Enter Password" value="<?php if(isset($user_pass)){echo $user_pass; } else { echo ""; } ?>"  required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
                  
                  
                   <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="<?php echo $user_roleID; ?>"><?php if(isset($user_role)){echo $user_role; }
                            else { echo "Select Role"; } ?></option>
                        
                        
                        
                        <?php 
                                                                        
                        $role = "SELECT * FROM `tbl_role` WHERE status = 'active' ";
                        $role_result = mysqli_query($conn, $role);

                        while($data = mysqli_fetch_array($role_result)){

                            ?>
                                <option value="<?php echo $data['role_id'] ?>">

                                <?php 

                                echo ucfirst($data['name']); 
                                }


                                ?>
                            </option>
                        
                    </select>
                   
                  </div>
                
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
            <?php
                    
                 if(isset($_GET['userID'])){
                     
                     ?>
                       <button type="submit" name="update" class="btn btn-outline-info" style="float: right; ">Update</button>
                     
                     <?php
                     
                 }   
                    else {
                        
                    
                    
            ?>
                 
                 
                  <button type="submit" name="reg" class="btn btn-outline-primary" style="float: right; ">Register</button>
                  
                  <?php } ?>
                </div>
              </form>
            </div>
            <!-- /.card -->

  
<?php

               if(isset($_POST['reg'])){
                   
                   $user = $_POST['user'];
                   $password = $_POST['pass'];
                   $role = $_POST['role'];
                   $empIdName=(explode("-",$user));
                   
                   $sql = "INSERT INTO `tbl_users`(`emp_id`,`u_name`, `u_pass`, `role_id`, `u_status`, `date_time`) VALUES ('$empIdName[0]','$empIdName[1]','$password','$role','active', current_timestamp() )";
										
                  if (mysqli_query($conn, $sql)) {

                        echo '<script type="text/javascript">
                                swal("", "User has been Added Successfully ...", "success");
                                </script>';
                      
                      $username = "";
                     $password = "QJb4yhZzNG4CwGKJ";
                      

                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                   
                 
                   
                   
               }
               else if(isset($_POST['update'])){
                   
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $role = $_POST['role'];
                   
                   $update_sql = "UPDATE `tbl_users` SET `u_name`='$username',`u_pass`='$password',`role_id`='$role',`u_status`='active' WHERE `u_id` = '". $_GET['userID'] ."' ";
                   
                    if (mysqli_query($conn, $update_sql)) {

                        echo '<script type="text/javascript">
                                swal("", "User has been Updated Successfully ...", "success");
                                </script>';
                      
                      $username = "";
                     $password = "QJb4yhZzNG4CwGKJ";
                        
                        echo '<script type="text/javascript">
           window.location = "add-user.php"
      </script>';
                        
                    }
                    else {
                        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
                    }
                   
                   
               }
               
               
               
               
               
?>
 
 
 

          </div>
          <!--/.col (left) -->
          
          
          <div class="col-md-2"></div>
          
          
          
          
          
          
        </div>
        <!-- /.row -->
        
        
        <div class="row">
              <div class="col-md-12">
                  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10%">UserID</th>
                    <th width="15%">Role</th>
                    <th width="20%">UserName</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                
                   
<?php
                    
$users_query = "SELECT u_id, name, u_name, u_pass, u_status FROM `tbl_users` INNER JOIN tbl_role ON tbl_users.role_id = tbl_role.role_id WHERE u_status = 'active' ";      

$result = mysqli_query($conn, $users_query);
                               
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){
       $user_id = $row['u_id'];
        $user_role = $row['name'];
        $user_name = $row['u_name'];
        $user_pass = $row['u_pass'];
        $user_status = $row['u_status'];
                      
?>
                 <tr>
                                      
                    <td><?php echo $user_id; ?></td>
                    <td><?php echo $user_role; ?></td>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_pass; ?></td>
                    <td><span class="badge badge-warning"><?php echo ucfirst($user_status); ?></span></td>
                    <td>
                        <a href="add-user.php?userID=<?php echo $user_id; ?>" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                        <a href="add-user.php?userID=<?php echo $user_id; ?>" title="Delete" class="btn btn-danger btn-sm">Delete</a>
                     
                    </td>
                    
                     </tr>
                    
                    <?php
                      
            }
    
}
                      
                      ?>
                    
                 
          
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>UserID</th>
                    <th>Role</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        
              </div>
          </div>
          
        
        
        
        
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

    <!-- Footer Start -->

    <?php include('inc/footer.php');  ?>

<!-- Footer End -->



<script>


      




                    </script>






  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
 <script>
            $(document).ready(function(){

                $("#usersa").keyup(function(){

                    //var username = $(this).val().trim();
            var form_data = $(this).serialize();
                    if(form_data != ''){
            
                       
            
                        $.ajax({
                            url: 'validate_ajax.php',
                            type: 'post',
                            data: form_data,
                            success: function(data){
               //  alert(response);
                                $('#uname_response').html(data);
                
                             }
                        });
                    }
                    else {

                        $("#uname_response").html("not");
                    }
            
                });

            });
        </script>
<script>
 $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});



$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
