<script type="text/javascript">
// Botão de Login


jQuery.fn.loginCliente = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/get_login',
		data:$('#form-loginCentral').serialize(),
		beforeSend: function(){
			$("#btLogin_central").button('loading');
		},

		success: function(data){
			if(data == "success"){
				var novaURL = "<?=site_url()?>";
				$(window.document.location).attr('href',novaURL);
			}
			if(data == "failure"){
				//document.getElementById('form-loginCentral').reset();
				$("#alertError").slideDown();
			}
			$("#btLogin_central").button('reset');
		}
	});
	return false;
	
};

jQuery.fn.cadastroCliente = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/cadastroCliente',
		data:$('#cadastroCliente').serialize(),
		beforeSend: function(){
			$(".btSubmitCadastro").button('loading');
		},

		success: function(data){
			$(".btSubmitCadastro").button('reset');
			$(".alertCadastro").alert();
			$(".alertCadastro").fadeIn();
		}
	});
	return false;
};

jQuery.fn.respostaTicket_cliente = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/respostaTicket_cliente',
		data:$('#submit_respostaTicket').serialize(),
		beforeSend: function(){
			$("#btSubmitRespostaTicket").button('loading');
		},

		success: function(data){
			$("#btSubmitRespostaTicket").button('reset');
				
				if(data == "foi"){
					
					showNotification({
						type : "success",
						message: "Sua resposta foi enviada com sucesso!",
						autoClose: true,
						duration: 4,
						
					});
					setInterval(function(){window.location.reload();}, 1500); 
				}else{
					showNotification({
						type : "error",
						message: "O campo <b>Nova resposta</b> deve ser preenchido!",
						autoClose: true,
						duration: 4
					});
				}
		}
	});
	return false;
};

jQuery.fn.novoTicket_cliente = function(){ 
	
	$('#submit_novoTicket').form({  
		url:'<?=site_url()?>cliente/novoTicketCliente',  
		onSubmit:function(){  
			return $(this).form('validate');  
		},
		success:function(data){  
			$(".btNovoTicket_cliente").button('reset');
			$("#modalTicket").modal('hide');
			showNotification({
				type : "success",
				message: "<b>Seu ticket foi criado</b> e foi enviada uma cópia para você via email.",
				autoClose: true,
				duration: 4
			});
			setInterval(function(){window.location="<?=site_url()?>cliente/suporte/tickets/"+data;}, 1500); 
		}  
	});  
};


////////// Alterar senha
jQuery.fn.trocaSenhaCliente = function(){
	
	if($('[name="NOVA_SENHA"]').val() == $('[name="CONFIRMA_SENHA"]').val()){

		$.ajax({
			type: 'POST',
			url: '<?=site_url()?>cliente/trocaSenha_cliente',
			data:$('#trocaSenhaCliente').serialize(),
			beforeSend: function(){
				$(".btSubmitSenhaCliente").button('loading');
			},
	
			success: function(data){
				$(".btSubmitSenhaCliente").button('reset');
				$("#modalMudarSenha").modal('hide');

				if(data == "foi"){
					showNotification({
						type : "success",
						message: "Senha alterada com sucesso!",
						autoClose: true,
						duration: 4
					});
				}else{
					showNotification({
						type : "error",
						message: "Senha incorreta!",
						autoClose: true,
						duration: 4
					});
				}
				
			}
		});
	}else{
		alert("A confirmação de senha incorreta!");
	}
		
};

jQuery.fn.extratoCliente = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>admin/json/extratoCliente',
		data:$('#extrato_mes').serialize(),
		beforeSend: function(){
			$(".btClienteExtrato").button('loading');
			$("#tableExtrato").html("Carregando...");
		},

		success: function(data){
			$(".btClienteExtrato").button('reset');
			$("#tableExtrato").html(data);
		}
	});
	return false;
};

jQuery.fn.exibeNovoTicket = function(){

		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>admin/configuracoes/exibeNovoTicket/',
			dataType: 'html',
			success: function(data){
				//Tratamento dos dados de retorno.
				$("#mainframe").html(data);//$("#mainframe").html(data);
			}
		});
		return false;
};

jQuery.fn.servicoDetalhes = function(){
	return this.each(function(){
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>cliente/getByIdServico/'+this.id,
			dataType: 'html',
			//function(data) vide item 4 em $.get $.post
			success: function(data){
				//Tratamento dos dados de retorno.
				$("#mainframe").html(data);//$("#mainframe").html(data);
			}
		});
		return false;
	});
	
};

