<?php

require("function/staffauthen.php");
require("function/global.php");
require_once("function/JsonDataSource.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Account - Bootstrap Admin Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">



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

                <div class="span12">

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>หน้าแรก</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#slide-mini" data-toggle="tab">รูปสไลด์</a>
                                    </li>
                                    <li  ><a href="#head" data-toggle="tab">หัวข้อเมนู</a></li>
                                    <li  ><a href="#mune-item" data-toggle="tab">รายการเมนู</a></li>
                                </ul>

                            </div>

                            <br>

                            <div class="tab-content">
                                <div class="tab-pane  active" id="slide-mini">

                                    <form id="Upload" action="upload_menufood.php" enctype="multipart/form-data" method="post">
                                        <div class="widget">
                                            <div class="widget-header">
                                                <i class="icon-list-alt"></i>
                                                <h3>Picture Box</h3>
                                            </div>
                                            <div class="widget-content" id="holiday_insert_box">
                                                <div class="row-fluid stats-box block-margin">
                                                    <div class="span4">
                                                        <div class="control-group">
                                                            <label class="control-label" for="holiday_title">เลือกไฟล์รูปภาพ [ขนาดรูปภาพ 884 * 279 px]</label>
                                                            <div class="controls">
                                                                <input id="fileToUpload" type="file" class="span4" name="fileToUpload" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">

                                                        <div class="control-group">

                                                            <div class="controls">
                                                                <input type="submit" onclick="return CheckFileUPload('fileToUpload');" style="margin-top:21px;" class="btn btn-primary" value="Save" />
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>


                                    <div class="widget">
                                        <div class="widget-header">
                                            <i class="icon-list-alt"></i>
                                            <h3>รายการรูปภาพ</h3>
                                        </div>
                                        <div class="widget-content">
                                            <?php include 'include/menu-pic-list.php';?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="head">
                                    <form id="Upload" action="menu-head-save.php" enctype="multipart/form-data" method="post">
                                        <div class="widget">
                                            <div class="widget-header">
                                                <i class="icon-list-alt"></i>
                                                <h3>หัวข้อเมนู</h3>
                                            </div>
                                            <div class="widget-content" id="holiday_insert_box">
                                                <div class="row-fluid stats-box block-margin">
                                                    <div class="span4">
                                                        <div class="control-group">
                                                            <label class="control-label" for="holiday_title">กรุณาใส่หัวช้อเมนู</label>
                                                            <div class="controls">
                                                                <input type="text" name="txt_head_menu" id="txt_head_menu"/>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">

                                                        <div class="control-group">

                                                            <div class="controls">
                                                                <input type="submit" onclick="return CheckInputtxt('txt_head_menu');" style="margin-top:21px;" class="btn btn-primary" value="Save" />
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>


                                    <div class="widget">
                                        <div class="widget-header">
                                            <i class="icon-list-alt"></i>
                                            <h3>รายการรูปภาพ</h3>
                                        </div>
                                        <div class="widget-content">
                                            <?php include 'include/menu-head-list.php';?>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="mune-item">
                                    <form id="Upload" action="upload-menu.php" enctype="multipart/form-data" method="post">
                                        <div class="widget">
                                            <div class="widget-header">
                                                <i class="icon-list-alt"></i>
                                                <h3>รายการเมนู</h3>
                                            </div>
                                            <div class="widget-content" id="holiday_insert_box">
                                                <div class="row-fluid stats-box block-margin">
                                                    <div class="span4">
                                                        <div class="control-group">
                                                            <label class="control-label" for="holiday_title">เลือกหัวข้อเมนู</label>
                                                            <div class="controls">
                                                                <select name="sel_head_menu">
                                                                    <?php
                                                                    $data = Reader("menufood-top-menu");
                                                                    $result = "";
                                                                    for($i =0;$i < count($data); $i++){
                                                                        $result.= "<option value=\"".$data[$i]->_id."\">".$data[$i]->title."</option>";
                                                                    }
                                                                    echo $result;
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="holiday_title">รายการเมนู [ขนาดรูปภาพ 200 * 177 px]</label>
                                                            <div class="controls">
                                                                <input id="fileToUpload2" type="file" class="span4" name="fileToUpload"  />
                                                                <input type="text" class="span4" name="title_menu" style="width:300px;" placeholder="ชื่ออาหาร" />
                                                                <input type="text" class="span4" name="price_menu" style="width:300px;" placeholder="ราคา" />
                                                                <textarea row="3" name="detail_menu" placeholder="รายละเอียด" style="width:300px;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">

                                                        <div class="control-group">

                                                            <div class="controls">
                                                                <input type="submit" onclick="return CheckFileUPload('fileToUpload2');" style="margin-top:21px;" class="btn btn-primary" value="Save" />
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                    <div class="widget">
                                        <div class="widget-header">
                                            <i class="icon-list-alt"></i>
                                            <h3>รายการรูปภาพ</h3>
                                        </div>
                                        <div class="widget-content">


                                            <form action="save-menu.php" method="post" >
                                            <div class="control-group">
                                                <label class="control-label" for="holiday_title">เลือกหัวข้อเมนู เพื่อแสดงรายการ</label>
                                                <div class="controls">

                                                    <select name="sel_head_menu_show" onchange="valueselect(this);">
                                                        <?php
                                                        $data = Reader("menufood-top-menu");
                                                        $result = "";

                                                        $selected= "";
                                                        if(isset($_GET["selected"])){

                                                            $selected =$_GET['selected'];
                                                        }
                                                        for($i =0;$i < count($data); $i++){

                                                            $sel = "";
                                                            if($data[$i]->_id == $selected ){
                                                                $sel = "selected=\"selected\"";
                                                            }
                                                            $result.= "<option value=\"".$data[$i]->_id."\" ".$sel.">".$data[$i]->title."</option>";
                                                        }
                                                        echo $result;
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <?php include 'include/menulist.php';?>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>





                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->



                </div> <!-- /span8 -->




            </div> <!-- /row -->



        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->






<div class="footer">

    <div class="footer-inner">

        <div class="container">

            <div class="row">

                <div class="span12">
                    &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>.
                </div> <!-- /span12 -->

            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /footer-inner -->

</div> <!-- /footer -->



<script src="js/jquery-1.7.2.min.js"></script>
<!-- <script src="js/adapters/jquery.js"></script> -->
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="js/ckeditor.js"></script>
<script src="js/ckeditor-custom.js"></script>
<script src="js/darkman.js"></script>
<script>
    function valueselect(myval)
    {
        window.location.href = "admin_menu.php?selected="+myval.value + "# mune-item";
    }

</script>
</body>

</html>
