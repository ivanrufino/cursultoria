<script type="application/javascript">
	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	
</script>

<div class="modal-header" style="background-color:#<?php echo$cor_default?>">
        <a type="button" class=" close" rel="fecharModal" data-dismiss="modal" aria-hidden="true">×</a>
        <h3 id="myModalLabel">
        	<b>Informações técnicas</b>
        </h3>
    </div>
    <div class="modal-body">
    	<p>
        	<b>DNS para Registro de Domínio:</b><br/>
            Segue abaixo a lista de DNS para cadastro junto ao registro do seu domínio:
        </p>
        <table class="table table-striped">
 			<tbody>
				<tr>
                    <th class="fundoCinza">DNS Master:</th>
                    <td style="background:none;">
                        ns1.codemax.com.br (189.38.95.2)
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">DNS Master:</th>
                    <td style="background:none;">
                        ns1.codemax.com.br (189.38.95.2)
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">DNS Master:</th>
                    <td style="background:none;">
                        ns1.codemax.com.br (189.38.95.2)
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">DNS Master:</th>
                    <td style="background:none;">
                        ns1.codemax.com.br (189.38.95.2)
                    </td>
				</tr>
            </tbody>
		</table>
        <span> O ID técnico da Codemax para registro ".BR" (Registro.br) é <b>"PMPLT3"</b></span>
		<p>
        	<b>Endereços de Acesso:</b><br/>
            <a class="btn-link" href="#">http://www.meudominio.com.br</a> ou <a class="btn-link" href="#">http://meudominio.com.br</a>
        </p>
         <table class="table table-striped">
 			<tbody>
				<tr>
                    <th class="fundoCinza" style="padding-top:20px;">Endereço alternativo:</th>
                    <td style="background:none; text-align:justify">
                        <a class="btn-link" href="#">https://192.168.0.67/~meudominio</a><br/>
						(enquanto seu nome de domínio não estiver registrado na Internic ou na registro.BR, você poderá acessar suas páginas web através deste endereço) 
                    </td>
				</tr>
			</tbody>
		</table>
        <p>
        	<b>Dados de FTP:</b>
        </p>
		<table class="table table-striped">
 			<tbody>
				<tr>
                    <th class="fundoCinza">Host para FTP:</th>
                    <td style="background:none;">
                        ftp.meudominio.com.br ou 192.168.0.67 
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">Usuário:</th>
                    <td style="background:none;">
                        meudominio 
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">Senha:</th>
                    <td style="background:none;">
                        minhasenha
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">Porta:</th>
                    <td style="background:none;">
                        21
                    </td>
				</tr>
            </tbody>
		</table>
        <p>
        	<img src="<?=site_url()?>/assets/img/icons/16x16/folder.png"> /www/ - neste diretório deverão estar as suas páginas e fotos, figuras, etc. 
        </p>
        <p>
        	<b style="color:red; font-weight:bold">Atenção</b><br/>
            Para enviar seus primeiros arquivos *.html, gif e jpg (no geral: suas páginas), e depois continuar a atualizar seu site, recomendamos que utilize o programa <b>FileZilla</b>. 
        </p>
		<p>
        	<b style="font-weight:bold">Webmail</b><br/>
            Para utilizar o webmail, acesse:
        </p>
        <table class="table table-striped">
 			<tbody>
				<tr>
                    <th class="fundoCinza">Endereço:</th>
                    <td style="background:none;">
                        http://webmail.meudominio.com.br
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">Usuário:</th>
                    <td style="background:none;">
                        usuario@meudominio.com.br 
                    </td>
				</tr>
				<tr>
                    <th class="fundoCinza">Senha:</th>
                    <td style="background:none;">
                        minhasenha
                    </td>
				</tr>
            </tbody>
		</table>
        <p>
        	<b>Dados necessários para configuração da conta de email </b>(No Outlook, Thunderbird, Apple Mail ou outro programa de e-mail) são:
        </p>
        <p>
            [x] <b>POP3</b> Server ou Servidor de Mensagens Recebidas:<br/>
            <b>pop.meudominio.com.br</b>
        </p>
        <p>
            [x] <b>POP3</b> Account ou Username, ou Nome de Usuário:<br/>
            <b>usuario@meudominio.com.br<br/>
			Senha: himura08</b>
        </p>
        <p>
            [x] <b>SMTP</b> Server ou Servidor de Mensagens Enviadas: <br/>
            <b>smtp.meudominio.com.br</b>
        </p>
        <p>
        	<b>Atenção:</b> marcar a opção "MEU SERVIDOR REQUER AUTENTICAÇÃO"<br/>
        </p>
        <p>
            Em caso de dúvidas, entre em contato por um dos canais de atendimento.
        </p>
    </div>  
    <div class="modal-footer">
    	<a rel="fecharModal" class="btn">Fechar</a>
        <button class="btn btn-success">Alterar</button>
    </div>