jQuery.fn.faturaDetalhes = function(){
	
	$("#detalhe_fatura").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>/admin/json/cliente_fatura/'+$(this).data('id'),
		dataType: 'html',
		beforeSend: function(){
			/*
			* Ação que será executada após o envio, no caso, chamei um gif
			* loading para dar a impressão de carregamento na página
			*/
			//$('#loading_popup').html()
			$("#detalhe_fatura").html(' <h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		//function(data) vide item 4 em $.get $.post
		success: function(data){
			//Tratamento dos dados de retorno.
			$("#detalhe_fatura").html(data);
		}
	});
	return false;
	
};
jQuery.fn.trocarPlano = function(){
	$("#modalTrocarPlano").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>cliente/modal_alterarPlano/'+$(this).data('id'),
		dataType: 'html',
		beforeSend: function(){
			//$('#loading_popup').html()
			$("#modalTrocarPlano").html('<h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		success: function(data){
			$("#modalTrocarPlano").html(data);

		}
	});
	return false;
};

jQuery.fn.trocarSenha = function(){
	$("#modalMudarSenha").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>cliente/modal_alterarSenha/',
		dataType: 'html',
		beforeSend: function(){
			//$('#loading_popup').html()
			$("#modalMudarSenha").html('<h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		success: function(data){
			$("#modalMudarSenha").html(data);
			
		}
	});
	return false;
};

jQuery.fn.esqueciSenha = function(){
	$("#modalEsqueciSenha").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>cliente/modal_esqueciSenha/',
		dataType: 'html',
		beforeSend: function(){
			//$('#loading_popup').html()
			$("#modalEsqueciSenha").html('<h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		success: function(data){
			$("#modalEsqueciSenha").html(data);
			
		}
	});
	return false;
};

jQuery.fn.infoTecnicas = function(){
	$("#modalInfoTecnica").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>cliente/modal_infoTecnicas/',
		dataType: 'html',
		beforeSend: function(){
			//$('#loading_popup').html()
			$("#modalInfoTecnica").html('<h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		success: function(data){
			$("#modalInfoTecnica").html(data);
		}
		
	});
	
	return false;

};


jQuery.fn.solicCancelamento = function(){
	$("#modalSolicCancelamento").modal('show');
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>cliente/modal_solicCancelamento/'+ $(this).data('id'),
		dataType: 'html',
		beforeSend: function(){
			//$('#loading_popup').html()
			$("#modalSolicCancelamento").html('<h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		success: function(data){
			$("#modalSolicCancelamento").html(data);
		}
	});
	return false;
};

function redirecionaPainel(url){
	window.open(url);
} /* --/getURL -- */


//###### DETALHES DO SERVICO ########################################
var ok 	 = '<i class="ico-ok-circle"></i>';
var erro = '<i class="ico-attention"></i>';
 
jQuery.fn.submitAlterSenhaServico = function(){
	
	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/alteraSenhaServico',
		data:$('#form_trocaSenhaCliente').serialize(),
		beforeSend: function(){
			$("#envia").button('loading');
		},
		success: function(data){
			switch (data){
				case "vazio": showNotification({type : "error", message: "Degite uma senha!", autoClose: true, duration: 4}); break;
				case "foi"	: showNotification({type : "success", message: "Senha alterada com sucesso!", autoClose: true, duration: 4}); break;
				case "error": showNotification({type : "error", message: "Senha atual incorreta!", autoClose: true, duration: 4}); break;
			}
			$("#form_trocaSenhaCliente").get(0).reset();			
		}
	});	
};

jQuery.fn.submitAlterSenhaCliente = function(){
	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/cliente_alterarSenha',
		data:$('#form_trocaSenhaCliente').serialize(),
		success: function(data){
			switch (data){
				case "vazio": showNotification({type : "error", message: "Degite uma senha!", autoClose: true, duration: 4}); break;
				case "foi"	: showNotification({type : "success", message: "Senha alterada com sucesso!", autoClose: true, duration: 4}); break;
				case "error": showNotification({type : "error", message: "Senha atual incorreta!", autoClose: true, duration: 4}); break;
			}
			$("#form_trocaSenhaCliente").get(0).reset();	
		}
			
	});
};


