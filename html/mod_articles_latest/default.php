<?php
/**
 * @package   Gantry 5 Theme
 * @author    threethemes http://threethemes.com
 * @copyright Copyright (C) 2015 - 2017 threethemes
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>




<div class="latestnews<?php echo $moduleclass_sfx; ?>">


<?php foreach ($list as $item) :  ?>


	<div class="row-fluid">
		<!-- IMAGE -->
	   <div class="img-intro span3 visible-desktop">
			<!-- use image layout /html/joomla/content/sz_newsflash -->
			<?php echo JLayoutHelper::render('joomla.content.sz_newsflash', $item); ?>
	   </div>

		<div class="title span9">
			<h4 itemscope itemtype="https://schema.org/Article">
				<!-- TITLE -->
				<a href="<?php echo $item->link; ?>" itemprop="url">
					<span itemprop="name">
						<?php echo $item->title; ?>
					</span>
				</a>
			</h4>

			<!-- CATEGORY  -->
			<div>
				<small class="newsflash-category text-uppercase">			
					<?php $categoryurl = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) 
						. '" itemprop="genre">' 
						. $item->category_title 
						. '</a>'; ?>
					<?php echo $categoryurl; ?> &nbsp;
				</small>		
				<small class="mod-articles-category-date">
					<i class="fa fa-clock-o"></i> &nbsp;

					<!-- Rewrite days in human readable format -->
					<?php include JPATH_THEMES . '/g5_zeus' . '/includes/formatDate.php';?>
				</small>
			</div>
		</div>	


	</div>
	<hr style="clear:both;">
<?php endforeach; ?>
</div>
