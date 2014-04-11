<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('[name="PROX_VENCIMENTO"]').datebox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	
	
	$('.getClientes').combobox({
		mode:'remote',
		enabled:true,
		url: "<?=site_url()?>/admin/json/getClientes",
		valueField:'CODIGO',  
		textField:'RAZAO_NOME',
		//panelHeight: 'auto',
		formatter:function(row){  
			return '<span style="font: 13px Open Sans; font-weight:600;"><i class="icon-user"></i>' + row.RAZAO_NOME + '</span><br/>' + 
				'<span style="color:#888; font-size:11px">' + row.EMAIL + '</span>';    
		}
					
	});	
	
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
	

	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$('[name="CICLO"]').attr("value",$(this).val());		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	
});




</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
    </ul>
    <form id="form_AddServico" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 
        <fieldset style=" padding:5px; background: #eee; border: 1px dotted #ccc !important; margin-bottom: 5px !important;">
        <div class="line">
            <label>Cliente
                <br />
                <select name="CLIENTE" class="easyui-combobox getClientes" style="width:340px;">
                </select>
            </label>
            
            <label>Próx. Vencimento
            	<br />
                <input name="PROX_VENCIMENTO" value="" type="text" class="textfield-text" style="width:125px;"><br />
				<p style=" float:left; font-size:11px; line-height:16px; font-weight:normal; color:#666; margin-top:5px;">
               		Pago até
                </p>
            </label>
       
        </div>
        </fieldset>
        
        <fieldset style="margin-bottom: 5px !important;">
        <div class="line">
                    

            <label>Categoria
                <br />
                <select name="CATG_PRODUTO" id="catgProduto" class="easyui-combobox" panelHeight="auto" style="width:220px;">
						<option value=""></option>
                        <option value="1">Hospedagem de Sites</option>
                        <option value="2">Revenda de Hospedagem</option>
                        <option value="3">Servidor Dedicado / VPS</option>
                        <option value="4">Streaming</option>
                        <option value="5">Outros</option>
                </select>
            </label>
            
            <label>Produto/Serviço
                <br />
                <select name="COD_PRODUTO" id="codProduto" class="easyui-combobox" panelHeight="auto" style="width:250px;">
                	<option value="">Selecione uma categoria</option>
				</select>
            </label>
            
            <label>Domínio
                <br />
                <input value="" name="DOMINIO" type="text" class="textfield-text" style="width:230px;" />
            </label>
            
            <label>Usuário
                <br />
                <input name="MOD_USUARIO" value="" type="text" class="textfield-text" style="width:105px;" />
            </label>
            
            <label>Senha
            	<br />
                <input name="MOD_SENHA" value="" type="text" class="textfield-text" style="width:105px;"><br />
				<a href="#" style="float:right;" class="btn-mini btn-link">Gerar nova senha?</a>
            </label>
            
                       
        </div>
        </fieldset>
        
        <fieldset><legend>Ciclo de Cobrança</legend>
            <div class="line">
                <div style="float:left; width:510px; overflow:auto;">
                    <div class="btn-group" data-toggle="buttons-radio">  
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="mensal" class="btn unique active" style="padding:10px 18px;">
                            <center>Mensal</center>
                            <img src="<?=site_url()?>assets/images/calendar_1.png" />
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="trimestral" class="btn unique" style="padding:10px 18px;">
                            <center>Trimestral</center>
                            <img src="<?=site_url()?>assets/images/calendar_3.png" />
                        </button>
                        
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="semestral" class="btn unique" style="padding:10px 18px;">
                            <center>Semestral</center>
                            <img src="<?=site_url()?>assets/images/calendar_6.png" />
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="anual" class="btn unique" style="padding:10px 18px;">
                            <center>Anual</center>
                            <img src="<?=site_url()?>assets/images/calendar_12.png" />
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique" style="padding:10px 18px;">
                            <center>Bienal</center>
                            <img src="<?=site_url()?>assets/images/calendar_24.png" />
                        </button>
                    </div>
                </div>
                
                <input type="hidden" name="CICLO" id="novo_ciclo" value="mensal" />
                
                <p style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">Atenção: </b> Lembre-se que ao editar os valores de um plano caso ele já esteja vinculado a algum pedido / fatura, os mesmos não serão alterados em lançamentos financeiros já efetuados.</p>
            </div>
            
            
        </fieldset>
        
    </div><!-- /Inicio-->

    </form>
</div><!-- /.easyui-tabs -->