<?php /* Smarty version 2.6.26, created on 2013-02-21 22:15:53
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'header.tpl', 8, false),array('modifier', 'replace', 'header.tpl', 8, false),array('modifier', 'translate', 'header.tpl', 25, false),array('function', 'combine_css', 'header.tpl', 30, false),array('function', 'get_combined_scripts', 'header.tpl', 39, false),array('function', 'combine_script', 'header.tpl', 41, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $this->_tpl_vars['lang_info']['code']; ?>
" dir="<?php echo $this->_tpl_vars['lang_info']['direction']; ?>
">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['CONTENT_ENCODING']; ?>
">
<meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
<?php if (isset ( $this->_tpl_vars['meta_ref'] )): ?> 
<?php if (isset ( $this->_tpl_vars['INFO_AUTHOR'] )): ?>
<meta name="author" content="<?php echo smarty_modifier_replace(smarty_modifier_strip_tags($this->_tpl_vars['INFO_AUTHOR'], false), '"', ' '); ?>
">
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['related_tags'] )): ?>
<meta name="keywords" content="<?php $_from = $this->_tpl_vars['related_tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tag_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tag_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tag_loop']['iteration']++;
?><?php if (! ($this->_foreach['tag_loop']['iteration'] <= 1)): ?>, <?php endif; ?><?php echo $this->_tpl_vars['tag']['name']; ?>
<?php endforeach; endif; unset($_from); ?>">
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['COMMENT_IMG'] )): ?>
<meta name="description" content="<?php echo smarty_modifier_replace(smarty_modifier_strip_tags($this->_tpl_vars['COMMENT_IMG'], false), '"', ' '); ?>
<?php if (isset ( $this->_tpl_vars['INFO_FILE'] )): ?> - <?php echo $this->_tpl_vars['INFO_FILE']; ?>
<?php endif; ?>">
<?php else: ?>
<meta name="description" content="<?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
<?php if (isset ( $this->_tpl_vars['INFO_FILE'] )): ?> - <?php echo $this->_tpl_vars['INFO_FILE']; ?>
<?php endif; ?>">
<?php endif; ?>
<?php endif; ?>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<?php if (( isset ( $this->_tpl_vars['REVERSE'] ) && $this->_tpl_vars['REVERSE'] && $this->_tpl_vars['PAGE_TITLE'] == l10n ( 'Home' ) )): ?>
<title><?php echo $this->_tpl_vars['GALLERY_TITLE']; ?>
 | <?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
</title><?php else: ?>
<title><?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
 | <?php echo $this->_tpl_vars['GALLERY_TITLE']; ?>
</title><?php endif; ?>
<link rel="start" title="<?php echo Template::mod_translate('Home'); ?>
" href="<?php echo $this->_tpl_vars['U_HOME']; ?>
" >

<?php echo '<!-- COMBINED_CSS -->' ?>
<?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
<?php if ($this->_tpl_vars['theme']['load_css']): ?>
<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "themes/".($this->_tpl_vars['theme']['id'])."/theme.css",'order' => -10), $this);?>

<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['local_head'] )): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['theme']['local_head'], 'smarty_include_vars' => array('load_css' => $this->_tpl_vars['theme']['load_css'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if (isset ( $this->_tpl_vars['U_CANONICAL'] )): ?><link rel="canonical" href="<?php echo $this->_tpl_vars['U_CANONICAL']; ?>
"><?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['page_refresh'] )): ?><meta http-equiv="refresh" content="<?php echo $this->_tpl_vars['page_refresh']['TIME']; ?>
;url=<?php echo $this->_tpl_vars['page_refresh']['U_REFRESH']; ?>
"><?php endif; ?>

<?php echo $this->_plugins['function']['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load' => 'header'), $this);?>


<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery','path' => 'themes/smartpocket/js/jquery-1.6.4.min.js'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'config','path' => 'themes/smartpocket/js/config.js','require' => 'jquery'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.mobile','path' => 'themes/smartpocket/js/jquery.mobile.min.js','require' => 'jquery,config'), $this);?>


</head>

<body>
<div data-role="page" data-theme="a">

<div data-role="header">
  <div class="title">
    <a href="<?php echo $this->_tpl_vars['U_HOME']; ?>
" class="home_button" data-icon="home" data-iconpos="notext" data-role="button"></a>
    <?php echo $this->_tpl_vars['GALLERY_TITLE']; ?>

    <span class="menubar"><?php echo $this->_tpl_vars['MENUBAR']; ?>
</span>
  </div>
</div>
