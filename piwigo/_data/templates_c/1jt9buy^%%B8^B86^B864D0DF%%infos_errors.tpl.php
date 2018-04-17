<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from infos_errors.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['errors'] )): ?>
<div class="errors">
  <ul>
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
    <li><?php echo $this->_tpl_vars['error']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
  </ul>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['infos'] )): ?>
<div class="infos">
  <ul>
<?php $_from = $this->_tpl_vars['infos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
    <li><?php echo $this->_tpl_vars['info']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
  </ul>
</div>
<?php endif; ?>