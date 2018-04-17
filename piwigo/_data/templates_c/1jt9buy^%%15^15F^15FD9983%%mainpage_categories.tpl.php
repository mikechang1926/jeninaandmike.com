<?php /* Smarty version 2.6.26, created on 2013-02-21 22:13:13
         compiled from mainpage_categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'html_style', 'mainpage_categories.tpl', 1, false),array('function', 'combine_script', 'mainpage_categories.tpl', 14, false),array('modifier', 'replace', 'mainpage_categories.tpl', 21, false),array('modifier', 'strip_tags', 'mainpage_categories.tpl', 21, false),array('modifier', 'translate', 'mainpage_categories.tpl', 21, false),)), $this); ?>
<?php echo ''; ?><?php $this->_tag_stack[] = array('html_style', array()); $_block_repeat=true;$this->_plugins['block']['html_style'][0][0]->block_html_style($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '.thumbnailCategory .illustration'; ?>{<?php echo 'width: '; ?><?php echo $this->_tpl_vars['derivative_params']->max_width()+5; ?><?php echo 'px;}.content .thumbnailCategory .description'; ?>{<?php echo 'height: '; ?><?php echo $this->_tpl_vars['derivative_params']->max_height()+5; ?><?php echo 'px;}'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['html_style'][0][0]->block_html_style($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo ''; ?>

<ul class="thumbnailCategories">
<?php $_from = $this->_tpl_vars['category_thumbnails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat_loop']['iteration']++;
?>
<?php $this->assign('derivative', $this->_tpl_vars['pwg']->derivative($this->_tpl_vars['derivative_params'],$this->_tpl_vars['cat']['representative']['src_image'])); ?>
<?php if (! $this->_tpl_vars['derivative']->is_cached()): ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.ajaxmanager','path' => 'themes/default/js/plugins/jquery.ajaxmanager.js','load' => 'footer'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'thumbnails.loader','path' => 'themes/default/js/thumbnails.loader.js','require' => 'jquery.ajaxmanager','load' => 'footer'), $this);?>

<?php endif; ?>
	<li class="<?php if ((1 & ($this->_foreach['cat_loop']['iteration']-1))): ?>odd<?php else: ?>even<?php endif; ?>">
		<div class="thumbnailCategory">
			<div class="illustration">
			<a href="<?php echo $this->_tpl_vars['cat']['URL']; ?>
">
				<img <?php if ($this->_tpl_vars['derivative']->is_cached()): ?>src="<?php echo $this->_tpl_vars['derivative']->get_url(); ?>
"<?php else: ?>src="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
<?php echo $this->_tpl_vars['themeconf']['img_dir']; ?>
/ajax-loader-small.gif" data-src="<?php echo $this->_tpl_vars['derivative']->get_url(); ?>
"<?php endif; ?> alt="<?php echo $this->_tpl_vars['cat']['TN_ALT']; ?>
" title="<?php echo smarty_modifier_strip_tags(smarty_modifier_replace($this->_tpl_vars['cat']['NAME'], '"', ' '), false); ?>
 - <?php echo Template::mod_translate('display this album'); ?>
">
			</a>
			</div>
			<div class="description">
				<h3>
					<a href="<?php echo $this->_tpl_vars['cat']['URL']; ?>
"><?php echo $this->_tpl_vars['cat']['NAME']; ?>
</a>
<?php if (! empty ( $this->_tpl_vars['cat']['icon_ts'] )): ?>
					<img title="<?php echo $this->_tpl_vars['cat']['icon_ts']['TITLE']; ?>
" src="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
<?php echo $this->_tpl_vars['themeconf']['icon_dir']; ?>
/recent<?php if ($this->_tpl_vars['cat']['icon_ts']['IS_CHILD_DATE']): ?>_by_child<?php endif; ?>.png" alt="(!)">
<?php endif; ?>
				</h3>
		<div class="text">
<?php if (isset ( $this->_tpl_vars['cat']['INFO_DATES'] )): ?>
				<p class="dates"><?php echo $this->_tpl_vars['cat']['INFO_DATES']; ?>
</p>
<?php endif; ?>
				<p class="Nb_images"><?php echo $this->_tpl_vars['cat']['CAPTION_NB_IMAGES']; ?>
</p>
<?php if (! empty ( $this->_tpl_vars['cat']['DESCRIPTION'] )): ?>
				<p><?php echo $this->_tpl_vars['cat']['DESCRIPTION']; ?>
</p>
<?php endif; ?>
		</div>
			</div>
		</div>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>