<?php 

include("inc/db.php");
session_start(); 

$name = $_SESSION['u_name'];

if(isset($_SESSION)) {
  // session isn't started
  session_destroy();
  echo "<script>window.location.assign('index.php')</script>";
}
else{
  echo "<script>window.location.assign('index.php')</script>";

}