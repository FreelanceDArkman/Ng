<?php

require_once("global.php");

function Reader($sourcename){
 	$mainpath = getBaseSite();

	$file =  $mainpath."datasource/".$sourcename.".json";
	//$temp_array = array();
    $temp_array = json_decode(file_get_contents($file));

    

    return $temp_array;
 }

 // function Update($sourcename,$_id,$arrnew){
 //    $data = Reader($sourcename);
    
    
 //    $index;

 //    for($i =0;$i < count($data); $i++){

 //        if(array_search($_id, (array)$data[$i]) == "_id"){
 //            $index = $i;
 //            break;
 //        }
 //    }
 // }

 function UpdateWriteFile($sourcename, $data){
    $mainpath = getBaseSite();
    
    $file =  $mainpath."datasource/".$sourcename.".json";

    // file_put_contents($file, json_encode($data,JSON_PRETTY_PRINT));
    file_put_contents($file, json_encode($data));
 }

function DeletePic ($sourcename, $_id,$path){

    $data = Reader($sourcename);

// var_dump($data);    
    
    // $index = 0;
    $count = count($data);

 if($count > 0){

    
    for($i =0;$i < $count; $i++){

        if(array_search($_id, (array)$data[$i]) == "_id"){
           

            $file = $path.$data[$i]->picname;

            if(file_exists($file)){
                unlink($file);
            }

            unset($data[$i]);

            break;
        }
    }

   // var_dump($data);   

   $data = array_values($data);

   // var_dump($data);   
    
    $mainpath = getBaseSite();
    
    $file =  $mainpath."datasource/".$sourcename.".json";

    file_put_contents($file, json_encode($data,JSON_PRETTY_PRINT));

    
 }
    
  

   
    //file_put_contents($file, json_encode($data,JSON_PRETTY_PRINT));
       
}

function Delete ($sourcename, $_id){

    $data = Reader($sourcename);
    
    
    $index;

    for($i =0;$i < count($data); $i++){

        if(array_search($_id, (array)$data[$i]) == "_id"){
            $index = $i;
            break;
        }
    }

    unset($data[$index]);
    //var_dump($data);
    // foreach ($data as $arr) {
    //     # code...


    //     echo array_search($_id, (array)$arr);
    // }

    // if(($key = array_search($_id, $data)) !== false) {

    //     echo "dd";
    //     unset($data[$key]);
    // }

    // foreach (array_keys($array, 'strawberry') as $key) {
    //     unset($array[$key]);
    // }

    // $ret = 0;

    $mainpath = getBaseSite();
    
    $file =  $mainpath."datasource/".$sourcename.".json";

    // file_put_contents($file, json_encode($data,JSON_PRETTY_PRINT));
    file_put_contents($file, json_encode($data));
       
}

 function Execute($sourcename, $upload_info){

	$ret = 0;

 	$mainpath = getBaseSite();
 	
	$file =  $mainpath."datasource/".$sourcename.".json";



	// echo $file ;

	// $json = array();
	// $json = json_decode(file_get_contents($file),true);

	// $upload_info = array("name" => $name, "username" => $username, "password" => $password, "role" => $role);

	// array_push($json, $jsons);

	// file_put_contents($file, json_encode($upload_info));



	$temp_array = array();
    $temp_array = json_decode(file_get_contents($file));
   
    array_push($temp_array, $upload_info);
    //array_push($temp_array->upload->image, $upload_info);
    // echo json_encode($json, JSON_PRETTY_PRINT);
    // file_put_contents($file, json_encode($temp_array,JSON_PRETTY_PRINT));
    file_put_contents($file, json_encode($temp_array));


//     if(file_exists("upload.json"))
// {
//     $temp_array = array();
//     $temp_array = json_decode(file_get_contents('upload.json'));
//     $upload_info = array('media_name'=>'b','media_category'=>'v','media_info'=>'c','media_location'=>'x','media_artist'=>'z');
//     array_push($temp_array->upload->image, $upload_info);
//     file_put_contents('upload.json', json_encode($temp_array));
// }
// else
// {
//     $upload_info = array();
//     $upload_info['upload']['image'][] = array('media_name'=>'b','media_category'=>'v','media_info'=>'c','media_location'=>'x','media_artist'=>'z');
//     $json = json_encode($upload_info);
//     $file = "upload.json";
//     file_put_contents($file, $json);
// }

	$ret =1;

	return $ret;
 }

function json_pretty($json, $options = array())
{
    $tokens = preg_split('|([\{\}\]\[,])|', $json, -1, PREG_SPLIT_DELIM_CAPTURE);
    $result = '';
    $indent = 0;

    $format = 'txt';

    //$ind = "\t";
    $ind = "    ";

    if (isset($options['format'])) {
        $format = $options['format'];
    }

    switch ($format) {
        case 'html':
            $lineBreak = '<br />';
            $ind = '&nbsp;&nbsp;&nbsp;&nbsp;';
            break;
        default:
        case 'txt':
            $lineBreak = "\n";
            //$ind = "\t";
            $ind = "    ";
            break;
    }

    // override the defined indent setting with the supplied option
    if (isset($options['indent'])) {
        $ind = $options['indent'];
    }

    $inLiteral = false;
    foreach ($tokens as $token) {
        if ($token == '') {
            continue;
        }

        $prefix = str_repeat($ind, $indent);
        if (!$inLiteral && ($token == '{' || $token == '[')) {
            $indent++;
            if (($result != '') && ($result[(strlen($result) - 1)] == $lineBreak)) {
                $result .= $prefix;
            }
            $result .= $token . $lineBreak;
        } elseif (!$inLiteral && ($token == '}' || $token == ']')) {
            $indent--;
            $prefix = str_repeat($ind, $indent);
            $result .= $lineBreak . $prefix . $token;
        } elseif (!$inLiteral && $token == ',') {
            $result .= $token . $lineBreak;
        } else {
            $result .= ( $inLiteral ? '' : $prefix ) . $token;

            // Count # of unescaped double-quotes in token, subtract # of
            // escaped double-quotes and if the result is odd then we are 
            // inside a string literal
            if ((substr_count($token, "\"") - substr_count($token, "\\\"")) % 2 != 0) {
                $inLiteral = !$inLiteral;
            }
        }
    }
    return $result;
}
 
?>