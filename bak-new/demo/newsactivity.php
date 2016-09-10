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


<div class="column2 pull-right">

    <div class="box9">
        <div class="top"></div>
        <div class="mid">
        <h4 class="curved">Book a Table</h4>
        <span class="subTitle">Its worth!</span>

       
        <!-- mCont -->
    </div>
    <div class="btm"></div>
    </div>
    <!-- box9 -->

    <div class="box1">
        <div class="top"></div>
        <div class="mid">
            <h4 class="curved">Weekly Special</h4>
            <span class="subTitle">Dont Miss them!</span>

            <div class="mCont">

                <h5><span>16.05.2012</span> Lobster Monday</h5>

                <p>There are many variations of passages of Lorem Ipsum available, but</p>
                <a href="#">Read More</a>

                <div class="clearfix"></div>

                <h5><span>16.05.2012</span> Lobster Monday</h5>

                <p>There are many variations of passages of Lorem Ipsum available, but</p>
                <a href="#">Read More</a>

                <div class="clearfix"></div>

            </div>
            <!-- mCont -->

        </div>
        <div class="btm"></div>
    </div>
    <!-- box1 -->

    <div class="box2">
        Fresh from<br>
        the Boat
    </div>

    <div class="box8">
        <h4 class="hdr6">Categories</h4>
        <ul>
            <li><a href="#">From The Sea</a></li>
            <li><a href="#">Holidays</a></li>
            <li><a href="#">Premium members</a></li>
            <li><a href="#">Entertainment</a></li>
            <li><a href="#">Events</a></li>
        </ul>

        <hr class="divider5">
        <h4 class="hdr6">Recent news</h4>
        <ul>
            <li><a href="#">We have a new Sous Chef</a></li>
            <li><a href="#">Kim Sei Chong joine the team</a></li>
            <li><a href="#">Template soon ready</a></li>
        </ul>

        <hr class="divider5">
        <h4 class="hdr6">Archives</h4>
        <ul>
            <li><a href="#">Janaury 2012</a></li>
            <li><a href="#">February 2012</a></li>
            <li><a href="#">March 2012</a></li>
            <li><a href="#">April 2012</a></li>
        </ul>

        <hr class="divider5">
        <h4 class="hdr6">Links</h4>
        <ul>
            <li><a href="#">Friends</a></li>
            <li><a href="#">Retailer</a></li>
            <li><a href="#">Sponsors</a></li>
            <li><a href="#">Magazines</a></li>
        </ul>

        <hr class="divider5">
    </div>

    <h4 class="hdr3">What people say!</h4>

    <div class="box4">
        <div class="mCont">
            This is my absolute favorite restaurant. Food is always fresh.
            Go on like that!!
        </div>
        <div class="btm"></div>
        <img src="assets/img/content/avatar-say1.jpg" alt="">
        <span class="author">Floyd, Cramer - Kansas</span>

        <div class="clearfix"></div>

        <hr class="divider2">
    </div>

</div>
<!-- column2 -->

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