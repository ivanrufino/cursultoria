<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	<div id="central_tit">Controle financeiro</div>
		<div id="detalhes_faturas" class="borda5px">
        	<p>
            	<i><img src="<?=site_url()?>/assets/img/icons/32x32/alert3.png" /></i> <b>Você tem pagamentos pendentes:</b>
            </p>
        </div>
     	<p style="padding-top:10px; font-size:">Confira abaixo seu extrato mensal de lançamentos.</p>
        <div id="todos_detalhes_fatura">     
            <div id="data_fatura" align="center">
                <div class="btn-group">
                    <button class="btn btIcon"><i class="icon-chevron-left"></i></button>
                    <button class="btn btIcon"><b style="font-size:14px;">Setembro 2012</b></button>
                    <button class="btn btIcon"><i class="icon-chevron-right"></i></button>
                </div>
            </div><!-- ./data_fatura -->
            <table id="table_detalhes_faturas" class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th width="10%">Data</th>
                              <th width="60%">Detalhes</th>
                              <th width="15%">Valor R$</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>22/11/2012</td>
                              <td style="color:#666;">Hospedagem Plano I de 05/04/2012 a 05/05/2012</td>
                              <td><span class="label label-important" style="color:white;">- 100,00</span></td>
                            </tr>
                            <tr>
                              <td>22/11/2012</td>
                              <td>Pagamento através de Boleto Bancário</td>
                              <td><span class="label label-success">+ 50,00</span></td>
                            </tr>
                            <tr>
                              <td>22/11/2012</td>
                              <td>Pagamento através de Boleto Bancário</td>
                              <td><span class="label label-success">+ 100,00</span></td>
                            </tr>
                        </tbody>
                    </table><!-- ./table_detalhes_faturas -->
                    <div id="dados_cobranca" style="margin-right:10px;">
                    	<img src="<?=site_url()?>/assets/img/icons/48x48/money_black.png" alt="" />
                        <font><b>Forma de pagamento</b></font>
                        <a href="#modalFormaPagamento" role="button" class="btn btn-small btn-warning" data-toggle="modal">Alterar</a>
                    </div>
                    <div id="dados_cobranca">
                    	<img src="<?=site_url()?>/assets/img/icons/48x48/Black_Calendar.png" alt="" />
                        <font><b>Ciclo de cobrança</b></font>
                        <a href="#modalCicloPagamento" role="button" class="btn btn-small btn-warning" data-toggle="modal">Alterar</a>
                    </div><!-- ./dados_cobranca -->
                </div>
                <div id="detalhes_servicos" class="borda5px">
					<div id="central_subtit" style="padding-top:10px; padding-left:10px;"> Fatura atual</div>
                    <p>Sua fatura vence em: <strong>22/11/2012</strong></p>
                    <h2>R$ 0,00</h2>
                    <p style="padding-bottom:2px;"><strong>Referente à:</strong><br />
                    <li>Hospedagem de Sites (Fácil 1GB)<br /> <i>meudominio.com.br</i></li>
                    <li>Registro de Dominio (.com.br)<br /> <i>meudominio.com.br</i></li>
                    </p>
                    <div class="extrato">
                        <center><button name="PAGAR_EXTRATO" type="submit" class="btn btn-primary btSub">Pagar fatura</button></center>
                    </div>
      			</div><!-- ./detalhes_servicos -->
</div><!-- ./wrap -->

<!-- Janela Modal - ALTERAR FORMA DE PAGAMENTO-->
<div id="modalFormaPagamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; ">
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

<!-- Janela Modal - ALTERAR CICLO DE PAGAMENTO-->
<div id="modalCicloPagamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; ">
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><b>Alterar ciclo de pagamento</b></h3>
    </div>
    <div class="modal-body">
    	<div id="tipoPagamento">
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
        
    </div>
    <div class="modal-footer">
    	<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Alterar</button>
    </div>
</div>



