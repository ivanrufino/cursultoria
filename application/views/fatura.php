<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fatura #<?=$fatura->CODIGO?></title>

<script type="text/javascript" src="<?=site_url();?>/assets/js/widgets.js"></script>
<script src="<?=site_url();?>/assets/js/jquery.js"></script>
    
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.validate.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery-ui.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery_notification.js"></script>

<script type="text/javascript" src="<?=site_url();?>/assets/js/bootstrap.min.js"></script>



<!--<script src="<?=site_url();?>/assets/js/google-code-prettify/prettify.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-transition.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-alert.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-modal.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-dropdown.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-scrollspy.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-tab.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-tooltip.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-popover.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-button.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-collapse.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-carousel.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-typeahead.js"></script>
<script src="<?=site_url();?>/assets/js/bootstrap-affix.js"></script>
<script src="<?=site_url();?>/assets/js/application.js"></script>-->


<script type="text/javascript">
$(function(){
	$(".btnPagar").click(function(){
		
		if($('.E_PAGAMENTO').val() == ""){
			alert('Selecione uma forma de pagamento');
		}
		
		if($('.E_PAGAMENTO').val() == "boleto"){
			var novaURL = "<?=site_url()?>boleto/?<?=$fatura->HASH?>";
			window.open(novaURL);
		}
		
		if($('.E_PAGAMENTO').val() == "cartao"){
			alert("ai faz uma validação via REST do cartão com o GerenciaNet");
		}
		if($('.E_PAGAMENTO').val() == "pagseguro"){
			var novaURL = "<?=site_url()?>admin/json/pagarFatura/?"+$("#inputs_pgtos").serialize();
			window.open(novaURL);
		}
		if($('.E_PAGAMENTO').val() == "moip"){
			var novaURL = "<?=site_url()?>admin/json/pagarFatura/?"+$("#inputs_pgtos").serialize();
			window.open(novaURL);
		}
	});
	
	
});
	
</script>
<script type="text/javascript" src="<?=site_url();?>/assets/script.js"></script>

<link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/themes/icon.css">
<!--<link rel="stylesheet" type="text/css" href="assets/themes/gerentepro/easyui.css">-->
<link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/themes/default/easyui.css">

<style type="text/css"><?php require('style.css'); ?></style>
<style type="text/css"><?php require('error.css'); ?></style>
<style type="text/css"><?php require('assets/jquery_notification.css'); ?></style>
<style type="text/css"><?php require('assets/css/fatura.css'); ?></style>

</head>

