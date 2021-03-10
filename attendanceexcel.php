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
<body class="hold-transition sidebar-mini pace-primary">


<!-- Site wrapper -->
<div class="wrapper">





<div class="container-fluid">
   <center class="pt-5 pb-5">  <h1 >EXCEL SHEET</h1> <h4><?php echo $_GET['year'].'-'.$_GET['mth']; ?></h4> </center>
 
  <div class="row">
    <div class="col-md-11">
                    <?php
                        

                        // $lastattendance = ("SELECT * FROM `attendace` ORDER BY `date` DESC LIMIT 1"  );
                        // $lastattendance = mysqli_query($conn, $lastattendance);
                        // $row4 = $lastattendance->fetch_assoc();
                        // $lastdate=$row4['date'];
                    // echo $lastdate;

                    $user = ("SELECT * FROM `employess` "); 
                    $user = mysqli_query($conn, $user);


                    //table start
                    echo '<table id="table" class="  table   table table-striped table-bordered table-sm" cellspacing="0" >
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
                                    echo "<td width='200' class='bg-info' rowspan='1' >"."<div class='h4  text-dark'>".ucfirst($row2['First_Name']).'</div>'.  "</td>"; 
                                            
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
                                                                        echo " <td class='text-center text-uppercase   ' ><center>".
                                                                        '<div style="  font-size: 18px;">'.
                                                                        $row3['status'].
                                                                        '</div><div class=" rounded-0 w-100">';
                                                                        if(!empty($shift['time_in'])){
                                                                        // echo $shift['time_in'];
                                                                        }
                                                                        // else{echo '.';}

                                                                        echo '</div><div class=" rounded-0 w-100">';
                                                                        if(!empty($shift['time_out'])){
                                                                        // echo $shift['time_out'];
                                                                        }
                                                                        // else{echo '.';}
                                                                        
                                                                    echo  '</div>'.
                                                                        '<div >';
                                                                        if(!empty($shift['hours'])){
                                                                        // echo $shift['hours'];
                                                                        }
                                                                        
                                                                    echo  '</div>'."</center></td> "; 
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
                                                                        echo "<td ><center class=' rounded-0 w-100 ' style='font-size: 15px;'>O</center></td> ";
                                                                    
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
                
                        // $usernames[$i]= '<th>'.$row2['u_name'].'</th>';
                    $i++;


                            }


                    


                        
                



            $w=("SELECT * FROM `employess`");
            $r = mysqli_query($conn,$w);




            while($usertotal = mysqli_fetch_array($r)){ 

            if(!empty($selectdate)){
            $totalHoursQuery=("SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` =".$usertotal['id']."  and MONTH(date) = '$selectdate' ORDER BY `attendace`.`date` ASC");

            $totalHoursQ = mysqli_query($conn, $totalHoursQuery);
                        
            $tthr = mysqli_fetch_array($totalHoursQ);
                

                    
            }
            }

                        ?>
          </tbody>
        </table>
        
      </div>
    </div>
</div>
 

            
 <!-- table 2        -->

  

      
    
      
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
    document.body.style.zoom="67%"
  $('form.formtt' ).click(function () {

event.preventDefault();


var res = event.target.id.split("-");
document.getElementById("testing").innerHTML =  res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("attendanceValue").value =   res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("id").value =  res[3];
document.getElementById("year").value =  res[0];
document.getElementById("month").value =  res[1];
  
  
  });

  $('form.formupdate' ).click(function () {

event.preventDefault();


var res = event.target.id.split("-");
// document.getElementById("testingupdate").innerHTML =  res[0]+"-"+res[1]+"-"+res[2];
// document.getElementById("attendanceValue").value =   res[0]+"-"+res[1]+"-"+res[2];
document.getElementById("id").value = res[0];
document.getElementById("year").value =  res[1];
document.getElementById("month").value =  res[2];


  
  });



});
</script>




<script>
 $(document).ready(function () { 
    $("#table").table2excel({ 
        filename: "attendanceSheet.xls" 
    }); 
 });
</script>
<script src= 
"//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"> 
</script> 
<script src= 
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"> 
</script> 
<script type="text/javascript">
function ExportToExcel(mytblId){
       var htmltable= document.getElementById('my-table-id');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    }
</script>

</body>
</html>
<?php 
 $conn->close();

?>





<!-- SELECT SUM(hours) FROM `attendace` INNER JOIN shift on attendace.id = shift.attnd_id WHERE `emp_id` = 2  and date= MONTH(2020-12-03) ORDER BY `attendace`.`date` ASC -->