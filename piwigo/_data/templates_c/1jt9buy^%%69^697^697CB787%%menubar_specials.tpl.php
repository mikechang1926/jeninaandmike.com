<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from menubar_specials.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'menubar_specials.tpl', 1, false),)), $this); ?>
<dt><?php echo Template::mod_translate('Specials'); ?>
</dt>
<dd>
	<ul><?php echo ''; ?><?php $_from = $this->_tpl_vars['block']->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?><?php echo '<li><a href="'; ?><?php echo $this->_tpl_vars['link']['URL']; ?><?php echo '" title="'; ?><?php echo $this->_tpl_vars['link']['TITLE']; ?><?php echo '"'; ?><?php if (isset ( $this->_tpl_vars['link']['REL'] )): ?><?php echo ' '; ?><?php echo $this->_tpl_vars['link']['REL']; ?><?php echo ''; ?><?php endif; ?><?php echo '>'; ?><?php echo $this->_tpl_vars['link']['NAME']; ?><?php echo '</a></li>'; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
</ul>
</dd>