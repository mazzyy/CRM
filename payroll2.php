<?php include("inc/db.php");
session_start(); 
 echo $user_id = $_SESSION['u_id'];    
echo  $user_name = $_SESSION['u_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pay roll</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">
 <script type="text/javascript">  
        function PrintDiv() {  
            var divContents = document.getElementById("printdivcontent").innerHTML;  
            var printWindow = window.open('', '', 'height=400,width=800');  
            printWindow.document.write('<html><head><title>Print Payroll </title>');
  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();  
        }  
    </script>
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
            <h1>Payroll</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payroll</li>
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
          <h3 class="card-title">Employes</h3>

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
        ?>  


                  
            <form method="get"> 
               <div class="row">
          <div class="col-4">
            <div class="form-group">
          <label for="clientName">SELECT EMP</label>
        
      
    <select class="form-control" name="emp"  required="">
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_array($productSqlp)) {                     
                        echo "<option value='".$row["id"]."'>".$row["First_Name"]."</option>";
                      } // /while 

                    ?>
                  </select>

                

         <!--/form-group-->
        </div>             
        
              </div>
              <div class="col-4">
            <div class="form-group">
          <label for="clientName">YEAR</label>
        
          <input type="hidden" class="form-control" id="clientName" name="cus_id" value="<?php  echo $c_id ;?>" />
    <select class="form-control" name="yrs"  required>
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_array($y)) {                     
                        echo "<option value='".$row[0]."'>".$row[0]."</option>";
                      } // /while 

                    ?>
                  </select>
 

         <!--/form-group-->
        </div>             
        
        
            
        
        
        <br>
        
        
        
        
        
              </div>
              <div class="col-4">
            <div class="form-group">
          <label for="clientName">MONTH</label>
        
         
    <select class="form-control" name="month"  required>
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_array($m)) {                     
                        echo "<option value='".$row[0]."'>".$row[0]."</option>";
                      } // /while 

                    ?>
                  </select>

                  

         <!--/form-group-->
        </div>             
        
        
            
        
        
        <br>
        
        
        
         <button type="submit" name="emp_qw" class="btn btn-outline-primary btn-lg" >Employee Payrole</button> 
        
              </div>
            </div>  
          </form>
        </div>
        <!-- /.card-body -->
        
       </div>
      <!-- /.card -->

