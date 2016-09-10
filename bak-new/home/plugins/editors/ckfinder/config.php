<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

define( 'DS', DIRECTORY_SEPARATOR );
$rootFolder = explode(DS,dirname(__FILE__));
array_splice($rootFolder,-3);
$base_folder = implode(DS,$rootFolder);
define( '_JEXEC', 1 );
define('JPATH_BASE',$base_folder);
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once( JPATH_CONFIGURATION	.DS.'configuration.php' );
require_once(JPATH_LIBRARIES .DS.'loader.php' );
jimport('joomla.base.object');
jimport('joomla.text');
jimport('joomla.filter.input');
jimport('joomla.database.database');
jimport('joomla.factory');
jimport('joomla.error.error');
jimport('joomla.environment.uri');
$base_path = JPATH_SITE;

function CheckAuthentication()
{  
	$JConfig = new JConfig();
	$database =  &  JDatabase::getInstance(array('driver'=>$JConfig->dbtype,'host'=>$JConfig->host,'user'=>$JConfig->user,'password'=>$JConfig->password,
									'database'=>$JConfig->db,'prefix'=>$JConfig->dbprefix));
	$expired_time = time() - ($JConfig->lifetime * 60);						
	unset($JConfig);
	$ip = md5($_SERVER['REMOTE_ADDR']);
	
	$sql ='SELECT session_id FROM jos_session '
	. ' WHERE session_id =\'' .$ip . '\' '
	. ' AND time > ' .$expired_time;
	$database->setQuery( $sql);
	$ip = $database->loadResult();
	
	if(isset($ip))
		return true;
	else 
		return false;
}


$config['LicenseName'] = '';
$config['LicenseKey'] = '';
$baseUrl = str_replace('plugins/editors/ckfinder/core/connector/php/','',JURI::root());
$baseUrl .= 'images/';
$baseDir = JPATH_SITE.DS.'images'.DS;
$config['Thumbnails'] = Array(
		'url' => $baseUrl . '_thumbs',
		'directory' => $baseDir . '_thumbs',
		'enabled' => true,
		'directAccess' => false,
		'maxWidth' => 100,
		'maxHeight' => 100,
		'bmpSupported' => false,
		'quality' => 80);
$config['Images'] = Array(
		'maxWidth' => 1600,
		'maxHeight' => 1200,
		'quality' => 80);		
$config['RoleSessionVar'] = 'CKFinder_UserRole';
$config['AccessControl'][] = Array(
		'role' => '*',
		'resourceType' => '*',
		'folder' => '/',

		'folderView' => true,
		'folderCreate' => true,
		'folderRename' => true,
		'folderDelete' => true,

		'fileView' => true,
		'fileUpload' => true,
		'fileRename' => true,
		'fileDelete' => true);
$config['DefaultResourceTypes'] = '';

$config['ResourceType'][] = Array(
		'name' => 'Files',				// Single quotes not allowed
		'url' => $baseUrl . 'files',
		'directory' => $baseDir . 'files',
		'maxSize' => 0,
		'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,zip',
		'deniedExtensions' => '');

$config['ResourceType'][] = Array(
		'name' => 'Images',
		'url' => $baseUrl,
		'directory' => $baseDir,
		'maxSize' => 0,
		'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
		'deniedExtensions' => '');

$config['ResourceType'][] = Array(
		'name' => 'Flash',
		'url' => $baseUrl . 'flash',
		'directory' => $baseDir . 'flash',
		'maxSize' => 0,
		'allowedExtensions' => 'swf,flv',
		'deniedExtensions' => '');
$config['CheckDoubleExtension'] = true;
$config['FilesystemEncoding'] = 'UTF-8';
$config['SecureImageUploads'] = true;
$config['CheckSizeAfterScaling'] = true;
$config['HtmlExtensions'] = array('html', 'htm', 'xml', 'js');
$config['HideFolders'] = Array(".svn", "CVS");
$config['HideFiles'] = Array(".*");
$config['ChmodFiles'] = 0777 ;
$config['ChmodFolders'] = 0755 ;