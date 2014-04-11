<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

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
    
    <table align="center" width="600" border="0" cellpadding="0" cellspacing="0" style="margin:15px auto;">
      <tr>
        <td>
        	<a href="#">
            	<img style="float:left; margin:10px 10px 10px 0;" src="<?=site_url()?>uploads/logos/<?=$logotipo?>" height="50" border="0" />
        	</a>
        </td>
        <td align="right">
        	<h2 style="float:right; text-align:right; margin:25px 0px 5px 10px; color:#666; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:normal; letter-spacing:-1px;">Ticket #<?=$N_TICKET?></h2>
        </td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF">
        	<div style="padding:18px; font:13px Arial, Helvetica, sans-serif; color:#666; border-top:3px solid #e3e3e3; border-left:1px solid #e3e3e3; border-right:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; background:#fff;">
            <p>Prezado(a), <b><?=utf8_decode($NOME_CLIENTE)?></b></p>
            
            <p><?=$TITULO_EMAIL?></p><!--O Ticket #<?=$N_TICKET?>   foi respondido pelo(a) <?=$this->users->nome_chave()?>:</p-->
            
            <p><b>N�o responda este e-mail. Se for necess�rio, reabra o ticket na Central de Cliente</b></p>        
            <p>
                <table style=" width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff;" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Ticket ID</th>
                    <td style="padding:4px 6px; color:#666;">#<?=$N_TICKET?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Cliente</th>
                    <td style="padding:4px 6px; color:#666;"><?=utf8_decode($NOME_CLIENTE)?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Departamento</th>
                    <td style="padding:4px 6px; color:#666;"><?=utf8_decode($DEPARTAMENTO)?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Dominio</th>
                    <td style="padding:4px 6px; color:#666; text-decoration:none;"><?=(isset($DOMINIO)) ? utf8_decode($DOMINIO) : ''?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Assunto</th>
                    <td style="padding:4px 6px; color:#666; text-decoration:none;"><?=utf8_decode($ASSUNTO)?></td>
                  </tr>
                </table>
            </p>
            
            <p>&nbsp;</p>
            
            <p>
                <table style=" width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff; background:#f3f3f3" border="0">
                  <tr>
                    <th style="background:#ccc; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">�ltima intera��o:</th>
                  </tr>

                  <tr style="font-size:13px; line-height:18px;">
                    <td style="padding:3px 6px; color:#232323;"><?=utf8_decode($MENSAGEM)?></td>
                  </tr>
                </table>
            </p>
            
            <p>
                O boleto no valor total de est� dispon�vel no link abaixo:<br /><br />
                
                <a style="text-align:center; padding:5px 8px; font:13px Arial, Helvetica, sans-serif; color:#fff; background:#c01111; border:1px dotted #800000; text-decoration:none; margin-left:230px;" href="<?=site_url()?>cliente/suporte/tickets/<?=$N_TICKET?>">Visualizar Ticket</a>            </p><br />
            
            <p>Voc� pode efetuar o pagamento na ag�ncia banc�ria ou pela Internet, at� a data do vencimento.</p>
            <p><b>Caso o pagamento do boleto j� tenha sido realizado, favor desconsiderar este e-mail. </b></p>
            
            <p><b style="color:#c00;">Aten��o:</b></p>
            <p>
               <li style="padding-bottom:10px;">Caso n�o realize o pagamento, <b>seus servi�os ser�o suspensos ap�s 7 dias</b> apartir do vencimento da fatura.</li>
               <li>Voc� pode <strong>adicionar cr�ditos em sua conta</strong> para serem debitados sob seus contratos, sempre que for necess�rio.</li>
            </p>
            
            <p>Se voc� j� efetuou o pagamento desta fatura, por favor desconsiderar este e-mail.</p>
            
            <p>Atenciosamente,<br />
            <?=$this->users->nome_chave()?></p>
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
