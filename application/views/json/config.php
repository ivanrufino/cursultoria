	<script type="text/javascript">
//$.messager.alert('My Title','Here is a info message!','error');


// Chamando o PopUp (Trocar Logo)
jQuery.fn.trocaLogo = function(){
	return this.each(function(){
		$("#pop_trocaLogo").dialog("open");
		
		var title = $("#pop_view").dialog("option", "title");
		$("#pop_trocaLogo").dialog("option", "title", "Personalizar a Central do Assinante");	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/trocaLogo',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_trocaLogo").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_trocaLogo").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};


jQuery.fn.exibeLivro = function(){
	return this.each(function(){
		$("#pop_viewLivro").dialog("open");
		
		var title = $("#pop_view").dialog("option", "title");
		$("#pop_viewLivro").dialog("option", "title", "Detalhes da Bibliografia" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verLivro/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewLivro").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_viewLivro").html(data);
				
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.addLivro = function(){
	return this.each(function(){
		$("#pop_addLivro").dialog("open");
		
		var title = $("#pop_view").dialog("option", "title");
		$("#pop_addLivro").dialog("option", "title", "Adcionar da Bibliografia" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_addLivro/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addLivro").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addLivro").html(data);
				
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Detalhes de Servidor)
jQuery.fn.servidorDetalhe = function(){
	return this.each(function(){
		$("#pop_viewServidor").dialog("open");
		
		var title = $("#pop_viewServidor").dialog("option", "title");
		$("#pop_viewServidor").dialog("option", "title", "Detalhes do Servidor" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verServidor/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewServidor").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_viewServidor").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.verUsuario = function(){
	alert('oi');
	return this.each(function(){
		$("#pop_usuario").dialog("open");
		
		var title = $("#pop_usuario").dialog("option", "title");
		$("#pop_usuario").dialog("option", "title", "Detalhes do Usuário" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verUsuario/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_usuario").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_usuario").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};


jQuery.fn.verAutor = function(){
	return this.each(function(){
		$("#pop_autor").dialog("open");
		
		var title = $("#pop_autor").dialog("option", "title");
		$("#pop_autor").dialog("option", "title", "Detalhes do Autor" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verAutor/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_autor").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_autor").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.verDisciplina = function(){
	return this.each(function(){
            getURL('configuracoes/pop_verDisciplina/'+$(this).data('id'));
            return;
		$("#pop_disciplina").dialog("open");
		
		var title = $("#pop_disciplina").dialog("option", "title");
		$("#pop_disciplina").dialog("option", "title", "Detalhes da Disciplina" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verDisciplina/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_disciplina").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_disciplina").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};
jQuery.fn.topicoDetalhe = function(){
	return this.each(function(){
		$("#pop_addTopico").dialog("open");
		
		var title = $("#pop_addTopico").dialog("option", "title");
		$("#pop_addTopico").dialog("option", "title", "Detalhes do Tópico" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verTopico/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addTopico").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addTopico").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.verEditora = function(){
	return this.each(function(){
		$("#pop_editora").dialog("open");
		
		var title = $("#pop_editora").dialog("option", "title");
		$("#pop_editora").dialog("option", "title", "Detalhes da Editora" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_verEditora/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_editora").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_editora").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.usuarioAdd = function(){
	return this.each(function(){
		$("#pop_addUsuario").dialog("open");
		
		var title = $("#pop_addUsuario").dialog("option", "title");
		$("#pop_addUsuario").dialog("option", "title", "Novo Usuário" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_addUsuario',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addUsuario").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addUsuario").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};


jQuery.fn.editoraAdd = function(){
	return this.each(function(){
		$("#pop_addEditora").dialog("open");
		
		var title = $("#pop_addEditora").dialog("option", "title");
		$("#pop_addEditora").dialog("option", "title", "Nova Editora" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_addEditora',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addEditora").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addEditora").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.autorAdd = function(){
	return this.each(function(){
		$("#pop_addAutor").dialog("open");
		
		var title = $("#pop_addAutor").dialog("option", "title");
		$("#pop_addAutor").dialog("option", "title", "Novo Autor" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_addAutor',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addAutor").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addAutor").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.disciplinaAdd = function(){
	return this.each(function(){
		$("#pop_addDisciplina").dialog("open");
		
		var title = $("#pop_addDisciplina").dialog("option", "title");
		$("#pop_addDisciplina").dialog("option", "title", "Nova Disciplina" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/configuracoes/pop_addDisciplina',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addAutor").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addDisciplina").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Alterar dados de cadastro)
jQuery.fn.alterCadastro = function(){
	return this.each(function(){
		$("#pop_alterCadastro").dialog("open");
		
		var title = $("#pop_alterCadastro").dialog("option", "title");
		$("#pop_alterCadastro").dialog("option", "title", "Alterar dados de cadastro" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verAlterarCadastro/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_alterCadastro").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_alterCadastro").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};
// Chamando o PopUp (Detalhes do Domínio)
jQuery.fn.detalheDominio = function(){
	return this.each(function(){
		$("#pop_detalheDominio").dialog("open");
		
		var title = $("#pop_detalheDominio").dialog("option", "title");
		$("#pop_detalheDominio").dialog("option", "title", "Detalhes do Domínio" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/detalheDominio/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_detalheDominio").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_detalheDominio").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Alterar Senhar)
jQuery.fn.alterarSenha = function(){
	return this.each(function(){
		$("#pop_alterarSenha").dialog("open");
		
		var title = $("#pop_alterarSenha").dialog("option", "title");
		$("#pop_alterarSenha").dialog("option", "title", "Alterar Senha");	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/alterarSenha/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_alterarSenha").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_alterarSenha").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Detalhes de Gateway)
jQuery.fn.gatewayDetalhe = function(){
	return this.each(function(){
		$("#pop_viewGateway").dialog("open");
		
		var title = $("#pop_viewGateway").dialog("option", "title");
		$("#pop_viewGateway").dialog("option", "title", "Configurar Gateway" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verGateway/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewGateway").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_viewGateway").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.gatewayBoleto = function(){
	return this.each(function(){
		$("#pop_viewBoleto").dialog("open");
		
		var title = $("#pop_viewBoleto").dialog("option", "title");
		$("#pop_viewBoleto").dialog("option", "title", "Configurar Boleto" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verGateway/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewBoleto").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_viewBoleto").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.registranteDetalhe = function(){
	return this.each(function(){
		$("#pop_viewRegistrante").dialog("open");
		
		var title = $("#pop_viewRegistrante").dialog("option", "title");
		$("#pop_viewRegistrante").dialog("option", "title", "Detalhes do Registrante" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verRegistrante/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewRegistrante").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_viewRegistrante").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};




jQuery.fn.dominioAdd = function(){
	return this.each(function(){
		$("#pop_addDominio").dialog("open");
		
		var title = $("#pop_addDominio").dialog("option", "title");
		$("#pop_addDominio").dialog("option", "title", "Novo Domínio" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/addDominio/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addDominio").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addDominio").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.servidorAdd = function(){
	return this.each(function(){
		$("#pop_addServidor").dialog("open");
		
		var title = $("#pop_addServidor").dialog("option", "title");
		$("#pop_addServidor").dialog("option", "title", "Novo Servidor" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/addServidor/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addServidor").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addServidor").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.ver_addDepartamento = function(){ /* Ver - Adicionar departamento */
	$("#pop_addDepartamento").dialog("open");
	
	var title = $("#pop_addDepartamento").dialog("option", "title");
	$("#pop_addDepartamento").dialog("option", "title", "Novo Departamento de Suporte" );	
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>/admin/suporte/pop_suporteDepartamento/',
		dataType: 'html',
		beforeSend: function(){
			$("#pop_addDepartamento").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
		},

		success: function(data){
			$("#pop_addDepartamento").html(data);
		}
	});
	
	return false;
};
jQuery.fn.exibeSuporteDepartamento = function(){ /* Exibe detalhes da do departamento */
	return this.each(function(){
		$("#pop_suporteDepartamento").dialog("open");
		
		var title = $("#pop_suporteDepartamento").dialog("option", "title");
		$("#pop_suporteDepartamento").dialog("option", "title", "Detalhes do Departamento" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/suporte/ver_suporteDepartamento/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_suporteDepartamento").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_suporteDepartamento").html(data);
			}
	  	});

		return false;
	});
};

jQuery.fn.ver_baseConhecimento = function(){ /* Exibe detalhes da do departamento */
	return this.each(function(){
		$("#pop_suporteDepartamento").dialog("open");
		
		var title = $("#pop_suporteDepartamento").dialog("option", "title");
		$("#pop_suporteDepartamento").dialog("option", "title", "Detalhes do Departamento" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/suporte/ver_baseConhecimento/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_verBase").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addBase").html(data);
			}
	  	});

		return false;
	});
};

jQuery.fn.exibeSuporteCategoria = function(){ /* Exibe detalhes da categoria */
	return this.each(function(){
		$("#pop_suporteCategoria").dialog("open");
		
		var title = $("#pop_suporteCategoria").dialog("option", "title");
		$("#pop_suporteCategoria").dialog("option", "title", "Detalhes do Departamento" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/suporte/ver_suporteCategoria/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_suporteCategoria").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_suporteCategoria").html(data);
			}
	  	});

		return false;
	});
};

jQuery.fn.ver_addCategoriaSuporte = function(){ /* Adicion categoria */
	$("#pop_addCategoria").dialog("open");
	
	var title = $("#pop_addCategoria").dialog("option", "title");
	$("#pop_addCategoria").dialog("option", "title", "Nova Categoria de Suporte" );	
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>/admin/suporte/pop_suporteCategoria/',
		dataType: 'html',
		beforeSend: function(){
			$("#pop_addCategoria").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
		},

		success: function(data){
			$("#pop_addCategoria").html(data);
		}
	});
	
	return false;
};
jQuery.fn.exibeGrupoUsuario = function(){ 
	return this.each(function(){
		$("#pop_grupoUsuario").dialog("open");
		
		var title = $("#pop_grupoUsuario").dialog("option", "title");
		$("#pop_grupoUsuario").dialog("option", "title", "Detalhes do Grupo de Usuário" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/suporte/ver_grupoUsuario/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_grupoUsuario").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_grupoUsuario").html(data);
			}
	  	});

		return false;
	});
};
jQuery.fn.ver_addGrupoUsuario = function(){ /* Adicion categoria */
	$("#pop_addgrupoUser").dialog("open");
	
	var title = $("#pop_addgrupoUser").dialog("option", "title");
	$("#pop_addgrupoUser").dialog("option", "title", "Novo Grupo de Usuário" );	
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>/admin/suporte/pop_novoGrupoUsuario/',
		dataType: 'html',
		beforeSend: function(){
			$("#pop_addgrupoUser").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
		},

		success: function(data){
			$("#pop_addgrupoUser").html(data);
		}
	});
	
	return false;
};
/*
	## Submit's -----------
*/


jQuery.fn.submitAdd_suporteCategoria = function(){
	
	$('#form_suporteCategoria').ajaxForm({
	
		url: '<?=site_url()?>/admin/suporte/submitAdd_suporteCategoria',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_categorias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_categorias');
			}
		}		
	}).submit();
    return false;
};
jQuery.fn.submitAdd_grupoUsuario = function(){
	
	$('#form_addGrupoUsuarios').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_grupoUsuarios',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
	
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/usuarios_grupos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/usuarios_grupos');
			}

			

		}		
	}).submit();
    return false;
};
jQuery.fn.submitDel_GrupoUsuario = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/suporte/submitDel_GrupoUsuario',
		data:$('#form_selectCategorias').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();		
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/usuarios_grupos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/usuarios_grupos');
			}
    	}
	});

    return false;
};
jQuery.fn.submitDel_CategoriaSuporte = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/suporte/submitDel_CategoriaSuporte',
		data:$('#form_selectCategorias').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();		
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_categorias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_categorias');
			}
    	}
	});

    return false;
};
jQuery.fn.submitEdit_grupoUsuario = function(){
	
	$('#form_grupoUsuarios').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_grupoUsuario',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {

			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/usuarios_grupos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/usuarios_grupos');
			}
		}		
	}).submit();
    return false;
};
jQuery.fn.submitEdit_suporteDepartamentos = function(){
	
	$('#edit_suporteDepartamentos').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_suporteDepartamentos',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_departamentos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_departamentos');
			}

			

		}		
	}).submit();
    return false;
};

jQuery.fn.submitEdit_suporteCategoria = function(){
	
	$('#form_suporteCategoria').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_suporteCategoria/',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_categorias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_categorias');
			}
		}		
	}).submit();
    return false;
};
jQuery.fn.submitAdd_suporteDepartamentos = function(){
	
	$('#add_suporteDepartamentos').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_suporteDepartamentos',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_departamentos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_departamentos');
			}

			

		}		
	}).submit();
    return false;
};

jQuery.fn.submitDel_departamentoSuporte = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/suporte/submitDel_departamentoSuporte/',
		data:$('#form_selectDepartamentos').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();		
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/suporte_departamentos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/suporte_departamentos');
			}
    	}
	});

    return false;
};

