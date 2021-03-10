<?php

include("inc/db.php");
session_start();
$dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 2 ) { 

}else{

echo '<script type="text/javascript">
      window.location.assign("500.html")
      
</script> ';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>CRM | Add Employee Form </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Theme style -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
</head>
<style type="text/css"> 
.custom-file-input{
    position: absolute;
    z-index: 0;
    width: 19%;
    height: calc(9.25rem + 2px);
    margin: 0;
    }

body,main,section{

  /* background-color:#18191a !important; */

}

.card-header{
  background-color:#2a3f54;
  color:white

}


</style>
<body onload="myFunction()"  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="loader">
  <div class="body">
   <span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <div class="base">
    <span></span>
    <div class="face"></div>
  </div>
</div>
<div class="longfazers">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<h1>Redirecting</h1>

</div>

<!-- Site wrapper -->
<div class="wrapper" id="myDiv">

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
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Employee Form</li>
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
          
          <?php
               
               if(isset($_POST['btn_add'])){
                    $title = $_POST['title'];
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $dependability = $_POST['dependability'];
                    $department = $_POST['department'];
                    $designation = $_POST['designation'];
                    
                   $sal = $_POST['sal'];
                  
                      $file = $_FILES['files']['name'];
                     
                      $tmp_name = $_FILES['files']['tmp_name'];
                      $size = $_FILES['files']['size'];
                      $type = $_FILES['files']['type'];
                      
                   
                      
                      $imagefolder = 'upload/';


    if($title == '' && $fname == '' && $lname == '' && $department == '' && $designation == '' && $sal == '')
              {

                echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Please make sure all Required fields are filled </p> ";

              }
              else
              { 
                
                        move_uploaded_file($tmp_name, $imagefolder.$file);


                   $insert_empw = mysqli_query($conn, "INSERT INTO `employess`(`Title`, `First_Name`, `Last_Name`, `Dep_id`, `des_id`, `Dependability`, `Created_date`,`img`) VALUES ('$title','$fname','$lname','$department','$designation','$dependability', current_timestamp(),'$file' )") or die("Query failed:4 ".mysqli_error());

                    $last_id = mysqli_insert_id($conn);

$insert_emp ="INSERT INTO `salary`(`emp_id`, `salary`) VALUES ('$last_id','$sal')"; 
 #or die("Query failed:4 ".mysqli_error());
$abhiu = mysqli_query($conn,$insert_emp);
                   echo "<p style='color: green; text-align: center; font-size: 18px;'>SUCCESS - Employee Has Been Added Successfully...</p> ";
                    
                     echo '<script>setTimeout(function() { location.replace("add-employee.php")},1000);</script>';


              }

                   
                   
               }

               
?>
          
           
           <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color:#2a3f54;">
                <h3 class="card-title">Add New Employee</h3>
                
                <a href="./add-user.php" class=" float-right btn btn-info" style="background-color:#000000!important; border-width:medium  " >
                <i class="  fas fa-user-plus"></i>
                                        Add User
                </a>
                         
              </div>
              <!-- /.card-header -->
              
              <form method="post" enctype="multipart/form-data" style="padding: 15px;">

 <div class="form-row">
  <div class="form-group col-md-12">
                     <input type="file" name="files" class="custom-file-input" id="imgInp" style="background: rgb();">
                     <div class="widget-user-image" style="text-align: left;">
                <img class="img-circle elevation-2" id="blah"src="dist/img/user1-128x128.jpg" alt="User Avatar" width="100" height="90">
              </div>
                  </div>

                </div>
                  <div class="form-row">
                   
                      <div class="form-group col-md-2">
                      <label>Title</label>
                      <select name="title" class="form-control" requireds>
                         <option></option>
                          <option>Mr</option>
                          <option>Mrs</option>
                          <option>Ms</option>
                          <option>Dr</option>
                      </select>
                     
                    </div>
                     
                      <div class="form-group col-md-3">
                      <label>First Name</label>
                      <input type="text" name="fname" id="usersa" class="form-control" placeholder="First Name" required>
<div id="uname_response"></div>
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label>Last Name</label>
                      <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                 
                   
                   </div>
                  <div class="form-row">
                  
                   <div class="form-group col-md-3">
    <label>Dependability</label>
    <input type="text" class="form-control" name="dependability" placeholder="Dependability" >
  </div>
                  <div class="form-group col-md-3">
    <label>Salary</label>
    <input type="text" class="form-control" name="sal" placeholder="Salary" required>
  </div>        
 
    <div class="form-group col-md-3">
      <label>Department</label>
       <select id="department" name="department" class="form-control" required>
           <option>Select Department</option>
      </select>
    </div>
    
    <div class="form-group col-md-3">
      <label>Designation</label>
      <select id="designation" name="designation" class="form-control" required>
        <option>Select Department First</option>
      </select>
    </div>
    
    
  </div>
  
  
  <button type="submit" name="btn_add" class="btn btn btn-info btn-lg"  style="background-color:#000000!important; border-width:medium ;float: right;  ">Add New Employee</button>
  
</form>
              
              
              
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
                    
          
          
        </div>
        <!-- /.row -->
        
        
           <div class="row">
              <div class="col-md-12">
                  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10%">Emp ID</th>
                    <th width="10%">Title</th>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                    
$users_query = "SELECT img,employess.id, employess.Title, employess.First_Name, employess.Last_Name,  tbl_department.name AS department, tbl_designation.name AS designation, employess.Created_date FROM `employess`  INNER JOIN tbl_department ON employess.Dep_id = tbl_department.dep_id INNER JOIN tbl_designation ON employess.des_id = tbl_designation.des_id";      

$result = mysqli_query($conn, $users_query);
                               
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){
       
        $user_id = $row['id'];
        $user_title = $row['Title'];
        $user_fname = $row['First_Name'];
        $user_lname = $row['Last_Name'];
        $user_img = $row['img'];
        $department = $row['department'];
        $designation = $row['designation'];
        $Created_date = $row['Created_date'];

                      
?>
                 
                     <tr>
                                      
                    <td><?php echo $user_id; ?></td>
                    <td><?php echo $user_title; ?></td>
                    <td class=" m-0 p-0"><center>
                          <img class="Regular border border border-dark  img-fluid img-circle w-50 h-50 "       
                                src="upload/<?php echo $user_img;?>"
                                alt="User profile picture" id="blah" hight="120" >
                        <center>
                    </td>
                    <td><?php echo ucfirst($user_fname) . " " .$user_lname; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $designation; ?></td>
                
                    <td><span class="badge badge-warning"><?php echo "Active"; ?></span></td>
                    <td>
                        <a href="profile.php?empID=<?php echo $user_id; ?>" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                        <a href="profile.php?empID=<?php echo $user_id; ?>" title="Delete" class="btn btn-danger btn-sm">Delete</a>
                     
                    </td>
                    
                     </tr>
                     
                     <?php 
                          }
}
                      
                      
                      ?>
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                   <th width="10%">Emp ID</th>
                    <th width="10%">Title</th>
                    <th width="20%">Full Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                   
                    <th>Status</th>
                    <th width="20%">Action</th>
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





