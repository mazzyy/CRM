 <?php  

 include("inc/db.php");
session_start();

// ".$_POST["Gross_Sal"].'
// ". $_POST["P_R_I"].'
// ".$_POST["P_R_A_I"].
// ".$_POST["P_R_D_I"]."
// ".$_POST["P_R_D_P_R_I"]."
// ".$_POST["EMP_ID"]."
// ".$_POST["FName"]."
// ".$_POST["Absent"]."
// ".$_POST["Late"]."
// ".$_POST["Haf_Day"]."
// ".$_POST["Train"]."
// ".$_POST["P_R_A_P_L"]."
// ".$_POST["Total_AB"]."
// ".$_POST["T_d_w"]."
// ".$_POST["Depend"]."
// ".$_POST["BOonus"]."
// ".$_POST["Arre"]."
// ".$_POST["Penty"]."
// ".$_POST["deduct"]."
// ".$_POST["Net_Sal"]."
// ".$_POST["commi"]."
// ".$_POST["Cash_Advan"]."
// ".$_POST["Net_payable"]."
// ".$_POST["Gross_Sal"]."


 if(isset($_POST["Gross_Sal"]) && isset($_POST["Net_payable"]))
 {
  // $post_title = mysqli_real_escape_string($connect, $_POST["postTitle"]);
  // $post_description = mysqli_real_escape_string($connect, $_POST["postDescription"]);
    
    //update post  
     $sql = 'UPDATE `pay_roll_attend` SET `absent`="'.$_POST["Absent"].'",late="'.$_POST["Late"].'",`haf_day`="'.$_POST["Haf_Day"].'",`train`="'.$_POST["Train"].'",`paid_leave`="'.$_POST["P_R_A_P_L"].'",`total_ab`="'.$_POST["Total_AB"].'",`to_dy_wrk`="'.$_POST["T_d_w"].'" WHERE id ="'.$_POST["P_R_A_I"].'"  '; 

    if(mysqli_query($conn, $sql)){
    	echo "ok";
    } 
    else{
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
  
  
    //update post  
     $sql2 = "UPDATE `pay_roll_detail` SET `depend`='".$_POST["Depend"]."',`bonus`='".$_POST["BOonus"]."',`Arrears`='".$_POST["Arre"]."',`Penalties`='".$_POST["Penty"]."',`deductions`='".$_POST["deduct"]."',`net_Salary`='".$_POST["Net_Sal"]."',`commission`='".$_POST["commi"]."',`cash_Advance`='".$_POST["Cash_Advan"]."',`nt-payable`='".$_POST["Net_payable"]."',`gross_Salary`='".$_POST["Gross_Sal"]."' WHERE id = ".$_POST["P_R_D_I"]." ";  
    if(mysqli_query($conn, $sql2)){
    	echo "ok";
    }
    else{
    	echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }  

}
   ?>