jQuery.fn.submitTrocaLogo = function(){
	
	$('#enviaLogo').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/enviaTema',
		resetForm: true,
		/*dataType: 'json',*/
		uploadProgress: function(event, position, total, percentComplete){
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
		},  
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/geral');
			}else{
				$.messager.alert('Aviso', 'Ocorreu um erro, por favor tente novamente!', 'error');
				getURL('configuracoes/geral');
			}
			
		}		
	}).submit();
    return false;
};



jQuery.fn.submitAdd_dominio = function(){
	
	$('#form_addDominio').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_dominio',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/precos_dominios');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/precos_dominios');
			}

			

		}		
	}).submit();
    return false;
};

jQuery.fn.submitEdit_dominio = function(){
	
	$('#form_editDominio').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_dominio',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/precos_dominios');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/precos_dominios');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitEdit_usuario = function(){
	
	$('#form_editUsuarios').ajaxForm({
	
		url: '<?=site_url()?>/admin/configuracoes/submit_editUsuarios',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/usuarios');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/usuarios');
			}

		}		
	}).submit();
    return false;
};
jQuery.fn.submitEdit_autor = function(){
	
	$('#form_editAutor').ajaxForm({
	
		url: '<?=site_url()?>/admin/configuracoes/submit_editAutor',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/autores');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURl('configuracoes/autores');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitEdit_livro = function(){
	$(".msg").html(" ");
	$(".msg").addClass("alert-error");

	if($('[name="DESCRICAO"]').val() == ""){
		$(".msg").append('O campo Descrição deve ser preenchidos');
		$('[name="DESCRICAO"]').focus();

	}else if($('[name="EDICAO"]').val() == ""){
		$(".msg").append('O campo Edição deve ser preenchido');
		$('[name="EDICAO"]').focus();
	
	}else if($('[name="ANO"]').val() == ""){
		$(".msg").append('O campo Ano deve ser preenchido');
		$('[name="ANO"]').focus();
	}
	else if($('[name="COD_EDITORA"]').val() == ""){
		$(".msg").append('Obrigatório escolher uma Editora');
		$('[name="COD_EDITORA"]').focus();
	}
	else if ($('[name="AUTOR[]"]').children('option:selected').length==0) {
		$(".msg").append('Obrigatório escolher ao menos 1 Autor');
		$('[name="AUTOR[]"]').focus();
	}
	else{
	$('#form_editLivro').ajaxForm({
	
		url: '<?=site_url()?>/admin/configuracoes/submit_editLivro',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				$("#pop_viewLivro").dialog("close");
				getURL('configuracoes/bibliografias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/bibliografias');
			}

		}		
	}).submit();
    return false;
}
};


