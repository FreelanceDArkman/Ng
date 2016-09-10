<?php require("cms/function/global.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>7Blog</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.min.css" rel="stylesheet">
</head>
<body>

<div class="topBar"><div class="backg"></div><a href="#" class="bookTable">Book a table</a></div>

<?php include 'include/header.php';?>
<!-- header end -->

<?php include 'include/topmenu.php';?>


<div class="iphoneHeadline">
    <h1><span class="lft"></span>BLOG<span class="rt"></span></h1>
    <span class="ln2">Always be informed</span>
    <span class="ln3">INTRODUCING EN MASSE SOMETHING EXHILIRATING, SOMETHING
    SPECTACULAR </span>
</div>


<div id="mainContent">
<div class="container">
<div class="column1 pull-left">

<br><br>


<?php include 'include/activity_content.php';?>







</div>

    <!-- sidebar -->
<?php include 'include/sidebar.php';?>

<div class="clearfix"></div>
</div>
<!-- container -->
</div>


<?php include 'include/footer.php';?>
<!-- footer -->


<script src="assets/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nivo.slider.pack.js"></script>
<script src="assets/js/jquery.arctext.js"></script>
<script src="assets/js/contact-form.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        // init curved header
        $('.curved').arctext({radius:250, rotate:true, dir:1});

        // show book a table on click
        $(".box9").hide();

        $("#bkTable").click(function(){
            $(".box9").fadeToggle();

            return false;
        })

        // slide and show iphone book a table box on click
         $(".ipad-box9").hide();

        $(".topBar .bookTable").click(function(){
            $(".ipad-box9").slideToggle();
            return false;
        })

    // show submenu on click

    $("ul.mainMenu li.subMenu ul").hide();

    $("ul.mainMenu li.subMenu > a").click(function () {
        $("ul.mainMenu li.subMenu ul").hide();
        $(this).next('ul').toggle();

        return false;
      });

    // hide submenu when click outside menu container
    $("body").click(function() {
        $("ul.mainMenu li.subMenu ul").hide();
    });



    });

</script>


</body>
</html>