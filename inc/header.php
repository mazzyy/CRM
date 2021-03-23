<?php 
include("inc/db.php");
 //session_start(); 
$user_id = $_SESSION['emp_id']; 
$id_sql=("SELECT id FROM `employess`WHERE `id`= $user_id");
$utb = mysqli_query($conn, $id_sql);
$utb = mysqli_fetch_array($utb);
  $id_get = $utb['0'];
?>
<style>
.modal-confirm {		
	color: #434e65;
	width: 525px;
}
.modal-confirm .modal-content {
	padding: 20px;
	font-size: 16px;
	border-radius: 5px;
	border: none;
}
.modal-confirm .modal-header {
	background: #e85e6c;
	border-bottom: none;   
	position: relative;
	text-align: center;
	margin: -20px -20px 0;
	border-radius: 5px 5px 0 0;
	padding: 35px;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 36px;
	margin: 10px 0;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-confirm .close {
	position: absolute;
	top: 15px;
	right: 15px;
	color: #fff;
	text-shadow: none;
	opacity: 0.5;
}
.modal-confirm .close:hover {
	opacity: 0.8;
}
.modal-confirm .icon-box {
	color: #fff;		
	width: 95px;
	height: 95px;
	display: inline-block;
	border-radius: 50%;
	z-index: 9;
	border: 5px solid #fff;
	padding: 15px;
	text-align: center;
}
.modal-confirm .icon-box i {
	font-size: 58px;
	margin: -2px 0 0 -2px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #fa2c2c ;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border-radius: 30px;
	margin-top: 10px;
	padding: 6px 20px;
	min-width: 150px;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #eda645 !important;
	outline: none;
}

</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="time.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
<div class="container">
      <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-sx-12 ">
                      <?php
                      if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 or $dep_id == 11 ) { 


                        echo '<form class="form-inline ml-3" action="lead_table.php" method="post">';
                        echo '   <div class="input-group input-group-sm">';
                        echo '   <input type="text" placeholder="First/Last Name" class="form-control" name="searchlead" required>
                              <div class="input-group-append">';

                        echo '<div class="col-sm-2  p-1">
                                      <input type="hidden" placeholder="Primary/Mobile Number"class="form-control" name="phone">
                                    </div>';

                                
                          echo '            <input type="hidden" placeholder="Email"class="form-control"  name="email">';
                                    

                            
                          echo '            <input type="hidden" placeholder="Sale Date" class="form-control" name="sal_date">';
                                
                              
                          echo '         <input type="hidden" placeholder="Appointment Date" class="form-control"name="appo_date">';
                              
                          echo '     <button class="btn btn-navbar" type="submit" name="search">
                                  <i class="fas fa-search"></i>
                                </button>';
                          echo '   </div>
                            </div>
                          </form>';
                          
                      


                        }
                          ?>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-sx-12  ">
           <?php 
                  echo '<form class="form-inline ml-3" action="find.php" method="get">';
                  echo '   <div class="input-group input-group-sm ">';
                  echo '   <input type="text" placeholder="zipcode" maxlength="5" class="form-control " name="zipcode" required>
                           <div class="input-group-append">';

                        
                      
                    echo '     <button class="btn btn-navbar" type="submit" name="search">
                            <i class="fas fa-search"></i>
                          </button>';
                    echo '   </div>
                      </div>
                    </form>';
           ?>
            </div>
            
       </div>
</div>
  
<!-- <form class="form-inline ml-3" action="lead_table.php" method="post">
  <div class="input-group input-group-sm " >
      <input type="text" placeholder="First/Last Name" class="form-control" name="searchlead" required>
  <div class="input-group-append">
    
   <button class="pl-5 btn btn-navbar" type="submit" name="search">
            <i class="fas fa-search"></i>
          </button>
     </div>
      </div>
  </form> -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="lead_table.php">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div id="user_details">
          </div>

          
          <a href="pending.php" class="dropdown-item dropdown-footer">See All Notifications</a>
          
        </div>
      </li>
      
      <?php 
      date_default_timezone_set("US/Eastern");
         $datee = date('m/d/Y');
         "<br>";
        
         $today_date = date("Y-m-d", strtotime($datee));
         @$abcd = mysqli_query($conn,"SELECT * FROM `shift`INNER JOIN attendace ON shift.attnd_id= attendace.id where emp_id ='$id_get' and `date` = '$today_date'");

  
         echo "<br>";
         @$numrow = $abcd->fetch_row();
         @$nu = $numrow[3];
             if($nu == null) {
       
              echo '<li class="nav-item"  >';
              // echo '<a   onclick="WarningFuction()" data-toggle="modal" href="#"  class="nav-link" >';
              echo '<a    href="#myModal1" class="trigger-btn nav-link" data-toggle="modal" >';
             

               echo '<i class="text-danger fas fa-sign-out-alt"></i>
               </a>
              </li>'; 
             }
             else{
              echo '<li class="nav-item"  >
              <a href="lockscreen.php"  class="nav-link" >
                <i class="text-danger fas fa-sign-out-alt"></i>
               </a>
              </li>';
             }
            
          ?>
     
    </ul>



  </nav>
    <script>
$(document).ready(function(){
  
    fetch_user();
  setInterval(function(){
    fetch_user();
  }, 2000);

  function fetch_user()
  {
    $.ajax({
      url:"pending_ajax.php",
      method:"POST",
      success:function(data){
        $('#user_details').html(data);
      }
    })
  }
 

});
 
</script>
<script>
 function WarningFuction(){

  // toastr.error("Please Time TimeOut First");
}
</script>
<script>
$('#myModal1').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>
<!-- Modal -->
<div id="myModal1" class="modal fade" id="modal-danger">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
        <!-- <h4>Warning!</h4>	 -->
        <i class="fas fa-exclamation"></i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div >
			
				<h4>going without Time Out</h4>
	
			</div>
   
            <div class="row">
            
               <div  class="col-1"></div>
               
               &nbsp;&nbsp;&nbsp;<div class="col-5 " > <b> <button class="btn btn-warning bg-info" data-dismiss="modal">Close</button></b> </div>
           <div class="col-5 " ><a href="lockscreen.php" class="btn btn-danger pt-2"  >
                        <i class=" pt-1 text-danger fas fa-sign-out-alt"></i>
                        SignOut
                  </a>
            </div>
           <div></div>
                  
            </div>
   
		</div>
	</div>
</div>     