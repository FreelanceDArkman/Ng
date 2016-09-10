
<?php 

//$document_root = $_SERVER['DOCUMENT_ROOT'];

require_once($main_site ."function/JsonDataSource.php");





$data = Reader("pro_content");

usort($data, function($a, $b){

    if($a->status == 0 || $b->status == 0){
        return $a->status < $b->status ? 1 : -1;
    }

    return $a->priority > $b->priority ? 1 : -1;

});

//usort($data, function($a, $b) {
//    // if ($a['priority'] == $b['priority']) {
//    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
//    // }
//
//    return $a->priority > $b->priority ? 1 : -1;
//});
//echo Reader("mainslide")[0]->picname;

// $slide = array();


$result = "<div class=\"table-responsive\" id=\"rate_control_list\">" .
"<form action=\"save_content_byId.php\" method=\"POST\" id=\"save_content\" >".
"<table class=\"table table-striped table-bordered\">" .
"<tbody>" .
"<tr>" .
"<th style=\"text-align:center;width:10%\">Thumpnail</th>" .

"<th style=\"text-align:center;width:60%\">detail</th>" .
"<th style=\"text-align:center;width:15%\">Postdetail</th>" .
"<th style=\"text-align:center;width:5%\">Priolity</th>" .
"<th style=\"text-align:center;width:5%\">Edit</th>" .
"<th style=\"text-align:center;width:5%\">status</th>" .
"<th style=\"text-align:center;width:5%\">Remove</th>" .
"</tr>" ;

	for($i =0;$i < count($data); $i++){
		
		$datesubmit  = new DateTime($data[$i]->date_submit);
		$IsChecked =  ($data[$i]->status == 1? "checked" : "");
		$NoChecked = 	($data[$i]->status == 0? "checked" : "");

		//date("Y-m-d"); format('j M Y')
		$result .="<tr bgcolor=\"#ffffff\" align=\"center\">".
		"<td style=\"text-align:center\"><img src=\"".$virtual_path."assets/img/promotion/".$data[$i]->picname."\" style=\"width:200px\"/><br/>".$data[$i]->picname."</td>" .
		
		"<td style=\"text-align:center\"><strong>".$data[$i]->title."</strong><br/>".$data[$i]->detail."</td>" .
		"<td style=\"text-align:center\">".$data[$i]->poster."<br/>".$datesubmit->format('j M Y h:i A')."</td>" .
		"<td style=\"text-align:center\"><input type=\"checkbox\" name=\"chk_item[]\" value=\"".$data[$i]->_id."\"  style=\"display:none;\" checked=\"checked\" /><input type=\"text\" name=\"pri_main_".$data[$i]->_id."\" style=\"width:50px\" value=\"".$data[$i]->priority."\" /></td>".
		"<td style=\"text-align:center\">".
		// "<form action=\"save_content_byId.php\" enctype=\"multipart/form-data\" method=\"POST\" id=\"form_content_id_".$data[$i]->_id."\" >".
		"<a href=\"#myModal_".$data[$i]->_id."\" role=\"button\" data-toggle=\"modal\"><i class=\"icon-large icon-edit\"></i></a>" .
"<div id=\"myModal_".$data[$i]->_id."\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"display: none;\">" .
"   <div class=\"modal-header\">" .
"   <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>" .
"   <h3 id=\"myModalLabel\">Thank you for visiting EGrappler.com</h3>" .
"   </div>" .

"   <div class=\"modal-body\">" .
"<input  type=\"file\" class=\"span4\" id=\"fileToUpload_content_".$data[$i]->_id."\" name=\"fileToUpload_content_".$data[$i]->_id."\" />".
"<input type=\"text\" style=\"width:300px;\" name=\"content_title_".$data[$i]->_id."\" value=\"".$data[$i]->title."\" />".
 "<textarea  class=\"ckeditor\" cols=\"80\" rows=\"3\" id=\"editor_".$data[$i]->_id."\" name=\"txt_detail_content_".$data[$i]->_id."\" class=\"span12\">".$data[$i]->detail."</textarea>".
" <input type=\"hidden\" name=\"hidden_id_content\"  value=\"".$data[$i]->_id."\"/>    ".
" <input type=\"hidden\" name=\"action\"  value=\"promotion\"/>    ".
"     ".
"     ".                             
"   </div>" .
"   <div class=\"modal-footer\">" .
"   <button class=\"btn\" data-dismiss=\"modal\"  aria-hidden=\"true\">Close</button>" .
"   <button class=\"btn btn-primary\" data-customsave=\"1\"  id=\"".$data[$i]->_id."\" type=\"submit\">Save changes</button>" .
"   </div>" .
"   </div>".
// "</form>".

		"</td>".
		"<td style=\"text-align:center\">".



		"<input type=\"radio\" value=\"1\"  name=\"pro_status_".$data[$i]->_id."\" ".$IsChecked." /> เปิด".
		"<input type=\"radio\" value=\"0\" name=\"pro_status_".$data[$i]->_id."\" ".$NoChecked." /> ปิด".
		"</td>" .
		"<td style=\"text-align:center\">
		<input type=\"checkbox\"  name=\"piclist_del[]\" value=\"".$data[$i]->_id."\" />
		
		</td>" .

		"</tr>" ;
		

	}

$result  .=  "</tbody>" .
"</table>" .
"<div class=\"form-actions\" id=\"condition_manage_save\">" .
"<input type=\"submit\" onclick=\"return confirm('คุณแน่ใจที่จะบันทึกข้อมูลหรือไม่');\" value=\"Save\" name=\"submit_save\" class=\"btn btn-primary\" />&nbsp;" .
"<button  onclick=\"return confirm('คุณแน่ใจที่จะลบข้อมูลทิ้งหรือไม่');\" class=\"btn btn-danger\" name=\"submit_save\"  type=\"submit\"  />Remove</button>" .

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