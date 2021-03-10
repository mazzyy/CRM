<?php include("inc/db.php");
session_start(); 
  $user_id = $_SESSION['emp_id'];    
  $user_name = $_SESSION['u_name'];
  $dep_id=  $_SESSION['dep_id'];
  $dep_id=  $_SESSION['dep_id'];

  if ( $dep_id ) { 
  
  }else{
  
  echo '<script type="text/javascript">
        window.location.assign("500.html")
        
  </script> ';
  }

$id_sql=("SELECT id FROM `employess`WHERE `id`= $user_id");
$usertable = mysqli_query($conn, $id_sql);
$row = mysqli_fetch_array($usertable);
  $id_get = $row['0'];

  // if ( $dep_id ==!8) {
  //   echo '<script type="text/javascript">
  //           window.location.assign("../../index.php");
            
  //   </script>';
  //   }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendace</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress --> <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<style>
body,main{

    background: linear-gradient(rgba(255,255,255,.0), rgba(255,255,255,1)), url("inc/background.png")!important;
}
</style>
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
            <h1>Attendace</h1>
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
      <div class="card bg-light ">
        <div class="card-header border-top " style="background-color:#2a3f54!important;color:white">
          <h3 class="card-title  ">Time In and Out</h3>

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
          <form class="form-horizontal" method="post">
                          
          <button type="submit" name="timein" class="btn btn-outline-primary btn-lg">Time In</button>
                        
          <button type="submit" name="timeout" class="btn btn-outline-danger btn-lg" >Time Out</button>
                            
        </form>
        
            
        
        
        <br>
        <div class="table-responsive">
                  
                    <?php 
                
                 $today_date = date('Y-m-d');
                
   $today_attendace_record = " SELECT attendace.id, attendace.emp_id, employess.Shift_Start,employess.First_Name,attendace.date,`time_in`,`hours`,`time_out` FROM `shift` INNER JOIN attendace ON shift.attnd_id = attendace.id INNER JOIN employess ON attendace.emp_id = employess.id WHERE attendace.emp_id = '$id_get' AND date = '$today_date' ORDER BY shift.id DESC ";
                
                 $result = mysqli_query($conn, $today_attendace_record);
                
                // echo  $today_attendace_record;
                    while($row = mysqli_fetch_array($result)){
                    $att_id_get = $row['id'];
                    $uname_get = $row['First_Name'];
                    $date = $row['date'];
                    $time_in_get = $row['time_in'];
                    echo "<br>";
                    $time_out_get = $row['time_out'];
                    $hours=$row['hours'];
                    $Start_Shift=$row['Shift_Start'];
                     "shiftstart : ".$row['Shift_Start']."<br>";
                      $shiftstart =strtotime($row['Shift_Start']);
                      // echo  "shift:$shiftstart</br>";
                      $startTimeLate= $shiftstart + 300 ;
                    // echo "late=>";
                    $startTimeLatedate=date("h:i:sa", $startTimeLate);
                    
                  
                    //  " Out=> $time_out_get <br>";
                    //  "In=> $time_in_get <br>";
echo "<br>";
                           //timezone convert from us to pk In
             $in_convert_to_seconds = strtotime("$time_in_get");
            //  echo "in=".$in_convert_to_seconds;
                  $time_zone_difference = 36000;
                  $inp=date("h:i:sa", $in_convert_to_seconds + $time_zone_difference );
                  //timezone convert from us to pk Out
                  if(!empty($time_out_get)){
                  $time_out_get;
                  $out_convert_to_seconds = strtotime("$time_out_get");
                  $outp=date("h:i:sa", $out_convert_to_seconds + $time_zone_difference );
                  }
                  
                  //convert date in pk format

                $pkdate=  date('Y:m:d',strtotime( $inp));
                // echo  $time_in_get ."<=".date("h:i:sa", $startTimeLate );
                echo "<br>";
                // echo  $in_convert_to_seconds ."<=".  $startTimeLate;

             
                    
                    
                ?>
                              <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th width="15%">Location</th>
                                        <th width="15%">Username</th>
                                          <th width="15%">Date</th>
                                          <th width="15%">Time In</th>
                                          <th width="15%">Time Out</th>
                                          <th width="15%">Hours</th>
                    
                                      </tr>
                                    </thead>
                                    <tbody>
                  
                
                <tr>
                  <td>US</td>
                  <td><?php echo ucfirst($uname_get); ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $time_in_get; ?></td>
                  <td><?php echo $time_out_get;  ?></td>
                  <td><?php if($time_out_get == null){ echo "--"; } else { echo $hours;  } ?></td>
                  
                  
                
                </tr>
                <tr>
                <td>Pakistan</td>
                  <td><?php echo ucfirst($uname_get); ?></td>
                  <td><?php echo $pkdate; ?></td>
                  <td><?php echo $inp; ?></td>
                  <td><?php if(empty($outp)){ echo "--"; } else { echo $outp; }?></td>
                  <td><?php if($time_out_get == null){ echo "--"; } else { echo $hours;  } ?></td>
                  
                  
                
                </tr>
                         </tbody>
                                   
                  
                                   </table>
                
                
                  <?php } ?>
                       
             
                                 
                             
                                    
                                  
                                  
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
<!-- <script type="text/javascript">$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
toastr.error("Attendace Time In already be taken ....");
</script> -->
 <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 <?php
                
                  if(isset($_POST['timein']))
                  {
      
                        date_default_timezone_set("US/Eastern");

                        $datee = date('m/d/Y');
                        echo "$datee";
                        echo $_POST['timein'];

                        $today_date = date("Y-m-d", strtotime($datee));

                          //  "<script> alert($today_date) </script>";
                        $timeer =  date("h:i:sa");
                        $time = date("h:i:sa", strtotime($timeer));
                        $in_convert_to_seconds = strtotime("$time");

                    

                        $today_attendace_record = " SELECT `Shift_Start` FROM `employess` WHERE `id` =  $user_id";
                        echo  $today_attendace_record;
                        $result = mysqli_query($conn, $today_attendace_record);
                              //  echo "<script>alert('$in_convert_to_seconds')</script>";
                      // echo  $today_attendace_record;
                          while($row = mysqli_fetch_array($result)){
                        echo "shift=".$shiftstart =strtotime($row['Shift_Start']);
                        $startTimeLate= $shiftstart + 300 ;

                      }


                 // Attendance Status
                //  echo "<script>alert('$in_convert_to_seconds')</script>";
                //  echo "<script>alert('$in_convert_to_seconds')</script>";
                             $A=(int)$in_convert_to_seconds; 
                             $B=(int)$startTimeLate;
                    //   echo "<script>alert($A)</script>";
                    //  echo "<script>alert($B)</script>";
                if($A <  $B ){
                  echo date('h:i:sa',$in_convert_to_seconds);
                  echo ">".$startTimeLatedate;
                  echo $status="P";
//                  echo "<script>alert('yoo')</script>";

                  }
                  else{
                  echo $status="L";
                  echo date('h:i:sa',$in_convert_to_seconds);
                  echo ">".$startTimeLatedate;

                  }

         echo $abdf = "SELECT * FROM `employess` WHERE `id` ='$user_id' ";
         $qu1 =mysqli_query($conn, $abdf);
  // $rowe = mysqli_fetch_array($qu1);

 echo $abcd = "SELECT date FROM `attendace` where emp_id ='$id_get' and date ='$today_date'";
 $qu = mysqli_query($conn, $abcd);

if(mysqli_num_rows($qu)){

echo "<script type='text/javascript'>
 toastr.error('Attendace Time In already be taken ....')

 </script>";
}
else{

 
echo $attb = "INSERT INTO `attendace`(`emp_id`, `status`,`date`) VALUES ('$id_get','$status','$today_date')";
if (mysqli_query($conn, $attb)) {
 $last_id = mysqli_insert_id($conn);

          

       $time_in_insert = "INSERT INTO `shift`( `attnd_id`, `time_in`) VALUES ('$last_id','$time')";

     

          if (mysqli_query($conn, $time_in_insert)) {

          echo '<script type="text/javascript">
          toastr.success("Attendace Time In Added Successfully ...")
          </script>';


          date_default_timezone_set("Asia/Karachi");
          echo $datee = date("m-d-y h:i:sa",time()); 
          echo $sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$user_id','$ip','Successfully Added the Time in', '$datee' )";

                    if (mysqli_query($conn, $sqlQuery)) 
                    {
                      
                    }
            
          } 

}
else {
echo "Error: " . $time_in_insert . "<br>" . mysqli_error($conn);
}

}
}

