<?php  

 include("inc/db.php");
session_start(); 



 echo $_SESSION['u_id'];    
echo $_SESSION['u_name'];

 $connect = new PDO("mysql:host=localhost;dbname=crm", "root", "");

 
 $query ="SELECT service_offered.lead_id,customer.first_name,customer.phone,service_offered.provi_name,service_offered.status,service_offered.sale_date,service_offered.opp_time FROM service_offered INNER JOIN lead ON service_offered.lead_id = lead.id INNER JOIN tbl_users ON lead.u_id = tbl_users.u_id INNER JOIN customer on lead.cu_id = customer.id WHERE service_offered.opp_date ='".date('Y-m-d')."'";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$output = '
    <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Cust Name</th>
                      <th>Action</th>
                      <th>Status</th>
                      <th>Phone Call</th>
                      <th>Provider</th>
                      <th>Sale Date</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
';

foreach($result as $row)
{
  $lead_id = $row['0'];
$cus_name = $row['1'];
$phone = $row['2'];
$provider = $row['3'];
$satus = $row['4'];
$sale_date = $row['5'];
$opp_time = $row['6'];
  
  $output .= '
    <tr>
      <td>'.ucfirst($cus_name).'</td>';

      if ($satus =='Installed') {
                          
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app bg-success">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success"> '.$satus.'</span></td>';

                     }   
                   elseif ($satus =='Awaiting-install') {
                          
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app bg-info">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-info"> '.$satus.'</span></td>';

                    }  

                    elseif ($satus =='Pending') {
                         
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app bg-warning">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-warning"> '.$satus.'</span></td>';

                     }   
                  elseif ($satus =='Prepayment') {
                          
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app " style="color: ;background-color:#e83e8c;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#e83e8c;
 "> '.$satus.'</span></td>';

                     }   
                    elseif ($satus =='Cancelled') {
                         
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app bg-danger">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-danger"> '.$satus.'</span></td>';

                     }   
                   elseif ($satus =='Call-Back') {
                          
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app bg-secondary">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-secondary" > '.$satus.'</span></td>';

                    }   
                    elseif ($satus =='Charge-Back') {
                         
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app " style="color: ;background-color:#605ca8;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#605ca8;
 "> '.$satus.'</span></td>';

                    }  
                   elseif ($satus =='Outstanding-Balance') {
                          
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app " style="color:black;background-color:#01ff70;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color:black;background-color:#01ff70;
 "> '.$satus.'</span></td>';

                    }   
                    elseif ($satus =='Deposit') {
                         
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app " style="color: ;background-color:#007bff;
 ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#007bff;
 "> '.$satus.'</span></td>';

                     }   
                    elseif ($satus =='Sale Declined') {
                         
$output .='<td><a href="view_lead.php?leadid='.$lead_id.'" class="btn btn-app "style="color: ;background-color:#ff851b; ">
                  <span class="badge bg-succes.$lead_id.s"></span>
                  <i class="fas fa-barcode"></i> View Details
                </a></td>
                      <td><span class="badge badge-success" style="color: ;background-color:#ff851b; ">'.$satus.'</span></td>';

                    }   
                    else{
                    
                          

                      $output .='<td><span class="badge badge-secondary">'.$satus.'</span></td>';

                    }   

$output .='
        <td>'.$phone.'</td>
       <td>'.$provider.'</td>
        <td>'.$sale_date.'</td>
         <td>'.$opp_time.'</td>

    </tr>
  ';
}

$output .= '</tbody></table>';

echo $output;
?>