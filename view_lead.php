<?php include("inc/db.php");
session_start(); 


  $servername = "localhost";
    $username = "root";
   $password = "QJb4yhZzNG4CwGKJ";
    $dbname = "crm";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
//index.php
 $user_id = $_SESSION['u_id'];    
 $user_name = $_SESSION['u_name'];
 $dep_id=  $_SESSION['dep_id'];


$connect = new PDO("mysql:host=localhost;dbname=crm", "root", "QJb4yhZzNG4CwGKJ");
function providers($connect)
{ 
 $output = '';
 $query = "SELECT * FROM providers ORDER BY name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}
function service($connect)
{ 
 $output = '';
 $query = "SELECT * FROM service ORDER BY name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}function lead_status($connect)
{ 
 $output = '';
 $query = "SELECT * FROM lead_status ORDER BY name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}
$_GET['leadid'];
$queryjoin=("SELECT tbl_users.u_name,lead.id FROM tbl_users INNER JOIN `lead` on tbl_users.u_id = lead.u_id where lead.id= ".$_GET['leadid']."" );
$queryjoin = mysqli_query($conn, $queryjoin);

       $queryjoin  = mysqli_fetch_array($queryjoin);
       
      ( $leadUser = $queryjoin[0]);
      ( $leadId = $queryjoin[1]);
 
// if ( $leadUser == $user_name ) { 
// echo '<script type="text/javascript">
//       var $inputs = $form.find("input, select, button, textarea");
//       $inputs.prop("disabled", fales);
// </script> ';

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lead Detail</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"  
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  
        crossorigin="anonymous"></script>  
  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"  
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  
        crossorigin="anonymous"></script> -->  
  
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  -->
  <!-- Google Font: Source Sans Pro -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
 <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  
  <!-- Theme style -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="dist/css/adminlte.css">
  
  


 

</head>
<body   class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="loader">
  <div class="body">
   <span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <div class="base">
    <span></span>
    <div class="face"></div>
  </div>
</div>
<div class="longfazers">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<h1>Redirecting</h1>

</div>

<!-- Site wrapper -->
<div class="wrapper" id="myDiv">

	<?php  include("inc/header.php");  
include("inc/sidebar.php"); 

 ?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lead Detail</h1>
            <?php
            
             $u_idse = $_SESSION['u_id'];    
             $u_namse = $_SESSION['u_name'];
// echo $_SESSION['role_id'];

            ?>
        </div>

</div>
            <div class="row ">
          <div class="col-lg-12">
           <form method="POST"   id="submitw">
<div class="card bg-gradient-gray ">
              <div class="card-header"style="background-color:#2a3f54!important;color:white">
                <h3 class="card-title">Customer Detail</h3> 
                  <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
           
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light" style="background-color:#ffffff!important;color:white">
                
                <div class="row mb-3 border-bottom bg-light" >  <h3   style="color:#BDBDBD;">Lead ID : <b><?php echo $leadId?> </b> <span > Created By: <b><?php echo ucfirst($leadUser)?></b></span></h3> </div>

        
         <div class="row">



<?php 


   
       
if (isset($_GET['leadid']))
        {
$lead_get_id = $_GET['leadid'];
}
 $q = "SELECT `id`,`cu_id` FROM `lead` WHERE `id` = $lead_get_id";
if( $idf= mysqli_query($conn, $q)){

       $ids_u  = mysqli_fetch_array($idf);
       $cus_get_id = $ids_u['1'];

         
  $sql2 = "SELECT `id`, `des_id`, `first_name`, `last_name`, `phone`, `alt_num`, `email`, `DOB`, `SSN`, `Driving_license`, `Driving_license_Expired`, `Driving_License_State`, `street`, `city`, `state`, `zip_code`, `current_provider`, `Lead_Source`, `Date` FROM `customer` WHERE `id` = $cus_get_id ";

        


$id_u = mysqli_query($conn, $sql2);

       $ids_u  = mysqli_fetch_array($id_u);
       $c_id = $ids_u[0];

         // $GLOBALS['c_id'] = $c_id;
            $u_ids = $ids_u[1];
             $c_fname = $ids_u[2];
            $c_lname = $ids_u[3];
            $c_phone = $ids_u[4];
             $c_altnum = $ids_u[5];
            $c_email = $ids_u[6];
            $c_dob = $ids_u[7];
            $c_ssn = $ids_u[8];
            $DL = $ids_u[9];
            $DLE = $ids_u[10];
            $DLS = $ids_u[11];
            $c_strt = $ids_u[12];
            $c_city = $ids_u[13];
            $c_state = $ids_u[14];
            $c_zip = $ids_u[15];
 $curr_pro = $ids_u[16];
              $led_sc = $ids_u[17];

          function getTruncatedCCNumber($c_ssn){
        return str_replace(range(0,9), "*", substr($c_ssn, 0, -4)) .  substr($c_ssn, -4);
    }   
       
          function CCNumber($DL){
        return str_replace(range(0,9), "*", substr($DL, 0, -4)) .  substr($DL, -4);
    } 
}

$q2 = "SELECT `Assigned_To`,`Description` FROM `orders` WHERE `lead_Id` = $lead_get_id";

if( $or_id= mysqli_query($conn, $q2)){

       $ids_u  = mysqli_fetch_array($or_id);
    
      $asgn = $ids_u['0'];
      $desc = $ids_u['1'];
        }  








          ?>


         <!--/form-group-->
       

        




          
        




         

        <div class="col-sm-6">
          <div class="form-group">
          <label for="clientName" >First Name</label>
          
           
            <input type="text" class="form-control"  tabindex="1"name="c_fname" value="<?php if(isset($c_fname)){ echo $c_fname ;} ?>"  />
          
         <!--/form-group-->
        </div>

          <div class="form-group">
         <label for="clientContact">Primary Phone</label>
          
        <input type="text" class="form-control " tabindex="3"id="clientContact" name="c_phone" value="<?php if(isset($c_phone)){echo $c_phone;}  ?>"  />
          
        </div>
        <div class="form-group">
          <label for="clientName" >Primary Email</label>
          
          
            <input type="text" class="form-control"  tabindex="5" name="email" value="<?php if(isset($c_email)){echo $c_email;}  ?>"  />
          
         <!--/form-group-->
        </div>
      
      </div>
      <div class="col-sm-6">
          <div class="form-group">

         <label for="orderDate" >Last Name</label>
         
             
            <input type="text" class="form-control" tabindex="2" id="orderDate" name="c_lname"  value="<?php if(isset($c_lname)){echo $c_lname;}  ?>"  />
          
        </div>
         <!--/form-group-->
       <div class="form-group">
                            <label>Mobile Phone</label>
                            <input type="text" name="mobile_phone" tabindex="4" class="form-control" value="<?php if(isset($c_altnum)){echo $c_altnum;}  ?>"  />
                        </div>
          <div class="form-group">
          <label for="clientName">Date Of Birth</label>
          
          
            <input type="text" class="form-control "  tabindex="6" name="dob" value="<?php if(isset($c_dob)){echo $c_dob;}  ?>"  />
          
         <!--/form-group-->
        </div>
        
          
      </div>
      <div class="col-md-6">
                          
                        <div class="form-group">
                            <label>SSN</label>
                            <input type="text" name="ssn"  tabindex="7"value="<?php if(isset($c_ssn)){echo $c_ssn;}  ?>" class="form-control " />
                        </div>
                          </div>
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Driving Licence</label><span style="color: red;"></span>
                            <input type="text" tabindex="8" class="form-control " value="<?php if(isset($DL)){echo $DL;}  ?>" name="dl"   />
                        </div>
                  
    
                      </div>
      <div class="col-md-6">
                          
 <div class="form-group">
                            <label>Driving License Expired</label>
                            <input type="text" class="form-control " tabindex="9"value="<?php if(isset($DLE)){echo $DLE;}  ?>" name="dl_exp"  />
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" tabindex="11" value="<?php if(isset($c_strt)){echo $c_strt;}  ?>" name="street"  />
                        </div>
                          
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" tabindex="13" value="<?php if(isset($c_city)){echo $c_city;}  ?>" name="city"   />
                        </div>
                  
    
                      </div>
                      
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Driving License State</label>
                            <input type="text" class="form-control" tabindex="10" value="<?php if(isset($DLS)){echo $DLS;}  ?>" name="dl_state"  />
                        </div>
                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" tabindex="12" value="<?php if(isset($c_zip)){echo $c_zip;}  ?>" class="form-control "  />
                        </div>
                          
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" tabindex="14" value="<?php if(isset($c_state)){echo $c_state;}  ?>" class="form-control "  />
                            <input type="hidden" class="form-control "  name="cus_id" value="<?php  echo $c_id ;?>"/>
                        </div>
                             
                       
                      </div>
                      
</div>
</div>
              <!-- /.card-body -->
            </div>

 
         <!--/form-group-->       
        

         <!--/col-md-6-->

         <!--/col-md-6-->

 



        
      



  <!-- <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button> -->
              

</div><!-- end col 12 -->
<?php
$productSqlp = mysqli_query($conn,"SELECT * FROM providers");
$productSqlls = mysqli_query($conn,"SELECT * FROM lead_source");
?>
<div class="col-lg-12">
  <!-- <form method="POST" action=""  id="submitw"> -->
<div class="card card-olive
">
              <div class="card-header">
                <h3 class="card-title">Order Elements</h3>
                   <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
           
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

        <div class="row">
          <div class="col-12">


            <div class="row">
          <div class="col-4">
            <div class="form-group">
          <label for="clientName">Current provider</label>
          
          <!-- <input type="hidden" class="form-control"  name="cus_id" value="</?php  echo $c_id ;?>" /> -->
    <select class="form-control" name="Current_pro"  >
                    <option value="<?php if(isset($curr_pro)){echo $curr_pro;}  ?>"><?php if(isset($curr_pro)){echo $curr_pro;}  ?></option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlp)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
          
         <!--/form-group-->
        </div>

          </div>
            <div class="col-4">
            <div class="form-group">
          <label for="clientName">Lead Source</label>
          
          
    <select class="form-control" name="lead_sour"  >
                    <option value="<?php if(isset($led_sc)){echo $led_sc;}  ?>"><?php if(isset($led_sc)){echo $led_sc;}  ?></option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlls)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
          
         <!--/form-group-->
        </div>

          </div>
          
                 <div class="col-4"><div class="form-group">
           
                      <label for="clientName">Assigned To</label>
                      <select class="form-control" name="Assigned_To"  >
                    <option value="<?php if(isset($asgn)){echo $asgn;}  ?>"><?php if(isset($asgn)){echo $asgn;}  ?></option>
                   <option value="Jason">Jason</option>
                   <option value="Jason">Jared</option>
                    <option value="Jason">Fahad</option>
                     <option value="Jason">Feeha</option>
                  </select>
                      
                 
                  </div> 
                </div>
        </div><!-- end row -->
            <!-- Custom Tabs -->
            </div><!-- end col 12 -->
            <?php  

            
    
              $q3 = "SELECT `id`,`provi_name`,`serv_name`,`status`,`sale_date`,`opp_date`,`opp_time`,`account`,`confirmation_num`,`lead_id`,`order_id` FROM `service_offered` WHERE `lead_id` = $lead_get_id  ";
if( $ser_id= mysqli_query($conn, $q3)){

function lead_status_edit($output)
{ 
 $servername = "localhost";
    $username = "root";
   $password = "QJb4yhZzNG4CwGKJ";
    $dbname = "crm";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

 $output = '';
 $q8 = "SELECT * FROM `lead-edit` ORDER BY name ASC";
 if($ser_id = mysqli_query($conn,$q8)) {

 while ($ids_u = mysqli_fetch_array($ser_id)) {
   
    
   $status  = '$status';
   if ($ids_u["id"] == '1') {
     $providers = "$status == '".$ids_u["name"]."'";
   }
   else{ @$provider .= " || $status == '".$ids_u["name"]."'";}
   
   
 
 }
  $output = $providers.$provider;
}
else{
   echo "Error: " . $query8 . "<br>" . mysqli_error($conn);
}
 // foreach($result as $row)
 // {
 //  if ($i=lenth()-1)
 //  $output1 .= $row["name"] &&

 // }
 // else{
 //    $output2 .= $row["name"];
 // }

 // $output .= 
 return $output;
}


       while ($ids_u  = mysqli_fetch_array($ser_id)) {
        $ids = $ids_u['0'];
      $prov = $ids_u['1'];
      $serv = $ids_u['2'];
      $status = trim($ids_u[3]);
      $sal_date = $ids_u['4'];
      $appo_date = $ids_u['5'];
        $appo_time = $ids_u['6'];
          $account = $ids_u['7'];
          $confom = $ids_u['8'];
           $leadids = $ids_u['9'];
            $ordeids = $ids_u['10'];







    if($status == "Installed") {
           
                 
?>
<div class="card card-danger collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Order Elements</h3>
                   <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
         
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<div class="container-fluid" style="padding: 1rem 0rem ;background-color:;"> 
  <hr><hr>
<div class="row" style="padding: 0rem 0rem ; background-color:#; margin: 0rem 0rem;  ">
<input type="hidden" value="<?php echo $ordeids; ?>" name="orders_id[]" class="orders_id">
<input type="hidden" value="<?php echo $leadids; ?>" name="leads_id[]" class="leads_id" >
<input type="hidden" value="<?php echo $ids; ?>" name="serv_id[]" class="serv_id">
         <div class="col-3"><label> Offer Provider </label></div>
       <div class="col-3"><label>Offer Service</label> </div>
        <div class="col-3"> <label>Status</label> </div>
        <div class="col-3"> <label>Sale Date</label> </div>
        </div>
       
 <div class="row" style="padding-bottom: 1rem ;  ">

        <div class="col-3">

        <select name="up_provider_unit[]" class="form-control up_provider_unit">
           <option value="<?php echo $prov; ?>"><?php echo $prov; ?></option>
           
        </select>

        </div>


        <div class="col-3">
          <select name="up_service_unit[]" class="form-control up_service_unit">
               <option value="<?php echo $serv; ?>"><?php echo $serv; ?></option>
             
          </select>
        </div>

         <div class="col-3">
          <select name="up_status_unit[]" class="form-control up_status_unit">
             <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
            
          </select>
        </div>
        <div class="col-3">
          <input type="date" value="<?php echo $sal_date; ?>" name="up_sale_date[]" class="form-control up_sale_date" />
        </div>

 </div>

 <div class="row" style="padding: 0rem 0rem ; background-color:; margin: 0rem 0rem;  ">

        <div class="col-3"> <label>Appt Date</label></div>
        <div class="col-3"><label>Appt Time</label></div>
        <div class="col-3"><label>Account #</label></div>
        <div class="col-3"> <label> Confirmation # </label></div>
  </div>

  <div class="row" style="padding-bottom: 1rem ;  ">

        <div class="col-3">
          <input type="date" value="<?php echo  $appo_date; ?>" name="up_app_date[]" class="form-control up_app_date" />
        </div>
     
    
        <div class="col-3">
           <input type="text" value="<?php echo $appo_time; ?>" name="up_app_time[]" class="form-control up_app_time"  />
        </div>
     
    
        <div class="col-3">
           <input type="text" value="<?php echo $account; ?>" name="up_account[]" class="form-control up_account" />
        </div>

         <div class="col-3">
            <input type="text" class="form-control up_Confirmation_num" value="<?php echo $confom; ?>" name="up_confirmation_num[]"  />
        </div>
 </div>
 <hr>
</div>
</div></div>
<!-- if condition -->
<?php

}  else {

 ?>
 
<div class="card card-dark
">
              <div class="card-header">
                <h3 class="card-title">Order Elements</h3>
                   <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
           
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<div class="container-fluid" style="padding: 0rem 0rem ;background-color:;"> 
  
<div class="row" style="padding: 0rem 0rem ; background-color:#; margin: 0rem 0rem;  ">
<input type="hidden" value="<?php echo $ordeids; ?>" name="orders_id[]" class="orders_id">
<input type="hidden" value="<?php echo $leadids; ?>" name="leads_id" class="leads_id" id="a">
<input type="hidden" value="<?php echo $ids; ?>" name="serv_id[]" class="serv_id">
         <div class="col-3"><label> Offer Provider </label></div>
       <div class="col-3"><label>Offer Service</label> </div>
        <div class="col-3"> <label>Status</label> </div>
        <div class="col-3"> <label>Sale Date</label> </div>
        </div>
       
 <div class="row" style="padding-bottom: 1rem ;  ">

        <div class="col-3">

        <select name="up_provider_unit[]" class="form-control up_provider_unit">
           <option value="<?php echo $prov; ?>"><?php echo $prov; ?></option>
           <?php echo providers($connect); ?>
        </select>

        </div>


        <div class="col-3">
          <select name="up_service_unit[]" class="form-control up_service_unit">
               <option value="<?php echo $serv; ?>"><?php echo $serv; ?></option>
              <?php echo service($connect); ?>
          </select>
        </div>

         <div class="col-3">
          <select name="up_status_unit[]" class="form-control up_status_unit">
            <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
            <?php echo lead_status($connect); ?>
          </select>
        </div>
        <div class="col-3">
          <input type="date" value="<?php echo $sal_date; ?>" name="up_sale_date[]" class="form-control up_sale_date" />
        </div>

 </div>

 <div class="row" style="padding: .5rem 0rem ; background-color:; margin: .5rem 0rem;  ">

        <div class="col-3"> <label>Appt Date</label></div>
        <div class="col-3"><label>Appt Time</label></div>
        <div class="col-3"><label>Account #</label></div>
        <div class="col-3"> <label> Confirmation # </label></div>
  </div>

  <div class="row" style="padding-bottom: 1rem ;  ">

        <div class="col-3">
          <input type="date" value="<?php echo $appo_date; ?>" name="up_app_date[]" class="form-control up_app_date" />
        </div>
     
    
        <div class="col-3">
           <input type="text" value="<?php echo $appo_time; ?>" name="up_app_time[]" class="form-control up_app_time" />
        </div>
     
    
        <div class="col-3">
           <input type="text" value="<?php echo $account; ?>" name="up_account[]" class="form-control up_account" />
        </div>

         <div class="col-3">
            <input type="text" class="form-control up_Confirmation_num" value="<?php echo $confom; ?>" name="up_confirmation_num[]" />
        </div>
 </div>
 <hr>
</div>
</div></div>

      <?php
    }
 }
        }  
           ?>

           
           <div id="productTable">
         
           
       
       <div class="">
        <button type="button" name="add" class="btn-app add bg-warning">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-plus"></i>add</button>
                </div>
      
         <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">Sale Elements</h3>
               <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
             <i class="fas fa-minus"></i>
           </button>
           
          </div>
              </div>
              <div class="card-body">
           <div class="row">

            <div class="col-3"> Offer Provider </div>
          <div class="col-3">Offer Service </div>
           <div class="col-3"> Status </div>
            <div class="col-3"> Sale Date </div>
           </div>
           
        <div class="row">

        <div class="col-3">
        <select name="provider_unit[]" class="form-control provider_unit"><option value="None">None</option><?php echo providers($connect); ?></select></div>


       <div class="col-3"><select name="service_unit[]" class="form-control service_unit" data-placeholder="Select a service_unit" style="width: 100%;"><option value="None">None</option><?php echo service($connect); ?></select></div>

        <div class="col-3"><select name="status_unit[]" class="form-control status_unit"><option value="None">None</option><?php echo lead_status($connect); ?></select></div>

        <div class="col-3"><input type="date" name="sale_date[]" class="form-control sale_date" /></div>

        </div>

        <div class="row">

        
           <div class="col-3"> Appt Date</div>
            <div class="col-3">Appt Time</div>
           <div class="col-3">Account #</div>
            <div class="col-3">Confirmation #  </div>
             </div>

             <div class="row">
          <div class="col-3"><input type="date" name="app_date[]" class="form-control app_date" /></div>
               
           
          <div class="col-3"><input type="text" name="app_time[]" class="form-control app_time" /></div>
             
             
          <div class="col-3"><input type="text" name="account[]" class="form-control account" /></div>

          <div class="col-3"><input type="text" name="Confirmation_num[]" class="form-control Confirmation_num" /></div>

           </div>
 </div>
  </div>
         

         <!--  </?php include ('leadtable.php');  ?>  -->
           


  
        </div> 
       

      
       
                 
                <div class="col-12"><div class="form-group">
            <label for="clientName">Comment </label>
                      <input type="text" class="form-control" name="comment"  required/>
                 
                  </div> 
                </div>
                <div class="col-12"><div class="form-group">
            <label for="clientName">Description</label>
            <textarea class="form-control" rows="3" name="Description"  placeholder="Enter ...">
             <?php if(isset($desc)){echo $desc;}  ?>
            </textarea>
                      
                 
                  </div> 
                </div>
    </div><!-- end row -->

                </div><!-- end card-body -->
              </div><!-- end card-warning -->

 <?php  



 ?>
   <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Comment Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Comment</th>
                      <th >Date</th>
                    </tr>
                  </thead>
                  <tbody id="comment_detail">
<?php

$connect = new PDO("mysql:host=localhost;dbname=crm", "root", "QJb4yhZzNG4CwGKJ");
$query = "SELECT `id`, `lead_id`, `comment`, `updated_user`, `date_time` FROM `lead_comment` WHERE lead_id = $lead_get_id ";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


$output ='';
foreach($result as $row)
{
  $datas = date('m-d-Y', strtotime($row['4']));
  // $status = '';  
  $output .= '


    <tr>
      <td>'.$row['0'].'</td>
      <td>'.$row['3'].'</td>
      <td>'.$row['2'].'</td>
      <td>'. $datas.'</td>
    
    </tr>
  ';

}
echo $output;

?>
                     

                    <!-- <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr> -->
                    
                  </tbody>
                </table>
              </div>
    

 <?php  



 ?>
</div>
</div>
</div>



<div class="row">
          <div class="col-md-7 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">File Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uploaded File</th>
                      <th>File Type</th>
                      <th >Uploaded On </th>
                    </tr>
                  </thead>
                  <tbody id="comment_detail">
<?php

$connect = new PDO("mysql:host=localhost;dbname=crm", "root", "QJb4yhZzNG4CwGKJ");
$query = "SELECT `id`, `lead_id`, `files`, `files_types`, `upload_on` FROM `lead_files` WHERE  lead_id = $lead_get_id ";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


$output ='';
foreach($result as $row)
{
  $datas = date('m-d-Y', strtotime($row['4']));
  // $status = '';  
  $output .= '


    <tr>
      <td>'.$row['0'].'</td>
      <td>'.$row['2'].'</td>
      <td>'.$row['3'].'</td>
      <td>'. $datas.'</td>
    
    </tr>
  ';

}
echo $output;

?>
                     

                    <!-- <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr> -->
                    
                  </tbody>
                </table>
              </div>
    

 <?php  



 ?>
</div>
</div>
</div>
</div>

  <div class="col-lg-6">
                    <div class="btn-group w-100 text-center">
                      
                        
                        <div class="upload text-center">
       <!--  <a onclick="select_file()" class="pure-button"></a> -->
     <input id="image" type="file" name="files[]" style="display: none;" size="60"  multiple=""> 
     <label for="image" class="btn btn-block btn-success btn-lg"><i class="fas fa-plus"></i><span>No file chosen</span></label>
     <!-- <button class="pure-button pure-button-primary" id="image" type="file" name="files[]" multiple=""><i class="fas fa-times-circle"></i>
                        <span> upload</span>
                      </button> -->
      </div>
      
      

                    </div>
                  </div>

          
<!-- <button type="submit" name="submit" class="btn btn-block btn-success btn-lg">save</button>  -->
  <input type="submit" name="btnsub" value="SAVE"  id="submite" class="btn btn-block btn-success btn-lg"> 
            
     <br>     
<?php  //include("inc/footer.php"); 

    // if (isset($_POST['submit'])) {
    //     // http_send_status(400);
    //     // exit;
    //   echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    // }
?>

      </form>
            </div><!-- end col 12 -->
          

</div>

<!-- end row -->

<section>
 
 
</section>
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/toastr/toastr.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

      
<?php


 

// if(isset($_POST['btn-upload']))
//                 {
                  
                  

//                   }





 ?>

   
        
      </div>
   </div>
</div>
</div>


 
<!-- Bootstrap -->

<?php

 if (isset($_POST['btnsub'])) {
  
    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    


 $count=count($_POST["serv_id"]);

       for($i=0;$i<$count;$i++){

 @$query = "UPDATE `service_offered` SET `serv_name`='".$_POST['up_service_unit'][$i]."',`status`='".$_POST['up_status_unit'][$i]."',`sale_date`='".$_POST['up_sale_date'][$i]."',`opp_date`='".$_POST['up_app_date'][$i]."',`opp_time`='".$_POST['up_app_time'][$i]."',`account`='".$_POST['up_account'][$i]."',`confirmation_num`='".$_POST['up_confirmation_num'][$i]."'
 where id ='".$_POST['serv_id'][$i]."'";

if (mysqli_query($conn, $query)) {
  


}

else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                      
                      }
 }

   

$c_id = $_POST['cus_id'];

$c_fname = trim($_POST['c_fname']);
    $c_lname = trim($_POST['c_lname']);
$c_phone = trim($_POST['c_phone']);

    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
$mobile_phone = trim($_POST['mobile_phone']);
$street = trim($_POST['street']);
        $zip_code = trim($_POST['zip_code']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $ssn = trim($_POST['ssn']);
        $dl = trim($_POST['dl']);
        $dl_exp = trim($_POST['dl_exp']);
        $dl_state = trim($_POST['dl_state']);
$lead_sour = $_POST['lead_sour'];
$Current_pro = $_POST['Current_pro'];

 $sql = "UPDATE `customer` SET `first_name`='$c_fname',`last_name`='$c_lname',`phone`='$c_phone',`alt_num`='$mobile_phone',`email`='$email',`DOB`='$dob',`SSN`='$ssn',`Driving_license`='$dl',`Driving_license_Expired`='$dl_exp',`Driving_License_State`='$dl_state',`street`='$street',`city`='$city',`state`='$state',`zip_code`='$zip_code',`current_provider`='$Current_pro',`Lead_Source`='$lead_sour' where id ='$c_id'";
if (mysqli_query($conn, $sql)) {}

$Assigned_To = $_POST['Assigned_To'];
$Description = $_POST['Description'];

echo $qaa ="UPDATE `orders` SET `Assigned_To`='$Assigned_To',`Description`='$Description' WHERE `id` ='$ordeids' ";


  if (mysqli_query($conn, $qaa)) {
    

  }
// $led_idd = $_POST['leads_id'];
$comt = $_POST['comment'];
$qa ="INSERT INTO `lead_comment`( `lead_id`, `comment`, `updated_user`)  VALUES ('$lead_get_id','$comt','$u_namse' ) ";


  if (mysqli_query($conn, $qa)) {if (1==1) {
echo "
<script>
 
window.location.assign('leadlist.php?w=0')

</script>";
//header("Location:lead_table.php");
}}
// window.location.assign('leadlist.php?w=0') 
// 
else {
        echo "Error: " . $qa . "<br>" . mysqli_error($conn);
                      
                      }

}
?>

<!-- <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script> -->
<!-- <script>
$(document).ready(function(){
  
    fetch_user();
  setInterval(function(){
    fetch_user();
  }, 2000);

  function fetch_user()
  {
 //var firstName = $('leads_id').text();
// var firstName = $("leads_id").val();

    $.ajax({
      url:"get_comment_data.php",
      method:"get",
      data:id:</?php echo $lead_get_id; ?> ,
      success:function(data){
        $('#comment_detail').html(data);
      },
     

    })
  }

});

</script> -->
<script type="text/javascript">
    // select file function only for styling up input[type="file"]
    function select_file(){
      document.getElementById('image').click();
      return false;
    }
  </script> 

<script> 
$(document).ready(function(){
 
     $(document).on('click', '.add', function(){
        var html = '';
         html += '<div class="whole">';
       
html += '<div class="card card-warning">';
             html += '<div class="card-header">';
               html += '<h3 class="card-title">Sale Elements</h3>';
               html += '<div class="card-tools">';
            html+= '<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">';
             html+= '<i class="fas fa-minus"></i>';
           html+= '</button>';
           html+= '<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">';
             html+= '<i class="fas fa-times"></i>';
           html +='</button>';
          html+= '</div>';
              html += '</div>';
              html+= '<div class="card-body">';
           html += '<div class="row">';

            html += '<div class="col-3"> Offer Provider </div>';
          html += '<div class="col-3">Offer Service </div>';
           html += '<div class="col-3"> Status </div>';
            html += '<div class="col-3"> Sale Date </div>';
           html += '</div>';
           
        html += '<div class="row">';

        html += '<div class="col-3">';
         html +='<select name="provider_unit[]" class="form-control provider_unit"><option value="">Select Unit</option><?php echo providers($connect); ?></select></div>';


       html += '<div class="col-3"><select name="service_unit[]" class="form-control service_unit"><option value="">Select Unit</option><?php echo service($connect); ?></select></div>';

        html += '<div class="col-3"><select name="status_unit[]" class="form-control status_unit"><option value="">Select Unit</option><?php echo lead_status($connect); ?></select></div>';

        html += '<div class="col-3"><input type="date" name="sale_date[]" class="form-control sale_date" /></div>';

        html += '</div>';

        html += '<div class="row">';

        
           html += '<div class="col-3">Appt Date</div>';
            html += '<div class="col-3">Appt Time</div>';
           html += '<div class="col-3">Account #</div>';
            html += '<div class="col-3">Confirmation #  </div>';
             html += '</div>';

             html += '<div class="row">';
          html += '<div class="col-3"><input type="date" name="app_date[]" class="form-control app_date" /></div>';
               
            // Appointment Time
          html += '<div class="col-3"><input type="text" name="app_time[]" class="form-control app_time" /></div>';
             
             //Account Number
          html += '<div class="col-3"><input type="text" name="account[]" class="form-control account" /></div>';

          html += '<div class="col-3"><input type="text" name="Confirmation_num[]" class="form-control Confirmation_num" /></div>';

           html += '</div>';
 html += '</div>';
  html += '</div>';

          html += '<div><button type="button" name="remove" class="remove btn btn-app bg-danger"><i class="fas fa-trash-alt"></i></button></div> </div>';
          $('#productTable').append(html);
    });
 // $('#productTable').on("click",".remove", function(e){ //user click on remove text
 //    e.preventDefault();
 //     $(this).parent('.tr').remove(); 
     
   
 //  });
       $(document).on('click', '.remove', function(){
        $(this).closest('.whole').remove();
       });
 
    $('#submitw').on('submit', function(event){
     //event.preventDefault();
      var error = '';


      // $('.serv_id').each(function(){
      //  var count = 1;
      
      //  count = count + 1;
      // });
      // $('.orders_id').each(function(){
      //  var count = 1;
      
      //  count = count + 1;
      // });
      // $('.leads_id').each(function(){
      //  var count = 1;
      
      //  count = count + 1;
      // });
       

      //Provider Value
      $('.provider_unit').each(function(){
       var count = 1;
       if($(this).val() == '')
       {
        error += "<p>Select Provider at "+count+" Row</p>";
        return false;
       }
       count = count + 1;
      });
         
         
      //Service Value
      $('.service_unit').each(function(){
       var count = 1;
       if($(this).val() == '')
       {
        error += "<p>Select Service at "+count+" Row</p>";
        return false;
       }
       count = count + 1;
      });
         
         
          //Status Value
      $('.status_unit').each(function(){
       var count = 1;
       if($(this).val() == '')
       {
        error += "<p>Select Status at "+count+" Row</p>";
        return false;
       }
       count = count + 1;
      });
         
         //Sale Date
      $('.sale_date').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter App Date at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });

         //Appointment Date
      $('.app_date').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter App Date at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });
         
              //Appointment Time
      $('.app_time').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter App Time at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });
         
         
       //Account Number
      $('.account').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter Account at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });

      $('.confirmation_num').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter Account at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });
