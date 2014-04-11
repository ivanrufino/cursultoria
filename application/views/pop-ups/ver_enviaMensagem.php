<script type="text/javascript">

$(function(){

	
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	
	$('#list_estados_add').combobox({
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			
			$('#list_cidades_add').combobox({
				mode:'remote',
				enabled:true,	
				url: "<?=site_url()?>/admin/json/lista_cidades/" + newValue,
				valueField:'DESCRICAO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
	/*
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	*/
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	
	if($("#tipo_pessoaCad").val() == 'juridica'){
		$("#exibe_juridicaCad").show();
		$("#exibe_fisicaCad").hide();
	}else{
		$("#exibe_fisicaCad").show();
		$("#exibe_juridicaCad").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#tipo_pessoaCad").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$("#exibe_juridicaCad").show();
			$("#exibe_fisicaCad").hide();
		}else{
			$("#exibe_fisicaCad").show();
			$("#exibe_juridicaCad").hide();
		}
		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatCEL").mask("(99) 9-9999-9999");
	
	
});
</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Marque e selecione um filtro para enviar as mensagens para um grupo de clientes</a></li>
        <!--<li><a href="#tabs-2">Informações Adicionais</a></li>-->
    </ul>
    
    <div id="tabs-1" style="height:435px; overflow:hidden;"> 
		
        <div style="float:left; width:250px; overflow:auto;">
        	<div class="btn-group btn-group-vertical">
                <button class="btn" style="width:250px; text-align:left;">Por Domínio</button>
                <button class="btn" style="width:250px; text-align:left;">Por Cliente</button>
                <button class="btn" style="width:250px; text-align:left;">Por Produto/Serviço</button>
                <button class="btn" style="width:250px; text-align:left;">Por Inadimplência</button>
            </div>
            
            <div class="line" style="margin-top:10px;">
            	<label>Filtro</label>
            	<select name="UF" id="list_estados_add" class="easyui-combobox" style="width:235px;">    
				   <option value="item">Todos os clientes</option>
                </select>
            </div>
            
            <div class="line" style="margin-top:10px;">
            	
                <div class="well well-small" style="font-size:11px;">
                	A variável {NOME} pode ser utilizada no Assunto e no Texto.<br /><br />
                    
                    <strong>Exemplo:</strong><br />
                    
                    Olá {NOME},<br />
                    estamos entrando em contato para informar que estamos com promoções no site.<br />
                </div>
                
            </div>
        </div>
        
        <div style="float:right; width:455px; height:430px; overflow:auto;">
        	<label>Remetente da Mensagem
                <br />
                <select name="UF" id="list_estados_add" class="easyui-combobox" style="width:440px;">    
                   <option value="item">lucas@codemax.com.br</option>
                </select>
            </label>
            
            <label>Assunto da Mensagem
                <br />
                <input name="RAZAO_NOME" type="text" value="" class="textfield-text" style="width:440px;" />
            </label>
            
            <label>Texto da Mensagem
                <br />
                <textarea name=""></textarea>
            </label>
        </div>
        
    </div><!-- /Inicio-->

</div><!-- /.easyui-tabs -->