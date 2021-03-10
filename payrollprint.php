<?php include("inc/db.php");
session_start(); 
 echo $user_id = $_SESSION['u_id'];    
echo  $user_name = $_SESSION['u_name'];

?><!DOCTYPE html>
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
  <!-- pace-progress -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
  <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- pace-progress -->
<script src="plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
 
<?php  include("inc/header.php");  
include("inc/sidebar.php"); 

 ?> 

  <!-- Content Wrapper. Contains page content -->
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
          <h3 class="card-title">Title</h3>

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
          

        <?php  $productSqlp = mysqli_query($conn,"SELECT * FROM employess");   

$y = mysqli_query($conn,"SELECT DISTINCT YEAR(STR_TO_DATE(`date`,'%Y-%m-%d')) as year from attendace");
$m = mysqli_query($conn,"SELECT DISTINCT MONTH(STR_TO_DATE(`date`,'%Y-%m-%d')) as month from attendace");
        ?>  <form method="get"> 
               <div class="row">
               <!-- 
          <div class="col-4">
            <div class="form-group">
          <label for="clientName">SELECT EMP</label>
        
      
    <select class="form-control" name="emp"  required="">
                    <option value="">~~SELECT~~</option>
                    </?php
                       while($row = mysqli_fetch_array($productSqlp)) {                     
                        echo "<option value='".$row["id"]."'>".$row["First_Name"]."</option>";
                      } // /while 

                    ?>
                  </select>

                

         <!-/form-group->
        </div>             
        
              </div> -->
              <div class="col-4">
            <div class="form-group">
          <label for="clientName">YEAR</label>
        
          <input type="hidden" class="form-control" id="clientName" name="cus_id" value="<?php  echo $c_id ;?>" />
    <select class="form-control" name="yrs"  required>
                    <option selected value="2020">2020</option>
                      <option  value='2021'>2021</option>
                      <option value='2022'>2022</option>
                      <option value='2023'>2023</option>
                      
                  </select>
 

         <!--/form-group-->
        </div>             
        
        
            
        
        
        <br>
        
        
        
        
        
              </div>


              <div class="col-4">
            <div class="form-group">
          <label for="clientName">MONTH</label>
        
         
    <select class="form-control" name="month"  required>
                    
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

                  

         <!--/form-group-->
        </div>  
        <button type="submit" name="emp_qw" class="btn btn-outline-primary btn-lg" >Employee Payrole</button> 
                   
        </div>
        </div>
      </form>

