// JavaScript Document
$(function(){
	
	var site_url = "http://localhost/cm_netrevenda/";

    // Intercepta o botão de "enviar"
    $("#form_login").submit(function(e){
        e.preventDefault();
        
        //$("#loading").show();
        $("#retorno").empty().hide();
        
		
		$.post(site_url+"login/func_login", $("#form_login").serialize(),
		function(data){
			$("#retorno").show().html(data);
		});
	});
});
