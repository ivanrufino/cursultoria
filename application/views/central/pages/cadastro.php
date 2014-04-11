<script type="text/javascript">

$(function(){
	
	$("#tipo_pessoa").attr("value",'<?=$cadastro->TIPO_PESSOA?>');
	if($("#tipo_pessoa").val() == 'juridica'){
		$(".exibe_juridica").show();
		$(".exibe_fisica").hide();
	}else{
		$(".exibe_fisica").show();
		$(".exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#tipo_pessoa").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$(".exibe_juridica").show();
			$(".exibe_fisica").hide();
		}else{
			$(".exibe_fisica").show();
			$(".exibe_juridica").hide();
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
});

</script>
<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	
        <div id="central_tit">Dados cadastrais</div>
        <p>Todas as alterações feitas irão afetar seu cadastro nos demais produtos.</p>
        
        <div id="other_content" class="borda5px" style=" overflow:auto; background:#f3f3f3;">
            <form id="form_trocaSenhaCliente" method="post" style="float:left;margin-bottom: 0px;">
            <input type="hidden" name="CODIGO" value="<?=$cadastro->CODIGO?>" />
            <div id="detalhes_cad">   
                <div class="label_cad" style="width:220px;">
                    <p>Senha antiga<br />
                       <input type="password" style="margin-top:5px; width:140px; margin-right:5px;" autocomplete="off" name="SENHA_ATUAL" />
                    </p>
                </div>
                <div class="label_cad" style="width:132px;">
                    <p>Senha nova<br />
                       <input type="password" style="margin-top:5px; width:140px; margin-right:5px;" autocomplete="off" name="NOVA_SENHA" />
                    </p>
                </div>
                <div class="label_cad" style="width:392px;">
                    <a rel="btn_alteraSenhaCliente" style="float:left; margin-right:10px; margin-top:-10px;" class="btn btn-primary" id="envia" data-loading-text="Carregando...">Alterar senha</a>
                </div>
            </div><!-- ./detalhes_cad -->
            </form>
            <div id="aviso_cad" class="borda5px">
            	<p>
             		<i><img src="<?=site_url()?>/assets/img/icons/32x32/_icon_lock.png" /></i>
                    <b>Para sua segurança:</b>
                </p>
                <p>Esse processo é irreversível, você receberá a confirmação da nova senha por e-mail.</p>
            </div><!-- ./aviso_cad -->
            
            
        </div><!-- ./other_content -->
        
        
  <form id="cadastroCliente" method="post">
        <input type="hidden" name="CODIGO" value="<?=$cadastro->CODIGO?>" />
        
        <div id="central_subtit" style="padding-top:10px; border-bottom:1px dotted #eee;">Contato de cobrança</div>
        <div id="contatos"  class="borda5px" style="overflow:auto;">
        	<table width="100%" border="0" cellspacing="2" cellpadding="4">
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"></td>
                <td>
                	<div class="btn-group" data-toggle="buttons-radio">                      
                      <button id="pessoa_fisica" type="button" data-toggle="button" name="option"  value="fisica" class="btn unique <?=($cadastro->TIPO_PESSOA == 'fisica') ? 'active' : '';?>">Pessoa Física</button>
              		  <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique <?=($cadastro->TIPO_PESSOA == 'juridica') ? 'active' : '';?>">Pessoa Jurídica</button>
                    </div>  
                </td>
              </tr>
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>Nome / Razão Social</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:360px;" value="<?=$cadastro->RAZAO_NOME?>" name="RAZAO_NOME" placeholder="Digite aqui" />
                    <input type="hidden" name="TIPO_PESSOA" id="tipo_pessoa" value="<?=$cadastro->TIPO_PESSOA?>" />
                </td>
              </tr>
              <tr class="exibe_juridica">
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>CNPJ</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:160px;" value="<?=$cadastro->CNPJ?>" name="CNPJ" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr class="exibe_fisica">
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>CPF</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:160px;" value="<?=$cadastro->CPF?>" name="CPF" placeholder="Digite aqui" />
                </td>
              </tr>
            </table>

        </div><!-- ./style=" padding:0px; margin: 10px 0;" -->
        
        
        <div id="central_subtit" style="padding-top:10px; border-bottom:1px dotted #eee;">Endereço</div>
        <div id="contatos"  class="borda5px" style=" margin-top:5px; overflow:auto;">
        
        	<table width="100%" border="0" cellspacing="2" cellpadding="4">
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>CEP</p></td>
                <td colspan="3">
                	<input type="text" style="margin-bottom:0px; width:120px; margin-right:5px;" value="<?=$cadastro->CEP?>" name="CEP" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>Endereço</p></td>
                <td colspan="3">
                	<input type="text" style="margin-bottom:0px; width:360px;" value="<?=$cadastro->LOGRADOURO?>" name="LOGRADOURO" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>Numero</p></td>
                <td colspan="3">
                	<input type="text" style="margin-bottom:0px; width:60px;" value="<?=$cadastro->NUMERO?>" name="NUMERO" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>Bairro</p></td>
                <td colspan="3">
                	<input type="text" style="margin-bottom:0px; width:150px;" value="<?=$cadastro->BAIRRO?>" name="BAIRRO" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr>
              	<td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>UF</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:40px;" value="<?=$cadastro->UF?>" name="UF" placeholder="Digite aqui" />
                </td>
                
                <td align="right" style="width:70px; height:30px; padding-top:8px; padding-right:10px;"><p>Cidade</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:200px;" value="<?=$cadastro->CIDADE?>" name="CIDADE" placeholder="Digite aqui" />
                </td>
              </tr>
            </table>
            
            
            
    	</div><!-- ./style=" padding:0px; margin: 10px 0;" -->
        
        
        <div id="central_subtit" style="padding-top:10px; border-bottom:1px dotted #eee;">Informações de contato</div>
        <div id="contatos"  class="borda5px" style=" margin-top:5px; overflow:auto;">
            <table width="100%" border="0" cellspacing="2" cellpadding="4">
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>Telefone</p></td>
                <td style=" width:170px;">
                	<input type="text" style="margin-bottom:0px; width:120px;" value="<?=$cadastro->TELEFONE?>" name="TELEFONE" placeholder="Digite aqui" />
                </td>
                <td align="right" style="width:60px; height:30px; padding-top:8px; padding-right:10px;"><p>Celular</p></td>
                <td>
                	<input type="text" style="margin-bottom:0px; width:120px;" value="<?=$cadastro->CELULAR?>" name="CELULAR" placeholder="Digite aqui" />
                </td>
              </tr>
              <tr>
                <td align="right" style="width:180px; height:30px; padding-top:8px; padding-right:10px;"><p>E-mail</p></td>
                <td colspan="3">
                	<input type="text" style="margin-bottom:0px; width:360px;" value="<?=$cadastro->EMAIL?>" name="EMAIL" placeholder="Digite aqui" />
                </td>
                
              </tr>
            </table>
        </div><!-- ./style=" padding:0px; margin: 10px 0;" -->
        </form>
        
        <div id="areasubmit">
        	<button style="float:left; margin-right:10px;" class="btn btn-success btSubmitCadastro" data-loading-text="Carregando...">Salvar alterações</button>
            <div class="alert alert-success alertCadastro" style=" display:none; overflow:auto;">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
              	Seu cadastro foi atualizado com sucesso!
            </div>
        </div>
        
        
</div><!-- ./wrap -->