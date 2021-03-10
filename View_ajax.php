<?php
	include 'inc/db.php';
	
	$sql = "SELECT * FROM tbl_users ORDER BY u_id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
         <li>
            <img src="dist/img/avatar5.png" alt="User Image" />
            <a class="users-list-name" href="#" 
            title="<?php echo ucfirst($row['u_name']); ?>"><?php echo ucfirst($row['u_name']);?></a>
            <span class="users-list-date"><?php echo date('M-d',strtotime($row['date_time']));?></span>
        </li>
		
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
  