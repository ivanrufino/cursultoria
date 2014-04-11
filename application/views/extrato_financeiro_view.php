<?php 
ob_start();
?>
<?php require_once('includes/core.php'); ?>
<?php require_once('includes/functions/Contatos.form.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/load.css" rel="stylesheet" type="text/css" />
<link href="css/body.css" rel="stylesheet" type="text/css" />
<link href="css/extrato_financeiro.css" rel="stylesheet" type="text/css" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link type="text/css" href="css/custom-theme/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script language="javascript" type="text/javascript">
function selectAll(){
	var checkItem = document.getElementById("seleciona"); // Cria uma variável associada ao id do campo no formulario
	if(checkItem.checked == 1){ // verifica se não está selecionado
		$("input:checkbox").parent().parent('.td_line').addClass("td_line_selected");
		for(i=0; i<=document.formulario.elements.length; i++){ // Percorre todos os campos...
			if(document.formulario.elements[i].type == "checkbox"){ // verifica se o tipo é "checkbox"
				document.formulario.elements[i].checked = 1; // aplica a seleção!
			}
		}
	}else{ // verifica se está selecionado
		$("input:checkbox").parent().parent('.td_line').removeClass("td_line_selected");
		for(i=0; i<=document.formulario.elements.length; i++){ // Percorre todos os campos...
			if(document.formulario.elements[i].type == "checkbox"){ // Verifica se o tipo é "checkbox"
				document.formulario.elements[i].checked = 0; // Tira a seleção!
			}
		}
	}
	
}

$(function() {
	$("input:checkbox").click(function(){
		$(this).parent().parent('.td_line').toggleClass("td_line_selected");
	});

	$("input:submit").button({
		icons: {
			primary: "ui-icon-search"
		}
	});
	$( ".demo a:first" ).button({
		icons: {
			primary: "ui-icon-pencil"
		}
	});
	
	$(".demo #bt_excluir").button({
		icons: {
			primary: "ui-icon-trash"
		}
	}),
	$(".fl_right #anterior").button({
		icons: {
			primary: "ui-icon-carat-1-w"
		}
	}),
	$(".fl_right #proximo").button({
		icons: {
			secondary: "ui-icon-carat-1-e"
		}
	}),
	$(".fl_right a").button({
		
	});
	$("#pop_alerta").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		resizable: false,
		width: 350,
		height: 130,
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
	
	$("#pop_success").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		resizable: false,
		width: 280,
		height: 130,
		buttons: {
			"Ok": function(){
				$(this).dialog("close");
			}
		},
		modal: true
	});

	$("#bt_excluir").click(function() {
		$("#pop_alerta").dialog("open");
		return false;
	});
	<?php 
	if(isset($_GET['sim_add'])){
	echo '$("#pop_success").dialog("open");';
	}
	
	?>

	$(".alerta").delay(5000).slideUp(function(){
		$(this).remove();
	});	
});
</script>

<style> 
	body { font-size: 11px; }
	div#users-contain { width: 100%; }
	div#users-contain table { border-collapse: collapse; width: 100%; }
	div#users-contain table td{ border: 1px solid #eee; padding: .4em 10px; text-align: left; font-family:Arial, Helvetica, sans-serif}
	div#users-contain table th { border: 1px solid #eee; padding: .5em 10px; text-align: left; font-size:12px; font-weight:bold;}
	.ui-dialog .ui-state-error { padding: .3em; }
	.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style> 
</head>

<body onLoad="__loadEsconde();">
<!--<div id="loading">
    <div id="loading_div">
        <img src="image/loading.gif" />
        <p>Carregando...</p>
    </div>
</div>-->

<div id="wrapper">

<div class="ui-widget">
    <div class="ui-state-highlight ui-corner-all" style="padding: 6px .7em;"> 
        <p style="font:11px Tahoma;"><span class="ui-icon ui-icon-folder-open" style="float: left; margin-right: .3em;"></span>
      Home &raquo; <b>Contatos</b></p>
    </div>