<?php 
if (isset($_GET['emp_qw'])) {
   $emp_id = $_GET['emp'];
  
 $emp_yrs = $_GET['yrs'];

 $emp_mont = $_GET['month'];

  $productS = "SELECT * FROM employess where id = $emp_id ";    

$result = mysqli_query($conn,$productS);

$row = mysqli_fetch_array($result);
  
 $id = $row['0'];
 $title = $row[1];
 $fname = $row[2];
 $lname = $row[3];
 $us_id = $row[4];
 $dep_id = $row[5];
 $dis_id = $row[6];
 $depend = $row[7];
 //$id = $row["8"];
 $shf_strt = $row[9];
 $shf_end = $row[10];
 //$id = $row["0"];
 //$id = $row["0"];
                       // /while 


$e = mysqli_query($conn,"CREATE OR REPLACE VIEW earn AS  SELECT status, COUNT(*) AS number from attendace WHERE emp_id = $emp_id and YEAR(`date`) in ($emp_yrs) and MONTH(`date`) in ($emp_mont) GROUP by status");

$earn = mysqli_query($conn,"SELECT  MAX(CASE WHEN status = 'A' THEN number else '0'  END) 'A'
  , MAX(CASE WHEN status = 'T' THEN number else '0'  END) 'T'
  , MAX(CASE WHEN status = 'L' THEN number else '0'  END) 'L'
  , MAX(CASE WHEN status = 'HD' THEN number else '0'  END) 'HD' 


  from earn");






  ?> 
  <form method="POST" name="myForm" onsubmit="return validateForm()" required>
 <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">payroll</h3>

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

        


                  
          
               <div class="row">
          <div class="col-4">
            <div class="form-group">
          <label for="clientName">Title</label>
          
          <input type="text" class="form-control" id="clientName" name="title" value="<?php  echo $title ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>

                 <div class="col-4">
            <div class="form-group">
          <label for="clientName">First Name </label>
          
          <input type="text" class="form-control" id="clientName" name="fname" value="<?php  echo $fname ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>

                 <div class="col-4">
            <div class="form-group">
          <label for="clientName">Last Name</label>
          
          <input type="text" class="form-control" id="clientName" name="lname" value="<?php  echo $lname ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName">Department</label>
          <?php $d = "SELECT * FROM tbl_department where dep_id = $dep_id ";   

          $r = mysqli_query($conn,$d);

          $rows = mysqli_fetch_array($r);
            $dep_name = $rows[1];
          ?>
          <input type="text" class="form-control" id="clientName" name="dep_name" value="<?php  echo $dep_name ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>

<?php  
if ($dep_name == 'Agent') { 
//agent
// A  T  L  HD 
$datas = mysqli_fetch_array($earn);
$a = $datas[0];
$trnn = $datas[1];
$l = $datas[2];
$hd = $datas[3];


 $ta = $l/3 + $hd/2 + $a + $trnn ;
            $t = (int)$ta;


 $q3 ="SELECT emp_id, salary,UserId FROM `salary` INNER JOIN employess on salary.emp_id = employess.id WHERE `emp_id` = $emp_id ORDER BY `salary` DESC";
//agent
                              $empq_id = mysqli_query($conn,$q3);
                                // if ($emp_id = mysqli_query($conn,$q3))  {
                                  
                                //  }
                          $rowh = mysqli_fetch_array($empq_id);

                                  $id = $rowh[0];
                                  $salary = $rowh[1];

                           $perda = $salary/30;
//agent
                               $perday = (int)$perda;

                                $perday;
          $tt = $t * $perday ;                      
  ?>

<div class="col-3">
            <div class="form-group">
          <label >Campaign</label>
          <?php $de = "SELECT name FROM tbl_designation where des_id = $dis_id";   

          $re = mysqli_query($conn,$de);

          $rowe = mysqli_fetch_array($re);
          $dis_name = $rowe[0];
          ?>
          <input type="text" class="form-control" id="clientName" name="dis_name" value="<?php  echo $dis_name;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label >DEPANDABILITY</label>
                <input type="text" class="form-control" id="depend" name="depend" value="<?php  echo $depend;?>" />
                </div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> SALARY </label>

       <input type="text" class="form-control" id="" name="salary" value= " <?php echo $salary ; ?>" />
</div>             
        
                </div>







                   </div>
          <!-- /.row -->

         
        </div>
        <!-- /.card-body -->




        
       </div>
      <!-- /.card -->
<?php 
//agent
// A  P  L  HD  



 ?>

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout bg-info">
             <h3><i class="fas fa-info"></i> Note:</h3>
              <p>Please Check all text-boxes from <strong> ABSENT</strong> to <strong>TOTAL GROSS SALARY </strong></p>
            </div>
 </div>
  </div>
   </div>

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Earning</h3>

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

        


                  
          
               <div class="row">


<div class="col-2">
            <div class="form-group">
          <label for="clientName">ABSENT</label>
          <?php //agent


          ?>
          <input type="text" class="form-control is-warning " id="a" name="a" value="<?php  echo $a ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">TRAINING</label>
          <?php //agent
          ?>
          <input type="text" class="form-control is-warning " id="trn" name="trnn" value="<?php  echo $trnn ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">LATE</label>
          <?php 
          ?>
          <input type="text" class="form-control is-warning" id="l" name="l" value="<?php  echo $l ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">HALF-DAY</label>
          <?php //agent
          ?>
          <input type="text" class="form-control is-warning" id="hd" name="hd" value="<?php  echo $hd ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">TOTAL ABSENT</label>
          <?php //agent
          
          ?>




          <input type="text" class="form-control is-warning" id="t" name="t" value="<?php  echo $t ;?>" /> 
   
          
         <!--/form-group-->
        </div>             
        
                </div>
                   <div class="col-2">
            <div class="form-group">
          <label for="clientName">TOTAL WORK DAY</label>
          <?php //agent
           $ta = $l/3 + $hd/2 +$a;
            $t = (int)$ta;

            $twd = 30-$t;
          ?>




          <input type="text" class="form-control" id="twd" name="twd" value="<?php  echo $twd ;?>"  /> 
   
          
         <!--/form-group-->
        </div>             
        
                </div>
                
          <?php 
         
          ?>
         
            <input type="hidden" class="form-control" id="perday" name="perday" value="<?php  echo $perday;?>" /> 
            <input type="hidden" class="form-control" id="salary" name="salary" value="<?php  echo $salary;?>" /> 
          <!--<input type="text" class="form-control" id="tdec" name="fl" value="<?php  echo $tt ;?>" /> 
     -->
          
         <!--/form-group-->
       



 
          <?php 
//agent
            if ($t == '1') {
             
              $dependd = $depend/2;
 $nt_sal = $dependd - $salary;
?>
<!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        


</div>

                <div class="col-3">
            <div class="form-group">
          <label for="clientName"> GROSS SALARYa </label>

       <input type="text" class="form-control is-warning" id="nt_sal" name="nt_sal" value= " <?php ?>" disabled/>
</div>             
        
                </div>



         <?php   }
//agent
         elseif ($t == '0') {
                     
 $nt_sal = $depend + $salary ;
        

 ?> 

<!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        

<!-- 
</div>             
        
                </div> -->

                
 <div class="col-2">
            <div class="form-group">
          <label for="clientName"> GROSS SALARYb </label>

       <input type="text" class="form-control is-warning" id="nt_sal" name="nt_sal" value= " <?php  ?>" disabled />
</div>             
        
                </div>

 <?php
}//agent
      else  {
              ?> 
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> GROSS SALARYc </label>

       <input type="text" class="form-control is-warning" id="nt_sal" name="nt_sal"         value= "<?php  ?>" disabled/>
</div>             
        
                </div>
   <!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        

<!-- 
</div>             
        
                </div> -->

                



           <?php  }

            //agent
          ?>
          
    
          
         <!--/form-group-->
        
<div class="col-3">
            <div class="form-group">
          <label for="clientName">  ELIGIBILITY </label>

       <input type="text" class="form-control" id="eligi" name="eligi" value= " " />
</div>             
        
                </div>




<div class="col-3">
            <div class="form-group">
          <label for="clientName"> BONUS </label>

       <input type="text" class="form-control" id="bon" name="bon" value= " " />
</div>             
        
                </div>
                <div class="col-3">
            <div class="form-group">
          <label for="clientName"> ARREARS </label>

       <input type="text" class="form-control" id="arre" name="arre" value= " " />
</div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> NOT PAYABLE </label>

       <input type="text" class="form-control" id="nt_pay" name="nt_pay" value= " " />
</div>             
        
                </div>
                <div class="col-4">
            <div class="form-group">
          <label for="clientName"> PENALTIES </label>

       <input type="text" class="form-control is-warning" id="penty" name="penty" value= " " />
</div>             
        
                </div>
<div class="col-4">
            <div class="form-group">
          <label for="clientName"> DEDUCTION </label>

       <input type="text" class="form-control" id="tdec" name="tdec" value="<?php  echo $tt ;?>" />
</div>             
        
                </div>
<div class="col-4">
            <div class="form-group">
          <label for="clientName"> NET SALARY </label>

       <input type="text" class="form-control" id="net_sal" name="net_sal" value= " " />
</div>             
         </div>
               
                <div class="col-2">
            <div class="form-group">
          <label for="clientName"> CASH ADVANCE </label>

       <input type="text" class="form-control is-warning" id="ad_cash" name="ad_cash" value= " " />
</div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> COMMISSION/ INCENTIVE </label>

       <input type="text" class="form-control" id="co_in" name="co_in" value= "" />
</div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName"> NET PAYABALE </label>

       <input type="text" class="form-control" id="nt_payabl" name="nt_payabl" value= " " required="" />
</div>             
        
                </div>
                 <div class="col-2">
            <div class="form-group">
          <label for="clientName"> TOTAL GROSS SALARY </label>

       <input type="text" class="form-control" id="to_gr_sal" name="to_gr_sal" value= " " required/>
</div>             
        
                </div>
            </div>
         <!-- /.row -->

         
        </div>
        <!-- /.card-body -->




        
       </div>
      <!-- /.card -->



<?php 
}
else  {
//hr / it 

 $datas = mysqli_fetch_array($earn);
$a = $datas[0];
$trnn = $datas[1];
$l = $datas[2];
$hd = $datas[3];


 $ta = $hd/2 + $a + $trnn ;
            $t = (int)$ta;
$q3 ="SELECT emp_id, salary,UserId FROM `salary` INNER JOIN employess on salary.emp_id = employess.id WHERE `emp_id` = $emp_id ORDER BY `salary` DESC";
//hr / it 
                              $empq_id = mysqli_query($conn,$q3);
                                // if ($emp_id = mysqli_query($conn,$q3))  {
                                  
                                //  }
                          $rowh = mysqli_fetch_array($empq_id);

                                  $id = $rowh[0];
                                  $salary = $rowh[1];

                           $perda = $salary/30;
//agent
                               $perday = (int)$perda;

                              
//hr / it 

          $tt = $t * $perday ; 
 ?>
<div class="col-3">
            <div class="form-group">
          <label >Departmenft</label>
          <?php $d = "SELECT * FROM tbl_designation where dep_id = $dep_id ";   

          $r = mysqli_query($conn,$d);

          $rows = mysqli_fetch_array($r);
            $dep_name = $rows[1];
          ?>
          <input type="text" class="form-control" id="clientName" name="dep_name" value="<?php  echo $dep_name ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>

<div class="col-3">
            <div class="form-group">
          <label >DEPANDABILITY</label>
                <input type="text" class="form-control" id="depend" name="depend" value="<?php  echo $depend;?>" />
                </div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> SALARY </label>

       <input type="text" class="form-control" id="" name="salary" value= "<?php echo $salary;  ?>" />
</div>             
        
                </div>




                   </div>
          <!-- /.row -->

         




        </div>
        <!-- /.card-body -->




        
       </div>
      <!-- /.card -->


<?php
 
  ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout bg-pink">
                <h3><i class="fas fa-info"></i> Note:</h3>
              <p>Please Check all text-boxes from <strong> ABSENT</strong> to <strong>TOTAL GROSS SALARY </strong></p>
            </div>
 </div>
  </div>
   </div>

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Earning</h3>

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

        


                  
          
               <div class="row">


<div class="col-2">
            <div class="form-group">
          <label for="clientName">ABSENT</label>
          <?php 

//hr / it 
          ?>
          <input type="text" class="form-control is-warning " id="a" name="a" value="<?php  echo $a ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">TRAINING</label>
          <?php //hr / it 
          ?>
          <input type="text" class="form-control is-warning " id="trn" name="trnn" value="<?php  echo $trnn ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">LATE</label>
          <?php //hr / it 
          ?>
          <input type="text" class="form-control is-warning " id="l" name="l" value="<?php  echo $l ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">HALF-DAY</label>
          <?php //hr / it 
          ?>
          <input type="text" class="form-control is-warning " id="hd" name="hd" value="<?php  echo $hd ;?>" /> 
    
          
         <!--/form-group-->
        </div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName">TOTAL ABSENT</label>
          <?php 
          //hr / it 
          ?>




          <input type="text" class="form-control is-warning" id="t" name="t" value="<?php  echo $t ;?>" /> 
   
          
         <!--/form-group-->
        </div>             
        
                </div>
                   <div class="col-2">
            <div class="form-group">
          <label for="clientName">TOTAL WORK DAY</label>
          <?php 
           $ta =  $hd/2 +$a;
            $t = (int)$ta;

            $twd = 30-$t;
          ?>




          <input type="text" class="form-control" id="twd" name="twd" value="<?php echo $twd ;?>"  /> 
   
          
         <!--/form-group-->
        </div>             
        
                </div>
                
          <?php 
         //hr / it 
          ?>
         
            <input type="hidden" class="form-control" id="perday" name="perday" value="<?php  echo $perday;?>" /> 
            <input type="hidden" class="form-control" id="salary" name="salary" value="<?php  echo $salary;?>" /> 
          <!--<input type="text" class="form-control" id="tdec" name="fl" value="<?php  echo $tt ;?>" /> 
     -->
          
         <!--/form-group-->
       



 
          <?php 
///hr / it 
            if ($t == '1') {
             
              $dependd = $depend/2;
 $nt_sal = $dependd - $salary ;
?>
<!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        


</div>

                <div class="col-3">
            <div class="form-group">
          <label for="clientName"> GROSS SALARY </label>

       <input type="text" class="form-control" id="nt_sal" name="nt_sal" value= "" disabled/>
</div>             
        
                </div>



         <?php   }
//hr / it 
         elseif ($t == '0') {
                     
 $nt_sal = $depend + $salary ;
        

 ?> 

<!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        

<!-- 
</div>             
        
                </div> -->

                
 <div class="col-2">
            <div class="form-group">
          <label for="clientName"> GROSS SALARY  </label>
          <br>
<!-- <label id="nt_sal" name="nt_sal">  </label> -->
       <input type="text" class="form-control" id="nt_sal" name="nt_sal" value= "" disabled /> 
</div>             
        
                </div>

 <?php
}//hr / it 
      else  {
              ?> 
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> GROSS SALARY </label>

       <br>
<!-- <label id="nt_sal" name="nt_sal">  </label> -->
<input type="text" class="form-control" id="nt_sal" name="nt_sal" value= "" disabled /> 
</div>             
        
                </div>
   <!-- 
<div class="col-3">
            <div class="form-group">
          <label for="clientName">DEPANDABILITY </label> -->
      <input type="hidden" class="form-control" id="depen" name="depend" value=" <?php echo $depend; ?>"/>
        

<!-- 
</div>             
        
                </div> -->

                



           <?php  }

            //hr / it 
          ?>
          
    
          
         <!--/form-group-->
        
<div class="col-3">
            <div class="form-group">
          <label for="clientName">  ELIGIBILITY </label>

       <input type="text" class="form-control" id="eligi" name="depe" value= " " />
</div>             
        
                </div>




<div class="col-3">
            <div class="form-group">
          <label for="clientName"> BONUS </label>

       <input type="text" class="form-control" id="bon" name="bon" value= " " />
</div>             
        
                </div>
                <div class="col-3">
            <div class="form-group">
          <label for="clientName"> ARREARS </label>

       <input type="text" class="form-control" id="arre" name="arre" value= " " />
</div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> NOT PAYABLE </label>

       <input type="text" class="form-control" id="nt_pay" name="nt_pay" value= " " />
</div>             
        
                </div>
                <div class="col-4">
            <div class="form-group">
          <label for="clientName"> PENALTIES </label>

       <input type="text" class="form-control is-warning" id="penty" name="penty" value= " " />
</div>             
        
                </div>
<div class="col-4">
            <div class="form-group">
          <label for="clientName"> DEDUCTION </label>

       <input type="text" class="form-control" id="tdec" name="tt" value="<?php  echo $tt ;?>" />
</div>             
        
                </div>
<div class="col-4">
            <div class="form-group">
          <label for="clientName"> NET SALARY </label>

       <input type="text" class="form-control" id="net_sal" name="net_sal" value= " " />
</div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName"> CASH ADVANCE </label>

       <input type="text" class="form-control is-warning" id="ad_cash" name="ad_cash" value= " " />
</div>             
        
                </div>
<div class="col-3">
            <div class="form-group">
          <label for="clientName"> COMMISSION/ INCENTIVE </label>

       <input type="text" class="form-control" id="co_in" name="co_in" value= "" />
</div>             
        
                </div>
                <div class="col-2">
            <div class="form-group">
          <label for="clientName"> NET PAYABALE </label>

       <input type="text" class="form-control" id="nt_payabl" name="nt_payabl" value= " " required=""/>
</div>             
        
                </div>
                 <div class="col-2">
            <div class="form-group">
          <label for="clientName"> TOTAL GROSS SALARY </label>

       <input type="text" class="form-control" id="to_gr_sal" name="to_gr_sal" value= " " required=""/>
</div>             
        
                </div>


























</div>
          <!-- /.row -->

         
        </div>
        <!-- /.card-body -->




        
       </div>
      <!-- /.card -->
 <?php  
}
  ?>


<button type="submit" name="save" class="btn btn-block btn-warning btn-lg" >Submit</button>




           
<?php } ?>
 </form>



<?php 

function numberTowords($nt_payabl)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$nt_payabl = number_format($nt_payabl,2,".",","); 
$num_arr = explode(".",$nt_payabl); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
  
while(substr($i,0,1)=="0")
    $i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
@$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}
extract($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

 



   $fname = $_POST['fname'];
 
 
 
 $depend = $_POST['depend'];
//$emp_yrs 
//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
 //$emp_mont 
  
  @ $a = $_POST['a'];
 @$t = $_POST['t'];
 @$l = $_POST['l'];
 @$hd = $_POST['hd'];
 $twd = $_POST['twd'];
 @$trn = $_POST['trn'];
 $salary = $_POST['salary'];
  @$nt_sal = $_POST['nt_sal'];
   @$eligi = $_POST['eligi'];
    $bon = $_POST['bon'];
     $arre = $_POST['arre'];
      $nt_pay = $_POST['nt_pay'];
       $penty = $_POST['penty'];
        @$tt = $_POST['tdec'];//total deduction
                 $net_sal = $_POST['net_sal'];
        $ad_cash = $_POST['ad_cash'];
        $co_in = $_POST['co_in'];
             
        $nt_payabl =  (int)$_POST['nt_payabl'];
       
       //$xyz = var_dump($nt_payabl);

    $to_gr_sal = $_POST['to_gr_sal'];
       
if ($nt_payabl == 0 ) {
 echo '<script>alert(" PLZ FILL NET PAYABALE ")</script>';
}
if ($to_gr_sal == 0 ) {
 echo '<script>alert(" PLZ FILL TOTAL GROSS SALARY ")</script>';
}

else{
  

$ins ="INSERT INTO `pay_roll`(`emp_id`, `us_id`, `fname`, `year`, `month`) VALUES ('$id','$user_id','$fname','$emp_yrs','$emp_mont')"; 

if (mysqli_query($conn,$ins)) {
 
$last_id = mysqli_insert_id($conn);

 $int ="INSERT INTO `pay_roll_detail`(`pyrol_id`, `depend`, `eligibility`, `bonus`, `Arrears`, `Penalties`, `deductions`, `net_Salary`, `commission`, `cash_Advance`, `nt-payable`, `gross_Salary`) VALUES ('$last_id','$depend','$eligi','$bon','$arre','$penty','$tt','$net_sal','$co_in','$ad_cash','$nt_payabl','$to_gr_sal')"; 

$inq ="INSERT INTO `pay_roll_attend`(`pyrol_id`, `absent`, `late`, `haf_day`, `train`, `total_ab`, `to_dy_wrk`) VALUES ('$last_id','$a','$l','$hd','$trn','$t','$twd')"; 


if (mysqli_query($conn,$int) && mysqli_query($conn,$inq) ) {

 echo'
 <div class="container-fluid" id="printdivcontent">
  <div class="row">
 <table align="left" cellspacing="0" border="0">
  <colgroup span="3" width="64"></colgroup>
  <colgroup width="73"></colgroup>
  <colgroup span="8" width="64"></colgroup>
  <tbody><tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td  align="left" valign="bottom"><font color="#000000"><br><img src="dist/img/logop.png" width="83" height="48" hspace="23" vspace="1">
    </font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="28" align="center" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
     <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
   
    <td  align="center" valign="bottom"><b><font size="4" color="#000000">ONESTOP </font></b></td>
   
   
    <td align="left" valign="bottom"><b><font size="4" color="#000000">Solutions</font></b></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
     <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    
    <td  align="center" valign="bottom"><b><font color="#000000">'.$emp_mont.',</font></b></td>
    <td  align="center" valign="bottom"><b><font color="#000000">'.$emp_yrs.'</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
   
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="5" align="left" valign="bottom"><font color="#000000">EMP CODE               :'.$emp_id.'    </font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="3" align="left" valign="bottom"><font color="#000000">NO OF DAYS                      :    30</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="5" align="left" valign="bottom"><font color="#000000">NAME                       :   '.$fname.'</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="3" align="left" valign="bottom"><font color="#000000">DAYS WORKED                 :    '.$twd.'</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="5" align="left" valign="bottom"><font color="#000000">DESIGNATION        :     '.$dis_name.' </font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="4" align="left" valign="bottom"><br></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="5" align="left" valign="bottom"><font color="#000000">LOCATION               :    OneStop Solutions.</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="21" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="2" align="center" valign="bottom"><b><font size="3" color="#000000">EARNINGS</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="2" align="center" valign="bottom"><font color="#000000">DESCRIPTION</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="2" align="center" valign="bottom"><font color="#000000">CURRENT</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="2" align="center" valign="bottom"><font color="#000000">DEDUCTION</font></td>
    <td colspan="2" align="center" valign="bottom"><font color="#000000">AMOUNT</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Basic Pay</font></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><b><font color="#3F3F3F">PKR '.$salary.'</font></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Absent</font></b></td>
    <td style="border-top: 1px solid #000000" align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'.$a.'</font></b></td>
    <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '.$perday.'</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Commissions</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '.$co_in.'</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Late</font></b></td>
    <td align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'.$l.'</font></b></td>
    <td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"></font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Bonus</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><b><font color="#3F3F3F">PKR '.$bon.'</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Half Day</font></b></td>
    <td align="right" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">'.$hd.'</font></b></td>
    <td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F"></font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Arrears</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '.$arre.'</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">D. Absent</font></b></td>
    <td align="right" valign="bottom" bgcolor="#F2F2F2" sdnum="1033;"><b><font color="#3F3F3F">'.$t.'</font></b></td>
    <td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '.$tt.'</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Dependibilty</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">PKR '.$depend.'</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Penalties</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '.$penty.'</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F">Cash Advance</font></b></td>
    <td align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '.$ad_cash.'</font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><i><font color="#3F3F3F">Gross Pay</font></i></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2"><font color="#3F3F3F">PKR '.$to_gr_sal.'</font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" "><font color="#3F3F3F">PKR '.$nt_payabl.'</font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><i><font color="#3F3F3F">Net Pay</font></i></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan="2" align="center" valign="bottom" bgcolor="#F2F2F2" ><b><font color="#3F3F3F">PKR '.$nt_payabl.'</font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom" bgcolor="#F2F2F2"><b><font color="#3F3F3F"><br></font></b></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td colspan="10" align="left" valign="bottom"><i><font color="#000000">RUPEES     : '.numberTowords("$nt_payabl").'</font></i></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
    <td align="left" valign="bottom"><font color="#000000"><br></font></td>
  </tr>
  
  </tbody>
  </table>
  </div>
  <div class="row">
    <div class="col-1"><i><font color="#000000">Important Note:</font></i></div>
    <di v class="col-10"><font color="#000000"><img src="dist/img/note.png" width="60%" ></font></div>
    
</div>
</div>
<button type="button" name="save" onclick="PrintDiv();" class="btn btn-block btn-warning btn-lg">Print</button>


';
     
}
}
else{

  echo "";
}

}
} ?>
    </section>
    <!-- /.content -->
  </div>


