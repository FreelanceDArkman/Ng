<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>6Contact</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.min.css" rel="stylesheet">
</head>
<body>
<?php include 'include/header.php';?>
<!-- header end -->

<?php include 'include/topmenu.php';?>
<!-- box9 -->



<div id="mainContent">
<div class="container">
<div class="column1 pull-left">

<div class="box6">

    <img src="assets/img/content/contact1-photo.jpg" alt="">
    <p>
        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
    </p>

</div>



<h2 class="hdr1">Get & stay in contact</h2>

<h3 class="hdr2"><span class="lft"></span>We would like to hear from you<span class="rt"></span></h3>

<h4 class="hdr5">Seafresh Restaurant</h4>

<div class="box7">
    <div class="cn1">
        <form id="contactForm" action="contact_thankyou.php" method="post">
            <fieldset>
                <label>Name</label>
                <input type="text" name="mail_name" >
                <label>E-mail</label>
                <input type="text" data-type="email" name="mail_email">

                <label>Your Message</label>
               <textarea name="mail_detail"></textarea>
            </fieldset>
            <input type="submit" value="submit" id="sendIt">
        </form>
    </div>
    <div class="cn2">
        <p>
        <strong>Tel:</strong> +49-(0)40 -73 442 190<br>
        <strong>Fax:</strong> +49-(0)40 -73 442 190<br>
        <a href="mailto:sayhello@seafresh.com">sayhello@seafresh.com</a><br><br>
        <strong>Adress:</strong><br>
        Seafresh Restaurant<br>
        Your Strett 123<br>
        22234 Your City
        </p>


    </div>
    <div class="cn3">
        <p><strong>CEO:</strong><br>
        Robert Plant<br><br><br>

        <strong>CO CEO:</strong><br>
        Frank Joseph
        </p>
    </div>
    <div class="cn4">
        <a href="#"><img src="assets/img/content/map2.jpg" alt=""></a>
    </div>
    <div class="clearfix"></div>


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
<script src="assets/js/jquery.arctext.js"></script>
<!--<script src="assets/js/contact-form.js"></script>-->


<script type="text/javascript">

    function check mailform(){

    }

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

        /*** validate Book a Table ***/
        $('form#bkForm input, textarea').blur(function () {
            var $e = $(this);
            var error = false;
            if ($e.val() == '') {
                error = true;
            }
            if ($e.data('type') == 'email') {
                var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
                var email = $e.val().replace('#', '@');

                if (!reg.test(email)) {
                    error = true;
                }
            }

            error ? $e.addClass('error') : $e.removeClass('error');

            return true;

        });

        $('form#bkForm').submit(function () {
            $(this).find('input, textarea').trigger('blur');
            var errors = $(this).find('.error').length;

            /*** no errors - submit form ***/
            return errors == 0;
        });



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