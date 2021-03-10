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
  <title>Attendace</title>
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
    @page {
  size: auto;
}
    

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

                                                              echo " <td class='text-center text-uppercase  ' ><br><br><br><strong>". $tthr[0].'</strong><div class="">
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
                               
                         
                                                        
                        
                            echo " <td class='text-center text-uppercase  bg-light '><br><br><br><strong>". $tthr[0].'</strong><div class="">
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


          


            
       

   

?>
          </tbody>
        </table>
        

            
 <!-- table 2        -->




<!-- Trigger the modal with a button -->


<!-- Modal -->


<script src="plugins/jquery/jquery.min.js"></script>
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

<script>


</script>
<script src="plugins/jquery/jquery.min.js"></script>
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
      window.onload = function() { window.print(); }
});
</script>



</body>
</html>
<?php 
 $conn->close();

?>





<!-- SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` = 2  and date= MONTH(2020-12-03) ORDER BY `attendace`.`date` ASC -->