// var form = $(this);
//      //var serializedData = new FormData(this);
//  var serializedData = $form.serialize();
var serializedData = new FormData(this);
 //alert(error);
      if(error == '')
      {
       // alert(form_data);
       $.ajax({
        url:"update_data.php",
        method:"POST",
        data:serializedData,
        success:function(data)
        {console.log(data);
          //alert(data);
         toastr.success("Order Added Successfully ...")
        //toastr.options.onHidden = function() { window.locationlocation.reload() }
        //console.log(data);

        },
        cache: false,
        contentType: false,
        processData: false
       });
      }
      else
      {
       $('#error').html('<div class="alert alert-danger">'+error+'</div>');
      }
    });
 
 
  // /* variables */
  // var preview = $('img');
  // var status = $('.status');
  // var percent = $('.percent');
  // var bar = $('.bar');

  // /* only for image preview */
  // $("#image").change(function(){
  //   preview.fadeOut();

  //    html FileRender Api 
  //   var oFReader = new FileReader();
  //   oFReader.readAsDataURL(document.getElementById("image").files[0]);

  //   oFReader.onload = function (oFREvent) {
  //     preview.attr('src', oFREvent.target.result).fadeIn();
  //   };
  // });




  // /* submit form with ajax request */
  // $('.pure-form').ajaxForm({

  //   /* set data type json */
  //   dataType:  'json',

  //   /* reset before submitting */
  //   beforeSend: function() {
  //     status.fadeOut();
  //     bar.width('0%');
  //     percent.html('0%');
  //   },

  //   /* progress bar call back*/
  //   uploadProgress: function(event, position, total, percentComplete) {
  //     var pVel = percentComplete + '%';
  //     bar.width(pVel);
  //     percent.html(pVel);
  //   },

  //   /* complete call back */
  //   complete: function(data) {
  //     preview.fadeOut(800);
  //     status.html(data.responseJSON.status).fadeIn();
  //   }

  // });
});
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
<?php 

if ($dep_id == "3") { 
echo '<script type="text/javascript">
$(document).ready(function() {
  var $form = $(this);
      var $inputs = $form.find("input, select, button, textarea");
      $inputs.prop("disabled", true);
      $( "#search" ).prop( "disabled", false );
      $( "#searchd" ).prop( "disabled", false );
      });
</script> ';
}
elseif ($dep_id == "11" or $dep_id == "1" or $dep_id == "4") { 
echo '<script type="text/javascript">
$(document).ready(function() {
  var $form = $(this);
      var $inputs = $form.find("input, select, button, textarea")
      $inputs.prop("disabled", false)

      });
</script> ';

}
else{

echo '<script type="text/javascript">
      window.location.assign("500.html")
      
</script> ';
}
  ?>

    </body>
</html>