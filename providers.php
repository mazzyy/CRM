<?php include("inc/db.php");
session_start();  

  $_SESSION['u_id'];    
 $_SESSION['u_name'];

 
 echo $dep_id=  $_SESSION['dep_id'];
 if ( $dep_id == 1 or $dep_id == 3 or $dep_id == 4 ) { 
 
  }else{
 
  echo '<script type="text/javascript">
        window.location.assign("500.html")
        
 </script> ';
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard </title>
<link rel = "icon" href ="dist/img/logop.ico" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<style>
ul,li,a {
  color:white !important;
  background-color:#2a3f54!important;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active  {
  color: black!important;
  background-color: white!important;
}

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

        <?php  include("inc/header.php");  
      include("inc/sidebar.php"); 

      ?> 

      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
         
    
      
         

  <div class="row"   >
      <div class="col-12 pl-2" >
    <ul class="nav nav-tabs " id="myTab" role="tablist" style="  font-size: 14px;" style="background-color:#2a3f54!important;color:white !important" >
        
          <li class="nav-item">
            <a class="nav-link" id="serviceability-tab" data-toggle="tab" href="#serviceability" role="tab" aria-controls="serviceability" aria-selected="true">BROADBANDNOW</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="serviceability2-tab" data-toggle="tab" href="#serviceability2" role="tab" aria-controls="serviceability2" aria-selected="false">DIGITAL LANDING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="spectrum-tab" data-toggle="tab" href="#spectrum" role="tab" aria-controls="spectrum" aria-selected="false">SPECTRUM</a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">EXEDE</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" id="century-tab" data-toggle="tab" href="#century" role="tab" aria-controls="century" aria-selected="false">century</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="cox-tab" data-toggle="tab" href="#cox" role="tab" aria-controls="cox" aria-selected="false">COX</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="frontier-tab" data-toggle="tab" href="#frontier" role="tab" aria-controls="frontier" aria-selected="false">frontier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="hughes-tab" data-toggle="tab" href="#hughes" role="tab" aria-controls="hughes" aria-selected="false">hughes</a>
          </li>
          
         
          <li class="nav-item">
            <a class="nav-link" id="xfinity-tab" data-toggle="tab" href="#xfinity" role="tab" aria-controls="xfinity" aria-selected="false">XFINITY</a>
          </li>
        
       

        
          <li class="nav-item">
            <a class="nav-link" id="windstream-tab" data-toggle="tab" href="#windstream" role="tab" aria-controls="windstream" aria-selected="false">windstream</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">AT&T</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">  DIRECTTIV</a>
          </li>
        
       
        </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="width:500px;height:500px"> 
                      <iframe style=" height: 1000px; width:1120px ;" src="https://promo.viasat.com/" title="W3Schools Free Online Web Tutorials"></iframe>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      
                       <a style="width:200ch" href=" https://www.att.com/buy/bundles/?product_suite=NDTVS_NBB" target="_blank"><img src="arrow.png" alt=""></a>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">  <a style="width:200ch" href=" https://www.att.com/buy/bundles/?product_suite=NDTVS_NBB" target="_blank"><img src="arrow.png" alt=""></a></div>
                      <div class="tab-pane fade" id="spectrum" role="tabpanel" aria-labelledby="spectrum-tab"><iframe style=" height: 1000px; width:1120px ;" src="https://www.spectrum.com/" title="W3Schools Free Online Web Tutorials"></iframe></div>
                      <div class="tab-pane fade" id="xfinity" role="tabpanel" aria-labelledby="xfinity-tab">
                              <a style="width:200ch" href="https://www.xfinity.com/learn/landing/out-of-footprint" target="_blank"><img src="arrow.png" alt=""></a>
                              <?php
                              // header("Cache-Control: no-cache, must-revalidate");
                              // header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                              // header("Content-Type: application/xml; charset=utf-8");
                              ?>
                      </div>
                      
                      <div class="tab-pane fade" id="serviceability" role="tabpanel" aria-labelledby="serviceability-tab"><iframe Content-Security-Policy: frame-ancestors  allow="fullscreen" style=" height: 1000px; width:1120px ;" src="https://broadbandnow.com/" title="W3Schools Free Online Web Tutorials"></iframe></div>
                      <div class="tab-pane fade" id="serviceability2" role="tabpanel" aria-labelledby="serviceability2-tab"><iframe Content-Security-Policy: frame-ancestors  allow="fullscreen" style=" height: 1000px; width:1120px ;" src="https://direct.digitallanding.com/default.aspx?PromoID=5004024&SID=a65efb0f-7215-4c12-a2aa-789f90a8fcf6" title="W3Schools Free Online Web Tutorials"></iframe></div>
                      <div class="tab-pane fade" id="cox" role="tabpanel" aria-labelledby="cox-tab">
                      
                     <div class="row">
                          <div class="col-3"> </div> 
                                  <div class=col-4>
                                  
                                      <form action="https://www.cox.com/residential-shop/shop.html" method="POST" target="_blank">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">address</label>
                                          <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Zip Code</label>
                                          <input name="zip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Unit</label>
                                          <input name="apt" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        

                                        <button type="submit" class="btn btn-info">Submit</button>

                                        </form>
                          </div>
                          
                     </div>
                      
                      </div>
                      <div class="tab-pane fade" id="century" role="tabpanel" aria-labelledby="century-tab"><iframe Content-Security-Policy: frame-ancestors  allow="fullscreen" style=" height: 1000px; width:1120px ;" src="https://www.centurylink.com/home/#uni_res_drop/" title="W3Schools Free Online Web Tutorials"></iframe></div>
                      <div class="tab-pane fade" id="windstream" role="tabpanel" aria-labelledby="windstream-tab">

                             <a style="width:200ch" href="https://www.windstream.com/high-speed-internet#/" target="_blank"><img src="arrow.png" alt=""></a>
                      
                      </div>
                      <div class="tab-pane fade" id="frontier" role="tabpanel" aria-labelledby="frontier-tab">
                      
                                 <div class="row">
                                 <div class="col-3"> </div>
                                 <div class="col-3">
                                 <form action="https://frontier.com/order-online" class="form" target="_blank" > 
                                  <div class="form-group">
                                  <label for="exampleInputEmail1">address</label><br>
                                  <input type="text" class="form-control" data-automation-key="street" autofocus="" name="Street" label="Street Address" value="123 1/2 14th St" autocomplete="none">
                                  </div>
                                  <div class="form-group">
                                  <label for="exampleInputEmail1">Zip Code</label><br>
                                  <input class="form-control" type="text" data-automation-key="city" name="zip"  autocomplete="none" >
                                  </div>

                                  <button data-automation-key="check-availability" class="btn btn-info" type="submit" data-di-id="#gen_checkAvailability">Submit </button>
                                  </form>
                                  </div> 
                                 </div>
                 
                  </div>
                      <div class="tab-pane fade" id="hughes" role="tabpanel" aria-labelledby="hughes-tab">
                    <div class="row">
                    <div class="col-3"></div>
                    
                            <form class="epq-simple-grid-lookup-form" target="_blank" data-drupal-selector="epq-simple-grid-lookup-form" action="https://www.hughesnet.com/get-started" method="post" id="epq-simple-grid-lookup-form" accept-charset="UTF-8">
                        
                                <div>
                                <label for="exampleInputEmail1">address</label><br>
                                <input class="form-control" placeholder="Enter a Location" data-drupal-selector="autocomplete4" aria-describedby="autocomplete4--description" type="text"  name="autocomplete" value="" size="60" maxlength="128">
                                </div><br>

                                <button class="btn btn-info">button</button>
                            </form>
                        
                              <!-- <div class="tab-pane fade" id="hughes" role="tabpanel" aria-labelledby="hughes-tab">asd</div> -->
                      
                  </div>
      </div>

</div>

</div>  


<script>



</script>



<script type="text/JavaScript">
$(document).ready(function () {
  $( "#hughes" ).load( index.php);
 
});
</script>
  
 
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
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
// };
//   document.getElementById("loader").style.display = "none";
   
//   document.getElementById("myDiv").style.display = "block";




</script>
<!-- <script type="text/JavaScript">
$(document).ready(function () {
    document.body.style.zoom="67%"
});
</script> -->
</body>
</html>