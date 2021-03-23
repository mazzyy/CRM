<?php
include("inc/db.php");
session_start();
 $_SESSION['u_name'];
$dep_id=  $_SESSION['dep_id'];

if(isset($_GET['zipcode'])){
  $zipCode=(int)$_GET['zipcode'];

}

    $select_deparment = "SELECT * FROM `highspeedinternet` INNER JOIN zip ON zip.zipcode = highspeedinternet.zip_code WHERE highspeedinternet.zip_code= $zipCode ORDER BY `highspeedinternet`.`availability` DESC";
    $department_result = mysqli_query($conn, $select_deparment);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OSS || zipcode</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
  
</style>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('inc/header.php');  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('inc/sidebar.php');  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Providers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service Providers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="">

      <!-- Default box -->
      <div class="card">
      
       
        <!-- /.card-body -->
        <div class="card-footer">
        <div class="container">
            <!-- provider     -->
                        <?php 
                        $i=1;
                        while(($row = $department_result->fetch_assoc()) !== null){
                             $name=trim($row['name']);
                            //  var_dump($name);
                            $availability=$row['availability'];
                            $connections=$row['connections'];
                            $speed=$row['speed'];
                        ?> 
              <div  class="row m-0 p-0 pt-3 rounded" >
               
                  <!-- header -->
                        <div class="rounded col-12 bg-light w-100 p-0 m-0 " style=" background: linear-gradient(to right, rgb(15, 32, 39), rgb(32, 58, 67), rgb(44, 83, 100));">
                            <h3 class=" border p-0 m-0 boxheader text-light"> <span style="" class="border-right   bold text-light">#<?php echo $i; $i++; ?>&nbsp;</span>
                                <span class="bold"><?php echo  $name; ?></span>
                                <span class="float-right pt-2"style="font-size:70%; "> <strong><?php echo $availability."%"; ?></strong> availability </span>
                            </h3>
                        </div>
                        <div class="Small shadow col-12 bg-light w-100 p-0 m-0 rounded "style="  border: 1.5px solid #2a3f54;" >
                        
                              <div class="row m-0 p-0" >

                            
                                            <!-- <img class="w-100" src="img/providers/spectrum.png" alt=""> -->
                                            <?php
                                          
                                            if($name=="Spectrum" || $name=="RCN" || $name=="Verizon"  || $name=="Viasat" || $name=="HughesNet" || $name=="Starry Internet" || $name=="BarrierFree"  || $name=="AT&T" || $name=="AT&amp;T" || $name=="CenturyLink" || $name=="Xfinity" || $name=="DIRECTV" || $name=="AT&TTV" || $name=="Cox Communications" || $name=="Windstream Enterprise" || $name=="Frontier" )
                                            {
                                              if($name=="Spectrum"){
                                                echo '<a target="_blank" rel="noopener noreferrer"  href="https://Spectrum.com/">';
                                                echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                echo '</a>';
                                              }
                                              elseif($name=="RCN"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://shopnow.rcn.com/">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="Viasat"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://buy.viasat.com/residential/">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="Verizon"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.verizon.com/inhome/qualification">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="AT&T" or $name=="AT&amp;T"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.att.com/buy/bundles/?product_suite=NDTVS_NBB">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="AT&T" or $name=="AT&amp;T"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.att.com/buy/bundles/?product_suite=NDTVS_NBB">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="CenturyLink"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.centurylink.com/home/internet/">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               }
                                               elseif($name=="Xfinity"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.xfinity.com/learn/offers">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                 echo '</a>';
                                               } elseif($name=="Cox Communications"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.cox.com/residential-shop/shop.html">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/Cox.png" alt="">';
                                                 echo '</a>';
                                               }elseif($name=="Windstream Enterprise"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.windstream.com/high-speed-internet#">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/windstream.png" alt="">';
                                                 echo '</a>';
                                               }elseif($name=="Frontier"){
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.getfrontier.com/shop/?s_referrer=blank&landingUrl=https%3A%2F%2Ffrontier.com%2Forder-online#serviceability-form">';
                                                 echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                 echo '<img class="w-50" src="img/providers/Frontier.png" alt="">';
                                                 echo '</a>';
                                               }
                                               
                                        
                                               else{
                                            
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://'.$name.'.com/">';
                                                echo  '<div  class="col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                echo '<img class="w-50" src="img/providers/'.$name.'.png" alt="">';
                                                echo '</a>';
                                               }
                                            }
                                            else{
                                             
                                                $link= str_replace(' ', '', $name);
                                                echo  '<div  class=" pt-5 col-xs-1	col-sm-1	col-md-2	col-lg-4">';
                                                echo '<a target="_blank" rel="noopener noreferrer" href="https://www.'.$link.'.com/">';
                                            echo " <h4 class'' style=' font-family: 'Trebuchet MS', sans-serif;font-size: 2em;letter-spacing: -2px;text-transform: uppercase;   '>&nbsp;$name</h4>";
                                            echo  '</a>';
                                            }
                                          
                                    
                                    ?>
  
                                </div>    
                                    
                                          <div class="col-6">
                                          
                                          
                                                      <div class=" pt-3 container-fluid" style="margin-top: 20px; margin-bottom: 20px;">
                                                      <div class="row" >
                                                      <div class="col-xs-4 text-center border-right border-left pr-2 pl-2" >
                                                      <?php
                                                      if($name=="DIRECTV" ){
                                                        echo  '<div  style="line-height: 150%; ">Channels up to :</div><p class="h2 text-dark" style="font-size: 18px; ">180 </p></div>';
                                                        echo '<div class=" col-5 text-center "><div style="line-height: 150%;">Connections:</div><p class="h2 text-dark" style="font-size: 18px;" itemprop="priceRange">Satellite </p></div>';

                                                      }
                                                      elseif($name=="AT&TTV"){
                                                          echo  '<div  style="line-height: 150%; ">Channels up to :</div><p class="h2 text-dark" style="font-size: 18px; ">150 </p></div>';
                                                          echo '<div class=" col-5 text-center "><div style="line-height: 150%;">Connections:</div><p class="h2 text-dark" style="font-size: 18px;" itemprop="priceRange">Streaming </p></div>';
                                                      }
                                                      else{
                                                          echo  '<div  style="line-height: 150%; ">Speed up to:</div><p class="h2 text-dark" style="font-size: 18px; ">'. $speed.'</p></div>';
                                                          echo '<div class=" col-5 text-center "><div style="line-height: 150%;">Connections:</div><p class="h2 text-dark" style="font-size: 18px;" itemprop="priceRange">'.$connections.' </p></div>'; 
                                                      }
                                                      ?>

                                                      <div class="col-3 text-center">
                                                          <div style="line-height: 150%;"></div>
                                                          <div style="font-size: 18px">
                                                              <span class="bs-tooltip" title="3.5 out of 5 stars">
                                                              </span>
                                                          </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- <p>Viasat provides  <a class="bs-tooltip" href="/provider/satellite" title="Click to view all Satellite Internet internet providers.">Satellite Internet</a> and <a class="bs-tooltip" href="/provider/phone" title="Click to view all Phone internet providers.">Phone</a> services in New York, <abbr title="New York">NY</abbr>. -->
                                              </p></div>
                                                  <div class="col-2 pt-3">
                                                      <a href="" class=" btn btn-warning btn-lg " style="border-radius: 20px !important;">plans &rtrif;</a>
                                                      
                                                  </div>
                                        </div>
                                      
                              
                        </div>
                        
                        
                        
              </div>
              <?php
                                            }
                            ?> 
          
        </div>
        </div>
      </div>

     
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
  <!-- pace-progress -->
<script src="plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
