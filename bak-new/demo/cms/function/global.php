<?php 



$sitepath = "/cms/";
$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "$protocol://{$domain}{$disp_port}{$base_url}"; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc.
$document_root = $_SERVER['DOCUMENT_ROOT'];

$GLOBALS['strSite'] = "ng/cms/";
$GLOBALS['virtual_path'] = "/demo/";


$GLOBALS['main_site'] = $_SERVER['DOCUMENT_ROOT']."/demo/cms/";

function getBaseUrl(){
	$base_dir  = __DIR__; 
	$doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
	$base_url  = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
	$document_root = $_SERVER['DOCUMENT_ROOT'] . "/demo/";

	
	return $document_root;
}
function getBaseSite(){

	$base_dir  = __DIR__; 
	$doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
	$base_url  = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
	$document_root = $_SERVER['DOCUMENT_ROOT']. "/demo/cms/";

	
	return $document_root;
}

?>