else
{
echo "";
}




if(isset($_POST['timeout'])){


                 echo $_POST['timeot'];
                 echo "timeout";

date_default_timezone_set("US/Eastern");
                    
   $datee = date('m/d/Y');
   $today_date = date("Y-m-d", strtotime($datee));
    $timeer =  date("h:i:sa");
     echo $time = date("h:i:sa", strtotime($timeer));
    echo $time_in_get."<br>";
// time calculation
                     $start = strtotime($time_in_get);
                                        
                     $end = strtotime($timeer );

                    $totaltime = ($end- $start ); 

                    // echo "difference => $totaltime";

                    $hours = intval($totaltime / 3600);   
                    $seconds_remain = ($totaltime - ($hours * 3600)); 

                    $minutes = intval($seconds_remain / 60);   
                    $seconds = ($seconds_remain - ($minutes * 60)); 
                   $wert = $hours.":".$minutes.":".$seconds;
                    

    
// $sql=("SELECT time_out FROM `shift`INNER JOIN attendace ON shift.attnd_id= attendace.id where emp_id ='$id_get' and `date` = '$today_date'");
$abcd = mysqli_query($conn,"SELECT * FROM `shift`INNER JOIN attendace ON shift.attnd_id= attendace.id where emp_id ='$id_get' and `date` = '$today_date'");

$today_date;

$numrow = $abcd->fetch_row();
$nu = $numrow[3];



    if($nu == null) {
    

 

  $time_out_update = "UPDATE `shift` INNER JOIN attendace ON shift.attnd_id= attendace.id SET `time_out`='$time', `hours` = '$wert' WHERE emp_id ='$id_get' AND `date` = '$today_date'";


if (mysqli_query($conn, $time_out_update)) {

  echo  '<script type="text/javascript">
  window.location.href = "time.php";
  
  </script>';
echo  '<script type="text/javascript">
toastr.success("Attendace Time Out Added Successfully ...")


</script>';

// date_default_timezone_set("Asia/Karachi");
// $datee = date("m-d-y h:i:sa",time());
// $sqlQuery = "INSERT INTO `tbl_logging`() VALUES ('', '$user_id','$ip','Successfully Added the Time out', '$datee' )";

// if (mysqli_query($conn, $sqlQuery)) 
// {
  
// }

} // query conn end
else {
echo "Error: " . $time_out_update . "<br>" . mysqli_error($conn);
}

} // if query



else{

echo '<script type="text/javascript">
toastr.error("Attendace Time Out already be taken ....")
</script>';



}

} // isset end

?>
</body>
</html>
