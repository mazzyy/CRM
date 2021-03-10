<?php include("inc/db.php");
session_start(); 
 $user_id = $_SESSION['u_id'];    
 $user_name = $_SESSION['u_name'];
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
  <title>Schedule</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress --> <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

</head>
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

<?php  include("inc/header.php");  
include("inc/sidebar.php"); 

 ?> 

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Schedule</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Schedule</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card-header" style="background-color:#2a3f54!important;">
                <h3 class="card-title"  style="background-color:#2a3f54!important;color:white"> Campaing</h3>
              </div>
      <div class="card">
                <div class="card-header">
                   
                   
                            <div class="container-fluid">
                                <div class="row ">
                                    <!-- <div class="col-md-12 h3 text-center"> Campaing </div> -->
                                   
                                   <div class="col-md-2"></div>
                                    <div class="col-md-8 "> 

                                            
                                            
                                        <div class="container">
                                            <div class="row">
                                                   
                                                <div class="col-md-12">
                                                    <form action="" method="POST">    
                                                        <div class="row pt-4">
                                                                <select required name="departmentall" class="form-control up_provider_unit  ">
                                                                    
                                                                    <!-- <option value="At&amp;T">At&amp;T</option><option value="Century Link">Century Link</option><option value="COX">COX</option><option value="Direct TV">Direct TV</option><option value="Exede">Exede</option><option value="Frontier">Frontier</option><option value="Hughes Net">Hughes Net</option><option value="None">None</option><option value="Spectrum">Spectrum</option><option value="Windstream">Windstream</option><option value="Xfinity">Xfinity</option>         -->
                                                                   <option  value="">select</option>
                          
                                                                     <?php
                                                                        $department = ("SELECT * FROM `tbl_department`"); 
                                                                        $department = mysqli_query($conn, $department);
                                                                  
                                                                        if ($department->num_rows > 0) {
                                                                          while($row = $department->fetch_assoc())
                                                                          {
                                                                            
                                                                            echo ' <option name="department" value='.$row["dep_id"]. '>'   .$row["name"].  '</option>';
                                                                         
                                                                          } 

                                                                        }
                                                          
                                                                    ?>
                                                                    
                                                                </select> 
                                                        </div>
                                                        <div class="row  pt-3">
                                                            <div class="col-md-6  pl-0 m-0">
                                                            <label class="text-left" >Shift Start </label>
                                                            <input name="in" type="time" required class="form-control " id="inputPassword2" placeholder="IN">
                                                            </div>
                                                            <div class="col-md-6 pl-0 ml-0" >
                                                            <label class="text-left " >Shift Off </label>
                                                            <input name="off" type="number" class="form-control  " id="inputPassword2" placeholder="OFF" disabled>     
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row pt-3">
                                                            <div class="col-md-10"></div>

                                                            <div class="col-md-2">
                                                            <button name="btn-campaing_schedule"  class="btn btn-info" style=" float: right;  background-color:#000000!important; border-width:medium ">CREATE</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                          

                                    
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                                                

                </div>
                <div class="card-body">
      <?php 
     
     if(isset($_POST['btn-campaing_schedule'])){
             $in= $_POST['in'];

            //  date_default_timezone_set("US/Eastern");


             $in=date('h:i:sa',strtotime('+0 hour ',strtotime($in)));
              $off=  date('h:i:sa',strtotime('+9 hour ',strtotime($in)));

              //timezone convert from us to pk
              $in_convert_to_seconds = strtotime("$in");

              $time_zone_difference = 36000;

              $inp=date("h:i:sa", $in_convert_to_seconds + $time_zone_difference );
              $offp=  date('h:i:sa',strtotime('+9 hour ',strtotime($inp)));
              // date_default_timezone_set("Asia/Karachi");

              
              
                            
              

             $campaing_id= $_POST['departmentall'];
            
             $user = ("UPDATE `employess` SET `Shift_Start`=  '$in', `Shift_Off`= '$off' WHERE Dep_id = '$campaing_id'"); 
             $user = mysqli_query($conn, $user);

             

           echo "<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>US Shift Start </th>
                <th scope='col'>US Off Start</th>
                <th scope='col'>PK Shift Start </th>
                <th scope='col'>PK Shift Off </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope='row'>1</th>
                <td>$in</td>
                <td>$off</td>
                <td>$inp</td>
                <td>$offp</td>
              </tr>
              <tbody>
              </table class='table'>";



      
     } 
      ?>
                
        </div>
                <!-- /.card-body -->


                
                
       </div>
      <!-- /.card -->
      <!-- new card -->
            <!-- Default box -->
           
                <!-- /.card-body -->


                

                
       </div>
      <!-- /.card -->
      <div class="card-header" style="background-color:#2a3f54!important;">
                <h3 class="card-title"  style="background-color:#2a3f54!important;color:white"> Employee</h3>
              </div>
      <div class="card">
      
                <div class="card-header">
                   
                   
                            <div class="container-fluid">
                                <div class="row ">
                                
                                    <!-- <div class=" col-md-12 h3 text-center"> Employee </div> -->
                                   
                                   <div class="col-md-2 "></div>
                                    <div class="col-md-8 "> 

                                            
                                            
                                        <div class="container">
                                            <div class="row">
                                                   
                                                <div class="col-md-12">
                                                    <form action="" method="POST">    
                                                        <div class="row pt-4">
                                                                <!-- <select name="up_provider_unit[]" class="form-control up_provider_unit  "> -->
                                                                <input list="Country" name="employee" class="form-control up_provider_unit" required>
	                                                                    <datalist id="Country" name="employee_id" >
                              
                                                                    
                                                                    <?php
                                                                        $employess = ("SELECT * FROM `employess` WHERE 1"); 
                                                                        $employess = mysqli_query($conn, $employess);
                                                                           
                                                                                     
                                                                        if ($employess->num_rows > 0) {
                                                                          while($row = $employess->fetch_assoc())
                                                                          {
                                                                            
                                                                            echo ' <option     name="employeoption" value='.$row["id"]. '>'   .$row["First_Name"].$row["Last_Name"].   '</option>';
                                                                            
                                                                          } 
                                                                          
                                                                          
                                                                        }
                                                                       
                                                                    ?>
                                                                    </datalist>
                                                                </select> 



                                                
                                                        </div>
                                                        <div class="row  pt-3">
                                                            <div class="col-md-6  pl-0 m-0">
                                                            <label class="text-left" >Shift Start </label>
                                                            <input name="in" type="time" class="form-control " id="inputPassword2" placeholder="IN" required>
                                                            </div>
                                                            <div class="col-md-6 pl-0 ml-0" >
                                                            <label class="text-left " >Shift Off </label>
                                                            <input class="form-control  " id="inputPassword2" placeholder="OFF" disabled>     
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row pt-3">
                                                            <div class="col-md-10"></div>

                                                            <div class="col-md-2">
                                                            <button name="btn-user_schedule" class="btn btn-info" style=" float: right;  background-color:#000000!important; border-width:medium  ">CREATE</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                          

                                    
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                                                

                </div>
                <div class="card-body">

                
        </div>

        <?php 
     
     if(isset($_POST['btn-user_schedule'])){
             $in= $_POST['in'];
        
            //  date_default_timezone_set("US/Eastern");


             $in=date('h:i:sa',strtotime('+0 hour ',strtotime($in)));
              $off=  date('h:i:sa',strtotime('+9 hour ',strtotime($in)));

              //timezone convert from us to pk
              $in_convert_to_seconds = strtotime("$in");

              $time_zone_difference = 36000;

              $inp=date("h:i:sa", $in_convert_to_seconds + $time_zone_difference );
              $offp=  date('h:i:sa',strtotime('+9 hour ',strtotime($inp)));
              // date_default_timezone_set("Asia/Karachi");

              
              
                            
              

             $employee_id= $_POST['employee'];
            // echo " $employee_id";
             $user = ("UPDATE `employess` SET `Shift_Start`=  '$in', `Shift_Off`= '$off' WHERE id = '$employee_id'"); 
             $user = mysqli_query($conn, $user);

             

           echo "<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>US Shift START </th>
                <th scope='col'>US Off </th>
                <th scope='col'>PK Shift  START  </th>
                <th scope='col'>PK Shift Off</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope='row'>1</th>
                <td>$in</td>
                <td>$off</td>
                <td>$inp</td>
                <td>$offp</td>
              </tr>
              <tbody>
              </table class='table'>";



      
     } 
      ?>

    
    
    </section>
    <!-- /.content -->
