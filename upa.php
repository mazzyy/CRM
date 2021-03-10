<?php 
include 'inc/db.php';
	
	 
if(isset($_POST['files'])){

                      $file = $_FILES['files']['name'];
                      $tmp_name = $_FILES['files']['tmp_name'];
                      $size = $_FILES['files']['size'];
                      $type = $_FILES['files']['type'];
                      
                   
                      
                      $imagefolder = 'upload/';

move_uploaded_file($tmp_name, $imagefolder.$file);


                   $insert_empw = mysqli_query($conn, " UPDATE `employess` SET `img`='$file' WHERE id = $emp_id_fetch") or die("Query failed:4 ".mysqli_error());



                 }
     
		


?>