<style>

[class*=sidebar-dark-] {
    background-color: #2a3f54;
}
</style>
  <aside class="main-sidebar sidebar-dark- primary elevation-4">
<div class="bg">
  
  <!-- Brand Logo -->
    <a href="time.php" class="brand-link">
      <img src="dist/img/Untitled-5.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light "><strong>ONESTOPSOLUTION</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color:#2A3F54">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel pt-2 mt-0 pb-0 mb-0 d-flex " style="height: 10ch!important;">
       
       <!--  -->
       
        <div class="image">
                                <?php 
                                include("inc/db.php");
                                $emp_id=$_SESSION['emp_id'];
                                $sql=("SELECT `img` FROM `employess` WHERE `id` =  '$emp_id'");
                                $usertable = mysqli_query($conn,  $sql);
                                $row = mysqli_fetch_array($usertable);
                                $userImage = $row['0'];
                              
                                ?>
                                <img class=" border border-info Regular shadow img-fluid img-circle  "
                                          style="width:6ch !important;height:6ch !important;border-width: medium !important; margin-bottom:45%!important" 
                                                src="upload/<?php echo  $userImage;?>"
                                                alt="User profile picture"  hight="120" >
                                
                                <div class="info">
                                <a href="profile.php " class="d-block" style=" color: white;"><?php            
                                  
                                echo "<span class='h3 '> ".ucwords($_SESSION['u_name']) ."</span>";
                                $dep_id=  $_SESSION['dep_id'];
                                if ( $dep_id ==1) {
                                echo '<div style="color:#BDBDBD;" class="pb-1"> Admin</div>';
                                 }

                              if ( $dep_id ==2) {
                                echo '<div style="color:#BDBDBD;" class="pb-1"> HR</div>';
                                }

                                if ( $dep_id ==3) {
                                echo '<div style="color:#BDBDBD;" class="pb-1"> Agent</div>';
                                  }

                                if ( $dep_id ==4) {
                                echo '<div style="color:#BDBDBD;" class="pb-1"> Back Office</div>';
                                  }

                                if ( $dep_id ==5) {
                                echo '<div style="color:#BDBDBD;" class="pb-1"> Employee</div>';
                                  }
                                  ?>
                        </a>
                      </div>                        
                      </div>
        
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

 <li class="nav-item">
 <!-- admin start -->

 <?php if ( $dep_id ==1) { ?>
  <center>
            <!-- <a  class="nav-link bg-info ">      
              <i class="fas fa-user-shield"></i>
                <p>
                 ADMIN
                  
                </p>
            </a> -->
 </center>         
          

              
          <li class="nav-item " style="background-color: #1d2438;">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Lead Utilities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="./leadstatus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               LEAD STATUS

              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="./provider.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Providers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./lead_source.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lead Source</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item">
            <a href="./profile.php" class="nav-link">
            <i class="fas fa-id-card"></i>
              <p>
               Profile
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./providers.php" class="nav-link">
            <i class="fas fa-concierge-bell"></i>
              <p>
              Service Providers
               
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="./add-employee.php" class="nav-link">
            <i class="fas fa-user-clock"></i>
              <p>
               Employee
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./addlead.php" class="nav-link">
            <i class="far fa-plus-square"></i>
              <p>
                Add Lead
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="./lead_table.php" class="nav-link">
              <i class="fas fa-list-ol"></i>
              <p>  <span class="right badge badge-danger">New</span>
                Lead list
                
              </p>
            </a>
          </li>
  <li class="nav-item">
            <a href="./oldlead_view.php" class="nav-link">
            <i class="fas fa-clipboard"></i>
              <p>  <span class="right badge badge-warning">old</span>
                OLD Lead list
                
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="./add-user.php" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ratchet/" class="nav-link">
                <i class="fas fa-comments"></i>
                  <p>Chat</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./campaing_schedule.php" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                    <p>
                    Campaing Schedule
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./time.php" class="nav-link">
                <i class="fas fa-clock"></i>
                    <p>
                    Time
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./schedule.php" class="nav-link">
                <i class="fas fa-file-signature"></i>
                    <p>
                    Attendence Report
                    </p>
                </a>
              </li>

          <li class="nav-item">
            <a href="./add-department.php" class="nav-link">
            <i class="fas fa-building"></i>
              <p>
               Department
               
              </p>
            </a>
          </li>



                <li class="nav-item">
                <a href="./new.php" class="nav-link">
                <i class="fas fa-money-bill-alt"></i>
                  <p>Customer</p>
                </a>
              </li>
          

          <li class="nav-item">
            <a href="./add-designation.php" class="nav-link">
            <i class="fas fa-code-branch"></i>
              <p>
               Designation
               
              </p>
            </a>
          </li>




         



<li class="nav-item">


            <a href="./back.php" class="nav-link">
            <i class="fas fa-laptop-house"></i>
              <p>
               back office
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./fi_cus.php" class="nav-link">
            <i class="fas fa-search-location"></i>
              <p>
               Find customer
               
              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="./payroll.php" class="nav-link">
           <i class="fas fa-file-invoice-dollar"></i>
              <p>
               payroll
               
              </p>
            </a>
          </li>
</ul>
          </li> 
<!-- admin last -->
 <?php  }?>
