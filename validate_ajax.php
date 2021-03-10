<?php

include("inc/db.php");

if(!empty($_POST["fname"])){

    $username = $_POST["fname"];
      $query = "select First_Name from employess where First_Name LIKE '".$username."'";
    
    $result = mysqli_query($conn,$query);
 $response ="";
//$row = mysqli_fetch_array($result);
                                
                                  

    //$response .= "<span style='color:red;'>".$row['0']." <b>Already</b> exist</span>";



    $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
    
        
        
        if($count > 0){
             $response .= "<span style='color:red;'>".$row['0']." <b>Already</b> exist</span>";
        }
       
    
    
    echo $response;
    
}
