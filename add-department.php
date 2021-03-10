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
  <title>CRM | Add Department Form</title>
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
            <h1>Department Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Department Form</li>
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
            //add department button
            if (isset($_POST['btn_add']))
            {
               
              $name = $_POST['name'];
             
              if($name == '')
              {
                echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Please make sure both required fields are filled </p> ";

              }
              else
              {
                $search_department = mysqli_query($conn,"SELECT * FROM tbl_department WHERE name ='$name' LIMIT 1") or die(mysqli_error());
                if($row_department = mysqli_fetch_assoc($search_department))
                {
                  echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Department Name is Already Exists ... Please Insert Another Department Name </p> ";
                }
                else
                {
                  $insert_department = mysqli_query($conn, "INSERT INTO `tbl_department`(`name`, `date`) VALUES ('$name', current_timestamp() )") or die("Query failed:4 ".mysqli_error());
                  echo "<p style='color: green; text-align: center; font-size: 18px;'>SUCCESS - Department Has Been Added Successfully...</p> ";
                    
                    echo '<script>setTimeout(function() { location.replace("add-department.php")},1000);</script>';
                }


              }

            }

            //Get URL ID
            if(isset($_GET['department_id']))
            {
              $dep_id = $_GET['department_id'];
              $fetch_department = "SELECT * FROM `tbl_department` WHERE dep_id = '$dep_id'";
    $run_department = mysqli_query($conn, $fetch_department);
    $row_depart2 = mysqli_fetch_array($run_department);
              $dep_name = $row_depart2['name'];
              
            }
            else{
              $dep_name = "";

            }


            //update department button
            if (isset($_POST['btn_update'])){

              if ($dep_name == null)
              {
                echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Select a Department first for Update </p> ";
              }
              else{

                $name = $_POST['name'];
               
                $update_query = "UPDATE `tbl_department` SET `name`='$name' WHERE `dep_id` = '$dep_id' ";

                if (mysqli_query($conn, $update_query)) {
                  echo "<p style='color: green; text-align: center; font-size: 18px;'>SUCCESS - Department Has Been Updated Successfully...</p> ";
                  echo '<script>setTimeout(function() { location.replace("add-department.php")},1000);</script>';
                } else {
                  echo "Error updating record: " . mysqli_error($conn);
                  echo "<p style='color: #d64141; text-align: center; font-size: 18px;'>ERROR - Updating Department </p> ";

                }





              }



            }

            ?>


            <div class="card card-primary">
              <div class="card-header " style="background-color:#2a3f54!important;color:white">
                <h3 class="card-title">Add Department</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="dep_form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Department Name</label><span style="color: red;">*</span>
                    <input type="text" name="name" class="form-control" value="<?php echo $dep_name; ?>" placeholder="Enter Department Name">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_update" class="btn btn-primary"  style=" float: left;  background-color:#000000!important; border-width:medium "> Update Department</button>
                  <button type="submit" name="btn_add" style=" float: right;  background-color:#000000!important; border-width:medium " class="btn btn-info">Add Department</button>
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



        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Departments</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Departmend ID</th>
                <th>Department Name</th>
             
                <th>Date Time</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php
            $query = "SELECT * FROM `tbl_department` ";
            $result = mysqli_query($conn, $query);

              if(mysqli_num_rows($result) > 0){

              while($row = mysqli_fetch_array($result)) {
                $id = $row['dep_id'];
                $name = $row['name'];
                $date = $row['date'];

              ?>

              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo ucfirst($name); ?></td>
                <td><?php echo date('M-d-Y h:i:sa',strtotime($date)); ?></td>
                <td>
                  <a href="add-department.php?department_id=<?php echo $id; ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil-alt"></i> Edit</a>
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
                <th>Departmend ID</th>
                <th>Department Name</th>
                <th>Date Time</th>
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

