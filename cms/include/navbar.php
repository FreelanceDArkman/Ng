<?php 
require_once($main_site ."function/helper_url.php");

   
$pagename = curPageName();




$result =  "<div class=\"navbar navbar-fixed-top\">" .
	
"	<div class=\"navbar-inner\">" .
		
"		<div class=\"container\">" .
			
"			<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">" .
"				<span class=\"icon-bar\"></span>" .
"				<span class=\"icon-bar\"></span>" .
"				<span class=\"icon-bar\"></span>" .
"			</a>" .
			
"			<a class=\"brand\" href=\".html\">" .
"				Nangnual Admin" .
"			</a>" .
			
"			<div class=\"nav-collapse\">" .
"				<ul class=\"nav pull-right\">" .
	
			
"				<li class=\"dropdown\">" .
"						<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">" .
"							<i class=\"icon-user\"></i> Welcome " . $_SESSION["name"] .
"							<b class=\"caret\"></b>" .
"						</a>" .
						
"						<ul class=\"dropdown-menu\">" .
"							<li><a href=\"javascript:;\">Profile</a></li>" .
"							<li><a href=\"logout.php\">Logout</a></li>" .
"						</ul>" .
"					</li>" .
"				</ul>" .
			

				
"			</div><!--/.nav-collapse -->" .
	
"		</div> <!-- /container -->" .
		
"	</div> <!-- /navbar-inner -->" .
	
"</div>" .
"<div class=\"subnavbar\">" .
"  <div class=\"subnavbar-inner\">" .
"    <div class=\"container\">" .
"      <ul class=\"mainnav\">" .
"        <li ".($pagename == "mainpanel.php" ? "class=\"active\"" : "")."><a href=\"mainpanel.php\"><i class=\"icon-dashboard\"></i><span>เมนูหลัก</span> </a> </li>" .
"        <li ".($pagename == "home.php" ? "class=\"active\"" : "")."><a href=\"home.php\"><i class=\"icon-list-alt\"></i><span>หน้าแรก</span> </a> </li>" .
"        <li ".($pagename == "admin_about.php" ? "class=\"active\"" : "")."><a href=\"admin_about.php\"><i class=\"icon-bookmark\"></i><span>เกี่ยวกับเรา</span> </a></li>" .
"        <li ".($pagename == "admin_promotion.php" ? "class=\"active\"" : "")."><a href=\"admin_promotion.php\"><i class=\"icon-trophy\"></i><span>โปรโมชั่น</span> </a> </li>" .
"        <li ".($pagename == "admin_menu.php" ? "class=\"active\"" : "")."><a href=\"admin_menu.php\"><i class=\"icon-comment\"></i><span>เมนูและบริการของเรา</span> </a> </li>" .
    "        <li ".($pagename == "admin_gallery.php" ? "class=\"active\"" : "")."><a href=\"admin_gallery.php\"><i class=\"icon-camera\"></i><span>บรรยากาศร้าน</span> </a> </li>" .
"        <li ".($pagename == "admin_activity.php" ? "class=\"active\"" : "")."><a href=\"admin_activity.php\" > <i class=\"icon-bullhorn\"></i><span>ข่าวสารและกิจกรรม</span> </a>" .
//    "        <li ".($pagename == "admin_contact.php" ? "class=\"active\"" : "")."><a href=\"admin_contact.php\"><i class=\"icon-code\"></i><span>ติดต่อเรา</span> </a> </li>" .
"        </li>" .
"      </ul>" .
"    </div>" .
"    <!-- /container -->" .
"  </div>" .
"  <!-- /subnavbar-inner -->" .
"</div>";

echo $result;
?>