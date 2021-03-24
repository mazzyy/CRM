<?php

include("inc/db.php");
session_start();
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
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>
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
              <li class="breadcrumb-item active">Add Lead Status Form</li>
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
                <h3 class="card-title">Add New Lead Status</h3>
              </div>
              <!-- /.card-header -->
              
    <?php
            
                
                    
            
            
    
                
    ?>
              
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                     <select name="up_status_unit" class="form-control up_status_unit">
            <option value=""></option>
            <?php echo lead_status($connect); ?>
          </select>
                  </div>  
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
            <?php
                    
                    
                                      
            ?>
                  <button type="submit" name="reg" class="btn btn-outline-primary" style="float: right; ">Register</button>
                  
                  <?php  ?>
                </div>
              </form>
            </div>
            <!-- /.card -->

  
<?php

               if(isset($_POST['reg'])){
                   
                   $username = $_POST['up_status_unit'];
                  
                   
                   
                   $sql = "INSERT INTO `lead-edit` ( `name`, `date`) VALUES ('$username',current_timestamp() )";
										
                  if (mysqli_query($conn, $sql)) {

                        echo '<script type="text/javascript">
                                swal("", "Lead Status has been Added Successfully ...", "success");
                                </script>';
                      
                      $username = "";
                  
                      

                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                      <th width="10%">Lead Status_ID</th>
                      <th width="20%">UserName</th>
                      <th>Date</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                
                   
<?php
                    
$users_query = "SELECT `id`, `name`,`date` FROM `lead-edit`";      

$result = mysqli_query($conn, $users_query);
                               
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){
       $lest_id = $row[0];
        $lest_name = $row[1];
        $lest_date = $row[2];
       
                      
?>
                 <tr>
                                      
                    <td><?php echo $lest_id; ?></td>
                   <td><?php echo $lest_name; ?></td>
                    <td><?php echo $lest_date; ?></td>
                    
                    <td>
                        
                    <a href="editable.php?proID=<?php echo $lest_id; ?>" title="Delete" class="btn btn-danger btn-sm">Delete</a>
                     
                    </td>
                    
                     </tr>
                    
                    <?php
                      
            }
    
}
                      
                      ?>
                    
                 
          
                  </tbody>
                
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
                    
function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
var p = document.getElementById('pwd');
p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } 
    else {
        pwShown = 0;
        hide();
    }
}, false);
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
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
