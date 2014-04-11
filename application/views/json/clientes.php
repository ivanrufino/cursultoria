
<script type="text/javascript">

//$.messager.alert('My Title','Here is a info message!','error');


jQuery.fn.extratoCliente = function(){

	$.ajax({
		type: 'POST',
		url: '<?=site_url()?>admin/json/extratoCliente_admin',
		data:$('#exibe_mes').serialize(),
		beforeSend: function(){
			$(".btClienteExtrato").button('loading');
			$(".tableExtrato").html("Carregando...");
		},

		success: function(data){
			$(".btClienteExtrato").button('reset');
			$(".tableExtrato").html(data);
		}
	});
	return false;
};

jQuery.fn.exibeServico = function(){
	return this.each(function(){
		$("#pop_viewServico").dialog("open");
		
		var title = $("#pop_viewServico").dialog("option", "title");
		$("#pop_viewServico").dialog("option", "title", "Detalhes do Projeto" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/exibeServico/'+$(this).data('id'),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewServico").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_viewServico").html(data);
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
			url: '<?=site_url()?>/admin/json/dominioCliente/'+this.id,
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


jQuery.fn.addDominioCliente = function(){
	return this.each(function(){
		$("#pop_addDominioCliente").dialog("open");
		
		var title = $("#pop_addDominio").dialog("option", "title");
		$("#pop_addDominioCliente").dialog("option", "title", "Novo Domínio" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/addDominioCliente/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addDominioCliente").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},

			success: function(data){
				$("#pop_addDominioCliente").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

/* ######################################################################################## SERVICOS */

jQuery.fn.addServico = function(){
	return this.each(function(){
		$("#pop_addServico").dialog("open");
		
		var title = $("#pop_addServico").dialog("option", "title");
		$("#pop_addServico").dialog("option", "title", "Novo Serviço" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/cadastros/pop_addServico/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addServico").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_addServico").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.submitEdit_servico = function(){

	$('#form_EditServico').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitEdit_servico',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/servicos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/servicos');
			}

		}		
	}).submit();
    return false;
};

jQuery.fn.submitAdd_servico = function(){

	$('#form_AddServico').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submitAdd_servico',
		resetForm: true,
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		   
		success: function(response) {
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/servicos');
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/servicos');
			}

		}		
	}).submit();
    return false;
};



/* ############################################################################################  CADASTROS */


jQuery.fn.exibeCliente = function(){
	return this.each(function(){
		$("#pop_view").dialog("open");
		
		var title = $("#pop_view").dialog("option", "title");
		$("#pop_view").dialog("option", "title", "Detalhes do Aluno" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/cadastros/pop_verCliente/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_view").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_view").html(data);
				
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.enviaMensagem = function(){
	return this.each(function(){
		$("#pop_enviaMensagem").dialog("open");
		
		var title = $("#pop_enviaMensagem").dialog("option", "title");
		$("#pop_enviaMensagem").dialog("option", "title", "Enviar mensagem para clientes" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/cadastros/pop_enviaMensagem/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_enviaMensagem").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#pop_enviaMensagem").html(data);
				
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.addCliente = function(){
	$('#seletor').each(function(){
		
		$("#add_view").dialog("open");
		
		var title = $("#add_view").dialog("option", "title");
		$("#add_view").dialog("option", "title", "Novo Contato" );	
		
		$.ajax({
			type: 'POST',
			url: '<?=site_url()?>/admin/cadastros/pop_addCliente/'+this.title,
			data: $("#form_addContato").serialize(),
			beforeSend: function(){
				
				$("#add_view").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
			},

			success: function(data){
				$("#add_view").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.submitAdd = function(){
    
	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/cadastros/submit_addCadastro',
		data:$('#form_addCadastros').serialize(),
		beforeSend: function(){
			var win = $.messager.progress({
				title:'Aguarde', msg:'Executando operação...'
			});
		},
		success: function(response){
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/clientes');
			}else{
				$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/clientes');
			}
    	}
	});

    return false;
}

jQuery.fn.submitEdit = function(){

    $.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/cadastros/submit_editCadastro/'+$("#id_cadastro").val(),
		data:$('#form_editCadastros').serialize(),
		beforeSend: function(){
			var win = $.messager.progress({
				title:'Aguarde', msg:'Executando operação...'
			});
		},
		success: function(response){
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/clientes');
			}else{
				$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/clientes');
			}
    	}
	});


    return false;
};

jQuery.fn.submitDel = function(){
    
	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/cadastros/submit_delCadastro',
		data:$('#select_clientes').serialize(),
		beforeSend: function(){
			var win = $.messager.progress({
				title:'Aguarde', msg:'Executando operação...'
			});
		},
		success: function(response){
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/clientes');
			}else{
				$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/clientes');
			}
    	}
	});

    return false;
};

/* ############################################################################################################################ */

jQuery.fn.submitDelDominioCliente = function(){
    
	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/json/del_DominiosClientes',
		data:$('#form_selecionados').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/dominios');
			}else{
				//$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/dominios');
			}
    	}
	});

    return false;
}

jQuery.fn.submitEdit_dominio = function(){
	
	 $.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/json/submitEdit_dominioCliente/',
		data:$('#form_EditClienteDominio').serialize(),
		beforeSend: function(){
			var win = $.messager.progress({
				title:'Aguarde', msg:'Executando operação...'
			});
		},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/dominios');
			}else{
				$.messager.progress('close');
				$.messager.alert('Aviso', response, 'error');
				getURL('cadastros/dominios');
			}

		}		
	});

    return false;

};

