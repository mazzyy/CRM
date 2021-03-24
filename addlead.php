<?php include("inc/db.php");
    session_start(); 

    $servername = "localhost";
    $username = "root";
   $password = "QJb4yhZzNG4CwGKJ";
    $dbname = "crm";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
//index.php
$dep_id=  $_SESSION['dep_id'];
if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 or $dep_id == 11) { 

}
else{

echo '<script type="text/javascript">
      window.location.assign("500.html")
      
</script> ';
}






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
 // echo '<option value="none">none</option>';
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
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <!-- Theme style -->
  
<link rel="stylesheet" href="dist/css/adminlte.css">
  
  


 

</head>
<style type="text/css">
  .toast-custom {
    background-color: purple;
}
#toast-container .toast-warning{
  background-color: #2a3f54;
}
.a-n2{     margin: 33px 20px;
    text-decoration: none;
    position: relative;
    padding: 18px 61px;
    overflow: hidden;
    transition: 0.2s all;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 4px;
    background: #00000042;
    
    border-color: transparent ;
    
}
.a-n2 span{
    position: absolute;
    display: block;
}
.a-n2:hover{    background: #26a0da;
    color: #000;
    box-shadow: 1px 0px 10px #26a0da, 0px 0px 4px #00477bfc, 0px 0px 41px #26a0da;
    transition-delay: 0.5s
}
.a-n2 span:nth-child(1){
    top: 0px;
    left: -91%;
    width: 100%;
    height: 2px;
    background: #26a0da;
}
 
.a-n2:hover span:nth-child(1){
left:0%; 
    transition: 0.3s; 
}
.a-n2 span:nth-child(3){
    bottom: 0px;
    right: -91%;
    width: 100%;
    height: 2px;
    background: #26a0da;
}
 
.a-n2:hover span:nth-child(3){
right:0%; 
    transition: 0.3s; 
}
.a-n2 span:nth-child(2){
    bottom: -70%;
    right: 0%;
    width: 2px;
    FONT-WEIGHT: 100;
    background: #26a0da;
    height: 100%;
}
 
.a-n2:hover span:nth-child(2){
bottom:0%; 
    transition: 0.3s; 
}
.a-n2 span:nth-child(4){
    top: -70%;
    left: 0%;
    width: 2px;
    FONT-WEIGHT: 100;
    background: #26a0da;
    height: 100%;
}
 
.a-n2:hover span:nth-child(4){
top:0%; 
    transition: 0.3s; 
}

.contro {
    
    color: #ffffff;
    background-color: #273335;
   
}
.contro:disabled, .contro[readonly] {
    background-color: #616b6d;
    opacity: 1;
}
.card{


}
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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

  <?php 

   include("inc/header.php");  
   include("inc/sidebar.php"); 

 ?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
           <div class="col-sm-12">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lead Detail</h1>
            <?php
            
            $u_idse = $_SESSION['u_id'];    
            $u_namse = $_SESSION['u_name'];
// echo $_SESSION['role_id'];

$productSqlp = mysqli_query($conn,"SELECT * FROM providers");
$productSqlls = mysqli_query($conn,"SELECT * FROM lead_source");

            ?>
        </div>
<!-- action="insert_data.php"
 --></div>
<form  method="POST" class="pure-form" id="submitw">
            <div class="row">
             
          <div class="col-lg-12">


          <div class="card card-pink">
              <div class="card-header">
                    <h3 class="card-title">Customer Detail</h3>
               <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          
          </div>
              </div>
  <div class="card-body">
 <div class="row" >


   

         

        <div class="col-sm-6">
          <div class="form-group">
          <label for="clientName" >First Name</label><span style="color: red;">*</span>
          
           
            <input type="text" class="form-control" tabindex="1"  name="c_fname" value="<?php if(isset($c_fname)){ echo $c_fname ;} ?>"  />
          
         <!--/form-group-->
        </div>

          <div class="form-group">
         <label for="clientContact">Primary Phone</label><span style="color: red;">*</span>
          
        <input type="text" class="form-control " tabindex="3"id="clientContact" name="c_phone" value="<?php if(isset($c_phone)){echo $c_phone;}  ?>"  />
          
        </div>
        <div class="form-group">
          <label for="clientName" >Primary Email</label><span style="color: red;">*</span>
          
          
            <input type="text" class="form-control " tabindex="5" name="email" value="<?php if(isset($c_email)){echo $c_email;}  ?>"  />
          
         <!--/form-group-->
        </div>
      
      </div>
      <div class="col-sm-6">
          <div class="form-group">

         <label for="orderDate" >Last Name</label><span style="color: red;">*</span>
         
             
            <input type="text" class="form-control" tabindex="2" id="orderDate" name="c_lname"  value="<?php if(isset($c_lname)){echo $c_lname;}  ?> "  />
          
        </div>
         <!--/form-group-->
       <div class="form-group">
                            <label>Mobile Phone</label>
                            <input type="text" name="mobile_phone" tabindex="4" class="form-control" value="<?php if(isset($c_altnum)){echo $c_altnum;}  ?>"  />
                        </div>
          <div class="form-group">
          <label for="clientName">Date Of Birth</label><span style="color: red;">*</span>
          
          
            <input type="text" class="form-control " tabindex="6" name="dob" value="<?php if(isset($c_dob)){echo $c_dob;}  ?>"  />
          
         <!--/form-group-->
        </div>
        
          
      </div>
      <div class="col-md-6">
                          
                        <div class="form-group">
                            <label>SSN</label>
                            <input type="text" name="ssn" tabindex="7" value="<?php if(isset($c_ssn)){echo $c_ssn;}  ?>" class="form-control " />
                        </div>
                          </div>
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Driving Licence</label><span style="color: red;"></span>
                            <input type="text" class="form-control" tabindex="8" value="<?php if(isset($DL)){echo $DL;}  ?>" name="dl"   />
                        </div>
                  
    
                      </div>
      <div class="col-md-6">
                          
 <div class="form-group">
                            <label>Driving License Expired</label>
                            <input type="text" class="form-control" tabindex="9" value="<?php if(isset($DLE)){echo $DLE;}  ?>" name="dl_exp"  />
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
                            <input type="text" name="zip_code" tabindex="12"  value="<?php if(isset($c_zip)){echo $c_zip;}  ?>" class="form-control "  />
                        </div>
                          
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" tabindex="14"  value="<?php if(isset($c_state)){echo $c_state;}  ?>" class="form-control "  />
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
  
