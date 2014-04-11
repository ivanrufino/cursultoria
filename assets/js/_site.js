/*******************************************************************************************************************************************/
// Função responsavel por verificar qual é o navegador
/*******************************************************************************************************************************************/
//verificar_navegador();


//numero ponto e virgula
function SomenteNumeros(input){ 

event.returnValue=false;
//só numeros
if ((event.keyCode>=48) && (event.keyCode<=57)){ event.returnValue=true;}
if(event.keyCode== 44){event.returnValue=true;}
if(event.keyCode== 46){event.returnValue=true;}

} 


//OPENBOX - fechar
function fechaOpenBox(){$("#openbox").fadeOut()}


$(document).ready(function() {



$('#main_container').panel({  
  tools: [{  
    iconCls:'icon-reload',  
    handler:function(){window.location.reload();}  
  }]  
}); 


	
})