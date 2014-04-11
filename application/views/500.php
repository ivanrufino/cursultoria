<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Erro 500 - Página não encontrada</title>

<script type="text/javascript" src="<?=site_url();?>/assets/jquery.min.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.validate.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery-ui.js"></script>
<script type="text/javascript" src="<?=site_url();?>/assets/jquery_notification.js"></script>


<script type="text/javascript" src="<?=site_url();?>/assets/script.js"></script>

<link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/themes/icon.css">
<!--<link rel="stylesheet" type="text/css" href="assets/themes/gerentepro/easyui.css">-->
<link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/themes/default/easyui.css">

<script type="text/javascript">
function create( template, vars, opts ){
	return $container.notify("create", template, vars, opts);
}

function addTab(url){
	
	$.ajax({
		type: 'GET',
		//url: '<?=site_url()?>/json/teste/'+this.id,
		url: url,
		dataType: 'html',
		beforeSend: function(){
			/*
			* Ação que será executada após o envio, no caso, chamei um gif
			* loading para dar a impressão de carregamento na página
			*/
			//$('#loading_popup').html()
			$("#mainframe").html('<h2 style="padding:10px"><img src="assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
		},
		//function(data) vide item 4 em $.get $.post
		success: function(data){
			//Tratamento dos dados de retorno.
			$("#mainframe").html(data);
		}
	});
}

$(function(){
	$container = $(".error").notify();
	create("sticky");
});
</script>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css' />
<style type="text/css"><?php require('error.css'); ?></style>
<style type="text/css"><?php require('assets/jquery_notification.css'); ?></style>

</head>

<body>
<?php echo validation_errors(); ?>

	<div id="header_wrap">
        <div id="header_top">
            <img src="<?=site_url();?>/assets/images/logos/gerentepro.png" height="50" class="header_logo" />
            
        </div><!-- /header_top -->
    </div>
    
    <div id="content_wrap">
    	<div id="content" class="borda10px">
            <div style="background:url(<?=site_url();?>/assets/images/error_icon3.png) no-repeat; height:64px; padding-left:75px; width:180px; margin:0 auto; margin-bottom:15px;">
            	<h1>Oops!</h1>
            	<p><b>Página não encontrada</b></p>
            </div>
            
            <div style=" background:#f0f0f0; width:680px; text-align:center; padding:5px 10px; margin:0 auto;" class="borda5px">
            	<p>O serviço não foi localizado no sistema.<br /> Verifique se você digitou errado.</p>
            </div>

        </div><!-- /content -->
    </div>
    
	<!-- Footer -->
    <div id="footer_wrap">
        <div id="footer_bottom">
            <label style="width:100%; margin-top:5px; text-align:center;">
                <p style="margin:0px;">
                
                   <font style="font:12px Helvetica, Arial, sans-serif; background:url(<?=site_url();?>/assets/images/icon_lock.png) left no-repeat; padding-left:20px; padding-top:3px;" color="#999">
                        Você está em um ambiente seguro e gerenciado pelo <a href="#" style=" text-decoration:none; font-weight:bold; color:#1d63a8; display:inline; font-size:12px;">GerentePRO</a>.
                    </font>
                    <b style="font-weight:normal; font-size:12px;">© 2012 GerentePRO. Todos os direitos reservados.</b>
                </p>
            </label>
            
            
        </div>
    </div><!-- /#footer_wrap -->

</body>
</html>