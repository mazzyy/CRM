<?php 

include 'inc/db.php';
	
	$sch_query = "SELECT service_offered.lead_id, lead.cu_id, tbl_users.u_name, service_offered.status,service_offered.sale_date,service_offered.opp_date, customer.first_name ,customer.last_name,customer.phone,customer.alt_num , DATE_FORMAT(service_offered.date,'%m-%d-%y') DATEONLY FROM service_offered INNER JOIN lead ON service_offered.lead_id = lead.id INNER JOIN tbl_users ON lead.u_id = tbl_users.u_id INNER JOIN customer on lead.cu_id = customer.id where `status` = 'Pending-Activation' ORDER by lead_id DESC LIMIT 5";
	$sch_result1 = mysqli_query($conn,$sch_query);
	  if(!empty($sch_result1)){
		$output='';
		while($row = mysqli_fetch_array($sch_result1)) {


$lead_id = $row['0'];
$cus_id = $row['1'];
$u_name = $row['2'];
$satus = $row['3'];
$sale_date = $row['4'];
$opp_date = $row['5'];
$fname = $row['6'];
$lname = $row['7'];
$num = $row['8'];
$alt_num = $row['9'];
$dates = $row['10'];
// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

$output.='


<div class="dropdown-divider"></div>

          <a href="view_lead.php?leadid='.$lead_id.'" class="dropdown-item alert alert-warning alert-dismissible">
           
            <i class="fas fa-stopwatch mr-1"></i>'.$u_name.'/'.$satus.'
            <span class="float-right text-muted text-sm">'.$dates.'</span>
                      </a>
          
		';

	}
	}
	else {
	}
	mysqli_close($conn);


echo $output;





 ?>