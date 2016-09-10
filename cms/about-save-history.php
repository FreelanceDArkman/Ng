<?php 

  require("function/staffauthen.php");
  require("function/JsonDataSource.php");


 
  $datacontent = $_POST['notice_detail'];
    // echo $datacontent . "dd";
  $data = Reader("about-history");
  $new_arr = array();

    for ($i=0; $i < count($data); $i++){

      // $id_sel = $data[$i]->_id;
      // $pri_val = $_POST["pri_".$id_sel.""];

      $base = (array)$data[$i];


        $replacements = array("content" => $datacontent);
        $arr_new_item = array_replace($base, $replacements);

        array_push($new_arr, $arr_new_item);
    }

    // echo $new_arr[0]["content"];

    if(count($new_arr) > 0){
      UpdateWriteFile("about-history",$new_arr);
    }

    header("location:admin_about.php# history");
    // echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
?>
