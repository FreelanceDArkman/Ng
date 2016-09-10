<?php

require_once("function/staffauthen.php");
require("function/JsonDataSource.php");

		

		  if(!isset($_POST['piclist_del'])) 
		  {

		  

		  	//$chk_update_pri = $_POST['chk_item'];
		  	$data = Reader("gallery");



		  	//echo $data;

		 //  	$base = array("orange", "banana", "apple", "raspberry");
			// $replacements = array(0 => "pineapple", 4 => "cherry");
			// $replacements2 = array(0 => "grape");

			// $basket = array_replace($base, $replacements, $replacements2);

  			$new_arr = array();
		  	for ($i=0; $i < count($data); $i++){

		  		$id_sel = $data[$i]->_id;
		  		$item = "pri_main_".$id_sel;
		  		
		  		
		  		if(isset($_POST[$item]) ){
		  			$pri_val = $_POST[$item];

		  		$base = (array)$data[$i];
	            $replacements = array("priority" => $pri_val);
	            $arr_new_item = array_replace($base, $replacements);

	            array_push($new_arr, $arr_new_item);
		  		}
		  		
		  	}
		
		  	// for($i=0; $i < count($chk_update_pri); $i++){

		  	// 	$id_sel = $chk_update_pri[$i];

		  	// 	if(array_search($id_sel, (array)$data[$i]) == "_id"){
		            
		  	// 		echo $id_sel;

		   //          $pri_val = $_POST["pri_".$id_sel.""];
		            
		   //          $base = (array)$data[$i];
		   //          $replacements = array("priority" => $pri_val);
		   //          $arr_new_item = array_replace($base, $replacements);

		   //          array_push($new_arr, $arr_new_item);

		           
		   //      }
		  	// }


		  	if(count($new_arr) > 0){
		  			UpdateWriteFile("gallery",$new_arr);
		  	}
		  	
		  


		  	// for($i =0;$i < count($data); $i++){


		   //  }

		  	// $upload_info = array("_id"=> $id,"picname" => $PicFile, "priority" => $priority);
			} 
		  else
		  {
		  	$chkDel = $_POST['piclist_del'];
		    $N = count($chkDel);

		     $path = getBaseUrl() . "assets/img/gallery/";

		    //echo("You selected $N door(s): ");
		    for($i=0; $i < $N; $i++)
		    {
		    	 DeletePic("gallery",$chkDel[$i],$path);
		      
		    }
		}

		// header("location:" . $_SERVER['HTTP_REFERER']);
		header("location:admin_gallery.php");

    // function IsChecked($chkname,$value)
    // {
    //     if(!empty($_POST[$chkname]))
    //     {
    //         foreach($_POST[$chkname] as $chkval)
    //         {
    //             if($chkval == $value)
    //             {
    //                 return true;
    //             }
    //         }
    //     }
    //     return false;
    // }



?>