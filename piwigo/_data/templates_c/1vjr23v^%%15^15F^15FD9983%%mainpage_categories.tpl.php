<?php /* Smarty version 2.6.26, created on 2013-02-21 22:15:53
         compiled from mainpage_categories.tpl */ ?>
<ul data-role="listview" data-inset="true">
<?php $_from = $this->_tpl_vars['category_thumbnails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
	<li>
		<a href="<?php echo $this->_tpl_vars['cat']['URL']; ?>
">
		<img src="<?php echo $this->_tpl_vars['pwg']->derivative_url($this->_tpl_vars['thumbnail_derivative_params'],$this->_tpl_vars['cat']['representative']['src_image']); ?>
">
    <h3><?php echo $this->_tpl_vars['cat']['NAME']; ?>
</h3>
		<p class="Nb_images"><?php echo $this->_tpl_vars['cat']['CAPTION_NB_IMAGES']; ?>
</p>
		</a>
  </li>
<?php endforeach; endif; unset($_from); ?>
</ul>
