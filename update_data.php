<?php  

 include("inc/db.php");
session_start(); 
$leat = $_POST["leads_id"];


 echo $_SESSION['u_id'];    
echo $_SESSION['u_name'];

$Current_pro = $_POST['Current_pro'];
        $lead_sour = $_POST['lead_sour'];
        $Assigned_To = $_POST['Assigned_To'];
      
        $Description = $_POST['Description'];
 
if (!empty($_FILES['files']['name'])) {

   $files = $_FILES['files']['name'];

    foreach ($files as $name => $value) {
      
      $allowImg = array("jpeg","JPEG","jpg","JPG","png","PNG","gif","GIF","txt","pdf","*","mp3","wma","wav","avi", "mpeg"); 

      $fileExnt = explode('.', $files[$name]);

      if (in_array($fileExnt[1], $allowImg)) {

        if ($_FILES['files']['size'][$name] > 0 && $_FILES['files']['error'][$name]== 0) {
          
          $fileTmp = $_FILES['files']['tmp_name'][$name];
          
          $newFile =  rand(). '.'. $fileExnt[1];

          $target_dir = 'upload/'.$newFile; 

          if (move_uploaded_file($fileTmp, $target_dir)) {
            $query  = "INSERT INTO `lead_files`(`lead_id`, `files`, `files_types`) VALUES ('$leat','$newFile', '$type' )";
            mysqli_query($conn, $query);
          }
        }
      }
    }
  } 
 
 

// echo $c_id = $_POST['cus_id'];

// $c_fname = $_POST['c_fname'];
//     $c_lname = $_POST['c_lname'];
// $c_phone = $_POST['c_phone'];

//     $email = $_POST['email'];
//     $dob = $_POST['dob'];
// $mobile_phone = $_POST['mobile_phone'];
// $street = $_POST['street'];
//         $zip_code = $_POST['zip_code'];
//         $city = $_POST['city'];
//         $state = $_POST['state'];
//         $ssn = $_POST['ssn'];
//         $dl = $_POST['dl'];
//         $dl_exp = $_POST['dl_exp'];
//         $dl_state = $_POST['dl_state'];
// $lead_sour = $_POST['lead_sour'];
// $Current_pro = $_POST['Current_pro'];

// echo $sql = "UPDATE `customer` SET `first_name`='$c_fname',`last_name`=' $c_lname',`phone`='$c_phone',`alt_num`='$mobile_phone',`email`='$email',`DOB`='$dob',`SSN`='$ssn',`Driving_license`='$dl',`Driving_license_Expired`='$dl_exp',`Driving_License_State`='$dl_state',`street`='$street',`city`='$city',`state`='$state',`zip_code`='$zip_code',`current_provider`='$Current_pro',`Lead_Source`='$lead_sour' where id ='$c_id'";
// if (mysqli_query($conn, $sql)) {}




if(isset($_POST["up_confirmation_num"])){}


	// $odr_id = $_POST['orders_id'];
	// 			$led_id = $_POST['leads_id'];
	// 			$serv_id = $_POST['serv_id'];
	// 			$Confirmation_num = $_POST['Confirmation_num'];
	// 			$Description = $_POST['Description'];
				// $dob = $_POST['sale_date'];
    //     $newDate = date("m-d-Y", strtotime($dob));
				//$account = $_POST['account'];
				// $offerd_pro = $_POST['offerd_pro'];
				// $service = $_POST['service'];
				// $servies_status = $_POST['servies_status'];
				// $appoint = $_POST['appoint'];
         // $neDate = date("m-d-Y", strtotime($appoint));
				// $appoint = $_POST['opptime'];
				// echo  $a = $_POST['cus_id'];
				// ".$GLOBALS['c_id']."			

//  for($count = 0; $count < count($_POST["up_app_date"]); $count++)
//         {  
// $query = "UPDATE `service_offered` SET `provi_name`= '$_POST["up_provider_unit"][$count]',`serv_name`= ' $_POST["up_service_unit"][$count]' , `status`=' $_POST["up_status_unit"][$count] ', `sale_date`=' $_POST["up_sale_date"][$count]', `opp_date`=' $_POST["up_app_date"][$count] ', `opp_time`='$_POST["up_app_time"][$count]', `account`=' $_POST["up_account"][$count] ',`confirmation_num`=' $_POST["up_confirmation_num"][$count]' where id = '$_POST["serv_id"][$count]'   ";
           
//         $statement = $connect->prepare($query);
//         $statement->execute(
//          array(
//         //    ':order_id'   => $order_id,
//           ':up_provider_unit'  => $_POST["up_provider_unit"][$count],
//           ':up_service_unit'  => $_POST["up_service_unit"][$count],
//           ':up_status_unit'  => $_POST["up_status_unit"][$count],
//           ':up_sale_date'  => $_POST["up_sale_date"][$count],
//           ':up_app_date'  => $_POST["up_app_date"][$count], 
//           ':up_app_time' => $_POST["up_app_time"][$count], 
//           ':up_account'  => $_POST["up_account"][$count]
//          )
//         );
										

// }
	

        

         


    
        // {
$last_id_order = $_POST["orders_id"];
       //$leat = $_POST["leads_id"];
  //     echo $sql ="INSERT INTO orders (`lead_Id`, `Assigned_To`, `Description`) 
  // VALUES('$leat','$Assigned_To','$Description');";

// if (mysqli_query($conn, $sql)) {

//     $last_id_order = mysqli_insert_id($conn);

   $connect = new PDO("mysql:host=localhost;dbname=crm", "root", "QJb4yhZzNG4CwGKJ");
        // $order_id = uniqid();
   print_r($_POST["status_unit"]);
$people = $_POST["status_unit"];
   if (in_array("None", $people))
  {
  }
  else{
  
  
      for($count = 0; $count < count($_POST["provider_unit"]); $count++)
      {  
        //  $query = "INSERT INTO tbl_order_items 
        //  (order_id, item_name, item_quantity, item_unit) 
        //  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
        //  ";


           
          echo  $quer = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account` ,`confirmation_num`) 
           VALUES ('$leat','$last_id_order','".$_POST["provider_unit"][$count]."','".$_POST["service_unit"][$count]."','".$_POST["status_unit"][$count]."','".$_POST["sale_date"][$count]."','".$_POST["app_date"][$count]."','".$_POST["app_time"][$count]."','".$_POST["account"][$count]."','".$_POST["Confirmation_num"][$count]."' )
           ";
           
        $statemen = $connect->prepare($quer);
        $statemen->execute(
         array(
        //    ':order_id'   => $order_id,
          ':provider_unit'  => $_POST["provider_unit"][$count],
          ':service_unit'  => $_POST["service_unit"][$count],
          ':status_unit'  => $_POST["status_unit"][$count],
          ':sale_date'  => $_POST["sale_date"][$count],
          ':app_date'  => $_POST["app_date"][$count], 
          ':app_time' => $_POST["app_time"][$count], 
          ':account'  => $_POST["account"][$count]
         )
        );
      }
          }
        $resul = $statemen->fetchAll();
        if(isset($resul))
        {
        echo 'ok';
        }

      

   
   else{
    echo "not ok";
   }
      


?>