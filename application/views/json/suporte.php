<script type="text/javascript">
//$.messager.alert('My Title','Here is a info message!','error');

jQuery.fn.ticketDetalhes = function(n_ticket){
	$("#pop_ticketDetalhes").dialog("open");
	
	var title = $("#pop_ticketDetalhes").dialog("option", "title");
	var url_get;
		
		if(n_ticket === undefined){
			url_get = $(this).data('id')
		}else{
			url_get = n_ticket
		}
		
	$("#pop_ticketDetalhes").dialog("option", "title", "Detalhes do Ticket - #"+url_get+"" );	
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>/admin/suporte/pop_viewTicket/'+url_get,
		dataType: 'html',
		beforeSend: function(){
			$("#pop_ticketDetalhes").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
		},

		success: function(data){
			$("#pop_ticketDetalhes").html(data);
		}
	});
	
	//$("#pop_view_contatos").html(this.id);
	return false;
};
jQuery.fn.exibeAddTicket = function(){
	$("#pop_addTicket").dialog("open");
	
	var title = $("#pop_addTicket").dialog("option", "title");
	$("#pop_addTicket").dialog("option", "title", "Novo Ticket" );	
	
	$.ajax({
		type: 'GET',
		url: '<?=site_url()?>admin/suporte/pop_addTicket',
		dataType: 'html',
		beforeSend: function(){
			$("#pop_addTicket").html(' <h4><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
		},

		success: function(data){
			$("#pop_addTicket").html(data);
		}
	});
	
	//$("#pop_view_contatos").html(this.id);
	return false;
};

/*
 	########### SUBMIT's ----------------
*/

jQuery.fn.submitNovoTickets = function(){
   $.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/tickets/submit_addTicket',
		data:$('#form_AddTicket').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('suporte/tickets');
			}else{
				//$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('suporte/tickets');
			}
    	}
	});
   return false;
}
jQuery.fn.submitDeletarTickets = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/tickets/del',
		data:$('#select_clientes').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('suporte/tickets');
			}else{
				//$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('suporte/tickets');
			}
    	}
	});

    return false;
};

jQuery.fn.submitResolvidoTickets = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/tickets/resolvidoTicket',
		data:$('#select_clientes').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('suporte/tickets');
			}else{
				//$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('suporte/tickets');
			}
    	}
	});

    return false;
};

jQuery.fn.submitFechaTickets = function(){

	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/tickets/fechaTicket',
		data:$('#select_clientes').serialize(),
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.progress('close');
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('suporte/tickets');
			}else{
				//$.messager.progress('close');
				
				$.messager.alert('Aviso', response, 'error');
				getURL('suporte/tickets');
			}
    	}
	});

    return false;
};

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


$(function(){
	
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
	
	$('input[id=lefile]').change(function() {
	   $('#photoCover').val($(this).val());
	   
	});
	
	$('.selectAll').click(function(){
		var checkall =$(this).parents('.dataTable:eq(0)').find(':checkbox').attr('checked', this.checked);
        $.uniform.update(checkall);
	});
	
	/*
		Seletores - Tickets
	*/

	$("a[rel='ticketDetalhes']").click(function(){
		$(this).ticketDetalhes();
	});

	$("a[rel='bt_deletaTickets']").click(function() {
		
		$.messager.confirm('Aviso','Tem certeza que deseja <b>excluir</b> o(s) ticket(s) selecionado(s)?', function(resp){
			if(resp){  
				$(this).submitDeletarTickets();
			}
		});
	});
	
	$("a[rel='bt_fechaTicket']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja mudar o(s) status do ticket(s) para <b>FECHADO</b>?', function(resp){
			if(resp){  
				$(this).submitFechaTickets();
			}
		});
	});
	
	
	$("a[rel='bt_resolvidoTicket']").click(function(){
		
		$.messager.confirm('Aviso','Tem certeza que deseja mudar o(s) status do ticket(s) para <b>RESOLVIDO</b>?', function(resp){
			if(resp){  
				$(this).submitResolvidoTickets();
			}
		});
		
	});
	
	$("a[rel='bt_addTicket']").click(function(){
		$(this).exibeAddTicket();
	});
	
	// POP-UP'S ##################################################
	
	$("#pop_ticketDetalhes").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 560,
		height: 600,
		buttons: [
			/*{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitNovoTickets();
					$(this).dialog("close");
				}
			},*/
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
	
	$("#pop_addTicket").dialog({
		autoOpen: false,
		
		resizable: false,
		width: 560,
		height: 510,
		buttons: [
			{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				click: function() {
					$(this).submitNovoTickets();
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
	
});

</script>