<?php 
if (isset($_GET['emp_qw'])) {
   
  
 $emp_yrs = $_GET['yrs'];

 $emp_mont = $_GET['month'];

  $productS = "SELECT id FROM employess ";    

$result = mysqli_query($conn,$productS);
 // $row = mysqli_fetch_array($result);
  

 //$id = $row["0"];
 //$id = $row["0"];
 $agent;
 $agents;
// $i=0;             

while ($row = mysqli_fetch_array($result)) {
  if ($row[0] == 1) {
    $agents= "'".$row[0] . "'" ;
    }
else{ $agent .= ",'".$row[0] . "'" ;}
}
 echo $agen = $agents.$agent;

//  for($i=0;$i<count($row = mysqli_fetch_array($result));$i++){
//   $deid = $row[$i];
//   if ($i == 0) {
//     $agents= "'".$deid . "'" ;
//     }
// else{$agent .= ",'".$deid . "'" ;}
         
//   echo $agen = $agents.$agent;
// }
// SELECT employess.First_Name , attendace.status ,COUNT(attendace.status)as number, max(salary.salary) as salary,attendace.date FROM `employess` INNER JOIN attendace ON attendace.emp_id = employess.id JOIN salary ON salary.emp_id = employess.id WHERE attendace.emp_id in('1','12','3','5','10','4','2','6','7','9','11') and YEAR(attendace.date) = '2021' and MONTH(attendace.date) = '1' GROUP by STATUS,First_Name order by status ,First_Name
$e = mysqli_query($conn,"CREATE OR REPLACE VIEW sal AS select emp_id,salary from salary GROUP by salary.emp_id ORDER BY date DESC");
$e = mysqli_query($conn,"CREATE OR REPLACE VIEW earn AS SELECT employess.id, employess.First_Name , attendace.status ,COUNT(attendace.status)as number,sal.salary,attendace.date,tbl_department.name, employess.Dependability FROM `employess` INNER JOIN attendace ON attendace.emp_id = employess.id JOIN sal ON sal.emp_id = employess.id join tbl_department on employess.Dep_id = tbl_department.dep_id WHERE employess.id in($agen) and YEAR(attendace.date) = '$emp_yrs' and MONTH(attendace.date) = '$emp_mont' GROUP by STATUS,First_Name order by status ,First_Name");

$earn = mysqli_query($conn,"SELECT  id,First_Name 
  , MAX(CASE WHEN  status = 'A' THEN number else '0'  END) 'A'
  , MAX(CASE WHEN status = 'T' THEN number else '0'  END) 'T'
  , MAX(CASE WHEN status = 'L' THEN number else '0'  END) 'L'
  , MAX(CASE WHEN status = 'HD' THEN number else '0'  END) 'HD' 
,salary,name,Dependability

  from earn GROUP by First_Name");


}
  

while (@$rows = mysqli_fetch_array(@$earn)) {



 $ife ="SELECT `emp_id`,`absent`,`late`,`haf_day`,`train`,`fname`,`year`,`month` FROM `pay_roll_attend`JOIN pay_roll on pay_roll_attend.pyrol_id = pay_roll.id where fname = '$rows[1]' and year ='$emp_yrs'  and month = '$emp_mont'";
 $r = mysqli_query($conn,$ife);
if ($nt_payabl= mysqli_num_rows($r)) {
 //echo'<script>alert("Welcome to Geeks for Geeks")</script>';


}
 else {
//echo'<script>alert("Welcome to Geeks for Geeks")</script>';
  if ($rows[7] == 'IT') {
    
   $a = $rows[2];
$trnn = $rows[3];
$l = $rows[4];
$hd = $rows[5];
$ta = $l/3 + $hd/2 + $a + $trnn ;
           $t =(int)$ta;
           $t_d_w = 30 - $t;
           $perda = $rows[6]/30;
//agent
                               $perday = $perda;

                              $perday;
                               
         $tt = $t * $perday ;


if ($t == 0 ) {

$sal = $rows[8] + $rows[6];
  $e1 = mysqli_query($conn,"INSERT INTO `pay_roll`(`emp_id`,`us_id`,`fname`, `year`, `month`) VALUES('$rows[0]','$user_id','$rows[1]','$emp_yrs','$emp_mont') ");

$last_id = mysqli_insert_id($conn);

 $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_attend`( `pyrol_id`, `absent`, `late`, `haf_day`, `train`,`total_ab`, `to_dy_wrk`) VALUES('$last_id','$rows[2]','$rows[4]','$rows[3]','$rows[5]','$t','$t_d_w') ");

  $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_detail`(`pyrol_id`, `depend`,`deductions`, `net_Salary`, `nt-payable`, `gross_Salary`) VALUES('$last_id','$rows[8]','$tt','$sal','$sal',$sal') ");
}
elseif ($t == 1) {
$dep = $rows[8]/2;

$sal = $dep + $rows[6];
 $e1 = mysqli_query($conn,"INSERT INTO `pay_roll`(`emp_id`,`us_id`,`fname`, `year`, `month`) VALUES('$rows[0]','$user_id','$rows[1]','$emp_yrs','$emp_mont') ");

$last_id = mysqli_insert_id($conn);

 $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_attend`( `pyrol_id`, `absent`, `late`, `haf_day`, `train`,`total_ab`, `to_dy_wrk`) VALUES('$last_id','$rows[2]','$rows[4]','$rows[3]','$rows[5]','$t','$t_d_w') ");

  $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_detail`(`pyrol_id`, `depend`,`deductions`, `net_Salary`, `nt-payable`, `gross_Salary`) VALUES('$last_id','$dep','$tt','$sal','$sal','$sal') ");
}
else {

  $e1 = mysqli_query($conn,"INSERT INTO `pay_roll`(`emp_id`,`us_id`,`fname`, `year`, `month`) VALUES('$rows[0]','$user_id','$rows[1]','$emp_yrs','$emp_mont') ");

$last_id = mysqli_insert_id($conn);

 $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_attend`( `pyrol_id`, `absent`, `late`, `haf_day`, `train`,`total_ab`, `to_dy_wrk`) VALUES('$last_id','$rows[2]','$rows[4]','$rows[3]','$rows[5]','$t','$t_d_w') ");

  $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_detail`(`pyrol_id`, `depend`,`deductions`, `net_Salary`, `nt-payable`, `gross_Salary`) VALUES('$last_id','0','$tt','$rows[6]','$rows[6]','$rows[6]') ");
}
          
}
//  $e1 = mysqli_query($conn,"INSERT INTO `pay_roll`(`emp_id`,`us_id`,`fname`, `year`, `month`) VALUES('$rows[0]','$user_id','$rows[1]','$emp_yrs','$emp_mont') ");

// $last_id = mysqli_insert_id($conn);

//  $e3 = mysqli_query($conn,"INSERT INTO `pay_roll_attend`( `pyrol_id`, `absent`, `late`, `haf_day`, `train`) VALUES('$last_id','$rows[2]','$rows[4]','$rows[3]','$rows[5]') ");


  }

}

?> 

            <div class="row">
              <button name="btns" class="btns">print </button>
                <!-- </div>filter end.// -->
        <div class="col-md-12 col-sm-12" >

         <div class="table-responsive">
         <table class="items rounded table scrollbar scrollbar-primary overflow-auto  table table-striped table-bordered table-sm">
        <tr>
          <th>check boxs</th>
    <th>Name</th>
    <th>Absent</th>
     <th>Late</th>
      <th>Half Day</th>
    <th>Trianing</th>
    <th>Paid Leave</th>
    <th>Total Absent</th>
    <th>Total Work Day</th>
    <th>Depend</th>
<th>Bouns</th>
<th>Arrear</th>
<th>Penalties</th>
<th>Deduction</th>
<th>Net salry</th>
<th>commission</th>
<th>cash Advance</th>
<th>Net Payable</th>
<th>Gross salary </th>
  </tr>







<?php
$print = mysqli_query($conn,"SELECT pay_roll.id, pay_roll_attend.id,pay_roll_detail.id,pay_roll_detail.pyrol_id,pay_roll.emp_id,fname,absent,late,haf_day,train,pay_roll_attend.paid_leave,total_ab,to_dy_wrk,`year`,month,depend,eligibility,pay_roll_detail.paid_leave,bonus, Arrears,Penalties,deductions,net_Salary,commission,cash_Advance,`nt-payable`,gross_Salary,employess.Dependability,sal.salary FROM `pay_roll_attend` JOIN pay_roll on pay_roll_attend.pyrol_id = pay_roll.id JOIN pay_roll_detail on pay_roll.id = pay_roll_detail.pyrol_id join employess on pay_roll.emp_id = employess.id INNER JOIN sal on employess.id = sal.emp_id
where year ='2021' and month = '1'");

$i = 0;

while ($r = mysqli_fetch_array($print)) {

           ?>
<tr>
 <td> <input type="checkbox" id="ides<?php echo $i;?>" name="ides[]"> </td>
<input type="hidden" id="pay_roll_id<?php echo $i;?>" name="pay_roll_id[]" value="<?php echo $r[0];?>">
<input type="hidden" id="pay_roll_attend_id<?php echo $i;?>" name="pay_roll_attend_id" value="<?php echo $r[1];?>">
<input type="hidden" id="pay_roll_detail_id<?php echo $i;?>" name="pay_roll_detail_id" value="<?php echo $r[2];?>">
<input type="hidden" id="pay_roll_detail_py_id<?php echo $i;?>" name="pay_roll_detail_py_id" value="<?php echo $r[3];?>">
<input type="hidden" id="emp_id<?php echo $i;?>" name="emp_id" value="<?php echo $r[4];?>">

 <td><input type="text" id="fname<?php echo $i;?>" name="fname" value="<?php echo $r[5];?>" size='5'> </td>
<td><input type="text" id="absent<?php echo $i;?>" name="absent" value="<?php echo $r[6];?>" size='1'></td> 
<td><input type="text" id="late<?php echo $i;?>" name="late" value="<?php echo $r[7];?>" size='1'></td>
<td><input type="text" id="haf_day<?php echo $i;?>" name="haf_day" value="<?php echo $r[8];?>"size='1'></td>
<td><input type="text" id="train<?php echo $i;?>" name="train" value="<?php echo $r[9];?>"size='1'></td>
<td>
<input type="text" id="pay_roll_attend_paid_leave<?php echo $i;?>" name="pay_roll_attend_paid_leave" value="<?php echo $r[10];?>" size='1'>
</td>
<td><input type="text" id="total_ab<?php echo $i;?>" name="total_ab" value="<?php echo $r[11];?>" size='1'></td>
<td><input type="text" id="to_dy_wrk<?php echo $i;?>" name="to_dy_wrk" value="<?php echo $r[12];?>" size='1'></td>
<td><input type="text" id="depend<?php echo $i;?>" name="depend" value="<?php echo $r[15];?>" size='3'></td>
<!-- <td><input type="text" id="eligibility" name="eligibility" value="</?php echo $r[1];?>"></td>
<td><input type="text" id="pay_roll_detail_paid_leave" name="pay_roll_detail_paid_leave" value="</?php echo $r[1];?>"></td> -->

<td><input type="text" id="bonus<?php echo $i;?>" name="bonus" value="<?php echo $r[18];?>" size='4'></td>
<td><input type="text" id="Arrears<?php echo $i;?>" name="Arrears" value="<?php echo $r[19];?>" size='5'></td>
<td><input type="text" id="Penalties<?php echo $i;?>" name="Penalties" value="<?php echo $r[20];?>"size='5'></td>
<td><input type="text" id="deductions<?php echo $i;?>" name="deductions" value="<?php echo $r[21];?>"size='5'></td>
<td><input type="text" id="net_Salary<?php echo $i;?>" name="net_Salary" value="<?php echo $r[22];?>"size='5'></td>
<td><input type="text" id="commission<?php echo $i;?>" name="commission" value="<?php echo $r[23];?>"size='5'></td>
<td><input type="text" id="cash_Advance<?php echo $i;?>" name="cash_Advance" value="<?php echo $r[24];?>"size='5'></td>
<td><input type="text" id="nt-payable<?php echo $i;?>" name="nt-payable" value="<?php echo $r[25];?>"size='5'></td>
<td><input type="text" id="gross_Salary<?php echo $i;?>" name="gross_Salary" value="<?php echo $r[26];?>"size='5'></td>
<input type="hidden" id="Dependability<?php echo $i;?>" name="Dependability" value="<?php echo $r[27];?>"size='5'>
<input type="hidden" id="salary<?php echo $i;?>" name="salary" value="<?php echo $r[28];?>"size='5'>
<input type="hidden" id="net_Salaryq<?php echo $i;?>" name="salary" value="<?php echo $r[22];?>"size='5'>

</tr>


<script type="text/javascript">

  $('#absent<?php echo $i;?>').keyup('change', function() {
 var aa = this.value;
 var ll = $("#late<?php echo $i;?>").val();
 var hdd = $("#haf_day<?php echo $i;?>").val();

var lat = ll/3;
var hadd = hdd/2

  var trn = $("#train<?php echo $i;?>").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn) ; 
var tot = parseInt(total);

 $("#total_ab<?php echo $i;?>").val(tot);
  
var salary = $("#salary<?php echo $i;?>").val();
 var perday = salary /30;
var nt_sal = perday * tot;
$("#deductions<?php echo $i;?>").val(nt_sal);
var totworday = 30 - Number(tot);
$("#to_dy_wrk<?php echo $i;?>").val(totworday);

// $("#tdec").val(todec);

var depend = $("#Dependability<?php echo $i;?>").val();
if( tot == 1)
{
  console.log(tot+"yooo");
  var dependa = depend/2;

// console.log(dependa+"dependa");

$("#depend<?php echo $i;?>").val(dependa);
// console.log($("#depend</?php echo $i;?>").val());

 var salary = $("#salary<?php echo $i;?>").val();
// console.log(salary);

var nt_sal = Number(salary) + Number(dependa);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

}
else if ( tot == 0 ) {
  console.log(tot+"booo");
console.log(depend+"booo");

$("#depend<?php echo $i;?>").val(depend);
 var salary = $("#salary<?php echo $i;?>").val();

var nt_sal = Number(salary) + Number(depend);
////document.getElementById("nt_sal").innerText = nt_sal ;
$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);


}
else {
 var dependa = depend * 0 ;
   console.log(tot+"EEooo");
   $("#depend<?php echo $i;?>").val(dependa);
 var salary = $("#salary<?php echo $i;?>").val();

var nt_sal = Number(salary) + Number(dependa);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;

}
});

 
  $('#late<?php echo $i;?>').change( function() {
 var aa = $("#absent<?php echo $i;?>").val();
 var ll = this.value;
 var hdd = $("#haf_day<?php echo $i;?>").val();

var lat = ll/3;
var hadd = hdd/2

 var trn = $("#train<?php echo $i;?>").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#total_ab<?php echo $i;?>").val(tot);
var salary = $("#salary<?php echo $i;?>").val();
 var perday = salary /30;
var nt_sal = perday * tot;
$("#deductions<?php echo $i;?>").val(nt_sal);
var totworday = 30 - Number(tot);
$("#to_dy_wrk<?php echo $i;?>").val(totworday);
//  var deduc = $("#deductions</?php echo $i;?>").val();
//  var perday = tot /deduc;
// var todec = perday * tot;


// $("#tdec").val(todec);

var depend = $("#Dependability<?php echo $i;?>").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depend<?php echo $i;?>").val(dependa);
 var salary = $("#salary<?php echo $i;?>").val();


var nt_sal = Number(salary) + Number(dependa);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}
else if ( tot == 0) {
 
$("#depend<?php echo $i;?>").val(depend);
 var salary = $("#salary<?php echo $i;?>").val();


var nt_sal = Number(salary) + Number(depend);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}

else {
 var dependa = depend * 0 ;

    $("#depend<?php echo $i;?>").val(dependa);


 var salary = $("#salary<?php echo $i;?>").val();


var nt_sal = Number(salary) + Number(dependa) ;

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}
});
 


  $('#haf_day<?php echo $i;?>').keyup('change', function() {
 var aa = $("#absent<?php echo $i;?>").val();
 var ll = $("#late<?php echo $i;?>").val();

 var hdd = this.value;

var lat = ll/3;
var hadd = hdd/2

  var trn = $("#train<?php echo $i;?>").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#total_ab<?php echo $i;?>").val(tot);
var salary = $("#salary<?php echo $i;?>").val();
 var perday = salary /30;
var nt_sal = perday * tot;
$("#deductions<?php echo $i;?>").val(nt_sal);
var totworday = 30 - Number(tot);
$("#to_dy_wrk<?php echo $i;?>").val(totworday);



var depend = $("#Dependability<?php echo $i;?>").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depend<?php echo $i;?>").val(dependa);
 var salary = $("#salary<?php echo $i;?>").val();


var nt_sal = Number(salary) + Number(dependa) ;

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);


//document.getElementById("nt_sal").innerText = nt_sal ;

// document.getElementById('depen').value="123";
}


else if ( tot == 0 ) {
 


$("#depend<?php echo $i;?>").val(depend);
 var salary = $("#salary<?php echo $i;?>").val();


var nt_sal = Number(salary) + Number(depend);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;

}
else {
 var dependa = depend * 0 ;
    $("#depend<?php echo $i;?>").val(dependa);

 var salary = $("#salary<?php echo $i;?>").val();

var nt_sal = Number(salary) + Number(dependa) ;

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#net_Salaryq<?php echo $i;?>").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;


}

});

  $('#train<?php echo $i;?>').keydown('change', function() {
 var aa = $("#absent<?php echo $i;?>").val();
 var ll = $("#late<?php echo $i;?>").val();
var hdd = $("#haf_day<?php echo $i;?>").val();
  var trn  = this.value;

var lat = ll/3;
var hadd = hdd/2
//var trn = $("#train<?php echo $i;?>").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#total_ab<?php echo $i;?>").val(tot);
var salary = $("#salary<?php echo $i;?>").val();
 var perday = salary /30;
var nt_sal = perday * tot;
$("#deductions<?php echo $i;?>").val(nt_sal);
var totworday = 30 - Number(tot);
$("#to_dy_wrk<?php echo $i;?>").val(totworday);



// $("#tdec").val(todec);
var depend = $("#Dependability<?php echo $i;?>").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depend<?php echo $i;?>").val(dependa);
 var salary = $("#salary<?php echo $i;?>").val();



var nt_sall = Number(salary) + Number(dependa) ;
 
var nt_sa = Number(nt_sall) - Number(nt_sal);

$("#net_Salary<?php echo $i;?>").val(nt_sa);
$("#net_Salaryq<?php echo $i;?>").val(nt_sa);


}


else if ( tot == 0) {
 

$("#depend<?php echo $i;?>").val(depend);
 var salary = $("#salary<?php echo $i;?>").val();

var nt_sall = Number(salary) + Number(depend) ;

var nt_sa = Number(nt_sall) - Number(nt_sal);

$("#net_Salary<?php echo $i;?>").val(nt_sa);
$("#net_Salaryq<?php echo $i;?>").val(nt_sa);

//document.getElementById("nt_sal").innerText = nt_sal ;

}
else {
 var dependa = depend * 0 ;

    $("#depend<?php echo $i;?>").val(dependa);

 var salary = $("#salary<?php echo $i;?>").val();

var nt_sall = Number(salary) + Number(dependa);
var nt_sa = Number(nt_sall) - Number(nt_sal);

$("#net_Salary<?php echo $i;?>").val(nt_sa);
$("#net_Salaryq<?php echo $i;?>").val(nt_sa);
//document.getElementById("nt_sal").innerText = nt_sal ;

}

});
   





   



