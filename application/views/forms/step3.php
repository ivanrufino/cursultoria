<div style=" width:690px; margin-right:10px; float:right;">
	<div style="height:40px; display:block; padding-top:10px; border-bottom:1px dotted #e8e8e8;">
        <b style="font:28px Franklin Gothic Medium Cond, sans-serif; font-weight:normal; color:<?=$cor_default;?>; float:left; text-transform:uppercase;">Resumo</b>
    </div>
    
    <table width="100%" id="registro" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="80%" align="left">
       		Descricação
        </th>
        <th>
        	Preço
        </th>
      </tr>
      <?php foreach($carrinho as $prod):?>
      <tr>
        <td class="instr_pgto">
       		<b><?=$prod['name'];?></b>
            <p style="margin-bottom:0px;"><?=$prod['options']['dominio'];?></p>
        </td>
        <td>
        	<b>R$ <?=numFormat($prod['price']);?></b>
            <p style="font-size:11px;">*<?=$prod['options']['ciclo'];?></p>
        </td>
      </tr>

      <?php endforeach;?>
     <!-- <tr>
        <td id="select_pgto_cartao"><input name="FORMA_PAGAMENTO" id="plano_2" type="radio" value="cartao" /></td>
        <td style="padding:0px;">
            <label class="lab_pagto" for="plano_2">
            	<p><img src="<?=site_url()?>/assets/images/logo_pagseguro.png" /></p>
            	<!--<span>Ativação imediatada mediante confirmação da operadora do cartão de crédito.</span>
            </label>
        </td>
      </tr>
      <tr>
      	
        <td style="padding:0px;">
        	<label class="lab_pagto" for="plano_2">
        	<p><img src="<?=site_url()?>/assets/images/logo_moip.png" /></p>
        	<!--<span>Ativação imediatada mediante confirmação da operadora do cartão de crédito.</span>
        	</label>
        </td>
        
        <td id="select_pgto_cartao"><input name="FORMA_PAGAMENTO" id="plano_2" type="radio" value="cartao" /></td>
        <td style="padding:0px;">
            <label class="lab_pagto" for="plano_2">
            	<p><img src="<?=site_url()?>/assets/images/logo_paypal.png" /></p>
            	<!--<span>Ativação imediatada mediante confirmação da operadora do cartão de crédito.</span>
            </label>
        </td>
      </tr>-->

    </table>
    <input type="hidden" class="E_PAGAMENTO" name="PAGAMENTO" value="" />
    
    <div class="titulo_registro" style="background:#f0f0f0;">
    	
        <span class="left" style="width:100%;">A ativação do serviço está sujeito a compensação do primeiro pagamento via boleto bancário ou confirmação da operadora do cartão de crédito.</span>
        
        <form method="post" id="inputs_pgto_boleto">
        
        	<div class="line" style="margin-top:10px;">
            <b class="left" style="">CICLO DE COBRANÇA</b><br />
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                        <label class="label_cadastro" style="width:70px;" for="c_mensal">
                            <img src="<?=site_url()?>/assets/images/calendar_1.png" />
                            <input id="c_mensal" name="CICLO_PAGTO" checked="checked" type="radio" value="1" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_trimestral">
                            <img src="<?=site_url()?>/assets/images/calendar_3.png" />
                            <input id="c_trimestral" name="CICLO_PAGTO" type="radio" value="3" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_semestral">
                            <img src="<?=site_url()?>/assets/images/calendar_6.png" />
                            <input id="c_semestral" name="CICLO_PAGTO" type="radio" value="6" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_anual">
                            <img src="<?=site_url()?>/assets/images/calendar_12.png" />
                            <input id="c_anual" name="CICLO_PAGTO" type="radio" value="12" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_bienal">
                            <img src="<?=site_url()?>/assets/images/calendar_24.png" />
                            <input id="c_bienal" name="CICLO_PAGTO" type="radio" value="24" style="margin:5px 0 0 26px;" />
                        </label>
                    </td>
                    <td align="right" style=" font:14px Tahoma;">
                    	Total a pagar do pedido<br />
        				<b style="font-size:22px;">R$ <?=numFormat($this->cart->total());?></b>
                         <input type="hidden" class="VALOR_PAGTO" name="VALOR_PAGTO" value="<?=$this->cart->total();?>" />

                    </td>
                  </tr>
              	</table>
            </div>
        
        
        <input type="hidden" class="E_PAGAMENTO" name="PAGAMENTO" value="" />
        <input type="hidden" class="E_CONTRATO" name="CONTRATO" value="" />
        
        <div style="float:left; overflow:auto; width:450px;">
        
        <div id="view_boleto" style="">
        	<b class="left" style="margin-top:20px;">Boleto Bancário</b><br />
                    
            <div class="line" style="margin-top:10px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
						<span class="left" style="width:100%; font-size:12px; line-height:18px;">
                            * O boleto para pagamento é gerado após concluir o pedido.<br />
                            * Não é necessário o envio de comprovante após o pagamento.<br />
                            * Você receberá a 2ª via do pedido pelo email cadastrado.<br /><br />
                            
                            <div class="borda5px ui-error">
                            	<strong>Aviso: o pedido continuará válido somente por 7 (sete) dias corridos a contar do seu fechamento.</strong>
                            </div>
                        </span>
                    </td>
                  </tr>
                  
                </table>
            </div>
        </div><!-- ./boleto -->
        </form>
        
        <form method="post" id="inputs_pgto_cartao">
        <input type="hidden" class="E_PAGAMENTO" name="PAGAMENTO" value="" />
        <input type="hidden" class="E_CONTRATO" name="CONTRATO" value="" />
        <div id="view_cartao" style=" display:none;">
        	<b class="left" style="margin-top:20px;">Cartão de Crédito</b><br />
            	<span class="left" style="width:100%; font-size:12px; line-height:18px; margin-top:10px;">                    
                    <div class="borda5px ui-warning">
                        <strong>Ativação rápida da sua conta mediante confirmação da operadora do cartão de crédito</strong>
                    </div>
                </span>
                        
            <div class="line" style="margin-top:10px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                        <label class="label_cadastro" style="width:70px;" for="c_visa">
                            <img src="<?=site_url()?>/assets/images/cartao_visa.png" />
                            <input id="c_visa" name="CARTAO_BANDEIRA" type="radio" value="visa" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_master">
                            <img src="<?=site_url()?>/assets/images/cartao_mastercard.png" />
                            <input id="c_master" name="CARTAO_BANDEIRA" type="radio" value="mastercard" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_american">
                            <img src="<?=site_url()?>/assets/images/cartao_americanexpress.png" />
                            <input id="c_american" name="CARTAO_BANDEIRA" type="radio" value="mastercard" style="margin:5px 0 0 26px;" />
                        </label>
                        
                        <label class="label_cadastro" style="width:70px;" for="c_discover">
                            <img src="<?=site_url()?>/assets/images/cartao_discover.png" />
                            <input id="c_discover" name="CARTAO_BANDEIRA" type="radio" value="mastercard" style="margin:5px 0 0 26px;" />
                        </label>
                    </td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><label class="label_form" for="titular_cartao">* Titular do Cartão:</label></td>
                    <td style="padding-top:5px;"><input id="titular_cartao" name="CARTAO_TITULAR" style="width:270px;" class="textfield-text" type="text" /></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><label class="label_form" for="num_cartao">* Número do Cartão:</label></td>
                    <td style="padding-top:5px;"><input id="num_cartao" name="CARTAO_NUMERO" style="width:270px;" class="textfield-text formatCARD" type="text" /></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><label class="label_form" for="codigo">*Validade:</label></td>
                    <td style="padding-top:5px;"><input id="codigo" name="CARTAO_VALIDADE" style="width:110px;" class="textfield-text formatVALIDADE" type="text" />
                    <p>(MM/AAAA)</p></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><label class="label_form" for="validade">*Código de Segurança:</label></td>
                    <td style="padding-top:5px;"><input id="validade" name="CARTAO_CODIGO" style="width:70px;" class="textfield-text" type="text" /></td>
                  </tr>

                  
                </table>
                
                
            
        	</div>
        </div><!-- ./cartao de credito -->
        </form>
        
        </div><!-- ./fim do quadro informações -->
        <div style="float:right; overflow:auto; width:210px;">
        	<b class="left" style="margin-top:20px;">Forma de Pagamento</b><br />
            
            <table width="100%" id="list_pagto" border="0" cellspacing="0" cellpadding="0">
            	<tr>
        			<td id="select_pgto_boleto"><input name="FORMA_PAGAMENTO" checked="checked" id="plano_1" type="radio" value="boleto" /></td>
        			<td style="padding:0px;">
            			<label class="lab_pagto" for="plano_1">
            			<p><img src="<?=site_url()?>/assets/images/icon_boleto.png" /></p>
            			<!--<span>Ativação imediatada mediante confirmação da operadora do cartão de crédito.</span>-->
            			</label>
       				</td>
      			</tr>
            	<tr>
                	<td id="select_pgto_cartao"><input name="FORMA_PAGAMENTO" id="plano_2" type="radio" value="cartao" /></td>
                	<td style="padding:0px;">
                        <label class="lab_pagto" for="plano_2">
                        <p><img src="<?=site_url()?>/assets/images/logo_pagseguro.png" /></p>
                        <!--<span>Ativação imediatada mediante confirmação da operadora do cartão de crédito.</span>-->
                        </label>
                    </td>
                </tr>
            </table>
        </div>
        
        
        <label class="label_cadastro" style="margin-top:20px; font-size:14px;">
                <input name="contrato" id="e_contrato" type="checkbox" value="aceito" />
                Declaro que li e estou de acordo com o <a href="#">contrato de serviço</a>.</label>
        
    </div>
    
    <a class="finalizar_submit">Finalizar</a>
    <a class="voltar_submit">voltar</a>

</div>