jQuery.fn.submitEsqueciCliente = function(){
	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/cliente_esqueciSenha',
		data:$('#trocaEsqueciCliente').serialize(),
		success: function(data){
			
			$("#trocaEsqueciCliente").get(0).reset();
			$("#respostaJSON").html(data);
				
		}
			
	});
};

jQuery.fn.submitCancelDetalhesServico = function(){
	if($('textarea').val() != ""){
		$.ajax({
			type: 'POST',
			url: '<?=site_url()?>cliente/solicitacaoDetalhesServico',
			data:$('#form_cancelamentoServico').serialize(),
			success: function(data){
				if(data == "novo"){
					$("#msgCancelServico").removeClass('alert alert-error').addClass("alert alert-success").html(ok+" Solicitação de cancelamento de serviço enviada com sucesso!");
				} else {
					$("#msgCancelServico").addClass("alert alert-error").html(erro+" Uma solicitação de cancelamento do serviço já foi enviada, aguarde!");
				}
				
			}
		});		
	} else {
		$('textarea').focus();
		$("#msgCancelServico").addClass("alert alert-error").html(erro+" Por favor, informe o motivo do cancelamento.");
	}
		
};

jQuery.fn.submitAlterPlanoServico = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>cliente/solicitacaoDetalhesServico',
		data:$('#form_alterarPlanoDetalheCliente').serialize(),
		success: function(data){
			if(data == "novo"){
				$("#msgTrocaPlano").addClass("alert alert-success").html(ok+" Solicitação de troca de plano enviada com sucesso!");
			} else {
				$("#msgTrocaPlano").addClass("alert alert-error").html(erro+" Uma solicitação de troca de plano já foi enviar, aguarde!");
			}
			
		}
	});		
};



$(function(){
		
	
	$(".tip").tooltip();
	$('.easyui-validatebox').validatebox();
	
	
	// Executando as opções de selecionados..
	$("#clienteLogout").click(function(){
		var novaURL = "<?=site_url()?>cliente/get_logout";
		$(window.document.location).attr('href',novaURL);
	});

	$("a.faturaDialog").click(function(){
		$(this).faturaDetalhes();
	});

	$(".btNovoTicket_cliente").click(function(){
		$(this).novoTicket_cliente();
	});

	$(".fechar_trocarPlano").click(function(){
		$("#modalTrocarPlano").modal('hide');
	});
	
		
	$("#btSubmitRespostaTicket").click(function(){
		$(this).respostaTicket_cliente();
	});
	
	
	
	$(".closeFatura").click(function(){
		$("#detalhe_fatura").modal('hide');
	});
	
	$(".btSubmitCadastro").click(function(){
		$(this).cadastroCliente();
	});
	
	$(".btSubmitEsqueciSenha").click(function(){
		$(this).submitEsqueciCliente();
	});
	
	$(".btSubmitSenhaCliente").click(function(){
		$(this).trocaSenhaCliente();
	});
	
	$(".btClienteExtrato").click(function(){
		$(this).extratoCliente();
	});
	
	$("a[rel='loginCliente']").click(function(){
		$(this).loginCliente();
	});
	
	$("a[rel='trocarPlano']").click(function(){
		$(this).trocarPlano();
	});

	$("a[rel='trocarSenha']").click(function(){
		$(this).trocarSenha();
	});
	
	$("a[rel='esqueciSenha']").click(function(){
		$(this).esqueciSenha();
	});
	
	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	
	$("a[rel='infoTecnicas']").click(function(){
		$(this).infoTecnicas();
	});
	
	$("a[rel='servico_detalhes']").click(function(){
		$(this).servicoDetalhes();
	});
	
	$("a[rel='btn_alteraSenhaCliente']").click(function(){
		$(this).submitAlterSenhaCliente();
	});
	
	$("a[rel='btn_alteraSenhaServico']").click(function(){
		$(this).submitAlterSenhaServico();
	});
	
	$("a[rel='btn_solicitaCancelServico']").click(function(){
		$(this).submitCancelDetalhesServico();
	});
	
	$("a[rel='btn_alterPlanoServico']").click(function(){
		$(this).submitAlterPlanoServico();
	});
	$("a[rel='bt_novoTicket']").click(function(){
		$(this).exibeNovoTicket();
	});
	$("a[rel='solicCancelamento']").click(function(){
		$(this).solicCancelamento();
	});
	
	$("a[rel='excluir']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		//$("#del_cadastro").submit();
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) iten(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDel();
			}
		});

	});

});

</script>