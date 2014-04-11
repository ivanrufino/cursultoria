<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="<?=site_url()?>assets/global.css" media="screen" rel="stylesheet" type="text/css"/>
    

    <title>Cursultoria - Login</title>
</head>
<body onload="document.getElementById('username').focus()">
    <div id="w-header">
    <div id="header_login">
        <h1><a title="Mundvs Software" href="#"><img src="<?=site_url()?>assets/img/logo_painel/cursultoria.png" style="height:45px;" alt="Mundvs Software"/></a></h1>    </div>
    <div id="w-nav_login">

    </div>
</div>

<!-- CONTEUDO -->
<div id="content_login" class="content_login">
    <div class="processo_login">
    	<?=validation_errors()?>
                <h2 class="title_login"><strong>Login</strong></h2>
        <?=form_open()?>
            <div class="boxDadosLogin">
                <h3 class="titleLoginH3">Identifique-se para acessar o sistema.</h3>

                <fieldset>
                    <ol class="form">
                        <li>
                            <label class="lblLogin" for="username">E-mail:</label>
                            <input class="inpLogin" autocomplete="off" id="username" name="usuario" type="text"/>
                        </li>
                        <li>
                            <label class="lblLogin" for="password">Senha:</label>
                            <input class="inpLogin" autocomplete="off" id="password" name="senha" type="password"/>
                        </li>
                    </ol>
                </fieldset>
            </div>
            <div class="btnLoginEntrar btn btnVermelho btnSetaDir">
                <input type="submit" value="Entrar">
                <span><!-- --></span>
            </div>
                        
            <div class="btnLoginCancelar btn btnCinza btnSetaDir">
                <a href="cadastro">Cadastre-se</a>
                <span><!-- --></span>
            </div>
                    </form>
            <div class="forget-password">
            <h4>Esqueceu sua senha?</h4>
            <p>
                <a href="<?=site_url()?>aluno/resetSenha" id="forget-password">Clique aqui</a> para recuperar sua senha.</p>
        </div>
    </div>
</div>
<hr />
<div id="footer_login">
    <p>Instituto BZ <br /> Copyright © 2013 <br />  </p></div>    
	<script type="text/javascript" charset="UTF-8" src="<?=site_url()?>assets/js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?=site_url()?>assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?=site_url()?>assets/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?=site_url()?>assets/js/default.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?=site_url()?>assets/js/plugins.js"></script>

</body>
</html>