<?php
// require_once("function/global.php");
require_once("JsonDataSource.php");

function getMainSlideer()
{
	$data = Reader("mainslide");

	usort($data, function($a, $b) {
	    // if ($a['priority'] == $b['priority']) {
	    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
	    // }
	  
	    return $a->priority > $b->priority ? 1 : -1;
	});

	return $data;
}

function getMiniSlider()
{
	$data = Reader("minislide");

	usort($data, function($a, $b) {
	    // if ($a['priority'] == $b['priority']) {
	    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
	    // }
	  
	    return $a->priority > $b->priority ? 1 : -1;
	});

	return $data;
}

function getPromotionContent()
{
	$data = Reader("pro_content");

	usort($data, function($a, $b) {
	    // if ($a['priority'] == $b['priority']) {
	    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
	    // }
	  
	    return $a->priority > $b->priority ? 1 : -1;
	});

	return $data;
}

function getActivityContent()
{
	$data = Reader("activity_content");

	usort($data, function($a, $b) {
	    // if ($a['priority'] == $b['priority']) {
	    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
	    // }
	  
	    return $a->priority > $b->priority ? 1 : -1;
	});

	return $data;
}


function getRecommenu()
{
	$data = Reader("recom-menu");

	usort($data, function($a, $b) {
	    // if ($a['priority'] == $b['priority']) {
	    //     return $a['sold_count'] < $b['sold_count'] ? 1 : -1;
	    // }
	  
	    return $a->priority > $b->priority ? 1 : -1;
	});

	return $data;
}

function getDescriptionDetail(){
	$data = Reader("index-notice");



	return $data[0]->content;
}

function getDescriptionDetail_history(){
	$data = Reader("about-history");



	return $data[0]->content;
}

 ?>
