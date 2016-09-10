<?php require("cms/function/global.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="Nangnual Pattaya,restaurant seafood
ร้านอาหารนางนวล, ร้านอาหารทะเลพัทยา, ร้านนางนงลอาหารทะเล
ภัตตาคาร, นางนวลพัทยา, ร้านอาหารพัทยา, ร้านนางนวล" />
    <meta name="description" content="Nangnual Pattaya  restaurant seafood
ร้านอาหารนางนวล พัทยา อาหารทะเล" />
    <title>Welcome to the NangNaul Restaurant : Menu and Service</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/css/anythingslider.css" rel="stylesheet">
    <link href="assets/css/lightbox.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.min.css" rel="stylesheet">



    <style type="text/css">

        .hdr4{
            height: 80px !important;
        }
        .slider5 #externalNav a{
            margin-bottom: 10px !important;
        }
        .slider5 .hdr2 {
            margin: 0px 0 38px 0 !important;
        }

        .slider5{
            height: 1350px; !important;
        }
        .cn1 a img{
            width: 74px;
            height: 65px;
        }

        .slider5 .anythingWindow, .slider5 .anythingSlider {
            height: 1150px !important;
        }

        .slider5 {
            width: 100%;
            /*height: 720px;*/
            background: transparent url(assets/img/slider5-bg.png) no-repeat  34px 115px;
            position: relative;
            /*margin-bottom: 25px;*/
        }
    </style>
</head>
<body>

<!-- box9 -->

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
                            <?php include 'include/menufood-slidemain.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
    <!-- container -->
</div>

<div class="oneColumn">
<div class="container">

<h2 class="hdr4">รายการอาหารของเรา</h2>

 <?php include 'include/menufood-menu.php';?>


<!-- container -->

</div>

<?php include 'include/footer.php';?>
<!-- footer -->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.nivo.slider.pack.js"></script>
    <script src="assets/js/jquery.anythingslider.min.js"></script>
    <script src="assets/js/jquery.arctext.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/contact-form.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

        <!-- AnythingSlider initialization -->

        var $s = $('#anythingSlider5'), nav = $('#externalNav a'), updateNav = function (page) {
            nav.removeClass('cur').eq(page).addClass('cur');
        };

        var allpages = $s.find('li').size();
        $('.pagesNr .nr2').append('/'+allpages);

        $s.anythingSlider({
            // If true, builds a list of anchor links to link to each panel
            mode: "vertical",
            autoPlay:false,
            expand: true,
            pauseOnHover:true,
            hashTags:false,
            buildNavigation:false,
            buildStartStop:false,
            delay:8000,

            onInitialized:function (e, slider) {
                updateNav(slider.currentPage - 1);
                $('.pagesNr .nr1').empty().append(slider.targetPage);
            },
            // Callback before slide animates
            onSlideBegin:function (e, slider) {
                updateNav(slider.targetPage - 1);
                $('.pagesNr .nr1').empty().append(slider.targetPage);
            }
        });

        // set up external links
        $('#externalNav a').click(function () {
            // get slide number (ignore the #)
            var slide = $(this).attr('href').substring(1), // get AnythingSlider data object
                slider = $s.data('AnythingSlider');
            if (slide === "play") {
                // toggle slideshow
                slider.startStop(!slider.playing);
                // change link text
                $('a.play').text(slider.playing ? 'Pause' : 'Play');
            } else {
                // go to selected slide
                $s.anythingSlider(slide);
            }
            // prevent link from changing the hash
            return false;
        });


        // init curved header
        $('.curved').arctext({radius:250, rotate:true, dir:1});






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

        // lightbox assign validation
        $('a[data-rel]').each(function() {
            $(this).attr('rel', $(this).data('rel'));
        });

    });

</script>


</body>
</html>