jQuery.fn.submitEdit_editora = function(){
	
	$('#form_editAutor').ajaxForm({
	
		url: '<?=site_url()?>/admin/configuracoes/submit_editEditora',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/editoras');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/editoras');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitAdd_usuario = function(){
	
	var sEmail	= $('[name="USUARIO"]').val();
		// filtros
		var emailFilter=/^.+@.+\..{2,}$/;
		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
	
	if($('[name="NOME"]').val() == ""){
		alert('O campo NOME deve ser preenchido');
		$('[name="NOME"]').focus();
	}
	else if($('[name="USUARIO"]').val() == ""){
		alert('O campo EMAIL deve ser preenchido');
		$('[name="USUARIO"]').focus();
	}
	else if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
		alert('Por favor, informe um EMAIL válido.');
		$('[name="USUARIO"]').focus();
	}
	else if($('[name="SENHA"]').val() == ""){
		alert('O campo SENHA deve ser preenchido');
		$('[name="SENHA"]').focus();
	}
	else{
		$('#form_addUsuarios').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_addUsuarios',
			resetForm: true,
			/*dataType: 'json',*/
			beforeSend: function() {
				$("#pop_addUsuario").dialog("close");
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					getURL('configuracoes/usuarios');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/usuarios');
				}
	
			}		
		}).submit();
	}
};

