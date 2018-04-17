<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from menubar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_extent', 'menubar.tpl', 6, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['blocks'] )): ?>
<div id="menubar">
<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['block']):
?>
	<dl id="<?php echo $this->_tpl_vars['id']; ?>
">
<?php if (! empty ( $this->_tpl_vars['block']->template )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_plugins['modifier']['get_extent'][0][0]->get_extent($this->_tpl_vars['block']->template, $this->_tpl_vars['id']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
		<?php echo $this->_tpl_vars['block']->raw_content; ?>

<?php endif; ?>
	</dl>
<?php endforeach; endif; unset($_from); ?>
</div><div id="menuSwitcher"></div>
<?php endif; ?>