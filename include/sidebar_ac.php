
<?php

require_once($main_site ."function/bll_ui.php");

$data = getActivityContent();
$result = "<div class=\"column2 pull-right\">" .

"    <div class=\"box9\">" .
"        <div class=\"top\"></div>" .
"        <div class=\"mid\">" .
"        <h4 class=\"curved\">Book a Table</h4>" .
"        <span class=\"subTitle\">Its worth!</span>" .

       
"    </div>" .
"    <div class=\"btm\"></div>" .
"    </div>" .


"    <div class=\"box2\">" .

"  <p>กิจกรรมประจำเดือน</p>  " .
// "        the Boat" .
"    </div>" .
    "<div class=\"box8\">".
   "<ul>";

$arrayMonth = array("Janaury","February","March","April","May","June","July","August","September","October","November","December");
$temp = "0";
    for($i =0;$i < count($data); $i++) {
    if($data[$i]->status == 1){

        $datesubmit  = new DateTime($data[$i]->date_submit);
        $month = $datesubmit->format('n');


        $intMonth =intval($month)-1;



        if($month != $temp){


            $result .= "<li><a href=\"#\">".$arrayMonth[$intMonth].", " .$datesubmit->format('Y')." </a></li>";

        }

        $temp = $month;
//        echo $datesubmit->format('n');
    }

}


$result .=  "</ul>";
$result .=    "</div>";






echo $result;
?>