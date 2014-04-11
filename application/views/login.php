<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Administração Cursultoria :: <?=$this->lang->line('html_login_titulo');?></title>
<link type="text/css" rel="stylesheet" href="<?=site_url()?>/assets/css/login.css"  />
<link type="text/css" rel="stylesheet" href="<?=site_url()?>/assets/css/ui.notify.css" />

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="favicon.ico" />

<script type="text/javascript" src="<?=site_url()?>assets/jquery/easyui/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=site_url()?>assets/jquery/easyui/plugins/jquery-ui.js"></script>
<script type="text/javascript" src="<?=site_url()?>assets/jquery/easyui/plugins/jquery.notify.js"></script>

<script type="text/javascript">
function create( template, vars, opts ){
	return $container.notify("create", template, vars, opts);
}

$(function(){
	$container = $("#error").notify();
	create("sticky");
});
</script>
</head>

<body>

	<?=validation_errors()?>
	<?=form_open()?>
	
	<div id="wrapp">

    	<div id="logo"><img src="<?=site_url()?>assets/img/logos/cursultoria.png" /></div>
        <div id="content">
        	<div id="col-left">
           	  <div class="tit_form"><?=$this->lang->line('html_login_titulo');?></div>
                <div class="tit_input" style="margin-top:25px;"><?=$this->lang->line('html_login_input_usuario');?></div>
                <input name="usuario" autocomplete="off" type="text" class="offtype" onFocus="this.className='ontype'" onBlur="this.className='offtype'" value="" />

                <div class="tit_input" style="margin-top:12px;"><?=$this->lang->line('html_login_input_senha');?></div>
                <input name="senha"  autocomplete="off" type="password" class="offtype" onFocus="this.className='ontype'" onBlur="this.className='offtype'" value="" />
 
                <input type="submit" name="submit" class="submit" value="Entrar" />
                <div class="register">
                	<a href="#"><?=$this->lang->line('html_login_link_recuperasenha');?></a>
                    <br />
                    <a href="#"><?=$this->lang->line('html_login_link_cadastro');?></a>
                </div>

            </div>
            <div id="col-right">
            	<img src="<?=site_url()?>assets/img/login/detalhes.png" />
            </div>
        </div>

    	<div id="footer" align="center">
            Este sistema foi otimizado para uso com os seguintes navegadores<br />
            <img src="<?=site_url()?>assets/img/login/browsers.png" border="0" alt="" />
     	</div>
	</div>
	<?=form_close()?>

</body>
</html>