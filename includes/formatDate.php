<?php
/**
 * @package   Gantry5
 * @author    threethemes http://threethemes.com
 * @copyright Copyright (C) 2017 threethemes
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

defined('JPATH_BASE') or die;
?>


<!-- format date -->
<?php

	$now=JFactory::getDate();
	$articleDate = $item->displayDate;
	// echo "now is ". $now ."</br>";

	$diff = strtotime($now) - strtotime($articleDate);
	// echo "diff in seconds: " . $diff ."</br>";

	// last minute
	if ($diff<=60) {
		echo $diff . " sec ago";

	// last hour
	} elseif ($diff<=3600) {
		echo floor($diff/60) . " min ago";	

	// today	
	} elseif ($diff<=3600*24) {
		echo "Today " . JHtml::_('date', $item->displayDate, JText::_('H:m'));

	// yesterday
	} elseif ((3600*24<$diff) && ($diff<=3600*24*2)) {
		echo "Yesterday " . JHtml::_('date', $item->displayDate, JText::_('H:m'));

	// older
	} else {
		echo JHtml::_('date', $item->displayDate, JText::_('d M Y'));
	}
?>