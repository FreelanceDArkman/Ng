<?php

require($main_site ."function/bll_ui.php");

// $data = getPromotionContent();

// $result = "";
// for($i =0;$i < count($data); $i++){}
$result ="<div class=\"blogContent\">" .
"    <div class=\"blogTitle\">" .
"        <h2>Latest from the Blog_01</h2>" .
"        <span class=\"category\">posted in // food, customer</span>" .

"        <div class=\"clearfix\"></div>" .
"        <div class=\"dates\">" .
"            <span class=\"data1\">17.04.12</span>" .
"            <span class=\"data2\">22</span>" .
"        </div>" .
"    </div>" .

"    <img src=\"assets/img/content/post2-photo.jpg\" alt=\"\">" .

"    <p>There are many variations of passages of Lorem Ipsum available," .
"        but the majority have suffered alteration in some form, by injected" .
"        humour, or randomised words which don't look even slightly believable.</p>" .

"    <a href=\"8_single.html\">read more</a>" .

"<hr class=\"divider4\">" .
"</div>";

	
echo $result;


?>

