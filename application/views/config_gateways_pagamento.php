<!--<?php //$this->load->view('json/default');?>-->
<?php $this->load->view('json/config');?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Formas de pagamento</b>
</div>
<div id="gatewaysPagamentos">

    <div class="gateways borda5px">       
    	<div class="logotipo_gateways">
        	<img src="<?=site_url()?>assets/images/gateways/icon_boleto.png" />
        </div>
        <div id="gateway_moeda">
        	<b>Boleto Bancário</b>
           	<?php if($boleto != NULL){?>
            	<a class="btn btn-warning btn-small" id="boleto_<?=$userKey?>" rel="gatewayBoleto"><i class="ico-pen"></i> Editar</a>
            	<a class="btn btn-danger btn-small" id="boleto_<?=$userKey?>" rel="deletarBoleto"><i class="ico-block"></i> Desativar</a>
            <?php }else{?>
            	<a class="btn btn-success btn-small" id="boleto_none" rel="gatewayBoleto"><i class="ico-ico-off"></i> Ativar</a>
            	<a class="btn btn-link btn-small" href="#">Como contratar este convênio?</a>
            <?php }?>
        </div>
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_pagseguro.png" />
        </div>
        <div id="gateway_moeda">
        	<b>PagSeguro UOL</b>
            <?php if($pagseguro != NULL){?>
            	<a class="btn btn-warning btn-small" id="pagseguro_<?=$userKey?>" rel="gatewayDetalhe"><i class="ico-pen"></i> Editar</a>
            	<a class="btn btn-danger btn-small" id="pagseguro_<?=$userKey?>" rel="deletarGateway"><i class="ico-block"></i> Desativar</a>
            <?php }else{?>
            	<a class="btn btn-success btn-small" id="pagseguro_none" rel="gatewayDetalhe"><i class="ico-ico-off"></i> Ativar</a>
            	<a class="btn btn-link btn-small" href="#">Como contratar este convênio?</a>
            <?php }?>
        </div>
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_moip.png" />
        </div>
        <div id="gateway_moeda">
        	<b>Moip</b>
            <?php if($moip != NULL){?>
            	<a class="btn btn-warning btn-small" id="moip_<?=$userKey?>" rel="gatewayDetalhe"><i class="ico-pen"></i> Editar</a>
            	<a class="btn btn-danger btn-small" id="moip_<?=$userKey?>" rel="deletarGateway"><i class="ico-block"></i> Desativar</a>
            <?php }else{?>
            	<a class="btn btn-success btn-small" id="moip_none" rel="gatewayDetalhe"><i class="ico-ico-off"></i> Ativar</a>
            	<a class="btn btn-link btn-small" href="#">Como contratar este convênio?</a>
            <?php }?>
        </div>   
    </div>
    <!--
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_gerencianet.png" />
        </div>
        <div id="gateway_moeda">
        	<b>GerênciaNet</b>
            <a class="btn btn-success btn-small" rel="gatewayDetalhe"><i class="ico-ico-off"></i> Ativar</a>
            <a class="btn btn-link btn-small" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_paypal.png" />
        </div>
        <div id="gateway_moeda">
        	<b>PayPal</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="ico-ico-off"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    -->
    
</div><!--gatewaysPagamentos-->

<!-- pop-up de operações -->
<div id="pop_viewGateway"></div>
<div id="pop_viewBoleto"></div>
