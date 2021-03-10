
        
          
<?php
$productSqlp = mysqli_query($conn,"SELECT * FROM providers");

 $productSqls = mysqli_query($conn,"SELECT * FROM service");
 $productSqll = mysqli_query($conn,"SELECT * FROM lead_status");

 ?>

           
                <div class="row">
                  
                <div class="col-sm-2">
             <div style="margin-left:20px;">
                  <div class="form-group">

                  <select class="form-control" name="offerd_pro[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlp)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>
                </div>
                </div>
                 <div class="col-sm-2">
                <div style="padding-left:20px;">                 
                    <div class="form-group">

                  <select class="form-control" name="service[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                     while($row = mysqli_fetch_assoc($productSqls)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>                  
                                   
                </div>
              </div>
                <div class="col-sm-2">
                  <div style="padding-left:20px;">                 
                    <div class="form-group">

                  <select class="form-control" name="servies_status[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                while($row = mysqli_fetch_assoc($productSqll)) {                     
                        echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>                  
                                   
                </div>
              </div>
<div class="col-sm-2">
                  <div style="padding-left:20px;">                 
                    <div class="form-group">
                      <input type="date" class="form-control" name="appoint[]" id="" />
                 
                  </div>                  
                                   
                </div>
              </div>
              <div class="col-sm-2">
                  
                  <div class="form-group">
                   
                    
                      <input type="time" class="form-control" name="opptime[]" />
                      
                      
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                               
                                   
                </div>
              </div>







                
            
            
