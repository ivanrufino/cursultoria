<div style="padding:5px;">
<div id="pedido_header">
	<div class="pedido_numero">
    	<b>Pedido #<?=$pedido->CODIGO?></b>
    	<p><?=$pedido->DATA?> - IP: <?=$pedido->IP?> <a target="_blank" href="http://www.geoiptool.com/pt/?IP=<?=$pedido->IP?>"><img src="<?=site_url()?>assets/img/icons/32x32/info.gif" /></a></p>
    </div>
    <?php switch($pedido_status){
					case 0: echo '<b class="tag_red pedido_status">Cancelado</b>'; break;
					case 1: echo '<b class="tag_yellow pedido_status">Pendente</b>'; break;
					case 2: echo '<b class="tag_green pedido_status">Completo</b>'; break;
				}?>
</div>

<div id="pedido_cliente">
	<b>Informações Pessoais</b>
    
    <p><?=($cliente->TIPO_PESSOA == "juridica") ? $cliente->RAZAO_SOCIAL : $cliente->NOME_COMPLETO?></p>
    <p><?=($cliente->TIPO_PESSOA == "juridica") ? 'CNPJ: '.$cliente->CNPJ : 'CPF: '.$cliente->CPF?></p>
    <p>&nbsp;</p>
    <p>Fone: <?=$cliente->TELEFONE?> <?=($cliente->CELULAR != NULL)? '/ '.$cliente->CELULAR : ''?></p>
    <p>E-mail: <?=$cliente->EMAIL?></p>
</div>
<div id="pedido_endereco">
	<b>Dados de Endereço</b>
	
    <p><?=$cliente->LOGRADOURO?>, <?=$cliente->NUMERO?></p>
    <p><?=$cliente->COMPLEMENTO?>, <?=$cliente->BAIRRO?></p>
    <p>&nbsp;</p>
    <p><?=$cliente->CIDADE?>, <?=$cliente->UF?></p>
    <p>CEP: <?=$cliente->CEP?></p>
</div>

<div class="pedido_lista"><b>Itens do Pedido</b></div>
        
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
		foreach($pedido_itens as $key => $item):

            if($key % 2){
                echo '<tr>';
            }else{
                echo '<tr class="tr_sim">';
            }
            
        ?>
        <!--<tr class="tr_sim">-->
        <label for="item">
            <!--<td><input type="checkbox" id="item" name="item[]" value="<?php //$row->id?>" /></td>-->
            <td><?=$item->PROD_NOME?></td>
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
	<p>Cartão de Crédito</p>
    <span><strong>ID Transação: </strong>1F459542Y9889973U</span>
</div>
<div id="pedido_total">
	<p>Taxa de Setup R$: <b>0,00</b></p>
	<p>Descontos R$: <b>-0,00</b></p>
    <p>Total R$: <b><?=numFormat($pedido->VALOR)?></b></p>
</div>

<b class="pedido_total_descricao">Observações</b>
<div id="pedido_total_descricao">
	<p>Vale Desconto <strong>TESTEPRO</strong> válido até 22/07/2012</p>
</div>
</div>