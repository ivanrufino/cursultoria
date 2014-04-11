<script type="text/javascript">
/*
#############################################################################################################
##
## Abrindo os Pop'ups
##
#############################################################################################################
*/

$(function(){
	/*Projetos*/
	$("a[rel='excluirSelecionados']").click(function(){
		$(this).formSelecionados();
	});
	
	$("a[rel='projetoDetalhe']").click(function(){
		$(this).projetoDetalhe();
	});
	
	$("a[rel='projetoAdd']").click(function(){
		$(this).projetoAdd();
	});
        /*Categoria*/
       
	$("a[rel='deleteCategorias']").click(function(){
		$(this).deleteCategorias();
	});
        $("a[rel='ativarCategorias']").click(function(){
		$(this).ativarCategorias();
	});
	$("a[rel='verCategoria']").click(function(){
		$(this).verCategoria();
	});
	
	$("a[rel='categoriaAdd']").click(function(){
		$(this).categoriaAdd();
	});
        
        $("a[rel='categoriaDisciplinaAdd']").click(function(){
		$(this).categoriaDisciplinaAdd();
	});
        $("a[rel='verCategoriaDisciplina']").click(function(){
		$(this).verCategoriaDisciplina();
	});
        $("a[rel='vincularDisciplinas']").click(function(){
                $(this).vincularDisciplina();	
                //$(this).verCategoriaDisciplina();
	});
});

