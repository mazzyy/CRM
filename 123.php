<?php

    $servername = "localhost";
    $username = "root";
    $password = "QJb4yhZzNG4CwGKJ";
    $dbname = "crm";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        
        die("Database connection couldn't be eatablish: " . mysqli_connect_error());
    }


    $servernames = "localhost";
    $usernames = "root";
    $passwords = "QJb4yhZzNG4CwGKJ";
    $dbnames = "oss_db";
    
    // Create connection
    $conns = mysqli_connect($servernames, $usernames, $passwords, $dbnames);

    // Check connection
    if (!$conns) {
        
        die("Database connection couldn't be eatablish: " . mysqli_connect_error());
    }

// echo $query = "SELECT tbl_lead.lead_id, tbl_lead.u_id, tbl_lead.fname, tbl_lead.lname, tbl_lead.primary_phone, mobile_phone, email, dob, current_provider, provider_offered, lead_source, services_offered, sale_date, lead_status, assigned_to, confimation_no, account_no, appointment , appointment_time, street, postal_code, city, state, description, tbl_lead.created_date, ssn, dl, dl_exp, dl_state FROM tbl_user INNER JOIN tbl_lead ON tbl_user.u_id = tbl_lead.u_id order by lead_id DESC";
    
//      $run = mysqli_query($conns, $query);
   
//                             while($row = mysqli_fetch_array($run)){
//         $t_lead_id = $row['lead_id'];
//         $user = $row['u_id'];
//         $fname = $row['fname'];
//         $lname = $row['lname'];
//         $phone = $row['primary_phone'];
//         $mobile = $row['mobile_phone'];
//         $email = $row['email'];
//         $dob = $row['dob'];
//         $current_provider = $row['current_provider'];
//         $provider_offered = $row['provider_offered'];
//         $lead_source = $row['lead_source'];
//         $services_offered = $row['services_offered'];
//         $sale_date = $row['sale_date'];
//         $lead_status = $row['lead_status'];
//         $assigned_to = $row['assigned_to'];
//         $confirmation = $row['confimation_no'];
//             $account = $row['account_no'];
//         $appointment = $row['appointment'];
//         $appointment_time = $row['appointment_time'];
//         $street = $row['street'];
//         $postal_code = $row['postal_code'];
//         $city = $row['city'];
//         $state = $row['state'];
//         $desc = $row['description'];
//         $created_date = $row['created_date'];
//         $ssn = $row['ssn'];
//         $dl = $row['dl'];
//         $dl_exp = $row['dl_exp'];
//         $dl_state = $row['dl_state'];

// echo $queryq = "SELECT orders.id AS orders_id, orders.lead_Id AS lead_id, phone ,count(*) as total,alt_num FROM `customer` INNER JOIN lead ON customer.id = lead.cu_id INNER JOIN orders on lead.id =orders.lead_Id where customer.phone = '$phone' or customer.alt_num ='$mobile' GROUP by orders.id ASC";
    
//      $runq = mysqli_query($conn, $queryq);
//       if(mysqli_num_rows($runq) > 0){

       
// $row = mysqli_fetch_array($runq);

// echo $order_id = $row['orders_id'];
//         $lead_id = $row['lead_id'];
//      // echo "if";
// echo  $awdrg = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account`, `confirmation_num`) 
//  VALUES ('$lead_id','$order_id','$provider_offered','$services_offered','$lead_status','$sale_date','$appointment','$appointment_time','$account','$confirmation')";
//  if( mysqli_query($conn, $awdrg)){}


// }// end if 
// else{
//          // echo "else";

// echo $queq = "INSERT INTO `customer`(`first_name`, `last_name`, `phone`, `alt_num`, `email`, `DOB`, `SSN`, `Driving_license`, `Driving_license_Expired`, `Driving_License_State`,`street`, `city`, `state`, `zip_code`, `current_provider`, `Lead_Source`) VALUES('$fname','$lname','$phone','$mobile ','$email','$dob','$ssn','$dl','$dl_exp','$dl_state','$street','$city','$state','$postal_code','$provider_offered','$lead_source')";
// if( mysqli_query($conn, $queq)){
      
// $last_cid = mysqli_insert_id($conn);


//    echo $sql = "INSERT INTO lead (`cu_id`, `u_id`, `Lead_Status`,`Remarks`,`count`) VALUES('$last_cid','$user','Active','',1)";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);

// echo  $sql1 ="INSERT INTO orders (`lead_Id`,`Assigned_To`,`Description`) 
//   VALUES('$last_idq','$assigned_to','$desc')";

// if (mysqli_query($conn, $sql1)) {

//      $last_id_order = mysqli_insert_id($conn);

