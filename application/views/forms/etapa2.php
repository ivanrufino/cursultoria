<div style=" width:690px; margin: 0 10px;  float:right; ">
	<div style="height:40px; display:block; padding-top:10px; border-bottom:1px dotted #e8e8e8;">
        <b style="font:28px Franklin Gothic Medium Cond, sans-serif; font-weight:normal; color:<?=$cor_default;?>; float:left; text-transform:uppercase;">Seus dados</b>
    </div>
    
    <table width="100%" id="registro" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%"><input name="cliente" class="unique" checked="checked" type="radio" value="sim" /></td>
        <td>
            <label for="plano_1">Já sou cliente</label>
            <span>Se você já tem cadastro, Preencha os campos abaixo para acessar sua conta.</span>
        </td>
      </tr>
      <tr>
        <td width="2%"><input name="cliente" class="unique" type="radio" value="nao" /></td>
        <td>
            <label for="plano_2">Ainda não sou cliente</label>
            <span>Cadastre-se preenchendo os dados abaixo.</span>
        </td>
      </tr>
    
    </table>
    <input type="hidden" name="E_CLIENTE" id="e_cliente" value="" />
    <input type="hidden" id="e_pessoa" value="" />
    
    <div class="titulo_registro" style="background:#f0f0f0;">
    	
        <div id="login">
            <form id="inputs_login" method="post">
                <input type="hidden" name="E_CLIENTE" class="e_cliente" value="" />
                <b class="left">Acesse sua conta</b><br />
                <span class="left" style="width:100%;">Preencha os campos abaixo, depois pressione "Continuar"</span>
                
                <div id="login" class="line">
                    <label class="label_cadastro" style="width:300px;" for="usuario">Endereço de Email:
    
                        <input name="USUARIO_LOGIN" id="usuario_login" type="text" style="width:260px;" />
                    </label>
                    
                    <label class="label_cadastro" style="width:300px;" for="senha">Senha:
                            <input name="SENHA_LOGIN" id="usuario_login" type="password" style="width:260px;" />
                    </label>
    
                    
                </div>
                <input value="Esqueci minha senha" type="button" style="margin-left:0px;" class="btn" />
            </form>
        </div>
        
        <div id="cadastro">
        
			<form id="inputs_cadastro" method="post">
                
                <input type="hidden" name="E_CLIENTE" class="e_cliente" value="" />
                <span class="left" style="width:100%;">Preencha os campos abaixo, depois clique no botão "Continuar"</span>

                <div class="line">
                    <label class="label_cadastro" style="width:140px; font-size:14px;" for="p_fisica">
                        <input name="TIPO_PESSOA" type="radio" checked="checked" value="fisica" /> Pessoa Física
                    </label>
                    
                    <label class="label_cadastro" style="width:140px; font-size:14px;" for="p_juridica">
                        <input name="TIPO_PESSOA" type="radio" value="juridica" /> Pessoa Jurídica
                    </label>
                </div>

                <b class="left" style="margin-top:10px;">Informações pessoais</b><br />
                
                <div class="line" style="margin-top:10px;">
    				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                          <td width="25%" align="right"><label class="label_form" for="nome">* Nome / Razão Social:</label></td>
                          <td><input id="nome_completo" name="RAZAO_NOME" value="<?=$this->input->post('RAZAO_NOME')?>" style="width:340px; margin-bottom:0px" class="textfield-text is_required" type="text" /></td>
                        </tr>
                    </table>
                    <div id="fisica">

        					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="25%" align="right"><label class="label_form" for="cpf">* CPF:</label></td>
                              <td style="padding-top:5px;"><input id="cpf" name="CPF" value="<?=$this->input->post('CPF')?>" style="width:205px;margin-bottom:0px" class="textfield-text is_required formatCPF" type="text" />
                              <p>(Somente números)</p></td>
                            </tr>
                            <tr>
                              <td width="25%" align="right"><label class="label_form" for="dia_nascimento">* Data de Nascimento:</label></td>
                              <td style="padding-top:5px;"><input id="data_nascimento" name="DATA_NASCIMENTO" value="<?=$this->input->post('DATA_NASCIMENTO')?>" style="width:125px;" class="textfield-text datepicker formatDATE" type="text" /></td>
                            </tr>
                         </table>
                     </div>
                     
                     <div id="juridica">
   						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="25%" align="right"><label class="label_form" for="cnpj">* CNPJ:</label></td>
                          <td style="padding-top:5px;"><input id="cnpj" name="CNPJ" value="<?=$this->input->post('CNPJ')?>" style="width:205px;margin-bottom:0px" class="textfield-text is_required formatCNPJ" type="text" />
                          <p>(Somente números)</p></td>
                        </tr>
                        <tr>
                          <td width="25%" align="right"><label class="label_form" for="inscricao_estadual">Inscrição Estadual:</label></td>
                          <td style="padding-top:5px;"><input id="inscricao_estadual" name="INSCRICAO_ESTADUAL" value="<?=$this->input->post('INSCRICAO_ESTADUAL')?>" style="width:145px;margin-bottom:0px" class="textfield-text" type="text" />
                          <p>(Opcional)</p></td>
                        </tr>
                      </table>
                      </div>
                      
                      
                      <div id="dados_pessoa"></div>
                      
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="tel">* Telefone:</label></td>
                        <td style="padding-top:5px;"><input id="tel" name="TELEFONE" value="<?=$this->input->post('TELEFONE')?>" style="width:205px;margin-bottom:0px" class="textfield-text is_required formatTEL" type="text" /></td>
                      </tr>
                      
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="cel">Celular:</label></td>
                        <td style="padding-top:5px;"><input id="cel" name="CELULAR" value="<?=$this->input->post('CELULAR')?>" style="width:205px;margin-bottom:0px" class="textfield-text formatTEL" type="text" />
                        <p>(Opcional)</p></td>
                      </tr>
    
    
                      <tr>
                        <td width="25%" align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="responsavel">* Responsável:</label></td>
                        <td style="padding-top:5px;"><input id="responsavel" name="RESPONSAVEL" value="<?=$this->input->post('RESPONSAVEL')?>" style="width:340px;margin-bottom:0px" class="textfield-text is_required" type="text" />
                        <p>(Nome Sobrenome)</p></td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="email">* E-mail Principal:</label></td>
                        <td style="padding-top:5px;"><input id="email" name="EMAIL" value="<?=$this->input->post('EMAIL')?>" style="width:340px;margin-bottom:0px" class="textfield-text is_required" type="text" /></td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="email_cobranca">E-mail para Cobrança:</label></td>
                        <td style="padding-top:5px;"><input id="email_cobranca" name="EMAIL_COBRANCA" value="<?=$this->input->post('EMAIL_COBRANCA')?>" style="width:340px;" class="textfield-text" type="text" /></td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="senha_novo">* Senha:</label></td>
                        <td style="padding-top:5px;"><input id="senha_novo" name="SENHA" value="<?=$this->input->post('SENHA')?>" style="width:205px;margin-bottom:0px" class="textfield-text num_senha" type="password" /></td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="confirma_senha">* Confirma Senha:</label></td>
                        <td style="padding-top:5px;"><input id="confirma_senha" value="<?=$this->input->post('CONFIRMA_SENHA')?>" style="width:205px;margin-bottom:0px" class="textfield-text equal_senha" type="password" /></td>
                      </tr>
                    </table>
                </div>
    
                
                <b class="left" style="margin-top:20px;">Dados de Endereço</b><br />
                
                <div class="line" style="margin-top:10px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="cep">* CEP:</label></td>
                        <td style="padding-top:5px;"><input id="cep" name="CEP" value="<?=$this->input->post('CEP')?>" style="width:205px;margin-bottom:0px" class="textfield-text is_required formatCEP" type="text" />
                        <p>(Somente números)</p></td>
                      </tr>
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="endereco">* Endereço:</label></td>
                        <td style="padding-top:5px;"><input id="endereco" name="ENDERECO" value="<?=$this->input->post('ENDERECO')?>" style="width:340px;margin-bottom:0px" class="textfield-text is_required" type="text" /></td>
                      </tr>
                     
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="estado">* Estado:</label></td>
                        <td style="padding-top:5px;">
                          <select id="list_estados_edit" name="ESTADO" style="width:200px;" class="easyui-combobox">
                          			<option value=""></option>
                            	<?php foreach($lista_estados as $rs){
                                	echo "<option value=".$rs->SIGLA.">".$rs->DESCRICAO."</option>";
                                }?>
                          </select>
                        </td>
                      </tr>
                      
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="cidade">*Cidade:</label></td>
                        <td style="padding-top:5px;">
                        	<select id="list_cidades_edit" name="CIDADE" style="width:200px;" class="easyui-combobox">
                                    <option value="">Selecione o estado</option>
                          </select>
                        </td>
                      </tr>
                      
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="numero">* Número:</label></td>
                        <td style="padding-top:5px;"><input id="numero" name="NUMERO" value="<?=$this->input->post('NUMERO')?>" style="width:65px;margin-bottom:0px" class="textfield-text is_required" type="text" /></td>
                      </tr>
                      
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="complemento">Complemento:</label></td>
                        <td style="padding-top:5px;"><input id="complemento" name="COMPLEMENTO" value="<?=$this->input->post('COMPLEMENTO')?>" style="width:205px;margin-bottom:0px" class="textfield-text" type="text" />
                        <p>(Opcional)</p></td>
                      </tr>
                      
                      <tr>
                        <td width="25%" align="right"><label class="label_form" for="bairro">*Bairro:</label></td>
                        <td style="padding-top:5px;"><input id="bairro" name="BAIRRO" value="<?=$this->input->post('BAIRRO')?>" style="width:205px;margin-bottom:0px" class="textfield-text is_required" type="text" /></td>
                      </tr>
                      
                      
                    </table>
                </div>
              </form>
        </div>
        
    </div>
    
    <a class="continuar_submit borda5px">Continuar</a>
    <a class="voltar_submit">voltar</a>

</div>
