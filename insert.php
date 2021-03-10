<?php

include("inc/db.php");
session_start();

$msg =$_POST['message'];
$userid = $_SESSION['u_id'];

$sql= mysqli_query($conn,"INSERT INTO public_chat(u_id, message) 
    VALUES('".$userid."', '".$msg."')");
if($sql)
{
    echo "Data has been Inserted";
    $msg = "";
}
else
{
    echo "Data has not been Inserted";
}





?>