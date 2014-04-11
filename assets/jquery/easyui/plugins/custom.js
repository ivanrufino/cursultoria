
(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = this.input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				this.button = $( "<button type='button'>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},

			destroy: function() {
				this.input.remove();
				this.button.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );



























function soma_lucro(){

document.getElementById("valor").value = '0';
var preco = parseFloat(document.getElementById("custo").value);
var lucro = parseFloat(document.getElementById("lucro").value);
document.getElementById("valor").value = (preco * lucro) + preco;

}

//Variáveis globais
var _loadTimer	= setInterval(__loadAnima,18);
var _loadPos	= 0;
var _loadDir	= 2;
var _loadLen	= 0;

//Anima a barra de progresso
function __loadAnima(){
	var elem = document.getElementById("barra_progresso");
	if(elem != null){
		if (_loadPos==0) _loadLen += _loadDir;
		if (_loadLen>32 || _loadPos>79) _loadPos += _loadDir;
		if (_loadPos>79) _loadLen -= _loadDir;
		if (_loadPos>79 && _loadLen==0) _loadPos=0;
		elem.style.left		= _loadPos;
		elem.style.width	= _loadLen;
	}
}

//Esconde o carregador
function __loadEsconde(){
	this.clearInterval(_loadTimer);
	var objLoader				= document.getElementById("error");
	objLoader.style.display		="none";
	objLoader.style.visibility	="hidden";
}
$(function(){
	
	$("#basic-combo").sexyCombo();
		
		$.sexyCombo.deactivate("#basic-combo");
    	$("#activate").bind("click", function () {
    		$.sexyCombo.activate("#basic-combo");
    	});
	
	$("#empty-combo").sexyCombo({
		emptyText: "Selecione..."
	});	
	
	$( "#combobox" ).combobox();
	$( "#toggle" ).click(function() {
		$( "#combobox" ).toggle();
	});
	
	$("#navigate_menu").height($(window).height()); // Height 100% (Painel Lateral)
	$("#right_content").height($(window).height());

	$("input:checkbox").click(function(){
		$(this).parent().parent('.td_line, .td_line_alter').toggleClass("td_line_selected");
	});
	
	$(".jbar").delay(5000).fadeOut();
	
	// Accordion
	$("#accordion").accordion({ header: "h3" });

	// Tabs
	$('.tabs').tabs();
	
	// Botões	
	/* **************** BOTÕES DE OPERAÇÃO ****************/
	$("#bt_excluir").click(function() {
		$("#pop_alerta").dialog("open");
		return false;
	});
	
	$("#bt_adicionar").click(function() {
		$("#pop_cadastro_contatos").dialog("open");
		return false;
	});
	
	/* **************** BOTÕES DE OPERAÇÃO ****************/

	
	$(".bt_enviar").button();

	/* **************** TELAS DE OPERAÇÕES ****************/		
	$("#pop_alerta").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		resizable: false,
		width: 350,
		height: 140,
		buttons: {
			"Ok": function(){
				$("#deleteItem").submit();
				$(this).dialog("close");
			},
			"Cancelar": function(){
				$(this).dialog("close");
			}
		},
		modal: true
	});
	
	$("#pop_erro").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		resizable: false,
		width: 350,
		height: 140,
		buttons: {
			"Ok": function(){
				$(this).dialog("close");
			}
		},
		modal: true
	});
	
	// PopUp Cadastro de Contatos....
	$("#pop_cadastro_contatos").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		resizable: false,
		width: 700,
		height: 500,
		buttons: {
			"Salvar e Concluir": function(){
				$("#form_cadastro_contato").submit();
				$(this).dialog("close");
			},
			"Fechar": function(){
				$(this).dialog("close");
			}
		},
		modal: true
	});
	
	/* **************** TELAS DE OPERAÇÕES ****************/	
	
	// Dialog Link
	$('#dialog_link').click(function(){
		$('#dialog').dialog('open');
		return false;
	});
	
	$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
		$( ".datepicker" ).datepicker( $.datepicker.regional[ "pt" ] );
	
	// Slider
	$('#slider').slider({
		range: true,
		values: [17, 67]
	});
	
	// Progressbar
	$("#progressbar").progressbar({
		value: 20 
	});
	
	//hover states on the static widgets
	$('#dialog_link, ul#icons li').hover(
		function() { $(this).addClass('ui-state-hover'); }, 
		function() { $(this).removeClass('ui-state-hover'); }
	);
	
	
});

function create( template, vars, opts ){
	return $container.notify("create", template, vars, opts);
}

/*$(function(){
	//$(".aba_cadastro:first").hide();
	$("input[name=pessoa]").change(function() {
		var test = $(this).val();
		$(".aba_cadastro").hide();
		$("#"+test).show();
		
	});
	
	$container = $("#error").notify();
	create("basic-template",0, {expires: false});
	
	$("#end_diferente").hide();

});*/

$(document).ready(function() {
	
	$("#pessoa_juridica, #pessoa_fisica").change(function() {
		if($('#pessoa_fisica').is(':checked')){
			$("#fisica").show();
			$("#juridica").hide();
		}
		if($('#pessoa_juridica').is(':checked')){
			$("#juridica").show();
			$("#fisica").hide();
		}
	});
	
});


function mascara(src, mask){
	var i = src.value.length;
	var saida = mask.substring(1,2);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida){
		src.value += texto.substring(0,1);
	}
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


function endereco_diferente(){
	var checkItem = document.getElementById("endereco_diferente"); // Cria uma variável associada ao id do campo no formulario

	if(checkItem.checked == 1){
		// Se estiver selecionado...
		$("#end_diferente").fadeIn();
		
	}else{
		// Se não estiver selecionado...
		$("#end_diferente").fadeOut();
	}
	

	
}
function exibe(id) {  
    if(document.getElementById(id).style.display=="none") {  
        document.getElementById(id).style.display = "block";  
    }  
    else {  
        document.getElementById(id).style.display = "none";  
    }  
}

$(document).ready(function() {
		
// Toggle the dropdown menu's
$(".dropdown .button, .dropdown button").click(function () {
	if (!$(this).find('span.toggle').hasClass('active')) {
		$('.dropdown-slider').slideUp();
		$('span.toggle').removeClass('active');
	}

// open selected dropown
	$(this).parent().find('.dropdown-slider').slideToggle('fast');
	$(this).find('span.toggle').toggleClass('active');
	
	return false;
});

// Launch TipTip tooltip
$('.tiptip a.button, .tiptip button').tipTip();

});

// Close open dropdown slider by clicking elsewhwere on page
$(document).bind('click', function (e) {
if (e.target.id != $('.dropdown').attr('class')) {
	$('.dropdown-slider').slideUp();
	$('span.toggle').removeClass('active');
}
});