</div>


  




<?php

   include("inc/footer.php");  
 

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
<script type="text/javascript">
function validateForm() {
  var x = document.forms["myForm"]["#nt_payabl"].value;
  if (x.length == 0 ) {
    alert("Name must be filled out");
    return false;
  }
}</script>
<?php if (@$dep_name == 'Agent') {  ?>
 <script type="text/javascript">
  





  $('#a').keyup('change', function() {
 var aa = this.value;
 var ll = $("#l").val();
 var hdd = $("#hd").val();

var lat = ll/3;
var hadd = hdd/2

  var trn = $("#trn").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn) ; 
var tot = parseInt(total);

 $("#t").val(tot);
 var perday = $("#perday").val();
var todec = perday * tot;
var totworday = 30 - Number(tot);
$("#twd").val(totworday);

// $("#tdec").val(todec);

var depend = $("#depend").val();
if( tot == 1)
{
  console.log(tot+"yooo");
  var dependa = depend/2;

// console.log(dependa+"dependa");

$("#depen").val(dependa);
// console.log($("#depen").val());

 var salary = $("#salary").val();
// console.log(salary);
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

}
else if ( tot > 1) {
 // console.log(tot+"booo");
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);
////document.getElementById("nt_sal").innerText = nt_sal ;
$("#nt_sal").val(nt_sal);


}
else {
 
  // console.log(tot+"EEooo");
$("#depen").val(depend);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;

}
});

 
  $('#l').change( function() {
 var aa = $("#a").val();
 var ll = this.value;
 var hdd = $("#hd").val();

var lat = ll/3;
var hadd = hdd/2

 var trn = $("#trn").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#t").val(tot);

var totworday = 30 - Number(tot);
$("#twd").val(totworday);
 var perday = $("#perday").val();
var todec = perday * tot;


// $("#tdec").val(todec);

var depend = $("#depend").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}
else if ( tot > 1) {
 
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}

else {
 
 
$("#depen").val(depend);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

////document.getElementById("nt_sal").innerText = nt_sal ;
return;
}
});
 


  $('#hd').keyup('change', function() {
 var aa = $("#a").val();
 var ll = $("#l").val();

 var hdd = this.value;

var lat = ll/3;
var hadd = hdd/2

  var trn = $("#trn").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#t").val(tot);

var totworday = 30 - Number(tot);
$("#twd").val(totworday);


var perday = $("#perday").val();
var todec = perday * tot;


// $("#tdec").val(todec);
var depend = $("#depend").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;

// document.getElementById('depen').value="123";
}


else if ( tot > 1) {
 
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;

}
else {
 
 
$("#depen").val(depend);
 var salary = $("#salary").val();
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;


}

});

  $('#trn').keyup('change', function() {
 var aa = $("#a").val();
 var ll = $("#l").val();
var hdd = $("#hd").val();
 
var lat = ll/3;
var hadd = hdd/2
//var trn = $("#trn").val();
  var total = Number(aa) + Number(lat) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#t").val(tot);

var totworday = 30 - Number(tot);
$("#twd").val(totworday);


var perday = $("#perday").val();
var todec = perday * tot;


// $("#tdec").val(todec);
var depend = $("#depend").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;

// document.getElementById('depen').value="123";
}


else if ( tot > 1) {
 
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;


}
else {
 
 
$("#depen").val(depend);
 var salary = $("#salary").val();
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);

//document.getElementById("nt_sal").innerText = nt_sal ;

}

});
   $('#eligi').keyup('change', function() {
var eligi = this.value;
var depend = $("#depend").val();
 var salary = $("#nt_sal").val();
 var nt_sal = Number(salary) + Number(eligi);
 $("#nt_sal").val(nt_sal);
});
   
