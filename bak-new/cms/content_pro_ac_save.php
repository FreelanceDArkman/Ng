<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("function/staffauthen.php");
require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");

$source = $_POST["sourcename"];

$folderimg = "activity";
$redirect = "admin_activity.php";
if($source == "pro_content"){
    $redirect = "admin_promotion.php";
    $folderimg = "promotion";
}

$comp = 0;

$data = Reader($source);

$priority = count($data) + 1;
$id = date("YmdHisu");
$PicFile = "pic_" . $id .".jpg";

$dateNow = date("Y-m-d H:i:s");
$Poster =$_SESSION["name"];

$title = $_POST["txt_title"];
$detail = $_POST["txt_detail"];





$upload_info = array("_id"=> $id,"title"=> $title, "detail"=> $detail, "date_submit"=> $dateNow, "poster"=> $Poster, "picname" => $PicFile,
"priority" => $priority, "status"=> "1");

$comp  = Execute($source,$upload_info);
 

//echo date("YmdHisu");
$path = getBaseUrl() . "assets/img/".$folderimg."/";
// echo $comp;
// echo $path ;
if($comp > 0){
    
UploadPic($PicFile,$path );
}


header("location:" . $redirect);

//


?>