<section >

<div class="container-fluid ">
  <div class="row shadow" style="background-color:white;">
    <div class="col-12 ">
    <div class="col-md-12 h3 text-center">Records</div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active bg-info" style="background-color:#2a3f54!important;color:white"id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DEPARTMENT</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link  bg-info" style="background-color:#2a3f54!important;color:white"id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">EMPLOYEES</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <table class="table table-striped bg-info"style="background-color:#2a3f54!important;color:white">
  <thead>
      <th scope="col"><b>DEPARTMENT</b></th>
      <th scope="col"><b>TIMING</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
              $depar_id  = ("SELECT employess.Dep_id,tbl_department.name,employess.Shift_Start FROM `employess` INNER JOIN tbl_department ON tbl_department.dep_id = employess.Dep_id GROUP By employess.Dep_id ORDER BY `des_id`"); 
              $depar_id  = mysqli_query($conn, $depar_id );
                
                          
              if ($depar_id->num_rows > 0) {
                while($row =  $depar_id->fetch_assoc())
                {
                 
      
                            
                            echo "<tr>";
                            echo "<td>". $row['name']."</td>";
                            echo "<td>".$row['Shift_Start'] ."</td>";
                            echo "</tr>";
                        
                
              }
            }
            
      ?>
      <!-- <tr>
      <td>the Bird</td>
      <td>twitter</td>
    </tr> -->
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
    <table class="table table-striped bg-info" style="background-color:#2a3f54!important;color:white">
  <thead>
      <th scope="col"><b>NAME</b></th>
      <th scope="col"><b>TIMING</b></th>
      <th scope="col"><b>DEPARTMENT</b></th>
    </tr>
  </thead>
  <tbody>
  <?php
              $depar_id  = ("SELECT employess.First_Name,employess.Shift_Start,tbl_department.name FROM `employess` INNER JOIN tbl_department ON tbl_department.dep_id = employess.Dep_id ORDER BY `des_id`"); 
              $depar_id  = mysqli_query($conn, $depar_id );
                
                          
              if ($depar_id->num_rows > 0) {
                while($row =  $depar_id->fetch_assoc())
                {
                 
                 
                     
                            
                            echo "<tr>";
                            echo "<td>". $row['First_Name']."</td>";
                            echo "<td>".$row['Shift_Start']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "</tr>";
                        
              
                      
              } 
                
                
              }
            
      ?>
      <!-- <tr>
      <td>the Bird</td>
      <td>twitter</td>
    </tr> -->
  </tbody>
</table>
  </div>
  
</div>
    </div>
   
  </div>
</div>

</section>
    
  </div>

  <!-- section tow -->
  


</div>


  <?php  include("inc/footer.php");  
 

 ?><script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
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