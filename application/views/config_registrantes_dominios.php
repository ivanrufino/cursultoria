<!--<?php //$this->load->view('json/default');?>-->
<?php
$this->load->view('json/config');

?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Registrantes de Domínio</b>
</div>

<div id="gatewaysPagamentos">

    <div class="gateways borda5px">       
    	<div class="logotipo_gateways">
        	<img src="<?=site_url()?>assets/images/gateways/icon_boleto.png" />
        </div>
        <div id="gateway_moeda">
        	<b>Manual (aviso por email)</b>
            
            <?php if($manual != NULL){?>
            	<a class="btn btn-warning btn-small" id="manual_<?=$userKey?>" rel="registranteDetalhe"><i class="ico-pen"></i> Editar</a>
            	<a class="btn btn-danger btn-small" id="manual_<?=$userKey?>" rel="deletarRegistrante"><i class="ico-block"></i> Desativar</a>
            <?php }else{?>
            	<a class="btn btn-success btn-small" id="manual_none" rel="registranteDetalhe"><i class="ico-ico-off"></i> Ativar</a>
            	<a class="btn btn-link btn-small" href="#">Como contratar este convênio?</a>
            <?php }?>
        </div>
    </div>
    
    <!--
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_resellerclub.png" />
        </div>
        <div id="gateway_moeda">
        	<b>ResellerClub</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="icon-ok icon-white"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_resellbiz.png" />
        </div>
        <div id="gateway_moeda">
        	<b>Resell.biz</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="icon-ok icon-white"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_enom.png" />
        </div>
        <div id="gateway_moeda">
        	<b>eNom</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="icon-ok icon-white"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_godaddy.png" />
        </div>
        <div id="gateway_moeda">
        	<b>GoDaddy</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="icon-ok icon-white"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    
    <div class="gateways borda5px">     
    	<div class="logotipo_gateways">
    		<img src="<?=site_url()?>assets/images/gateways/logo_opensrs.png" />
        </div>
        <div id="gateway_moeda">
        	<b>OpenSRS</b>
            <a class="btn btn-success btn-small disabled" rel="gatewayDetalhe"><i class="icon-ok icon-white"></i> Ativar</a>
            <a class="btn btn-link btn-small disabled" href="#">Como contratar este convênio?</a>
        </div>   
    </div>
    -->
    
</div><!--gatewaysPagamentos-->

<!-- pop-up de operações -->
<div id="pop_viewRegistrante"></div>