//       $('#bon').keyup('change', function() {
// var eligi = this.value;
// var depend = $("#arre").val();
//  var salary = $("#nt_sal").val();
//  var nt_sal = Number(salary) + Number(depend) + Number(eligi) ;
//  $("#net_sal").val(nt_sal);
// });




      var input24 = $('[id="arre"],[id="nt_sal"]','[id="bon"],[id="nt_pay"]','[id="penty"],[id="tdec"]'),
    input18 = $('[id="nt_sal"]'),
    input19 = $('[id="bon"]'),
    input20 = $('[id="arre"]'),
    input21 = $('[id="nt_pay"]'),
    input22 = $('[id="penty"]'),
    input23 = $('[id="tdec"]'),
    input24 = $('[id="net_sal"]');
input22.keydown(function () {
    var val20 = (isNaN(parseInt(input20.val()))) ? 0 : parseInt(input20.val());
    var val18 = (isNaN(parseInt(input18.val()))) ? 0 : parseInt(input18.val());
    var val19 = (isNaN(parseInt(input19.val()))) ? 0 : parseInt(input19.val());
    var val21 = (isNaN(parseInt(input21.val()))) ? 0 : parseInt(input21.val());
    var val22 = (isNaN(parseInt(input22.val()))) ? 0 : parseInt(input22.val());
    var val23 = (isNaN(parseInt(input23.val()))) ? 0 : parseInt(input23.val());
    input24.val((val20 + val18 +  val19) - (val21 + val22 + val23));
});
 $('#t').keyup('change', function() {
var tot = this.value;
var perday = $("#perday").val();
var nt_sal = perday * tot;
$("#tdec").val(nt_sal);
  });

 $('#ad_cash').keyup('change', function() {
var ad_cash = this.value;
var net_sal = $("#net_sal").val();
var nt_sal = Number(net_sal) - Number(ad_cash);
$("#nt_payabl").val(nt_sal);
  });
