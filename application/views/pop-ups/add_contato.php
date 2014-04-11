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
        <li><a href="#tabs-1">Dados Cadastrais</a></li>
        <!--<li><a href="#tabs-2">Informações Adicionais</a></li>-->
    </ul>
    <form id="form_addCadastros" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:435px; overflow:hidden;"> 

        <fieldset>
        <div class="line"> 
        	
            <div class="btn-group" data-toggle="buttons-radio">  
              <button id="pessoa_fisica" type="button" data-toggle="button" name="option"  value="fisica" class="btn unique active">Pessoa Física</button>
              <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique">Pessoa Jurídica</button>
            </div>            
            
            <input type="hidden" name="TIPO_PESSOA" id="tipo_pessoaCad" value="fisica" />
            <input type="hidden" id="id_cadastro" value="" />
            <input type="hidden" name="COD_CHAVE" value="<?=$this->users->getChave(userKey())?>" />
        </div>
        
        <div class="line">
            <label style=" float:right; height:155px; ">Grupo
            <br />
                <select name="GRUPO" size="8" style="width:170px; background:#666; color:#fff;">
                	<option value="1" <?=($tipo == 'Clientes') 			? 'selected="selected"' : '';?>>Alunos</option>
                    <option value="2" <?=($tipo == 'Fornecedores') 		? 'selected="selected"' : '';?>>Professores</option>

                </select>
            </label>
            
            <label>Nome / Razão Social
                	<br />
                    <input name="RAZAO_NOME" type="text" value="" class="textfield-text" style="width:460px;" />
                </label>
        
            <div id="exibe_juridicaCad" class="aba_cadastro">
                
                
                <label>CNPJ
                	<br />
                    <input name="CNPJ" type="text" value="" class="textfield-text formatCNPJ" style="width:150px;" />
                </label>
            </div>                
            
            <div id="exibe_fisicaCad" class="aba_cadastro">

                
                <label>CPF
                	<br />
                    <input name="CPF" type="text" value="" class="textfield-text formatCPF" style="width:150px;" />
                </label>
            </div>

            <label>E-mail
            	<br />
                <input name="EMAIL" type="text" class="textfield-text" value="" style="width:285px; text-transform:lowercase;" />
            </label>
            
            <label>Telefone
            	<br />
                <input name="TELEFONE" type="text" class="textfield-text formatTEL" value="" style="width:140px;" />
            </label>
            
            <label>Fax
            	<br />
                <input name="FAX" type="text" class="textfield-text formatTEL" value="" style="width:130px;" />
            </label>
            
            <label>Celular
            	<br />
                <input name="CELULAR" type="text" class="textfield-text formatCEL" value="" style="width:140px;" />
            </label>
            
        </div>
        </fieldset>
        
        <fieldset><legend>Dados de Endereço</legend>
        
            <div class="line">
                <label>CEP
                	<br />
                    <input name="CEP" type="text" class="textfield-text formatCEP" value="" style="width:100px;" />
                </label>
                
                <label>Logradouro
                	<br />
                    <input name="LOGRADOURO" type="text" class="textfield-text" value="" style="width:410px;" />
                </label>
                
                <label>Nº
                	<br />
                    <input name="NUMERO" type="text" class="textfield-text" value="" style="width:70px;" />
                </label>
            </div>
            
            <div class="line">                
                <label>Estado
                	<br />
                    <select name="UF" id="list_estados_add" class="easyui-combobox" style="width:140px;">    
                       <?php foreach($lista_estados as $rs){
							echo "<option value=".$rs->SIGLA.">".$rs->DESCRICAO."</option>";
						}?>
                    </select>
                </label>
                
                
                <label>Cidade
                	<br />
                    <select name="CIDADE" id="list_cidades_add" class="easyui-combobox" value="" style="width:180px;">
                    	<option value="">Selecione um estado</option>
                    </select>
                </label>
                
                <label>Bairro
                	<br />
                    <input name="BAIRRO" type="text" class="textfield-text" value="" style="width:190px;" />
                    </label> 
            </div>
            

            	
                
                <div class="alert alert-warning" style="float:left; width:610px; margin-top:10px;">
                    <b>Aviso:</b> Para a sua segurança, a senha de acesso à central de cliente será gerada automaticamente.
                    <div style="float:left; display:block;">
                        
                        <input id="envia_dados" name="ENVIA_DADOS" type="checkbox" value="1" style="float:left; margin-top:8px; margin-right:5px;" />
                        <label for="envia_dados" style="float:left">Marque essa caixa para enviar uma Mensagem com Informações sobre a Nova Conta</label>
                        
                        
                    </div>
                </div>


        </fieldset>
        
        
    </div><!-- /Inicio-->
    
    </form>
</div><!-- /.easyui-tabs -->