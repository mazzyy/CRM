<?php  

 include("inc/db.php");
session_start(); 



 echo $_SESSION['u_id'];    
echo $_SESSION['u_name'];

$Current_pro = $_POST['Current_pro'];
        $lead_sour = $_POST['lead_sour'];
        $Assigned_To = $_POST['Assigned_To'];
      
        $Description = $_POST['Description'];
 



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

       $leat = $_POST["leads_id"];
      echo $sql ="INSERT INTO orders (`lead_Id`, `Assigned_To`, `Description`) 
  VALUES('$leat','$Assigned_To','$Description');";

if (mysqli_query($conn, $sql)) {

    $last_id_order = mysqli_insert_id($conn);

   $connect = new PDO("mysql:host=localhost;dbname=crm", "root", "");
        // $order_id = uniqid();
      for($count = 0; $count < count($_POST["service_unit"]); $count++)
      {  
        //  $query = "INSERT INTO tbl_order_items 
        //  (order_id, item_name, item_quantity, item_unit) 
        //  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
        //  ";


           
           echo $quer = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account` ,`confirmation_num`) 
           VALUES ('".$_POST["leads_id"][$count]."','".$last_id_order."','".$_POST["provider_unit"][$count]."','".$_POST["service_unit"][$count]."','".$_POST["status_unit"][$count]."','".$_POST["sale_date"][$count]."','".$_POST["app_date"][$count]."','".$_POST["app_time"][$count]."','".$_POST["account"][$count]."','".$_POST["confirmation_num"][$count]."' )
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
          
        $resul = $statemen->fetchAll();
        if(isset($resul))
        {
        echo 'ok';
        }

      }

   
   else{
    echo "not ok";
   }
      


?>