jQuery.fn.submitAdd_autor = function(){
	if($('[name="DESCRICAO"]').val() == ""){
		alert('O campo NOME deve ser preenchido');
		$('[name="DESCRICAO"]').focus();
	}else{
		$('#form_addAutor').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_addAutor',
			resetForm: true,

			beforeSend: function() {
				$("#pop_addAutor").dialog("close");
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					getURL('configuracoes/autores');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/autores');
				}
	
			}		
		}).submit();
	}
};

jQuery.fn.submitAdd_editora = function(){
	if($('[name="DESCRICAO"]').val() == ""){
		alert('O campo NOME deve ser preenchido');
		$('[name="DESCRICAO"]').focus();
	}else{
		$('#form_addEditoras').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_addEditora',
			resetForm: true,

			beforeSend: function() {
				$("#pop_addEditora").dialog("close");
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					getURL('configuracoes/editoras');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/editoras');
				}
	
			}		
		}).submit();
	}
};

jQuery.fn.submitAdd_livro = function(){
	$(".msg").html(" ");
	$(".msg").addClass("alert-error");
	if($('[name="DESCRICAO"]').val() == ""){
		$(".msg").append('O campo Descrição deve ser preenchido');
		$('[name="DESCRICAO"]').focus();

	}else if($('[name="EDICAO"]').val() == ""){
		$(".msg").append('O campo Edição deve ser preenchido');
		$('[name="EDICAO"]').focus();
	
	}else if($('[name="ANO"]').val() == ""){
		$(".msg").append('O campo Ano deve ser preenchido');
		$('[name="ANO"]').focus();
	}
	else if($('[name="COD_EDITORA"]').val() == ""){
		$(".msg").append('Obrigatório escolher uma Editora');
		$('[name="COD_EDITORA"]').focus();
	}
	else if ($('[name="AUTOR[]"]').children('option:selected').length==0) {
		$(".msg").append('Obrigatório escolher ao menos 1 Autor');
		$('[name="AUTOR[]"]').focus();
	}
	else{
		$('#form_addLivro').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_addLivro',
			resetForm: true,

			beforeSend: function() {
				$("#pop_addLivro").dialog("close");
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					getURL('configuracoes/bibliografias');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/bibliografias');
				}
	
			}		
		}).submit();
	}
};
jQuery.fn.submitAdd_disciplina = function(){
	
	$(".msg").html(" ");
	$(".msg").addClass("alert-error");
	if($('[name="DESCRICAO"]').val() == ""){
            
		$(".msg").append('O campo Descrição deve ser preenchido');
		$('[name="DESCRICAO"]').focus();

	}else if ($('[name="BIBLIOGRAFIAS[]"]').children('option:selected').length==0) {
		$(".msg").append('Obrigatório escolher ao menos 1 Bibliografia');
		$('[name="BIBLIOGRAFIAS[]"]').focus();
	}else if($(".txtTopicos").length ==false ||  $('[name="TOPICOS[]"]').val() == ""){
		$(".msg").append('Obrigatório incluir ao menos 1 tópico');
		$('[name="TOPICOS[]"]').focus();
	
	}
	
	else{
		$('#form_addLivro').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_addDisciplina',
			resetForm: false,
			

			beforeSend: function() {
				$("#pop_addLivro").dialog("close");

				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				
				
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					$("#pop_addDisciplina").dialog("close");
					getURL('configuracoes/disciplinas');
				}else{
					$.messager.alert('Aviso', response, 'error');

					getURL('configuracoes/disciplinas');
				}
	
			}		
		}).submit();
		$('#form_addLivro .textfield-text').clearFields();
	}
};

