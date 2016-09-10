<?php require("cms/function/global.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--      <meta name="robots" content="index, follow" />-->
  <meta name="keywords" content="Nangnual Pattaya,restaurant seafood
ร้านอาหารนางนวล, ร้านอาหารทะเลพัทยา, ร้านนางนงลอาหารทะเล
ภัตตาคาร, นางนวลพัทยา, ร้านอาหารพัทยา, ร้านนางนวล" />
  <meta name="description" content="Nangnual Pattaya  restaurant seafood
ร้านอาหารนางนวล พัทยา อาหารทะเล" />

    <title>Welcome to the NangNaul Restaurant</title>

    
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/css/anythingslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
<!--    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />-->
    <link href="assets/css/main.min.css" rel="stylesheet">

    <!--[if lte IE 8]>
    <style>
        .slider6 .ribTxt span{
            -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=0.70710678, M21=-0.70710678, M22=0.70710678,sizingMethod='auto expand')";
            color: #fff;
        }
        .slider6 , .ribTxt
        { top: -37px; left: 15px; }


    </style>
    <![endif]-->

    <style type="text/css">
        .slider7 .tx1{
            padding-bottom: 8px !important;

        }
        .slider7 p {
            line-height: 15px !important;
            font-size: 16px !important;
        }
        .slider7 .tx2{
            padding-top: 8px;
            font-size: 14px !important;
        }
        .setSlider7{
            padding-top: 30px;
        }
    </style>
</head>
<body>

<!-- box9 -->
<div class="topBar">
    <div class="backg"></div>
    <a href="#" class="bookTable">Book a table</a>
</div>


<?php include 'include/header.php';?>
<!-- header end -->


<?php include 'include/topmenu.php';?>



<div id="mainContent" class="fullWidth">

    <div class="slider6Back">
        <div class="container">
            <div class="slider6">
              <!--   <div class="ribTxt"><span>NEW OPENING</span></div> -->
                <img src="assets/img/slider6-frame.png" alt="" class="frame1">

                <div class="sliderContent">

                    <div class="slider-wrapper">
                        <div id="slider6Nivo" class="nivoSlider">
                            <?php include 'include/index-slidemain.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>

    <div class="container">


        <h3 class="hdr2" style="margin-top: 0;"><span class="lft"></span>สดจากนางนวล<span class="rt"></span></h3>
        <div class="full">

            <?php include 'include/index-noticfication.php';?>
        </div>


       
        


    </div>
    <h2 class="hdr4-custom"></h2>
    <!-- container -->
<!--    <h3 class="hdr2"><span class="lft"></span>We recommend this one!<span class="rt"></span></h3>-->
    <div class="slider7Back">
        <div class="container">
            <div class="slider7">
                <ul id="anythingSlider7">
                    <?php include 'include/index-slid-recom-menu.php';?>
                </ul>

<!--                <a href="4_menucard1.html" class="link1">OPEN MENIUCARD</a>-->
            </div>
            <!-- slider7 -->
        </div>
    </div>





</div>
<!-- mainContent -->

<?php include 'include/footer.php';?>
<!-- footer -->

<script src="assets/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nivo.slider.pack.js"></script>
<script src="assets/js/jquery.arctext.js"></script>
<script src="assets/js/jquery.anythingslider.min.js"></script>
<script src="assets/js/jQueryRotateCompressed.2.2.js"></script>
<script src="assets/js/contact-form.js"></script>



<script type="text/javascript">

    $(document).ready(function () {

        // rotate text
        $(".slider6 .ribTxt span").rotate({angle:-45});

        // init curved header
        $('.curved').arctext({radius:250, rotate:true, dir:1});


        // slider6 init
        $('#slider6Nivo').nivoSlider({
            effect:'random',
            pauseTime:8000,
            captionEasing:'linear',
            slices:15, // For slice animations
            boxCols:8, // For box animations
            boxRows:4, // For box animations
            animSpeed:500, // Slide transition speed
            startSlide:0, // Set starting Slide (0 index)
            directionNav:true, // Next & Prev navigation
            controlNav:true, // 1,2,3... navigation
            controlNavThumbs:false, // Use thumbnails for Control Nav
            pauseOnHover:true, // Stop animation while hovering
            manualAdvance:false, // Force manual transitions
            prevText:'Prev', // Prev directionNav text
            nextText:'Next', // Next directionNav text
            randomStart:false, // Start on a random slide
            beforeChange:function () {
            }, // Triggers before a slide transition
            afterChange:function () {
            }, // Triggers after a slide transition
            slideshowEnd:function () {
            }, // Triggers after all slides have been shown
            lastSlide:function () {
            }, // Triggers when last slide is shown
            afterLoad:function () {
            } // Triggers when slider has loaded

        });

        $('.nivo-controlNav').prepend("<div class='lft'></div>");
        $('.nivo-controlNav').append("<div class='rt'></div>");
        $('.nivo-controlNav a').wrapAll("<div class='mid'>");
        $('.nivo-controlNav div').wrapAll("<div class='navCent'>");



        //slider7 init
        $('#anythingSlider7').anythingSlider({
            autoPlay: false,
            expand: true,
            pauseOnHover: true,
            hashTags: false,
            buildNavigation: false,
            buildStartStop: false,
            delay: 8000
        });

        // show book a table on click
        $(".ipad-box9").hide();

        $(".bookTable").click(function(){
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