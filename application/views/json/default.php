<script type="text/javascript">

//ADDTAB - Abrir URL correspondente ao controller
function goCentral(){
	window.open("<?=site_url()?>", '_blank');
}

function getURL(url){
	
	$.ajax({
		type: 'GET',
		//url: '<?=site_url()?>/json/teste/'+this.id,
		url: url,
		dataType: 'html',
		beforeSend: function(){
			/*
			* Ação que será executada após o envio, no caso, chamei um gif
			* loading para dar a impressão de carregamento na página
			*/
			//$('#loading_popup').html()
			$("#mainframe").html('<h4 style="padding:10px"><img src="<?=site_url()?>/assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		//function(data) vide item 4 em $.get $.post
		success: function(data){
			//Tratamento dos dados de retorno.
			$("#mainframe").html(data);
		}
	});
} /* --/getURL -- */

function getNomeChave(){
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/getNomeChave',
			dataType: 'html',
			beforeSend: function(){
				$(".top_nome").html('...');
			},
			success: function(data){
				$(".top_nome").html(data);
			}
		});
	}


function getSUB(url){
	
	$.ajax({
		type: 'GET',
		//url: '<?=site_url()?>/json/teste/'+this.id,
		url: url,
		
		beforeSend: function(){
			/*
			* Ação que será executada após o envio, no caso, chamei um gif
			* loading para dar a impressão de carregamento na página
			*/
			//$('#loading_popup').html()
			$("#mainConfig").html('<h4 style="padding:10px"><img src="<?=site_url()?>/assets/img/gif/loading2.gif" /> Aguarde, carregando...</h4>');
		},
		//function(data) vide item 4 em $.get $.post
		success: function(data){
			//Tratamento dos dados de retorno.
			$("#mainConfig").html(data);
		}
	});
} /* --/getURL -- */

function jyCombo(select1, select2, url){
	$("select[name="+select1+"]").change(function(){
		$("select[name="+select2+"]").html('<option value="0">Carregando...</option>');
		
		$.post(url,{ select1:$(this).val()},
		function(valor){
			$("select[name="+select2+"]").html(valor);
		});
	});
}

function selectAll(){
	var checkItem = document.getElementById("seleciona"); // Cria uma variável associada ao id do campo no formulario
	
	if(checkItem.checked == 1){ // verifica se não está selecionado
		$("input:checkbox").parent().parent('.td_line, .td_line_alter').addClass("td_line_selected");
		for(i=0; i<=document.formulario.elements.length; i++){ // Percorre todos os campos...
			if(document.formulario.elements[i].type == "checkbox"){ // verifica se o tipo é "checkbox"
				document.formulario.elements[i].checked = 1; // aplica a seleção!
			}
		}

	}else{ // verifica se está selecionado
		$("input:checkbox").parent().parent('.td_line, .td_line_alter').removeClass("td_line_selected");
		for(i=0; i<=document.formulario.elements.length; i++){ // Percorre todos os campos...
			if(document.formulario.elements[i].type == "checkbox"){ // Verifica se o tipo é "checkbox"
				document.formulario.elements[i].checked = 0; // Tira a seleção!
			}
		}
	}
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


// Bloco que mostra o efeito do menu na barra de busca (cadastros)
$(function(){
	
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
	$(".formatCEL").mask("(99) 9-9999-9999");
	$(".formatCARD").mask("9999-9999-9999-9999");
	$(".formatVALIDADE").mask("99/9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:",", thousands:".", allowZero:true});
		
	$("input:checkbox").click(function(){
		$(this).parent().parent('.td_line, .td_line_alter').toggleClass("td_line_selected");
	});
	
	
	//Trocar logo
	$(".txtTrocaLogo_fundo").css('opacity', 0.5);
  	$(".imgTrocaLogo").hover(function(){
		$(".txtTrocaLogo, .txtTrocaLogo_fundo").fadeIn('fast');
  	});  

  	$(".imgTrocaLogo").mouseleave(function(){
		$(".txtTrocaLogo, .txtTrocaLogo_fundo").fadeOut('fast');
  	});
	
	$('[rel="goConfig"]').click(function(){
		getURL('configuracoes/geral');
	});
	
	$('[rel="goLogout"]').click(function(){
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/painel/login/logout',
			dataType: 'html',
			beforeSend: function(){
				$("#mainframe").html('<h4 style="padding:10px"><img src="<?=site_url()?>/assets/img/gif/loading2.gif" /> Fazendo Logoff...</h4>');
			},
			success: function(data){
				window.location = data;
			}
		});
	});
	
	$('#top-logo').click(function(){
		getURL('inicio/home');
	});
	$('.top_nome').click(function(){
		getURL('inicio/home');
	});
	
});

// Close open dropdown slider by clicking elsewhwere on page
$(document).bind('click', function (e) {
	if (e.target.id != $('.dropdown').attr('class')) {
		$('.dropdown-slider').slideUp();
		$('span.toggle').removeClass('active');
	}
});

</script>