jQuery.fn.submitEdit_disciplina = function(){
	$(".msg").html(" ");
	$(".msg").addClass("alert-error");
	if($('[name="DESCRICAO"]').val() === ""){
            
		$(".msg").append('O campo Descrição deve ser preenchido');
		$('[name="DESCRICAO"]').focus();

	}else if ($('[name="BIBLIOGRAFIAS[]"]').children('option:selected').length==0) {
		$(".msg").append('Obrigatório escolher ao menos 1 Bibliografia');
		$('[name="BIBLIOGRAFIAS[]"]').focus();
	/*}else if($(".txtTopicos").length ==true &&  $('[name="TOPICOS[]"]').val() == ""){
		$(".msg").append('Obrigatório incluir ao menos 1 tópico');
		$('[name="TOPICOS[]"]').focus();*/
	
	}
	
	else{
		$('#form_editLivro').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_editDisciplina',
			resetForm: false,
			

			beforeSend: function() {
				$("#pop_disciplina").dialog("close");

				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				
				
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					$("#pop_disciplina").dialog("close");
                                        getURL('configuracoes/disciplinas');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/disciplinas');
				}
	
			}		
		}).submit();
		$('#form_editLivro .textfield-text').clearFields();
	}
};
jQuery.fn.submitEdit_topico = function(){


	$(".msg").html(" ");
	$(".msg").addClass("alert-error");
	if($('[name="DESCRICAO"]').val() === ""){
            
		$(".msg").append('O campo Descrição deve ser preenchido');
		$('[name="DESCRICAO"]').focus();

	/*}else if ($('[name="BIBLIOGRAFIAS[]"]').children('option:selected').length==0) {
		$(".msg").append('Obrigatório escolher ao menos 1 Bibliografia');
		$('[name="BIBLIOGRAFIAS[]"]').focus();
	}else if($(".txtTopicos").length ==true &&  $('[name="TOPICOS[]"]').val() == ""){
		$(".msg").append('Obrigatório incluir ao menos 1 tópico');
		$('[name="TOPICOS[]"]').focus();*/
	
	}else{
		$('#form_editTopico').ajaxForm({
		
			url: '<?=site_url()?>/admin/configuracoes/submit_editTopico',
			resetForm: false,
			

			beforeSend: function() {
				$("#pop_addTopico").dialog("close");

				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},
			   
			success: function(response) {
				
				
				$.unblockUI();
				
				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					$("#pop_addTopico").dialog("close");
					getURL('configuracoes/topicos');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('configuracoes/topicos');
				}
	
			}		
		}).submit();
		$('#form_editLivro .textfield-text').clearFields();
	}
};