<script type="text/javascript">
    $(document).ready(function(){
        
        loadData();
        
        function loadData(type, department_id){
            $.ajax({
                url     :   "load-department.php",
                type    :   "POST",
                data    :   {type: type, id: department_id},
                cache: false,
                success : function(data){
                    if(type == "desData")
                    {
                        $('#designation').html(data);    
                    }
                    else{
                        $('#department').append(data);
                        }
                }
            });
        }
        
        $('#department').on("change", function(){
            var dep = $('#department').val();
            
            loadData("desData", dep);
        });
        
       
    });

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


<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>




<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>


  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
$(function () {
  bsCustomFileInput.init();
});
</script>


<!-- Page specific script -->
<script>
  $(function(){
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
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
//  var myVar;
// function myFunction() {
//   myVar = setTimeout(showPage, 1000);
// }

// $(window).load(function() {
//   $("#loader").fadeOut("slow");
// })
document.onreadystatechange = function() { 

    if (document.readyState !== "complete") { 
        document.querySelector("#myDiv").style.display = "none"; 
        document.querySelector("#loader").style.visibility = "visible"; 
    } else { 
        document.querySelector("#loader").style.display = "none"; 
        document.querySelector("#myDiv").style.display = "block"; 
    } 
  }


</script>
</body>
</html>

































