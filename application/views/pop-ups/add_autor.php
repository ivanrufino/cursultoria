<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$('[name="STATUS"]').attr("value",$(this).val());		
	});
	


	
});
</script>

<div style="padding:10px;">
<form id="form_addAutor" name="form_edit" method="post" action="">

    
    
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px;">
        	Nome
        </div>
        <div class="configCol_right" style="width:270px;">
        	<label>
                <input name="DESCRICAO" type="text" class="textfield-text" required="required" value="" style="width:300px;" />
            </label>
        </div>
    </div>
    
    
        
</div>