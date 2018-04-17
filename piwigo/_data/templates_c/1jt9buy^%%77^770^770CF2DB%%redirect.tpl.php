<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:03
         compiled from redirect.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'html_head', 'redirect.tpl', 1, false),array('modifier', 'translate', 'redirect.tpl', 11, false),)), $this); ?>
<?php $this->_tag_stack[] = array('html_head', array()); $_block_repeat=true;$this->_plugins['block']['html_head'][0][0]->block_html_head($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<style type="text/css">#the_page {text-align:center;} </style>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['html_head'][0][0]->block_html_head($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div>
	<?php echo $this->_tpl_vars['REDIRECT_MSG']; ?>

</div>

<p style="margin: 2em">
	<a href="<?php echo $this->_tpl_vars['page_refresh']['U_REFRESH']; ?>
">
		<?php echo Template::mod_translate('Click here if your browser does not automatically forward you'); ?>

	</a>
</p>