<div class="col-lg-12">
  
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
              <div class="card-body" >

        <div class="row">
          <div class="col-12">


            <div class="row">
          <div class="col-4">
            <div class="form-group">
          <label for="clientName">Current provider</label>
          
           
          
    <select class="form-control " name="Current_pro"  >
                    <option value="<?php if(isset($c_cu_pro)){echo $c_cu_pro;}  ?>"><?php if(isset($c_cu_pro)){echo $c_cu_pro;}  ?></option>
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
                    <option value="<?php if(isset($c_led_scr)){echo $c_led_scr;}  ?>"><?php if(isset($c_led_scr)){echo $c_led_scr;}  ?></option>
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
                    <option value="<?php echo$u_namse;?>"><?php echo$u_namse;  ?></option>
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
          






   
<!-- if condition -->

 
           

      

           
           <div id="productTable">
         
           
       
       <div class="">
        <button type="button" name="add" class="btn-app add bg-warning" >
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

            <div class="col-3">Service Providers Sold </div>
          <div class="col-3">Product Sold</div>
           <div class="col-3"> Status </div>
            <div class="col-3"> Sale Date </div>
           </div>
           
        <div class="row">

        <div class="col-3">
        <select name="provider_unit[]" class="form-control provider_unit"><option value="None">None</option><?php echo providers($connect); ?></select></div>


       <div class="col-3"><select name="service_unit1[]" class="select2 form-control service_unit" multiple="multiple" data-placeholder="Select a service_unit" style="width: 100%;"><option value="None" selected>None</option><?php echo service($connect); ?></select></div>

        <div class="col-3"><select name="status_unit[]" class="form-control status_unit"><option value="">Select Status</option><?php echo lead_status($connect); ?></select></div>

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
            <label for="clientName">Description</label>
            <textarea class="form-control" name="Description"/></textarea> 
                      
                 
                  </div> 
                </div>
    </div><!-- end row -->

                </div>
                <!-- end card-body -->
              </div><!-- end card-warning -->

   


          
<!-- <button type="submit" name="submit" class="btn btn-block btn-success btn-lg">save</button>  -->
 
            
     <br> 



<section>
 
  <div class="container-fluid">
    
<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Upload File
</h3>
              </div>
              <div class="card-body text-center">
                <div  class="row">
                  
                  

                  <div class="col-lg-6">
                    <div class="btn-group w-100 text-center">
                      
                        
                        <div class="upload text-center">
       <!--  <a onclick="select_file()" class="pure-button"></a> -->
     <input type="file" class="files" name="multipleFile[]" id="image" multiple> 
     
     <!-- <button class="pure-button pure-button-primary" id="image" type="file" name="files[]" multiple=""><i class="fas fa-times-circle"></i>
                        <span> upload</span>
                      </button> -->
      </div>
    
      

                    </div>
                  </div>

                
                  
                </div>
               
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
        </div>
    
  </div>
</section> 
 <input type="submit" name="btnsub" value="SAVE"  id="submite" class="btn btn-block btn-success btn-lg" >    
</div>

              
            <!-- end col 12 -->
          


</div>
</div>







  </form>

</div>

</div>
</div>
</div>

</div>






    <?php include('inc/footer.php');  ?>

