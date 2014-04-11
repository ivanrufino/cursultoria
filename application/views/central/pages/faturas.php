

<div id="mainframe" style="padding:10px; overflow:auto; width:685px;"><!-- wrap -->
	<div id="central_tit">Controle financeiro</div>
    
    <ul class="nav nav-tabs" id="tab1_pagamento">
        <li class="active">
            <a href="#pagar" data-toggle="tab">
                <div class="img_tbs">
                    <img src="<?=site_url()?>/assets/img/icons/32x32/dolar.png" alt="" />
                </div>
                <div class="tit_tabs">
                    <b>PAGAMENTO</b><BR/>Boleto, cartão ou transferência
                </div>
           </a>
        </li>
        <li>
            <a href="#extrato_finance" data-toggle="tab">
                <div class="img_tbs">
                    <img src="<?=site_url()?>/assets/img/icons/32x32/extrato_finance.png" alt="" />
                </div>
                <div class="tit_tabs">
                <b>EXTRATO FINANCEIRO</b><BR/> Detalhado e atualizado  
                </div>
           </a>
        <li>   
        <li>
            <a href="#dados_bancarios" data-toggle="tab">
                <div class="img_tbs">
                    <img src="<?=site_url()?>/assets/img/icons/32x32/_icon_pedidos.png" alt="" />
                </div>
                <div class="tit_tabs">
                    <b>FATURAS</b><br/>Histórico de Cobranças
                </div>
           </a>
        <li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="pagar">
        
        	<div id="detalhes_faturas" class="borda5px">
                <p>
                    <?php if($faturas == NULL){?>
                    	<i><img src="<?=site_url()?>/assets/img/icons/32x32/accept.png" /></i> <b>Você está em dia com a EMPRESA!</b>
                    <?php }else{?>
                    	<i><img src="<?=site_url()?>/assets/img/icons/32x32/alert3.png" /></i> <b>Você tem pagamentos pendentes.</b>
                    <?php }?>
                </p>
            </div>
        
            <div id="tit">
            	Faturas em aberto
            </div>
			
            <?php if($faturas != NULL){?>
            <table class="table table-striped table-hover tabela_cicloPagamento">
        	<thead>
                <tr>
                  <th width="10%">Fatura #</th>
                  <th width="12%">Data</th>
                  <th width="12%">Vencimento</th>
                  <th width="15%">Valor</th>
                  <th width="12%">Status</th>
                  <th width="15%"></th>
                </tr>
            </thead>
                <tbody>
                	<?php foreach($faturas as $fatura):?>
                    <tr>
                      <td><b>#<?=$fatura->CODIGO?></b></td>
                      <td><?=dateFormat($fatura->DATA, "d/m/Y")?></td>
                      <td><?=dateFormat($fatura->VENCIMENTO, "d/m/Y")?></td>
                      <td>R$ <?=numFormat($fatura->VALOR)?></td>
                      <td>
                      <?php					  
					  switch($fatura->STATUS){
							case 'nao pago': echo '<span class="label label-important">NÃO PAGO</span>'; break;
							case 'em aberto': echo '<span class="label label-warning">EM ABERTO</span>'; break;
							case 'pago': echo '<span class="label label-success">PAGO</span>'; break;
					  }?></td>
                      <td>
                      		<a style="float:right; padding:0 4px;" onclick="redirecionaPainel('<?=site_url()?>fatura/?<?=$fatura->HASH?>')" class="btn btn-info btn-small">
                            	<i class="ico-search-1"></i> Detalhes
                            </a>
                      </td>
                    </tr>
                    <?php endforeach;?>
				</tbody>
                
       		</table>
            <?php }else{?>
                <div style="padding:25px 0;"><center>Você não possui faturas em aberto</center></div>
            <?php }?>
     
			
            
        </div>
		<div class="tab-pane" id="extrato_finance">
            <p>
                Confira abaixo seu extrato mensal de lançamentos.
            </p>
            <p>
            Escolha um mês e clique em <i><strong>Ver Mês </strong></i> para abrir o histórico do mês correspondente
            </p>
            <div id="tableExtrato">
                <table class="table table-striped">
                    <div id="ver_mes">
                    <form id="extrato_mes" method="post">
                        <select name="MES_EXTRATO" style=" margin-bottom:0px; font:14px Open Sans; width:100px;">
                            <?php foreach($por_data as $by_data):?>
                                <option value="<?=dateFormat($by_data->DATA, "Y-m");?>">
                                    <?=dateFormat($by_data->DATA, "m/Y");?>
                                </option>
                            <?php endforeach; ?>
                            
                        </select>
                        <input type="hidden" name="CLIENTE" value="<?=$this->session->userdata('clienteLogado')?>" />
                        <button type="button" class="btn btClienteExtrato" style="font:12px Arial; font-weight:bold; padding:6px;">Ver mês</button>
                    </form>
                        
                    </div>
                    
                        <tbody>
                            <thead>
                                <tr>
                                  <th width="10%">01/11/2012</th>
                                  <th width="73%">Saldo Anterior</th>
                                  <th width="3%">&nbsp;</th>
                                  <th style="text-align:right;" width="17%">R$ 0,00</th>
                                </tr>
                            </thead>
                            <?php if($financeiro != NULL):?>
                            <?php foreach($financeiro as $bill):?>
                            <tr>
                              <td><?=dateFormat($bill->DATA, "d/m/Y");?></td>
                              <td>
                                    <span class="tip" title="<?=$bill->PERIODO?>">
                                        <?=$bill->DESCRICAO?>
                                    </span></td>
                              <td><?=($bill->TIPO == "credito")? "+" : "-"?></td>
                              <td style="text-align:right;">R$ <?=numFormat($bill->VALOR)?></td>
                            </tr>
                            <?php endforeach;?>
                            
                            <tr>
                              <td><b>28/02/2013</b></td>
                              <td><b>Saldo do mês</b></td>
                              <td><b>
                              <?php
                                $total = 0;
                                foreach($financeiro as $bill){
                                    if($bill->TIPO == "credito"){
                                        $total += $bill->VALOR;
                                    }else{
                                        $total -= $bill->VALOR;
                                    }
                                }
        
                              ?>
                              </b></td>
                              <td style="text-align:right;"><b>R$ <?=numFormat($total)?></b></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    
                </table>
            </div>
        </div>
		<div class="tab-pane" id="dados_bancarios">
      		<table class="table table-striped table-hover tabela_cicloPagamento">
        	<thead>
                <tr>
                  <th width="10%">Fatura #</th>
                  <th width="12%">Data</th>
                  <th width="12%">Vencimento</th>
                  <th width="15%">Valor</th>
                  <th width="12%">Status</th>
                  <th width="15%"></th>
                </tr>
            </thead>
                <tbody>
                	<?php foreach($faturas_all as $fatura):?>
                    <tr>
                      <td><b>#<?=$fatura->CODIGO?></b></td>
                      <td><?=dateFormat($fatura->DATA, "d/m/Y")?></td>
                      <td><?=dateFormat($fatura->VENCIMENTO, "d/m/Y")?></td>
                      <td>R$ <?=numFormat($fatura->VALOR)?></td>
                      <td>
                      <?php					  
					  switch($fatura->STATUS){
							case 'nao pago': echo '<span class="label label-important">NÃO PAGO</span>'; break;
							case 'em aberto': echo '<span class="label label-warning">EM ABERTO</span>'; break;
							case 'pago': echo '<span class="label label-success">PAGO</span>'; break;
					  }?></td>
                      <td>
                      		<a style="float:right;" onclick="redirecionaPainel('<?=site_url()?>fatura/?<?=$fatura->HASH?>')" class="btn btn-info btn-small">
                            	<i class="icon-search icon-white"></i> Detalhes
                            </a>
                      </td>
                    </tr>
                    <?php endforeach;?>
				</tbody>
                
       		</table>
      	</div>
    </div>
     
    
