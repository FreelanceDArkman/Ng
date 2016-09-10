<?php require("cms/function/global.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>About3</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/css/anythingslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.min.css" rel="stylesheet">
</head>
<body>


<?php include 'include/header.php';?>
<!-- header end -->

<?php include 'include/topmenu.php';?>



<div id="mainContent" class="sliderBack">
<div class="container">
<div class="column1 pull-left">

<div class="slider1Back">
    <div class="slider1">
        <img src="assets/img/slider1-frame.png" alt="" class="frame1">
        <div class="sliderContent">

            <div class="slider-wrapper">
                <div id="slider1Nivo" class="nivoSlider">
                     <?php include 'include/about_slide_main.php';?>
                </div>
            </div>
        </div>
    </div>
    <!-- slider1 -->
</div>



<h3 class="hdr2"><span class="lft"></span>ประวัติภัตตาคารนางนวล<span class="rt"></span></h3>
<br>
<div class="typo">

  <?php include 'include/abouts-history.php';?>
    <!-- <p class="capitalize">Nam imperdiet faucibus orci ut vestibulum. Cras ut tellus ac leo blandit convallis a vitae odio. Integer molestie varius hendrerit. Ut lacinia eleifend dolor ut luctus. Sed euismod quam
        congue est congue lacinia. Aliquam quam augue, fringilla faucibus consequat vitae, mollis ac nulla. Nunc at urna enim, non mollis mi. Nunc eget magna mauris. Aenean elit ligula, dignissim
        </p>
        <h3>Pellentesque eu metus est, id accumsan leo</h3>
        <p>Quisque cursus libero ante, a pellentesque massa. Vestibulum et dolor ut est tincidunt aliquam. Aliquam nunc velit, ornare eu porta et, volutpat sit amet arcu. Quisque vel risus dolor. Sed blandit, sapien ac tempus faucibus, lectus massa tincidunt tortor, a commodo risus orci gravida tortor.
            </p>

    <br><br>
    <h4>Typography Examples</h4>

    <p class="grey">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>

    <p class="blue">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p> -->


</div>


</div>
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
<script src="assets/js/jquery.anythingslider.min.js"></script>
<script src="assets/js/contact-form.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        // init curved header
        $('.curved').arctext({radius:250, rotate:true, dir:1});


        // slider1 init
        $('#slider1Nivo').nivoSlider({
            effect:'random',
            pauseTime:8000,
            captionEasing:'linear',
            slices: 15, // For slice animations
            boxCols: 8, // For box animations
            boxRows: 4, // For box animations
            animSpeed: 500, // Slide transition speed
            startSlide: 0, // Set starting Slide (0 index)
            directionNav: true, // Next & Prev navigation
            controlNav: true, // 1,2,3... navigation
            controlNavThumbs: false, // Use thumbnails for Control Nav
            pauseOnHover: true, // Stop animation while hovering
            manualAdvance: false, // Force manual transitions
            prevText: 'Prev', // Prev directionNav text
            nextText: 'Next', // Next directionNav text
            randomStart: false, // Start on a random slide
            beforeChange: function(){}, // Triggers before a slide transition
            afterChange: function(){}, // Triggers after a slide transition
            slideshowEnd: function(){}, // Triggers after all slides have been shown
            lastSlide: function(){}, // Triggers when last slide is shown
            afterLoad: function(){} // Triggers when slider has loaded

        });


        // init slider3
        $('#anythingSlider3').anythingSlider({
            autoPlay: true,
            expand: true,
            pauseOnHover: true,
            hashTags: false,
            buildNavigation: false,
            buildStartStop: false,
            delay: 8000
        });


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