jQuery.fn.submitGateway = function(){
	var gateway = $('[name="GATEWAY"]').val();

	$('#form_editGateway').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_'+gateway,
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();

			if(response == "foi"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/gateways_pagamento');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/gateways_pagamento');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitBoleto = function(){
	
	$('#form_gatewayBoleto').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_boleto',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();

			if(response == "foi"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/gateways_pagamento');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/gateways_pagamento');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitRegistrante = function(){
	var registrante = $('[name="REGISTRANTE"]').val();

	$('#form_editRegistrante').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitRegistrante_'+registrante,
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "foi"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/registrantes_dominios');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/registrantes_dominios');
			}
		

		}		
	}).submit();
    return false;
};

jQuery.fn.deletarGateway = function(gateway){
	$.messager.confirm('Atenção','Tem certeza que deseja <b>desativar</b> este Gateway de Pagamento?',function(r){  
		if (r){
			
			$.ajax({
				type: 'GET',
				url: '<?=site_url()?>/admin/json/submitDel_gateway/?dados='+gateway,
				dataType: 'html',
				beforeSend: function(){
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
	
				success: function(response){
					$.unblockUI();

					if(response == "foi"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/gateways_pagamento');
					}else{
						$.messager.alert('Aviso', data, 'error');
						getURL('configuracoes/gateways_pagamento');
					}
				}
			}); // fim do ajax
		}
	});
};

jQuery.fn.deletarBoleto = function(gateway){
	$.messager.confirm('Atenção','Tem certeza que deseja <b>desativar</b> as configurações de boleto?',function(r){  
		if (r){
			
			$.ajax({
				type: 'GET',
				url: '<?=site_url()?>/admin/json/submitDel_gateway/?dados='+gateway,
				dataType: 'html',
				beforeSend: function(){
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
	
				success: function(response){
					$.unblockUI();

					if(response == "foi"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/gateways_pagamento');
					}else{
						$.messager.alert('Aviso', data, 'error');
						getURL('configuracoes/gateways_pagamento');
					}
				}
			}); // fim do ajax
		}
	});
};

jQuery.fn.deletarRegistrante = function(registrante){
	$.messager.confirm('Atenção','Tem certeza que deseja <b>desativar</b> este Registrante?',function(r){  
		if (r){
			
			$.ajax({
				type: 'GET',
				url: '<?=site_url()?>/admin/json/submitDel_registrante/?dados='+registrante,
				dataType: 'html',
				beforeSend: function(){
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
	
				success: function(response){
					$.unblockUI();

					if(response == "foi"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/registrantes_dominios');
					}else{
						$.messager.alert('Aviso', data, 'error');
						getURL('configuracoes/registrantes_dominios');
					}
				}
			}); // fim do ajax
		}
	});
};


jQuery.fn.submitAdd_servidor = function(){
	
	$('#form_addServidor').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_servidor',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/bibliografias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/bibliografias');
			}
		}		
	}).submit();
    return false;
};

