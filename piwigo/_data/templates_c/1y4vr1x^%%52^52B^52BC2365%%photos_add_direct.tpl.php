<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:17
         compiled from photos_add_direct.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'combine_script', 'photos_add_direct.tpl', 2, false),array('function', 'combine_css', 'photos_add_direct.tpl', 5, false),array('function', 'html_options', 'photos_add_direct.tpl', 280, false),array('block', 'footer_script', 'photos_add_direct.tpl', 12, false),array('modifier', 'translate', 'photos_add_direct.tpl', 110, false),array('modifier', 'sprintf', 'photos_add_direct.tpl', 292, false),)), $this); ?>
<?php if ($this->_tpl_vars['upload_mode'] == 'multiple'): ?>
<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.jgrowl','load' => 'footer','require' => 'jquery','path' => 'themes/default/js/plugins/jquery.jgrowl_minimized.js'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.uploadify','load' => 'footer','require' => 'jquery','path' => 'admin/include/uploadify/jquery.uploadify.v3.0.0.min.js'), $this);?>

<?php echo $this->_plugins['function']['combine_script'][0][0]->func_combine_script(array('id' => 'jquery.ui.progressbar','load' => 'footer'), $this);?>

<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "admin/themes/default/uploadify.jGrowl.css"), $this);?>

<?php echo $this->_plugins['function']['combine_css'][0][0]->func_combine_css(array('path' => "admin/include/uploadify/uploadify.css"), $this);?>

