<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:12
         compiled from intro.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_script', 'intro.tpl', 1, false),array('block', 'footer_script', 'intro.tpl', 3, false),array('modifier', 'translate', 'intro.tpl', 4, false),array('modifier', 'escape', 'intro.tpl', 4, false),array('modifier', 'htmlspecialchars', 'intro.tpl', 45, false),array('modifier', 'nl2br', 'intro.tpl', 45, false),array('modifier', 'sprintf', 'intro.tpl', 45, false),)), $this); ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.cluetip','load' => 'async','require' => 'jquery','path' => 'themes/default/js/plugins/jquery.cluetip.js'), $this);?>


<?php $this->_tag_stack[] = array('footer_script', array('require' => 'jquery.cluetip')); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
var piwigo_need_update_msg = '<a href="admin.php?page=updates"><?php echo smarty_modifier_escape(Template::mod_translate('A new version of Piwigo is available.'), 'javascript'); ?>
</a>';
var ext_need_update_msg = '<a href="admin.php?page=updates&amp;tab=ext"><?php echo smarty_modifier_escape(Template::mod_translate('Some upgrades are available for extensions.'), 'javascript'); ?>
</a>';

<?php echo '
jQuery().ready(function(){
	jQuery(\'.cluetip\').cluetip({
		width: 300,
		splitTitle: \'|\',
		positionBy: \'bottomTop\'
	});
  jQuery.ajax({
    type: \'GET\',
    url: \'ws.php\',
    dataType: \'json\',
    data: { method: \'pwg.extensions.checkUpdates\', format: \'json\' },
    timeout: 5000,
    success: function (data) {
      if (data[\'stat\'] != \'ok\')
        return;
      piwigo_update = data[\'result\'][\'piwigo_need_update\'];
      ext_update = data[\'result\'][\'ext_need_update\']
      if ((piwigo_update || ext_update) && !jQuery(".warnings").is(\'div\'))
        jQuery("#content").prepend(\'<div class="warnings"><ul></ul></div>\');
      if (piwigo_update)
        jQuery(".warnings ul").append(\'<li>\'+piwigo_need_update_msg+\'</li>\');
      if (ext_update)
        jQuery(".warnings ul").append(\'<li>\'+ext_need_update_msg+\'</li>\');
    }
  });  
});
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<h2><?php echo Template::mod_translate('Piwigo Administration'); ?>
</h2>
<dl style="padding-top: 30px;">
  <dt><?php echo Template::mod_translate('Piwigo version'); ?>
</dt>
  <dd>
    <ul>
      <li><a href="<?php echo $this->_tpl_vars['PHPWG_URL']; ?>
" class="externalLink">Piwigo</a> <?php echo $this->_tpl_vars['PWG_VERSION']; ?>
</li>
      <li><a href="<?php echo $this->_tpl_vars['U_CHECK_UPGRADE']; ?>
"><?php echo Template::mod_translate('Check for upgrade'); ?>
</a></li>
<?php if (isset ( $this->_tpl_vars['SUBSCRIBE_BASE_URL'] )): ?>
      <li><a href="<?php echo $this->_tpl_vars['SUBSCRIBE_BASE_URL']; ?>
<?php echo $this->_tpl_vars['EMAIL']; ?>
" class="externalLink cluetip" title="<?php echo Template::mod_translate('Piwigo Announcements Newsletter'); ?>
|<?php echo smarty_modifier_nl2br(htmlspecialchars(Template::mod_translate('Keep in touch with Piwigo project, subscribe to Piwigo Announcement Newsletter. You will receive emails when a new release is available (sometimes including a security bug fix, it\'s important to know and upgrade) and when major events happen to the project. Only a few emails a year.'))); ?>
"><?php echo sprintf(Template::mod_translate('Subscribe %s to Piwigo Announcements Newsletter'), $this->_tpl_vars['EMAIL']); ?>
</a></li>
<?php endif; ?>
    </ul>
  </dd>

  <dt><?php echo Template::mod_translate('Environment'); ?>
</dt>
  <dd>
    <ul>
      <li><?php echo Template::mod_translate('Operating system'); ?>
: <?php echo $this->_tpl_vars['OS']; ?>
</li>
      <li>PHP: <?php echo $this->_tpl_vars['PHP_VERSION']; ?>
 (<a href="<?php echo $this->_tpl_vars['U_PHPINFO']; ?>
" class="externalLink"><?php echo Template::mod_translate('Show info'); ?>
</a>)  [<?php echo $this->_tpl_vars['PHP_DATATIME']; ?>
]</li>
      <li><?php echo $this->_tpl_vars['DB_ENGINE']; ?>
: <?php echo $this->_tpl_vars['DB_VERSION']; ?>
 [<?php echo $this->_tpl_vars['DB_DATATIME']; ?>
]</li>
<?php if (isset ( $this->_tpl_vars['GRAPHICS_LIBRARY'] )): ?>
      <li><?php echo Template::mod_translate('Graphics Library'); ?>
: <?php echo $this->_tpl_vars['GRAPHICS_LIBRARY']; ?>
</li>
<?php endif; ?>
    </ul>
  </dd>

  <dt><?php echo Template::mod_translate('Database'); ?>
</dt>
  <dd>
    <ul>
      <li>
        <?php echo $this->_tpl_vars['DB_ELEMENTS']; ?>

<?php if (isset ( $this->_tpl_vars['first_added'] )): ?>
        (<?php echo $this->_tpl_vars['first_added']['DB_DATE']; ?>
)
<?php endif; ?>
      </li>
      <li><?php echo $this->_tpl_vars['DB_CATEGORIES']; ?>
 (<?php echo $this->_tpl_vars['DB_IMAGE_CATEGORY']; ?>
)</li>
      <li><?php echo $this->_tpl_vars['DB_TAGS']; ?>
 (<?php echo $this->_tpl_vars['DB_IMAGE_TAG']; ?>
)</li>
      <li><?php echo $this->_tpl_vars['DB_USERS']; ?>
</li>
      <li><?php echo $this->_tpl_vars['DB_GROUPS']; ?>
</li>
<?php if (isset ( $this->_tpl_vars['DB_COMMENTS'] )): ?>
      <li>
        <?php echo $this->_tpl_vars['DB_COMMENTS']; ?>

<?php if (isset ( $this->_tpl_vars['unvalidated'] )): ?>
        (<a href="<?php echo $this->_tpl_vars['unvalidated']['URL']; ?>
"><?php echo $this->_tpl_vars['unvalidated']['INFO']; ?>
</a>)
<?php endif; ?>
      </li>
<?php endif; ?>
			<li><?php echo $this->_tpl_vars['DB_RATES']; ?>
</li>
    </ul>
  </dd>
</dl>

<?php if ($this->_tpl_vars['ENABLE_SYNCHRONIZATION']): ?>
<form name="QuickSynchro" action="<?php echo $this->_tpl_vars['U_CAT_UPDATE']; ?>
" method="post" id="QuickSynchro" style="display: block; text-align:right;">
<div>
<input type="hidden" name="sync" value="files" checked="checked">
<input type="hidden" name="display_info" value="1" checked="checked">
<input type="hidden" name="add_to_caddie" value="1" checked="checked">
<input type="hidden" name="privacy_level" value="0" checked="checked">
<input type="hidden" name="sync_meta" checked="checked">
<input type="hidden" name="simulate" value="0">
<input type="hidden" name="subcats-included" value="1" checked="checked">
</div>
<div class="bigbutton">
<span class="bigtext"><?php echo Template::mod_translate('Quick Local Synchronization'); ?>
</span>
<input type="submit" value="<?php echo Template::mod_translate('Quick Local Synchronization'); ?>
" name="submit">
</div>
</form>
<?php endif; ?>