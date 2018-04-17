<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:17
         compiled from include/colorbox.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_script', 'include/colorbox.inc.tpl', 1, false),array('function', 'combine_css', 'include/colorbox.inc.tpl', 2, false),)), $this); ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.colorbox','load' => 'footer','require' => 'jquery','path' => 'themes/default/js/plugins/jquery.colorbox.min.js'), $this);?>

<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "themes/default/js/plugins/colorbox/style2/colorbox.css"), $this);?>
