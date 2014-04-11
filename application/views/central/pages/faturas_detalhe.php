



<div class="modal-header">
    <button type="button" class="close closeFatura" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><b>Fatura #<?=$fatura->CODIGO?></b></h3>
    <span style="font-size:12px"><?=$fatura->DATA?></span>
</div>
<div class="modal-body">
    <div id="topoFatura">
        <div id="topoFatura_esquerda">
            <li>
                <?=$this->cadastros->isThis($cliente->EMAIL)?>
            </li>
            <li>
                CPF: <?=$this->cadastros->isCPF_CNPJ($cliente->EMAIL)?>
            </li>
            <li>
                &nbsp;
            </li>
            <li>
            Fone: <?=$cliente->TELEFONE?>
            </li>
            <li>
            E-mail: <?=$cliente->EMAIL?>
            </li>
        </div>
        <div id="topoFatura_direita">
            <li><?=$cliente->LOGRADOURO?>, <?=$cliente->NUMERO?></li>
            <li><?=$cliente->COMPLEMENTO?>, <?=$cliente->BAIRRO?></li>
            <li>&nbsp;</li>
            <li><?=$cliente->CIDADE?>, <?=$cliente->UF?></li>
            <li>CEP: <?=$cliente->CEP?></li>
        </div>
    </div> <!--topoFatura -->
   
    <table class="table table-striped" id="tabela_faturaDetalhes">
      <thead bgcolor="#CCCCCC" >
         <tr>
            <td align="left" width="60%">Serviço / Plano</td>
            <td width="23%">Ciclo Pagto</td>
            <td width="17%">Valor R$</td>
        </tr>
      </thead>
      <?php foreach($fatura_itens as $item){?>
      <tr>
        <td>
			<?=$item->PROD_NOME?><br />
            <span><?=$item->PROD_DOMINIO?></span>
        </td>
        <td style="text-transform:capitalize"><?=$item->PROD_CICLO?></td>
        <td>R$ <?=numFormat($item->PROD_VALOR)?></td>
      </tr>
	  <?php }?>
    </table>
    
     <div id="totalProjeto">
        <div id="total">
            <li>Total da Fatura:</li>
            <li class="valor-negrito">R$ <?=numFormat($fatura->VALOR)?></li>
        </div>
        <div id="projeto">
            <p>
                <b>Vencimento: <?=$fatura->VENCIMENTO?></b>
            </p>
        </div>
    </div> <!--totalProjeto-->
    <div id="bandeiras">
        <ul class="well well-large">
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
    </div> <!--bandeiras-->
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal"><i class="icon-print"></i> Imprimir fatura</button>
    <button class="btn btn-success"><i class="icon-ok icon-white"></i> Pagar fatura</button>
</div>