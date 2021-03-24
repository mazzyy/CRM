<?php include("inc/db.php");
session_start(); 
  $user_id = $_SESSION['u_id'];    
 $user_name = $_SESSION['u_name'];
  $dep_id=  $_SESSION['dep_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendace </title>
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
    /* font-weight: bold;  */
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
            <h1>CIK </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendace </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header"style="background-color:#2a3f54!important;color:white">
          <h3 class="card-title" >WEEKLY REPORT </h3>

          

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

                  <!-- <table class="table table-bordered"> -->
  <div class="row">
<div class="col-7">
  <form action="" class="form-inline " method="GET" >          
          <select name="year" class=" form-control up_provider_uni">

                      <option value=''>--Select Month--</option>
                      <option  value='2020'>2020</option>
                      <option selected value='2021'>2021</option>
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
  </div>   
  <div class="col-4">
  <a    class="btn btn-info  h-50 w-100 pt-0 pb-4 " style=" width:100%; float: right;  background-color:#000000!important; border-width:medium " href="schedule.php"><i  class="far fa-arrow-alt-circle-right"><b>ATTENDANCE REPORT</b></i></a> 
  </div>    

 <div class="col-1 p-0 m-0">
  <?php 
  if(isset($_GET['year'])){
        $year=$_GET['year'];
                          
        $selectdate=$_GET['mth'];
          echo '<a href="cikweeklyreportprint.php?year='. $_GET['year'].'&mth='.$_GET['mth'].'&btn-fetch=" rel="noopener" target="_blank" class="btn btn-default h-50 w-50  text-primary"style="width:50%;" ><i class="fas fa-print"></i></a>';
          echo '<a href="cikweeklyreportexcel.php?year='. $_GET['year'].'&mth='.$_GET['mth'].'&btn-fetch=" rel="noopener" target="_blank" class="btn btn-default h-50 text-success "style="width:50%;" ><i class="far fa-file-excel"></i></a>';
  }
   ?>
   </div>
  </div>  
  

<div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
          <?php
            
          


            // $lastattendance = ("SELECT * FROM `attendace` ORDER BY `date` DESC LIMIT 1"  );
            // $lastattendance = mysqli_query($conn, $lastattendance);
            // $row4 = $lastattendance->fetch_assoc();
            // $lastdate=$row4['date'];
          // echo $lastdate;

          $user = ("SELECT * FROM `employess` where Dep_id = 8 "); 
          $user = mysqli_query($conn, $user);


          //table start
          
          echo '<table class=" table-responsive items rounded table scrollbar scrollbar-primary overflow-auto  table table-striped table-bordered table-sm" cellspacing="0" >
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

                                //sundays in a month
                                
                                $begin = new DateTime(''.$year.'-'.$selectdate.'-01');
                                $end = new DateTime(''.$year.'-'.$selectdate.'-'. $days_in_a_month.'');
                                $end = $end->modify('+1 day');
                                $interval = new DateInterval('P1D');
                                $daterange = new DatePeriod($begin, $interval, $end);
                                $sundaysarray=array();
                                $i=0;
                                foreach ($daterange as $date) {
                                    $sunday = date('w', strtotime($date->format("Y-m-d")));
                                    if ($sunday == 0) {
                                     $sudnaysdate=$date->format("Y-m-d") . "<br>";
                                        $sundays= (explode("-",$sudnaysdate));
                                        $sundays=$sundays[2];
                                        $sundaysarray[$i]=$sundays;
                                        $i++;
                                    } else {
                                        echo'';
                                    }
                                }
                                // print_r($sundaysarray);
                          
                              


                  //find day from date
            

                  $i=0;
                  $j=0;
                  $x=0;
                  $sundayslength =count($sundaysarray);
                  // $sundayslength=$sundayslength-1; 
                  echo "<br>";
                  echo "<tr class='bg-info'>";
                  echo "<th class='bg-light'><br>EMPLOYEES</th>";
                  // $dayMonday=1;
//check lastday
                  

                  $lastdate=$year."-".$selectdate."-$days_in_a_month";
                  $lastday = strtotime($lastdate);
                  $lastday = date('D', $lastday);
                  

                  for($i=1;$i<=$days_in_a_month;$i++)
                  {
                
                    $date=$year."-".$selectdate."-$i";
                    $timestamp = strtotime($date);
                    $day = date('D', $timestamp);
               
                                          for( $j=0;$j<$sundayslength;$j++ ){
                                        
                                                                  if($i==(int)$sundaysarray[$j]){
                                                                  //  echo "$i"."-".$sundaysarray[$j];
                                                                   $x=(int)$sundaysarray[$j];
                                                                    echo    "<th class='border-right bg-info style='   border-right-style: groove; border-right-color: coral; border-right-width: 7px;' '>".$i."<br>". $day."<br></th>";
                                                                    echo    "<th class='bg-primary '>Weekly</th>";
                                                                  }else{
                                                                     
                                                                      
                                                                      
                                                                  }
                                                                  
                                              }
                                            
                                              if($i==$x){}else{   echo "<th>".$i."<br>". $day."<br></th>";}
                                           
                                     

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
                    $sxy=0;
                    $dayMonday=1;
                  
                  

                          //current user
                          $userid=$row2['id'];
                          echo "<td width='200' class='bg-info'  rowspan='1' >"."<div class='h4'>".ucfirst($row2['First_Name']).'</div>'.  "</td>"; 
                                
                          $userattendance = ("SELECT * FROM `attendace` WHERE `emp_id` =  $userid AND MONTH(date) = '$selectdate' AND YEAR(`date`)= $year  ORDER BY `date`"  );
                          
                          $resultattendace = mysqli_query($conn, $userattendance);
                          
          

                              if(mysqli_num_rows($resultattendace))
                              {
                                $i=1;

                                
                                          while($row3 = $resultattendace->fetch_assoc()) 
                                          {            
                                            
                                                
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
                                                    
                                                  
                                                      
                                                         $k=0;
                                                         
                                                          $datemondy=$y."-".$m."-". $dayMonday;
                                                    for($j=$i;$j<=$d;$j++)
                                                      {
                                                        
                                                       
                                                          if($j==$d){
                                                           
                                                            $dateOff=$y."-".$m."-".$d;
                                                            $dd=$row3['id'];
                                                            $idd= "$dd-$dateOff";
                                                           
                                                            echo " <td class='text-center text-uppercase   ' >".
                                                            '<div >'."".
                                                            '</div><div class=" rounded-0 w-100 border-bottom ">';
                                                            if(!empty($shift['time_in'])){
                                                            echo $shift['time_in'];
                                                            }

                                                            echo '</div><div class=" rounded-0 w-100 border-bottom">';
                                                            if(!empty($shift['time_out'])){
                                                              echo $shift['time_out'];
                                                              }
                                                            
                                                         echo  '</div>'.
                                                            '<div >';
                                                            if(!empty($shift['hours'])){
                                                              echo "<br>";
                                                              echo $shift['hours'];
                                                              }
                                                            
                                                          echo  '</div>'."</td>"; 
                                                            $i++;        
                                                      
                                                            }
                                                                    
                                                          else{
                                                            // $attendance_id=$row3['id']; 
                                                            $i++;
                                                            $dateOff=$y."-".$m."-".$d;

                                                            echo "<td > </td> ";
                                                          
                                                          }
                                                        
                                                         

                                                          for( $k=0;$k<$sundayslength;$k++ ){
                                                         
                                                         
                                                         
                                                            if($i==(int)$sundaysarray[$k]+1){
                                                             
                                                            $dateOff=$y."-".$m."-".$d;
                                                          
                                                            $dateSundayLast=$y."-".$m."-".(int)$sundaysarray[$k];
                                                              // echo (int)$sundaysarray[$k];
                                                        
                                                              $dd=$row3['id'];
                                                              $idd= "$dd-$dateOff";
                                                             
                                                           
                                                           $totalHoursQuery=("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `hours` ) ) ) AS total_time FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `date`  BETWEEN '$datemondy' AND '   $dateSundayLast and `emp_id`=4'  AND `emp_id` = $userid ");
                                                      
                                                        
                                                              $dayMonday=(int)$sundaysarray[$k]+1;
                                                           
                                                              $totalHoursQ = mysqli_query($conn, $totalHoursQuery);
                                                                             
                                                              $tthr = mysqli_fetch_array($totalHoursQ);

                                                              echo " <td class='text-center text-uppercase  bg-danger ' ><br><br><br><strong>". $tthr[0].'</strong><div class="">
                                                              </div><div class=" rounded-0 w-100">';   
                                                          
                                                               
                                                            }
  
                                                          }

                                                          
                                                          
                                                       
                                                      }
                                                      

                                          }
                          }
                        
                          if('Sun'!=$lastday AND  $sxy==0){
                     
                           if(!empty($datemondy)){
                            $lasttotalHoursQuery=("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `hours` ) ) ) AS total_time FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `date`  BETWEEN '$datemondy' AND '     $lastdate and `emp_id`=4'  AND `emp_id` = $userid ");
                                                      
   
                         
                          $totalHoursQ = mysqli_query($conn, $lasttotalHoursQuery);
                                                                             
                          $tthr = mysqli_fetch_array($totalHoursQ);

                            echo " <td class='text-center text-uppercase bg-danger ' ><br><br><br><strong>". $tthr[0].'</strong><div class="">
                            </div><div class=" rounded-0 w-100">';   
                        
                            $sxy=1;
                           }
                          }
                  }
 
                echo '</tr>';
                
                  }
          }
          //end table
          echo '</tbody>
          </table>';
           
          $i++;


                  }


          


            
       

          
    echo "</div>
      <div class='col-1'>
      <br>
        <table class=' table scrollbar scrollbar-primary   table table-striped table-bordered table-sm' cellspacing='0'>
          
          <thead class='bg-info'><tr> <th style='    font-size: 11px;' >";
          if(isset($_GET['year'])){
            echo "Total Hours";
             }
          "</th>
                  </thead>
          <tbody>";
          

$w=("SELECT * FROM `employess` where Dep_id = 8 ");
$r = mysqli_query($conn,$w);




while($usertotal = mysqli_fetch_array($r)){ 

if(!empty($selectdate)){
//  $totalHoursQuery=("SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` =".$usertotal['id']."  and MONTH(date) = '$selectdate' ORDER BY `attendace`.`date` ASC");
  $totalHoursQuery=("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `hours` ) ) ) AS total_time FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` =".$usertotal['id']." and MONTH(date) = '$selectdate'  AND YEAR(`date`)= $year ORDER BY `attendace`.`date` ASC");

$totalHoursQ = mysqli_query($conn, $totalHoursQuery);
               
$tthr = mysqli_fetch_array($totalHoursQ);
            echo "<tr >
              <td style=' padding-top:20%;' class='pt-4 ' ><br><br><br><br><b>$tthr[0]</td>
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
  // document.body.style.zoom="75%"
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


<script>

const slider = document.querySelector('.items');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 1; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});

</script>

</body>
</html>
<?php 
 $conn->close();

?>





<!-- SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` = 2  and date= MONTH(2020-12-03) ORDER BY `attendace`.`date` ASC -->