$('#co_in').keyup('change', function() {
var co_in = this.value;
var net_sal = $("#net_sal").val();
var nt_sal = Number(net_sal) + Number(co_in);
$("#to_gr_sal").val(nt_sal);
  });


</script>



<?php }


else {  ?>

 <script type="text/javascript">
  var qweqwe;
  $('#a').keyup('change', function() {
 var aa = this.value;
 var ll = $("#l").val();
 var hdd = $("#hd").val();


var hadd = hdd/2

  var trn = $("#trn").val();
  var total = Number(aa)  + Number(hadd) + Number(trn) ; 
var tot = parseInt(total);

 $("#t").val(tot);
 var perday = $("#perday").val();
var todec = perday * tot;
var totworday = 30 - Number(tot);
$("#twd").val(totworday);

// $("#tdec").val(todec);

var depend = $("#depend").val();
if( tot == 1)
{
  console.log(tot+"yooo");
  var dependa = depend/2;

// console.log(dependa+"dependa");

$("#depen").val(dependa);
// console.log($("#depen").val());

 var salary = $("#salary").val();
// console.log(salary);
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

}
else if ( tot > 1) {
 // console.log(tot+"booo");
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);


}
else {
 
  // console.log(tot+"EEooo");
$("#depen").val(depend);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);


}
});


 


  $('#hd').keyup('change', function() {
 var aa = $("#a").val();
 var ll = $("#l").val();

 var hdd = this.value;


var hadd = hdd/2;

  var trn = $("#trn").val();
  var total = Number(aa) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#t").val(tot);

var totworday = 30 - Number(tot);
$("#twd").val(totworday);


var perday = $("#perday").val();
var todec = perday * tot;


// $("#tdec").val(todec);
var depend = $("#depend").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);


// document.getElementById('depen').value="123";
}