jQuery.fn.editarServidor = function(){
	$('#form_EditServidor').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_servidor/',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProduto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
		},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/bibliografias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/bibliografias');
			}

		}		
	}).submit();
	return false;
};

jQuery.fn.deletarServidor = function(){
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> este servidor?',function(r){  
		if (r){
			$('#form_EditServidor').ajaxForm({
	
				url: '<?=site_url()?>/admin/json/submitDel_servidor/',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/bibliografias');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/bibliografias');
					}
				}		
			}).submit();
		}
	});
	return false;
};



jQuery.fn.deleteDominios = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> os itens selecionados?',function(r){  
		if (r){		
			$('.form_selectDominios').ajaxForm({
			
				url: '<?=site_url()?>/admin/json/submitDel_dominio',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/precos_dominios');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/precos_dominios');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

jQuery.fn.deleteDepartamentos = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> os itens selecionados?',function(r){  
		if (r){		
			$('.form_selectDepartamentos').ajaxForm({
			
				url: '<?=site_url()?>/admin/json/submitDel_suporteDepartamentos',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/suporte_departamentos');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/suporte_departamentos');
					}
				}		
			}).submit();
		}  
	});
    return false;
};
jQuery.fn.deleteAutores = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> o(s) Autore(s) selecionado(s)?',function(r){  
		if (r){		
			$('.form_selectAutores').ajaxForm({
			
				url: '<?=site_url()?>/admin/configuracoes/submit_delAutores',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/autores');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/autores');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

jQuery.fn.deleteEditoras = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> a(s) Editora(s) selecionada(s)?',function(r){  
		if (r){		
			$('.form_selectEditoras').ajaxForm({
			
				url: '<?=site_url()?>/admin/configuracoes/submit_delEditoras',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/Editoras');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/Editoras');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

jQuery.fn.deleteLivros = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> a(s) bibliografias(s) selecionada(s)?',function(r){  
		if (r){		
			$('.form_selecLivros').ajaxForm({
			
				url: '<?=site_url()?>/admin/configuracoes/submit_delLivros',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {

					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/bibliografias');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/bibliografias');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

jQuery.fn.deleteUsuarios = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> os usuários selecionados?',function(r){  
		if (r){		
			$('.form_selectUsuarios').ajaxForm({
			
				url: '<?=site_url()?>/admin/configuracoes/submit_delUsuarios',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getURL('configuracoes/usuarios');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getURL('configuracoes/usuarios');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

function validator(formulario){
	return $(formulario).validate();
}

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
				
				var largura = $('#img_prev').width();
				var altura = $('#img_prev').height();
				
				$('#img_prev').attr('src', e.target.result);								
				$("#data_prev").html("<b>Tamanho:</b> "+largura+"x"+altura+" px");			
		};

		reader.readAsDataURL(input.files[0]);
	}
}

function somenteNumeros(e) {
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
}


$.extend($.fn.datebox.defaults,{
	formatter:function(date){
		var y = date.getFullYear();
		var m = date.getMonth()+1;
		var d = date.getDate();
		return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
	},
	parser:function(s){
		if (!s) return new Date();
		var ss = s.split('/');
		var d = parseInt(ss[0],10);
		var m = parseInt(ss[1],10);
		var y = parseInt(ss[2],10);
		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
			return new Date(y,m-1,d);
		} else {
			return new Date();
		}
	}
});

$.extend( $.fn.dataTableExt.oStdClasses, {
	"sSortAsc": "header headerSortDown",
	"sSortDesc": "header headerSortUp",
	"sSortable": "header"
});

$.fn.dataTableExt.oApi.fnFilterAll = function(oSettings, sInput, iColumn, bRegex, bSmart) {
    var settings = $.fn.dataTableSettings;
     
    for ( var i=0 ; i<settings.length ; i++ ) {
      settings[i].oInstance.fnFilter( sInput, iColumn, bRegex, bSmart);
    }
};

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				var elm = $(an[i]).find('.next');
				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore(elm)
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

jQuery.fn.dataTableExt.oApi.fnFilterOnReturn = function (oSettings) {
    var _that = this;
  
    this.each(function (i) {
        $.fn.dataTableExt.iApiIndex = i;
        var $this = this;
        var anControl = $('.input_busca', _that.fnSettings().aanFeatures.f);
        anControl.unbind('keyup').bind('keypress', function (e) {
            if (e.which == 13) {
                $.fn.dataTableExt.iApiIndex = i;
                _that.fnFilter(anControl.val());
            }
        });
        return this;
    });
    return this;
};

function validator(formulario){
	return $(formulario).validate();
}

</script>
<?=$this->load->view('json/configClicks')?>
<?=$this->load->view('json/configDialogs')?>