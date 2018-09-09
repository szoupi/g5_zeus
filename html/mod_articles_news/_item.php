<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');
$images = json_decode($item->images);
?>


<!-- FOR STYLE SEE ../g5_zeus/scss/aylo3-joomla/_core.scss -->







<!-- IMAGE -->
   <div class="img-intro">
		<!-- use image layout /html/layouts/joomla/content/sz_newsflash -->
		<?php echo JLayoutHelper::render('joomla.content.sz_newsflash', $item); ?>
   </div>

<div>
	<div class="newsflash-content">
		
		<div>
			<!-- TITLE -->
			<?php if ($params->get('item_title')) : ?>
				
				<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">

					<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" 
							href="<?php echo $item->link; ?>">		
							<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>

				</<?php echo $item_heading; ?>>

			<?php endif; ?>
		</div>

		
		<!-- CATEGORY -->
		<small class="newsflash-category text-uppercase">			
			<?php $categoryurl = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) 
				. '" itemprop="genre">' 
				. $item->category_title 
				. '</a>'; ?>
			<?php echo $categoryurl; ?> &nbsp;
		</small>


		<!-- DATE -->
		<small class="mod-articles-category-date">
			<i class="fa fa-clock-o"></i> &nbsp;
			<!-- Rewrite days in human readable format -->
			<?php include JPATH_THEMES . '/g5_zeus' . '/includes/formatDate.php';?>
		</small>

		<!-- INTROTEXT -->
		<div class="newsflash-introtext">
			<!-- OPTION IS MISSING IN CONTROL PANEL -->
			<?php if (!$params->get('intro_only')) : ?>
				<?php echo $item->afterDisplayTitle; ?>
			<?php endif; ?>

			<?php echo $item->beforeDisplayContent; ?>
			
			
			<!-- INTROTEXT -->
			<!-- threethemes 2016-06-18 - remove img and other tags-->
			<?php echo JHtml::_('string.truncate', strip_tags($item->introtext),100);?>

			<!-- READ MORE -->
			<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
				<?php echo '<a class="readmore btn btn-primary" href="' . $item->link . '">' . $item->linkText . '</a>'; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
