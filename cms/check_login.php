<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
	require("function/JsonDataSource.php");
	session_start();


	$user = $_POST["user"]["username"];

	$pass = $_POST["user"]["password"];



	//require("/cms/file.php");
	 // if(file_exists("function/JsonDataSource.php")){
	 // 		echo "YES";
	 // 	}else{
	 // 			echo "NO";
	 // 	}

	

	// echo Reader("staff");
	//$arr = Reader("staff");
 	//echo  var_dump($arr);
 	//echo $arr[0]->name;
	$data = Reader("staff");

	
	//echo count($data);
	//count($b)
	$staff = array();
	for($i =0;$i < count($data); $i++){
		if($data[$i]->username == $user &&  $data[$i]->password == $pass){
			$login = true;
			
			$staff = $data[$i];
			break;
		}
	}

	if(count($staff) > 0){

	$_SESSION["name"] = $staff->name; 
	$_SESSION["UserID"] = $staff->username . "$" . $staff->password;
	$_SESSION["role"] = $staff->role;

	session_write_close();

	header("location:mainpanel.php");
	
	// if($objResult["Status"] == "ADMIN")
	// {
		
	// }
	// else
	// {
		
	// }



	}else
	{
		header("location:notification.php");

	}
 	//echo Execute("staff");
	//echo json_encode(Reader("staff"));
	// for($i=0;$i<=3;$i++)
	// {
	// 	echo "Name : ".Reader("staff")[$i]." <br>";
	// }









	// mysql_connect("localhost","root","root");
	// mysql_select_db("mydatabase");
	// $strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	// and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	// $objQuery = mysql_query($strSQL);
	// $objResult = mysql_fetch_array($objQuery);
	// if(!$objResult)
	// {
	// 		echo "Username and Password Incorrect!";
	// }
	// else
	// {
	// 		$_SESSION["UserID"] = $objResult["UserID"];
	// 		$_SESSION["Status"] = $objResult["Status"];

	// 		session_write_close();
			
	// 		if($objResult["Status"] == "ADMIN")
	// 		{
	// 			header("location:admin_page.php");
	// 		}
	// 		else
	// 		{
	// 			header("location:user_page.php");
	// 		}
	// }
	// mysql_close();

?>
