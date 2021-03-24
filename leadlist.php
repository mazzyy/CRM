<?php include("inc/db.php");
session_start(); 
 $user_id = $_SESSION['u_id'];    
 $user_name = $_SESSION['u_name'];
 $dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4  or $dep_id == 11) { 

 }


 else{

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
  <title>lead view</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte--><link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
 -->  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">

<?php  include("inc/header.php");  
include("inc/sidebar.php"); 

 ?> 

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL LEADS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LEAD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header"  style="background-color:#2a3f54!important;color:white;">
          <h3 class="card-title" >LEADS</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
       
            <?php 


  $sch_query="SELECT service_offered.lead_id, lead.cu_id, tbl_users.u_name, service_offered.status,service_offered.sale_date,service_offered.opp_date, customer.first_name ,customer.last_name,customer.phone,customer.alt_num,service_offered.date FROM service_offered INNER JOIN lead ON service_offered.lead_id = lead.id INNER JOIN tbl_users ON lead.u_id = tbl_users.u_id INNER JOIN customer on lead.cu_id = customer.id order by lead_id DESC LIMIT 200
";

  $sch_result1 = mysqli_query($conn,$sch_query);
     






?>
            <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <?php 
                if(!empty($sch_result1)){
                // if(@mysqli_num_rows($sch_result1,$conn) != 0){  ?>
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>FirstName</th>
                      <th>Last Name</th>
                      <th>Phone Num #</th>
                      <th>Alt Phone Num #</th>
                      <th>Sale date</th>
                     <th>date</th>
                     
                    </tr>
                  </thead>
                  <tbody>
     <?php 
// $productSqlp = mysqli_query($conn,"SELECT service_offered.lead_id, lead.cu_id, tbl_users.u_name, service_offered.status ,service_offered.sale_date,service_offered.opp_date FROM service_offered INNER JOIN lead ON service_offered.lead_id = lead.id INNER JOIN tbl_users ON lead.u_id = tbl_users.u_id");


 while($row = mysqli_fetch_array($sch_result1)) {

$lead_id = $row['0'];
$cus_id = $row['1'];
$u_name = $row['2'];
$satus = $row['3'];
$saldate = $row['4'];
if (empty($saldate)) {
  $sale_date="";
}
else{
  $sale_date= date("m-d-Y", strtotime($saldate));
}
   
$opp_date = $row['5'];
$fname = $row['6'];
$lname = $row['7'];
$num = $row['8'];
$alt_num = $row['9'];

$datess = $row['10'];

$dates= date("m-d-Y", strtotime($datess));
?>
 
                      
<?php 
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
                    elseif ($satus =='Pending-Activation') {
                          ?>


<td><a href="view_lead.php?leadid=<?php echo $lead_id; ?>" class="btn btn-app" style="color: ;background-color:#ff851b; ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#ff851b; "><?php echo $satus?></span></td>
                   <?php  }   
                    else{
                    
                          ?>

                      <td><span class="badge badge-secondary"><?php echo $satus?></span></td>

                   <?php  }
                   ?>




                      <td><?php echo $u_name; ?></td>
                      <td><?php echo $fname; ?></td>
                      <td><?php echo $lname; ?></td>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $alt_num; ?></td>
                      <td><?php echo $sale_date; ?></td>
                      <td><?php echo $dates; ?></td>
                       
        </tr> 


<?php 
              }
              } 
else{
    echo "<center><h3 style='color: #1e90ff;'>No Lead Found </h3></center>";
} ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
        
          
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 --> <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


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
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<?php 
if (isset($_GET['w'])){

$w=$_GET['w'];
if ($w=='0') {
  echo ' <script type="text/javascript">
  
toastr.success("Lead Updated Successfully ...")
</script>

  ';
  
}
 if ($w=='1') {
  echo ' <script type="text/javascript">
  
toastr.success("Lead Added Successfully ...")
</script>

  ';
  
}
}

?>


<script type="text/javascript">
  
  var getColor = function(text) {
  if (text === "Approved") return 'green';
  if (text === "Pending") return 'yellow';
  if (text === "Rejected") return 'red';
  return "";
};





$('td').each(function(i, td) {
  var color = getColor($(td).html());
  $(td).css({
    "color": color
  });
});
</script>
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
</body>
</html>
