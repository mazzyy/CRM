<?php  
include("inc/db.php");
session_start();


  $c_id =0;

				$Current_pro = $_POST['Current_pro'];
				$lead_sour = $_POST['lead_sour'];
				$Assigned_To = $_POST['Assigned_To'];
				$Confirmation_num = $_POST['Confirmation_num'];
				$Description = $_POST['Description'];
				$dob = $_POST['sale_date'];
        $newDate = date("m-d-Y", strtotime($dob));
				//$account = $_POST['account'];
				$offerd_pro = $_POST['offerd_pro'];
				$service = $_POST['service'];
				$servies_status = $_POST['servies_status'];
				$appoint = $_POST['appoint'];
         // $neDate = date("m-d-Y", strtotime($appoint));
				$appoint = $_POST['opptime'];
				$date = date('m-d-Y');
 echo $c_id;
        echo  $a = $_POST['cus_id'];
				// ".$GLOBALS['c_id']."			


$sql = "BEGIN;
INSERT INTO lead ( `cu_id`, `u_id`, `Lead_Status`, `count`)
  VALUES('$a', '".$_SESSION['u_id']."','Active','1');
INSERT INTO orders (`lead_Id`, `Current_Provider`, `Lead_Source`, `Assigned_To`, `Confirmation_num`, `Description`, `Date`) 
  VALUES(LAST_INSERT_ID(),'$Current_pro','$lead_sour','$Assigned_To','$Confirmation_num','$Description');
COMMIT;";
										
if (mysqli_query($conn, $sql)) {

	echo $last_id = mysqli_insert_id($conn);
foreach ($offerd_pro as $value){
 echo $value;








}

foreach ($service as $value){
 echo $value;








}foreach ($appoint as $value){
 echo $value;







}foreach ($appoint as $value){
 echo $value;








}


// foreach


// while($row = mysqli_fetch_assoc($sql)){
                
// 				 $cu_id = $row[0];



// 			}

echo '<script type="text/javascript">
$(window).load(function() {
    $("#modal-warning").modal("show");
});
		</script>';

	
}
else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }

 //  $checkbox = $_POST['provider'];
 //   for($i=0;$i<count($checkbox);$i++){
 //   $del_id = $checkbox[$i]; 
   
 //   if ($i == 0) {
 //     $providers = "'".$del_id ."'";
 //   }
 //   else{ $provider .= ",'".$del_id ."'";}
   
   
 // }
         ?>