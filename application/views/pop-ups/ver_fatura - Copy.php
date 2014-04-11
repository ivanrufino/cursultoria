<div style="padding:5px;">
<div id="pedido_header">
	<div class="pedido_numero">
    	<b>Fatura #<?=$fatura->CODIGO?></b>
    	<p><?=dateFormat($fatura->DATA)?></p>
    </div>
    <?php switch($fatura->STATUS){
					case 'nao pago': echo '<b class="tag_red pedido_status">Não Pago</b>'; break;
					case 'em aberto': echo '<b class="tag_yellow pedido_status">Em aberto</b>'; break;
					case 'pago': echo '<b class="tag_green pedido_status">Pago</b>'; break;
				}?>
</div>

<div id="pedido_cliente">
	<b>Informações do Cliente</b>
    
    <p><?=$cliente->RAZAO_NOME?></p>
    <p><?=($cliente->TIPO_PESSOA == "juridica") ? 'CNPJ: '.$cliente->CNPJ : 'CPF: '.$cliente->CPF?></p>
    <p>&nbsp;</p>
    <p>Fone: <?=$cliente->TELEFONE?> <?=($cliente->CELULAR != NULL)? '/ '.$cliente->CELULAR : ''?></p>
    <p>E-mail: <?=$cliente->EMAIL?></p>
</div>
<div id="fatura_resumo">
	<b>Resumo da Fatura</b>
	
    <p><strong>Vencimento: <?=dateFormat($fatura->VENCIMENTO, "d/m/Y")?></strong></p>
    <p style="margin-top:5px;"><img src="<?=site_url()?>/assets/images2/icons/flag_orange.png" border="0" class="flag" style=" margin-right:5px; margin-bottom:2px;" />
    	Aviso prévio
    </p>
    <p>&nbsp;</p>
    <span>Total da Fatura: R$ <?=numFormat($fatura->VALOR)?></span>
</div>

<div class="pedido_lista"><b>Itens da Fatura</b></div>
        
<div style="float:left; width:100%; height:130px; overflow:auto;">
    <table width="100%" id="painel" style="border:0px;"  border="0" cellspacing="0" cellpadding="0">
        <tr>
            <!--<th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>-->
            <th width="22%">Serviço / Plano</th>
            <th width="16%">Domínio</th>
            <th width="8%">Ciclo Pagto</th>
            <th width="7%">Valor R$</th>
        </tr>
    
		<?php
		foreach($fatura_itens as $key => $item):

            if($key % 2){
                echo '<tr>';
            }else{
                echo '<tr class="tr_sim">';
            }
            
        ?>
        <!--<tr class="tr_sim">-->
        <label for="item">
            <!--<td><input type="checkbox" id="item" name="item[]" value="<?php //$row->id?>" /></td>-->
            <td><?=$item->PROD_NOME?> <?=($item->PROD_DOMINIO)?></td>
            <td><a href="#"><img src="<?=site_url()?>assets/img/icons/32x32/world.png" alt="" border="0" /> <?=$item->PROD_DOMINIO?></a></td>
            <td style="text-transform:capitalize;"><?=$item->PROD_CICLO?></td>
            <td style="text-align:right;">R$ <?=numFormat($item->PROD_VALOR)?></td>
        </label>
        
      	</tr>
		<?php endforeach;?>
	</table>
</div>

<div class="pedido_pagamento">
	<b>Pagamento</b>
    <?php if($transacao == NULL){?>
    <span style="text-transform:none;">Nenhuma transação encontrada</span>
    <?php }else{?>
    
	<p><?=$transacao->FORMA_PAGTO?></p>
    <span style="font-size:12px; text-transform:none;">Pago em <?=dateFormat($transacao->DATA)?></span>
    <?php }?>
</div>
<div id="pedido_total">
	<p>Taxa de Setup R$: <b>0,00</b></p>
	<p>Descontos R$: <b>-0,00</b></p>
    <p>Total R$: <b><?=numFormat($fatura->VALOR)?></b></p>
</div>

<b class="pedido_total_descricao">Observações</b>
<div id="pedido_total_descricao">
	
</div>
</div>