else if ( tot > 1) {
 
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);


}
else {
 
 
$("#depen").val(depend);
 var salary = $("#salary").val();
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);


}

});

  $('#trn').keyup('change', function() {
 var aa = $("#a").val();
 var ll = $("#l").val();
var hdd = $("#hd").val();
 

var hadd = hdd/2
//var trn = $("#trn").val();
  var total = Number(aa) + Number(hadd) + Number(trn); 
var tot = parseInt(total);

 $("#t").val(tot);

var totworday = 30 - Number(tot);
$("#twd").val(totworday);


var perday = $("#perday").val();
var todec = perday * tot;


// $("#tdec").val(todec);
var depend = $("#depend").val();
if( tot == 1)
{
  
var dependa = depend/2;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);

// document.getElementById('depen').value="123";
}


else if ( tot > 1) {
 
var dependa = depend * 0 ;

$("#depen").val(dependa);
 var salary = $("#salary").val();

var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(dependa) + Number(eligi);

$("#nt_sal").val(nt_sal);


}
else {
 
 
$("#depen").val(depend);
 var salary = $("#salary").val();
var eligi = $("#eligi").val();
var nt_sal = Number(salary) + Number(depend) + Number(eligi);

$("#nt_sal").val(nt_sal);

var salary = $("#salary").val();

}

});
   $('#eligi').keyup('change', function() {
var eligi = this.value;
var depend = $("#depend").val();
 var salary = $("#nt_sal").val();
 var nt_sal = Number(salary) + Number(eligi);
 $("#nt_sal").val(nt_sal);
});
   
      $('.depeq').keyup('change', function() {
var eligi = this.value;
var depend = $("#arre").val();
 var salary = $("#nt_sal").val();
 var nt_sal = Number(salary) + Number(depend) + Number(eligi) ;
 $("#net_sal").val(nt_sal);
});




      var input24 = $('[id="arre"],[id="nt_sal"]','[id="bon"],[id="nt_pay"]','[id="penty"],[id="tdec"]'),
    input18 = $('[id="nt_sal"]'),
    input19 = $('[id="bon"]'),
    input20 = $('[id="arre"]'),
    input21 = $('[id="nt_pay"]'),
    input22 = $('[id="penty"]'),
    input23 = $('[id="tdec"]'),
    input24 = $('[id="net_sal"]');

     
