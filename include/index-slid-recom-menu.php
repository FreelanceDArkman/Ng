
<?php

require_once($main_site ."function/bll_ui.php");

$data = getRecommenu();

$result = "";
//$result .= "<li><div class=\"setSlider7\">";

for($i =0;$i < count($data); $i++){


//    echo $i%3;
    if($i == 0){
        $result .= "<li><div class=\"setSlider7\">";
    }else{
        if($i%3 == 0){
            $result .= "</div></li>";
            $result .= "<li><div class=\"setSlider7\">";
        }
    }




    $result .= "<div class=\"third\">" .
    "<div class=\"mrgThird\">" .
    "<div class=\"shadd\">" .
    "<img src=\"assets/img/menu/".$data[$i]->picname."\" alt=\"\">" .
    "</div>" .
    "<span class=\"tx1\">".$data[$i]->title."</span>" ;

        if($data[$i]->short != ""){
            $result .=   "<p>".$data[$i]->short."</p>" ;
        }


        if($data[$i]->price != ""){
            $result .= "<span class=\"tx2\"> ".$data[$i]->price." </span>";
    }

    $result .= "</div>" .
    "</div>" ;




//    $result .= "<li><img src=\"assets/img/menu/".$data[$i]->picname."\" alt=\"\"><span>".$data[$i]->title."</span></li>";
 

  }


echo $result;
?>
 