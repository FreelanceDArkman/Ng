<?php
/*
Joomla Magic Updater Component
Copyright (C) 2008  Rahman Haghparast

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

ini_set('memory_limit', '128M');
/**
* @package		JoomlaUpdater
* @license		GNU/GPL, see LICENSE.php
*/

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the JoomlaUpdater Component
 *
 * @package		JoomlaUpdater
 */
class JoomlaUpdaterViewJoomlaUpdater extends JView
{
	function display($tpl = null)
	{		
		$greeting = "This component updates your Joomla to the latest version. <br />";
		$greeting .= "Developed by <a href=\"mailto:haghparast@gmail.com\">Rahman Haghparast</a> for <a href=\"http://www.realtyna.com\" target=\"_blank\">Realtyna</a> website. <br />";
		$greeting .= "You can run this in the administrator mode only!";
		$this->assignRef( 'greeting',	$greeting );

		parent::display($tpl);
	}
}
?>
