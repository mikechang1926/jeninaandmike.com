<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'footer.tpl', 3, false),array('modifier', 'escape', 'footer.tpl', 13, false),array('function', 'get_combined_scripts', 'footer.tpl', 18, false),)), $this); ?>
<div id="copyright">
<?php if (isset ( $this->_tpl_vars['debug']['TIME'] )): ?>
	<?php echo Template::mod_translate('Page generated in'); ?>
 <?php echo $this->_tpl_vars['debug']['TIME']; ?>
 (<?php echo $this->_tpl_vars['debug']['NB_QUERIES']; ?>
 <?php echo Template::mod_translate('SQL queries in'); ?>
 <?php echo $this->_tpl_vars['debug']['SQL_TIME']; ?>
) -
<?php endif; ?>
	<?php echo Template::mod_translate('Powered by'); ?>
	<a href="<?php echo $this->_tpl_vars['PHPWG_URL']; ?>
" class="Piwigo">Piwigo</a>
	<?php echo $this->_tpl_vars['VERSION']; ?>

<?php if (isset ( $this->_tpl_vars['CONTACT_MAIL'] )): ?>
	- <a href="mailto:<?php echo $this->_tpl_vars['CONTACT_MAIL']; ?>
?subject=<?php echo smarty_modifier_escape(Template::mod_translate('A comment on your site'), 'url'); ?>
"><?php echo Template::mod_translate('Contact webmaster'); ?>
</a>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['TOGGLE_MOBILE_THEME_URL'] )): ?>
	- <?php echo Template::mod_translate('View in'); ?>
 : <a href="<?php echo $this->_tpl_vars['TOGGLE_MOBILE_THEME_URL']; ?>
"><?php echo Template::mod_translate('Mobile'); ?>
</a> | <b><?php echo Template::mod_translate('Desktop'); ?>
</b>
<?php endif; ?>
<?php echo $this->_plugins['function']['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load' => 'footer'), $this);?>


<?php if (isset ( $this->_tpl_vars['footer_elements'] )): ?>
<?php $_from = $this->_tpl_vars['footer_elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<?php echo $this->_tpl_vars['v']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</div> <?php if (isset ( $this->_tpl_vars['debug']['QUERIES_LIST'] )): ?>
<div id="debug">
<?php echo $this->_tpl_vars['debug']['QUERIES_LIST']; ?>

</div>
<?php endif; ?>
</div></body>
</html>