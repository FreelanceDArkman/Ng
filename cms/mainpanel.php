<?php require("function/staffauthen.php");
require("function/global.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<?php include 'include/navbar.php';?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        
        <!-- /span6 -->
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Control Panel</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a href="home.php" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">หน้าแรก</span> </a>
              <a href="admin_about.php" class="shortcut">
              <i class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">เกี่ยวกับเรา</span> </a>
              <a href="admin_promotion.php" class="shortcut"><i class="shortcut-icon icon-trophy"></i>
              <span class="shortcut-label">โปรโมชั่น</span> </a><a href="admin_menu.php" class="shortcut"> 
              <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">เมนูและบริการของเรา</span> </a>
              <a href="admin_gallery.php" class="shortcut"><i class="shortcut-icon  icon-camera"></i>
              <span class="shortcut-label">บรรยากาศร้าน</span> </a>
              <a href="admin_activity.php" class="shortcut"><i class="shortcut-icon icon-bullhorn"></i>
              <span class="shortcut-label">ข่าวสารและกิจกรรม</span> </a>

<!--            <a href="admin_contact.php" class="shortcut">-->
<!--            <i class="shortcut-icon icon-file"></i><span class="shortcut-label">ติดต่อเรา</span> </a>-->
<!--                  <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i>-->
<!--                      <span class="shortcut-label">Setting</span> </a>-->
   
                  </div>

                                               






              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
          <!-- /widget -->
         
          <!-- /widget --> 
         
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
 
<script src="js/base.js"></script> 
<script type="text/javascript">
  
  $(document).ready(function(){


    $(".main").css("min-height", $(window).height());

  });
</script>
</body>
</html>
