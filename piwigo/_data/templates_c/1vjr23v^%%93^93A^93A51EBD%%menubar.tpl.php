<?php /* Smarty version 2.6.26, created on 2013-02-21 22:15:53
         compiled from menubar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'menubar.tpl', 4, false),array('block', 'footer_script', 'menubar.tpl', 25, false),)), $this); ?>
<select name="identification" id="identification" data-icon="grid" data-iconpos="notext" data-native-menu="false">

  <option></option>
  <optgroup label="<?php echo Template::mod_translate('Identification'); ?>
">

<?php if (isset ( $this->_tpl_vars['U_REGISTER'] )): ?>
	<option value="<?php echo $this->_tpl_vars['U_REGISTER']; ?>
"><?php echo Template::mod_translate('Register'); ?>
</option>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_LOGIN'] )): ?>
	<option value="<?php echo $this->_tpl_vars['U_LOGIN']; ?>
"><?php echo Template::mod_translate('Login'); ?>
</option>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_LOGOUT'] )): ?>
	<option value="<?php echo $this->_tpl_vars['U_LOGOUT']; ?>
"><?php echo Template::mod_translate('Logout'); ?>
</option>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_PROFILE'] )): ?>
	<option value="<?php echo $this->_tpl_vars['U_PROFILE']; ?>
"><?php echo Template::mod_translate('Customize'); ?>
</option>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_ADMIN'] )): ?>
	<option value="<?php echo $this->_tpl_vars['U_ADMIN']; ?>
"><?php echo Template::mod_translate('Administration'); ?>
</option>
<?php endif; ?>
  </optgroup>

</select>

<?php $this->_tag_stack[] = array('footer_script', array()); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
$(document).ready(function() {
  $(\'#identification\').change(function() {
    $(this).selectmenu(\'close\');
    window.location = this.value;
  });
});
'; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>