$('#Penalties<?php echo $i;?>').keyup('change', function() {
  var net_Salary = $("#net_Salaryq<?php echo $i;?>").val();
var bonus = $("#bonus<?php echo $i;?>").val();
var Arrears = $("#Arrears<?php echo $i;?>").val();
var Penalties = this.value;

var net_sal =Number(bonus) + Number(Arrears) + Number(net_Salary);
var nt_sal = Number(net_sal) - Number(Penalties);

$("#net_Salary<?php echo $i;?>").val(nt_sal);
$("#nt-payable<?php echo $i;?>").val(nt_sal);
$("#gross_Salary<?php echo $i;?>").val(nt_sal);

  });

$('#commission<?php echo $i;?>').keyup('change', function() {
var co_in = this.value;
var net_sal = $("#net_Salary<?php echo $i;?>").val();
var nt_sal = Number(net_sal) + Number(co_in);
$("#nt-payable<?php echo $i;?>").val(nt_sal);
$("#gross_Salary<?php echo $i;?>").val(nt_sal);
  });
$('#cash_Advance<?php echo $i;?>').keyup('change', function() {
var co_in = this.value;
var net_sal = $("#gross_Salary<?php echo $i;?>").val();
var nt_sal = Number(net_sal) - Number(co_in);
$("#nt-payable<?php echo $i;?>").val(nt_sal);
  });


  
 $(document).ready(function(){  
      function autoSave()  
      { 
  var pay_roll_id = $("#pay_roll_id<?php echo $i;?>").val(); 
  var pay_roll_attend_id = $("#pay_roll_attend_id<?php echo $i;?>").val(); 
  var pay_roll_detail_id = $("#pay_roll_detail_id<?php echo $i;?>").val(); 
  var pay_roll_detail_py_id = $("#pay_roll_detail_py_id<?php echo $i;?>").val(); 
  var emp_id = $("#emp_id<?php echo $i;?>").val();
   var fname = $("#fname<?php echo $i;?>").val();
  var absent = $("#absent<?php echo $i;?>").val();
  var late = $("#late<?php echo $i;?>").val();
  var haf_day = $("#haf_day<?php echo $i;?>").val();  
  var train = $("#train<?php echo $i;?>").val(); 
  var pay_roll_attend_paid_leave = $("#pay_roll_attend_paid_leave<?php echo $i;?>").val(); 
  var total_ab = $("#total_ab<?php echo $i;?>").val(); 
  var to_dy_wrk = $("#to_dy_wrk<?php echo $i;?>").val(); 
  var depend = $("#depend<?php echo $i;?>").val(); 
  var bonus = $("#bonus<?php echo $i;?>").val(); 
  var Arrears = $("#Arrears<?php echo $i;?>").val(); 
  var Penalties = $("#Penalties<?php echo $i;?>").val(); 
  var deductions = $("#deductions<?php echo $i;?>").val(); 
  var net_Salary = $("#net_Salary<?php echo $i;?>").val(); 
  var commission = $("#commission<?php echo $i;?>").val(); 
  var cash_Advance = $("#cash_Advance<?php echo $i;?>").val(); 
  var payable = $("#nt-payable<?php echo $i;?>").val(); 
  var gross_Salary = $("#gross_Salary<?php echo $i;?>").val(); 
  //var haf_day = $("#haf_day<?php echo $i;?>").val(); 

console.log(payable);


           if(gross_Salary != '' && payable != '')  
           {  
                $.ajax({  
                     url:"payroll_update.php",  
                     method:"POST",  
                     data:{P_R_I:pay_roll_id,P_R_A_I:pay_roll_attend_id,P_R_D_I:pay_roll_detail_id,P_R_D_P_R_I:pay_roll_detail_py_id,EMP_ID:emp_id,FName:fname,Absent:absent,Late:late,Haf_Day:haf_day,Train:train,P_R_A_P_L:pay_roll_attend_paid_leave,Total_AB:total_ab,T_d_w:to_dy_wrk,Depend:depend,BOonus:bonus,Arre:Arrears,Penty:Penalties,deduct:deductions,Net_Sal:net_Salary,commi:commission,Cash_Advan:cash_Advance,Net_payable:payable,Gross_Sal:gross_Salary},  
                     
                     success:function(data)  
                     {  
                           console.log(data);
                            
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autoSave();   
           }, 800);  
 });

 

   var pay_roll_id = $("#pay_roll_id<?php echo $i;?>").val(); 
  var pay_roll_attend_id = $("#pay_roll_attend_id<?php echo $i;?>").val(); 
  var pay_roll_detail_id = $("#pay_roll_detail_id<?php echo $i;?>").val(); 
  var pay_roll_detail_py_id = $("#pay_roll_detail_py_id<?php echo $i;?>").val(); 
  var emp_id = $("#emp_id<?php echo $i;?>").val();
   var fname = $("#fname<?php echo $i;?>").val();
  var absent = $("#absent<?php echo $i;?>").val();
  var late = $("#late<?php echo $i;?>").val();
  var haf_day = $("#haf_day<?php echo $i;?>").val();  
  var train = $("#train<?php echo $i;?>").val(); 
  var pay_roll_attend_paid_leave = $("#pay_roll_attend_paid_leave<?php echo $i;?>").val(); 
  var total_ab = $("#total_ab<?php echo $i;?>").val(); 
  var to_dy_wrk = $("#to_dy_wrk<?php echo $i;?>").val(); 
  var depend = $("#depend<?php echo $i;?>").val(); 
  var bonus = $("#bonus<?php echo $i;?>").val(); 
  var Arrears = $("#Arrears<?php echo $i;?>").val(); 
  var Penalties = $("#Penalties<?php echo $i;?>").val(); 
  var deductions = $("#deductions<?php echo $i;?>").val(); 
  var net_Salary = $("#net_Salary<?php echo $i;?>").val(); 
  var commission = $("#commission<?php echo $i;?>").val(); 
  var cash_Advance = $("#cash_Advance<?php echo $i;?>").val(); 
  var payable = $("#nt-payable<?php echo $i;?>").val(); 
  var gross_Salary = $("#gross_Salary<?php echo $i;?>").val();
  var salary = $("#salary<?php echo $i;?>").val();
  var per = salary/30;
  var absentotal = absent*per;
  var latetotl = (late/3)*per;
var haf_daytotal = (haf_day/2)*per;
 var traintotal = train*per;

$(".btns").click(function() {
 $('#ides<?php echo $i;?>').each(function() {
        if ($(this).is(':checked')) {
  

  var html = '';
  
  html +='<div class="container-fluid" id="printdivcontent">';
   html +='<div class="row">';
  html +='<table align="left" cellspacing="0" border="0">';
   html +='<colgroup span="3" width="64"></colgroup>';
   html +='<colgroup width="73"></colgroup>';
   html +='<colgroup span="8" width="64"></colgroup>';
   html +='<tbody><tr>';
    html +=' <td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='<td  align="left" valign="bottom"><font color="#000000"><br><img src="dist/img/logop.png" width="83" height="48" hspace="23" vspace="1">';
     html +='</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +=' </tr>';
  html +=' <tr>';
     html +='<td height="28" align="center" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   
     html +='<td  align="center" valign="bottom"><b><font size="4" color="#000000">ONESTOP </font></b> </td>';
   
   
    html +=' <td align="left" valign="bottom"><b><font size="4" color="#000000">Solutions</font></b> </td>';
  html +=' </tr>';
   html +='<tr>';
    html +=' <td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
      html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    
    html +='<td  align="center" valign="bottom"><b><font color="#000000"></font></b> </td>';
    html +=' <td  align="center" valign="bottom"><b><font color="#000000"></font></b> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='</tr>';
   html +='<tr>';
    html +=' <td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
    html +=' <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='  <td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +='  </tr>';
  html +=' <tr>';
    html +=' <td height="20" align="left" valign="bottom"><font color="#000000"><br></font> ';
    html +='<td/td>';
    html +=' <td colspan="5" align="left" valign="bottom"><font color="#000000">EMP CODE               :'+emp_id+'    </font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="3" align="left" valign="bottom"><font color="#000000">NO OF DAYS                      :    30</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="5" align="left" valign="bottom"><font color="#000000">NAME                      :   '+fname+'</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="3" align="left" valign="bottom"><font color="#000000">DAYS WORKED                 :    '+to_dy_wrk+'</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>';
 html +=' <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="5" align="left" valign="bottom"><font color="#000000">DESIGNATION        :     dis_name </font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="4" align="left" valign="bottom"><br> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="5" align="left" valign="bottom"><font color="#000000">LOCATION               :    OneStop Solutions.</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>';
 html +=' <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="21" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="2" align="center" valign="bottom"><b><font size="3" color="#000000">EARNINGS</font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
 html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="2" align="center" valign="bottom"><font color="#000000">DESCRIPTION</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="2" align="center" valign="bottom"><font color="#000000">CURRENT</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="2" align="center" valign="bottom"><font color="#000000">DEDUCTION</font> </td>';
     html +='<td colspan="2" align="center" valign="bottom"><font color="#000000">AMOUNT</font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>';
 html +=' <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Basic Pay</font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><b><font color="#3F3F3F">PKR '+salary+'</font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Absent</font></b> </td>';
     html +='<td style="border-top: 1px solid #000000" align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'+absent+'</font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '+absentotal+'</font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
  html +='<tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Commissions</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '+commission+'</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Lsate</font></b> </td>';
     html +='<td align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'+late+'</font></b> </td>';
     html +='<td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"></font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Bonus</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><b><font color="#3F3F3F">PKR '+bonus+'</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Half Day</font></b> </td>';
     html +='<td align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'+haf_day+'</font></b> </td>';
     html +='<td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F"></font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Arrears</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '+Arrears+'</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">D. Absent</font></b> </td>';
     html +='<td align="right" valign="bottom" bgcolor="#F2F2F2" sdnum="1033;"><b><font color="#3F3F3F">'+total_ab+'</font></b> </td>';
     html +='<td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '+deductions+'</font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Dependibilty</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '+depend+'</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Penalties</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '+Penalties+'</font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Cash Advance</font></b> </td>';
     html +='<td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '+cash_Advance+'</font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><i><font color="#3F3F3F">Gross Pay</font></i> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><font color="#3F3F3F">PKR </font> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><font color="#3F3F3F">PKR </font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><i><font color="#3F3F3F">Net Pay</font></i></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '+payable+'</font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
 html +=' </tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>  <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td colspan="10" align="left" valign="bottom"><i><font color="#000000">RUPEES     : '+payable+'</font></i> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
  html +='</tr>';
 html +=' <tr>';
     html +='<td height="20" align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
     html +='<td align="left" valign="bottom"><font color="#000000"><br></font> </td>';
   html +='</tr>';
  
   html +='</tbody>';
   html +='</table>';
   html +='</div>';
   html +='<div class="row">';
    html +=' <div class="col-1"><i><font color="#000000">Important Note:</font></i></div>';
     html +='<div class="col-10"><font color="#000000"><img src="dist/img/note.png" width="60%" ></font></div>';
    
 html +='</div>';
 html +='</div>';

          

   

          
     
            
//$('#qwert').append(html);

}
})


});

</script>



<?php



$i++;
}
           ?>
           <script type="text/javascript">
   
           </script>
</table>
</div>
<!-- /table-responsive -->
</div>
<!-- /col12 -->
</div>
<!-- /.row -->

<div class="row">
  <div id="qwert">
    
  </div>
</div>



        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




</body>
</html>
