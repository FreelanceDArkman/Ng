<?php 
session_start();

//if ( !isset( $_SESSION["origURL"] ) ){
//    $_SESSION["origURL"] = $_SERVER["HTTP_REFERER"];
//}

if( !isset($_SESSION['UserID']))
{
	//echo "Please Login!";

	header("location:http://www.nangnualpattaya.com/cms/");
	exit();
}

// if($_SESSION['role'] != "USER")
// {
// 	echo "This page for User only!";
// 	exit();
// }	

?>