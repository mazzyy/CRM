<?php include("inc/db.php");
session_start(); 
  $user_id = $_SESSION['u_id'];    
  $user_name = $_SESSION['u_name'];
 $dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 4 or $dep_id == 11 ) { 

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
  <title>AdminLTE 3 | Pace</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Schedule</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
             </div>
  <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab 1</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                </ul>

        </div>
        <div class="card-body">
 <div class="tab-content">
                  <div class="tab-pane " id="tab_2">
          <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Schedule List</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" id="user_det">
                


                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          </div>
<div class="tab-pane active" id="tab_1">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive </h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <form method="post">
               <div class="row"> 

              <div class="col-md-4">
                
              <div class="form-group">
                <label>From Date</label>
                <input type="date" name="fromDate" class="form-control" placeholder="yyyy-mm-dd" data-date-format="mm/dd/yyyy" >
              </div>
                
              </div>
              <div class="col-md-3">
              
              <div class="form-group">
                <label>To Date</label>
                <input type="date" name="toDate" class="form-control" placeholder="yyyy-mm-dd" data-date-format="mm/dd/yyyy">
              </div>
              </div>
              <div class="form-group">
                 <label></label>
              <div class="col-md-4">
                <button type="submit" name="filter" class="btn btn-outline-info btn-lg">Get Schedule</button>
              
              </div></div>
              
              
              

                  </div>
                </form>
<div class="card-box table-responsive">
                  
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                <tr>
                      <th>Cust Name</th>
                      <th>Action</th>
                      <th>Status</th>
                      <th>Phone Call</th>
                      <th>Provider</th>
                      <th>Sale Date</th>
                      <th>Time</th>
              
            </tr>
                      </thead>
                       
                      <tbody>
                    
                      
                            <?php 
                          
                      if(isset($_POST['filter']))
                      {

                         $from = $_POST['fromDate'];
                  //$from = date("m-d-Y", strtotime($newDate));
                  
                         $to = $_POST['toDate'];
                  //$to = date("m-d-Y", strtotime($ndfDate));
                  date_default_timezone_set("Asia/Karachi");
$datee = date("m-d-y h:i:sa",time());

                      // $sqluery = "INSERT INTO `tbl_logging`() VALUES ('', '$userid','$ip','View Attendace From $from To $to', '$datee' )";

                                        // if (mysqli_query($conn, $sqluery)) { }



                  $query = mysqli_query($conn, "SELECT service_offered.lead_id,customer.first_name,customer.phone,service_offered.provi_name,service_offered.status,service_offered.sale_date,service_offered.opp_time FROM service_offered INNER JOIN lead ON service_offered.lead_id = lead.id INNER JOIN tbl_users ON lead.u_id = tbl_users.u_id INNER JOIN customer on lead.cu_id = customer.id WHERE service_offered.opp_date BETWEEN '$from' AND '$to' ");
                  $count = mysqli_num_rows($query);
                  
                            if($count == "0" )
                              {
                                echo '<div align="center"><h2>Schedule Date Not Set </h2></div>';
                              }
                              else
                              {
                                
                                while($row = mysqli_fetch_array($query))
                                {
                                  $lead_id = $row['0'];
$cus_name = $row['1'];
$phone = $row['2'];
$provider = $row['3'];
$satus = $row['4'];
$sale_date = $row['5'];
$opp_time = $row['6'];
                                                 
                        
               
               
                       
                      echo'<tr>
      <td>'.ucfirst($cus_name).'</td>
     ';


      if ($satus =='Installed') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app bg-success">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success"><?php echo $satus?></span></td>

                   <?php  }   
                   elseif ($satus =='Awaiting-install') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app bg-info">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-info"><?php echo $satus?></span></td>

                   <?php  }   
                    elseif ($satus =='Pending') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app bg-warning">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-warning"><?php echo $satus?></span></td>

                   <?php  }   
                  elseif ($satus =='Prepayment') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app " style="color: ;background-color:#e83e8c; 
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#e83e8c;
 "><?php echo $satus?></span></td>

                   <?php  }   
                    elseif ($satus =='Cancelled') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app bg-danger">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-danger"><?php echo $satus?></span></td>

                   <?php  }   
                   elseif ($satus =='Call-Back') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app bg-secondary">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-secondary" ><?php echo $satus?></span></td>

                   <?php  }   
                    elseif ($satus =='Charge-Back') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app " style="color: ;background-color:#605ca8;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#605ca8;
 "><?php echo $satus?></span></td>

                   <?php  }  
                   elseif ($satus =='Outstanding-Balance') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app" style="color:black;background-color:#01ff70;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color:black;background-color:#01ff70;
 "><?php echo $satus?></span></td>

                   <?php  }   
                    elseif ($satus =='Deposit') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app " style="color: ;background-color:#007bff;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#007bff;
 "><?php echo $satus?></span></td>

                   <?php  }   
                    elseif ($satus =='Sale Declined') {
                          ?>
<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app " style="color: ;background-color:#ff851b; ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#ff851b; "><?php echo $satus?></span></td>

                   <?php  }   
                    else{
                    
                          ?>

                      <td><span class="badge badge-secondary"><?php echo $satus?></span></td>

                   <?php  }   

echo'
        <td>'.$phone.'</td>
       <td>'.$provider.'</td>
        <td>'.$sale_date.'</td>
         <td>'.$opp_time.'</td>

    </tr>';
          
                      }
}}
?>


</tbody></table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
 <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
$(document).ready(function(){
  
   

  function fetch_user()
  {
    $.ajax({
      url:"back_ajax.php",
      method:"POST",
      success:function(data){
        $('#user_det').html(data);
        console.log(data);
      }
    })
  }
   fetch_user();
  setInterval(function(){
    fetch_user();
  }, 2000);

});

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
