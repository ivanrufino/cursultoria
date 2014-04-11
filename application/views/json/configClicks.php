<script type="text/javascript">
$(function(){

    $('.dropdown-toggle').dropdown();  
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-accordion').accordion();
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatCARD").mask("9999-9999-9999-9999");
	$(".formatVALIDADE").mask("99/9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:",", thousands:".", allowZero:true});
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	var fixHelper = function(e, ui) {
		e.preventDefault();
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
		
	};
	
	$('input[id=lefile]').change(function() {
	   $('#photoCover').val($(this).val());
	   
	});
	
	$("#precos_dominios tbody").sortable({
		//helper: fixHelper,
		stop: function(event, ui) {
			//alert('soltei');
			alert($(this).children().attr('id'));
		}
	}).disableSelection();
	
	
	var fixHelperModified = function(e, tr) {
		e.preventDefault();
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index)
		{
		  $(this).width($originals.eq(index).width())
		});
		return $helper;
	};
	
	var oTable = $('.dataTable').dataTable( {
		"sDom": "t<'info_paginacao'i>'<'paginacao'p>",
		"sPaginationType": "bootstrap",
		"iDisplayLength": 15, //total de registros por página
		"aaSorting": [[1, "desc"]],
		"aoColumnDefs": [
		  {"bSortable": false, "aTargets": [0]}
		],
		"oLanguage": {
			"sProcessing":   "Carregando...",
			"sZeroRecords":  "Não foram encontrados resultados",
			"sInfo":         "Exibindo _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty":    "Exibindo 0 até 0 de 0 registros",
			"sInfoFiltered": "(filtrado de _MAX_ registros no total)",
			"sInfoPostFix":  "",
			"sSearch":       "Buscar:",
			"oPaginate": {
				"sFirst":    "Início",
				"sPrevious": "Anterior",
				"sNext":     "Próximo",
				"sLast":     "Final"
			}
		}
	});
	
	$(".input_busca").keyup( function () {
		oTable.fnFilterAll(this.value);
	});
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$(".txtTrocaLabel_fundo").css('opacity', 0.5);
  	$(".imgTrocaLabel").hover(function(){
		$(".txtTrocaLabel, .txtTrocaLabel_fundo").fadeIn('fast');
  	});  

  	$(".imgTrocaLabel").mouseleave(function(){
		$(".txtTrocaLabel, .txtTrocaLabel_fundo").fadeOut('fast');
  	});
	
	// Seletores..
	
	$("a[rel='trocaLogo']").click(function(){
		$(this).trocaLogo();
	});
	
	
	
	$("a[rel='deleteDominios']").click(function(){
		$(this).deleteDominios();
	});
	
	$("a[rel='deleteUsuarios']").click(function(){
		$(this).deleteUsuarios();
	});
	$("a[rel='deleteAutores']").click(function(){
		$(this).deleteAutores();
	});

	$("a[rel='deleteEditoras']").click(function(){
		$(this).deleteEditoras();
	});
	$("a[rel='deleteLivros']").click(function(){
		$(this).deleteLivros();
	});
	
	
	$("a[rel='exibeLivro']").click(function(){
		$(this).exibeLivro();
	});
	$("a[rel='addLivro']").click(function(){
		$(this).addLivro();
	});
	
	$("a[rel='deletarGateway']").click(function(){		
		$(this).deletarGateway($(this).attr('id'));
	});
	
	$("a[rel='deletarBoleto']").click(function(){		
		$(this).deletarBoleto($(this).attr('id'));
	});
	
	$("a[rel='deletarRegistrante']").click(function(){		
		$(this).deletarRegistrante($(this).attr('id'));
	});
	
	$("a[rel='detalheDominio']").click(function(){
		$(this).detalheDominio();
	});
		
	$("a[rel='gatewayDetalhe']").click(function(){
		$(this).gatewayDetalhe();
	});
	
	$("a[rel='verUsuario']").click(function(){
		$(this).verUsuario();
	});

	$('a[rel="verAutor"]').live( 'click', function () {
		$(this).verAutor();
	});
	
	$('a[rel="verEditora"]').live( 'click', function () {
		$(this).verEditora();
	});
	
	$("a[rel='usuarioAdd']").click(function(){
		$(this).usuarioAdd();
	});
	
	$("a[rel='editoraAdd']").click(function(){
		$(this).editoraAdd();
	});
	$("a[rel='autorAdd']").click(function(){
		$(this).autorAdd();
	});
	$("a[rel='disciplinaAdd']").click(function(){
		$(this).disciplinaAdd();
	});
	$("a[rel='verDisciplina']").live('click',function(){
		$(this).verDisciplina();
	});
	
	$("a[rel='gatewayBoleto']").click(function(){
		$(this).gatewayBoleto();
	});
	
	$("a[rel='registranteDetalhe']").click(function(){
		$(this).registranteDetalhe();
	});
	
	$("a[rel='alterarSenha']").click(function(){
		$(this).alterarSenha();
	});

	$("a[rel='servidorDetalhe']").click(function(){
		$(this).servidorDetalhe();
	});
	$("a[rel='topicoDetalhe']").live('click',function(){
		$(this).topicoDetalhe();
	});
	
	
	$("a[rel='dominioAdd']").click(function(){
		$(this).dominioAdd();
	});
	
		$("a[rel='alterCadastro']").click(function(){
		$(this).alterCadastro();
	});
	/*
		Seletores - Departamento de Suporte
	*/
	$("a[rel='bt_excluirDepartamento']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) ticket(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDel_departamentoSuporte();
			}
		});
	});

	$("a[rel='bt_addSuporteDepartamento']").click(function(){
		$(this).ver_addDepartamento();
	});
	
	$("a[rel='ver_suporteDepartamento']").click(function(){
		$(this).exibeSuporteDepartamento();
	});
	
	/*
		Seletores - Categorias de Suporte
	*/
	
	$("a[rel='bt_addCategoriaSuporte']").click(function(){
		$(this).ver_addCategoriaSuporte();
	});
	
	$("a[rel='ver_suporteCategoria']").click(function(){ /* Link  */
		$(this).exibeSuporteCategoria();
	});
	
	$("a[rel='ver_grupoUsuario']").click(function(){ /* Link  */
		$(this).exibeGrupoUsuario();
	});
	
	$("a[rel='bt_excluirCategoriasSuporte']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) ticket(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDel_CategoriaSuporte();
			}
		});
	});
	$("a[rel='bt_excluirGrupoUsuario']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) ticket(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDel_GrupoUsuario();
			}
		});
	});

	/*
		Seletores - Grupos de Usuários
	*/
	$("a[rel='bt_novoGrupoUsuario']").click(function(){
		$(this).ver_addGrupoUsuario();
	});

	/*
		## Seletores - Servidor
	*/
	
	$("a[rel='servidorAdd']").click(function(){
		$(this).servidorAdd();
	});
	
	$("a[rel='excluir']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		//$("#del_cadastro").submit();
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) iten(s) selecionado(s)?', function(resp){
		if(resp){  
			$(this).submitDel()
		}
	});
		

	});
	
	$("a[rel='exportar']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		alert('exportar');
	});
	
	$("a[rel='editar']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		alert('editar');
	});
	
	$("a[rel='mensagem']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		alert('mensagem');
	});
	
	$("a[rel='status']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		alert('status');
	});
	
	$("a[rel='adicionar']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		$(this).addCliente();
	});
	
	// Fim das opções selecionados ------------------------------------------------------------------------------------
	
	
	
	//$('.jqtransfor').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});	

});
</script>
