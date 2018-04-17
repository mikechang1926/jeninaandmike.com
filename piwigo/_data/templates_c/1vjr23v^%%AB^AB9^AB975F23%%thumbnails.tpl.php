<?php /* Smarty version 2.6.26, created on 2013-02-21 22:16:02
         compiled from thumbnails.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_script', 'thumbnails.tpl', 2, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['thumbnails'] )): ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'klass','path' => 'themes/smartpocket/js/klass.min.js'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'photoswipe','path' => 'themes/smartpocket/js/code.photoswipe.jquery.min.js','require' => 'klass,jquery.mobile'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'smartpocket','path' => 'themes/smartpocket/js/smartpocket.js','require' => 'photoswipe'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.ajaxmanager','path' => 'themes/default/js/plugins/jquery.ajaxmanager.js','load' => 'footer'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'thumbnails.loader','path' => 'themes/default/js/thumbnails.loader.js','require' => 'jquery.ajaxmanager','load' => 'footer'), $this);?>


<ul class="thumbnails">
<?php $_from = $this->_tpl_vars['thumbnails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thumbnail']):
?><?php echo ''; ?><?php $this->assign('derivative', $this->_tpl_vars['pwg']->derivative($this->_tpl_vars['thumbnail_derivative_params'],$this->_tpl_vars['thumbnail']['src_image'])); ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['page_selection'][$this->_tpl_vars['thumbnail']['id']] )): ?><?php echo '<li><a href="'; ?><?php echo $this->_tpl_vars['pwg']->derivative_url($this->_tpl_vars['picture_derivative_params'],$this->_tpl_vars['thumbnail']['src_image']); ?><?php echo '" rel="external"><img '; ?><?php if (! $this->_tpl_vars['derivative']->is_cached()): ?><?php echo 'data-'; ?><?php endif; ?><?php echo 'src="'; ?><?php echo $this->_tpl_vars['derivative']->get_url(); ?><?php echo '" alt="'; ?><?php echo $this->_tpl_vars['thumbnail']['TN_ALT']; ?><?php echo '"></a></li>'; ?><?php else: ?><?php echo '<li style="display:none;"><a href="'; ?><?php echo $this->_tpl_vars['pwg']->derivative_url($this->_tpl_vars['picture_derivative_params'],$this->_tpl_vars['thumbnail']['src_image']); ?><?php echo '" rel="external"></a></li>'; ?><?php endif; ?><?php echo ''; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>