<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	
	$('#list_estados_edit').combobox({
		editable:false,
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			$('#list_cidades_edit').combobox({
				editable:false,
				mode:'remote',
				enabled:true,		
				url: "<?=site_url()?>/admin/json/lista_cidades/" + newValue,
				valueField:'CODIGO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	
	$("#tipo_pessoa").attr("value",'');
	if($("#tipo_pessoa").val() == 'juridica'){
		$("#exibe_juridica").show();
		$("#exibe_fisica").hide();
	}else{
		$("#exibe_fisica").show();
		$("#exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#tipo_pessoa").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$("#exibe_juridica").show();
			$("#exibe_fisica").hide();
		}else{
			$("#exibe_fisica").show();
			$("#exibe_juridica").hide();
		}
		
	});
	
	var btns = ['pessoa_fisica', 'pessoa_juridica'];
		var input = document.getElementById('btn-input');
		for(var i = 0; i < btns.length; i++) {
		document.getElementById(btns[i]).addEventListener('click', function() {
		  input.value = this.value;
		  $("#tipo_pessoa").attr("value",input.value);
		});
	}
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
});

</script>

<div id="tt" class="easyui-tabs" fit="true" border="false">
<form id="form_editCadastros" name="form_edit" method="post" action="">
    <ul>
        <li><a href="#tabs-1">Dados Cadastrais</a></li>
        <li><a href="#tabs-3">Financeiro</a></li>
        <li><a href="#tabs-2">Informações Adicionais</a></li>
    </ul>
    
    <div id="tabs-1" style="height:405px; overflow:hidden;"> 

        <fieldset>
            <div class="line"> 
                
                <div class="btn-group" data-toggle="buttons-radio">  
                  <button id="pessoa_fisica" type="button" data-toggle="button" name="option"  value="fisica" class="btn unique ">Pessoa Física</button>
                  <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique ">Pessoa Jurídica</button>
                </div>            
    
                <input type="hidden" name="TIPO_PESSOA" id="tipo_pessoa" value="" />
                <input type="hidden" id="id_cadastro" value="" />
            </div>
            
            <div class="line">
                <label style=" float:right; height:100px; ">Observação
                	<br />
                    <textarea name="GRUPO" style="width: 155px; height: 70px; resize:none" placeholder="Digite sua observação aqui.">

                    </textarea>
                </label>
            
                <div id="exibe_juridica" class="aba_cadastro">
                    <label>Razão Social
                        <br />
                        <input name="RAZAO_SOCIAL" type="text" value="" class="textfield-text" style="width:460px;" />
                    </label>
                    
                    <label>CNPJ
                        <br />
                        <input name="CNPJ" type="text" value="" class="textfield-text formatCNPJ" onkeypress="mascara(this, '##.###.###/####-##')" style="width:150px;" />
                    </label>
                </div>                
                
                <div id="exibe_fisica" class="aba_cadastro">
                    <label>Nome Completo
                        <br />
                        <input name="NOME_COMPLETO" type="text" value="" class="textfield-text" style="width:460px;" />
                    </label>
                    
                    <label>CPF
                        <br />
                        <input name="CPF" type="text" value="" class="textfield-text formatCPF" onkeypress="mascara(this, '###.###.###-##')" style="width:150px;" />
                    </label>
                </div>
                
                <label>Responsável
                    <br />
                    <input name="RESPONSAVEL" class="textfield-text" type="text" value="" style="width:285px;" />
                </label>
    
                <label>E-mail Administrativo
                    <br />
                    <input name="EMAIL" type="text" class="textfield-text" value="" style="width:215px; text-transform:lowercase;" />
                </label>
                
                <label>E-mail de Cobrança
                    <br />
                    <input name="EMAIL_COBRANCA" type="text" class="textfield-text" value="" style="width:220px; text-transform:lowercase;" />
                </label>
                
                <label>Telefone
                    <br />
                    <input name="TELEFONE" type="text" class="textfield-text formatTEL" value="" onkeypress="mascara(this, '(##) ####-####')" style="width:140px;" />
                </label>
                
                <label>Fax
                    <br />
                    <input name="FAX" type="text" class="textfield-text formatTEL" value="" onkeypress="mascara(this, '(##) ####-####')" style="width:130px;" />
                </label>
                
                <label>Celular
                    <br />
                    <input name="CELULAR" type="text" class="textfield-text formatTEL" value="" onkeypress="mascara(this, '(##) ####-####')" style="width:140px;" />
                </label>
                
            </div>
        </fieldset>
        
        <fieldset><legend>Dados de Endereço</legend>
        
            <div class="line">
                <label>CEP
                	<br />
                    <input name="CEP" type="text" class="textfield-text formatCEP" value="" onkeypress="mascara(this, '##.###-###')" style="width:100px;" />
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
                    <select name="UF" id="list_estados_edit" class="easyui-combobox" style="width:140px;">    
                    <option value=""></option>                	
                        
                    </select>
                </label>
                
                
                <label>Cidade
                	<br />
                    <select name="CIDADE" id="list_cidades_edit" class="easyui-combobox" value="" style="width:180px;">
                    	<option value="">Selecione o estado</option>
                    </select>
                </label>
                
                <label>Bairro
                	<br />
                    <input name="BAIRRO" type="text" class="textfield-text" value="" style="width:190px;" />
                    </label> 
            </div>

        </fieldset>
        
        
    </div><!-- /Inicio-->
    
    <div id="tabs-2" style="height:365px; overflow:hidden;">
    
    	<fieldset>
            <div class="line">                
                <label><font style="float:left; margin:5px 8px 0 0;">Indicado por:</font>
					<select name="COD_AFILIADO" id="list_afiliado" style="width:300px;" panelHeight="auto">
                    <!--<option value="">---</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>-->
                    </select>
                </label>
            </div>
        </fieldset>
        
        <fieldset><legend>Informações Bancárias</legend>
            <div class="line">
                <label><font style="float:left; margin:5px 15px 0 0;">Tipo Conta:</font>
					<select name="TIPO_CONTA" id="list_tipoconta" style="width:300px; margin-left:15px;" panelHeight="auto">
                    	<option value=""></option>
                        
                    </select>
                </label>
                
                <label><font style="float:left; margin:5px 8px 0 25px;">Agência:</font>
                    <input name="AGENCIA" type="text" value="" class="textfield-text" style="width:120px;" />
                </label>
            </div>
            
            <div class="line">
                <label><font style="float:left; margin:5px 39px 0 0;">Banco:</font>
					<select name="BANCO" id="list_banco" style="width:300px; margin-left:5px;">
                    	<option value=""></option>
                        
                    </select>
                </label>
                
                <label><font style="float:left; margin:5px 8px 0 38px;">Conta:</font>
                    <input name="CONTA" type="text" value="" class="textfield-text" style="width:120px;" />
                </label>
            </div>
            
            <div class="line">
                <label>Observações
                	<br />
                    <textarea name="OBSERVACOES" class="textfield-text" resize="" rows="8" style="width:650px; resize:none; height:200px; margin-top:5px;"></textarea>
                </label>
            </div>
        </fieldset>
    
    </div><!-- /Inicio-->
    
    
    <div id="tabs-3" style="height:335px; overflow:hidden;"> 
       <div>
        	<p style="font-size:11px; color:#666; margin-bottom:5px;">Escolha um mês e clique em <b>Ver mês</b> para abrir o histórico do mês correspondente</p>
			
                <select id="exibe_mes" class="easyui-combobox" style="width:100px;" panelHeight="200px">
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                    <option value="AL">05/2012</option>
                    <option value="AK">06/2012</option>
                    <option value="AZ">07/2012</option>
                    <option value="AR">08/2012</option>
                    <option value="CA">09/2012</option>
                </select>
                
               	<a href="#" id="bt_ver_mes" class="easyui-linkbutton">Ver mês</a>
            </div>
            
            
            
            
            
        
    
    	<div style="float:left; width:100%; overflow:auto;">
            <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
              <tr class="tr_sim">
                <th class="extrato" width="15%"><b>01/04/2012</b></th>
                <th width="65%"><b>Saldo Anterior</b></th>
                <th width="2%"></th>
                <th class="final"><b>R$ 0.000,00</b></th>
              </tr>
              <tr>
                <td class="extrato">05/04/2012</td>
                <td>Hospedagem Plano I de 05/04/2012 a 05/05/2012</td>
                <td align="center"> - </td>
                <td class="final vermelho">R$ 90,00</td>
              </tr>
              <tr class="tr_sim">
                <td class="extrato">05/04/2012</td>
                <td>Pagamento através de Boleto Bancário</td>
                <td align="center"> + </td>
                <td class="final verde">R$ 90,00</td>
              </tr>
              <tr>
                <td class="extrato">30/04/2012</td>
                <td><b>Saldo do mês de Abril</b></td>
                <td><b>  </b></td>
                <td class="final"><b>R$ 0.000,00</b></td>
              </tr>
              
            </table>
        </div>

    </div><!-- /Inicio-->
    </form>
</div><!-- /.easyui-tabs -->
