<?php

    session_start(); 

    $servernames = "localhost";
    $usernames = "root";
    $passwords = "QJb4yhZzNG4CwGKJ";
    $dbnames = "crm";
    
    // Create connection
    $conns = mysqli_connect($servernames, $usernames, $passwords, $dbnames);
//index.php
$dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 or $dep_id == 11) { 

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
  <title>OnestopSolutions |OLd lead </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress --> <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

</head>
<body   class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
include("inc/sidebar_right.php"); 

 ?> 

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Old Lead Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Old Lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card bg-dark">
        <div class="card-header">
          <h3 class="card-title">Attendace Time In and Out</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

         <div style="text-align: center; padding: 10px;" class="x_content">
                
       
            
        
    



          
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                               
     <div class="card-body">
          <div class="row" style="padding: 10px;">
          <form method="POST" action="">
          <div class="form-row" style="padding-bottom:10px;">
    <div class="col">
      <input type="text" placeholder="First/Last Name" class="form-control" name="search1">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Primary/Mobile Number" name="search2">
    </div>
  <div class="col">
      <input type="email" class="form-control" placeholder="Email" name="search3">
    </div>
  </div>
    <div class="form-row " >
    <div class="col">
      <input type="text" placeholder=" Sale Date" class="form-control" name="search4">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Appointment Date" name="search5">
    </div>
   <div class="col">
      <!--<input type="text" class="form-control" placeholder="Last name">--->
     <button type="submit" class="btn btn-primary"  name="search"> search </button>
    </div>
  </div>

 </form> 

</div>




                            
             <?php
              $servername = "localhost";
    $username = "root";
   $password = "QJb4yhZzNG4CwGKJ";
    $dbname = "oss_db";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Database connection couldn't be eatablish: " . mysqli_connect_error());
    }
error_reporting(0);
  


          
        $name = $num = $em = $sd = $ad ="";
          
        if( isset($_POST['search']) ){
    
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search1']));
  $num = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search2']));
  $em = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search3']));
  $sd = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search4']));
  $ad = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search5']));
  
  $sch_query = "SELECT lead_id, u_name, fname, lname, primary_phone, mobile_phone, email, dob, current_provider, provider_offered, lead_source, services_offered, sale_date, lead_status, assigned_to, confimation_no, account_no, appointment, appointment_time, street, postal_code, city, state, description, vendor_name, ssn, dl, dl_exp, dl_state FROM `tbl_lead` INNER JOIN tbl_user ON tbl_lead.u_id = tbl_user.u_id WHERE " ;
      if($name && !empty($name)){
              $sch_query.= "  `fname` LIKE '%$name%' OR `lname` LIKE '%$name%' OR `u_name` LIKE '%$name%' ";
          }
   if($num && !empty($num)){
            $sch_query .= " `primary_phone` LIKE '%$num%' OR `mobile_phone` LIKE '%$num%' ";
        }
        if($em && !empty($em)){
// If you are using double quotes you really don't need  handle to concatenation.
        $sch_query .= "  `email` LIKE '%$em%'";
        }
        if($sd && !empty($sd)){
            $sch_query .= "  `sale_date` LIKE '%$sd%' ";
        }
    
        if($ad && !empty($ad)){
            $sch_query .= "  `appointment` LIKE '%$ad%' ";
        }
        
      
   $sch_result =mysqli_query($conn, $sch_query);

 }