<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/colorbox.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/add_album.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->_tag_stack[] = array('footer_script', array()); $_block_repeat=true;$this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
jQuery(document).ready(function(){
  function checkUploadStart() {
    var nbErrors = 0;
    jQuery("#formErrors").hide();
    jQuery("#formErrors li").hide();

    if (jQuery("#albumSelect option:selected").length == 0) {
      jQuery("#formErrors #noAlbum").show();
      nbErrors++;
    }

    var nbFiles = 0;
    if (jQuery("#uploadBoxes").size() == 1) {
      jQuery("input[name^=image_upload]").each(function() {
        if (jQuery(this).val() != "") {
          nbFiles++;
        }
      });
    }
    else {
      nbFiles = jQuery(".uploadifyQueueItem").size();
    }

    if (nbFiles == 0) {
      jQuery("#formErrors #noPhoto").show();
      nbErrors++;
    }

    if (nbErrors != 0) {
      jQuery("#formErrors").show();
      return false;
    }
    else {
      return true;
    }

  }

  function humanReadableFileSize(bytes) {
    var byteSize = Math.round(bytes / 1024 * 100) * .01;
    var suffix = \'KB\';

    if (byteSize > 1000) {
      byteSize = Math.round(byteSize *.001 * 100) * .01;
      suffix = \'MB\';
    }

    var sizeParts = byteSize.toString().split(\'.\');
    if (sizeParts.length > 1) {
      byteSize = sizeParts[0] + \'.\' + sizeParts[1].substr(0,2);
    }
    else {
      byteSize = sizeParts[0];
    }

    return byteSize+suffix;
  }

  jQuery("#hideErrors").click(function() {
    jQuery("#formErrors").hide();
    return false;
  });

  jQuery("#uploadWarningsSummary a.showInfo").click(function() {
    jQuery("#uploadWarningsSummary").hide();
    jQuery("#uploadWarnings").show();
  });

  jQuery("#showPermissions").click(function() {
    jQuery(this).parent(".showFieldset").hide();
    jQuery("#permissions").show();
  });

'; ?>

<?php if ($this->_tpl_vars['upload_mode'] == 'html'): ?>
<?php echo '
  function addUploadBox() {
    var uploadBox = \'<p class="file"><input type="file" size="60" name="image_upload[]"></p>\';
    jQuery(uploadBox).appendTo("#uploadBoxes");
  }

  addUploadBox();

  jQuery("#addUploadBox A").click(function () {
    addUploadBox();
  });

  jQuery("#uploadForm").submit(function() {
    return checkUploadStart();
  });
'; ?>

<?php elseif ($this->_tpl_vars['upload_mode'] == 'multiple'): ?>

var uploadify_path = '<?php echo $this->_tpl_vars['uploadify_path']; ?>
';
var upload_id = '<?php echo $this->_tpl_vars['upload_id']; ?>
';
var session_id = '<?php echo $this->_tpl_vars['session_id']; ?>
';
var pwg_token = '<?php echo $this->_tpl_vars['pwg_token']; ?>
';
var buttonText = "<?php echo Template::mod_translate('Select files'); ?>
";
var sizeLimit = Math.round(<?php echo $this->_tpl_vars['upload_max_filesize']; ?>
 / 1024); /* in KBytes */

<?php echo '
  jQuery("#uploadify").uploadify({
    \'uploader\'       : uploadify_path + \'/uploadify.php\',
    \'langFile\'       : uploadify_path + \'/uploadifyLang_en.js\',
    \'swf\'            : uploadify_path + \'/uploadify.swf\',
    \'checkExisting\'  : false,

    buttonCursor     : \'pointer\',
    \'buttonText\'     : buttonText,
    \'width\'          : 300,
    \'cancelImage\'    : uploadify_path + \'/cancel.png\',
    \'queueID\'        : \'fileQueue\',
    \'auto\'           : false,
    \'multi\'          : true,
    \'fileTypeDesc\'   : \'Photo files\',
    \'fileTypeExts\'   : \'*.jpg;*.JPG;*.jpeg;*.JPEG;*.png;*.PNG;*.gif;*.GIF\',
    \'fileSizeLimit\'  : sizeLimit,
    \'progressData\'   : \'percentage\',
    requeueErrors   : false,
    \'onSelect\'       : function(event,ID,fileObj) {
      jQuery("#fileQueue").show();
    },
    \'onQueueComplete\'  : function(stats) {
      jQuery("input[name=submit_upload]").click();
    },
    onUploadError: function (file,errorCode,errorMsg,errorString,swfuploadifyQueue) {
      /* uploadify calls the onUploadError trigger when the user cancels a file! */
      /* There no error so we skip it to avoid panic.                            */
      if ("Cancelled" == errorString) {
        return false;
      }

      var msg = file.name+\', \'+errorString;

      /* Let\'s put the error message in the form to display once the form is     */
      /* performed, it makes support easier when user can copy/paste the error   */
      /* thrown.                                                                 */
      jQuery("#uploadForm").append(\'<input type="hidden" name="onUploadError[]" value="\'+msg+\'">\');

      jQuery.jGrowl(
        \'<p></p>onUploadError \'+msg,
        {
          theme:  \'error\',
          header: \'ERROR\',
          life:   4000,
          sticky: false
        }
      );

      return false;
    },
    onUploadSuccess: function (file,data,response) {
      var data = jQuery.parseJSON(data);
      jQuery("#uploadedPhotos").parent("fieldset").show();

      /* Let\'s display the thumbnail of the uploaded photo, no need to wait the  */
      /* end of the queue                                                        */
      jQuery("#uploadedPhotos").prepend(\'<img src="\'+data.thumbnail_url+\'" class="thumbnail"> \');
    },
    onUploadComplete: function(file,swfuploadifyQueue) {
      var max = parseInt(jQuery("#progressMax").text());
      var next = parseInt(jQuery("#progressCurrent").text())+1;
      var addToProgressBar = 2;
      if (next <= max) {
        jQuery("#progressCurrent").text(next);
      }
      else {
        addToProgressBar = 1;
      }

      jQuery("#progressbar").progressbar({
        value: jQuery("#progressbar").progressbar("option", "value") + addToProgressBar
      });
    }
  });

  jQuery("input[type=button]").click(function() {
    if (!checkUploadStart()) {
      return false;
    }

    jQuery("#uploadify").uploadifySettings(
      \'postData\',
      {
        \'category_id\' : jQuery("select[name=category] option:selected").val(),
        \'level\' : jQuery("select[name=level] option:selected").val(),
        \'upload_id\' : upload_id,
        \'session_id\' : session_id,
        \'pwg_token\' : pwg_token,
      }
    );

    nb_files = jQuery(".uploadifyQueueItem").size();
    jQuery("#progressMax").text(nb_files);
    jQuery("#progressbar").progressbar({max: nb_files*2, value:1});
    jQuery("#progressCurrent").text(1);

    jQuery("#uploadProgress").show();

    jQuery("#uploadify").uploadifyUpload();
  });

'; ?>

<?php endif; ?>
});
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['footer_script'][0][0]->block_footer_script($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div class="titrePage">
  <h2><?php echo Template::mod_translate('Upload Photos'); ?>
 <?php echo $this->_tpl_vars['TABSHEET_TITLE']; ?>
</h2>
</div>

<div id="photosAddContent">

<?php if (count ( $this->_tpl_vars['setup_errors'] ) > 0): ?>
<div class="errors">
  <ul>
<?php $_from = $this->_tpl_vars['setup_errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
    <li><?php echo $this->_tpl_vars['error']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
  </ul>
</div>
<?php else: ?>

<?php if (count ( $this->_tpl_vars['setup_warnings'] ) > 0): ?>
<div class="warnings">
  <ul>
<?php $_from = $this->_tpl_vars['setup_warnings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['warning']):
?>
    <li><?php echo $this->_tpl_vars['warning']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
  </ul>
  <div class="hideButton" style="text-align:center"><a href="<?php echo $this->_tpl_vars['hide_warnings_link']; ?>
"><?php echo Template::mod_translate('Hide'); ?>
</a></div>
</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['thumbnails'] )): ?>
<fieldset>
  <legend><?php echo Template::mod_translate('Uploaded Photos'); ?>
</legend>
  <div>
<?php $_from = $this->_tpl_vars['thumbnails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thumbnail']):
?>
    <a href="<?php echo $this->_tpl_vars['thumbnail']['link']; ?>
" class="externalLink">
      <img src="<?php echo $this->_tpl_vars['thumbnail']['src']; ?>
" alt="<?php echo $this->_tpl_vars['thumbnail']['file']; ?>
" title="<?php echo $this->_tpl_vars['thumbnail']['title']; ?>
" class="thumbnail">
    </a>
<?php endforeach; endif; unset($_from); ?>
  </div>
  <p id="batchLink"><a href="<?php echo $this->_tpl_vars['batch_link']; ?>
"><?php echo $this->_tpl_vars['batch_label']; ?>
</a></p>
</fieldset>
<p style="margin:10px"><a href="<?php echo $this->_tpl_vars['another_upload_link']; ?>
"><?php echo Template::mod_translate('Add another set of photos'); ?>
</a></p>
<?php else: ?>

<div id="formErrors" class="errors" style="display:none">
  <ul>
    <li id="noAlbum"><?php echo Template::mod_translate('Select an album'); ?>
</li>
    <li id="noPhoto"><?php echo Template::mod_translate('Select at least one photo'); ?>
</li>
  </ul>
  <div class="hideButton" style="text-align:center"><a href="#" id="hideErrors"><?php echo Template::mod_translate('Hide'); ?>
</a></div>
</div>


<form id="uploadForm" enctype="multipart/form-data" method="post" action="<?php echo $this->_tpl_vars['form_action']; ?>
" class="properties">
<?php if ($this->_tpl_vars['upload_mode'] == 'multiple'): ?>
    <input name="upload_id" value="<?php echo $this->_tpl_vars['upload_id']; ?>
" type="hidden">
<?php endif; ?>

    <fieldset>
      <legend><?php echo Template::mod_translate('Drop into album'); ?>
</legend>

      <span id="albumSelection"<?php if (count ( $this->_tpl_vars['category_options'] ) == 0): ?> style="display:none"<?php endif; ?>>
      <select id="albumSelect" name="category">
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category_options'],'selected' => $this->_tpl_vars['category_options_selected']), $this);?>

      </select>
      <br><?php echo Template::mod_translate('... or '); ?>
</span><a href="#" class="addAlbumOpen" title="<?php echo Template::mod_translate('create a new album'); ?>
"><?php echo Template::mod_translate('create a new album'); ?>
</a>
      
    </fieldset>

    <fieldset>
      <legend><?php echo Template::mod_translate('Select files'); ?>
</legend>

    <p id="uploadWarningsSummary"><?php echo $this->_tpl_vars['upload_max_filesize_shorthand']; ?>
B. <?php echo $this->_tpl_vars['upload_file_types']; ?>
. <?php if (isset ( $this->_tpl_vars['max_upload_resolution'] )): ?><?php echo $this->_tpl_vars['max_upload_resolution']; ?>
Mpx<?php endif; ?> <a class="showInfo" title="<?php echo Template::mod_translate('Learn more'); ?>
">i</a></p>

    <p id="uploadWarnings">
<?php echo sprintf(Template::mod_translate('Maximum file size: %sB.'), $this->_tpl_vars['upload_max_filesize_shorthand']); ?>

<?php echo sprintf(Template::mod_translate('Allowed file types: %s.'), $this->_tpl_vars['upload_file_types']); ?>

<?php if (isset ( $this->_tpl_vars['max_upload_resolution'] )): ?>
<?php echo sprintf(Template::mod_translate('Approximate maximum resolution: %dM pixels (that\'s %dx%d pixels).'), $this->_tpl_vars['max_upload_resolution'], $this->_tpl_vars['max_upload_width'], $this->_tpl_vars['max_upload_height']); ?>

<?php endif; ?>
    </p>

<?php if ($this->_tpl_vars['upload_mode'] == 'html'): ?>
      <div id="uploadBoxes"></div>
      <div id="addUploadBox">
        <a href="javascript:"><?php echo Template::mod_translate('+ Add an upload box'); ?>
</a>
      </div>

    <p id="uploadModeInfos"><?php echo sprintf(Template::mod_translate('You are using the Browser uploader. Try the <a href="%s">Flash uploader</a> instead.'), $this->_tpl_vars['switch_url']); ?>
</p>

<?php elseif ($this->_tpl_vars['upload_mode'] == 'multiple'): ?>
    <div id="uploadify">You've got a problem with your JavaScript</div> 

    <div id="fileQueue" style="display:none"></div>

    <p id="uploadModeInfos"><?php echo sprintf(Template::mod_translate('You are using the Flash uploader. Problems? Try the <a href="%s">Browser uploader</a> instead.'), $this->_tpl_vars['switch_url']); ?>
</p>

<?php endif; ?>
    </fieldset>

    <p class="showFieldset"><a id="showPermissions" href="#"><?php echo Template::mod_translate('Manage Permissions'); ?>
</a></p>

    <fieldset id="permissions" style="display:none">
      <legend><?php echo Template::mod_translate('Who can see these photos?'); ?>
</legend>

      <select name="level" size="1">
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['level_options'],'selected' => $this->_tpl_vars['level_options_selected']), $this);?>

      </select>
    </fieldset>

<?php if ($this->_tpl_vars['upload_mode'] == 'html'): ?>
    <p>
      <input class="submit" type="submit" name="submit_upload" value="<?php echo Template::mod_translate('Start Upload'); ?>
">
    </p>
<?php elseif ($this->_tpl_vars['upload_mode'] == 'multiple'): ?>
    <p style="margin-bottom:1em">
      <input class="submit" type="button" value="<?php echo Template::mod_translate('Start Upload'); ?>
">
      <input type="submit" name="submit_upload" style="display:none">
    </p>
<?php endif; ?>
</form>

<div id="uploadProgress" style="display:none">
<?php echo sprintf(Template::mod_translate('Photo %s of %s'), '<span id="progressCurrent">1</span>', '<span id="progressMax">10</span>'); ?>

<br>
<div id="progressbar"></div>
</div>

<fieldset style="display:none">
  <legend><?php echo Template::mod_translate('Uploaded Photos'); ?>
</legend>
  <div id="uploadedPhotos"></div>
</fieldset>

<?php endif; ?> <?php endif; ?> 
</div> <!-- photosAddContent -->