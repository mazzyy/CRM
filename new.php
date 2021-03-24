<?php include("inc/db.php");
session_start();  

  $_SESSION['u_id'];    
 $_SESSION['u_name'];
  $des_id = $_SESSION['des_id'];
   $dep_id=  $_SESSION['dep_id'];
  if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 ) { 
  
   }else{
  
   echo '<script type="text/javascript">
         window.location.assign("500.html")
         
  </script> ';
   }
  
$connect = new PDO("mysql:host=localhost;dbname=crm", "root", "QJb4yhZzNG4CwGKJ");
function lead_status($connect)
{ 
 $output = '';
 $query = "SELECT * FROM lead_status ORDER BY name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}
function providers($connect)
{ 
 $output = '';
 $query = "SELECT * FROM providers ORDER BY name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Customer</h1>
            <?php
            
$productSqlp = mysqli_query($conn,"SELECT * FROM providers");
$productSqlls = mysqli_query($conn,"SELECT * FROM lead_source");

// echo $_SESSION['role_id'];

            ?>
        </div>

</div>
            <div class="row ">
          <div class="col-lg-12">
<div class="card card-warning">
              <div class="card-header"style="background-color:#2a3f54!important;color:white">
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                            <label>First Name</label><span style="color: red;">*</span>
                            <input type="text" name="fname" class="form-control" autofocus="false" placeholder="First Name" tabindex="1" required>
                        </div>
                          
                        <div class="form-group">
                            <label>Primary Phone</label><span style="color: red;">*</span>
                            <input type="text" name="primary_phone" class="form-control" placeholder="Primary Phone" tabindex="3" required>
                        </div>
                        
                         <div class="form-group">
                            <label>Primary Email</label><span style="color: red;">*</span>
                            <input type="email" name="email" class="form-control" placeholder="Primary Email" tabindex="5" required>
                        </div>
                         <div class="form-group">
          <label for="clientName">Current provider</label>
          
          <input type="hidden" class="form-control" id="clientName" name="cus_id" value="<?php  echo $c_id ;?>" />
    <select class="form-control" name="Current_pro"  tabindex="7">
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlp)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
          
         <!--/form-group-->
        </div>
                          </div>
                      
                      
                      <div class="col-md-6">
                         
                        <div class="form-group">
                            <label>Last Name</label><span style="color: red;">*</span>
                            <input type="text" name="lname" class="form-control" autofocus="false" placeholder="Last Name" tabindex="2" required>
                        </div>
                          
                        <div class="form-group">
                            <label>Mobile Phone</label>
                      <input type="text" name="mobile_phone" class="form-control" placeholder="Mobile Phone" tabindex="4">
                        </div>
                        
                         <div class="form-group">
                            <label>Date Of Birth </label> <span style="color: red;">*</span>
                            <input type="date" name="dob" class="form-control" placeholder="Date Of Birth" tabindex="6" required  data-date-format="mm-dd-yyyy">
                        </div>
                        
                          <div class="form-group">
          <label for="clientName">Lead Source</label>
          
          
    <select class="form-control" name="lead_sour" tabindex="8" >
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlls)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
          
         <!--/form-group-->
        </div>

                      </div>

                          
                      </div>
                      
                      
                <button type="submit"  name="save" class="btn btn-block btn btn-info btn-lg" style=" float: right;  background-color:#000000!important; border-width:medium ">SAVE</button>
                     </div><!-- end col 12 -->
                  </div><!-- end row -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>

</div><!-- end col 12 -->
</div>  <!-- end row -->


<?php   

if(isset($_POST['save']))
				{
				$firstname = $_POST['fname'];
				$lastname = $_POST['lname'];
				$primary_phone = $_POST['primary_phone'];
				$mobile_phone = $_POST['mobile_phone'];
				$email = $_POST['email'];
				$dob = $_POST['dob'];
$newDate = date("m-d-Y", strtotime($dob));
$lead_sour = $_POST['lead_sour'];
$Current_pro = $_POST['Current_pro'];

				//$account = $_POST['account'];
				// $street = $_POST['street'];
				// $zip_code = $_POST['zip_code'];
				// $city = $_POST['city'];
				// $state = $_POST['state'];
				// $ssn = $_POST['ssn'];
				// $dl = $_POST['dl'];
				// $dl_exp = $_POST['dl_exp'];
				// $dl_state = $_POST['dl_state'];
				//$date = date('m-d-Y');
							


 $sql = "INSERT INTO `customer`(`des_id`, `first_name`, `last_name`, `phone`, `alt_num`, `email`, `DOB`,`current_provider`, `Lead_Source`)
 VALUES('".$_SESSION['des_id']."','$firstname','$lastname','$primary_phone','$mobile_phone','$email','$newDate','$Current_pro','$lead_sour')";
										
if (mysqli_query($conn, $sql)) {

	$last_id = mysqli_insert_id($conn);
// while($row = mysqli_fetch_assoc($sql)){
                
// 				 $cu_id = $row[0];



// 			}

echo '<script type="text/javascript">
$(window).load(function() {
    $("#modal-warning").modal("show");
});
		</script>';

	
}
}

         ?>




         
        
      </div>
   </div>
</div>

 <div id="modal-warning" class="modal" >
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">Successfull </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> your Customer id is <?php  echo $last_id;
                           ?> </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
              <a href="addlead.php?id=<?php echo $last_id; ?>"><button type="button" class="btn btn-outline-dark">Save changes</button></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


  <?php  include("inc/footer.php");  
 

 ?><script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
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