<body>

	<div id="header_wrap">
        <div id="header_top">
            <img src="<?=site_url();?>uploads/logos/<?=$logotipo?>" height="50" class="header_logo" />
            <div id="fatura_bntsTopo">
            	<button id="btnImprime" class="btn"><i class="icon-print"></i> Imprimir</button>
            	<button id="btnDownloadPDF" class="btn"><i class="icon-download-alt"></i> Download PDF</button>
            </div>
        </div><!-- /header_top -->
    </div>
    
    <div id="content_wrap">
    	<div id="content2" class="borda10px">
            
            <div id="top_header">
            	<div class="handlers">
                	<p>ID FATURA</p>
                    <b>#<?=$fatura->CODIGO?></b>
                </div>
                <div class="handlers" style="border-right:0px;">
                	<p>VENCIMENTO</p>
                    <b class="bold_valor"><?=dateFormat($fatura->VENCIMENTO, "d/m/Y")?></b>
                </div>
                
                <div class="handlers" style="border-right:0px; margin:0px; float:right;">
                	<?php switch($fatura->STATUS){
						case 'nao pago': echo '<span class="label label-important">NÃO PAGO</span>'; break;
						case 'em aberto': echo '<span class="label label-warning">EM ABERTO</span>'; break;
						case 'pago': echo '<span class="label label-success">PAGO</span>'; break;
					}?>
                </div>
            </div>
            
            <div id="fatura_cliente">
            	<div style="float:left">
                	<b class="detalhe_cliente">Informações do Cliente</b>
                	<?=$cliente->RAZAO_NOME;?><br />
                    <?=($cliente->TIPO_PESSOA == "fisica") ? "CPF: ".$cliente->CPF : "CNPJ: ".$cliente->CNPJ;?><br />
                    <br />
                    E-mail: <?=$cliente->EMAIL?><br />
                    Tel: <?=$cliente->TELEFONE?>
                </div>
                <div style="float:right; border:0px;">
                	<b class="detalhe_endereco">Dados de Endereço</b>
                	<?=$cliente->LOGRADOURO?>, <?=$cliente->NUMERO?><br />
                    <?=$cliente->COMPLEMENTO?>, <?=$cliente->BAIRRO?><br />
                    <br />
                    <?=$cliente->CIDADE?>, <?=$cliente->UF?><br />
                    CEP: <?=$cliente->CEP?><br />
                </div>
            </div>
            
            <div id="fatura_detalhe">
            	<b class="itens_fatura">Itens da Fatura</b>
                

                <table class="table table-striped table-hover" id="tabela_faturaDetalhe" style="border:1px solid #eee;">
                    <thead>
                        <tr>
                          <th width="80%">Detalhes do Serviço</th>
                          <th width="5%"></th>
                          <th width="15%">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($fatura_itens as $item):?>
                        <tr>
                          <td>
                          <?=$item->PROD_NOME?> <?=($item->PERIODO != "") ? "-  &nbsp; (".$item->PERIODO.")" : ""?>
                		  <?=($item->PROD_DOMINIO != "" ? '<br /><b style="line-height:10px;">'.$item->PROD_DOMINIO."</b>" : "")?>
                          </td>
                          <td>( - )</td>
                          <td>R$ <?=numFormat($item->PROD_VALOR)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
                <div id="fatura_observacoes">
                	<b class="fatura_obs">Nota</b>
                	
                    <p>Selecione uma forma de pagamento e clique no botão "<b>Pagar fatura</b>" abaixo.</p>
                    <p>Após confirmação do pagamento efetuada automaticamente, os serviços contratados serão liberados.</p>
                </div>
                
                <div id="fatura_total">
                    <table id="tabela_faturaTotal">
                            
                        <tr>
                          <td>Sub-total</td>
                          <td align="right"><b>R$ <?=numFormat($fatura->VALOR)?></b></td>
                        </tr>
                        <tr>
                          <td>Taxas / Créditos</td>
                          <td align="right"><b>0,00</b></td>
                        </tr>
                        <tr>
                          <td><b class="texto_total">Total Devedor</b></td>
                          <td align="right"><b class="total_valor">R$ <?=numFormat($fatura->VALOR)?></b></td>                      
                        </tr>
                            
                    </table>
                </div>
            </div>
            
            <div id="fatura_pagamentos"> <!-- ***************************************************************** -->
            	<input type="hidden" class="E_PAGAMENTO" name="PAGAMENTO" value="" />
    
                <div class="titulo_registro borda5px" style="background:#f0f0f0;">
                <?php if($fatura->STATUS == 'pago'){?>
                    	<span class="left" style="width:100%; font-size:14px;">Pagamento efetuado em <?=dateFormat($fatura->DATA_UPDATE)?></span>
                <?php }elseif($config_pagseguro == NULL && $config_boleto == NULL && $config_moip == NULL){?>
						
                        <div style="background:url(<?=site_url();?>/assets/images/error_icon3.png) no-repeat; height:64px; padding-left:75px; width:280px; margin:0 auto; margin-bottom:15px;">
                            <h1>Oops!</h1>
                            <p><b>Forma de pagamento não configurado</b></p>
                        </div>
                        					
                <?php }else{?> 
                    <span class="left" style="width:100%;">A ativação do serviço está sujeito a confirmação do primeiro pagamento via boleto bancário ou intermediadores de pagamento.</span>
                    
                    <form method="post" id="inputs_pgtos">
                    
                        
                    
                    <input type="hidden" class="E_PAGAMENTO" name="PAGAMENTO" value="" />
                    
                    <input type="hidden" name="FAT_CODIGO" value="<?=$fatura->CODIGO?>" />
                    <input type="hidden" name="FAT_VALOR" value="<?=$fatura->VALOR?>" />
                    <input type="hidden" name="CLIENTE_NOME" value="<?=$cliente->RAZAO_NOME;?>" />
                    <?php
                    	$telefone_cliente = str_replace("(", "", $cliente->TELEFONE);
						$telefone_cliente = str_replace(")", "", $telefone_cliente);
						$telefone_cliente = str_replace("-", "", $telefone_cliente);
						$telefone_cliente = str_replace(" ", "", $telefone_cliente);
					?>
                    
                    <input type="hidden" name="CLIENTE_DDD" value="<?=substr($telefone_cliente, 0, 2);?>" />
                    <input type="hidden" name="CLIENTE_TELEFONE" value="<?=substr($telefone_cliente, 2, strlen($telefone_cliente));?>" />
                    <input type="hidden" name="CLIENTE_EMAIL" value="<?=$cliente->EMAIL?>" />
                    <input type="hidden" name="ENDERECO_NOME" value="<?=$cliente->LOGRADOURO?>" />
                    <input type="hidden" name="ENDERECO_NUMERO" value="<?=$cliente->NUMERO?>" />
                    <input type="hidden" name="ENDERECO_COMPLEMENTO" value="<?=$cliente->COMPLEMENTO?>" />
                    <input type="hidden" name="ENDERECO_BAIRRO" value="<?=$cliente->BAIRRO?>" />
                    <input type="hidden" name="ENDERECO_CIDADE" value="<?=$cliente->CIDADE?>" />
                    <input type="hidden" name="ENDERECO_UF" value="<?=$cliente->UF?>" />
                    
                    <?php
						$cep_cliente = str_replace("-", "", $cliente->CEP);
						$cep_cliente = str_replace(".", "", $cep_cliente);
					?>
                    <input type="hidden" name="ENDERECO_CEP" value="<?=$cep_cliente?>" />
                    
                    <div style="float:left; overflow:auto; width:450px;">
                    
                    <?php if($config_boleto != NULL):?>
                    <div id="view_boleto">
                        <b class="left" style="margin-top:20px;">Boleto Bancário</b><br />
                                
                        <div class="line" style="margin-top:10px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>
                                    <span class="left" style="width:100%; font-size:12px; line-height:18px;">
                                        * O boleto para pagamento é gerado após efetuar o pagamento.<br />
                                        * Não é necessário o envio de comprovante após o pagamento.<br />
                                        <br />
                                        
                                        <div class="borda5px ui-error">
                                            <strong>Aviso: o boleto continuará válido somente por 5 (cinco) dias corridos após o vencimento.</strong>
                                        </div>
                                    </span>
                                </td>
                              </tr>
                              
                            </table>
                        </div>
                    </div><!-- ./boleto -->
                    <?php endif;?>
                    <?php if($config_pagseguro != NULL):?>
                    <div id="view_pagseguro" style="display:none;">
                        <b class="left" style="margin-top:20px;">PagSeguro</b><br />
                                
                        <div class="line" style="margin-top:10px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>
                                    <span class="left" style="width:100%; font-size:12px; line-height:18px;">
                                        * Não é necessário o envio de comprovante após o pagamento.<br />
                                        * A confirmação do pagamento é feito automaticamente pelo PagSeguro.<br /><br />
                                        
                                        <div class="borda5px ui-error">
                                            <strong>Atenção: Você será redirecionado para a página de pagamento do PagSeguro</strong>
                                        </div>
                                        
                                        
                                    </span>
                                </td>
                              </tr>
                              
                            </table>
                        </div>
                    </div><!-- ./PagSeguro -->
                    <?php endif; //PagSeguro ?>
                    
                    <?php if($config_moip != NULL):?>
                    <div id="view_moip" style="display:none;">
                        <b class="left" style="margin-top:20px;">Moip</b><br />
                                
                        <div class="line" style="margin-top:10px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>
                                    <span class="left" style="width:100%; font-size:12px; line-height:18px;">
                                        * Não é necessário o envio de comprovante após o pagamento.<br />
                                        * A confirmação do pagamento é feito automaticamente pelo Moip.<br /><br />
                                        
                                        <div class="borda5px ui-error">
                                            <strong>Atenção: Você será redirecionado para a página de pagamento do Moip</strong>
                                        </div>
                                        
                                        
                                    </span>
                                </td>
                              </tr>
                              
                            </table>
                        </div>
                    </div><!-- ./PagSeguro -->
                    <?php endif; //Moip ?>
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
                        	<?php if($config_boleto != NULL):?>
                            <tr class="func_boleto">
                                <td id="select_pgto_boleto"><input name="FORMA_PAGAMENTO" checked="checked" id="plano_1" type="radio" value="boleto" /></td>
                                <td style="padding:0px;">
                                    <label class="label_pag" for="plano_1">
                                    <p><img src="<?=site_url()?>/assets/images/icon_boleto.png" /></p>
                                    </label>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php if($config_pagseguro != NULL):?>
                            <tr class="func_pagseguro">
                                <td id="select_pgto_pagseguro"><input name="FORMA_PAGAMENTO" id="plano_3" type="radio" value="pagseguro" /></td>
                                <td style="padding:0px;">
                                    <label class="label_pag" for="plano_3">
                                    	<p><img src="<?=site_url()?>/assets/images/logo_pagseguro.png" /></p>
                                    </label>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php if($config_moip != NULL):?>
                            <tr class="func_moip">
                                <td id="select_pgto_moip"><input name="FORMA_PAGAMENTO" id="plano_3" type="radio" value="moip" /></td>
                                <td style="padding:0px;">
                                    <label class="label_pag" for="plano_3">
                                    	<p><img src="<?=site_url()?>/assets/images/logo_moip.png" /></p>
                                    </label>
                                </td>
                            </tr>
                            <?php endif;?>
                            <!--<tr>
                                <td id="select_pgto_cartao"><input name="FORMA_PAGAMENTO" id="plano_2" type="radio" value="cartao" /></td>
                                <td style="padding:0px;">
                                    <label class="label_pag" for="plano_2">
                                    	<p><img src="<?=site_url()?>/assets/images/visa_mastercard.png" /></p>
                                    </label>
                                </td>
                            </tr>-->
                            
                            <!--<tr>
                                <td id="select_pgto_moip"><input name="FORMA_PAGAMENTO" id="plano_4" type="radio" value="moip" /></td>
                                <td style="padding:0px;">
                                    <label class="label_pag" for="plano_4">
                                    	<p><img src="<?=site_url()?>/assets/images/logo_moip.png" /></p>
                                    </label>
                                </td>
                            </tr>-->

                        </table>
						
                    </div>
            
                    <label id="fatura_btnPagar">
                    	<button class="btn btn-large btn-success btnPagar">Pagar fatura</button>
                    </label>
                    <?php }?>
                </div>
            </div><!-- *************************************************************************************** -->

        </div><!-- /content -->
    </div>
    
	<!-- Footer -->
    <div id="footer_wrap">
        <div id="footer_bottom">
            <label style="width:100%; margin-top:5px; text-align:center;">
                <p style="margin:0px;">
                
                   <font style="font:12px Lucida Sans, Arial, sans-serif; background:url(<?=site_url();?>/assets/images/icon_lock.png) left no-repeat; padding-left:20px; padding-top:3px;" color="#999">
                        Você está em um ambiente seguro e gerenciado pelo <a href="#" style=" text-decoration:none; font-weight:bold; color:#1d63a8; display:inline; font-size:12px;">GerentePRO</a>.
                    </font>
                    <b style="font-weight:normal; font:12px Lucida Sans, Arial, sans-serif;">© 2012 GerentePRO. Todos os direitos reservados.</b>
                </p>
            </label>
            
            
        </div>
    </div><!-- /#footer_wrap -->

</body>
</html>