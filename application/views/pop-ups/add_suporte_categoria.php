<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	
	$('button.unique').click(function(){
		$('button.unique:checked').not(this).removeAttr('checked');
		$('[name="PRIVACIDADE"]').attr("value",$(this).val());		
	});
});
</script>
<form id="form_suporteCategoria" name="form_edit" method="post" action="">
	<div style="padding:10px;">
		<div class="line">
            <label>Nome da Categoria
                <br />
                <input name="DESCRICAO" type="text" class="textfield-text" value="" style="width:240px;" />
            </label>
        </div>

        <div class="line">
            
            <label>Departamento
                <br />
                <select name="COD_DEPARTAMENTO" class="easyui-combobox" style="width:240px;">    
                    <option></option>              	
                    <?php foreach($dpto as $row) :?>
                    	<option value="<?=$row->CODIGO?>"><?=$row->DESCRICAO?></option> 
                    <?php endforeach; ?>
                    	
                </select>
            </label>
        </div>
	</div>