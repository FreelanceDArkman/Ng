<?php

require($main_site ."function/bll_ui.php");

$data = getActivityContent();

$result = "";

for($i =0;$i < count($data); $i++) {


    if($data[$i]->status == 1){
//$datesubmit->format('j M Y h:i A')
        $datesubmit  = new DateTime($data[$i]->date_submit);
        $result ="<div class=\"blogContent\">" .
            "    <div class=\"blogTitle\">" .
            "        <h2>".$data[$i]->title."</h2>" .
            "        <span class=\"category\">posted by: ".$data[$i]->poster."</span>" .

            "        <div class=\"clearfix\"></div>" .
            "        <div class=\"dates\">" .
            "            <span class=\"data1\">".$datesubmit->format('j.m.y')."</span>" .
            "            <span class=\"data2\">".$data[$i]->priority."</span>" .
            "        </div>" .
            "    </div>" .

            "    <img src=\"assets/img/activity/".$data[$i]->picname."\" alt=\"\">" .

            "    <p>".$data[$i]->detail."</p>" .



            "<hr class=\"divider4\">" .
            "</div>";
    }







}

// $data = getPromotionContent();

// $result = "";
// for($i =0;$i < count($data); $i++){}



echo $result;


?>

