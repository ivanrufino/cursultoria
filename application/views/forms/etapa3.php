<?php
$rs_cliente = $this->session->userdata('etapa2');
$this_cliente = ($rs_cliente['E_CLIENTE'] == "sim") ? $rs_cliente['USUARIO_LOGIN'] : $rs_cliente['EMAIL'];
$cliente = $this->cadastros->getDados($this_cliente);
?>

<div style=" width:690px; margin: 0 10px; float:right;">
	<div style="height:40px; display:block; padding-top:10px; border-bottom:1px dotted #e8e8e8;">
        <b style="font:28px Franklin Gothic Medium Cond, sans-serif; font-weight:normal; color:<?=$cor_default;?>; float:left; text-transform:uppercase;">Resumo</b>
    </div>
    
    <div id="fatura_cliente" style="margin:0px;">
    	<?php if($rs_cliente['E_CLIENTE'] == "nao"){?>
        <div style="float:left; width:330px;">
            <b class="detalhe_cliente">Informações do Cliente</b>
            <?=$rs_cliente['RAZAO_NOME'];?><br />
            <?=($rs_cliente['TIPO_PESSOA'] == "fisica") ? "CPF: ".$rs_cliente['CPF'] : "CNPJ: ".$rs_cliente['CNPJ'];?><br />
            <br />
            E-mail: <?=$this_cliente?><br />
            Tel: <?=$rs_cliente['TELEFONE']?>
        </div>
        <div style="float:right; width:330px; border:0px;">
            <b class="detalhe_endereco">Dados de Endereço</b>
            <?=$rs_cliente['ENDERECO']?>, <?=$rs_cliente['NUMERO']?><br />
            <?=$rs_cliente['COMPLEMENTO']?>, <?=$rs_cliente['BAIRRO']?><br />
            <br />
            <?=$rs_cliente['CIDADE']?>, <?=$rs_cliente['ESTADO']?><br />
            CEP: <?=$rs_cliente['CEP']?><br />
        </div>
        
        
        <?php }else{?>
        <div style="float:left; width:330px;">
            <b class="detalhe_cliente">Informações do Cliente</b>
            <?=$cliente->RAZAO_NOME;?><br />
            <?=($cliente->TIPO_PESSOA == "fisica") ? "CPF: ".$cliente->CPF : "CNPJ: ".$cliente->CNPJ;?><br />
            <br />
            E-mail: <?=$cliente->EMAIL?><br />
            Tel: <?=$cliente->TELEFONE?>
        </div>
        <div style="float:right; width:330px; border:0px;">
            <b class="detalhe_endereco">Dados de Endereço</b>
            <?=$cliente->LOGRADOURO?>, <?=$cliente->NUMERO?><br />
            <?=$cliente->COMPLEMENTO?>, <?=$cliente->BAIRRO?><br />
            <br />
            <?=$cliente->CIDADE?>, <?=$cliente->UF?><br />
            CEP: <?=$cliente->CEP?><br />
        </div>
        <?php }?>
    </div>
    
    <table width="100%" id="registro" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="80%" align="left">
       		Produtos
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
        	<b <?=($prod['options']['ciclo'] == "mensal") ? 'class="txt_preco_produto"':''?>>R$ <?=numFormat($prod['price']);?></b>
            <p <?=($prod['options']['ciclo'] == "mensal") ? 'class="txt_ciclo_produto"':''?> style="font-size:11px;">*<?=$prod['options']['ciclo'];?></p>
            <?=($prod['options']['ciclo'] == "anual") ? '<input type="hidden" class="VALOR_DOMINIO" value="'.$prod['price'].'" />' : "";?>
        </td>
      </tr>

      <?php 
	  	endforeach;
		$produto = $this->produtos->getProdutosById($prod['id']);
	  ?>
    </table>
    
    <div class="titulo_registro" style="background:#f0f0f0;">
    <input type="hidden" class="VALOR_SERVICO" value="<?=$prod['price'];?>" />    
    <input type="hidden" class="SERVICO_TRIMESTRAL" value="<?=$produto->PRECO_TRIMESTRAL?>" />
    <input type="hidden" class="SERVICO_SEMESTRAL" value="<?=$produto->PRECO_SEMESTRAL?>" />
    <input type="hidden" class="SERVICO_ANUAL" value="<?=$produto->PRECO_ANUAL?>" />
    <input type="hidden" class="SERVICO_BIENAL" value="<?=$produto->PRECO_BIENAL?>" />
    	
        <span class="left" style="width:100%;">A ativação do serviço está sujeito a compensação do primeiro pagamento via boleto bancário ou confirmação da operadora do cartão de crédito.</span>
        
        <form method="post" id="form_resumo">
        
        	<div class="line" style="margin-top:10px;">
            <b class="left" style="">CICLO DE COBRANÇA</b><br />
            
            
            
            
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td style="padding-top:10px;">
                        <div class="btn-group" data-toggle="buttons-radio">  
                            <button id="c_mensal" type="button" data-id="1" class="btn ciclo_pagto active" style="padding:10px 15px;">
                                <center><strong>Mensal</strong></center>
                                <img src="<?=site_url()?>assets/images/calendar_1.png" />
                            </button>
                            <button id="c_trimestral" type="button" data-id="3" class="btn ciclo_pagto" style="padding:10px 15px;">
                                <center><strong>Trimestral</strong></center>
                                <img src="<?=site_url()?>assets/images/calendar_3.png" />
                            </button>
                            
                            <button id="c_semestral" type="button" data-id="6" class="btn ciclo_pagto" style="padding:10px 15px;">
                                <center><strong>Semestral</strong></center>
                                <img src="<?=site_url()?>assets/images/calendar_6.png" />
                            </button>
                            <button id="c_anual" type="button" data-id="12" class="btn ciclo_pagto" style="padding:10px 15px;">
                                <center><strong>Anual</strong></center>
                                <img src="<?=site_url()?>assets/images/calendar_12.png" />
                            </button>
                            <button id="c_bienal" type="button" data-id="24" class="btn ciclo_pagto" style="padding:10px 15px;">
                                <center><strong>Bienal</strong></center>
                                <img src="<?=site_url()?>assets/images/calendar_24.png" />
                            </button>
                        </div>
                    </td>
                    <td align="right" style=" font:14px Tahoma;">
                    	Total a pagar do pedido<br />
        				<b id="txt_total" style="font-size:22px;">R$ <?=numFormat($this->carrinho->total());?></b>
                         <input type="hidden" class="VALOR_PAGTO formatMONEY" name="VALOR_PAGTO" value="<?=$this->carrinho->total();?>" />

                    </td>
                  </tr>
              	</table>
            </div>
        
        <input type="hidden" id="VALOR_SERVICO" name="VALOR_SERVICO" value="<?=$prod['price'];?>" />
        <input type="hidden" id="CICLO_PAGTO" name="CICLO_PAGTO" value="1" />
        <input type="hidden" class="E_CONTRATO" name="CONTRATO" value="" />
        
        <div style="float:left; overflow:auto; width:450px;">
        
        
        </form>
        
        
        
        </div><!-- ./fim do quadro informações -->
        

        <label class="label_cadastro" style="margin-top:20px; font-size:14px;">
                <input name="contrato" id="e_contrato" type="checkbox" value="aceito" />
                Declaro que li e estou de acordo com o <a href="#">contrato de serviço</a>.</label>
        
    </div>
    
    <a class="finalizar_submit borda5px">Finalizar</a>
    <a class="voltar_submit">voltar</a>

</div>