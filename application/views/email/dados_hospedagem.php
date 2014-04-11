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
        <h2>Dados e Configurações</h2>
    </div>
    
    <div id="content" class="borda10px">
        <p>Olá, <b>FULANO DE TAL</b></p>
		
        <p>Este e-mail possui todos os dados e configurações importantes que você precisa saber para utilizar seu serviço.</p>
        
        <p>Para administrar qualquer serviço, acesse a <b>Central de Cliente</b> e depois "Meus Serviços"</p>        
        <p>
            <a href="#painel" class="botao" style="font-size:13px; margin-left:190px;">Ir para Central de Cliente</a>
		</p>
        
        <p>Administre sua conta e domínios através dele!</p>
        <p style="font-size:13px; line-height:20px;">
        	» Gerenciamento e criação de e-mails, redirecionamentos<br />
            » Gerecionamento de DNS<br />
            » Troca de senha de FTP<br />
        </p>
        
        <p><b>DNS para Registro de Domínio:</b></p>
        <p>Segue abaixo a lista de DNS para cadastro junto ao registro do seu domínio:</p>
        
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
            O ID técnico da Codemax para registro ".BR" (Registro.br) é "<strong>PMPLT3</strong>"
		</p>
        
        <p><b>Endereços de Acesso:</b></p>
        <p style="font-size:13px; line-height:20px;">
        	<a href="#">http://www.meudominio.com.br</a> ou <a href="#">http://meudominio.com.br</a><br />
            <table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">Endereço alternativo:</th>
                <td>
                	<font style="font-size:13px; line-height:18px;"><a href="#">https://192.168.0.67/~meudominio</a><br />
                    (enquanto seu nome de domínio não estiver registrado na Internic ou na registro.BR, você poderá acessar suas páginas web através deste endereço)
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
                <th style="width:105px;">Usuário:</th>
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
            <img src="<?=site_url()?>/assets/img/icons/16x16/folder.png" /> /www/ -> neste diretório deverão estar as suas páginas e fotos, figuras, etc.
		</p>
        
        <p><b style="color:#c00;">Atenção:</b></p>
        <p>
        
           Para enviar seus primeiros arquivos *.html, gif e jpg (no geral: suas páginas), e depois continuar a atualizar seu site, recomendamos que utilize o programa <strong>FileZilla</a>.
        </p>
        
        <p><b>Webmail:</b></p> 
        <p>Para utilizar o webmail, acesse:</p>       
        <p style="font-size:13px; line-height:20px;">
        	<table id="cadastro" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th style="width:105px;">Endereço:</th>
                <td>
                	<a href="#">http://webmail.meudominio.com.br</a>
                </td>
              </tr>
              <tr>
                <th style="width:105px;">Usuário:</th>
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
        
        <p><b>Dados necessários para configuração da conta de email</b> (No Outlook, Thunderbird, Apple Mail ou outro programa de e-mail) são:</p>
        <p>
        
           [x] <b>POP3 Server</b> ou Servidor de Mensagens Recebidas:<br />
           <strong>pop.meudominio.com.br</strong>
        </p>
        
        <p>
        	[x] POP3 Account ou <b>Username</b>, ou Nome de Usuário:<br />
            <strong>usuario@meudominio.com.br</strong><br />
            Senha: <strong>himura08</strong>
        </p>
        
        <p>
        	[x] <b>SMTP Server</b> ou Servidor de Mensagens Enviadas: <br />
				<strong>smtp.meudominio.com.br</strong><br /><br />
				Atenção: marcar a opção "MEU SERVIDOR REQUER AUTENTICAÇÃO"
        </p>
        
        <p>Em caso de dúvidas, entre em contato por um dos canais de atendimento.</p>
        
        <p>Atenciosamente,<br />
        Equipe Codemax</p>
    </div>
    
    <div id="footer">
    	<b>Esta mensagem foi enviada automaticamente, por favor não responda!</b><br /><br />
    
        <p>Se você possui filtro antispam habilitado em sua caixa postal, autorize o email
<b><a href="#">noreply@gerentepro.com.br</a></b> para continuar recebendo nossas mensagens</p>


    </div>
</div>

</body>
</html>
