<?php

include("inc/db.php");
session_start();
 $dep_id=  $_SESSION['dep_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee Profile | CRM</title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
   <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


</head>
<style type="text/css"> 
.custom-file-input {
    position: absolute;
    z-index: 0;
    width: 19%;
    height: calc(9.25rem + 2px);
    margin: 0;}

</style>
<body   class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="loader">
  <div class="body">
   <span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <div class="base">
    <span></span>
    <div class="face"></div>
  </div>
</div>
<div class="longfazers">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<h1>Redirecting</h1>

</div>

<!-- Site wrapper -->
<div class="wrapper" id="myDiv">


    <!-- Navbar Start -->

  <?php require_once('inc/header.php'); ?>

<!--Navbar End -->


  <!-- Sidebar Start -->

  <?php require_once('inc/sidebar.php'); ?>
  <!-- Sidebar End -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            
            <?php 
              
   $_SESSION['u_name'];
   $_SESSION['emp_id']; 

              if(isset($_GET['empID']) ){



                   $emp_id = $_GET['empID'];
                  
                    $fetch_department = "SELECT employess.id, employess.Title, employess.First_Name, employess.Last_Name, tbl_department.dep_id, tbl_department.name AS department, tbl_designation.des_id, tbl_designation.name AS designation, employess.Dependability, employess.Created_date ,employess.img FROM `employess` INNER JOIN tbl_department ON employess.Dep_id = tbl_department.dep_id INNER JOIN tbl_designation ON employess.des_id = tbl_designation.des_id WHERE employess.id = '$emp_id'";
                  



                    $run_department = mysqli_query($conn, $fetch_department);
                    $row_depart2 = mysqli_fetch_array($run_department);
                  
                    $emp_id_fetch = $row_depart2['id'];
                    $title_fetch = $row_depart2['Title'];
                    $fname_fetch = $row_depart2['First_Name'];
                    $lname_fetch = $row_depart2['Last_Name'];
                    // $uname_fetch = $row_depart2['u_name'];
                    //   $uid_fetch = $row_depart2['u_id'];
                    $dep_id_fetch = $row_depart2['dep_id'];
                    $department_fetch = $row_depart2['department'];
                    $des_id_fetch = $row_depart2['des_id'];
                    $designation_fetch = $row_depart2['designation'];
                    $dependability_fetch = $row_depart2['Dependability'];  
                    $date_fetch = $row_depart2['Created_date'];
                    $img_fetch = $row_depart2['img'];
              }

elseif (isset($_SESSION['emp_id']) ) {
 $useridf = $_SESSION['emp_id']; 

  $fetch_department = "SELECT employess.id, employess.Title, employess.First_Name, employess.Last_Name,tbl_department.dep_id, tbl_department.name AS department, tbl_designation.des_id, tbl_designation.name AS designation, employess.Dependability, employess.Created_date , employess.img FROM `employess` INNER JOIN tbl_department ON employess.Dep_id = tbl_department.dep_id INNER JOIN tbl_designation ON employess.des_id = tbl_designation.des_id WHERE id = '$useridf'";
                  



                    $run_department = mysqli_query($conn, $fetch_department);
                    $row_depart2 = mysqli_fetch_array($run_department);
                    if(!empty($row_depart2)){
                
        
                    $emp_id_fetch = $row_depart2['id'];
                    $title_fetch = $row_depart2['Title'];
                    $fname_fetch = $row_depart2['First_Name'];
                    $lname_fetch = $row_depart2['Last_Name'];
                    //$uname_fetch = $row_depart2['u_name'];
                  
                    $dep_id_fetch = $row_depart2['dep_id'];
                    $department_fetch = $row_depart2['department'];
                    $des_id_fetch = $row_depart2['des_id'];
                    $designation_fetch = $row_depart2['designation'];
                    $dependability_fetch = $row_depart2['Dependability'];  
                    $date_fetch = $row_depart2['Created_date'];
                    $img_fetch = $row_depart2['img'];

                    }
                    

}


              
              ?>

            <!-- Profile Image -->
            <div class="card card-warning card-outline" >
              <div class="card-body box-profile btn btn-info"  style="background-color:#2a3f54!important;">
                <div class="text-center">
                  <form method="post" id="myForm" enctype="multipart/form-data">
                    <input type="file" name="files" class="custom-file-input" id="imgInp" style="background: rgb();">
                   
                          <?php   if($img_fetch){
                         
                               echo '<img class="profile-user-img img-fluid img-circle"
                       src="upload/'.$img_fetch.'"
                       alt="User profile picture" id="blah" hight="120" >';
                                              }else{
                                                 echo '<img class="profile-user-img img-fluid img-circle"
                        src="upload/user.png"
                       alt="User profile picture" id="blah" hight="120" >';

                                              }?>

<button type="submit" name="upload" class="btn btn-info btn-lg" style=" float: right;  background-color:#000000!important; border-width:medium "
>Upload</button>
                </form>
              </div>
              <?php 
 if(isset($_POST['upload'])){

                      $file = $_FILES['files']['name'];
                    $tmp_name = $_FILES['files']['tmp_name'];
                      $size = $_FILES['files']['size'];
                      $type = $_FILES['files']['type'];
                      
                   
                      
                      $imagefolder = 'upload/';

move_uploaded_file($tmp_name, $imagefolder.$file);


                   $insert_empw = mysqli_query($conn, " UPDATE `employess` SET `img`='$file' WHERE id = $emp_id_fetch") or die("Query failed:4 ".mysqli_error());



              }   
              ?>

                <h3 class="profile-username text-center"><?php echo ucfirst( $fname_fetch)  ?></h3>
      
         <!--       
                <p class="text-muted text-center"></?php echo ucfirst($designation_fetch); ?></p>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>


                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-danger">
              <div class="card-header"  style="background-color:#2a3f54!important;" >
                <h3 class="card-title"  >About <?php echo ucfirst($fname_fetch); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                
                <strong><i class="fas fa-building mr-1"></i> Department</strong>

                <p class="text-muted"><?php echo ucfirst($department_fetch); ?></p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Designation</strong>

                <p class="text-muted">
                  <?php echo ucfirst($designation_fetch); ?>
                </p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

<?php if(isset($_GET['empID']) AND $dep_id == 1 or isset($_GET['empID']) AND  $dep_id == 2){
 ?>


          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 <!--  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Activity</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Infoo</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#empDetails" data-toggle="tab">Emp Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#empemergDetails" data-toggle="tab">Emp Emerg Details</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                    
                  
              
                      
                
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  
                  
                  
                  

                  <div class="active tab-pane" id="settings">
                    <form method="post"class="form-horizontal" >
                     
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="title">
                              <?php if(isset($title_fetch)){
    
                ?>
                <option><?php echo $title_fetch; ?></option>

                <option></option>

                <option>Mr</option>
                 <option>Mrs</option>
                 <option>Ms</option>
                  <option>Dr</option>
    
            <?php
    
                        }
                            
             ?>
                              
                          </select>
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                          <input type="" class="form-control" value="<?php if(isset($fname_fetch)){ echo $fname_fetch; } else { echo ""; } ?>" name="FName">
                        </div>
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php if(isset($lname_fetch)){ echo $lname_fetch; } else { echo ""; } ?>" name="LName">
                        </div>
                      </div>
                      
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                          <select id="department" name="department" class="form-control">
                           <option value="<?php echo $dep_id_fetch; ?>"><?php echo $department_fetch; ?></option>
                           <option><hr></option>
                      </select>
                        </div>
                      </div>
                      
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Designation </label>
                        <div class="col-sm-9">
                          <select id="designation" name="designation" class="form-control">
                            <option value="<?php echo $des_id_fetch; ?>"><?php echo $designation_fetch; ?></option>
                            <option><hr></option>
                          </select>
                        </div>
                      </div>
                      
                      
                              <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Dependability </label>
                        <div class="col-sm-9">
                          <input type="hidden" class="form-control" value="<?php echo $uid_fetch; ?>" placeholder="Dependability" name="uid_fetc">
                          <input type="text" class="form-control" value="<?php echo $dependability_fetch; ?>" placeholder="Dependability" name="Depen">
                        </div>
                      </div>
                       
                      <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                          <button type="submit" name="employess" class="btn btn-primary">Submit</button>
                        </div>
                      </div>

                       <?php  

                              $q3 ="SELECT emp_id, salary,UserId FROM `salary` INNER JOIN employess on salary.emp_id = employess.id WHERE `emp_id` = $emp_id_fetch ORDER BY `salary` DESC";

                              $emp_id = mysqli_query($conn,$q3);
                                // if ($emp_id = mysqli_query($conn,$q3))  {
                                  
                                //  }
                            $row = mysqli_fetch_assoc($emp_id);
                             ?>
                       <div class="form-group row">
                        <label class="col-sm-3 col-form-label">salary </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $row['salary']; ?>" placeholder="Dependability" name="sal" >
                        </div>
                      </div>
                       <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                          <button type="submit" name="chg_sal" class="btn btn-warning">Change Salary</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                   <?php  

                              $q9 ="SELECT `id`, `emp_ID`, `Father_Name`, `Mobile_num`, `Alt_num`, `Email`, `Address`, `Gender`, `SSN`, `DOB`, `Marital_Status`, `DOJ`, `Bank_name`, `Bank_Account_Tile`, `Bank_Account` FROM `emp_details` WHERE emp_ID = $emp_id_fetch ";

                              //$emp_det = mysqli_query($conn,$q9);
                                if ($emp_det = mysqli_query($conn,$q9))  {
                                  
                                 
                            $row = mysqli_fetch_array($emp_det);
                            $id = $row['id'];
                            $father_name = $row['Father_Name'];
                            $mobile_number = $row['Mobile_num'];
                            $alt_number = $row['Alt_num'];
                            $email = $row['Email'];
                            $gender = $row['Gender'];
                            $ssn = $row['SSN'];
                            $date_of_birth = $row['DOB'];
                            $status = $row['Marital_Status'];
                            $date_of_join = $row['DOJ'];
                            $bank_name = $row['Bank_name'];
                            $bank_title = $row['Bank_Account_Tile'];
                            $account_number = $row['Bank_Account'];
                            $address = $row['Address'];
}


                             ?>
                  
                  <div class="tab-pane" id="empDetails">
                    <form class="form-horizontal" method="post">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" >
                      <input type="hidden" class="form-control" name="id_emp" value="<?php echo $emp_id_fetch; ?>" >
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Father's Name</label>
                        <div class="col-sm-9">
                       <input type="text" class="form-control" name="fathername" value="<?php if(isset($father_name)){ echo $father_name; } else { echo ""; }  ?>" placeholder="Father's Name">
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="mobile" value="<?php if(isset($mobile_number)){ echo $mobile_number; } else { echo ""; }  ?>" placeholder="Mobile Number">
                        </div>
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alt Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="altNumber" value="<?php  if(isset($alt_number)){ echo $alt_number; } else { echo ""; }  ?>" placeholder="Alt Number">
                        </div>
                      </div>
                      
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                         <input type="email" class="form-control" name="email" value="<?php if(isset($email)){ echo $email; } else { echo ""; } ?>" placeholder="Email" required>
                        </div>
                      </div>
                      
                    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender </label>
                            <div class="col-sm-9">
                              <input type="radio" name="gender" value="male" > Male
                              <input type="radio" name="gender" value="female"> Female
                            </div>
                        </div>
                        
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIC # </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ssn" value="<?php if(isset($ssn)){ echo $ssn; } else { echo ""; } ?>" placeholder="Social Security Number / Goverment ID">
                        </div>
                      </div>
                         
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date Of Birth </label>
                        <div class="col-sm-9">
                          <input type="date" name="dob" class="form-control" value="<?php if(isset($date_of_birth)){ echo $date_of_birth; } else { echo ""; }  ?>" required>
                        </div>
                      </div>
                         
                         <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Marital Status </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="status" value="<?php if(isset($status)){ echo $status; } else { echo ""; }  ?>" placeholder="Marital Status">
                        </div>
                      </div>
                         
                         <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date Of Joining </label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" name="doj" value="<?php if(isset($date_of_join)){ echo $date_of_join; } else { echo ""; } ?>" required>
                        </div>
                      </div>
                          
                                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bank Name </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="bankname" value="Meezan Bank" placeholder="Bank Name">
                        </div>
                      </div>
                                 
                                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Bank Account Title </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="banktitle" value="<?php if(isset($bank_title)){ echo $bank_title; } else { echo ""; }  ?>" placeholder="Bank Account Title" required>
                        </div>
                      </div>
                             
                                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Account Number </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="accountnumber" value="<?php if(isset($account_number)){ echo $account_number; } else { echo ""; }  ?>" placeholder="Account Number" required>
                        </div>
                      </div>
                              
                           
                          
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Address </label>
                        <div class="col-sm-9">
                         <textarea class="form-control" name="address" placeholder="Address" ><?php echo $address; ?></textarea>
                         
                        </div>
                      </div>
                      
                      
                       
                                            

                      
                    
                      
                    
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update" class="btn btn-outline-danger btn-lg">Update</button>

<?php 
 

?>

                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="empemergDetails">

                       <?php  

                              $q9 ="SELECT `id` FROM `emp_details` WHERE emp_ID = $emp_id_fetch ";

                              //$emp_det = mysqli_query($conn,$q9);
                                if ($emp_det = mysqli_query($conn,$q9))  {
                                  
                                 
                            $row = mysqli_fetch_array($emp_det);
                            $idd = $row['id'];

                            $q34 ="SELECT `id`, `emp_Det_id`, `First_Name`, `Last_Name`, `Phone`, `Alt_num`, `Address`, `Relationship` FROM `employess_emergency_contact` WHERE emp_Det_id = $idd  ";

                              //$emp_det = mysqli_query($conn,$q9);
                                if ($emp_detY = mysqli_query($conn,$q34))  {

                              $rows = mysqli_fetch_array($emp_detY);
                            $idss = $rows['id'];
                            $First_Name = $rows['First_Name'];
                            $Last_Name = $rows['Last_Name'];
                            $mobile_number = $rows['Phone'];
                            $Alt_num = $rows['Alt_num'];
                           $address = $rows['Address'];
                            $Relat = $rows['Relationship'];
                            

                          }
}


                             ?>
                    <form class="form-horizontal" method="post">
                     
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9"> <input type="hidden" class="form-control" value="<?php if(isset($idss)){ echo $idss; } else { echo ""; } ?>" name="idss">
                          <input type="text" class="form-control" value="<?php if(isset($First_Name)){ echo $First_Name; } else { echo ""; } ?>" name="FName" required>
                        </div>
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php if(isset($Last_Name)){ echo $Last_Name; } else { echo ""; } ?>" name="LName" required>
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="mobile" value="<?php if(isset($mobile_number)){ echo $mobile_number; } else { echo ""; } ?>" placeholder="Mobile Number" required>
                        </div>
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alt Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="altNumber" value="<?php if(isset($Alt_num)){ echo $Alt_num; } else { echo ""; } ?>" placeholder="Alt Number" required>
                        </div>
                      </div>
                       
                                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Relationship </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="Relat" value="<?php if(isset($Relat)){ echo $Relat; } else { echo ""; } ?>" placeholder="Relationship" required>
                        </div>
                      </div>
                              
                           
                          
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Address </label>
                        <div class="col-sm-9">
                         <textarea class="form-control" name="address" placeholder="Address"><?php if(isset($address)){ echo $address; } else { echo ""; } ?></textarea>
                         
                        </div>
                      </div>
                      
                      
                       
                                            

                      
                    
                      
                    
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="updates" class="btn btn-outline-danger btn-lg">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-content -->
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <?php 
            }


            elseif (isset($_SESSION['u_id'])) {

//            if(isset($_POST['btn-update'])){
//             
//                 $father_name = $_POST['fathername'];
//                 $mobile_number = $_POST['mobile'];
//                 $alt_number = $_POST['altNumber'];
//                 $email = $_POST['email'];
//                 $gender = $_POST['gender'];
//                 $ssn = $_POST['ssn'];
//                 $date_of_birth = $_POST['dob'];
//                 $status = $_POST['status'];
//                 $date_of_join = $_POST['doj'];
//                 $bank_name = $_POST['bankname'];
//                 $bank_title = $_POST['banktitle'];
//                 $account_number = $_POST['accountnumber'];
//                 $address = $_POST['address'];
//                
//               
//            }
            
            ?>

<div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills"  style="background-color:#2a3f54!important;" >
                 
                  
                  <li class="nav-item"><a class="nav-link text-light"   href="#timeline" data-toggle="tab">Timeline</a></li>
                  
                  <li class="nav-item"><a class="nav-link active text-light" href="#settings" data-toggle="tab">info</a></li>
                  
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                    
                  
              
                      
                
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  
                  
                  
                  

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                     
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <select class="form-control" disabled>
                              <?php if(isset($title_fetch)){
    
                ?>
                <option><?php echo $title_fetch; ?></option>

                <option></option>

                <option>Mr</option>
                 <option>Mrs</option>
                 <option>Ms</option>
                  <option>Dr</option>
    
            <?php
    
                        }
                            
             ?>
                              
                          </select>
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php if(isset($fname_fetch)){ echo $fname_fetch; } else { echo ""; } ?>" placeholder="First Name" disabled>
                        </div>
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php if(isset($lname_fetch)){ echo $lname_fetch; } else { echo ""; } ?>" placeholder="Last Name" disabled>
                        </div>
                      </div>
                      
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                          <select id="department" name="department" class="form-control" disabled>
                           <option value="<?php echo $dep_id_fetch; ?>"><?php echo $department_fetch; ?></option>
                           <option><hr></option>
                      </select>
                        </div>
                      </div>
                      
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Designation </label>
                        <div class="col-sm-9">
                          <select id="designation" name="designation" class="form-control" disabled>
                            <option value="<?php echo $des_id_fetch; ?>"><?php echo $designation_fetch; ?></option>
                            <option><hr></option>
                          </select>
                        </div>
                      </div>
                      
                      
                              <!-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Dependability </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php// echo $dependability_fetch; ?>" placeholder="Dependability" disabled>
                        </div>
                      </div> -->
                      
                            
                       <?php  

                              $q3 ="SELECT emp_id, salary,UserId FROM `salary` INNER JOIN employess on salary.emp_id = employess.id WHERE `UserId` = ".$_SESSION['u_id']." ORDER BY `salary` DESC";

                              $emp_id = mysqli_query($conn,$q3);
                                // if ($emp_id = mysqli_query($conn,$q3))  {
                                  
                                //  }
                            $row = mysqli_fetch_assoc($emp_id)
                             ?>                

                       <!-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">salary </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php// echo $row['salary']; ?>" placeholder="Dependability" disabled>
                        </div>
                      </div> -->
                    
                      
                    
                  
                      
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->




          <?php 
            }
            ?>
          
          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
    <!-- Footer Start -->

  <?php require_once('inc/footer.php'); ?>

<!--Footer End -->




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script><script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<?php 
                    

                     if(isset($_POST['employess'])){
//             
                $FName = $_POST['FName'];
                $LName = $_POST['LName'];
                $department = $_POST['department'];
                $designation = $_POST['designation'];
                $Depen = $_POST['Depen'];
                $sal = $_POST['sal'];
                $title = $_POST['title'];
                $uid_fetc = $_POST['uid_fetc'];
               
                  $q5 = "UPDATE `employess` SET `Title`='$title',`First_Name`='$FName',`Last_Name`='$LName',`Dep_id`='$department',`des_id`=' $designation',`Dependability`='$Depen' WHERE id = $emp_id_fetch ";

                      if(mysqli_query($conn, $q5)) {



                        echo "<script type='text/javascript'>
                toastr.success('Updates are made  ....')

                       </script>";
}
else {
        echo "Error 1: " . $q5 . "<br>" . mysqli_error($conn);
                      
                      }

           }


if(isset($_POST['chg_sal'])){

            $sal = $_POST['sal'];

  $q6="INSERT INTO `salary`(`emp_id`,`salary`,`date`) VALUES ('$emp_id_fetch','$sal',current_timestamp())";
   if(mysqli_query($conn, $q6)) {

 echo "<script type='text/javascript'>
                toastr.success('Salary are Update !!!!')

                       </script>";

   }
}


                     
 
         


        
if(isset($_POST['update'])){
               $id = $_POST['id'];

             $id_emp = $_POST['id_emp'];
                $father_name = $_POST['fathername'];
                $mobile_number = $_POST['mobile'];
                $alt_number = $_POST['altNumber'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $ssn = $_POST['ssn'];
                $date_of_birth = $_POST['dob'];
                $status = $_POST['status'];
                $date_of_join = $_POST['doj'];
                $bank_name = $_POST['bankname'];
                $bank_title = $_POST['banktitle'];
                $account_number = $_POST['accountnumber'];
                $address = $_POST['address'];



                $q9 ="SELECT `id`, `emp_ID`  FROM `emp_details` WHERE emp_ID = $emp_id_fetch ";

                              //$emp_det = mysqli_query($conn,$q9);
                                 

                                  if($emp_det = mysqli_query($conn,$q9)){
        
        $count = mysqli_num_rows($emp_det);
        $row = mysqli_fetch_array($emp_det);
    
        if($count > 0){

 
               
               $q56 = "UPDATE `emp_details` SET `Father_Name`='$father_name',`Mobile_num`='$mobile_number',`Alt_num`='$alt_number',`Email`='$email',`Address`='$address',`Gender`='$gender',`SSN`='$ssn',`DOB`='$date_of_birth',`Marital_Status`='$status',`DOJ`='$date_of_join',`Bank_name`='$bank_name',`Bank_Account_Tile`='$bank_title',`Bank_Account`='$account_number' WHERE emp_ID = $emp_id_fetch";

                              if($emp_dtails = mysqli_query($conn,$q56)){

                                echo "<script type='text/javascript'>
                toastr.success('Updates are made  ....')

                       </script>";
                              }
                            }

                             else{
                              
                              $q56 = "INSERT INTO `emp_details`(`emp_ID`, `Father_Name`, `Mobile_num`, `Alt_num`, `Email`,  `Gender`, `SSN`, `DOB`, `Marital_Status`, `DOJ`, `Bank_name`, `Bank_Account_Tile`, `Bank_Account`,`Address) VALUES ('$id_emp','$father_name','$mobile_number','$alt_number','$email',' $gender','$ssn','$date_of_birth','$status','$date_of_join','$bank_name','$bank_title','$account_number','$address') ";

                              if($emp_dtails = mysqli_query($conn,$q56)){

                                echo "<script type='text/javascript'>
                toastr.success('Insert EMP Detail  ....')

                       </script>";
                              }


                            

                            }
}
else {
        echo "Error 1: " . $q9 . "<br>" . mysqli_error($conn);
                      
                      }
           }

            if(isset($_POST['updates'])){


 $id = $_POST['idss'];

              $FName = $_POST['FName'];
                $LName = $_POST['LName'];
                $alt_number = $_POST['altNumber'];
                $mobile = $_POST['mobile'];
                $Relat = $_POST['Relat'];
                $address = $_POST['address'];



                $q9 ="SELECT `id`, `emp_ID`  FROM `emp_details` WHERE emp_ID = $emp_id_fetch ";

                              //$emp_det = mysqli_query($conn,$q9);
                                 

                                  if($emp_det = mysqli_query($conn,$q9)){
        
       $counts = mysqli_num_rows($emp_det);
       if($counts == 1){
        $rows = mysqli_fetch_array($emp_det);

                    $empde_id = $rows['id'];

 $q90 ="SELECT `id`, `emp_Det_id`  FROM `employess_emergency_contact` WHERE emp_Det_id = $empde_id ";

                              $emp_emer = mysqli_query($conn,$q90);
                                 
   $count = mysqli_num_rows($emp_emer);
        $row = mysqli_fetch_array($emp_emer);
                                  
        



        if($count == 1){

 
               
               $q56 = "UPDATE `employess_emergency_contact` SET `First_Name`='$FName',`Last_Name`='$LName',`Phone`='$mobile',`Alt_num`='$alt_number',`Address`='$address',`Relationship`='$Relat' WHERE id = $id";

                              if($emp_dtails = mysqli_query($conn,$q56)){

                                echo "<script type='text/javascript'>
                toastr.success('Updates are made  ....')

                       </script>";
                              }
                            }

                           if($count == 0){
                              
                              $q56 = " INSERT INTO `employess_emergency_contact`(`emp_Det_id`, `First_Name`, `Last_Name`, `Phone`, `Alt_num`, `Address`, `Relationship`) VALUES ('$empde_id','$FName','$LName','$mobile','$alt_number','$address','Relat') ";

                              if($emp_dtails = mysqli_query($conn,$q56)){

                                echo "<script type='text/javascript'>
                toastr.success('Insert EMP Detail ssss ....')

                       </script>";
                              }


                            

                            }

}
if($counts == NULL){

echo "<script type='text/javascript'>
                toastr.error(' Please Insert EMP Detail First ....')

                       </script>";

}

}



else {
        echo "Error 1: " . $q9 . "<br>" . mysqli_error($conn);
                      
                      }



              
            }







                   ?>


<script>
  document.onreadystatechange = function() { 

    if (document.readyState !== "complete") { 
        document.querySelector("#myDiv").style.display = "none"; 
        document.querySelector("#loader").style.visibility = "visible"; 
    } else { 
        document.querySelector("#loader").style.display = "none"; 
        document.querySelector("#myDiv").style.display = "block"; 
    } 
  }

</script>
</body>
</html>


<script type="text/javascript">
    $(document).ready(function(){
        
        loadData();
        
        function loadData(type, department_id){
            $.ajax({
                url     :   "load-department.php",
                type    :   "POST",
                data    :   {type: type, id: department_id},
                cache: false,
                success : function(data){
                    if(type == "desData")
                    {
                        $('#designation').html(data);    
                    }
                    else{
                        $('#department').append(data);
                        }
                }
            });
        }
        
        $('#department').on("change", function(){
            var dep = $('#department').val();
            
            loadData("desData", dep);
        });
        
       
    });
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
   
                    



});
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
