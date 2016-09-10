<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("function/staffauthen.php");
require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");
//echo $_POST["hidden_id_content"];
 // echo $_FILES["fileToUpload"]["tmp_name"] 
// echo $_GET["id"];


$id = $_POST["hidden_id_content"];

$action = $_POST["action"];

$title = "content_title_" . $id;
$detail = "txt_detail_content_" . $id;
$fileUpload = "file";

$sourcename = "pro_content";
$pathimage = "promotion";
$pageredirect = "admin_promotion.php";

if($action == "activity"){
    $sourcename = "activity_content";
    $pathimage = "activity";
    $pageredirect = "admin_activity.php";
}



$comp = 0;

$data = Reader($sourcename);
$priority = count($data) + 1;
$id_identity = date("YmdHisu");
$PicFile = "pic_" . $id .".jpg";






        if(!isset($_POST['piclist_del']))
        {
            $data = Reader($sourcename);
//            $submitval = $_POST["submit_save"];
                if(isset($_POST["submit_save"])){

                // Update Prioity or Status

                    $new_arr = array();
                    for ($i=0; $i < count($data); $i++){

                        $id_sel = $data[$i]->_id;
                        $item = "pri_main_".$id_sel;
                        $title = "content_title_". $id_sel;
                        $radiostatus = "pro_status_" . $id_sel;
//                        = 0;
//                        if( == "1"){
//                            $chked = 1;
//                        }
                        // echo $_POST[$item] . "---" .$_POST[$title] ;
                        if(isset($_POST[$item]) && isset($_POST[$radiostatus])){
                            $chked =  $_POST[$radiostatus];

                            $pri_val = $_POST[$item];
                            $title_val = $_POST[$title];
                            $base = (array)$data[$i];
                            $replacements = array("priority" => $pri_val, "status" => $chked);
                            $arr_new_item = array_replace($base, $replacements);

                            array_push($new_arr, $arr_new_item);
                        }

                    }


                    if(count($new_arr) > 0){
                        UpdateWriteFile($sourcename,$new_arr);
                    }

                    header("location:" .  $pageredirect);


                }else{
// Update By Id
                    $txtdetailReal = $_POST["txtdetail"];
                    $txtDetail = $_POST[$detail];
                    $txttitle = $_POST[$title];
                    $count = count($data);

                    if($count > 0) {


                        for ($i = 0; $i < $count; $i++) {

                            if (array_search($id, (array)$data[$i]) == "_id") {

                                    $data[$i]->title = trim(urldecode($txttitle));
                                    $data[$i]->detail = $txtdetailReal;


                                break;
                            }
                        }

                        // var_dump($data);

                       // $data = array_values($data);

                        // var_dump($data);

                        $mainpath = getBaseSite();

                        $file = $mainpath . "datasource/" . $sourcename . ".json";

                        $comp =  file_put_contents($file, json_encode($data));
                    }



                    $path = getBaseUrl() . "assets/img/".$pathimage."/";


                    if($comp > 0 && isset($_FILES["fileToUpload"])){

                        UploadPic($PicFile,$path);
                    }

                    echo "yes";



                }



        }
        else
        {
            $chkDel = $_POST['piclist_del'];
            $N = count($chkDel);

            $path = getBaseUrl() . "assets/img/".$pathimage."/";

            //echo("You selected $N door(s): ");
            for($i=0; $i < $N; $i++)
            {

                DeletePic($sourcename,$chkDel[$i],$path);

            }

            header("location:" .  $pageredirect);
        }


//$upload_info = array("_id"=> $id,"detail"=> "picname" => $PicFile, "priority" => $priority);

//$comp  = Execute($sourcename,$upload_info);


//echo date("YmdHisu");



// foreach ($_POST as $param_name => $param_val) {


//     echo "Param:". $param_name ." Value: ".$param_val ."<br />\n";
// }
// echo json_decode(stripslashes($_POST['data']), true);
//echo count($_FILES);
//echo $_POST[$title];
// if(isset($_FILES['filenames']))
// {  

// 	$PicFile = "slider_" . $id .".jpg";
// 	$path = getBaseUrl() . "assets/img/promotion/";

// 	$uploaddir = $path;
// 	$target_file = $target_dir . $PicFile;

//     $error = false;
//     $files = array();

// 	$uploaddir = $path;
//     // $uploaddir = './uploads/';
//     foreach($_FILES as $file)
//     {
//         if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
//         {
//             $files[] = $uploaddir .$file['name'];
//         }
//         else
//         {
//             $error = true;
//         }
//     }
//     $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
// }
// else
// {
//     $data = array('success' => 'Form was submitted', 'formData' => $_POST);
// }

// echo json_encode($data);
?>