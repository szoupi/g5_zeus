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
$params  = $displayData->params;
?>

<!-- to do
	1. add image_intro_caption etc to imgsrc 
-->

<?php 

	$images = json_decode($displayData->images); 

	// make $displayData available for $myArticle
	if (is_array($displayData)) extract( $displayData );

	$myArticle= $displayData->fulltext . $displayData->introtext;

	
	// 1. if there is image intro
	if (isset($images->image_intro) && !empty($images->image_intro)) {
		$imgsrc =  $images->image_intro;

	// 2. else use full text image
	} elseif  (isset($images->image_fulltext) && !empty($images->image_fulltext))  {
		$imgsrc =  $images->image_fulltext;


	
	// 3. or else use image	from article
	} else {

		// DOM method
		$doc = new DOMDocument();
		libxml_use_internal_errors(true); //hide errors from invalid html
		$doc->loadHTML($myArticle);
		libxml_use_internal_errors(false);
		$xpath = new DOMXPath($doc);
		$src = $xpath->evaluate("string(//img/@src)");

		$imgsrc = $src;

		// 4. if no image then use category image
		if (!$imgsrc) {
			$categoryid = $displayData->catid;
			$category = JCategories::getInstance('Content')->get($categoryid);
			$imgsrc =  $category->getParams()->get('image');
			
			// 5. if there is no image at all use default image
			if  (!$imgsrc)  {


				$imgsrc = "templates/g5_zeus/admin/images/logo.png";
			}				
		}
	}


	
?>