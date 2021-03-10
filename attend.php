<?php include("inc/db.php");
session_start(); 
  $user_id = $_SESSION['u_id'];    
  $user_name = $_SESSION['u_name'];

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
  <!-- pace-progress --> <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

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
            <h1>Pace</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pace</li>
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
                
        <h3><b>Date :</b> <?php echo $today_date = date('m-d-Y'); ?></h3>
        
         <br>
          <form class="form-horizontal" method="post" >
                          
          <div class="row" style="padding-bottom: 1rem ;  ">

        <div class="col-3">
<?php   

$y = mysqli_query($conn,"SELECT DISTINCT YEAR(STR_TO_DATE(`date`,'%m-%d-%Y')) as year from attendace");
?>
        <select name="yrs" class="form-control up_provider_unit">

          <?php
                       while($row = mysqli_fetch_assoc($y)) {                     
                        echo "<option value='".$row["year"]."'>".$row["year"]."</option>";
                      } // /while 

                    ?>
        </select>

        </div>


        <div class="col-3">
<?php   

// $y = mysqli_query($conn,"SELECT DISTINCT YEAR(STR_TO_DATE(`date`,'%m-%d-%Y')) as year from attendace");
?>
        <select name="mth" class="form-control up_provider_unit">

        <option value=''>--Select Month--</option>
    <option selected value='1'>Janaury</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
        </select>

        </div>
<div class="col-3">
        <button type="submit" name="fetch" class="btn btn-block bg-gradient-primary btn-xs">Fetch</button>
             </div>           
          </div>
                            
        </form>
        
            
        
        
        <br>
        <div class="table-responsive">

<?php 
$list=array();

$month = 11;
$year = 2020;
$daed = '';
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
         $daed.=date('m-d-Y', $time);
}



if(isset($_POST['fetch']))
        { 
// $all= 'SELECT date from attendace where YEAR(STR_TO_DATE(`date`,"%m-%d-%Y")) = "2020" and month(STR_TO_DATE(`date`,"%m-%d-%Y")) ="11"';

$month = 11;
$year = 2020;
$daed;

$categorie1= '';
$fetch = 'SELECT tbl_users.u_name';
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
         $daed=date('m-d-Y', $time);
       $categorie1 .= ',MAX(CASE WHEN `date` = "'.$daed.'" THEN status  else "A" END) "'.$daed.'" ';
    '<br/> <br/>';
 
}


    
 





     
 


  $fetch .= $categorie1.'FROM
   attendace INNER JOIN tbl_users ON attendace.u_id = tbl_users.u_id GROUP BY tbl_users.u_name ORDER BY tbl_users.u_name
';
if ($flet = mysqli_query($conn, $fetch)) {

?>
<div class="container">
            <div class="row">
                <!-- </div>filter end.// -->
        <div class="col-md-12 col-sm-12" >
         <div class=" table-responsive">
         <table>

          <th>name</th>
<?php 
$month = 11;
$year = 2020;
$daed;

$categorie1= '';
$fetch = 'SELECT  `status`';
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
         $daed=date('D', $time);
       
    echo " <th> ".$daed."</th> ";
 
}


while ($row = mysqli_fetch_array($flet)) 
{ ?>

<tr>
 <?php  for($d=0; $d<=31; $d++)
{ ?>
  <td> <?php echo $row [$d]; ?> </td>
 <?php  } ?>
</tr>



  <?php
}
?>
</table>
</div>
<?php //echo $schh_queryele;

?>
</div>
</div>
</div>


<?php  



}


else {
        echo "Error 1: " . $fetch . "<br>" . mysqli_error($conn);
                      
                      }
}


//isset
 ?>


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
</body>
</html>