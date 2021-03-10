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

  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress --> <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">

</head>
<style>

  tbody,td{

    /* height: 130px ; */
    height: 100px;
    font-size: 11px;
    font-weight: bold; }
  }

  table{

    border-radius: 25px;

  }
  
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


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
            <button type="button" class="btn btn-tool" data-card-widget="collapse"  title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

         <div style="text-align: center; padding: 10px;" class="x_content">
    <!-- time table
                  -->

<<<<<<< HEAD
<<<<<<< HEAD
=======
                  <!-- <table class="table table-bordered"> -->
  <form action="" class="form-inline " method="GET">          
          <select name="year" class=" form-control up_provider_uni">

                      <option value=''>--Select Month--</option>
                      <option selected value='2020'>2020</option>
                      <option value='2021'>2021</option>
                      <option value='2022'>2022</option>
                      <option value='2023'>2023</option>
                      <option value='2024'>2024</option>
                      <option value='2025'>2025</option>
                      <option value='2026'>2026</option>
                      <option value='2027'>2027</option>
                      <option value='2028'>2028</option>
                      <option value='2029'>2029</option>
                      <option value='2030'>2030</option>
                    
        </select>
  
  
  
          <select name="mth" class=" form-control up_provider_uni">

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
   <button name='btn-fetch' type="submit" class=" ml-2 btn btn-success"> Fetch</button>

  </form>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
          <?php
=======
>>>>>>> d30f177089c6453d8f0f0cf94b352d3556e816b6
                  <table class="table table-bordered">


<?php

$user = ("SELECT * FROM `tbl_users` WHERE 1"); 
$user = mysqli_query($conn, $user);














