<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:12
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_css', 'header.tpl', 19, false),array('function', 'get_combined_scripts', 'header.tpl', 25, false),array('function', 'combine_script', 'header.tpl', 28, false),array('modifier', 'translate', 'header.tpl', 56, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $this->_tpl_vars['lang_info']['code']; ?>
" dir="<?php echo $this->_tpl_vars['lang_info']['direction']; ?>
">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['CONTENT_ENCODING']; ?>
">
<meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
<title><?php echo $this->_tpl_vars['GALLERY_TITLE']; ?>
 :: <?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
<?php echo $this->_tpl_vars['themeconf']['icon_dir']; ?>
/favicon.ico">

<?php echo '<!-- COMBINED_CSS -->' ?>
<?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
<?php if ($this->_tpl_vars['theme']['load_css']): ?>
<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "admin/themes/".($this->_tpl_vars['theme']['id'])."/theme.css",'order' => -10), $this);?>

<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['local_head'] )): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['theme']['local_head'], 'smarty_include_vars' => array('load_css' => $this->_tpl_vars['theme']['load_css'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<!-- BEGIN get_combined_scripts -->
<?php echo $this->_plugins['function']['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load' => 'header'), $this);?>

<!-- END get_combined_scripts -->

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery','path' => 'themes/default/js/jquery.min.js'), $this);?>


<!--[if lt IE 7]>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
themes/default/js/pngfix.js"></script>
<![endif]-->

<?php if (! empty ( $this->_tpl_vars['head_elements'] )): ?>
<?php $_from = $this->_tpl_vars['head_elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['elt']):
?>
<?php echo $this->_tpl_vars['elt']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

</head>

<body id="<?php echo $this->_tpl_vars['BODY_ID']; ?>
">

<div id="the_page">

<?php if (! empty ( $this->_tpl_vars['header_msgs'] )): ?>
<div class="header_msgs">
<?php $_from = $this->_tpl_vars['header_msgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['elt']):
?>
  <?php echo $this->_tpl_vars['elt']; ?>

<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<div id="pwgHead">
  <h1>
    <a href="<?php echo $this->_tpl_vars['U_RETURN']; ?>
" title="<?php echo Template::mod_translate('Visit Gallery'); ?>
">
      <img src="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
admin/themes/<?php echo $this->_tpl_vars['theme']['id']; ?>
/icon/home.png" alt="<?php echo Template::mod_translate('Home'); ?>
">
      <?php echo $this->_tpl_vars['GALLERY_TITLE']; ?>

    </a>
  </h1>

  <div id="headActions">
    <?php echo Template::mod_translate('Hello'); ?>
 <?php echo $this->_tpl_vars['USERNAME']; ?>
 :
    <a href="<?php echo $this->_tpl_vars['U_RETURN']; ?>
"><?php echo Template::mod_translate('Visit Gallery'); ?>
</a> |
    <a href="<?php echo $this->_tpl_vars['U_CHANGE_THEME']; ?>
" title="<?php echo Template::mod_translate('Switch to clear or dark colors for administration'); ?>
"><?php echo Template::mod_translate('Change Admin Colors'); ?>
</a> |
    <a href="<?php echo $this->_tpl_vars['U_FAQ']; ?>
" title="<?php echo Template::mod_translate('Instructions to use Piwigo'); ?>
"><?php echo Template::mod_translate('Help Me'); ?>
</a> |
    <a href="<?php echo $this->_tpl_vars['U_LOGOUT']; ?>
"><?php echo Template::mod_translate('Logout'); ?>
</a>
  </div>
</div>

<div style="clear:both;"></div>

<?php if (! empty ( $this->_tpl_vars['header_notes'] )): ?>
<div class="header_notes">
<?php $_from = $this->_tpl_vars['header_notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['elt']):
?>
  <?php echo $this->_tpl_vars['elt']; ?>

<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<div id="pwgMain">