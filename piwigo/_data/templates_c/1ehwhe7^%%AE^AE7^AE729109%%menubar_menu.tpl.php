<?php /* Smarty version 2.6.26, created on 2013-02-21 22:17:10
         compiled from menubar_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'menubar_menu.tpl', 1, false),array('modifier', 'escape', 'menubar_menu.tpl', 9, false),)), $this); ?>
<dt><?php echo Template::mod_translate('Menu'); ?>
</dt>
<dd>
<?php if (isset ( $this->_tpl_vars['block']->data['qsearch'] ) && $this->_tpl_vars['block']->data['qsearch'] == true): ?>
	<form action="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
qsearch.php" method="get" id="quicksearch" onsubmit="return this.q.value!='' && this.q.value!=qsearch_prompt;">
		<p style="margin:0;padding:0">
			<input type="text" name="q" id="qsearchInput" onfocus="if (value==qsearch_prompt) value='';" onblur="if (value=='') value=qsearch_prompt;" style="width:90%">
		</p>
	</form>
	<script type="text/javascript">var qsearch_prompt="<?php echo smarty_modifier_escape(Template::mod_translate('Quick search'), 'javascript'); ?>
"; document.getElementById('qsearchInput').value=qsearch_prompt;</script>
<?php endif; ?>
	<ul><?php echo ''; ?><?php $_from = $this->_tpl_vars['block']->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?><?php echo ''; ?><?php if (is_array ( $this->_tpl_vars['link'] )): ?><?php echo '<li><a href="'; ?><?php echo $this->_tpl_vars['link']['URL']; ?><?php echo '" title="'; ?><?php echo $this->_tpl_vars['link']['TITLE']; ?><?php echo '"'; ?><?php if (isset ( $this->_tpl_vars['link']['REL'] )): ?><?php echo ' '; ?><?php echo $this->_tpl_vars['link']['REL']; ?><?php echo ''; ?><?php endif; ?><?php echo '>'; ?><?php echo $this->_tpl_vars['link']['NAME']; ?><?php echo '</a></li>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
</ul>
</dd>