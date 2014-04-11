<script type="text/javascript">
// Configuração de PopUp's
$("#pop_trocaLogo").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 600,
	height: 352,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitTrocaLogo();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_viewLivro").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 650,
		height: 552,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit_livro();
					//$(this).dialog("close");
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				click: function() {
					$(this).dialog("close");
				}
			}
		],
		modal: true
	});	
	

$("#pop_addgrupoUser").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 530,
	height: 470,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_grupoUsuario();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});


$("#pop_suporteCategoria").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 280,
	height: 230,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_suporteCategoria();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});
$("#pop_grupoUsuario").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 530,
	height: 470,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_grupoUsuario();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_suporteDepartamento").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 352,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_suporteDepartamentos();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_usuario").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 372,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_usuario();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});
$("#pop_autor").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_autor();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_editora").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_editora();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addUsuario").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 392,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success btn_addUsuario',
			click: function() {
				$(this).submitAdd_usuario();
				
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addEditora").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 350,
	height: 172,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success btn_addUsuario',
			click: function() {
				$(this).submitAdd_editora();
				
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addAutor").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 350,
	height: 172,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success btn_addAutor',
			click: function() {
				$(this).submitAdd_autor();
				
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addLivro").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 620,
		height: 552,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitAdd_livro();
					
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				click: function() {
					$(this).dialog("close");
				}
			}
		],
		modal: true
	});

$("#pop_addDisciplina").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 'auto',
		height: 560,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitAdd_disciplina();
					
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				click: function() {
					$(this).dialog("close");
				}
			}
		],
		modal: true
	});

$("#pop_disciplina").dialog({
		autoOpen: false,		
		resizable: false,
		width: 'auto',
		height: 560,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit_disciplina();
					
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				click: function() {
					$(this).dialog("close");
				}
			}
		],
		modal: true
	});



$("#pop_addTopico").dialog({
		autoOpen: false,		
		resizable: false,
		width: 'auto',
		height: 460,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit_topico();
					
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				click: function() {
					$(this).dialog("close");
				}
			}
		],
		modal: true
	});


$("#pop_addDepartamento").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 352,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_suporteDepartamentos();
				$(this).dialog("close");
			}
		},
		{ 
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addCategoria").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 280,
	height: 230,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_suporteCategoria();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});


$("#pop_addServidor").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 600,
	height: 552,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_servidor();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_detalheDominio").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 352,
	buttons: [
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		},
		{
			text: "Salvar",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_dominio();
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_addDominio").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 500,
	height: 352,
	buttons: [
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		},
		{
			text: "Salvar",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_dominio();
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_viewRegistrante").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 400,
	height: 352,
	buttons: [
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		},
		{
			text: "Salvar",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitRegistrante();
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_alterarSenha").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 400,
	height: 300,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_produto();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_viewServidor").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 600,
	height: 552,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).editarServidor();
				$(this).dialog("close");
			}
		},
		{
			text: "Excluir",
			"class": 'btn btn-danger',
			click: function() {
				$(this).deletarServidor();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function() {
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_alterCadastro").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 700,
	height: 552,
	buttons: [
		{
			text: "Fechar",
			"class": 'btn btn-danger',
			click: function() {
				$(this).dialog("close");
			}
		},
		{
			text: "Alterar",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitTrocaLogo();
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_viewGateway").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 400,
	height: 360,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function(){
				$(this).submitGateway();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function(){
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#pop_viewBoleto").dialog({
	autoOpen: false,
	resizable: false,
	width: 450,
	height: 460,
	buttons: [
		{
			text: "Salvar alterações",
			"class": 'btn btn-success',
			click: function(){
				$(this).submitBoleto();
				$(this).dialog("close");
			}
		},
		{
			text: "Fechar",
			"class": 'btn',
			click: function(){
				$(this).dialog("close");
			}
		}
	],
	modal: true
});

$("#view_loading").dialog({
	autoOpen: false,
	resizable: false,
	width: 260,
	height: 90,
	modal: true
});
	
</script>