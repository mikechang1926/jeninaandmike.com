<?php /* Smarty version 2.6.26, created on 2013-02-21 22:17:10
         compiled from menubar_categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'menubar_categories.tpl', 3, false),array('modifier', 'str_repeat', 'menubar_categories.tpl', 17, false),)), $this); ?>
<dt>
<?php if (isset ( $this->_tpl_vars['U_START_FILTER'] )): ?>
	<a href="<?php echo $this->_tpl_vars['U_START_FILTER']; ?>
" class="pwg-state-default pwg-button menubarFilter" title="<?php echo Template::mod_translate('display only recently posted photos'); ?>
" rel="nofollow"><span class="pwg-icon pwg-icon-filter"> </span></a>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_STOP_FILTER'] )): ?>
	<a href="<?php echo $this->_tpl_vars['U_STOP_FILTER']; ?>
" class="pwg-state-default pwg-button menubarFilter" title="<?php echo Template::mod_translate('return to the display of all photos'); ?>
"><span class="pwg-icon pwg-icon-filter-del"> </span></a>
<?php endif; ?>
	<a href="<?php echo $this->_tpl_vars['block']->data['U_CATEGORIES']; ?>
"><?php echo Template::mod_translate('Albums'); ?>
</a>
</dt>
<dd>
<?php $this->assign('ref_level', 0); ?>
<?php $_from = $this->_tpl_vars['block']->data['MENU_CATEGORIES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
<?php if ($this->_tpl_vars['cat']['LEVEL'] > $this->_tpl_vars['ref_level']): ?>
  <ul>
<?php else: ?>
    </li>
    <?php echo str_repeat('</ul></li>', $this->_tpl_vars['ref_level']-$this->_tpl_vars['cat']['LEVEL']); ?>

<?php endif; ?>
    <li <?php if ($this->_tpl_vars['cat']['SELECTED']): ?>class="selected"<?php endif; ?>>
      <a href="<?php echo $this->_tpl_vars['cat']['URL']; ?>
" <?php if ($this->_tpl_vars['cat']['IS_UPPERCAT']): ?>rel="up"<?php endif; ?> title="<?php echo $this->_tpl_vars['cat']['TITLE']; ?>
"><?php echo $this->_tpl_vars['cat']['NAME']; ?>
</a>
<?php if ($this->_tpl_vars['cat']['count_images'] > 0): ?>
      <span class="<?php if ($this->_tpl_vars['cat']['nb_images'] > 0): ?>menuInfoCat<?php else: ?>menuInfoCatByChild<?php endif; ?>" title="<?php echo $this->_tpl_vars['cat']['TITLE']; ?>
">[<?php echo $this->_tpl_vars['cat']['count_images']; ?>
]</span>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['cat']['icon_ts'] )): ?>
      <img title="<?php echo $this->_tpl_vars['cat']['icon_ts']['TITLE']; ?>
" src="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
<?php echo $this->_tpl_vars['themeconf']['icon_dir']; ?>
/recent<?php if ($this->_tpl_vars['cat']['icon_ts']['IS_CHILD_DATE']): ?>_by_child<?php endif; ?>.png" class="icon" alt="(!)">
<?php endif; ?>
  <?php $this->assign('ref_level', $this->_tpl_vars['cat']['LEVEL']); ?>
<?php endforeach; endif; unset($_from); ?>
<?php echo str_repeat('</li></ul>', $this->_tpl_vars['ref_level']); ?>


	<p class="totalImages"><?php echo $this->_tpl_vars['pwg']->l10n_dec('%d photo','%d photos',$this->_tpl_vars['block']->data['NB_PICTURE']); ?>
</p>
</dd>