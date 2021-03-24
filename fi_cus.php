<?php include("inc/db.php");
session_start(); 
  $user_id = $_SESSION['u_id'];    
  $user_name = $_SESSION['u_name'];
  $dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 ) { 

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
            <h1>Find Customer </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header" style="background-color:#2a3f54!important;color:white">
          <h3 class="card-title">find</h3>

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

          <div class="row">
          <div class="col-12">

            <form method="post">
                <div class="row">
          <div class="col-4">
               <div class="form-group">
              <input type="text"  class="form-control" placeholder="First/Last Name" name="name">
              </div>
               </div>
               <div class="col-4">
               <div class="form-group">
              <input type="text" class="form-control" placeholder="Primary/Mobile Number" name="phone">
              </div>
               </div>
               <div class="col-4">
               <div class="form-group">
              <input type="text" class="form-control" placeholder="Email" name="email">
               </div>
                </div>
               <button type="submite" class="btn btn-block btn-info"  name="search" style=" float: right;  background-color:#000000!important; border-width:medium "> search </button>
           
           </div>
            </form>
            <?php $name = $num = $em = $sd = $ad ="";
            if( isset($_POST['search']) ){
    
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
  $num = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
  $em = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
   


  $sch_query = "SELECT `id`,`first_name`,`last_name`,`phone`,`alt_num`,`email` FROM customer WHERE " ;
      if($name && !empty($name)){
              $sch_query.= "`first_name` LIKE '%$name%' OR `last_name` LIKE '%$name%'";
          }
   if($num && !empty($num)){
            $sch_query .= "`phone` LIKE '%$num%' OR `alt_num` LIKE '%$num%' ";
        }
        if($em && !empty($em)){
// If you are using double quotes you really don't need  handle to concatenation.
        $sch_query .= "`email` LIKE '%$em%'";
        }
       
        
      
    $sch_result = mysqli_query($conn,$sch_query);
 }
else {
  
}?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" >Customer List</h3>

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
              <div class="card-body table-responsive p-0" id="">
                <?php if(!empty($sch_result)){
                  // @mysqli_num_rows($sch_result) != 0){  ?>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Cust Id</th>
                      <th>First Name </th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>Alt Phone</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_array($sch_result)){
                                       
                          $lead_id = $row[0];
                          $fname = $row[1];
                          $lname = $row[2];
                          $phone = $row[3];
                          $alt_phone = $row[4];
                          $email= $row[5];
                         ?>
              <tr>
                          <td><?php echo $lead_id;?></td>
                          <td><?php echo $fname;?></td>
                          <td><?php echo $lname;?></td>
                          <td><?php echo $phone;?></td>
                          <td><?php echo $alt_phone;?></td>
                          <td><?php echo $email;?></td>

              </tr>

                  
                <?php 
              }
              } 
else{
    echo "<center><h3 style='color: #1e90ff;'>No Customer Found </h3></center>";
} ?>
</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  
    fetch_user();
  setInterval(function(){
    fetch_user();
  }, 2000);

  function fetch_user()
  {
    $.ajax({
      url:"back_ajax.php",
      method:"POST",
      success:function(data){
        $('#user_details').html(data);
      }
    })
  }

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