jQuery.fn.submitAddDominioCliente = function(){
    
	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/json/submitAdd_DominioCliente',
		data:$('#form_addDominioCliente').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('cadastros/dominios');
			}else{
				
				$.messager.alert('Aviso', 'Preencha os campos corretamente!', 'error');
				getURL('cadastros/dominios');
			}
    	}
	});

    return false;
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

				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
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


$(document).ready(function() {
	
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
	
	function fnGetSelected( oTableLocal ){
		return oTableLocal.$('tr.row_selected');
	}
	
	$(".dataTable tbody tr").click( function( e ) {
        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
        }
        else {
            oTable.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
	
	/*
	$('[rel="exibeCliente"]').live( 'click', function () {
       var data = oTable.fnGetData( this );
    	alert('dsasad '+data);
    } );
	*/
	
	$(".input_busca").keyup( function () {
		oTable.fnFilterAll(this.value);
	});
	
	$('input[id=lefile]').change(function() {
	   $('#photoCover').val($(this).val());
	   
	});
	
	$('.selectAll').click(function(){
		var checkall =$(this).parents('.dataTable:eq(0)').find(':checkbox').attr('checked', this.checked);
        $.uniform.update(checkall);
	});
	
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
		
	$("input:checkbox").click(function(){
		$(this).parent().parent('.td_line, .td_line_alter').toggleClass("td_line_selected");
	});
	
	
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
		
	$("input:checkbox").click(function(){
		$(this).parent().parent('.td_line, .td_line_alter').toggleClass("td_line_selected");
	});
	
	
	// Executando as opções de selecionados..
	
	$('[rel="exibeCliente"]').live( 'click', function () {
		$(this).exibeCliente();
	});
	
	$("a[rel='enviaMensagem']").click(function(){
		$(this).enviaMensagem();
	});
	
	$(".btClienteExtrato").click(function(){
		$(this).extratoCliente();
	});
	
	$("a[rel='exibeServico']").click(function(){
		$(this).exibeServico();
	});
	
	$("a[rel='delCliente']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		//$("#del_cadastro").submit();
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) iten(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDel()
			}
		});
	
	});
	
	
	
	$("a[rel='delDominioCliente']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) iten(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDelDominioCliente()
			}
		});
	
	});
	
	$("a[rel='exibeLivro']").click(function(){
		$(this).exibeLivro();
	});
	
	$("a[rel='addDominioCliente']").click(function(){
		$(this).addDominioCliente();
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
	
	$("a[rel='addCliente']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		$(this).addCliente();
	});
	
	$("a[rel='addServico']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		$(this).addServico();
	});
	
	
	// Fim das opções selecionados ------------------------------------------------------------------------------------
	
	// Configuração de PopUp's
	$("#pop_view").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 700,
		height: 552,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit();
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
	
	$("#pop_enviaMensagem").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 750,
		height: 582,
		buttons: [
			{
				text: "Enviar Mensagem",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit();
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
	
	$("#pop_addDominioCliente").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 530,
		height: 552,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitAddDominioCliente();
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
		width: 620,
		height: 552,
		buttons: [
			{
				text: "Salvar e Concluir",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit_dominio();
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
	
	$("#pop_viewServico").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 560,
		height: 552,
		buttons: [
			{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitEdit_servico();
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
	
	$("#pop_addServico").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 560,
		height: 552,
		buttons: [
			{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitAdd_servico();
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

	$("#add_view").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 700,
		height: 560,
		buttons: [
			{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitAdd();
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
	
	$('input.unique').click(function() {
		$('input.unique:checked').not(this).removeAttr('checked');
		$("#tipo_pessoa").attr("value",$(this).val());
		
	});
	
	//$('.jqtransfor').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});	

});

</script>
