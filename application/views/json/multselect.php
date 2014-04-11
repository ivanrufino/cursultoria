<script type="text/javascript" src="<?=site_url()?>assets/bootstrap/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?=site_url()?>assets/bootstrap/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript">
  /**
   * Gets whether all the options are selected
   * @param {jQuery} $el
   * @returns {bool}
   */
  function multiselect_selected($el) {
    var ret = true;
    $('option', $el).each(function(element) {
      if (!!!$(this).prop('selected')) {
        ret = false;
      }
    });
    return ret;
  }
   
  /**
   * Selects all the options
   * @param {jQuery} $el
   * @returns {undefined}
   */
  function multiselect_selectAll($el) {
    $('option', $el).each(function(element) {
      $el.multiselect('select', $(this).val());
    });
  }
  /**
   * Deselects all the options
   * @param {jQuery} $el
   * @returns {undefined}
   */
  function multiselect_deselectAll($el) {
    $('option', $el).each(function(element) {
      $el.multiselect('deselect', $(this).val());
    });
  }
   
  /**
   * Clears all the selected options
   * @param {jQuery} $el
   * @returns {undefined}
   */
  function multiselect_toggle($el, $btn) {
    if (multiselect_selected($el)) {
      multiselect_deselectAll($el);
      $btn.text("Marcar Todos");
    }
    else {
      multiselect_selectAll($el);
      $btn.text("Desmarcar Todos");
    }
  }
   

  
  
</script>
