<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css' />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="cadastro.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>

</head>

<body>

<div id="painelCadastro">
    <form id="formCadastro" action="#" autocomplete="on" method="post">
    	<h1>
        	Vamos Começar
        	<img src="assets/images/logos/netrevenda.png" alt="Logotipo" />
        </h1>
        <h2>Solicitar Sua ID Origin</h2>
        <b>Cadastre um ID</b>
        <div class="input-append">
          
          <input class="span3" name="CAD_ID" required="required" id="prependedInput" type="text" placeholder="Digite seu ID">
          <span class="add-on">.gerentepro.com.br</span>
        </div>
        
        <p>
		<div class="btn-group" data-toggle="buttons-radio">
              <button type="button" style="font-size:14px;" class="btn btn-warning">Pessoa Física</button>
              <button type="button" style="font-size:14px;" class="btn btn-warning">Pessoa Jurídica</button>
        </div>
        <p>
            <b>Nome / Empresa</b>
            <input type="text" class="span4 well" name="CAD_NOME" placeholder="Degite seu Nome ou Empresa" /> 
            <font class="ajuda_cadastro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</font>
            
        </p>
		<p>
            <b>E-mail</b>
            <input class="span4" type="email" required="required" name="CAD_EMAIL" placeholder="Degite seu E-mail" />
            <font class="ajuda_cadastro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</font>
        </p>
        <p>
            <b>Senha</b>
            <input class="span4" type="password" required="required" name="CAD_SENHA" placeholder="Degite uma Senha" />
            <font class="ajuda_cadastro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</font>
        </p>
        <p>
            <b>Confirmar Senha</b>
            <input class="span4" type="password" required="required" name="CAD_SENHA_CONF" placeholder="Confirme a Senha" />
            <font class="ajuda_cadastro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</font>
        </p>
    </form>
    <div id="recaptcha">
        <h2>Confirme que você é humano</h2>
        <b>Digite as letras que você vê no campo abaixo:</b>
       	<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LeWDNkSAAAAAC0KTBTv2Gs4WzFv8QAKQ9vh6k3v"></script>
		<noscript>
		<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeWDNkSAAAAAC0KTBTv2Gs4WzFv8QAKQ9vh6k3v" height="300" width="302" frameborder="0"></iframe><br>
		<textarea name="recaptcha_challenge_field" rows="3" cols="40">  </textarea>
		<input type="hidden" class="span4" name="recaptcha_response_field"	value="manual_challenge">
		</noscript>
		<div id="cad_termos">
            <li>
            	<input type="checkbox" />Entre em contato comigo sobre produtos, notícias, eventos e promoções da EA.
            </li>
            <li>
           		<input type="checkbox"/>Compartilhar minhas informações com os parceiros selecionados
            </li>
            <li>
            	<input type="checkbox"/>Aceito a <span class="btn-link">Política de Privacidade</span> e os <span class="btn-link">Termos de Serviço</span> da EA
            </li>
            <button type="button" class="btn btn-success">Cadastrar</button>
		</div>
	</div>
    <div id="footer">
		<p>
            <b>© 2012 YOUCOMPANY. Todos os direitos reservados.</b>
            <font style="font:10px Arial, Helvetica, sans-serif; background:url(assets/images/ico_lock3.png) left no-repeat; padding-left:20px; padding-top:3px;" color="#999">
                Você está em um ambiente seguro e gerenciado pelo <a href="#" style=" text-decoration:none; font-weight:bold; color:#1d63a8; display:inline; font-size:10px;">GerentePRO</a>.
                Portanto, dúvidas sobre produtos e serviços contratados devem ser encaminhadas diretamente para YOUCOMPANY
            </font>
		</p>
	</div>
</div>
</body>
</html>
