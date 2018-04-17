<?php /* Smarty version 2.6.26, created on 2013-02-21 22:13:23
         compiled from extend_for_templates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'extend_for_templates.tpl', 1, false),array('function', 'html_options', 'extend_for_templates.tpl', 20, false),)), $this); ?>
<div class="titrePage"><h2><?php echo Template::mod_translate('Extend for templates'); ?>
</h2>
</div>
<?php if (isset ( $this->_tpl_vars['extents'] )): ?>
<h4><?php echo Template::mod_translate('Replacement of original templates by customized templates from template-extension subfolder'); ?>
</h4>
<form method="post" name="extend_for_templates" id="extend_for_templates" action="">
  <table class="table2">
    <tr class="throw">
      <th><?php echo Template::mod_translate('Replacers (customized templates)'); ?>
</th>
      <th><?php echo Template::mod_translate('Original templates'); ?>
</th>
      <th><?php echo Template::mod_translate('Optional URL keyword'); ?>
</th>
      <th><?php echo Template::mod_translate('Bound Theme'); ?>
</th>
    </tr>
<?php $_from = $this->_tpl_vars['extents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['extent_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['extent_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tpl']):
        $this->_foreach['extent_loop']['iteration']++;
?>
    <tr class="<?php if ((1 & ($this->_foreach['extent_loop']['iteration']-1))): ?>row1<?php else: ?>row2<?php endif; ?>">
      <td>
        <input type="hidden" name="reptpl[]" value="<?php echo $this->_tpl_vars['tpl']['replacer']; ?>
">
        <?php echo $this->_tpl_vars['tpl']['replacer']; ?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name' => "original[]",'output' => $this->_tpl_vars['tpl']['original_tpl'],'values' => $this->_tpl_vars['tpl']['original_tpl'],'selected' => $this->_tpl_vars['tpl']['selected_tpl']), $this);?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name' => "url[]",'output' => $this->_tpl_vars['tpl']['url_parameter'],'values' => $this->_tpl_vars['tpl']['url_parameter'],'selected' => $this->_tpl_vars['tpl']['selected_url']), $this);?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name' => "bound[]",'output' => $this->_tpl_vars['tpl']['bound_tpl'],'values' => $this->_tpl_vars['tpl']['bound_tpl'],'selected' => $this->_tpl_vars['tpl']['selected_bound']), $this);?>

      </td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
  </table>
  <p>
    <input class="submit" type="submit" value="<?php echo Template::mod_translate('Submit'); ?>
" name="submit">
  </p>
</form>
<?php endif; ?>