// echo $awdrg = "INSERT INTO `service_offered`(`lead_id`, `order_id`, `provi_name`, `serv_name`, `status`, `sale_date`, `opp_date`, `opp_time`, `account`, `confirmation_num`) 
//  VALUES ('$last_idq','$last_id_order','$provider_offered','$services_offered','$lead_status','$sale_date','$appointment','$appointment_time','$account','$confirmation')";

//  if (mysqli_query($conn, $awdrg)) {}

// }// end if order
// else {


//                          echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
//                       }
// }// end if lead

// else {


//                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//                       }
// }// end if customer

// else {


//                          echo "Error: " . $queq . "<br>" . mysqli_error($conn);
//                       }
// }//else

// // }//while

// echo $query = "SELECT * FROM `tbl_user` ORDER BY `u_id` ASC";
    
//  $run = mysqli_query($conns, $query);
   
//   while($row = mysqli_fetch_array($run)){


// // $agent_id = $row['0'];
// //         $user_id = $row['1'];
// //         $first_name = $row['2'];
// //         $last_name = $row['3'];
// //         $email = $row['4'];
// //         $mobile = $row['5'];
// //         $office_phone = $row['6'];
// //         $address = $row['7'];
// //  		$image = $row['8'];
//         $u_name = $row['1'];
//         $u_password = md5($row['2']);
//         $u_role = $row['3'];
//         $u_status = $row['4'];
//         $u_date = $row['6'];
       

// if ($u_role == 'agent') {
	
// echo $sql = "INSERT INTO `employess`(`First_Name`, `Dep_id`, `des_id`) 
// VALUES ('$u_name','3','3')";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);
//       echo $sql = "INSERT INTO `tbl_users`(`emp_id`, `u_name`, `u_pass`, `role_id`, `u_status`, `date_time`, `login_status`) VALUES ('$last_idq','$u_name','$u_password','3','active','$u_date','1' )";
// if (mysqli_query($conn, $sql)) {}
// }
// }
// if ($u_role == 'admin') {
// 	echo $sql = "INSERT INTO `employess`(`First_Name`, `Dep_id`, `des_id`) 
// VALUES ('$u_name','1','2')";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);
//       echo $sql = "INSERT INTO `tbl_users`(`emp_id`, `u_name`, `u_pass`, `role_id`, `u_status`, `date_time`, `login_status`) VALUES ('$last_idq','$u_name','$u_password','3','active','$u_date','1' )";
// if (mysqli_query($conn, $sql)) {}
// }
// }
// if ($u_role == 'back-office') {
// 	echo $sql = "INSERT INTO `employess`(`First_Name`, `Dep_id`, `des_id`) 
// VALUES ('$u_name','4','3')";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);
//       echo $sql = "INSERT INTO `tbl_users`(`emp_id`, `u_name`, `u_pass`, `role_id`, `u_status`, `date_time`, `login_status`) VALUES ('$last_idq','$u_name','$u_password','3','active','$u_date','1' )";
// if (mysqli_query($conn, $sql)) {}
// }
// }
// if ($u_role == 'hr-attendace') {
// 	echo $sql = "INSERT INTO `employess`(`First_Name`, `Dep_id`, `des_id`) 
// VALUES ('$u_name','2','3')";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);
//       echo $sql = "INSERT INTO `tbl_users`(`emp_id`, `u_name`, `u_pass`, `role_id`, `u_status`, `date_time`, `login_status`) VALUES ('$last_idq','$u_name','$u_password','3','active','$u_date','1' )";
// if (mysqli_query($conn, $sql)) {}
// }
// }

// if ($u_role == 'it') {
// 	echo $sql = "INSERT INTO `employess`(`First_Name`, `Dep_id`, `des_id`) 
// VALUES ('$u_name','5','3')";
                                        
// if (mysqli_query($conn, $sql)) {

//       $last_idq = mysqli_insert_id($conn);
//       echo $sql = "INSERT INTO `tbl_users`(`emp_id`, `u_name`, `u_pass`, `role_id`, `u_status`, `date_time`, `login_status`) VALUES ('$last_idq','$u_name','$u_password','3','active','$u_date','1' )";
// if (mysqli_query($conn, $sql)) {}
// }
// }


  // }
$i=1;


echo $query = "SELECT * FROM `tbl_user` ORDER BY `u_id` ASC";
    
 $run = mysqli_query($conns, $query);
   
 while($row = mysqli_fetch_array($run)){

$id = $row['0'];

echo $sql = "UPDATE `lead` SET `u_id`= '$i' WHERE `u_id`= '$id'";
 if (mysqli_query($conn, $sql)) {}

$i++;
 }

?>