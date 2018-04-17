<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from identification.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'identification.tpl', 7, false),array('modifier', 'urlencode', 'identification.tpl', 43, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['MENUBAR'] )): ?><?php echo $this->_tpl_vars['MENUBAR']; ?>
<?php endif; ?>
<div id="content" class="content<?php if (isset ( $this->_tpl_vars['MENUBAR'] )): ?> contentWithMenu<?php endif; ?>">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<h2><a href="<?php echo $this->_tpl_vars['U_HOME']; ?>
"><?php echo Template::mod_translate('Home'); ?>
</a><?php echo $this->_tpl_vars['LEVEL_SEPARATOR']; ?>
<?php echo Template::mod_translate('Identification'); ?>
</h2>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'infos_errors.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form action="<?php echo $this->_tpl_vars['F_LOGIN_ACTION']; ?>
" method="post" name="login_form" class="properties">
  <fieldset>
    <legend><?php echo Template::mod_translate('Connection settings'); ?>
</legend>

    <ul>
      <li>
        <span class="property">
          <label for="username"><?php echo Template::mod_translate('Username'); ?>
</label>
        </span>
        <input tabindex="1" class="login" type="text" name="username" id="username" size="25" maxlength="40">
      </li>

      <li>
        <span class="property">
          <label for="password"><?php echo Template::mod_translate('Password'); ?>
</label>
        </span>
        <input tabindex="2" class="login" type="password" name="password" id="password" size="25" maxlength="25">
      </li>

<?php if ($this->_tpl_vars['authorize_remembering']): ?>
      <li>
        <span class="property">
          <label for="remember_me"><?php echo Template::mod_translate('Auto login'); ?>
</label>
        </span>
        <input tabindex="3" type="checkbox" name="remember_me" id="remember_me" value="1">
      </li>
<?php endif; ?>
    </ul>
  </fieldset>

  <p>
    <input type="hidden" name="redirect" value="<?php echo urlencode($this->_tpl_vars['U_REDIRECT']); ?>
">
    <input tabindex="4" type="submit" name="login" value="<?php echo Template::mod_translate('Submit'); ?>
">
  </p>

	<p>
<?php if (isset ( $this->_tpl_vars['U_REGISTER'] )): ?>
		<a href="<?php echo $this->_tpl_vars['U_REGISTER']; ?>
" title="<?php echo Template::mod_translate('Register'); ?>
" class="pwg-state-default pwg-button">
			<span class="pwg-icon pwg-icon-register">&nbsp;</span><span><?php echo Template::mod_translate('Register'); ?>
</span>
		</a>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['U_LOST_PASSWORD'] )): ?>
		<a href="<?php echo $this->_tpl_vars['U_LOST_PASSWORD']; ?>
" title="<?php echo Template::mod_translate('Forgot your password?'); ?>
" class="pwg-state-default pwg-button">
			<span class="pwg-icon pwg-icon-lost-password">&nbsp;</span><span><?php echo Template::mod_translate('Forgot your password?'); ?>
</span>
		</a>
<?php endif; ?>
	</p>

</form>

<script type="text/javascript"><!--
document.login_form.username.focus();
//--></script>

</div> <!-- content -->