if ($user->num_rows > 0) {
    // output data of each row
 $usernames=array();
$i=0;
    while($row = $user->fetch_assoc()) {
        
        $user_id= $row['u_id'];
        // echo $user_id;
        $y = ("SELECT * FROM `tbl_users` WHERE `u_id` = $user_id ");
        $result = mysqli_query($conn, $y);
        



        echo '<table class="table">
        <tbody>
          <tr>';
<<<<<<< HEAD
            

        while($row2 = $result->fetch_assoc()) {
          
            //    echo "<br>". $row2['u_name'];
            

            //current user
            $userid=$row2['u_id'];
            echo "<td>".$row2['u_name']."</td>"; 
            
            $userattendance = ("SELECT * FROM `attendace` WHERE `u_id` = $userid ");
            $result = mysqli_query($conn, $userattendance);

=======
                  <!-- <table class="table table-bordered"> -->
  <form action="" class="form-inline " method="GET">          
          <select name="year" class=" form-control up_provider_uni">

                      <option value=''>--Select Month--</option>
                      <option selected value='2020'>2020</option>
                      <option value='2021'>2021</option>
                      <option value='2022'>2022</option>
                      <option value='2023'>2023</option>
                      <option value='2024'>2024</option>
                      <option value='2025'>2025</option>
                      <option value='2026'>2026</option>
                      <option value='2027'>2027</option>
                      <option value='2028'>2028</option>
                      <option value='2029'>2029</option>
                      <option value='2030'>2030</option>
                    
        </select>
  
  
  
          <select name="mth" class=" form-control up_provider_uni">

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
   <button name='btn-fetch' type="submit" class=" ml-2 btn btn-success"> Fetch</button>

  </form>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
          <?php
>>>>>>> 4487d18caed37ee24b86182b04d85fcd7b86e79e
=======
>>>>>>> d85933b14de241e23924464bf39eff28d209cebb
>>>>>>> d30f177089c6453d8f0f0cf94b352d3556e816b6
            



            // $lastattendance = ("SELECT * FROM `attendace` ORDER BY `date` DESC LIMIT 1"  );
            // $lastattendance = mysqli_query($conn, $lastattendance);
            // $row4 = $lastattendance->fetch_assoc();
            // $lastdate=$row4['date'];
          // echo $lastdate;

          $user = ("SELECT * FROM `employess` "); 
          $user = mysqli_query($conn, $user);


          //table start
          echo '<table class="table-responsive rounded table scrollbar scrollbar-primary overflow-auto  table table-striped table-bordered table-sm" cellspacing="0" >
                  <tbody >';
                    
                  if(isset($_GET['btn-fetch'])){
                        
                    $year=$_GET['year'];
                  
                    $selectdate=$_GET['mth'];
                
                   


                   if(isset($_GET['date'])  &&   isset($_GET['id'])   ){
                    $id= $_GET['id'];
                    $date=$_GET['date'];
                    $status=$_GET['status'];
                    $StatusOfO = ("INSERT INTO `attendace`(`id`, `emp_id`, `status`, `date`) VALUES (NULL,'$id','$status','$date')"  );
                    $insertStatusOfO = mysqli_query($conn, $StatusOfO);
                       
                  }
                  
            
                  if(isset($_GET['id'])){
                    $id= $_GET['id'];
                
                    $status=$_GET['status'];

                  
                    $StatusOfO = ("UPDATE `attendace` SET `status`= ' $status' WHERE `id` = $id"  );
                    $insertStatusOfO = mysqli_query($conn, $StatusOfO);
                       
                  }


                  }

             


                  // calculate total number of days in a month


                  if(!empty($selectdate)){
                  $days_in_a_month=cal_days_in_month(CAL_GREGORIAN,$selectdate,$year);
                  //find day from date
            

                  $i=0;
                  echo "<tr class='bg-info'>";
                  echo "<th class='bg-light'><br>EMPLOYEES</th>";
                  for($i=1;$i<=$days_in_a_month;$i++)
                  {
                
                    $date=$year."-".$selectdate."-$i";
                    $timestamp = strtotime($date);
                    $day = date('D', $timestamp);
                    
            
                  echo "<th>".$i."<br>". $day."<br></th>";
                

                  };
               
                
                  echo "</tr>";
                  
          if ($user->num_rows > 0) {
              // output data of each row

          $i=0;
              while($row = $user->fetch_assoc()) {
                  
                  $user_id= $row['id'];
                  // echo $user_id;
                  $y = ("SELECT * FROM `employess` WHERE `id` = $user_id ");
                  
                  $result = mysqli_query($conn, $y);
                          
                      echo '</tr>';

                      

                  while($row2 = $result->fetch_assoc()) 
                  {
                  
                      //    echo "<br>". $row2['u_name'];
                      
                  




                      

                          //current user
                          $userid=$row2['id'];
                          echo "<td width='200' class='bg-info'  rowspan='1' >"."<div class='h4'>".$row2['First_Name'].'</div>'.  "</td>"; 
                                
                          $userattendance = ("SELECT * FROM `attendace` WHERE `emp_id` =  $userid AND MONTH(date) = '$selectdate' AND YEAR(`date`)= $year  ORDER BY `date`"  );
                          
                          $resultattendace = mysqli_query($conn, $userattendance);
                          
          

                              if(mysqli_num_rows($resultattendace))
                              {
                                $i=1;
                                          while($row3 = $resultattendace->fetch_assoc()) 
                                          {            
                                            //  echo $row3['date'].'<br>';
                                                
                                            $t = ("SELECT * FROM `shift` where `attnd_id`= '$row3[id]' "  );
                                            $s= mysqli_query($conn,$t);
                                            $shift = $s->fetch_assoc();

                                            // $datetimeObj1 = new DateTime($shift['time_in']);
                                            // $datetimeObj2 = new DateTime($shift['time_out']);
                                            // $interval = $datetimeObj1->diff($datetimeObj2);
                                            // $hour2 = $interval->format('%h');
                                            $totalHour=0;
                                            
                                                        //break date into year month and day

                                                      list($y, $m, $d) = explode('-',  $row3['date']);
                                                      
                                                  
                                                      
                                                
                                                    for($j=$i;$j<=$d;$j++)
                                                      {
                                                      
                                                          if($j==$d){
                                                            // $ints = $shift['hours'];
                                                            // $totalH += $ints;
                                                            // echo $totalH;
                                                            $dateOff=$y."-".$m."-".$d;
                                                            $dd=$row3['id'];
                                                            $idd= "$dd-$dateOff";
                                                            // echo " <td >".$d.$row3['status'].'-'.$row3['emp_id']."</td>"; $row3['status']
                                                            // echo "<td ><form  class='formtt'><input  id='$y-$m-$j-$user_id' name='inputbtn'  class='btn ' type='submit' value='O'  data-toggle='modal' data-target='#myModal'></form></td> ";   
                                                            echo " <td class='text-center text-uppercase   ' >".
                                                            '<div >'."<form  class='formupdate'><input  id='$idd'".
                                                            " name='inputbtn'  class='btn border-bottom rounded-0 w-100' type='submit' value=".
                                                            $row3['status'].
                                                            "  data-toggle='modal' data-target='#myModal'> </form>".
                                                            '</div><div class=" rounded-0 w-100">'.$shift['time_in'].
                                                            '</div><div class=" rounded-0 w-100">'.$shift['time_out'].
                                                            '</div>'.
                                                            '<div >'.
                                                            $shift['hours'].
                                                            '</div>'."</td>"; 
                                                            $i++;        
                                                      
                                                            }
                                                          else{
                                                            // $attendance_id=$row3['id']; 
                                                            $i++;
                                                            $dateOff=$y."-".$m."-".$d;
                                                            
                                                           
                                                            //  if-exist condiction
                                                            //  $ifexisit = ("SELECT * FROM attendace WHERE `date` = '$dateOff' AND '$userid'= $userid;"  );
                                                          
                                                            //  $ifexisit = mysqli_query($conn, $ifexisit);
                                                            //  if( $ifexisit==NULL){
                                                            //    echo "nul";
                                                            //  }
                                                                              
                                                            // echo "<td name='namestatus' id='$dateOff' data-toggle='modal' data-target='#myModal'>O</td>";
                                                            echo "<td ><form  class='formtt'><input  id='$y-$m-$j-$user_id' name='inputbtn'  class='btn border-bottom rounded-0 w-100' type='submit' value='O'  data-toggle='modal' data-target='#myModal'></form></td> ";
                                                          
                                                          }
                                                          
                                                       
                                                      }
                                                      

                                          }
                          }
                              else{
                                  
                                      //  echo "0";
                                                  
                                  }

                  }
          //

          // $totalHoursQuery=("SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` = $userid  and MONTH(date) = '$selectdate' ORDER BY `attendace`.`date` ASC");

          // $totalHoursQ = mysqli_query($conn, $totalHoursQuery);
                          
          // $tthr = mysqli_fetch_array($totalHoursQ);
          // $sumdate=$totalHoursQuery->fetch_assoc($totalHoursQuery);



          // echo "<td>$tthr[0]</td>";
                echo '</tr>';
                
                  }
          }
          //end table
          echo '</tbody>
          </table>';
            $usernames[$i]= '<th>'.$row2['u_name'].'</th>';
          $i++;


                  }


          


            
       

          
    echo "</div>
      <div class='col-1'>
        <table class=' table scrollbar scrollbar-primary overflow-auto  table table-striped table-bordered table-sm' cellspacing='0'>
          
          <thead class='bg-info'><tr> <th style='    font-size: 11px;' >Total Hours</th>
                  </thead>
          <tbody>";
          

$w=("SELECT * FROM `employess`");
$r = mysqli_query($conn,$w);




while($usertotal = mysqli_fetch_array($r)){ 

if(!empty($selectdate)){
$totalHoursQuery=("SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` =".$usertotal['id']."  and MONTH(date) = '$selectdate' ORDER BY `attendace`.`date` ASC");

$totalHoursQ = mysqli_query($conn, $totalHoursQuery);
               
$tthr = mysqli_fetch_array($totalHoursQ);
            echo "<tr >
              <td  class='pt-4' ><input type='submit' class='btn btn-link'value=''>$tthr[0]</td>
            </tr>";

           
 }
}

            ?>
          </tbody>
        </table>
        
      </div>
  </div>
</div>
 

            
 <!-- table 2        -->
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
  <form method="GET">
    <?php
      echo '<div class="form-group">';
  
      echo  '<input type="hidden" name="date" class="form-control" id="attendanceValue" aria-describedby="emailHelp" >';
      echo '<input type="hidden" name="year" class="form-control" id="year"value="$y" aria-describedby="emailHelp" >';
      echo   '<input type="hidden" name="mth" class="form-control" id="month" value="$m"aria-describedby="emailHelp" >';
      echo   '<input type="hidden" name="id" class="form-control" id="id" value="$m"aria-describedby="emailHelp" >';
      echo   '<input type="hidden" name="btn-fetch" class="form-control"  value="$m"aria-describedby="emailHelp" >';

      echo '<h1 id="testing" ></h1>';

      echo " <select name='status' class=' form-control up_provider_uni'>
                  <option selected value=''>--Select Status--</option>
                  <option value='O'>O</option>
                  <option value='P'>P</option>
                  <option value='HD'>HD</option>
                  <option value='L'>L</option>
                  <option value='LT'>LT</option>
              </select>";

     echo "</div>";
     
      ?>
      
    
      <button name="changeStatusBtn" type="submit" class="btn btn-primary">Submit</button>
</form> 



      </div>
     
    </div>

  </div>
</div>  
 <div>
<!-- Trigger the modal with a button -->


<!-- Modal -->


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
<script src="js/custom.js"></script>


<script type="text/JavaScript">
$(document).ready(function () {
  $('form.formtt' ).click(function () {

event.preventDefault();


var res = event.target.id.split("-");
document.getElementById("testing").innerHTML =  res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("attendanceValue").value =   res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("id").value =  res[3];
document.getElementById("year").value =  res[0];
document.getElementById("month").value =  res[1];
  console.log( res[0]);
  
  });

  $('form.formupdate' ).click(function () {

event.preventDefault();


var res = event.target.id.split("-");
// document.getElementById("testingupdate").innerHTML =  res[0]+"-"+res[1]+"-"+res[2];
// document.getElementById("attendanceValue").value =   res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("id").value = res[0];
document.getElementById("year").value =  res[1];
document.getElementById("month").value =  res[2];
console.log(event.target.id);

  
  });



});
</script>

</script>

</body>
</html>
<?php 
 $conn->close();

?>




<!-- SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` = 2  and date= MONTH(2020-12-03) ORDER BY `attendace`.`date` ASC -->