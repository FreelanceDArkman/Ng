<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("function/staffauthen.php");
require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");

$comp = 0;

$data = Reader("mainslide");
$priority = count($data) + 1;
$id = date("YmdHisu");
$PicFile = "slider_" . $id .".jpg";


$upload_info = array("_id"=> $id,"picname" => $PicFile, "priority" => $priority);

$comp  = Execute("mainslide",$upload_info);
 

//echo date("YmdHisu");
$path = getBaseUrl() . "assets/img/slide/";
// echo $comp;
// echo $path ;
if($comp > 0){
    
	UploadPic($PicFile,$path );
}
header("location:home.php");

//


?>