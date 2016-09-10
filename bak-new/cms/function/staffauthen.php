<?php 
session_start();

if ( !isset( $_SESSION["origURL"] ) ){
    $_SESSION["origURL"] = $_SERVER["HTTP_REFERER"];
}

if($_SESSION['UserID'] == "")
{
	echo "Please Login!";
	exit();
}

// if($_SESSION['role'] != "USER")
// {
// 	echo "This page for User only!";
// 	exit();
// }	

?>