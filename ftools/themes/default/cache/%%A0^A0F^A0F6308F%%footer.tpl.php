<?php /* Smarty version 2.6.18, created on 2012-09-19 16:51:24
         compiled from /home/changmik/public_html/jeninaandmike.com/ftools/themes/default/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'show_page_load_time', '/home/changmik/public_html/jeninaandmike.com/ftools/themes/default/footer.tpl', 13, false),)), $this); ?>

      </div>
    </td>
  </tr>
  </table>

</div>

<?php if ($this->_tpl_vars['account']['settings']['footer_text'] != "" || $this->_tpl_vars['g_enable_benchmarking']): ?>
  <div class="footer">
    <?php echo $this->_tpl_vars['account']['settings']['footer_text']; ?>

    <?php echo smarty_function_show_page_load_time(array(), $this);?>

  </div>
<?php endif; ?>

</body>
</html>