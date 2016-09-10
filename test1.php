<?php
$input = array("a" => "green", "red", "b" => "green", "blue", "red");
require("cms/function/global.php");
require($main_site ."function/bll_ui.php");
$data = getMenuFood();


while ($fruit_name = current($data)) {
    if ($fruit_name == 'apple') {
        echo key($array).'<br />';
    }
    next($array);
}
var_dump(gettype($data));

//$result = array_unique($data);
//print_r($result);
?>