

<?php

require($main_site ."function/bll_ui.php");

$data = getMainSlideer();

$result = "";
for($i =0;$i < count($data); $i++){
		
		$result .=  "<div class=\"slider1Frame\"><img src=\"assets/img/slide/".$data[$i]->picname."\" alt=\"\"></div>" ;

		// $result .="<tr bgcolor=\"#ffffff\" align=\"center\">".
		// "<td style=\"text-align:center\"><img src=\"../../assets/img/slide/".$data[$i]->picname."\" style=\"width:200px\"/></td>" .
		// "<td style=\"text-align:center\">".$data[$i]->picname."</td>" .
		// "<td style=\"text-align:center\"><input type=\"checkbox\" name=\"chk_item[]\" value=\"".$data[$i]->_id."\"  style=\"display:none;\" checked=\"checked\" /><input type=\"text\" name=\"pri_".$data[$i]->_id."\" style=\"width:50px\" value=\"".$data[$i]->priority."\" /></td>".
		// "<td style=\"text-align:center\">
		// <input type=\"checkbox\"  name=\"piclist_del[]\" value=\"".$data[$i]->_id."\" />
		
		// </td>" .
		// "</tr>" ;
		

	}
// $result =  "<div class=\"slider1Frame\">" .
// "                                <img src=\"assets/img/slide/01.jpg\" alt=\"\">" .
// "                            </div>" .
// "                            <div class=\"slider1Frame\">" .
// "                                <img src=\"assets/img/content/slider_big_02.jpg\" alt=\"\">" .
// "                            </div>" .
// "                            <div class=\"slider1Frame\">" .
// "                                <img src=\"assets/img/content/slider_big_03.jpg\" alt=\"\">" .
// "                            </div>" .
// "                            <div class=\"slider1Frame\">" .
// "                                <img src=\"assets/img/content/slider_big_04.jpg\" alt=\"\">" .
// "                            </div>";
echo $result;
?>