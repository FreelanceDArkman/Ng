
<?php

require_once($main_site ."function/bll_ui.php");

$data = getPromotionContent();
$result  = "";


$result .= "<div class=\"column2 pull-right\">" ;
$result .=
$result .=   "    <div class=\"box9\">" ;
$result .=   "        <div class=\"top\"></div>" ;
$result .=   "        <div class=\"mid\">" ;
$result .=   "        <h4 class=\"curved\">Book a Table</h4>" ;
$result .=   "        <span class=\"subTitle\">Its worth!</span>" ;


$result .=  "    </div>" ;
$result .=  "    <div class=\"btm\"></div>" ;
$result .=  "    </div>" ;


$result .= "    <div class=\"box2\">" ;

$result .=  "  <p>โปรโมชั่นประจำเดือน</p>  " ;

$result .=    "    </div>" ;
$result .=   "<div class=\"box8\">";
$result .=   "<ul>";






//for($i =0;$i < count($data); $i++) {
//    if($data[$i]->status == 1){
//
//        $datesubmit  = new DateTime($data[$i]->date_submit);
//        $month = $datesubmit->format('n');
//        $temp = "0";
//
//        $result .="<li><a href=\"#\">Janaury 2012</a>";
//        if($month != $temp){
//
//
//            $result .="</li><li>";
//
//        }
//
//        $temp = $month;
////        echo $datesubmit->format('n');
//    }
//
//}



//
//            "<li><a href=\"#\">February 2012</a></li>".
//            "<li><a href=\"#\">March 2012</a></li>".
//            "<li><a href=\"#\">April 2012</a></li>".


$result .=    "</ul>";
$result .=    "</div></div></div>";

echo $result;


//"    <div class=\"box3\">" .
//"        <span class=\"tx1\">New Zealand</span>" .
//"        <span class=\"tx2\">Prawns</span>" .
//
//"        <p><strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suff.</p>" .
//"        <span class=\"tx3\">Only 7.99 $</span>" .
//"    </div>" .
// "    <div class=\"box3\">" .
// "        <span class=\"tx1\">Fryed</span>" .
// "        <span class=\"tx2\">Gilthead</span>" .

// "        <p><strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suff.</p>" .
// "        <span class=\"tx3\">Only 7.99 $</span>" .
// "    </div>" .

// "    <h4 class=\"hdr3\">What people say!</h4>" .

// "    <div class=\"box4\">" .
// "        <div class=\"mCont\">" .
// "            This is my absolute favorite restaurant. Food is always fresh." .
// "            Go on like that!!" .
// "        </div>" .
// "        <div class=\"btm\"></div>" .
// "        <img src=\"assets/img/content/avatar-say1.jpg\" alt=\"\">" .
// "        <span class=\"author\">Floyd, Cramer - Kansas</span>" .

// "        <div class=\"clearfix\"></div>" .

// "        <hr class=\"divider2\">" .
// "    </div>" .





?>