<script type="text/javascript">
var SERVIDOR = "<?=site_url()?>api/whois?key=<?=userKey()?>";

jQuery.fn.verificaWhois = function(){
	if($('#domain').val() == ""){
		alert('Você deve especificar um domínio');	
	}else{
		$(".registro_txt_resposta").html('<img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Carregando...');
		$.ajax({
			type:'GET',
			url: '<?=site_url()?>admin/json/resultWhois/'+$('#domain').val() + $('#ext').val(),
			beforeSend: function(){
				$(".registro_txt_resposta").fadeIn().html('<img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Carregando...');
				$('#tab_precos_dominios').slideUp().fadeOut();
			},
			success: function(xml){
				$(".registro_txt_resposta").fadeOut();
				$('#tab_precos_dominios').html(xml).slideDown();
			}
		});
	}
    //return false;
}


Number.prototype.formatNumber = function(decimals, sepDecimals, sepThousand){
  if(decimals==null)decimals=2;  
  if(sepDecimals==null)sepDecimals=',';
  if(sepThousand==null)sepThousand='.';  

  var n = new String(this.toFixed(decimals)).replace('.','').split('');
  n.reverse();
  var fn = new Array();
  var cont = decimals+1;
  for(this.i=0;this.i<n.length;this.i++){
   if(this.i==decimals-1 && n.length>decimals-1){
    fn.unshift(sepDecimals+n[this.i]);
   }else{
    if(cont--==0 && this.i != n.length-1){
     fn.unshift(sepThousand+n[this.i]);
     cont = 2;
    }else fn.unshift(n[this.i]);
   } 
  }
  return fn.join('');
 }

$(function(){
	
	$("#registra_nao").attr("checked",true);
	if($("#registra_nao").is(':checked')){
		//$('#tab_precos_dominios').hide().html('');
	}
	
	$('[name="registrar"]').click(function(){
		if($(this).val() == "sim"){
			$('#select_extensao').show();
			$('#domain').width('340px');
			$.ajax({
				type:'GET',
				url: '<?=site_url()?>admin/json/getDominios',
				beforeSend: function(){
					$("#select_extensao").html('<img src="<?=site_url()?>assets/img/gif/load.gif" />');
				},
				success: function(dados){
					$("#select_extensao").html(''+dados+'');
				}
			});
		}else{
			$('#select_extensao').hide().html('');
			$('#tab_precos_dominios').slideUp();
			$('#domain').width('460px');
		}
		
	});
	

	$("#submit_whois").click(function(e){
		e.preventDefault();
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
		$("#left_panel").height(460);
		
		$("#select_pgto_boleto").addClass('selected_pgto');
		$("#select_pgto_cartao").addClass('select_pgto');
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
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:",", thousands:".", allowZero:true});

	
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
	
//  #####################################  FECHAR JANELA MODAL #####################################

			
	$(".fecharModal").click(function(){

		$('.modal').modal('hide')
	});

	
//  #####################################  FIM - FECHAR JANELA MODAL #####################################
	
	
	
	$('.ciclo_pagto').click(function(){
		$("#CICLO_PAGTO").attr("value", $(this).data('id'));
		var servico_ciclo;
		
		if($(this).data('id') == 1){
			$(this).addClass('active');
			$('#c_trimestral, #c_semestral, #c_anual, #c_bienal').removeClass('active');
			//--------------------------------------------------------------------------//
			servico_ciclo = parseFloat($('.VALOR_SERVICO').val());
			$('.txt_ciclo_produto').html('*mensal');
		}
		if($(this).data('id') == 3){
			$(this).addClass('active');
			$('#c_mensal, #c_semestral, #c_anual, #c_bienal').removeClass('active');
			//--------------------------------------------------------------------------//
			servico_ciclo = parseFloat($('.SERVICO_TRIMESTRAL').val());
			$('.txt_ciclo_produto').html('*trimestral');
		}
		if($(this).data('id') == 6){
			$(this).addClass('active');
			$('#c_trimestral, #c_mensal, #c_anual, #c_bienal').removeClass('active');
			//--------------------------------------------------------------------------//
			servico_ciclo = parseFloat($('.SERVICO_SEMESTRAL').val());
			$('.txt_ciclo_produto').html('*semestral');
		}
		if($(this).data('id') == 12){
			$(this).addClass('active');
			$('#c_trimestral, #c_semestral, #c_mensal, #c_bienal').removeClass('active');
			//--------------------------------------------------------------------------//
			servico_ciclo = parseFloat($('.SERVICO_ANUAL').val());
			$('.txt_ciclo_produto').html('*anual');
		}
		if($(this).data('id') == 24){
			$(this).addClass('active');
			$('#c_trimestral, #c_semestral, #c_anual, #c_mensal').removeClass('active');
			//--------------------------------------------------------------------------//
			servico_ciclo = parseFloat($('.SERVICO_BIENAL').val());
			$('.txt_ciclo_produto').html('*bienal');
		}
		
		var dominio = parseFloat($('.VALOR_DOMINIO').val());
		if(servico_ciclo == 0){
			var servico = parseFloat($('.VALOR_SERVICO').val()) * $(this).data('id') + dominio;
		}else{
			var servico = servico_ciclo + dominio;
		}
		
		$('.VALOR_PAGTO').val(servico);
		$('#txt_total').html('R$ '+ servico.formatNumber(2,',','.'));
		
		if(servico_ciclo == 0){
			servico_ciclo = parseFloat($('.VALOR_SERVICO').val()) * $(this).data('id');
			$('[name="VALOR_SERVICO"]').val(servico_ciclo);
		}else{
			$('[name="VALOR_SERVICO"]').val(servico_ciclo);
		}
		$('.txt_preco_produto').html('R$ '+ servico_ciclo.formatNumber(2,',','.'));
		
	});
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$('#e_contrato').click(function(){
		$(".E_CONTRATO").attr("value",$(this).val());
	});
	
	$('input[name="FORMA_PAGAMENTO"]').click(function() {
		$('input[name="FORMA_PAGAMENTO"]:checked').not(this).removeAttr('checked');
		$(".E_PAGAMENTO").attr("value",$(this).val());
		if($(this).val() == 'boleto'){
			
			$("#select_pgto_boleto").addClass('selected_pgto');
			$("#select_pgto_cartao").removeClass('selected_pgto');
			$("#select_pgto_cartao").addClass('select_pgto');
			
			$('#view_boleto').slideDown();
			$('#view_cartao').slideUp();
			$("#left_panel").animate({height:460},500);
		}else{
			$("#select_pgto_cartao").addClass('selected_pgto');
			$("#select_pgto_boleto").removeClass('selected_pgto');
			$("#select_pgto_boleto").addClass('select_pgto');
			
			$('#view_cartao').slideDown();
			$('#view_boleto').slideUp();
			$("#left_panel").animate({height:550},500);
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
		$("#form_resumo").submit();
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
	
	$('#list_estados_edit').combobox({
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			
			$('#list_cidades_edit').combobox({
				mode:'remote',
				enabled:true,		
				url: "<?=site_url()?>/admin/json/lista_cidades/" + newValue,
				valueField:'DESCRICAO',  
				textField:'DESCRICAO'				
			});	
		}
	});

});
</script>
