<?php
include("inc/db.php");
session_start(); 
 $_SESSION['u_id'];    
 $_SESSION['u_name'];


   if(isset($_POST['findid2']))
        {         

  $firstname = $_POST['findid2'];
 
  $sql2 = "SELECT `id`, `des_id`, `first_name`, `last_name`, `phone`, `alt_num`, `email`, `DOB`, `SSN`, `Driving_license`, `Driving_license_Expired`, `Driving_License_State`, `street`, `city`, `state`, `zip_code`, `current_provider`, `Lead_Source`, `Date` FROM `customer` WHERE  `id` LIKE '%$firstname%' OR `phone` LIKE '%$firstname%' OR `alt_num` LIKE '%$firstname%' ";
       

$id_u = mysqli_query($conn, $sql2);
if (mysqli_num_rows($id_u) != 0) {
  

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
              $c_cu_pro = $ids_u[16];
              $c_led_scr = $ids_u[17];
        $productSqlp = mysqli_query($conn,"SELECT * FROM providers");
$productSqlls = mysqli_query($conn,"SELECT * FROM lead_source");


      
 $qwerty='<div class="col-sm-6">
          <div class="form-group">
          <label for="clientName" >First Name</label>
          
           
            <input type="text" class="form-control contro "  name="clientName" value="'.$c_fname.'" />                  
         
        </div>

          <div class="form-group">
         <label for="clientContact">Primary Phone</label>
          
        <input type="text" class="form-control contro" id="clientContact" name="clientContact" value="'
 .$c_phone.'" disabled />
          
        </div>
        <div class="form-group">
          <label for="clientName" >Primary Email</label>
          
          
            <input type="disable" class="form-control contro"  name="email" value="'
              .$c_email. 
            '" disabled />
          
        
        </div>
      
      </div>
      <div class="col-sm-6">
          <div class="form-group">

         <label for="orderDate" >Last Name</label>
         
             
            <input type="text" class="form-control contro" id="orderDate" name="ordDate"  value="'              .$c_lname.'" disabled />
          
        </div>
        
       <div class="form-group">
                            <label>Mobile Phone</label><span style="color: red;">*</span>
                            <input type="text" name="mobile_phone" class="form-control contro" value="'
                            .$c_altnum.'"  />
                        </div>
          <div class="form-group">
          <label for="clientName">Date Of Birth</label>
          
          
            <input type="text" class="form-control contro"  name="dob" value="'
            .$c_dob.'"  />
          
        
        </div>
        
          
      </div>
      <div class="col-md-6">
                          
                        <div class="form-group">
                            <label>SSN</label><span style="color: red;">*</span>
                            <input type="text" name="ssn" value="'. $c_ssn.'" class="form-control contro" />
                        </div>
                          </div>
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Driving Licence</label><span style="color: red;"></span>
                            <input type="text" class="form-control contro" value="'.$DL.'" name="dl"   />
                        </div>
                  
    
                      </div>
      <div class="col-md-6">
                          <div class="form-group">
                            <label>Driving License Expired</label><span style="color: red;">*</span>
                            <input type="text" class="form-control contro" value="'.$DLE.'" name="dl_exp"  />
                        </div>
                        <div class="form-group">
                            <label>Street</label><span style="color: red;">*</span>
                            <input type="text" class="form-control contro" value="'.$c_strt.'" name="street"  />
                        </div>
                          
                        <div class="form-group">
                            <label>City</label><span style="color: red;">*</span>
                            <input type="text" class="form-control contro" value="'.$c_city.'" name="city" />
                        </div>
                   <div class="form-group">
                            <label>Current provider</label><span style="color: red;">*</span>
                            <input type="text" name="a" value="'. $c_cu_pro.'" class="form-control contro"  />
                        </div>
    
                      </div>
                      
                      
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Driving License State</label><span style="color: red;">*</span>
                            <input type="text" class="form-control contro" value="'.$DLS.'" name="dl_state"  />
                            </div>
                        <div class="form-group">
                            <label>Zip Code</label><span style="color: red;">*</span>
                            <input type="text" name="zip_code" value="'. $c_zip.'" class="form-control contro"/>
                        </div>
                          
                        <div class="form-group">
                            <label>State</label><span style="color: red;">*</span>
                            <input type="text" name="state" value="'. $c_state.'" class="form-control contro"  />
                        </div>
                         <div class="form-group">
                            <label>Lead Source</label><span style="color: red;">*</span>
                            <input type="text" name="h" value="'. $c_led_scr.'" class="form-control contro"  />
                            <input type="hidden" class="form-control contro"  name="cus_id" value="'. $c_id.'" />
                        </div>
                          
                      </div>
</div>
</div>
</div>
</div>

';
ECHO $qwerty;
}

else{
  
echo '<script type="text/javascript">
$("#modal-info").modal("show");
</script>';

 ?>
<script type="text/javascript"></script>
   <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">No Customer Found</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>There is no Customer exite by this number</p>
              <h5>Did you want <strong>ADD</strong>Customer? </h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">NO</button>
              <a href="new.php"><button type="button" class="btn btn-outline-danger">YES</button></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <?php       

}




 


        } 

        ?>
