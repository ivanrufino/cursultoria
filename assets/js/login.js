/// Funções para colocar no núcleo

var SERVIDOR="http://"+document.domain+"/";

function CentralizarItem(theItem){
	var winWidth=$(window).width();
	var winHeight=$(window).height();
	var windowCenter=winWidth/2;
	var itemCenter=$(theItem).width()/2;
	var theCenter=windowCenter-itemCenter;
	var windowMiddle=winHeight/2;
	var itemMiddle=$(theItem).height()/2;
	var theMiddle=windowMiddle-itemMiddle;
	if(winWidth>$(theItem).width()){ //horizontal
		$(theItem).css('left',theCenter);
	} else {
		$(theItem).css('left','0');
	}
	if(winHeight>$(theItem).height()){ //vertical
		$(theItem).css('top',theMiddle);
	} else {
		$(theItem).css('top','0');
	}
}

function exibe_tip(tipo, mensagem) {

		
	if (tipo == "info" || tipo == "tip" || tipo == "ok") {
		$(".tip").css("background-color","#FFC");
		$(".tip").css("color","#000");
	} else if (tipo == "loader") {
		$(".tip").css("background-color","#E0EEFC");
		$(".tip").css("color","#999");	
	} else {
		$(".tip").css("background-color","#FFD1A4");
		$(".tip").css("color","#900");		
	}
	
	$("#tip-texto").html(mensagem);	


	//criar array de icones

	$(".tip-linha").addClass("icon-"+tipo);
	
	
	$(".tip").slideDown();

	
}


function enviar() {

	
	if($("#login").val()=="0" || $("#senha").val()=="") {
		exibe_tip("alerta", "Preencha todos os campos"); 
	} else {  
			
			
		$('form').attr("action",SERVIDOR+"/include/login/logar");
		
		exibe_tip("", "Validando usuário...");
		
        var action = $('form').attr('action');
        $('form').attr('action','javascript:void(0);');
        $('form').submit(function(){ 
                 $.post(action ,jQuery("form").serialize(),  function(msg){
					 						
						
						if (msg.indexOf(";")==-1){
							exibe_tip("tip", msg);
						} else {
							tipo = msg.substr(0, msg.indexOf(";"));
							mensagem = msg.substr(msg.indexOf(";")+1, msg.length);

							exibe_tip(tipo, mensagem);
							
							if (tipo == "ok") {
								window.location.href=SERVIDOR+"inicio";									
							} 
							
							if (tipo == "lock") {
								window.location.href=SERVIDOR+"login/alterarsenha";	
							}
							
						}

											
						
                 });
                return null;
        });
		
		$('form').submit();	
		
	}		
		


	
	
}


$(document).ready(function() {
		
	$('#window-login').panel({  
		collapsible:true
	}); 
	
	$('#window-login').slideDown();
	
	CentralizarItem('.centralizado');

	
	$("#login").focus();
	$("#login").keypress(function(e){if(e.keyCode == 13) {$("#senha").select(); return false;}})
	$("#senha").keypress(function(e){if(e.keyCode == 13) enviar()})
	 
  $("#enviar").click(function(){
		 
	  if($("#login").val()==""){ alert('Digite o Usuário!');return false;}
	  if($("#senha").val()==""){ alert('Digite a Senha!');return false;}
	  
	  if($("#captcha").val()==""){ 
		  alert('Digite o código!');
		  document.location.href = SERVIDOR;
		  return false
	  }	   
	});	 
}); 


$(window).resize(function() {
	CentralizarItem('.centralizado');
});