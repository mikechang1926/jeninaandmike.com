<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from /home/changmik/public_html/jeninaandmike.com/piwigo/themes/elegant/local_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_script', '/home/changmik/public_html/jeninaandmike.com/piwigo/themes/elegant/local_head.tpl', 2, false),)), $this); ?>
<?php if ($this->_tpl_vars['BODY_ID'] == 'thePicturePage'): ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'elegant.scripts_pp','load' => 'footer','require' => 'jquery','path' => 'themes/elegant/scripts_pp.js'), $this);?>

<?php else: ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'elegant.scripts','load' => 'footer','require' => 'jquery','path' => 'themes/elegant/scripts.js'), $this);?>

<?php endif; ?>
	<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['ROOT_URL']; ?>
themes/elegant/fix-ie7.css">
	<![endif]-->