<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:12
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'footer.tpl', 24, false),array('modifier', 'escape', 'footer.tpl', 37, false),array('function', 'combine_script', 'footer.tpl', 44, false),array('function', 'get_combined_scripts', 'footer.tpl', 56, false),array('block', 'footer_script', 'footer.tpl', 45, false),)), $this); ?>
</div> <!-- pwgMain -->
<?php if (isset ( $this->_tpl_vars['footer_elements'] )): ?>
<?php $_from = $this->_tpl_vars['footer_elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<?php echo $this->_tpl_vars['v']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['debug']['QUERIES_LIST'] )): ?>
<div id="debug">
<?php echo $this->_tpl_vars['debug']['QUERIES_LIST']; ?>

</div>
<?php endif; ?>

<div id="footer">
  <div id="piwigoInfos">
 
  <?php echo Template::mod_translate('Powered by'); ?>

  <a class="externalLink" href="<?php echo $this->_tpl_vars['PHPWG_URL']; ?>
" title="<?php echo Template::mod_translate('Visit Piwigo project website'); ?>
">
  <span class="Piwigo">Piwigo</span></a>
  <?php echo $this->_tpl_vars['VERSION']; ?>

  | <a class="externalLink" href="<?php echo $this->_tpl_vars['pwgmenu']['WIKI']; ?>
" title="<?php echo Template::mod_translate('Read Piwigo Documentation'); ?>
"><?php echo Template::mod_translate('Documentation'); ?>
</a>
  | <a class="externalLink" href="<?php echo $this->_tpl_vars['pwgmenu']['FORUM']; ?>
" title="<?php echo Template::mod_translate('Get Support on Piwigo Forum'); ?>
"><?php echo Template::mod_translate('Support'); ?>
</a>
  </div> <!-- piwigoInfos -->

  <div id="pageInfos">
<?php if (isset ( $this->_tpl_vars['debug']['TIME'] )): ?>
 <?php echo Template::mod_translate('Page generated in'); ?>
 <?php echo $this->_tpl_vars['debug']['TIME']; ?>
 (<?php echo $this->_tpl_vars['debug']['NB_QUERIES']; ?>
 <?php echo Template::mod_translate('SQL queries in'); ?>
 <?php echo $this->_tpl_vars['debug']['SQL_TIME']; ?>
) -
<?php endif; ?>
  <?php echo Template::mod_translate('Contact'); ?>

  <a href="mailto:<?php echo $this->_tpl_vars['CONTACT_MAIL']; ?>
?subject=<?php echo smarty_modifier_escape(Template::mod_translate('A comment on your site'), 'url'); ?>
"><?php echo Template::mod_translate('Webmaster'); ?>
</a>
  </div> <!-- pageInfos -->

</div> <!-- footer -->
</div> <!-- the_page -->


<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.tipTip','load' => 'async','path' => 'themes/default/js/plugins/jquery.tipTip.minified.js'), $this);?>

<?php $this->_tag_stack[] = array('footer_script', array('require' => 'jquery.tipTip')); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
jQuery(document).ready(function() {
	jQuery('#pwgHead A[title], #footer A[title], .themeActions .tiptip, .languageActions .tiptip').tipTip({
			'delay' : 0,
			'fadeIn' : 200,
			'fadeOut' : 200
	});
});
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<!-- BEGIN get_combined_scripts -->
<?php echo $this->_plugins['function']['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load' => 'footer'), $this);?>

<!-- END get_combined_scripts -->

<?php echo '
<script type=\'text/javascript\'>
  jQuery(document).ready(function() {
    $("a.externalLink").click(function() {
      window.open($(this).attr("href"));
      return false;
    });
  });
</script>
'; ?>


<?php if (! $this->_tpl_vars['ENABLE_SYNCHRONIZATION']): ?>
<?php echo '
<script type=\'text/javascript\'>
  $(document).ready(function() {
    $("#helpSynchro").hide();
  });
</script>
'; ?>

<?php endif; ?>

</body>
</html>