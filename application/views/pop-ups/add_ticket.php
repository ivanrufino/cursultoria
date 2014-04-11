<script type="text/javascript">
$(document).ready(function(){
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('[name="PROX_VENCIMENTO"]').datebox();

	$('.easyui-numberspinner').numberspinner();
	
	$('#lista_departamentos').combobox({
		mode:'remote',
		enabled:true,
		//panelHeight: 'auto',
		onChange:function(newValue) {
			$('#lista_categorias').combobox({
				mode:'remote',
				enabled:true,	
				url: "<?=site_url()?>/admin/json/lista_categoris/" + newValue,
				valueField:'COD_DEPARTAMENTO',  
				textField:'DESCRICAO'
				//panelHeight: 'auto',
			});	
		}
	});
	
	$('.getClientes').combobox({
		mode:'remote',
		enabled:true,
		url: "<?=site_url()?>/admin/json/getClientes",
		valueField:'CODIGO',  
		textField:'RAZAO_NOME',
		formatter:function(row){  
			return '<span style="font: 13px Open Sans; font-weight:600;"><i class="ico-user"></i>' + row.RAZAO_NOME + '</span><br/>' + 
				'<span style="color:#888; font-size:11px">' + row.EMAIL + '</span>';    
		}			
	});
	/*
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	$('[rel="trocaStatus"]').click(function(){
		$('[name="STATUS"]').attr("value", $(this).data('id'));
		
		if($('[name="STATUS"]').val() == 1){
			$('li#trocaStatus').html('<a data-id="0" rel="trocaStatus"><i class="icon-ban-circle"></i> Suspender</a>');
		}
		else if($('[name="STATUS"]').val() == 0){
			$('li#trocaStatus').html('<a data-id="1" rel="trocaStatus"><i class="icon-ok"></i> Ativar</a>');
		}
	});
	
	
	if($("#add_tipo_pessoa").val() == 'juridica'){
		$("#add_exibe_juridica").show();
		$("#add_exibe_fisica").hide();
	}else{
		$("#add_exibe_fisica").show();
		$("#add_exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {		
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#novo_ciclo").attr("value",$(this).val());		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	*/
});

</script>
<div style="padding:10px;">
<form id="form_AddTicket" name="form_add" method="post" action="">
<div id="tabs-1" style="height:400px; overflow:hidden;"> 
    <fieldset>
        <div class="line">
            <label>Título
                <br />
                <input type="text" name="TITULO" style="width:520px;" />
            </label>
            <label>Descrição
                <br />
                <textarea name="MENSAGEM" style="width:520px; height:120px; resize:none;"></textarea>
            </label>

            <label>Adicionar arquivo<br/>
                <input id="lefile" name="ANEXO" onchange="readURL(this);" type="file" style="display:none;" />
                <div class="input-append">
                   <input id="photoCover" style="width:170px; height:22px;" class="input-large textfield-text" type="text">
                   <a class="btn clickFotoLogo">Arquivo</a>
                </div>
            </label>
            <label>Domínio<br/>
                <input type="text" name="DOMINIO" style="width:250px;" />
            </label>
        </div>
    </fieldset>
    
     <fieldset style=" padding:5px; background: #eee; border: 1px dotted #ccc !important; margin-bottom: 10px !important;">
        <div class="line">
            <label>Departamento<br />
                <select name="DEPARTAMENTO" id="lista_departamentos" class="easyui-combobox" style="width:280px;">
                	<option></option>
                	<?php foreach($lista_dpto as $rs){
						echo "<option value=".$rs->CODIGO.">".$rs->DESCRICAO."</option>";
					}?>
                </select>
            </label>
            
            <label style="margin-right: 0px;">Categoria<br />
                <select name="CATEGORIA" class="easyui-combobox" id="lista_categorias" style="width:206px;"></select>
            </label>            
        </div>
        
        <div class="line">
            <label>Cliente
                <br />
                <select name="CLIENTE" class="easyui-combobox getClientes" style="width:280px;"></select>
            </label>
            
            <label style="margin-right: 0px;">Atribuido á
                <br />
                <select name="ATRIBUIDO" class="easyui-combobox" style="width:206px;">
                	<option></option>
                	<?php foreach($lista_users as $row):?>
                    	<option value="<?=$row->CODIGO?>"><?=$row->NOME?></option>
                    <? endforeach; ?>
                </select>
            </label>
                            
        </div>
        
    </fieldset>
        
</div><!-- /Inicio-->

</form>
</div>