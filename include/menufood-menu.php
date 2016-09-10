<?php
require_once($main_site ."function/bll_ui.php");
$datahead = getMenuhead();
    $result  = "";
    $rethead = "";
    $resultMenu = "";

        $rethead =  "<div class=\"slider5\">" ;
        $rethead .="<div id=\"externalNav\">";
            for($i =0;$i < count($datahead); $i++){
                $rethead .="<a href=\"#".($i + 1)."\">".$datahead[$i]->title."</a>" ;
            }

        $rethead .="</div>" ;
$resultMenu .="<h3 class=\"hdr2\"><span class=\"lft\"></span><span class=\"rt\"></span></h3>";
$result .= $rethead;

$datamenu = getMenuList();

$resultMenu .= "<ul id=\"anythingSlider5\">" ;

$countDataHead = count($datahead);
            for($i =0;$i < $countDataHead; $i++){

                $resultMenu .="<li>";

                $resultMenu .= "<div class=\"slider5Set\">";


                $resultroop = "";
                $retItem1 = "";
                $retItem2 = "";
                $countDatamenu = count($datamenu);
                $ItemCount= 1;
                for($y =0;$y < $countDatamenu ; $y++){



                        if( $datahead[$i]->_id == $datamenu[$y]->head_id){





                            if(($ItemCount % 2) != 0){
                                $retItem1 .="<div class=\"cn1\">" ;
                                $retItem1 .="<a href=\"assets/img/menulist/".$datamenu[$y]->picname."\" data-rel=\"lightbox\" ><img src=\"assets/img/menulist/".$datamenu[$y]->picname."\" alt=\"\"></a>" ;
                                $retItem1 .="</div>";
                                $retItem1 .="<div class=\"cn2\">";
                                $retItem1 .="<span class=\"tx1\">".$datamenu[$y]->title."</span>";
                                $retItem1 .="<span class=\"tx2\">".$datamenu[$y]->price."</span>";

                                $retItem1 .="<p>".$datamenu[$y]->short."</p>";
                                $retItem1 .="</div>";
                                $retItem1 .="<div class=\"clearfix\"></div>";
                                $retItem1 .=  "<hr class=\"divider3\">";
//                                if(($y +1) != $countDatamenu){
//
//                                }

                            }



                            if(($ItemCount % 2) == 0){
                                 $retItem2 .="<div class=\"cn1\">" ;
                                 $retItem2 .="<a href=\"assets/img/menulist/".$datamenu[$y]->picname."\" data-rel=\"lightbox\" ><img src=\"assets/img/menulist/".$datamenu[$y]->picname."\" alt=\"\"></a>" ;
                                 $retItem2 .="</div>";
                                 $retItem2 .="<div class=\"cn2\">";
                                 $retItem2 .="<span class=\"tx1\">".$datamenu[$y]->title."</span>";
                                 $retItem2 .="<span class=\"tx2\">".$datamenu[$y]->price."</span>";
                                 $retItem2 .="<p>".$datamenu[$y]->short."</p>";
                                 $retItem2 .="</div>";
                                 $retItem2 .="<div class=\"clearfix\"></div>";

                                $retItem2 .=  "<hr class=\"divider3\">";
//                                if(($y +1) != $countDatamenu){
//
//                                }

                            }

                            $ItemCount= $ItemCount + 1;

                        }
                }
                $resultroop .="<div class=\"half1\">";
                $resultroop .= $retItem1;
                $resultroop .="</div>";
                $resultroop .="<div class=\"half2\">";
                $resultroop .= $retItem2;
                $resultroop .="</div>";

                $resultMenu .= $resultroop;
                $resultMenu .="</div>";
                $resultMenu .="</li>";
            }
$resultMenu .= "</ul>";
$resultMenu .= "<div class=\"pagesNr\">";
 $resultMenu .= "<span class=\"nr1\"></span><span class=\"nr2\"></span>";
$resultMenu .= "</div>";
$resultMenu .= "</div>";
$result .= $resultMenu;

echo   $result;
    
?>