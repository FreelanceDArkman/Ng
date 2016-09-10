<?php
require_once($main_site ."function/bll_ui.php");
$dataGallery = Gallery();


$countDataHead = count($dataGallery);

$head = $countDataHead/12;



$result  = "";



$result .="<div class=\"container\">";


    if($head >1){
        $result .="<div id=\"externalNav\">";
        for($i =0;$i < $head; $i++){
            $result .="<a href=\"#".($i + 1)."\">Page ".($i + 1)."</a>";
        }
        $result .="</div>";
    }



    $result .="<ul id=\"anythingSlider8\">";

    $result .="<li><div class=\"slider8Set\">";

    for($i =0;$i < $countDataHead; $i++){

        $result .=" <div class=\"shadd\">";
        $result .="<img src=\"assets/img/gallery/".$dataGallery[$i]->picname."\" alt=\"\">";
        $result .="</div>";

        if( ($i + 1)%12 == 0){
            $result .="</div></li>";
            $result .="<li><div class=\"slider8Set\">";
        }

    }





    $result .="</ul>";

$result .="</div>";




echo   $result;
    
?>