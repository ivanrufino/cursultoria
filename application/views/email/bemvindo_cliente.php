<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8879" />

<title>Modelo de Email - Cadastro Success</title>
<style type="text/css">
*{ margin:0px; padding:0px;}

body{ margin:0px; padding:0px; background:#eee;}

#wrap{ margin:15px auto; width:600px; overflow:auto; }
.borda5px{-moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;}
.borda10px{-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;}

#header{ display:block; overflow:hidden; }
#header img{ float:left; margin:10px 10px 10px 0;}
#header h2{ float:right; margin:25px 0px 5px 10px; color:#666; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:normal; letter-spacing:-1px;}

#content{ padding:18px; font:13px Arial, Helvetica, sans-serif; color:#666; border-top:3px solid #e3e3e3; border-left:1px solid #e3e3e3; border-right:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; background:#fff;}
#content p{font:13px Arial, Helvetica, sans-serif; color:#666; margin-bottom:15px;}
#content p b{font:13px Arial, Helvetica, sans-serif; font-weight:bold; color:#333;}

a.botao{ text-align:center; padding:5px 8px; font:13px Arial, Helvetica, sans-serif; color:#fff; background:#c01111; border:1px dotted #800000; text-decoration:none; margin-left:230px;}

#pedido{ width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff; background:#f3f3f3}
#pedido th{ background:#ccc; color:#333; padding:3px 6px; text-align:left; font-weight:bold;}
#pedido td{ padding:3px 6px; color:#232323;}

#cadastro{ width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff;}
#cadastro th{ background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;}
#cadastro td{ padding:4px 6px; color:#666;}

#recursos{ width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff;}
#recursos th{ background:#eee; color:#333; padding:5px; text-align:center; width:70px; font-weight:bold;}
#recursos td{ padding:4px 6px; color:#666;}

#recursos span{ font-size:12px;}
#recursos h3{ font-size:16px;}
#recursos h4{ font-size:13px;}

#footer{ width:600px; margin:10px 10px 10px 0; border-top:1px dotted #ccc; padding-top:10px; font:10px Arial, Helvetica, sans-serif; color:#777;}

#footer b{ font-size:11px;}
#footer a{ font-size:10px;}



/* Impress�o */
#wrap_impresso{ margin:0 auto; width:920px; overflow:auto; background:#fff;}
#title_imp{float:right; margin-top:10px; margin-right:10px;}
#title_imp h1{font:28px Arial, Helvetica, sans-serif; color:#069;}
#title_imp p{text-align:right; font:12px Arial, Helvetica, sans-serif; color:#333;}
</style>
</head>
<body style="margin:0px; padding:0px; background:#eee;">	
    
    <table align="center" id="recursos" width="600" border="0" cellpadding="0" cellspacing="0" style="margin:15px auto;">
      <tr>
        <td>
        	<a href="#">
            	<img style="float:left; margin:10px 10px 10px 0;" src="<?=site_url()?>uploads/logos/<?=$logotipo?>" height="50" border="0" />
        	</a>
        </td>
        <td align="right">
        	<h2 style="float:right; text-align:right; margin:25px 0px 5px 10px; color:#666; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:normal; letter-spacing:-1px;">Bem-vindo</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF">
        	<div style="padding:18px; font:13px Arial, Helvetica, sans-serif; color:#666; border-top:3px solid #e3e3e3; border-left:1px solid #e3e3e3; border-right:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; background:#fff;">
            <p>Ol�! <b><?=$RAZAO_NOME?></b>,</p>
            
            <p>Este e-mail possui todos os dados e configura��es que voc� precisa saber para utilizar sua conta na <?=$this->users->nome_chave()?></p>
            
            <h3>Dados de acesso:</h3>
            <p>
                <table style=" width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff;" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">URL do Painel:</th>
                    <td style="padding:4px 6px; color:#666;"><a href="http://<?=$USUARIO?>.gerentepro.com.br/">http://<?=$USUARIO?>.gerentepro.com.br</a></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Usu�rio:</th>
                    <td style="padding:4px 6px; color:#666;"><?=$EMAIL_USUARIO?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Senha:</th>
                    <td style="padding:4px 6px; color:#666;"><?=$SENHA_USUARIO?></td>
                  </tr>
                </table>
            </p>

        </div>        </td>
      </tr>
      <tr>
        <td colspan="2">
            <div style=" width:600px; margin:10px 10px 10px 0; border-top:1px dotted #ccc; padding-top:10px; font:10px Arial, Helvetica, sans-serif; color:#777;">
                <b>Esta mensagem foi enviada automaticamente, por favor n�o responda!</b><br /><br />
            
                <p>Se voc� possui filtro antispam habilitado em sua caixa postal, autorize o email
        <b><a href="#">noreply@gerentepro.com.br</a></b> para continuar recebendo nossas mensagens</p>
            </div>        </td>
      </tr>
    </table>

</body>
</html>
