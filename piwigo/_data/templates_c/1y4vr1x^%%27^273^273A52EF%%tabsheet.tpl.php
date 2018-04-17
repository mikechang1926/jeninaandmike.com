<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:17
         compiled from tabsheet.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['tabsheet'] ) && count ( $this->_tpl_vars['tabsheet'] )): ?>
<div id="tabsheet">
<ul class="tabsheet">
<?php $_from = $this->_tpl_vars['tabsheet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['sheet']):
?>
  <li class="<?php if (( $this->_tpl_vars['name'] == $this->_tpl_vars['tabsheet_selected'] )): ?>selected_tab<?php else: ?>normal_tab<?php endif; ?>">
    <a href="<?php echo $this->_tpl_vars['sheet']['url']; ?>
"><span><?php echo $this->_tpl_vars['sheet']['caption']; ?>
</span></a>
  </li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>