</div>

    <div class="admin_tit_content">
        <font class="admin_tit_content_txt">Contatos</font>
    </div>
    
    <div id="tools_sys">
    	
        
        <div class="bt_tools"><a href="add_contatos.php">
        	<img src="images/icons/user-group.png" border="0" />
            <p>Adicionar Contato</p></a>
        </div>
        
        <div class="bt_tools"><a href="#">
        	<img src="images/icons/edit_group.png" border="0" />
            <p>Administrar Grupo<br /> de Contatos</p></a>
        </div>
    	
        <div class="bt_tools"><a href="#">
        	<img src="images/icons/document_export.png" border="0" />
            <p>Exportar para <br />CSV</p></a>
        </div>
        
    </div>
    
    <div class="table_busca_div" style="margin-bottom:10px;">
        <img src="images/icons/search.png" class="fl_left" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:4px;">Busca:</font>
        <input class="input_busca" name="busca" type="text" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:4px;">por:</font>
        <select name="filtro" class="filtro_busca">
            <option value="">:: Selecione ::</option>
            <option value="id">ID</option>
            <option value="nome">Nome</option>
            <option value="sobrenome">Sobrenome</option>
            <option value="telefone">Telefone</option>
            <option value="email">E-mail</option>
        </select>
    
        <input type="submit" class="btn_busca" value="Buscar" />
        
        <form name="formulario" id="deleteItem" method="post" action="?action=del">
        <div class="demo" style="float:right;">
            <a href="#">Editar</a>
            <a href="#dialog" id="bt_excluir">Excluir</a>
        </div>
    </div>
    
    <div class="admin_list_table">
    	
    	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">
              <div id="users-contain" class="ui-widget">
              <table width="100%" id="users" class="ui-widget ui-widget-content">
                <thead>
                  <tr class="ui-widget-header">
                    <th width="2%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                    <th width="9%">Data</th>
                    <th width="46%">Lançamento</th>
                    <th width="17%">Categoria</th>
                    <th width="12%" style="text-align:right;">Valor (R$)</th>
                    <th width="11%" style="text-align:right;">Saldo (R$)</th>
                    <th width="4%">Inf</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
			//$sql = $db->query("SELECT * FROM ".TB_CONTATOS);
			//while($rs = $db->fetch($sql)){
			
			?>
                  <tr class="td_line">
                    <td><input type="checkbox" id="item" name="item[]" value="<?php //echo $rs['id'];?>" /></td>
                    <td>18/03/2011</td>
                    <td>Pagamento Mensal - Energicel</td>
                    <td>Serviços</td>
                    <td style="text-align:right;">+40,00</td>
                    <td style="text-align:right;">+40,00</td>
                    <td><img src="images/icons/okay.png" /></td>
                  </tr>
                  <tr class="td_line">
                    <td><input type="checkbox" id="item" name="item[]" value="<?php //echo $rs['id'];?>" /></td>
                    <td>18/03/2011</td>
                    <td>Pagamento Mensal - Energicel</td>
                    <td>Serviços</td>
                    <td style="text-align:right;">+40,00</td>
                    <td style="text-align:right;">+40,00</td>
                    <td><img src="images/icons/okay.png" /></td>
                  </tr>
                  <tr class="td_line">
                    <td><input type="checkbox" id="item" name="item[]" value="<?php //echo $rs['id'];?>" /></td>
                    <td>18/03/2011</td>
                    <td>Pagamento Mensal - Energicel</td>
                    <td>Serviços</td>
                    <td style="text-align:right;">+90,00</td>
                    <td style="text-align:right;">+90,00</td>
                    <td><img src="images/icons/warning_16.png" /></td>
                  </tr>
                  <tr class="td_line">
                    <td><input type="checkbox" id="item" name="item[]" value="<?php //echo $rs['id'];?>" /></td>
                    <td>18/03/2011</td>
                    <td>Pagamento Mensal - Energicel</td>
                    <td>Serviços</td>
                    <td style="color:#FF0000;text-align:right;">-240,00</td>
                    <td style="color:#FF0000;text-align:right;">-240,00</td>
                    <td><img src="images/icons/warning_16.png" /></td>
                  </tr>
                  <tr class="td_line">
                    <td><input type="checkbox" id="item" name="item[]" value="<?php //echo $rs['id'];?>" /></td>
                    <td>18/03/2011</td>
                    <td>Pagamento Mensal - Energicel</td>
                    <td>Serviços</td>
                    <td style="text-align:right;">+240,00</td>
                    <td style="text-align:right;">+240,00</td>
                    <td><img src="images/icons/okay.png" /></td>
                  </tr>
                  <?php
			//}
			?>
                </tbody>
              </table>
              
                  <div class="table_pages_div">
                  		<div class="fl_left">
                            <div class="pgs_text_response3">
                                <b>TOTAL</b>
                            </div>
                        </div>
                        <div class="fl_right">
                            <div class="pgs_text_response3" style="font: 12px Arial;">
                                <b>Previsão:</b> R$ 220,00
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b style="color:#000000;">Saldo:</b> <span style="color:#000000;">R$ 310,00</span>
                            </div>
                        </div>
                  </div>

              </div>
              </td>
              <td valign="top">
              		<div id="extrato_catg">
                    	dsa
                    </div>
              </td>
            </tr>
          </table>
    </div>
    </form>

<!-- Drop PopUp-->
<div id="pop_alerta" title="Mensagem do Sistema">
	<table align="center" width="300" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td style="padding:5px;"><img src="images/icons/alert2.png" /></td>
        <td class="txt" align="left">Tem certeza que deseja <b>excluir</b> o(s) item(s) selecionado(s)?</td>
      </tr>
    </table>
</div>

<div id="pop_success" title="Mensagem do Sistema">
	<table align="center" width="260" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td style="padding:5px;"><img src="images/icons/alerta_success.png" /></td>
        <td class="txt" align="left" style="font:12px Tahoma;">O contato foi <b>inserido</b> com sucesso!</td>
      </tr>
    </table>
</div>

</body>
</html>