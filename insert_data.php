<?php  

 include("inc/db.php");
session_start(); 
 echo $_SESSION['u_id'];    
echo $_SESSION['u_name'];


   //echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
$c_id = $_POST['cus_id'];

$c_fname = $_POST['c_fname'];
    $c_lname = $_POST['c_lname'];
$c_phone = $_POST['c_phone'];

    $email = $_POST['email'];
    $dob = $_POST['dob'];
$mobile_phone = $_POST['mobile_phone'];
$street = $_POST['street'];
        $zip_code = $_POST['zip_code'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $ssn = $_POST['ssn'];
        $dl = $_POST['dl'];
        $dl_exp = $_POST['dl_exp'];
        $dl_state = $_POST['dl_state'];
$lead_sour = $_POST['lead_sour'];
$Current_pro = $_POST['Current_pro'];

  echo$sql = "INSERT INTO `customer`(`first_name`, `last_name`, `phone`, `alt_num`, `email`, `DOB`, `SSN`, `Driving_license`, `Driving_license_Expired`, `Driving_License_State`, `account`, `street`, `city`, `state`, `zip_code`, `current_provider`, `Lead_Source`) VALUES('$c_fname','$c_lname','$c_phone','$mobile_phone','$email','$dob','$mobile_phone','$street','$zip_code','$city','$state','$ssn','$dl','$dl_exp','$dl_state','$lead_sour','$Current_pro')";
                    
if (mysqli_query($conn, $sql)) {

$last_cid = mysqli_insert_id($conn);
// echo '<script type="text/javascript">
//  toastr.success("Customer update  Successfully ...")
//     </script>';

  




echo"-----==============================================================================================================================================================lllllllleeeeeeeeeeeaaaaaaaaaaaaaaaaadddddddddddddddddddddddddddddddd=========================================================================================================================================================================================================================================================";
	
				$Assigned_To = $_POST['Assigned_To'];
			
				$Description = $_POST['Description'];
				// $dob = $_POST['sale_date'];
    //     $newDate = date("m-d-Y", strtotime($dob));
				//$account = $_POST['account'];
				// $offerd_pro = $_POST['offerd_pro'];
				// $service = $_POST['service'];
				// $servies_status = $_POST['servies_status'];
				// $appoint = $_POST['appoint'];
         // $neDate = date("m-d-Y", strtotime($appoint));
				// $appoint = $_POST['opptime'];



				  // $a = $_POST['cus_id'];
				// ".$GLOBALS['c_id']."			


 echo $sql = "INSERT INTO lead ( `cu_id`, `u_id`, `Lead_Status`,`Remarks`,`count`) VALUES($last_cid,".$_SESSION['u_id'].",'Active','',1) ;";
										
if (mysqli_query($conn, $sql)) {

	  $last_id = mysqli_insert_id($conn);

echo  $sql1 ="INSERT INTO orders (`lead_Id`,`Assigned_To`,`Description`) 
  VALUES('$last_id','$Assigned_To','$Description');";

if (mysqli_query($conn, $sql1)) {

	 $last_id_order = mysqli_insert_id($conn);


echo"-----=======================================================================================================================================================================================================================================================================================================================================================================================================================";

 // print_r($multiplefile = $_FILES['multipleFile']['name']);


if (!empty($_FILES['multipleFile']['name'])) {

   $multiplefile = $_FILES['multipleFile']['name'];

    foreach ($multiplefile as $name => $value) {
      
      $allowImg = array("jpeg","JPEG","jpg","JPG","png","PNG","gif","GIF","txt","pdf","*","mp3","wma","wav","avi", "mpeg"); 

      $fileExnt = explode('.', $multiplefile[$name]);

      if (in_array($fileExnt[1], $allowImg)) {

        if ($_FILES['multipleFile']['size'][$name] > 0 && $_FILES['multipleFile']['error'][$name]== 0) {
          
          $fileTmp = $_FILES['multipleFile']['tmp_name'][$name];
          
          $newFile =  rand(). '.'. $fileExnt[1];

          $target_dir = 'upload/'.$newFile; 

          if (move_uploaded_file($fileTmp, $target_dir)) {
          echo  $query  = "INSERT INTO `lead_files`(`lead_id`, `files`, `files_types`) VALUES ('$last_id','$newFile', '$type' )";
            mysqli_query($conn, $query);
          }
        }
      }
    }
  } 
 









echo"-----=======================================================================================================================================================================================================================================================================================================================================================================================================================";




// {
 $connect = new PDO("mysql:host=localhost;dbname=crm", "root", "");
// $order_id = uniqid();provider_unit
 $count = 0; 
  
 // echo $count = count($_POST["provider_unit"]);
echo "string";
   //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 //  $service_unit = $_POST["service_unit{$qi}"];
 // print_r($_POST["provider_unit"]);
// echo "<br> service_unit";
// echo $qi;

  while ($count <= 1)
 {  

//if ($_POST["service_unit1"]) {
  for ($qi = 1; $qi <= 3; $qi++)
 {
     $service_unit = $_POST["service_unit{$qi}"];
  print_r($_POST["provider_unit"]);
  //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  // echo $count;
//  $query = "INSERT INTO tbl_order_items 
//  (order_id, item_name, item_quantity, item_unit) 
//  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
//  ";`
  
  
    // echo "<br> befor while  provider_unit";
    //  echo $count;

while (list ($key, $val) = each ($service_unit)) {
 

// echo $qi;

 // echo $count;

echo $query = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account`, `confirmation_num`) 
 VALUES ('".$last_id."','".$last_id_order."','".$_POST["provider_unit"][$count]."','".$val."','".$_POST["status_unit"][$count]."','".$_POST["sale_date"][$count]."','".$_POST["app_date"][$count]."','".$_POST["app_time"][$count]."','".$_POST["account"][$count]."','".$_POST["Confirmation_num"][$count]."')
 ";




//   $catse1 = explode(",",$_POST["service_unit"][$count]);
// foreach($catse1 as $catq1) {
//     $catq1 = trim($catq1);

       
     
     
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
//    ':order_id'   => $order_id,
    ':provider_unit'  => $_POST["provider_unit"][$count],
    ':service_unit'  => $_POST["service_unit{$qi}"][$count],
    ':status_unit'  => $_POST["status_unit"][$count],
    ':sale_date'  => $_POST["sale_date"][$count],
    ':app_date'  => $_POST["app_date"][$count], 
    ':app_time' => $_POST["app_time"][$count], 
    ':account'  => $_POST["account"][$count],
    ':confirmation_num'  => $_POST["Confirmation_num"][$count]
   )
  );

  

}


$count++;

}



}
 
    
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
  
}
}
}


// elseif ($_POST["service_unit2"]) {
//  for ($qi = 1; $qi <= 1 ; $qi++)
//  {
//      $service_unit = $_POST["service_unit{$qi}"];
//   print_r($_POST["provider_unit"]);
//   //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// //  $query = "INSERT INTO tbl_order_items 
// //  (order_id, item_name, item_quantity, item_unit) 
// //  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
// //  ";`
  
  
//     // echo "<br> befor while  provider_unit";
//     //  echo $count;

// while (list ($key, $val) = each ($service_unit)) {
  

// // echo $qi;

//  // echo $count;

// echo $query = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account`, `confirmation_num`) 
//  VALUES ('".$last_id."','".$last_id_order."','".$_POST["provider_unit"][$count]."','".$key ."&s".$val."','".$_POST["status_unit"][$count]."','".$_POST["sale_date"][$count]."','".$_POST["app_date"][$count]."','".$_POST["app_time"][$count]."','".$_POST["account"][$count]."','".$_POST["Confirmation_num"][$count]."')
//  ";




// //   $catse1 = explode(",",$_POST["service_unit"][$count]);
// // foreach($catse1 as $catq1) {
// //     $catq1 = trim($catq1);

       
     
     
//   $statement = $connect->prepare($query);
//   $statement->execute(
//    array(
// //    ':order_id'   => $order_id,
//     ':provider_unit'  => $_POST["provider_unit"][$count],
//     ':service_unit'  => $_POST["service_unit{$qi}"][$count],
//     ':status_unit'  => $_POST["status_unit"][$count],
//     ':sale_date'  => $_POST["sale_date"][$count],
//     ':app_date'  => $_POST["app_date"][$count], 
//     ':app_time' => $_POST["app_time"][$count], 
//     ':account'  => $_POST["account"][$count],
//     ':confirmation_num'  => $_POST["Confirmation_num"][$count]
//    )
//   );

  

// }


// $count++;
// }
// }


// elseif ($_POST["service_unit3"]) {
//  for ($qi = 1; $qi <= 3 ; $qi++)
//  {
//    $service_unit = $_POST["service_unit{$qi}"];
//   print_r($_POST["provider_unit"]);
//   //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   echo "<br> provider_unit".$_POST["provider_unit"][$count];
//   // echo $count;
// //  $query = "INSERT INTO tbl_order_items 
// //  (order_id, item_name, item_quantity, item_unit) 
// //  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
// //  ";`
  
  
//     // echo "<br> befor while  provider_unit";
//     //  echo $count;

// while (list ($key, $val) = each ($service_unit)) {
//   echo "<br> after while service_unit";

// // echo $qi;

//  // echo $count;

// echo $query = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account`, `confirmation_num`) 
//  VALUES ('".$last_id."','".$last_id_order."','".$_POST["provider_unit"][$count]."','".$key ."&s".$val."','".$_POST["status_unit"][$count]."','".$_POST["sale_date"][$count]."','".$_POST["app_date"][$count]."','".$_POST["app_time"][$count]."','".$_POST["account"][$count]."','".$_POST["Confirmation_num"][$count]."')
//  ";




// //   $catse1 = explode(",",$_POST["service_unit"][$count]);
// // foreach($catse1 as $catq1) {
// //     $catq1 = trim($catq1);

       
     
     
//   $statement = $connect->prepare($query);
//   $statement->execute(
//    array(
// //    ':order_id'   => $order_id,
//     ':provider_unit'  => $_POST["provider_unit"][$count],
//     ':service_unit'  => $_POST["service_unit{$qi}"][$count],
//     ':status_unit'  => $_POST["status_unit"][$count],
//     ':sale_date'  => $_POST["sale_date"][$count],
//     ':app_date'  => $_POST["app_date"][$count], 
//     ':app_time' => $_POST["app_time"][$count], 
//     ':account'  => $_POST["account"][$count],
//     ':confirmation_num'  => $_POST["Confirmation_num"][$count]
//    )
//   );

  

// }


// $count++;
// }

// }








?>