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



/* Impressão */
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
        	<h2 style="float:right; text-align:right; margin:25px 0px 5px 10px; color:#666; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:normal; letter-spacing:-1px;">Fatura #<?=$N_FATURA?></h2>
        </td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF">
        	<div style="padding:18px; font:13px Arial, Helvetica, sans-serif; color:#666; border-top:3px solid #e3e3e3; border-left:1px solid #e3e3e3; border-right:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; background:#fff;">
            <p>Prezado(a), <b><?=utf8_decode($RESPONSAVEL)?></b></p>
            
            <p>Detectamos pendências de pagamento referente aos serviços contratados conosco:</p>
            
            <p><b>Está fatura tem o seu vencimento em <?=dateFormat($VENCIMENTO, "d/m/Y")?> </b></p>        
            <p>
                <table style=" width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff;" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Nome / Empresa</th>
                    <td style="padding:4px 6px; color:#666;"><?=utf8_decode($RAZAO_NOME)?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">CPF / CNPJ</th>
                    <td style="padding:4px 6px; color:#666;"><?=$CPF_CNPJ?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Responsável</th>
                    <td style="padding:4px 6px; color:#666;"><?=utf8_decode($RESPONSAVEL)?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">E-mail</th>
                    <td style="padding:4px 6px; color:#666; text-decoration:none;"><?=$EMAIL_CLIENTE?></td>
                  </tr>
                  <tr>
                    <th style="width:105px; background:#f3f3f3; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Telefone</th>
                    <td style="padding:4px 6px; color:#666; text-decoration:none;"><?=$TEL_CLIENTE?></td>
                  </tr>
                </table>
            </p>
            
            <p>Veja os produtos/serviços contratados:</p>
            
            <p>
                <table style=" width:560px; font:12px Arial, Helvetica, sans-serif; color:#fff; background:#f3f3f3" border="0">
                  <tr>
                    <th style="background:#ccc; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Serviço</th>
                    <th style="background:#ccc; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Ciclo</th>
                    <th style="background:#ccc; color:#333; padding:3px 6px; text-align:left; font-weight:bold;">Valor</th>
                  </tr>

                  <tr style="font-size:13px; line-height:18px;">
                    <td style="padding:3px 6px; color:#232323; text-decoration:none;">
                        <b style="text-decoration:none;"><?=utf8_decode($ITENS_FATURA['PROD_NOME'])?></b><br />
                        <font style="font-size:12px; text-decoration:none;"><?=$ITENS_FATURA['PROD_DOMINIO']?></font>                    </td>
                    <td style="padding:3px 6px; color:#232323; text-transform:capitalize;"><b><?=$ITENS_FATURA['PROD_CICLO']?></b></td>
                    <td style="padding:3px 6px; color:#232323;"><b>R$ <?=numFormat($ITENS_FATURA['PROD_VALOR'])?></b></td>
                  </tr>
                </table>
            </p>
            
            <p>
                O boleto no valor total de <b>R$ <?=numFormat($TOTAL_FATURA)?></b> está disponível no link abaixo:<br /><br />
                
                <a style="text-align:center; padding:5px 8px; font:13px Arial, Helvetica, sans-serif; color:#fff; background:#c01111; border:1px dotted #800000; text-decoration:none; margin-left:230px;" href="<?=site_url()?>fatura/?<?=strtoupper(md5("fatura".$N_FATURA))?>">Imprimir Fatura</a>            </p><br />
            
            <p>Você pode efetuar o pagamento na agência bancária ou pela Internet, até a data do vencimento.</p>
            <p><b>Caso o pagamento do boleto já tenha sido realizado, favor desconsiderar este e-mail. </b></p>
            
            <p><b style="color:#c00;">Atenção:</b></p>
            <p>
               <li style="padding-bottom:10px;">Caso não realize o pagamento, <b>seus serviços serão suspensos após 7 dias</b> apartir do vencimento da fatura.</li>
               <li>Você pode <strong>adicionar créditos em sua conta</strong> para serem debitados sob seus contratos, sempre que for necessário.</li>
            </p>
            
            <p>Se você já efetuou o pagamento desta fatura, por favor desconsiderar este e-mail.</p>
            
            <p>Atenciosamente,<br />
            <?=$this->users->nome_chave()?></p>
        </div>        </td>
      </tr>
      <tr>
        <td colspan="2">
            <div style=" width:600px; margin:10px 10px 10px 0; border-top:1px dotted #ccc; padding-top:10px; font:10px Arial, Helvetica, sans-serif; color:#777;">
                <b>Esta mensagem foi enviada automaticamente, por favor não responda!</b><br /><br />
            
                <p>Se você possui filtro antispam habilitado em sua caixa postal, autorize o email
        <b><a href="#">noreply@gerentepro.com.br</a></b> para continuar recebendo nossas mensagens</p>
            </div>        </td>
      </tr>
    </table>

</body>
</html>
