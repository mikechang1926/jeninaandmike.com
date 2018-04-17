<?php /* Smarty version 2.6.26, created on 2013-02-21 22:13:26
         compiled from themes_installed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'footer_script', 'themes_installed.tpl', 2, false),array('modifier', 'translate', 'themes_installed.tpl', 9, false),array('modifier', 'escape', 'themes_installed.tpl', 62, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/colorbox.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<?php $this->_tag_stack[] = array('footer_script', array()); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
jQuery(document).ready(function() {
  $("a.preview-box").colorbox(); 
}); 
'; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div class="titrePage">
  <h2><?php echo Template::mod_translate('Installed Themes'); ?>
</h2>
</div>

<div id="themesContent">

<fieldset>
<legend><?php echo Template::mod_translate('Active Themes'); ?>
</legend>
<?php if (isset ( $this->_tpl_vars['active_themes'] )): ?>
<div class="themeBoxes">
<?php $_from = $this->_tpl_vars['active_themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
  <div class="themeBox<?php if ($this->_tpl_vars['theme']['is_default']): ?> themeDefault<?php endif; ?>">
    <div class="themeName"><?php echo $this->_tpl_vars['theme']['name']; ?>
<?php if ($this->_tpl_vars['theme']['is_default']): ?> <em>(<?php echo Template::mod_translate('default'); ?>
)</em><?php endif; ?> <?php if ($this->_tpl_vars['theme']['mobile']): ?> <em>(<?php echo Template::mod_translate('Mobile'); ?>
)</em><?php endif; ?></div>
    <div class="themeShot"><a href="<?php echo $this->_tpl_vars['theme']['screenshot']; ?>
" class="preview-box" title="<?php echo $this->_tpl_vars['theme']['name']; ?>
"><img src="<?php echo $this->_tpl_vars['theme']['screenshot']; ?>
" alt=""></a></div>
    <div class="themeActions">
      <div>
<?php if ($this->_tpl_vars['theme']['deactivable']): ?>
      <a href="<?php echo $this->_tpl_vars['deactivate_baseurl']; ?>
<?php echo $this->_tpl_vars['theme']['id']; ?>
" class="tiptip" title="<?php echo Template::mod_translate('Forbid this theme to users'); ?>
"><?php echo Template::mod_translate('Deactivate'); ?>
</a>
<?php else: ?>
      <span title="<?php echo $this->_tpl_vars['theme']['deactivate_tooltip']; ?>
" class="tiptip"><?php echo Template::mod_translate('Deactivate'); ?>
</span>
<?php endif; ?>
      
<?php if (! $this->_tpl_vars['theme']['is_default']): ?>
      | <a href="<?php echo $this->_tpl_vars['set_default_baseurl']; ?>
<?php echo $this->_tpl_vars['theme']['id']; ?>
" class="tiptip" title="<?php echo Template::mod_translate('Set as default theme for unregistered and new users'); ?>
"><?php echo Template::mod_translate('Default'); ?>
</a>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['theme']['admin_uri'] )): ?>
      <br><a href="<?php echo $this->_tpl_vars['theme']['admin_uri']; ?>
" class="tiptip" title="<?php echo Template::mod_translate('Configuration'); ?>
"><?php echo Template::mod_translate('Configuration'); ?>
</a>
<?php endif; ?>
      </div>
    </div> <!-- themeActions -->
  </div>
<?php endforeach; endif; unset($_from); ?>
</div> <!-- themeBoxes -->
<?php endif; ?>
</fieldset>

<?php if (isset ( $this->_tpl_vars['inactive_themes'] )): ?>
<fieldset>
<legend><?php echo Template::mod_translate('Inactive Themes'); ?>
</legend>
<div class="themeBoxes">
<?php $_from = $this->_tpl_vars['inactive_themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
  <div class="themeBox">
    <div class="themeName"><?php echo $this->_tpl_vars['theme']['name']; ?>
<?php if ($this->_tpl_vars['theme']['mobile']): ?> <em>(<?php echo Template::mod_translate('Mobile'); ?>
)</em><?php endif; ?></div>
    <div class="themeShot"><a href="<?php echo $this->_tpl_vars['theme']['screenshot']; ?>
" class="preview-box" title="<?php echo $this->_tpl_vars['theme']['name']; ?>
"><img src="<?php echo $this->_tpl_vars['theme']['screenshot']; ?>
" alt=""></a></div>
    <div class="themeActions">
      <div>
<?php if ($this->_tpl_vars['theme']['activable']): ?>
      <a href="<?php echo $this->_tpl_vars['activate_baseurl']; ?>
<?php echo $this->_tpl_vars['theme']['id']; ?>
" title="<?php echo Template::mod_translate('Make this theme available to users'); ?>
" class="tiptip"><?php echo Template::mod_translate('Activate'); ?>
</a>
<?php else: ?>
      <span title="<?php echo $this->_tpl_vars['theme']['activate_tooltip']; ?>
" class="tiptip"><?php echo Template::mod_translate('Activate'); ?>
</span>
<?php endif; ?>
      |

<?php if ($this->_tpl_vars['theme']['deletable']): ?>
      <a href="<?php echo $this->_tpl_vars['delete_baseurl']; ?>
<?php echo $this->_tpl_vars['theme']['id']; ?>
" onclick="return confirm('<?php echo smarty_modifier_escape(Template::mod_translate('Are you sure?'), 'javascript'); ?>
');" title="<?php echo Template::mod_translate('Delete this theme'); ?>
"><?php echo Template::mod_translate('Delete'); ?>
</a>
<?php else: ?>
      <span title="<?php echo $this->_tpl_vars['theme']['delete_tooltip']; ?>
" class="tiptip"><?php echo Template::mod_translate('Delete'); ?>
</span>
<?php endif; ?>
      </div>
    </div>
    
  </div>
<?php endforeach; endif; unset($_from); ?>
</div> <!-- themeBoxes -->
</fieldset>
<?php endif; ?>

</div> <!-- themesContent -->