<!-- hr start -->

<?php if ( $dep_id ==2) { ?>
 <li class="nav-item">
   <center>
            <!-- <a  class="nav-link bg-info ">
            <i class="fas fa-user-secret"></i>
              <p>
                HR
       
              </p>
            </a> -->
    </center>        
   
 <li class="nav-item">
                <a href="./campaing_schedule.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Campaing Schedule
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./time.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Time
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./schedule.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Attendence Report
                    </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="./add-department.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Department
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="./add-designation.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Designation
               
              </p>
            </a>
          </li>

<li class="nav-item">
            <a href="./payroll2.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               payroll
               
              </p>
            </a>
          </li>
           <li class="nav-item">
                <a href="./add-user.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Add User</p>
                </a>
              </li>
               <li class="nav-item">
            <a href="./add-employee.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Employee
               
              </p>
            </a>
          </li>
</ul>
          </li> 
          <?php  }?>
          <!-- End HR -->



          <!-- start backoff -->
          <?php if ( $dep_id ==4) { ?>
 <li class="nav-item">
    <center>
            <!-- <a class="nav-link bg-info">
            <i class="fas fa-briefcase"></i>
              <p>
                BACK OFF
               
              </p>
            </a> -->
    </center>        
           
                <li class="nav-item">
                <a href="./time.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Time
                    </p>
                </a>
              </li>
              <li class="nav-item">
            <a href="./back.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Schedule
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="./addlead.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Lead
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="./lead_table.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>  <span class="right badge badge-danger">New</span>
                Lead list
                
              </p>
            </a>
          </li>
  <li class="nav-item">
            <a href="./oldlead_view.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>  <span class="right badge badge-warning">old</span>
                OLD Lead list
                
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="./fi_cus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Find customer
               
              </p>
            </a>
          </li>
           <li class="nav-item">
                <a href="./new.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Customer</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="./profile.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Profile
               
              </p>
            </a>
          </li>
</ul>
          </li> 
          <?php  }?>
<!-- end hr -->

<!-- start agent -->

<?php if ( $dep_id ==3) { ?>
 <li class="nav-item">
   <center>
            <!-- <a class="nav-link bg-info">
              <i class="fas fa-head-side-virus"></i>
              <p>
                AGENT
              </p>
            </a> -->
   </center>        
       
               <li class="nav-item">
                <a href="./time.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Time
                    </p>
                </a>
              </li>
               <li class="nav-item">
            <a href="./addlead.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Lead
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="./lead_table.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>  <span class="right badge badge-danger">New</span>
                Lead list
                
              </p>
            </a>
          </li>
  <li class="nav-item">
            <a href="./oldlead_view.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>  <span class="right badge badge-warning">old</span>
                OLD Lead list
                
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="./fi_cus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Find customer
               
              </p>
            </a>
          </li> <li class="nav-item">
                <a href="./new.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Customer</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="./profile.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Profile
               
              </p>
            </a>
          </li>
</ul>
          </li>
</ul>
          </li>
          <?php  }?>

          

        <!--   <li class="nav-item">
            <a href="./leadstatus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               LEAD STATUS
               
              </p>
            </a>
          </li>




          

          <li class="nav-item">
            <a href="./leadstatus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               LEAD STATUS
               
              </p>
            </a>
          </li>




          

          <li class="nav-item">
            <a href="./leadstatus.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               LEAD STATUS
               
              </p>
            </a>
          </li> -->




          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </div>
  </aside>
