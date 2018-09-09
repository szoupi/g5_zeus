<?php
/**
 * @package   Gantry 5 Theme
 * @author    threethemes http://threethemes.com
 * @copyright Copyright (C) 2015 - 2017 threethemes
 * @copyright Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="newsflash-vert<?php echo $params->get('moduleclass_sfx'); ?>">

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
