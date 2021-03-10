<?php
include("inc/db.php");
session_start();

$_SESSION['u_id'];    
$_SESSION['u_name'];
 $des_id = $_SESSION['des_id'];
  $dep_id=  $_SESSION['dep_id'];
 if ( $dep_id == 1 or $dep_id == 2  ) { 
 
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
  <title>CRM | Add Designation Form</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar Start -->

  <?php require_once('inc/header.php'); ?>

<!--Navbar End -->


  <!-- Sidebar Start -->

  <?php require_once('inc/sidebar.php'); ?>
  <!-- Sidebar End -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Designation Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Designation Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-2"></div>

          <div class="col-md-8">
            <!-- general form elements -->




            <?php
            //add designation button

        if(isset($_POST['btn_add']))
        {
            $department = $_POST['department'];
            $designation = $_POST['designation'];
              
            if ($department == '' || $designation == '') {
                echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Please Make Sure Required Fields Are Filled </p> ";

              }
              else {
                $search_designation = mysqli_query($conn, "SELECT * FROM tbl_designation WHERE name ='$designation' AND dep_id = '$department' LIMIT 1") or die(mysqli_error());
                if ($row_designation = mysqli_fetch_assoc($search_designation)) {
                  echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Department Name and Designation is Already Exists ... Please Insert Another Designation Name </p> ";
                } else {
                  $insert_designation = mysqli_query($conn, "INSERT INTO `tbl_designation`(`name`, `dep_id`, `date`) VALUES ('$designation','$department', current_timestamp() )" ) or die("Query failed " . mysqli_error());
                  echo "<p style='color: green; text-align: center; font-size: 18px;'>SUCCESS - Designation Has Been Added Successfully...</p> ";
                    
                     echo '<script>setTimeout(function() { location.replace("add-designation.php")},1000);</script>';
                }

              }
        }
              

 

              if(isset($_GET['designation_id']))
              {
                $des_id = $_GET['designation_id'];
                  
                $fetch_department = "SELECT des_id, tbl_designation.name, tbl_department.name AS department, tbl_designation.dep_id FROM `tbl_designation` INNER JOIN tbl_department ON tbl_department.dep_id = tbl_designation.dep_id WHERE des_id = '$des_id'";
    $run_department = mysqli_query($conn, $fetch_department);
    $row_depart2 = mysqli_fetch_array($run_department);
                $des_id_fetch = $row_depart2['des_id'];
                $des_name_fetch = $row_depart2['name'];
                  $dep_name_fetch = $row_depart2['department'];
                  $dep_id_fetch = $row_depart2['dep_id'];
                  
              }
      
              
               if(isset($_POST['btn_update'])){
               
                    $department = $_POST['department'];
                    $designation = $_POST['designation'];
                  
                   $update_query = "UPDATE `tbl_designation` SET `name`='$designation',`dep_id`='$department' WHERE des_id = '$des_id' ";

                if (mysqli_query($conn, $update_query)) {
                  echo "<p style='color: green; text-align: center; font-size: 18px;'>SUCCESS - Designation Has Been Updated Successfully...</p> ";
                  echo '<script>setTimeout(function() { location.replace("add-designation.php")},1000);</script>';
                } 
                else{
                  echo "Error updating record: " . mysqli_error($conn);
                  echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Updating Designation </p> ";

                }
                  
                  
                  
              }




            ?>


           <?php ?>
            <div class="card card-primary">
              <div class="card-header" style="background-color:#2a3f54!important;color:white">
                <h3 class="card-title">Add Designation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="dep_form" method="post">
                <div class="card-body">
                  
                   <div class="form-group">
                    <label>Select Department</label><span style="color: red;">*</span>
                    <select name="department" class="form-control">

                     <option value="<?php echo $dep_id_fetch; ?>"><?php if(isset($dep_name_fetch)){ echo $dep_name_fetch; } else {echo "Select Department"; } ?></option>
                      <?php

                      $select_deparment = "SELECT * FROM `tbl_department` ";
                      $department_result = mysqli_query($conn, $select_deparment);

                      while($data = mysqli_fetch_array($department_result)){

                      ?>
                      <option value="<?php echo $data['dep_id'] ?>">

                        <?php

                        echo ucfirst($data['name']);
                        }


                        ?>
                      </option>

                    </select>
                  </div>
                  
                   
                    <div class="form-group">
                    <label>Designation Name</label><span style="color: red;">*</span>
                    <input type="text" name="designation" class="form-control" value="<?php if(isset($des_name_fetch)){ echo $des_name_fetch; } else {echo ""; } ?>" placeholder="Enter Department Name">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_update" class="btn btn-info" style=" float: left;  background-color:#000000!important; border-width:medium ">Update Department</button>
                  <button style=" float: right;  background-color:#000000!important; border-width:medium " type="submit" name="btn_add" class="btn btn-primary" >Add Department</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->
          <!-- right column -->



          <div class="col-md-2">

          </div>

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        
        <?php 
          
  
          
          ?>



        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Departments</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Designation ID</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              
              <?php
            $query = "SELECT des_id, tbl_designation.name, tbl_department.name AS department, tbl_designation.dep_id FROM `tbl_designation` INNER JOIN tbl_department ON tbl_department.dep_id = tbl_designation.dep_id ";
            $result = mysqli_query($conn, $query);

              if(mysqli_num_rows($result) > 0){

              while($row = mysqli_fetch_array($result)) {
                $des_id = $row['des_id'];
                $name = $row['name'];
                $department = $row['department'];
                //$dep_id = $row['dep_id'];
                  

              ?>

              <tr>
                <td><?php echo $des_id; ?></td>
                <td><?php echo ucfirst($name); ?></td>
                <td><?php echo $department; ?></td>
                
                <td>
                  <a href="add-designation.php?designation_id=<?php echo $des_id; ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil-alt"></i> Edit</a>
                  |
                  <a href="" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>

              <?php
                  }

              }
              else{
                echo "Record Not Found";
              }
              ?>


       

              </tbody>
              <tfoot>
              <tr>
               <th>Designation ID</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->







      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php require_once('inc/footer.php'); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

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

</body>
</html>

