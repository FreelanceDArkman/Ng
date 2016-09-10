<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("function/staffauthen.php");
require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");

$basename = "recom-menu";
$comp = 0;

$data = Reader($basename);
$priority = count($data) + 1;
$id = date("YmdHisu");
$PicFile = "slider_" . $id .".jpg";


$title = "";

if(isset($_POST["title_pic_recom"])){
	$title  = $_POST['title_pic_recom'];
}

$detail = "";
$price = "";
if(isset($_POST["price_pic_recom"])){

    $price =$_POST['price_pic_recom'];
}

if(isset($_POST["detail_pic_recom"])){

    $detail =$_POST['detail_pic_recom'];
}


// $title = "";



$upload_info = array("_id"=> $id,"picname" => $PicFile, "priority" => $priority, "title" => $title, "short"=> $detail, "price" => $price );

$comp  = Execute($basename,$upload_info);
 

//echo date("YmdHisu");
$path = getBaseUrl() . "/assets/img/menu/";
// echo $comp;
// echo $path ;
if($comp > 0){
    
UploadPic($PicFile,$path );
}
// header("location:" . $_SERVER['HTTP_REFERER']);
		header("location:home.php# menucontrol");

//


?>