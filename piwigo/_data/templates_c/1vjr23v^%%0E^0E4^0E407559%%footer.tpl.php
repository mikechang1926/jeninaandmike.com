<?php /* Smarty version 2.6.26, created on 2013-02-21 22:15:53
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_extent', 'footer.tpl', 2, false),array('modifier', 'translate', 'footer.tpl', 6, false),array('modifier', 'escape', 'footer.tpl', 10, false),array('block', 'footer_script', 'footer.tpl', 17, false),array('function', 'get_combined_scripts', 'footer.tpl', 20, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['navbar'] )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_plugins['modifier']['get_extent'][0][0]->get_extent('navigation_bar.tpl', 'navbar'), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<div class="pwg_footer ui-bar-a">
  <h6>
	<?php echo Template::mod_translate('Powered by'); ?>
	<a href="<?php echo $this->_tpl_vars['PHPWG_URL']; ?>
" class="Piwigo">Piwigo</a>
	<?php echo $this->_tpl_vars['VERSION']; ?>

<?php if (isset ( $this->_tpl_vars['CONTACT_MAIL'] )): ?>
	- <?php echo Template::mod_translate('Contact'); ?>

	<a href="mailto:<?php echo $this->_tpl_vars['CONTACT_MAIL']; ?>
?subject=<?php echo smarty_modifier_escape(Template::mod_translate('A comment on your site'), 'url'); ?>
"><?php echo Template::mod_translate('Webmaster'); ?>
</a>
<?php endif; ?>
  <br><?php echo Template::mod_translate('View in'); ?>
 :
    <b><?php echo Template::mod_translate('Mobile'); ?>
</b> | <a href="<?php echo $this->_tpl_vars['TOGGLE_MOBILE_THEME_URL']; ?>
"><?php echo Template::mod_translate('Desktop'); ?>
</a>
  </h6>
</div>
<?php endif; ?>
<?php $this->_tag_stack[] = array('footer_script', array('require' => 'jquery')); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
document.cookie = 'screen_size='+jQuery(document).width()+'x'+jQuery(document).height()+';path=<?php echo $this->_tpl_vars['COOKIE_PATH']; ?>
';
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php echo $this->_plugins['function']['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load' => 'footer'), $this);?>

</div><!-- /page -->

</body>
</html>