</div>
<!-- ./wrapper -->
<!-- end row -->

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
<script src="plugins/select2/js/select2.full.min.js"></script>
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

      


   
        
      
   



 
<!-- Bootstrap -->


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


<script> 
   $(function () {
     $('.select2').select2()
   });
$(document).ready(function(){


$("#findid").click(function(){  
var find = $("#findid2").val();

    $.ajax({
            url: "select_ajax.php",
            method:"POST",
           data:{findid2:find},
            success: function(data){
              $('#mydiv').html(data);
              
             }
          });

  });



 qi=1;
 
     $(document).on('click', '.add', function(){
 $(function () {
     $('.select3').select2()
   });
      ++qi;
        var html = '';
         html += '<div class="whole">';
       
html += '<div class="card card-warning">';
             html += '<div class="card-header">';
               html += '<h3 class="card-title">Sale Elements</h3>';
               html += '<div class="card-tools">';
            html+= '<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">';
             html+= '<i class="fas fa-minus"></i>';
           html+= '</button>';
          
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
         html +='<select name="provider_unit[]" class="form-control provider_unit"><option value="None">None</option><?php echo providers($connect); ?></select></div>';


       html += '<div class="col-3"><select name="service_unit'+qi+'[]" class="select3 form-control service_unit" multiple="multiple" data-placeholder="Select a service_unit"><option value="None">None</option><?php echo service($connect); ?></select></div>';

        html += '<div class="col-3"><select name="status_unit[]" class="form-control status_unit"><option value="">Select Unit</option><?php echo lead_status($connect); ?></select></div>';

        html += '<div class="col-3"><input type="date" name="sale_date[]" class="form-control sale_date" /></div>';

        html += '</div>';

        html += '<div class="row">';

        
           html += '<div class="col-3"> Appt Date</div>';
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
  html += '';

          html += '<button type="button" name="remove" class="remove btn btn-app bg-danger"><i class="fas fa-trash-alt"></i></button> </div></div>';
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
     
      event.preventDefault();

var error = '';
       

      //Provider Value
      $('.provider_unit').each(function(){
       var count = 1;
       if($(this).val() == '')
       {
        error += toastr.warning(" Please Select Provider First");
        return false;
       }
       count = count + 1;
      });
         
      //     $('.multipleFile').each(function(){
      //  var count = 1;
      
      //  count = count + 1;
      // });
      //Service Value
 $('.service_unit1').each(function(){
       var count = 1;
        //var dfs = $(this).val();
      // alert(dfs)
       if($(this).val() == '')
       {
        error += toastr.warning(" Please Select Service First");
       }
       count = count + 1;
      });
      $('.service_unit2').each(function(){
       var count = 1;
        //var dfs = $(this).val();
      // alert(dfs)
       if($(this).val() == '')
       {
        error += toastr.warning(" Please Select Service First");
       }
       count = count + 1;
      });
      $('.service_unit3').each(function(){
       var count = 1;
        //var dfs = $(this).val();
      // alert(dfs)
       if($(this).val() == '')
       {
        error += toastr.warning(" Please Select Service First");
       }
       count = count + 1;
      });
     
          //Status Value
      // $('.status_unit').each(function(){
      //  var count = 1;
      //  if($(this).val() == '')
      //  {
      //   error += toastr.warning(" Please Select Status First");
      //   return false;
      //  }
      //  count = count + 1;
      // });
      $('.status_unit').each(function(){
       var count = 1;
       if($(this).val() == '')
       {
        error += toastr.warning(" Please Select Status First");
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

      $('.Confirmation_num').each(function(){
       var count = 1;
       // if($(this).val() == '')
       // {
       //  error += "<p>Enter Account at "+count+" Row</p>";
       //  return false;
       // }
       count = count + 1;
      });

       //var $form = $(this);
 //var $inputs = $form.find("input, select, button, textarea");
var serializedData = new FormData(this);

      // var serializedData = $form.serialize();
       // $inputs.prop("disabled", true);
       //alert(serializedData)
      if(error == '')
      {
        //$inputs.prop("disabled", true);
       $.ajax({

        url:"insert_data.php",
        method:"POST",
       data:serializedData,
        success:function(data)
        {
          //console.log(data)
         // toastr.options.hideDuration:1000 = function() { window.location.assign('addlead.php') }
        //console.log(data);
        
        window.location.assign('leadlist.php?w=1')
        
        //console.log(data);

        },
                cache: false,
        contentType: false,
        processData: false

       });
      }
      else
      {
       error
      }event.preventDefault();
    });
 
 
  




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




 
// document.onkeypress = function (event) {  
// event = (event || window.event);  
// if (event.keyCode == 13) {  
// return false;  
// }  
// }  
// document.onmousedown = function (event) {  
// event = (event || window.event);  
// if (event.keyCode == 13) {  
// return false;  
// }  
// }  
// document.onkeydown = function (event) {  
// event = (event || window.event);  
// if (event.keyCode == 13) {  
// return false;  
// }  
// }  

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