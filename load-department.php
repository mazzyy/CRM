<?php

include("inc/db.php");


if($_POST['type'] == "")
{
    $sql = "SELECT * FROM `tbl_department`";

    $query = mysqli_query($conn, $sql) or die("Department Fetching Failed");

    $str = "";

    while($row = mysqli_fetch_assoc($query)){

        $str .= "<option value='{$row['dep_id']}'>{$row['name']}</option>";
    }
}
else if($_POST['type'] == "desData")
{
    $sql = "SELECT * FROM `tbl_designation` WHERE `dep_id` ={$_POST['id']} ";

$query = mysqli_query($conn, $sql) or die("Department Fetching Failed");

$str = "";

while($row = mysqli_fetch_assoc($query)){

    $str .= "<option value='{$row['des_id']}'>{$row['name']}</option>";
}
    
}



echo $str;

?>