else {
  }

  
        
      
   

    if(mysqli_num_rows($sch_result) > 0){ 
                                
 ?>
                            
                  <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                         
                           <th>Id By</th><th>Created By</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Primary Phone</th>
              <th>Mobile Phone</th>
              <th>Email</th>
              <th>Date Of Birth</th>
              <th>Current Provider</th>
              <th>Provider Offered</th>
              <th>Lead Source</th>
              <th>Services Offered</th>
              <th>Sale Date</th>
              <th>Lead Status</th>
              <th>Assigned To</th>
              <th>Confirmation</th>
              <th>Account No</th>
              <th>Appointment Date</th>
              <th>Appointment Time</th>
              <th>Street</th>
              <th>Zip Code</th>
              <th>City</th>
              <th>State</th>
              <th>Description</th>
              <!-- <th>Vendor Name</th> -->
              <th>SSN</th>
              <th>DL</th>
              <th>Dl Exp</th>
              <th>DL State</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                                         
 <?php
                     while($row = mysqli_fetch_array($sch_result)){
                                       
                                          $lead_id = $row[0];
                                  $uname = $row[1];
                                  $fname = $row[2];
                                  $lname = $row[3];
                                  $phone = $row[4];
                                  $mobile = $row[5];
                                  $emails = $row[6];
                                  $dob = $row[7];
                                  $current_provider = $row[8];
                                  $provider_offered = $row[9];
                                  $lead_source = $row[10];
                                  $services_offered = $row[11];
                                  $sale_date = $row[12];
                                  $lead_status = $row[13];
                                  $assgined = $row[14];
                                  $confirmation = $row[15];
                                  $account = $row[16];
                                  $appointment = $row[17];
                                  $appointment_time = $row[18];
                                  $street = $row[19];
                                  $zip_code = $row[20];
                                  $city = $row[21];
                                  $state = $row[22];
                                  $dscn = $row[23];
                                  $ssn = $row[25];
                                  $dl = $row[26];
                                  $dl_exp = $row[27];
                                  $dl_state = $row[28];
                                           
                                if($lead_status == "Awaiting-install")
                {
            ?>
                       
                       
                                    <tr style='background-color: #FFFF99; color: black;'>
                                      
                                      <td><?php echo $lead_id;?></td>
                                      <td><?php echo $uname;?></td>
                              <td><?php echo $fname;?></td>
                              <td><?php echo $lname;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $mobile;?></td>
                              <td><?php echo $emails;?></td>
                              <td><?php echo $dob;?></td>
                              <td><?php echo $current_provider;?></td>
                              <td><?php echo $provider_offered;?></td>
                              <td><?php echo $lead_source;?></td>
                               <td><?php echo $services_offered;?></td>
                               <td><?php echo $sale_date;?></td>
                               <td><?php echo $lead_status;?></td>
                               <td><?php echo $assgined;?></td>
                               <td><?php echo $confirmation;?></td>
                               <td><?php echo $account;?></td>
                               <td><?php echo $appointment;?></td>
                               <td><?php echo $appointment_time;?></td>
                               <td><?php echo $street;?></td>
                               <td><?php echo $zip_code;?></td>
                               <td><?php echo $city;?></td>
                               <td><?php echo $state;?></td>
                               <td><?php echo $dscn;?></td>
                               <td><?php echo $ssn;?></td>
                               <td><?php echo $dl;?></td>
                               <td><?php echo $dl_exp;?></td>
                               <td><?php echo $dl_state;?></td>
                                       
                                    </tr>

                   <?php 
                                }
                                    else if($lead_status == "Cancelled")
                                    {
                                        
                          ?>
                                               
                                    <tr style='background-color: #de8383;color: black;'>
                                                         <td><?php echo $lead_id;?></td>
                                       <td><?php echo $uname;?></td>
                              <td><?php echo $fname;?></td>
                              <td><?php echo $lname;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $mobile;?></td>
                              <td><?php echo $emails;?></td>
                              <td><?php echo $dob;?></td>
                              <td><?php echo $current_provider;?></td>
                              <td><?php echo $provider_offered;?></td>
                              <td><?php echo $lead_source;?></td>
                               <td><?php echo $services_offered;?></td>
                               <td><?php echo $sale_date;?></td>
                               <td><?php echo $lead_status;?></td>
                               <td><?php echo $assgined;?></td>
                               <td><?php echo $confirmation;?></td>
                               <td><?php echo $account;?></td>
                               <td><?php echo $appointment;?></td>
                               <td><?php echo $appointment_time;?></td>
                               <td><?php echo $street;?></td>
                               <td><?php echo $zip_code;?></td>
                               <td><?php echo $city;?></td>
                               <td><?php echo $state;?></td>
                               <td><?php echo $dscn;?></td>
                               <td><?php echo $ssn;?></td>
                               <td><?php echo $dl;?></td>
                               <td><?php echo $dl_exp;?></td>
                               <td><?php echo $dl_state;?></td>
                                      
                                    </tr>
                             <?php
                                                
                                        }
                                        else if($lead_status == "Installed")
                                        { ?>
                                        
                                    <tr style='background-color: #a6efa6;color: black;'>
                                       
                  <td><?php echo $lead_id;?></td>
                                      <td><?php echo $uname;?></td>
                              <td><?php echo $fname;?></td>
                              <td><?php echo $lname;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $mobile;?></td>
                              <td><?php echo $emails;?></td>
                              <td><?php echo $dob;?></td>
                              <td><?php echo $current_provider;?></td>
                              <td><?php echo $provider_offered;?></td>
                              <td><?php echo $lead_source;?></td>
                               <td><?php echo $services_offered;?></td>
                               <td><?php echo $sale_date;?></td>
                               <td><?php echo $lead_status;?></td>
                               <td><?php echo $assgined;?></td>
                               <td><?php echo $confirmation;?></td>
                               <td><?php echo $account;?></td>
                               <td><?php echo $appointment;?></td>
                               <td><?php echo $appointment_time;?></td>
                               <td><?php echo $street;?></td>
                               <td><?php echo $zip_code;?></td>
                               <td><?php echo $city;?></td>
                               <td><?php echo $state;?></td>
                               <td><?php echo $dscn;?></td>
                               <td><?php echo $ssn;?></td>
                               <td><?php echo $dl;?></td>
                               <td><?php echo $dl_exp;?></td>
                               <td><?php echo $dl_state;?></td>
                                      
                                    </tr>
                                            
                                        <?php
                                            
                                        }
                                        else if($lead_status == "Pending")
                    {
                                            ?>
                                            
                                    <tr style='background-color: #80bfff;color: black;'>
                                      
                  <td><?php echo $lead_id;?></td>
                                       <td><?php echo $uname;?></td>
                              <td><?php echo $fname;?></td>
                              <td><?php echo $lname;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $mobile;?></td>
                              <td><?php echo $emails;?></td>
                              <td><?php echo $dob;?></td>
                              <td><?php echo $current_provider;?></td>
                              <td><?php echo $provider_offered;?></td>
                              <td><?php echo $lead_source;?></td>
                               <td><?php echo $services_offered;?></td>
                               <td><?php echo $sale_date;?></td>
                               <td><?php echo $lead_status;?></td>
                               <td><?php echo $assgined;?></td>
                               <td><?php echo $confirmation;?></td>
                               <td><?php echo $account;?></td>
                               <td><?php echo $appointment;?></td>
                               <td><?php echo $appointment_time;?></td>
                               <td><?php echo $street;?></td>
                               <td><?php echo $zip_code;?></td>
                               <td><?php echo $city;?></td>
                               <td><?php echo $state;?></td>
                               <td><?php echo $dscn;?></td>
                               <td><?php echo $ssn;?></td>
                               <td><?php echo $dl;?></td>
                               <td><?php echo $dl_exp;?></td>
                               <td><?php echo $dl_state;?></td>
                                       
                                    </tr>
                                            
                                            <?php
                                            
                                        }
                                        else
                                        {
                                            ?>
                                            
                                    <tr style="background-color: #e4e4e4;color: black;">
                                       
                  <td><?php echo $lead_id;?></td>
                                      <td><?php echo $uname;?></td>
                              <td><?php echo $fname;?></td>
                              <td><?php echo $lname;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $mobile;?></td>
                              <td><?php echo $emails;?></td>
                              <td><?php echo $dob;?></td>
                              <td><?php echo $current_provider;?></td>
                              <td><?php echo $provider_offered;?></td>
                              <td><?php echo $lead_source;?></td>
                               <td><?php echo $services_offered;?></td>
                               <td><?php echo $sale_date;?></td>
                               <td><?php echo $lead_status;?></td>
                               <td><?php echo $assgined;?></td>
                               <td><?php echo $confirmation;?></td>
                               <td><?php echo $account;?></td>
                               <td><?php echo $appointment;?></td>
                               <td><?php echo $appointment_time;?></td>
                               <td><?php echo $street;?></td>
                               <td><?php echo $zip_code;?></td>
                               <td><?php echo $city;?></td>
                               <td><?php echo $state;?></td>
                               <td><?php echo $dscn;?></td>
                               <td><?php echo $ssn;?></td>
                               <td><?php echo $dl;?></td>
                               <td><?php echo $dl_exp;?></td>
                               <td><?php echo $dl_state;?></td>
                                    </tr>
                                            
                                            
                                            <?php
                                            
                                        }
                                            
                                         
                                            
                                            
                                            
                                            
                                        }
                          ?>
                        
                  
                        
                      </tbody>
                    </table>
                  </div>
                    
                                                           <?php 
                               
                               
                               
                          
    
        } 
else{
    echo "<center><h3 style='color: #1e90ff;'>No Lead Found </h3></center>";
}

    
    
    ?>
                    
                  </div>
                  </div>
              </div>
            </div>
        
          
        </div>
        <!-- /.card-body -->
        
       </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>


</div>


  <?php  include("inc/footer.php");  
 

 ?>

</script> -->
 <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
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
<script>
  $(function () {
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
</body>
</html>
