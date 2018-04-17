<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:17
         compiled from include/add_album.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'footer_script', 'include/add_album.inc.tpl', 1, false),array('modifier', 'translate', 'include/add_album.inc.tpl', 92, false),array('function', 'html_options', 'include/add_album.inc.tpl', 95, false),)), $this); ?>
<?php $this->_tag_stack[] = array('footer_script', array()); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
jQuery(document).ready(function(){
  function fillCategoryListbox(selectId, selectedValue) {
    jQuery.getJSON(
      "ws.php?format=json&method=pwg.categories.getList",
      {
        recursive: true,
        fullname: true,
        format: "json",
      },
      function(data) {
        jQuery.each(
          data.result.categories,
          function(i,category) {
            var selected = null;
            if (category.id == selectedValue) {
              selected = "selected";
            }
            
            jQuery("<option/>")
              .attr("value", category.id)
              .attr("selected", selected)
              .text(category.name)
              .appendTo("#"+selectId)
              ;
          }
        );
      }
    );
  }

  jQuery(".addAlbumOpen").colorbox({
    inline:true,
    href:"#addAlbumForm",
    onComplete:function(){
      jQuery("input[name=category_name]").focus();
    }
  });

  jQuery("#addAlbumForm form").submit(function(){
      jQuery("#categoryNameError").text("");

      jQuery.ajax({
        url: "ws.php?format=json&method=pwg.categories.add",
        data: {
          parent: jQuery("select[name=category_parent] option:selected").val(),
          name: jQuery("input[name=category_name]").val(),
        },
        beforeSend: function() {
          jQuery("#albumCreationLoading").show();
        },
        success:function(html) {
          jQuery("#albumCreationLoading").hide();

          var newAlbum = jQuery.parseJSON(html).result.id;
          jQuery(".addAlbumOpen").colorbox.close();

          jQuery("#albumSelect").find("option").remove();
          fillCategoryListbox("albumSelect", newAlbum);

          /* we refresh the album creation form, in case the user wants to create another album */
          jQuery("#category_parent").find("option").remove();

          jQuery("<option/>")
            .attr("value", 0)
            .text("------------")
            .appendTo("#category_parent")
          ;

          fillCategoryListbox("category_parent", newAlbum);

          jQuery("#addAlbumForm form input[name=category_name]").val(\'\');

          jQuery("#albumSelection").show();

          return true;
        },
        error:function(XMLHttpRequest, textStatus, errorThrows) {
            jQuery("#albumCreationLoading").hide();
            jQuery("#categoryNameError").text(errorThrows).css("color", "red");
        }
      });

      return false;
  });
});
'; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div style="display:none">
  <div id="addAlbumForm" style="text-align:left;padding:1em;">
    <form>
      <?php echo Template::mod_translate('Parent album'); ?>
<br>
      <select id ="category_parent" name="category_parent">
        <option value="0">------------</option>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category_parent_options'],'selected' => $this->_tpl_vars['category_parent_options_selected']), $this);?>

      </select>

      <br><br><?php echo Template::mod_translate('Album name'); ?>
<br><input name="category_name" type="text" maxlength="255"> <span id="categoryNameError"></span>
      <br><br><br><input type="submit" value="<?php echo Template::mod_translate('Create'); ?>
"> <span id="albumCreationLoading" style="display:none"><img src="themes/default/images/ajax-loader-small.gif"></span>
    </form>
  </div>
</div>