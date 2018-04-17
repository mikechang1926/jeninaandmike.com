<?php /* Smarty version 2.6.26, created on 2013-02-21 22:13:13
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'index.tpl', 7, false),array('modifier', 'get_extent', 'index.tpl', 172, false),array('block', 'footer_script', 'index.tpl', 20, false),array('function', 'combine_script', 'index.tpl', 77, false),)), $this); ?>
<?php echo $this->_tpl_vars['MENUBAR']; ?>

<?php if (! empty ( $this->_tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE'] )): ?><?php echo $this->_tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE']; ?>
<?php endif; ?>
<div id="content" class="content<?php if (isset ( $this->_tpl_vars['MENUBAR'] )): ?> contentWithMenu<?php endif; ?>">
<div class="titrePage<?php if (isset ( $this->_tpl_vars['chronology']['TITLE'] )): ?> calendarTitleBar<?php endif; ?>">
	<ul class="categoryActions">
<?php if (! empty ( $this->_tpl_vars['image_orders'] )): ?>
		<li><?php echo '<a id="sortOrderLink" title="'; ?><?php echo Template::mod_translate('Sort order'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-sort">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('Sort order'); ?><?php echo '</span></a><div id="sortOrderBox" class="switchBox"><div class="switchBoxTitle">'; ?><?php echo Template::mod_translate('Sort order'); ?><?php echo '</div>'; ?><?php $_from = $this->_tpl_vars['image_orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['image_order']):
        $this->_foreach['loop']['iteration']++;
?><?php echo ''; ?><?php if (! ($this->_foreach['loop']['iteration'] <= 1)): ?><?php echo '<br>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['image_order']['SELECTED']): ?><?php echo '<span>&#x2714; </span>'; ?><?php echo $this->_tpl_vars['image_order']['DISPLAY']; ?><?php echo ''; ?><?php else: ?><?php echo '<span style="visibility:hidden">&#x2714; </span><a href="'; ?><?php echo $this->_tpl_vars['image_order']['URL']; ?><?php echo '" rel="nofollow">'; ?><?php echo $this->_tpl_vars['image_order']['DISPLAY']; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</div>'; ?><?php $this->_tag_stack[] = array('footer_script', array('require' => 'jquery')); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo ''; ?><?php echo '
jQuery("#sortOrderLink").click(function() {
	var elt = jQuery("#sortOrderBox");
	elt.css("left", Math.min( jQuery(this).offset().left, jQuery(window).width() - elt.outerWidth(true) - 5))
		.css("top", jQuery(this).offset().top + jQuery(this).outerHeight(true))
		.toggle();
});
jQuery("#sortOrderBox").on("mouseleave", function() {
	jQuery(this).hide();
});
		'; ?><?php echo ''; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo ''; ?>
</li>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['image_derivatives'] )): ?>
		<li><?php echo '<a id="derivativeSwitchLink" title="'; ?><?php echo Template::mod_translate('Photo sizes'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-sizes">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('Photo sizes'); ?><?php echo '</span></a><div id="derivativeSwitchBox" class="switchBox"><div class="switchBoxTitle">'; ?><?php echo Template::mod_translate('Photo sizes'); ?><?php echo '</div>'; ?><?php $_from = $this->_tpl_vars['image_derivatives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['image_derivative']):
        $this->_foreach['loop']['iteration']++;
?><?php echo ''; ?><?php if (! ($this->_foreach['loop']['iteration'] <= 1)): ?><?php echo '<br>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['image_derivative']['SELECTED']): ?><?php echo '<span>&#x2714; </span>'; ?><?php echo $this->_tpl_vars['image_derivative']['DISPLAY']; ?><?php echo ''; ?><?php else: ?><?php echo '<span style="visibility:hidden">&#x2714; </span><a href="'; ?><?php echo $this->_tpl_vars['image_derivative']['URL']; ?><?php echo '" rel="nofollow">'; ?><?php echo $this->_tpl_vars['image_derivative']['DISPLAY']; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</div>'; ?><?php $this->_tag_stack[] = array('footer_script', array('require' => 'jquery')); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo ''; ?><?php echo '
jQuery("#derivativeSwitchLink").click(function() {
	var elt = jQuery("#derivativeSwitchBox");
	elt.css("left", Math.min( jQuery(this).offset().left, jQuery(window).width() - elt.outerWidth(true) - 5))
		.css("top", jQuery(this).offset().top + jQuery(this).outerHeight(true))
		.toggle();
});
jQuery("#derivativeSwitchBox").on("mouseleave", function() {
	jQuery(this).hide();
});
		'; ?><?php echo ''; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo ''; ?>
</li>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['favorite'] )): ?>
		<li><a href="<?php echo $this->_tpl_vars['favorite']['U_FAVORITE']; ?>
" title="<?php echo Template::mod_translate('delete all photos from your favorites'); ?>
" class="pwg-state-default pwg-button" rel="nofollow">
			<span class="pwg-icon pwg-icon-favorite-del">&nbsp;</span><span class="pwg-button-text"><?php echo Template::mod_translate('delete all photos from your favorites'); ?>
</span>
		</a></li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_CADDIE'] )): ?>
		<li><a href="<?php echo $this->_tpl_vars['U_CADDIE']; ?>
" title="<?php echo Template::mod_translate('Add to caddie'); ?>
" class="pwg-state-default pwg-button">
			<span class="pwg-icon pwg-icon-caddie-add">&nbsp;</span><span class="pwg-button-text"><?php echo Template::mod_translate('Caddie'); ?>
</span>
		</a></li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_EDIT'] )): ?>
		<li><a href="<?php echo $this->_tpl_vars['U_EDIT']; ?>
" title="<?php echo Template::mod_translate('Edit album'); ?>
" class="pwg-state-default pwg-button">
			<span class="pwg-icon pwg-icon-category-edit">&nbsp;</span><span class="pwg-button-text"><?php echo Template::mod_translate('Edit'); ?>
</span>
		</a></li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_SEARCH_RULES'] )): ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'core.scripts','load' => 'async','path' => 'themes/default/js/scripts.js'), $this);?>

		<li><a href="<?php echo $this->_tpl_vars['U_SEARCH_RULES']; ?>
" onclick="popuphelp(this.href); return false;" title="<?php echo Template::mod_translate('Search rules'); ?>
" class="pwg-state-default pwg-button" rel="nofollow">
			<span class="pwg-icon pwg-icon-help">&nbsp;</span><span class="pwg-button-text">(?)</span>
		</a></li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_SLIDESHOW'] )): ?>
		<li><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['U_SLIDESHOW']; ?><?php echo '" title="'; ?><?php echo Template::mod_translate('slideshow'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-slideshow">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('slideshow'); ?><?php echo '</span></a>'; ?>
</li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_MODE_FLAT'] )): ?>
		<li><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['U_MODE_FLAT']; ?><?php echo '" title="'; ?><?php echo Template::mod_translate('display all photos in all sub-albums'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-category-view-flat">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('display all photos in all sub-albums'); ?><?php echo '</span></a>'; ?>
</li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_MODE_NORMAL'] )): ?>
		<li><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['U_MODE_NORMAL']; ?><?php echo '" title="'; ?><?php echo Template::mod_translate('return to normal view mode'); ?><?php echo '" class="pwg-state-default pwg-button"><span class="pwg-icon pwg-icon-category-view-normal">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('return to normal view mode'); ?><?php echo '</span></a>'; ?>
</li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_MODE_POSTED'] )): ?>
		<li><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['U_MODE_POSTED']; ?><?php echo '" title="'; ?><?php echo Template::mod_translate('display a calendar by posted date'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-calendar">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('Calendar'); ?><?php echo '</span></a>'; ?>
</li>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_MODE_CREATED'] )): ?>
		<li><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['U_MODE_CREATED']; ?><?php echo '" title="'; ?><?php echo Template::mod_translate('display a calendar by creation date'); ?><?php echo '" class="pwg-state-default pwg-button" rel="nofollow"><span class="pwg-icon pwg-icon-camera-calendar">&nbsp;</span><span class="pwg-button-text">'; ?><?php echo Template::mod_translate('Calendar'); ?><?php echo '</span></a>'; ?>
</li>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['PLUGIN_INDEX_ACTIONS'] )): ?><?php echo $this->_tpl_vars['PLUGIN_INDEX_ACTIONS']; ?>
<?php endif; ?>
	</ul>

<h2><?php echo $this->_tpl_vars['TITLE']; ?>
</h2>

<?php if (isset ( $this->_tpl_vars['chronology_views'] )): ?>
<div class="calendarViews"><?php echo Template::mod_translate('View'); ?>
:
	<select onchange="document.location = this.options[this.selectedIndex].value;">
<?php $_from = $this->_tpl_vars['chronology_views']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view']):
?>
		<option value="<?php echo $this->_tpl_vars['view']['VALUE']; ?>
"<?php if ($this->_tpl_vars['view']['SELECTED']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['view']['CONTENT']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
	</select>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['chronology']['TITLE'] )): ?>
<h2 class="calendarTitle"><?php echo $this->_tpl_vars['chronology']['TITLE']; ?>
</h2>
<?php endif; ?>

</div>
<?php if (isset ( $this->_tpl_vars['errors'] ) || ! empty ( $this->_tpl_vars['infos'] )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'infos_errors.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN'] )): ?><?php echo $this->_tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN']; ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['category_search_results'] )): ?>
<div style="font-size:16px;margin:10px 16px"><?php echo Template::mod_translate('Album results for'); ?>
 <strong><?php echo $this->_tpl_vars['QUERY_SEARCH']; ?>
</strong> :
	<em><strong>
<?php $_from = $this->_tpl_vars['category_search_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['res_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['res_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['res']):
        $this->_foreach['res_loop']['iteration']++;
?>
	<?php if (! ($this->_foreach['res_loop']['iteration'] <= 1)): ?> &mdash; <?php endif; ?>
	<?php echo $this->_tpl_vars['res']; ?>

<?php endforeach; endif; unset($_from); ?>
	</strong></em>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['tag_search_results'] )): ?>
<div style="font-size:16px;margin:10px 16px"><?php echo Template::mod_translate('Tag results for'); ?>
 <strong><?php echo $this->_tpl_vars['QUERY_SEARCH']; ?>
</strong> :
	<em><strong>
<?php $_from = $this->_tpl_vars['tag_search_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['res_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['res_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['res']):
        $this->_foreach['res_loop']['iteration']++;
?>
	<?php if (! ($this->_foreach['res_loop']['iteration'] <= 1)): ?> &mdash; <?php endif; ?>
	<?php echo $this->_tpl_vars['res']; ?>

<?php endforeach; endif; unset($_from); ?>
	</strong></em>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['FILE_CHRONOLOGY_VIEW'] )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['FILE_CHRONOLOGY_VIEW'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['CONTENT_DESCRIPTION'] )): ?>
<div class="additional_info">
	<?php echo $this->_tpl_vars['CONTENT_DESCRIPTION']; ?>

</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['CATEGORIES'] )): ?><?php echo $this->_tpl_vars['CATEGORIES']; ?>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['THUMBNAILS'] )): ?>
<ul class="thumbnails" id="thumbnails">
<?php echo $this->_tpl_vars['THUMBNAILS']; ?>

</ul>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['navbar'] )): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_plugins['modifier']['get_extent'][0][0]->get_extent('navigation_bar.tpl', 'navbar'), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['PLUGIN_INDEX_CONTENT_END'] )): ?><?php echo $this->_tpl_vars['PLUGIN_INDEX_CONTENT_END']; ?>
<?php endif; ?>
</div><?php if (! empty ( $this->_tpl_vars['PLUGIN_INDEX_CONTENT_AFTER'] )): ?><?php echo $this->_tpl_vars['PLUGIN_INDEX_CONTENT_AFTER']; ?>
<?php endif; ?>