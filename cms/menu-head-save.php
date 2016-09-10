<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("function/staffauthen.php");
//require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");

$basename = "menufood-top-menu";
$comp = 0;

$data = Reader($basename);

$id = date("YmdHisu");



$title = "";

if(isset($_POST["txt_head_menu"])){
    $title  = $_POST['txt_head_menu'];
}




// $title = "";



$upload_info = array("_id"=> $id, "title" => $title );

$comp  = Execute($basename,$upload_info);


//echo date("YmdHisu");
//$path = getBaseUrl() . "/assets/img/menu/";
//// echo $comp;
//// echo $path ;
//if($comp > 0){
//
//    UploadPic($PicFile,$path );
//}
// header("location:" . $_SERVER['HTTP_REFERER']);
header("location:admin_menu.php# head");

//


?>