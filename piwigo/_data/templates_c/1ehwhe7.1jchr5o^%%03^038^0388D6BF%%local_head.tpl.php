<?php /* Smarty version 2.6.26, created on 2013-02-21 22:17:10
         compiled from /home/changmik/public_html/jeninaandmike.com/piwigo/themes/default/local_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_css', '/home/changmik/public_html/jeninaandmike.com/piwigo/themes/default/local_head.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['load_css']): ?> 
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
themes/default/fix-ie5-ie6.css">
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
themes/default/fix-ie7.css">
	<![endif]-->
	<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "themes/default/print.css",'order' => -10), $this);?>

<?php endif; ?>