// Chamando o PopUp (Detalhes de Produto)
jQuery.fn.projetoDetalhe = function(){
    
	return this.each(function(){
		$("#pop_projeto").dialog("open");
		
		var title = $("#pop_projeto").dialog("option", "title");
		$("#pop_projeto").dialog("option", "title", "Detalhes do Plano" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/verProjeto/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_projeto").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_projeto").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Adicionar Projeto)
jQuery.fn.projetoAdd = function(){
	return this.each(function(){
		$("#pop_addProjeto").dialog("open");
		
		var title = $("#pop_addProjeto").dialog("option", "title");
		$("#pop_addProjeto").dialog("option", "title", "Novo Plano" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/addProjeto/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addProjeto").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addProjeto").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};
// Chamando o PopUp (Detalhes de Produto)
jQuery.fn.verCategoria = function(){
	return this.each(function(){
		$("#pop_categoria").dialog("open");
		
		var title = $("#pop_categoria").dialog("option", "title");
		$("#pop_categoria").dialog("option", "title", "Detalhes da Categoria" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/pop_verCategoria/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_categoria").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_categoria").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.verCategoriaDisciplina = function(){
	return this.each(function(){
		$("#pop_categoriaDisciplina").dialog("open");
		
		var title = $("#pop_categoriaDisciplina").dialog("option", "title");
		$("#pop_categoriaDisciplina").dialog("option", "title", "Detalhes da Categoria de Disciplinas " );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/pop_verCategoriaDisciplina/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_categoriaDisciplina").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_categoriaDisciplina").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

// Chamando o PopUp (Adicionar Categoria)
jQuery.fn.categoriaAdd = function(){
	return this.each(function(){
		$("#pop_addCategoria").dialog("open");
		
		var title = $("#pop_addCategoria").dialog("option", "title");
		$("#pop_addCategoria").dialog("option", "title", "Nova Categoria" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/pop_addCategoria/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addProjeto").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addCategoria").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.vincularDisciplina = function(data){

var id=data;
if (data==undefined){
    id=$(this).data('id');
}


	return this.each(function(){
		$("#pop_vincularDisciplina").dialog("open");
		
		var title = $("#pop_vincularDisciplina").dialog("option", "title");
		$("#pop_vincularDisciplina").dialog("option", "title", "Vincular Disciplinas" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/pop_vincularDisciplina/'+id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_vincularDisciplina").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_vincularDisciplina").html(data);
			}
	  	});	
		
		return false;
	});
};
jQuery.fn.categoriaDisciplinaAdd = function(){
	return this.each(function(){
		$("#pop_addCategoriaDisciplina").dialog("open");
		
		var title = $("#pop_addCategoriaDisciplina").dialog("option", "title");
		$("#pop_addCategoriaDisciplina").dialog("option", "title", "Nova Categoria de Disciplina" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/pop_addCategoriaDisciplina/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addCategoriaDisciplina").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addCategoriaDisciplina").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};
/*
#############################################################################################################
##
## Submit's
##
#############################################################################################################
*/

jQuery.fn.submitAdd_produto = function(){
	
	$('#addProjeto_geral').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_produto',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProjeto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getSUB('configuracoes/produtos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getSUB('configuracoes/produtos');
			}

			

		}		
	}).submit();
    return false;
};
jQuery.fn.submitAdd_Categoria = function(){
	if($('[name="DESCRICAO"]').val() == ""){
		alert('O campo CATEGORIA deve ser preenchido');
		$('[name="DESCRICAO"]').focus();
	}else{
	$('#form_addCategoria').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_categoria',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProjeto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getSUB('configuracoes/categorias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getSUB('configuracoes/categorias');
			}

			

		}		
	}).submit();
    return false;
}
};
jQuery.fn.submitAdd_CategoriaDisciplina = function(){
    if($('[name="DESCRICAO"]').val() == ""){
        alert('O campo CATEGORIA deve ser preenchido');
        $('[name="DESCRICAO"]').focus();
    }else{
        $('#form_addCategoria').ajaxForm({
            url: '<?= site_url() ?>/admin/json/submitAdd_categoriaDisciplina',
            resetForm: true,
            /*dataType: 'json',*/
            /*beforeSubmit:  validator("#addProjeto_geral"),*/
            beforeSend: function() {
                $.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?= site_url() ?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
            },
    
            success: function(response) {
                $.unblockUI();

                if(response == "ok"){
                    $.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
                    $("#pop_addCategoriaDisciplina").dialog("close")
                    getURL('configuracoes/categoria_disciplina');
                }else{
                    $.messager.alert('Aviso', response, 'error');
                    getSUB('configuracoes/categoria_disciplina');
                }
            }		
        }).submit();
    return false;
    }
};
jQuery.fn.submitAdd_VincularDisciplina = function(){


    if($('[name="quantidade"]').val() == "0"){
        $.messager.alert('Aviso', 'Obrigatório selecionar no mínimo uma disciplina!', 'info');
        $('[name="DISCIPLINAS"]').focus();
    }else{
        $('#form_addLivro').ajaxForm({
            url: '<?= site_url() ?>/admin/json/submitAdd_VincularDisciplina',
            resetForm: false,
            /*dataType: 'json',*/
            /*beforeSubmit:  validator("#addProjeto_geral"),*/
            beforeSend: function() {
                $.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?= site_url() ?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
            },
    
            success: function(response) {
                $.unblockUI();

                if(response == "ok"){
                    $.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
                    $("#pop_vincularDisciplina").dialog("close")
                    getURL('configuracoes/projetos');
                }else{
                    $.messager.alert('Aviso', response, 'error');
                    getSUB('configuracoes/projetos');
                }
            }		
        }).submit();
    return false;
    }
};
jQuery.fn.submitEdit_Categoria = function(){
	if($('[name="DESCRICAO"]').val() == ""){
		alert('O campo CATEGORIA deve ser preenchido');
		$('[name="DESCRICAO"]').focus();
	}else{
	$('#form_editCategoria').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_categoria/',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProjeto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getSUB('configuracoes/categorias');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getSUB('configuracoes/categorias');
			}

			

		}		
	}).submit();
    return false;
}
};
jQuery.fn.submitEdit_CategoriaDisciplina = function(){
	if($('[name="DESCRICAO"]').val() == ""){
		alert('O campo CATEGORIA deve ser preenchido');
		$('[name="DESCRICAO"]').focus();
	}else{
	$('#form_editCategoria').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_categoriaDisciplina/',
		resetForm: true,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProjeto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/categoria_disciplina');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('configuracoes/categoria_disciplina');
			}

			

		}		
	}).submit();
    return false;
}
};
jQuery.fn.submitAdd_projeto = function(){

    
	if($('[name="NOME"]').val() == ""){
            $.messager.alert('Aviso', 'O campo Projeto deve ser preenchido!', 'info');
		
		$('[name="NOME"]').focus();
	}else if($('[name="DESCRICAO"]').val() == ""){
              $.messager.alert('Aviso', 'O campo Descrição deve ser preenchido!', 'info');
		
		$('[name="DESCRICAO"]').focus();
	}else{
	$('#addProjeto').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_projeto/',
		resetForm: false,
		/*dataType: 'json',*/
		/*beforeSubmit:  validator("#addProjeto_geral"),*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
                                $("#pop_addProjeto").dialog("close");
				getSUB('configuracoes/projetos');
                                
			}else{
				$.messager.alert('Aviso', response, 'error');
				getSUB('configuracoes/projetos');
			}

			

		}		
	}).submit();
    return false;
}
};
jQuery.fn.deleteCategorias = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>desativar</b> a(s) Categorias(s) selecionada(s)?',function(r){  
		if (r){		
			$('.form_selectCategorias').ajaxForm({
			
				url: '<?=site_url()?>/admin/json/submit_delCategorias',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getSUB('configuracoes/categorias');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getSUB('configuracoes/categorias');
					}
				}		
			}).submit();
		}  
	});
    return false;
};

jQuery.fn.ativarCategorias = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>ativar</b> a(s) Categorias(s) selecionada(s)?',function(r){  
		if (r){		
			$('.form_selectCategorias').ajaxForm({
			
				url: '<?=site_url()?>/admin/json/submit_ativarCategorias',
				resetForm: true,
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getSUB('configuracoes/categorias');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getSUB('configuracoes/categorias');
					}
				}		
			}).submit();
		}  
	});
    return false;
};


jQuery.fn.formSelecionados = function(){
	
	$.messager.confirm('Confirm','Tem certeza que deseja <b>excluir</b> os itens selecionados?',function(r){  
		if (r){  
			$('.form_select').ajaxForm({
			
				url: '<?=site_url()?>/admin/json/submitDel_produto',
				resetForm: true,
		
				beforeSend: function() {
					$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
				},
				   
				success: function(response) {
					$.unblockUI();
					
					if(response == "ok"){
						$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
						getSUB('configuracoes/produtos');
					}else{
						$.messager.alert('Aviso', response, 'error');
						getSUB('configuracoes/produtos');
					}
				}		
			}).submit();
		}  
	});
    return false;
};


/*
#############################################################################################################
##
## Configuração de PopUp's
##
#############################################################################################################
*/

$("#pop_addProjeto").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 700,
	height: 350,
	buttons: [
		{
			text: "Salvar",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_projeto();
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

$("#pop_projeto").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 700,
	height: 350,
	buttons: [
		{
			text: "Vincular Disciplinas",
			"class": 'btn btn-info',
                        
			click: function() {
				$(this).vincularDisciplina( $('[name="CODIGO"]').val());
				$(this).dialog("close");
			}
		},
                {
			text: "Salvar Alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_projeto();
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


/*Categorida Popup*/
$("#pop_addCategoria").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_Categoria();
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

$("#pop_addCategoriaDisciplina").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar e Concluir",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_CategoriaDisciplina();
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
/*Categorida Popup*/
$("#pop_categoria").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar Alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_Categoria();
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
$("#pop_categoriaDisciplina").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 340,
	height: 172,
	buttons: [
		{
			text: "Salvar Alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitEdit_CategoriaDisciplina();
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

$("#pop_vincularDisciplina").dialog({
	autoOpen: false,
	
	resizable: false,
	width: 700,
        maxHeight: 600,
        
	buttons: [
		{
			text: "Salvar Alterações",
			"class": 'btn btn-success',
			click: function() {
				$(this).submitAdd_VincularDisciplina();
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
</script>