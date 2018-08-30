<?php
/**
 * @package   Gantry 5 Theme
 * @author    szoupi http://szoupi.com
 * @copyright Copyright (C) 2015 - 2017 szoupi
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- FOR STYLE SEE ../g5_zeus/scss/aylo3-joomla/_core.scss -->


<ul class="newsflash<?php echo $moduleclass_sfx; ?>" >

	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		


		<!-- SHOW EACH ITEM -->
		<div class="newsflash-item">
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
			
			<!-- SHOW LAST SEPERATOR -->
			<?php if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>
				<!-- <span class="article-separator">&#160;</span> -->
				<hr>
			<?php endif; ?>
		</div>
	<?php endfor; ?>
</ul>