input22.keydown(function () {
    var val20 = (isNaN(parseInt(input20.val()))) ? 0 : parseInt(input20.val());
    var val18 = (isNaN(parseInt(input18.val()))) ? 0 : parseInt(input18.val());
    var val19 = (isNaN(parseInt(input19.val()))) ? 0 : parseInt(input19.val());
    var val21 = (isNaN(parseInt(input21.val()))) ? 0 : parseInt(input21.val());
    var val22 = (isNaN(parseInt(input22.val()))) ? 0 : parseInt(input22.val());
    var val23 = (isNaN(parseInt(input23.val()))) ? 0 : parseInt(input23.val());
    input24.val((val20 + val18 +  val19) - (val21 + val22 + val23));

 

});
 $('#t').keyup('change', function() {
var tot = this.value;
var perday = $("#perday").val();
var nt_sal = perday * tot;
$("#tdec").val(nt_sal);
  });

 $('#ad_cash').keyup('change', function() {
var ad_cash = this.value;
var net_sal = $("#net_sal").val();
var nt_sal = Number(net_sal) - Number(ad_cash);
$("#nt_payabl").val(nt_sal);
  });
$('#co_in').keyup('change', function() {
var co_in = this.value;
var net_sal = $("#net_sal").val();
var nt_sal = Number(net_sal) + Number(co_in);
$("#to_gr_sal").val(nt_sal);
  });


</script>
<?php }






 ?>
<script>  
document.onkeypress = function (event) {  
event = (event || window.event);  
if (event.keyCode == 13) {  
return false;  
}  
}  
document.onmousedown = function (event) {  
event = (event || window.event);  
if (event.keyCode == 13) {  
return false;  
}  
}  
document.onkeydown = function (event) {  
event = (event || window.event);  
if (event.keyCode == 13) {  
return false;  
}  
}  

  document.onreadystatechange = function() { 

    if (document.readyState !== "complete") { 
        document.querySelector("#myDiv").style.display = "none"; 
        document.querySelector("#loader").style.visibility = "visible"; 
    } else { 
        document.querySelector("#loader").style.display = "none"; 
        document.querySelector("#myDiv").style.display = "block"; 
    } 
  }

</script>
</body>
</html>