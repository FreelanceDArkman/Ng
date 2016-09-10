<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onSearch', 'plgSearchContentFullText' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSearchContentFullTextAreas' );

JPlugin::loadLanguage( 'plg_search_content' );

/**
 * @return array An array of search areas
 */
function &plgSearchContentFullTextAreas()
{
	static $areas = array(
		'content' => 'Articles'
	);
	return $areas;
}



function plgSearchContentFullText( $text, $phrase='', $ordering='', $areas=null )
{
	global $mainframe;

	$db		=& JFactory::getDBO();
	$user	=& JFactory::getUser();

	require_once(JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
	require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_search'.DS.'helpers'.DS.'search.php');

	$searchText = $text;
	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( plgSearchContentFullTextAreas() ) )) {
			return array();
		}
	}

	// load plugin params info
 	$plugin			=& JPluginHelper::getPlugin('search', 'content-fulltext');
 	$pluginParams	= new JParameter( $plugin->params );

	$sContent 		= $pluginParams->get( 'search_content', 		1 );
	$sUncategorised = $pluginParams->get( 'search_uncategorised', 	1 );
	$sArchived 		= $pluginParams->get( 'search_archived', 		1 );
	$firstUse 		= $pluginParams->get( 'first_use', 				1 );
	$sortByRelevance = $pluginParams->get( 'sort_by_relevance', 	1 );
	$booleanMode	 = $pluginParams->get( 'boolean_mode', 			0 );
	$searchFrenchPs	 = $pluginParams->get( 'search_french_ps', 		0 );
	
	$limit 			= $pluginParams->def( 'search_limit', 			50 );
	
	
	$nullDate 		= $db->getNullDate();
	$date 			=& JFactory::getDate();
	$now 			= $date->toMySQL();


	$text = trim( $text );
	if ($text == '') {
		return array();
	}
	
	
	// If first use, create MySQL FullText index on #__content table
	if($firstUse == 1){
		
		// Query used to create index
		$query = "ALTER TABLE #__content ADD FULLTEXT INDEX idx_fulltext(`title`, `introtext`, `fulltext`);";
		$db->setQuery($query);
		@$db->query();
		
		// Update plugin parameters. Index creation is only done one the first use of the plugin
		$pluginParams->set('first_use', 0);

		$query = "UPDATE #__plugins SET params = '" . $pluginParams->toString() . 
			"' WHERE name = 'Search - Content FullText' AND element = 'content-fulltext' AND folder = 'search';";
		
		$db->setQuery( $query  );
		$db->query();
	}
	


	
	// Fulltext search	query
	$text		= $db->getEscaped( $text, true );
	$where = " MATCH(a.title, a.introtext, a.fulltext) AGAINST ('";
	
	if($booleanMode == 1) $where .= '*';
	$where .= $text;
	if($booleanMode == 1) $where .= '*';
	$where .= "'";
	
	// Enable boolean mode if needed
	if($booleanMode == 1) $where .= ' IN BOOLEAN MODE';
	$where .= ') ';
	
	
	
	if($sortByRelevance == 0){
		// Handle ordering
		$morder = '';
		switch ($ordering) {
			case 'oldest':
				$order = 'a.created ASC';
				break;
	
			case 'popular':
				$order = 'a.hits DESC';
				break;
	
			case 'alpha':
				$order = 'a.title ASC';
				break;
	
			case 'category':
				$order = 'b.title ASC, a.title ASC';
				$morder = 'a.title ASC';
				break;
	
			case 'newest':
				default:
				$order = 'a.created DESC';
				break;
		}
	}

	$rows = array();

	// search articles
	if ( $sContent && $limit > 0 )
	{
		$query = 'SELECT a.title AS title, a.metadesc, a.metakey,'
		. ' a.created AS created,'
		. ' CONCAT(a.introtext, a.fulltext) AS text,'
		. ' CONCAT_WS( "/", u.title, b.title ) AS section,'
		. ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'
		. ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(":", b.id, b.alias) ELSE b.id END as catslug,'
		. ' u.id AS sectionid,'
		. ' "2" AS browsernav'
		. ' FROM #__content AS a'
		. ' INNER JOIN #__categories AS b ON b.id=a.catid'
		. ' INNER JOIN #__sections AS u ON u.id = a.sectionid'
		. ' WHERE ( '.$where.' )'
		. ' AND a.state = 1'
		. ' AND u.published = 1'
		. ' AND b.published = 1'
		. ' AND a.access <= '.(int) $user->get( 'aid' )
		. ' AND b.access <= '.(int) $user->get( 'aid' )
		. ' AND u.access <= '.(int) $user->get( 'aid' )
		. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
		. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'
		. ' GROUP BY a.id';
		
		// Handle ordering
		if($sortByRelevance == 0) $query .= ' ORDER BY '. $order;
		
		$db->setQuery( $query, 0, $limit );
		$list = $db->loadObjectList();
		$limit -= count($list);

		if(isset($list))
		{
			foreach($list as $key => $item)
			{
				$list[$key]->href = ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid);
			}
		}
		$rows[] = $list;
	}

	
	// search uncategorised content
	if ( $sUncategorised && $limit > 0 )
	{
		$query = 'SELECT id, a.title AS title, a.created AS created, a.metadesc, a.metakey, '
		. ' CONCAT(a.introtext, a.fulltext) AS text,'
		. ' "2" as browsernav, "'. $db->Quote(JText::_('Uncategorised Content')) .'" AS section'
		. ' FROM #__content AS a'
		. ' WHERE ('.$where.')'
		. ' AND a.state = 1'
		. ' AND a.access <= '.(int) $user->get( 'aid' )
		. ' AND a.sectionid = 0'
		. ' AND a.catid = 0'
		. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
		. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )';

		// Handle ordering
		if($sortByRelevance == 0) $query .= ' ORDER BY '. ($morder ? $morder : $order);
		
		
		$db->setQuery( $query, 0, $limit );
		$list2 = $db->loadObjectList();
		$limit -= count($list2);

		if(isset($list2))
		{
			foreach($list2 as $key => $item)
			{
				$list2[$key]->href = ContentHelperRoute::getArticleRoute($item->id);
			}
		}

		$rows[] = $list2;
	}

	// search archived content
	if ( $sArchived && $limit > 0 )
	{
		$searchArchived = JText::_( 'Archived' );

		$query = 'SELECT a.title AS title, a.metadesc, a.metakey,'
		. ' a.created AS created,'
		. ' CONCAT(a.introtext, a.fulltext) AS text,'
		. ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'
		. ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(":", b.id, b.alias) ELSE b.id END as catslug,'
		. ' u.id AS sectionid,'
		. ' CONCAT_WS( "/", u.title, b.title ) AS section,'
		. ' "2" AS browsernav'
		. ' FROM #__content AS a'
		. ' INNER JOIN #__categories AS b ON b.id=a.catid AND b.access <= ' .$user->get( 'gid' )
		. ' INNER JOIN #__sections AS u ON u.id = a.sectionid'
		. ' WHERE ( '.$where.' )'
		. ' AND a.state = -1'
		. ' AND u.published = 1'
		. ' AND b.published = 1'
		. ' AND a.access <= '.(int) $user->get( 'aid' )
		. ' AND b.access <= '.(int) $user->get( 'aid' )
		. ' AND u.access <= '.(int) $user->get( 'aid' )
		. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
		. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )';

		// Handle ordering
		if($sortByRelevance == 0) $query .= ' ORDER BY '. $order;
		
		
		$db->setQuery( $query, 0, $limit );
		$list3 = $db->loadObjectList();

		if(isset($list3))
		{
			foreach($list3 as $key => $item)
			{
				$list3[$key]->href = ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid);
			}
		}

		$rows[] = $list3;
	}

	$results = array();
	if(count($rows))
	{
		foreach($rows as $row)
		{
			$new_row = array();
			foreach($row AS $key => $article) {
				$new_row[] = $article;
			}
			$results = array_merge($results, (array) $new_row);
		}
	}
	
	
		

	return $results;
}
