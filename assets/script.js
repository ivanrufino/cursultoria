var SERVIDOR = "http://localhost/cm_gerentepro/api/whois";

jQuery.fn.verificaWhois = function(){
	
	$.ajax({
		type:'GET',
		url: SERVIDOR+ "?domain="+ $('#domain').val() + $('#ext').val(),
		beforeSend: function(){
			$(".registro_txt_resposta").html('Carregando...');
		},
		success: function(xml){
			if($(xml).find('domainName').text() == ""){
				alert('Você deve especificar um domínio');	
			}else{
				if($(xml).find('domainStatus').text() == "Disponivel"){
					$(".registro_txt_resposta").html('<div class="disponivel">Este domínio está livre!</div>');
				}else{
					$(".registro_txt_resposta").html('<div class="indisponivel">Este domínio não está disponível.</div>');
				}
			}
		}
	});

    //return false;
}



$(function(){
	$("#submit_whois").click(function(){
		$(this).verificaWhois();
	});
	
	//$('.steps').hide();
	
	if($("#e_cliente").val() == ""){
		$("#e_cliente").attr("value","sim");
		$("#login").show();
		$("#cadastro").hide();
	}
	
	if($("#e_pessoa").val() == ""){
		$("#e_pessoa").attr("value","fisica");
		$("#fisica").show();
		$("#juridica").hide();
	}
	
	if($(".E_PAGAMENTO").val() == ""){
		$(".E_PAGAMENTO").attr("value","boleto");
		$("#view_boleto").show();
		$("#view_cartao").hide();
		//$("#left_panel").height(460);
		
		$("#select_pgto_boleto").addClass('selected_pgto');
		$("#select_pgto_cartao").addClass('select_pgto');
		$("#select_pgto_pagseguro").addClass('select_pgto');
		$("#select_pgto_moip").addClass('select_pgto');
	}
	
	
	$('input.unique').click(function() {
		$('input.unique:checked').not(this).removeAttr('checked');
		$("#e_cliente").attr("value",$(this).val());
		if($(this).val() == 'sim'){
			$("#login").slideDown();
			$("#cadastro").slideUp();
			$("#left_panel").animate({height:400},500);
		}else{
			$("#cadastro").slideDown();
			$("#login").slideUp();
			$("#left_panel").animate({height:944},500);
		}
		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatCARD").mask("9999-9999-9999-9999");
	$(".formatVALIDADE").mask("99/9999");
	
	$('input[name="TIPO_PESSOA"]').click(function() {
		$('input[name="TIPO_PESSOA"]:checked').not(this).removeAttr('checked');
		$("#e_pessoa").attr("value",$(this).val());
		if($(this).val() == 'fisica'){
			$('#fisica').show();
			$('#juridica').hide();
		}else{
			$('#juridica').show();
			$('#fisica').hide();
		}
		
	});
	
	$('#e_contrato').click(function(){
		$(".E_CONTRATO").attr("value",$(this).val());
	});
	
	$('input[name="FORMA_PAGAMENTO"]').click(function() {
		$('input[name="FORMA_PAGAMENTO"]:checked').not(this).removeAttr('checked');
		$(".E_PAGAMENTO").attr("value",$(this).val());
		
		var pagto = $(this).val();
		
		if(pagto == 'boleto'){
			$("#select_pgto_boleto").addClass('selected_pgto');
			
			$("#select_pgto_cartao").removeClass('selected_pgto');
			$("#select_pgto_cartao").addClass('select_pgto');
			
			$("#select_pgto_pagseguro").removeClass('selected_pgto');
			$("#select_pgto_pagseguro").addClass('select_pgto');
			
			$("#select_pgto_moip").removeClass('selected_pgto');
			$("#select_pgto_moip").addClass('select_pgto');
			
			$('#view_boleto').slideDown();
			$('#view_cartao').slideUp();
			$('#view_pagseguro').slideUp();
			$('#view_moip').slideUp();
			
		}
		if(pagto == 'cartao'){
			$("#select_pgto_cartao").addClass('selected_pgto');
			
			$("#select_pgto_boleto").removeClass('selected_pgto');
			$("#select_pgto_boleto").addClass('select_pgto');
			
			$("#select_pgto_pagseguro").removeClass('selected_pgto');
			$("#select_pgto_pagseguro").addClass('select_pgto');
			
			$("#select_pgto_moip").removeClass('selected_pgto');
			$("#select_pgto_moip").addClass('select_pgto');
			
			$('#view_cartao').slideDown();
			$('#view_boleto').slideUp();
			$('#view_pagseguro').slideUp();
			$('#view_moip').slideUp();
			
		}
		if(pagto == 'pagseguro'){
			$("#select_pgto_pagseguro").addClass('selected_pgto');
			
			$("#select_pgto_boleto").removeClass('selected_pgto');
			$("#select_pgto_boleto").addClass('select_pgto');
			
			$("#select_pgto_cartao").removeClass('selected_pgto');
			$("#select_pgto_cartao").addClass('select_pgto');
			
			$("#select_pgto_moip").removeClass('selected_pgto');
			$("#select_pgto_moip").addClass('select_pgto');
			
			$('#view_pagseguro').slideDown();
			$('#view_boleto').slideUp();
			$('#view_cartao').slideUp();
			$('#view_moip').slideUp();
			
		}
		if(pagto == 'moip'){
			$("#select_pgto_moip").addClass('selected_pgto');
			
			$("#select_pgto_boleto").removeClass('selected_pgto');
			$("#select_pgto_boleto").addClass('select_pgto');
			
			$("#select_pgto_cartao").removeClass('selected_pgto');
			$("#select_pgto_cartao").addClass('select_pgto');
			
			$("#select_pgto_pagseguro").removeClass('selected_pgto');
			$("#select_pgto_pagseguro").addClass('select_pgto');
			
			$('#view_moip').slideDown();
			$('#view_boleto').slideUp();
			$('#view_cartao').slideUp();
			$('#view_pagseguro').slideUp();
			
		}
	});
	
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
	
	$.extend($.fn.validatebox.defaults.rules, {  
		equals: {  
			validator: function(value,param){  
				return value == $('[id="'+param+'"]').val();
			},  
			message: 'Digite novamente a mesma {0}.'
		},
		
		minLength: {  
			validator: function(value, param){  
				return value.length >= param[0];  
			},  
			message: 'Digite no mínimo <b>{0}</b> caracteres.'  
		}
	}); 
	
	$(".continuar_submit").click(function(){
		$(".steps").submit();
		
		if($("#e_cliente").val() == "sim"){
			$(".e_cliente").attr("value","sim");
			$("#inputs_login").submit();
		}else{
			$(".e_cliente").attr("value","nao");
			$("#inputs_cadastro").submit();
		}
	});
	
	$(".finalizar_submit").click(function(){
		
		if($(".E_PAGAMENTO").val() == "boleto"){
			$("#inputs_pgto_boleto").submit();
		}else{
			$("#inputs_pgto_cartao").submit();
		}
	});
	
	
	$('.is_required').validatebox({  
		required: true,
		//validType: 'url',
		missingMessage: 'Esse campo é obrigatório!'
	});
	
	$('.num_senha').validatebox({  
		required: true,
		validType: 'minLength[6]'
	});
	
	$('.equal_senha').validatebox({  
		required: true,
		validType: 'equals[id="senha_novo"]'
	});
	
	$('.datepicker').datebox({
		required: true
	});
	
	$('.easyui-combobox').combobox();
});