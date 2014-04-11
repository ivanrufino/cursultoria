
<script type="text/javascript">
jQuery.fn.extend({
    copiarLinha: function (table) {
    	var clone;
    	/*var tr= $(table+" tr:last");
    	if (tr.is(":visible")){*/
	  		clone =$(table+" tr:last:visible").clone();
	  	/*}else{
	  		clone =$(table+" tr:eq(1)").clone();
	  	}*/
	  clone.find('input').val('');
	  clone.appendTo($(table));
    }
});

</script>