</div>

<!-- Janela Modal - ALTERAR CICLO DE PAGAMENTO -->
<div id="Alterar_cicloPagamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; ">
	<div class="modal-header">
        <button type="button" class="close fecharModal" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><b>Alterar ciclo de cobrança</b></h3>
    </div>
    <div class="modal-body">
        <ul>
            <li>
                <label>
                    <div class="input">
                        <input id="pag_cartao_visa" type="radio" name="PAGAMENTO" class="radio" /> 
                    </div>
                    <div class="tipoPagamento">Mensal</div>
                </label>
            </li>
            <li>
                <label>
                    <div class="input">
                        <input id="pag_cartao_" type="radio" name="PAGAMENTO" class="radio" /> 
                    </div>
                    <div class="tipoPagamento">Trimestral</div>
                </label>
            </li>
            <li>
                <label>
                    <div class="input">
                        <input id="pag_cartao_visa" type="radio" name="PAGAMENTO" class="radio" /> 
                    </div>
                    <div class="tipoPagamento">Semestral</div>
                </label>
            </li>
            <li>
                <label>
                    <div class="input">
                        <input id="pag_cartao_visa" type="radio" name="PAGAMENTO" class="radio" /> 
                    </div>
                    <div class="tipoPagamento">Anual</div>
                </label>
            </li>
            <li>
                <label>
                    <div class="input">
                        <input id="pag_cartao_visa" type="radio" name="PAGAMENTO" class="radio" /> 
                    </div>
                    <div class="tipoPagamento">Bianual</div>
                </label>
            </li>                
        </ul>
    </div>
    <div class="modal-footer">
    	<button class="fecharModal btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Alterar</button>
    </div>
