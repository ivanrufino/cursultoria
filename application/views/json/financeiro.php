<script type="text/javascript">
// JavaScript Document
jQuery.fn.exibePedido = function(){
	return this.each(function(){
		$("#pop_faturas").dialog("open");
		
		var title = $("#pop_faturas").dialog("option", "title");
		$("#pop_faturas").dialog("option", "title", "Detalhes do Pedido" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/get_pedido/'+this.id,
			dataType: 'html',
			beforeSend: function(){
				/*
				* Ação que será executada após o envio, no caso, chamei um gif
				* loading para dar a impressão de carregamento na página
				*/
				//$('#loading_popup').html()
				$("#pop_view").html(' <h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
			},
			//function(data) vide item 4 em $.get $.post
			success: function(data){
				//Tratamento dos dados de retorno.
				$("#pop_faturas").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.exibeFatura = function(n_fatura){
	return this.each(function(){
		$('.btnConfirmaPagto').attr('id', this.id);
		$("#pop_faturas").dialog("open");
		
		var title = $("#pop_faturas").dialog("option", "title");
		var url_get;
		$("#pop_faturas").dialog("option", "title", "Detalhes do Fatura" );
		
		if(n_fatura === undefined){
			url_get = '<?=site_url()?>/admin/json/get_fatura/'+this.id
		}else{
			url_get = '<?=site_url()?>/admin/json/get_fatura/'+n_fatura
		}
		
		$.ajax({
			type: 'GET',
			url: url_get,
			dataType: 'html',
			beforeSend: function(){
				$("#pop_faturas").html(' <h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
			},
			success: function(data){
				//Tratamento dos dados de retorno.
				$("#pop_faturas").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.confirmaPagamento = function(){
	return this.each(function(){
		$("#pop_confirmaPagamento").dialog("open");
		
		var n_fatura = $('.btnConfirmaPagto').attr('id');
		var title    = $("#pop_faturas").dialog("option", "title");
		$("#pop_confirmaPagamento").dialog("option", "title", "Adicionar Pagamento" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/get_confirmaPagto/'+n_fatura,
			dataType: 'html',
			beforeSend: function(){
				//$('#loading_popup').html()
				$("#pop_confirmaPagamento").html(' <h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
			},
			//function(data) vide item 4 em $.get $.post
			success: function(data){
				//Tratamento dos dados de retorno.
				$("#pop_confirmaPagamento").html(data);
			}
	  	});
		
		//$("#pop_view_contatos").html(this.id);
		return false;
	});
};

jQuery.fn.addFatura = function(){
	return this.each(function(){
		$("#pop_addFatura").dialog("open");
		$("#pop_addFatura").dialog("option", "title", "Efetuar cobrança Avulsa" );	
		
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/financeiro/modal_addFatura/',
			dataType: 'html',
			beforeSend: function(){
				$("#pop_addFatura").html(' <h4><img src="<?=site_url()?>/assets/images2/loading2.gif" /> Aguarde, carregando...</h4>');
			},
			success: function(data){
				$("#pop_addFatura").html(data);
			}
	  	});
		return false;
	});
};


jQuery.fn.submit_addFatura = function(){
	
	$('#form_AddFatura').ajaxForm({
	
		url: '<?=site_url()?>/admin/financeiro/submit_addFaturas',
		resetForm: true,
		/*dataType: 'json',*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	}, 
		success: function(response) {
			$.unblockUI();

			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('financeiro/faturas');
				
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('financeiro/faturas');
			}
		}		
	}).submit();
    return false;
};


jQuery.fn.submit_confirmaPagto = function(){
	
	$('#form_confirmaPagto').ajaxForm({
	
		url: '<?=site_url()?>/admin/json/submit_confirmaPagto',
		resetForm: true,
		/*dataType: 'json',*/
		beforeSend: function() {
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
	   	}, 
		success: function(response) {
			$.unblockUI();

			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('financeiro/faturas');
				$(this).exibeFatura($('[name="FATURA"]').val());
				
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('financeiro/faturas');
				$(this).exibeFatura($('[name="FATURA"]').val());
				
			}
		}		
	}).submit();
    return false;
};

jQuery.fn.submit_DelFaturas = function(){
    
	$.ajax({
		type:'POST',
		url: '<?=site_url()?>/admin/financeiro/submit_delFaturas',
		data:$('#deleteFaturas').serialize(),
		beforeSend: function(){
			$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
		},
		success: function(response){
			$.unblockUI();
			
			if(response == "ok"){
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('financeiro/faturas');
				
			}else{
				$.messager.alert('Aviso', response, 'error');
				getURL('financeiro/faturas');
				
			}
    	}
	});

    return false;
}
	
	$("a[rel='exibePedido']").click(function (){
		$(this).exibePedido();
	});
	
	$("a[rel='delFatura']").click(function(){
		//$("#form_selecionados").attr("action",'<?//=$dados->TIPO_PESSOA?>');
		//$("#del_cadastro").submit();
		$.messager.confirm('Aviso Importante!','Tem certeza que deseja <b>excluir</b> a(s) fatura(s) selecionada(s)?', function(resp){
			if(resp){  
				$(this).submit_DelFaturas()
			}
		});
	
	});
	
	$("a[rel='exibeFatura']").click(function (){
		$(this).exibeFatura();
	});
	
	$("a[rel='addFatura']").click(function (){
		$(this).addFatura();
	});

	$("#pop_faturas").dialog({
		autoOpen: false,
		resizable: false,
		width: 700,
		height: 500,
		buttons: [
			{
				text: "Confirmar Pagamento",
				"class": 'btn btnConfirmaPagto',
				html: "<i class='icon-plus'></i> Confirmar Pagamento",
				click: function() {
					$(this).confirmaPagamento();
					//$(this).dialog("close");
				}
			},
			
			{
				text: "Editar",
				"class": 'btn',
				html: "<i class='icon-pencil'></i> Editar",
				click: function() {
					$(this).dialog("close");
				}
			},
			{
				text: "Enviar",
				"class": 'btn',
				html: "<i class='icon-envelope'></i> Enviar",
				click: function() {
					$(this).dialog("close");
				}
			},
			{
				text: "Excluir",
				"class": 'btn',
				html: "<i class='icon-trash'></i> <font color='#c00'>Excluir</font>",
				click: function() {
					$(this).dialog("close");
				}
			}
		],		
		modal: true
	});
	
	
	$("#pop_addFatura").dialog({
		autoOpen: false,
		resizable: false,
		width: 560,
		height: 450,
		buttons: [
			{
				text: "Salvar alterações",
				"class": 'btn btn-success',
				
				click: function() {
					$(this).submit_addFatura();
					//$(this).dialog("close");
				}
			},
			{
				text: "Fechar",
				"class": 'btn',
				html: "Fechar",
				click: function() {
					$(this).dialog("close");
				}
			}
		],		
		modal: true
	});
	
	
	$("#pop_confirmaPagamento").dialog({
		autoOpen: false,
		resizable: false,
		width: 370,
		height: 200,
		buttons: [
			{
				text: "Enviar",
				"class": 'btn btn-danger',
				click: function() {
					$(this).submit_confirmaPagto();
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

	
	//$('.jqProfile').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});	


</script>