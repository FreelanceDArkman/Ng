<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("function/staffauthen.php");
require_once("function/upload.processor.php");
require_once("function/JsonDataSource.php");
require_once("function/global.php");

$basename = "menu";
$comp = 0;

$data = Reader($basename);
$priority = count($data) + 1;
$id = date("YmdHisu");
$PicFile = "slider_menu_" . $id .".jpg";


$title = "";


if(isset($_POST["title_menu"])){
	$title  = $_POST['title_menu'];
}

$detail = "";
$price = "0";
$menuheadid = "";
if(isset($_POST["price_menu"])){

    $price =$_POST['price_menu'];
}

if(isset($_POST["detail_menu"])){

    $detail =$_POST['detail_menu'];
}

if(isset($_POST["sel_head_menu"])){

    $menuheadid =$_POST['sel_head_menu'];
}




// $title = "";



$upload_info = array("_id"=> $id, "head_id" => $menuheadid, "picname" => $PicFile, "priority" => $priority, "title" => $title, "short"=> $detail, "price" => $price );

$comp  = Execute($basename,$upload_info);
 

//echo date("YmdHisu");
$path = getBaseUrl() . "/assets/img/menulist/";
// echo $comp;
// echo $path ;
if($comp > 0){
    
UploadPic($PicFile,$path );
}
// header("location:" . $_SERVER['HTTP_REFERER']);
		header("location:admin_menu.php?selected=".$menuheadid."# mune-item");

//


?>