</div><!-- ./Alterar_cicloPagamento -->


<!-- Janela Modal - ALTERAR FORMA DE PAGAMENTO-->
<div id="Alterar_formaPagamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; ">
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><b>Alterar forma de pagamento</b></h3>
    </div>
    <div class="modal-body">
    	<div id="bandeiras">
            <ul>
                <li>
                    <label>
                        <img src="<?=site_url()?>/assets/images/icon-visa.gif" alt="Visa Eletron" />
                        <input id="pag_cartao_visa" type="radio" name="BANDEIRACARTAO" class="radio" />
                    </label>
                </li>
                <li>
                    <label>
                        <img src="<?=site_url()?>/assets/images/icon-master.gif" alt="Cartão MasterCard" />
                        <input id="pag_cartao_mastercard" type="radio" class="radio" name="BANDEIRACARTAO" />
                    </label>
                </li>
                <li>
                    <label>
                        <img src="<?=site_url()?>/assets/images/icon-diners.gif" alt="Diners" />
                        <input id="cartao_diners" type="radio" name="BANDEIRACARTAO" class="radio" />
                    </label>
                </li>
                <li>
                    <label>
                        <img src="<?=site_url()?>/assets/images/icon-boleto.png" alt="Boleto Bancário" />
                        <input id="pag_boleto" type="radio" name="BANDEIRACARTAO" class="radio"/>
                    </label>
                </li>
                <li style="margin-right:0px;">
                    <label>
                        <img src="<?=site_url()?>/assets/images/icon-amex.gif" alt="American Express" />
                        <input id="pag_cartao_american" type="radio" name="BANDEIRACARTAO" class="radio"/>
                    </label>
                </li>
            </ul>
        </div>
        <div id="detalhes_Cartao">
            <div id="dados_cartao" style="margin-right:15px;">
                Nome do titular do cartão
                <input type="text" class="span4" name="NUMEROCARTAO" />
                <div id="dados_cartao">
                Número do cartão
                <input type="text" class="span3" name="NUMEROCARTAO" />
                Código de segurança
                <input type="text" class="span1" name="CODIGOCARTAO" />
            </div>
                Data de vencimento
                <input type="text" class="span1" name="VENCIMENTOCARTAO" /> 
            </div>
        </div>
        <label class="faturaUnica">
        	<input type="checkbox" name="SERVICOFATURAUNICA" /> Quero que todos os serviços sejam cobrados através de uma fatura única.
        </label>
	</div>
    <div class="modal-footer">
    	<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Alterar</button>
    </div>
</div>



<!-- Janela Modal - DETALHE FATURA-->
<div id="detalhe_fatura" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; "></div>



