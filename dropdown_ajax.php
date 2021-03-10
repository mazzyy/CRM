<?php include("inc/db.php");
$productSqlp = mysqli_query($conn,"SELECT * FROM providers");

 $productSqls = mysqli_query($conn,"SELECT * FROM service");
 $productSqll = mysqli_query($conn,"SELECT * FROM lead_status");

 ?>

           
              

           
                <div class="row">
                  
                <div class="col-sm-6">
             <div style="margin-left:20px;">
                  <div class="form-group">

                  <select class="form-control" name="productName[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                       while($row = mysqli_fetch_assoc($productSqlp)) {                     
                        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>
                </div>
                </div>
                 <div class="col-sm-3">
                <div style="padding-left:20px;">                 
                    <div class="form-group">

                  <select class="form-control" name="productName[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                     while($row = mysqli_fetch_assoc($productSqls)) {                     
                        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>                  
                                   
                </div>
              </div>
                <div class="col-sm-3">
                  <div style="padding-left:20px;">                 
                    <div class="form-group">

                  <select class="form-control" name="productName[]"  >
                    <option value="">~~SELECT~~</option>
                    <?php
                while($row = mysqli_fetch_assoc($productSqll)) {                     
                        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                      } // /while 

                    ?>
                  </select>
                  </div>                  
                                   
                </div>
              </div>
<div class="col-sm-3">
                  <div style="padding-left:20px;">                 
                    <div class="form-group">
                      <input type="date" class="form-control" name="appoint" id="" />
                 
                  </div>                  
                                   
                </div>
              </div>
              <div class="col-sm-3">
                  <div class="bootstrap-timepicker">
                  <div class="form-group">
                   
                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>                  
                                   
                </div>
              </div>







                
            
            
