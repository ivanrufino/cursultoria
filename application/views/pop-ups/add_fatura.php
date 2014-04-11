<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('[name="PROX_VENCIMENTO"]').datebox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	$('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
	$('.ch-single').chosen({disable_search: true});
	
	/*
	$('.getClientes').combobox({
		mode:'remote',
		enabled:true,
		url: "<?=site_url()?>/admin/json/getClientes",
		valueField:'CODIGO',  
		textField:'RAZAO_NOME',
		multiple:true,
		//panelHeight: 'auto',
		formatter:function(row){  
			return '<span style="font: 13px Open Sans; font-weight:600;"><i class="ico-user"></i>' + row.RAZAO_NOME + '</span><br/>' + 
				'<span style="color:#888; font-size:11px">' + row.EMAIL + '</span>';    
		}
					
	});	
	*/
	$('#catgProduto').combobox({
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			$('#codProduto').combobox({
				mode:'remote',
				enabled:true,
				url: "<?=site_url()?>/admin/json/getProdutoByCatg/" + newValue,
				valueField:'CODIGO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
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
	
	/*
	$('[rel="addItens"]').live('click', function(){
		
		$('[name="VALOR[]"]').maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
		
		var linha = '<tr class="td_line itens" style="background:#eee;">';
				linha += '<td style="padding:3px;">';
					linha += '<input name="DESCRICAO[]" value="" type="text" class="textfield-text" style="width:420px;" />';
				linha += '</td>';
				
				linha += '<td style="padding:3px;"><input name="VALOR[]" value="" type="text" class="textfield-text formatMONEY" style="width:65px;" /></td>';
				linha += '<td style="width:16px;"><img src="<?=site_url()?>/assets/img/icons/cancel.png" class="deleteItem" /></td>';
			linha += '</tr>';
				
		$("#campos").append(linha);
		return false;
	});
	*/
	
	$('[rel="addItens"]').click(function(){
		
		var linha = $('tbody#campos tr').html();
		$('tbody#campos').append('<tr>'+ linha +'</tr>');
	});
	
	$.removeLinha = function (element){
	
		/* Conta quantidade de linhas na tabela */
		var linha_total = $('tbody#campos tr').length;
		
		/* Condição que mantém pelo menos uma linha na tabela */
		if (linha_total > 1){
			/* Remove os elementos da linha onde está o botão clicado */
			$(element).parent().parent().remove();
		}
		
		/* Avisa usuário de que não pode remover a última linha */
		else{
			alert("Desculpe, mas você não pode remover esta última linha!");
		}
	};
	
	$('.deleteItem').live('click', function(){
		$(this).parent().parent('.itens').remove();
		return false;
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	
	//$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});

	
});

</script>
<div style="padding:10px;">
<form id="form_AddFatura" name="form_add" method="post" action="">
<div id="tabs-1" style="height:350px;"> 
	

    <fieldset style=" padding:5px; background: #eee; border: 1px dotted #ccc !important; margin-bottom: 10px !important;">
    <div class="line">
        <label>Cliente
        
        
            <br />
            <select name="CLIENTE" data-placeholder="Selecione um cliente..."   class="ch-select" style="width:360px;">
            
                <option value=""></option>
                <?php foreach($clientes as $lista):?>
                    <option value="<?=$lista->CODIGO?>"><?=$lista->RAZAO_NOME?></option>
                <?php endforeach;?>
            </select>
            
        </label>
        
        <label>Vencimento
            <br />
            <input name="PROX_VENCIMENTO" type="text" class="textfield-text" style="width:125px;"><br />

        </label>
   
    </div>
    </fieldset>
    
    <fieldset style="margin-bottom: 5px !important;"><legend>Itens da Fatura</legend>
    <p style="float:right; font-size:11px;">asddas</p>
    
    <div class="line">
    <p class="alert" style="font-size:11px; text-align:right; line-height:16px; font-weight:normal; margin-bottom:0px; padding:5px;">
        Lembre-se de preencher o campo "Valor R$" em formato decimal 0,00.
    </p>
    	<table width="100%" class="ui-widget ui-widget-content" style="border: 1px dotted #ccc !important; ">
            <thead>
                <tr>
                    <th style="background:#f4f4f4; padding-left:5px; border:0px;" width="80%"><label>Descrição</label></th>
                    <th style="background:#f4f4f4; padding-left:5px; border:0px;" width="6%"><label>Valor R$</label></th>
                    <th style="background:#f4f4f4; padding-left:5px; border:0px;"width="4%"></th>
                </tr>
            </thead>
            <tbody id="campos">
                <tr class="td_line" style="background:#eee;">
                    <td style="padding:3px;">
                        <input name="DESCRICAO[]" placeholder="Descrição do item" type="text" class="textfield-text" style="width:420px;" />
                    </td>
                    
                    <td style="padding:3px;"><!--<input name="VALOR[]" value="" type="text" class="textfield-text formatMONEY" style="width:65px;" />-->
                    <input name="VALOR[]"  class="textfield-text" placeholder="0,00" type="text" onkeyup="formataValor(this,event)" onkeypress="return(soNums(event,''))" style="width:65px;">
                    </td>
                    <td style="width:16px;"><img src="<?=site_url()?>/assets/img/icons/cancel.png" onclick="$.removeLinha(this);" /></td>
                </tr>
                
                
                
<!--                <tr class="td_line" style="background:#eee;">
                    <td style="padding:3px;">
                        <input name="DESCRICAO[]" value="" type="text" class="textfield-text" style="width:420px;" />
                    </td>
                    
                    <td style="padding:3px;"><input name="VALOR[]" value="" type="text" class="textfield-text formatMONEY" style="width:65px;" /></td>
                    <td style="width:16px;"><img src="<?=site_url()?>/assets/img/icons/cancel.png" class="deleteItem" /></td>
                </tr>-->

            </tbody>
    	</table>
	</div>
    
    <div class="line" style="margin-top:5px;">
    	<a rel="addItens" class="btn btn-success btn-mini"><i class="ico-plus-1"></i> Adicionar Itens</a>
    </div>
    
    <div class="line" style="margin-top:5px;">
    	<div style="float:right; padding-top:5px; border-top:1px dotted #ccc;">
        	<table width="170" cellpadding="0" cellspacing="0" border="0">
            	<tr>
                	<td class="tableValorLabel">Total</td>
                    <td align="right" class="tableValor">R$ 0,00</td>
                </tr>
            </table>
        </div>
    </div>
    </fieldset>
    
    
</div><!-- /Inicio-->

</form>
</div>