<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?=site_url()?>/assets/css/mail.css" rel="stylesheet" type="text/css" />
<title>Modelo de Email - Cadastro Success</title>
</head>
<body>

<div id="wrap">
	<div id="header">
        <a href="#">
        	<img src="<?=site_url();?>/assets/images/logos/gerentepro.png" height="50" border="0" class="header_logo" />
        </a>
        <h2>Dados e Configura��es</h2>
    </div>
    
    <div id="content" class="borda10px">
        <p>Ol�, <b>FULANO DE TAL</b></p>
		
        <p>Este e-mail possui todos os dados e configura��es importantes que voc� precisa saber para utilizar seu servi�o.</p>
        
        <p>Para administrar qualquer servi�o, acesse a <b>Central de Cliente</b> e depois "Meus Servi�os"</p>        
        <p>
            <a href="#painel" class="botao" style="font-size:13px; margin-left:190px;">Ir para Central de Cliente</a>
		</p>
        
        <p>Administre sua conta e dom�nios atrav�s dele!</p>
        <p style="font-size:13px; line-height:20px;">
        	� Gerenciamento e cria��o de e-mails, redirecionamentos<br />
            � Gerecionamento de DNS<br />
            � Troca de senha de FTP<br />
        </p>
        
        <p><b>DNS para Registro de Dom�nio:</b></p>
        <p>Segue abaixo a lista de DNS para cadastro junto ao registro do seu dom�nio:</p>
        
        <p style="font-size:13px; line-height:20px;">
        	<table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">DNS Master :</th>
                <td>
                	ns1.codemax.com.br (189.38.95.2)
                </td>
              </tr>
              <tr>
                <th style="width:105px;">DNS Slave 1:</th>
                <td>
                	ns2.codemax.com.br (189.38.95.3)
                </td>
              </tr>
              <tr>
                <th style="width:105px;">DNS Slave 2:</th>
                <td>
                	ns3.codemax.com.br (177.12.162.2)
                </td>
              </tr>
              <tr>
                <th style="width:105px;">DNS Slave 3:</th>
                <td>
                	ns4.codemax.com.br (177.12.162.3)
                </td>
              </tr>
            </table>
        </p>
        
        <p>
            O ID t�cnico da Codemax para registro ".BR" (Registro.br) � "<strong>PMPLT3</strong>"
		</p>
        
        <p><b>Endere�os de Acesso:</b></p>
        <p style="font-size:13px; line-height:20px;">
        	<a href="#">http://www.meudominio.com.br</a> ou <a href="#">http://meudominio.com.br</a><br />
            <table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">Endere�o alternativo:</th>
                <td>
                	<font style="font-size:13px; line-height:18px;"><a href="#">https://192.168.0.67/~meudominio</a><br />
                    (enquanto seu nome de dom�nio n�o estiver registrado na Internic ou na registro.BR, voc� poder� acessar suas p�ginas web atrav�s deste endere�o)
                    </font>
                </td>
              </tr>
            </table>
        </p>
        
        <p><b>Dados de FTP:</b></p>        
        <p style="font-size:13px; line-height:20px;">
        	<table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">Host para FTP:</th>
                <td>
                	ftp.meudominio.com.br ou 192.168.0.67
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Usu�rio:</th>
                <td>
                	meudominio
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Senha:</th>
                <td>
                	himura08
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Porta:</th>
                <td>
                	21
                </td>
              </tr>
            </table>
        </p>
        <p>
            <img src="<?=site_url()?>/assets/img/icons/16x16/folder.png" /> /www/ -> neste diret�rio dever�o estar as suas p�ginas e fotos, figuras, etc.
		</p>
        
        <p><b style="color:#c00;">Aten��o:</b></p>
        <p>
        
           Para enviar seus primeiros arquivos *.html, gif e jpg (no geral: suas p�ginas), e depois continuar a atualizar seu site, recomendamos que utilize o programa <strong>FileZilla</a>.
        </p>
        
        <p><b>Webmail:</b></p> 
        <p>Para utilizar o webmail, acesse:</p>       
        <p style="font-size:13px; line-height:20px;">
        	<table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">Endere�o:</th>
                <td>
                	<a href="#">http://webmail.meudominio.com.br</a>
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Usu�rio:</th>
                <td>
                	usuario@meudominio.com.br
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Senha:</th>
                <td>
                	himura08
                </td>
              </tr>
            </table>
        </p>
        
        <p><b>Dados necess�rios para configura��o da conta de email</b> (No Outlook, Thunderbird, Apple Mail ou outro programa de e-mail) s�o:</p>
        <p>
        
           [x] <b>POP3 Server</b> ou Servidor de Mensagens Recebidas:<br />
           <strong>pop.meudominio.com.br</strong>
        </p>
        
        <p>
        	[x] POP3 Account ou <b>Username</b>, ou Nome de Usu�rio:<br />
            <strong>usuario@meudominio.com.br</strong><br />
            Senha: <strong>himura08</strong>
        </p>
        
        <p>
        	[x] <b>SMTP Server</b> ou Servidor de Mensagens Enviadas: <br />
				<strong>smtp.meudominio.com.br</strong><br /><br />
				Aten��o: marcar a op��o "MEU SERVIDOR REQUER AUTENTICA��O"
        </p>
        
        <p>Em caso de d�vidas, entre em contato por um dos canais de atendimento.</p>
        
        <p>Atenciosamente,<br />
        Equipe Codemax</p>
    </div>
    
    <div id="footer">
    	<b>Esta mensagem foi enviada automaticamente, por favor n�o responda!</b><br /><br />
    
        <p>Se voc� possui filtro antispam habilitado em sua caixa postal, autorize o email
<b><a href="#">noreply@gerentepro.com.br</a></b> para continuar recebendo nossas mensagens</p>


    </div>
</div>

</body>
</html>
