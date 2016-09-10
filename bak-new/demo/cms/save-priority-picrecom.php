<?php

require("function/JsonDataSource.php");

		$basename = "recom-menu";

		  if(!isset($_POST['piclist_del_rec']))
		  {


		  	// echo $_POST['chk_item'];
		  	//$chk_update_pri = $_POST['chk_item'];
		  	$data = Reader($basename);



  			$new_arr = array();
		  	for ($i=0; $i < count($data); $i++){

		  		$id_sel = $data[$i]->_id;
		  		$item = "pri_rec_".$id_sel;
		  		$title = "title_rec_". $id_sel;
                $detail = "des_rec_". $id_sel;
                $price = "price_rec_". $id_sel;


		  		// echo $_POST[$item] . "---" .$_POST[$title] ;
	  			if(isset($_POST[$item]) && isset($_POST[$title])){


	  				$pri_val = $_POST[$item];
					$title_val = $_POST[$title];
                    $detail_val =  $_POST[$detail];
                    $price_val = $_POST[$price];
			  		$base = (array)$data[$i];
		            $replacements = array("priority" => $pri_val, "title" => $title_val, "short" =>$detail_val, "price" =>$price_val );
		            $arr_new_item = array_replace($base, $replacements);

		            array_push($new_arr, $arr_new_item);
	  			}

		  	}


		  	if(count($new_arr) > 0){
		  			UpdateWriteFile($basename,$new_arr);
		  	}




			}
		  else
		  {
		  	$chkDel = $_POST['piclist_del_rec'];
		    $N = count($chkDel);

			 $path = getBaseUrl() . "assets/img/menu/";

		    //echo("You selected $N door(s): ");
		    for($i=0; $i < $N; $i++)
		    {

		    	 DeletePic($basename,$chkDel[$i],$path);

		    }
		}

		// header("location:" . $_SERVER['HTTP_REFERER']);
		header("location:home.php# menucontrol");

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