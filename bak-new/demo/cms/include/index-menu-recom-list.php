
<?php 

//$document_root = $_SERVER['DOCUMENT_ROOT'];

require_once($main_site ."function/JsonDataSource.php");





$data = Reader("recom-menu");



usort($data, function($a, $b) {
    // if ($a['priority'] == $b['priority']) {
    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
    // }
  
    return $a->priority > $b->priority ? 1 : -1;
});
//echo Reader("mainslide")[0]->picname;

// $slide = array();


$result = "<div class=\"table-responsive\" id=\"rate_control_list\">" .
"<form action=\"save-priority-picrecom.php\" method=\"post\" >".
"<table class=\"table table-striped table-bordered\">" .
"<tbody>" .
"<tr>" .
"<th style=\"text-align:center\">Thumpnail</th>" .
"<th style=\"text-align:center\">Title</th>" .
"<th style=\"text-align:center\">Detail</th>" .
"<th style=\"text-align:center\">Priolity</th>" .
"<th style=\"text-align:center\">Remove</th>" .
"</tr>" ;

	for($i =0;$i < count($data); $i++){
		
		$result .="<tr bgcolor=\"#ffffff\" align=\"center\">".
		"<td style=\"text-align:center\"><img src=\"".$virtual_path."assets/img/menu/".$data[$i]->picname."\" style=\"width:150px\"/><br/>".$data[$i]->picname."</td>" .
		"<td style=\"text-align:center\"><input type=\"text\" name=\"title_rec_".$data[$i]->_id."\" style=\"width:200px\" value=\"".$data[$i]->title."\" /></td>" .
		"<td style=\"text-align:center\"><textarea  name=\"des_rec_".$data[$i]->_id."\" row=\"3\" >".$data[$i]->short."</textarea><br/><input type=\"text\" name=\"price_rec_".$data[$i]->_id."\" style=\"width:100px;background-color: lightgoldenrodyellow\"  value=\"".$data[$i]->price."\" /></td>" .
		"<td style=\"text-align:center\"><input type=\"checkbox\" name=\"chk_item[]\" value=\"".$data[$i]->_id."\"  style=\"display:none;\" checked=\"checked\" /><input type=\"text\" name=\"pri_rec_".$data[$i]->_id."\" style=\"width:50px\" value=\"".$data[$i]->priority."\" /></td>".
		"<td style=\"text-align:center\">
		<input type=\"checkbox\"  name=\"piclist_del_rec[]\" value=\"".$data[$i]->_id."\" />
		
		</td>" .
		"</tr>" ;
		

	}

$result  .=  "</tbody>" .
"</table>" .
"<div class=\"form-actions\" id=\"condition_manage_save\">" .
"<input type=\"submit\" onclick=\"return confirm('คุณแน่ใจที่จะบันทึกข้อมูลหรือไม่');\" value=\"Save\" class=\"btn btn-primary\" />&nbsp;" .
"<button  onclick=\"return confirm('คุณแน่ใจที่จะลบข้อมูลทิ้งหรือไม่');\" class=\"btn btn-danger\" type=\"submit\"  />Remove</button>" .

"</div>" .
"</form>" .
"</div>";

echo $result;

?>





<!-- <div class="table-responsive" id="rate_control_list">
<table class="table table-striped table-bordered">
<tbody>
<tr>
<th style="text-align:center">Thumpnail</th>
<th style="text-align:center">file name</th>
<th style="text-align:center">Priolity</th>
<th style="text-align:center">Remove</th>
</tr>

<tr bgcolor="#ffffff" align="center"><td>12-Apr-2015<input type="checkbox" value="24_2015-04-12" checked="checked" name="chk_to_insert" style="display:none;"></td>
<td style="text-align:center">Sun</td>
<td class="tier-td-custom"><input type="text" style="min-width:50px;" id="rate_control_price_24_2015-04-12" name="rate_control_price_24_2015-04-12" value=""></td><td></td>
</tr>

</tbody>
</table>
<div class="form-actions" id="condition_manage_save">
<input type="submit" value="Save" class="btn btn-primary">&nbsp;

</div>
</div> -->