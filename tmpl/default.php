<?php
/**
 * @package    DD_Mod_Content_LatestArticle
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_dd_content_latestarticle/dd_content_latestarticle.css', array('version' => 'auto', 'relative' => true));

$articles = new Mod_Content_LatestArticle_Helper;
$items = $articles->getLatestArticles();

?>
<div class="dd_mod_content_latestarticle">
	<?php if ($params->get('associated_article_mode')): ?>
        <div class="row-fluid">
            <div class="span12">
                <a href="<?php echo JRoute::_('index.php?option=com_content&view=category&layout=blog&id=' . $item->catid); ?>">
					<?php echo JText::_('MOD_DD_CONTENT_LATESTARTICLE_ASSOCIATED_ACTIVE_MODE_BACKTOKATEGORY'); ?>
                </a>
            </div>
        </div>
	<?php endif; ?>
    <div class="row-fluid">
		<?php foreach ($items as $item): ?>
            <div class="span4">
                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->id . '-' . $item->alias, $item->catid)); ?>">
                    <img alt="<?php echo htmlspecialchars(json_decode($item->images)->image_intro_alt, ENT_QUOTES, 'UTF-8'); ?>"
                         src="<?php echo htmlspecialchars(json_decode($item->images)->image_intro, ENT_QUOTES, 'UTF-8'); ?>"
                </a>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->id . '-' . $item->alias, $item->catid)); ?>">
                    <h5><?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></h5>
                </a>
            </div>
		<?php endforeach; ?>
    </div>
</div>