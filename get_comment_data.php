<?php

$connect = new PDO("mysql:host=localhost;dbname=crm", "root", "");

if (isset($_GET["id"]))
   {
      
   
      echo $lead_idw = $_GET['firstName'];

$query = "SELECT `id`, `lead_id`, `comment`, `updated_user`, `date_time` FROM `lead_comment` WHERE lead_id = $lead_idw ";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


$output ='';
foreach($result as $row)
{
	
	// $status = '';	
	$output .= '
		<tr>
			<td>'.$row['0'].'</td>
			<td>'.$row['3'].'</td>
			<td>'.$row['2'].'</td>
			<td>'.$row['4'].'</td>
		
		</tr>
	';

}
echo $output;

}

?>