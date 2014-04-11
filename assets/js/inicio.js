/*******************************************************************************************************************************************/
// Função responsavel por verificar qual é o navegador
/*******************************************************************************************************************************************/


//ADDTAB - Abrir URL correspondente ao controller
function addTab(url){
	
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
			$("#mainframe").html('<h2 style="padding:10px"><img src="assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
		},
		//function(data) vide item 4 em $.get $.post
		success: function(data){
			//Tratamento dos dados de retorno.
			$("#mainframe").html(data);
		}
	});
}  

	$('#layout_chamados').layout('collapse', 'west');




//$('#cc').combobox();







/*
$('#tt').tabs('add',{  
    title:'Financeiro',  
    href:'relatorio.php',
    closable:true,    
});*/

//

/*
	verificar_sessao();


	// Exibe Menu

	$.getJSON(SERVIDOR+"include/menu", function(data) {
        $.each(data, function(index) {
		$('#menu_left').accordion('add',{  
			title: abrevia(data[index].SIS_DESCRICAO, 35),  
			content: 'carregando...',//data[index].SIS_CODIGO,
			selected:false,
			onSelect:function(index){
				alert(index);
			}
		});

        });
    });
	
	$('#menu_principal').accordion({
		onSelect:function(index){
			if (index != "Inicial") {
				var pp = $('#menu_principal').accordion('getSelected'); 
				if (pp){
					pp.panel('refresh','include/menu/' + index);  
				}  	
			}
		}  
	});  
	
*/
	



/*
function verificar_sessao() {


		$.ajax({
			type: "POST",
			url: SERVIDOR+"include/login/verificar_sessao",
			dataType: "html",
	
			success: function(msg){ 
						
				if (msg == "erro") {
					
					var win = $.messager.progress({
						title:'Aguarde...',
						msg:'Sua sessão expirou por inatividade, estamos validando sua sessão.'

					});					
					
					validar_sessao();
					
				} else {
					
					V_itens = msg.split(';');

					login = V_itens[2];
					matricula =V_itens[3];
					nome = V_itens[4];
					empresa = V_itens[5];
					nivela = V_itens[6];
					nivelu = V_itens[7];
					emp_sigla = V_itens[8];
					emp_dominio = V_itens[9]; 
					sigla =V_itens[10];
					token = V_itens[1];

				
					setTimeout(function(){
						verificar_sessao();
					},5000)					
				
				}
				
			}
		});


	
	
	
}


function validar_sessao() {
		$.ajax({
			type: "POST",
			url: SERVIDOR+"include/login/valida_sessao",
			data:  "login=" + login + "&matricula=" + matricula + "&nome=" + nome + "&empresa=" + empresa + "&emp_sigla=" + emp_sigla + "&emp_dominio=" + emp_dominio + "&sigla=" + sigla + "&token=" + token,
			dataType: "html",
			success: function(msg){ 
				if (msg == "ok") {
					$.messager.progress('close');
				} else {
					alert("Sua sessão expirou e não foi possível carregá-la. Por favor, realize o login novamente.");
					location.href = SERVIDOR;
				}
			
			}
			
		});
}
*/







































