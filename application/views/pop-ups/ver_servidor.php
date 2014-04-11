<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	$('#list_estados_add').combobox({
		editable:false,
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			$('#list_cidades_add').combobox({
				editable:false,
				mode:'remote',
				enabled:true,		
				url: "<?=site_url()?>/json/lista_cidades/" + newValue,
				valueField:'CODIGO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
	$("[name='STATUS']").click(function(){
		alert($("#form_EditProdutos").serialize());
	});
	/*
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	*/
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	
	if($("#add_tipo_pessoa").val() == 'juridica'){
		$("#add_exibe_juridica").show();
		$("#add_exibe_fisica").hide();
	}else{
		$("#add_exibe_fisica").show();
		$("#add_exibe_juridica").hide();
	}
	
	$('input.unique').click(function() {
		$('input.unique:checked').not(this).removeAttr('checked');
		$("#add_tipo_pessoa").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$("#add_exibe_juridica").show();
			$("#add_exibe_fisica").hide();
		}else{
			$("#add_exibe_fisica").show();
			$("#add_exibe_juridica").hide();
		}
		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	
	
});

</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
        <li><a href="#tabs-2">Configurações do Módulo</a></li>
    </ul>
    <form id="form_EditServidor" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 

        <fieldset>
        <div class="line">
            <div style=" float:left;">
            	<label style=" float:left; width:240px;">
                	Descrição<br/>
                <input name="DESCRICAO" type="text" value="<?=$servidor->DESCRICAO?>" class="textfield-text" style="width:220px;" />
                </label>
                
                <label style=" float:left; width:300px;">
                	Sistema Operacional<br/>
                	<select name="OS" class="easyui-combobox" panelHeight="auto" style="width:260px;">
                    	<option value=""></option>
                        <option <?=($servidor->OS == "windows")? 'selected="selected"' : ''?> value="windows">Microsoft Windows</option>
                        <option <?=($servidor->OS == "linux")? 'selected="selected"' : ''?> value="linux">Linux</option>     
                    </select>
                </label>
            </div>               
        </div>

        <div class="line">
            <div style=" float:left;">
            	<label style=" float:left; width:145px;">
                	IP<br/>
                <input name="IP" type="text" value="<?=$servidor->IP?>" class="textfield-text" style="width:130px;" />
                </label>
                
                <label style=" float:left; width:275px;">
                	Fornecedor<br/>
                   <select name="FORNECEDOR" class="easyui-combobox" panelHeight="auto" style="width:260px;">
                   	<?php foreach($fornecedores as $contato):?>
                    	<option <?=($servidor->FORNECEDOR == $contato->CODIGO)? 'selected="selected"' : ''?> value="<?=$contato->CODIGO?>"><?=$contato->RAZAO_NOME?></option>
                    <?php endforeach;?>
                    </select>
                </label>
                <label style=" float:left; width:125px; margin-right:0px">
                	Custo R$<br/>
                <input name="CUSTO" type="text" value="<?=$servidor->CUSTO?>" class="textfield-text" style="width:110px;" />
                </label>
            </div>               
        </div>
        </fieldset>
        
        <fieldset><legend>Configurações de DNS</legend>
            <div class="line">
                <div style="float:left; width:100%; overflow:auto;">
                    <table width="99%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
                      <tr class="tr_sim">
                        <th width="25%" >&nbsp;</th>
                        <th width="20%" ><b>Nome do servidor</b></th>
                        <th width="20%" ><b>IP</b></th>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Primário</td>
                        <td align="center"> <input name="NOME_DNS_1" type="text" class="textfield-text" style=" margin:0px;" value="<?=$servidor->NOME_DNS_1?>" /></td>
                        <td align="center"> <input name="IP_DNS_1" type="text" class="textfield-text" style="width:90%; margin:0px;" value="<?=$servidor->IP_DNS_1?>" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 1</td>
                        <td align="center"> <input name="NOME_DNS_2" type="text" class="textfield-text" style=" margin:0px;" value="<?=$servidor->NOME_DNS_2?>" /></td>
                        <td align="center"> <input name="IP_DNS_2" type="text" class="textfield-text" style="width:90%; margin:0px;" value="<?=$servidor->IP_DNS_2?>" /></td>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Secundário 2</td>
                        <td align="center"> <input name="NOME_DNS_3" type="text" class="textfield-text" style=" margin:0px;"  value="<?=$servidor->NOME_DNS_3?>"/></td>
                        <td align="center"> <input name="IP_DNS_3" type="text" class="textfield-text" style="width:90%; margin:0px;" value="<?=$servidor->IP_DNS_3?>" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 3</td>
                        <td align="center"> <input name="NOME_DNS_4" type="text" class="textfield-text" style="margin:0px;" value="<?=$servidor->NOME_DNS_4?>" /></td>
                        <td align="center"> <input name="IP_DNS_4" type="text" class="textfield-text" style="width:90%; margin:0px;" value="<?=$servidor->IP_DNS_4?>" /></td>
                      </tr>
                      
                    </table>
                </div>
                </div>
        </fieldset>
        
    </div><!-- /Inicio-->
    
    <div id="tabs-2" style="height:400px; overflow:hidden;">
    
    	<fieldset>
        <div class="line">
        <div style="float:left; width:550px;">
        	<label style="display:block; overflow:auto;">Usuário
                <br />
                <input name="SERV_USER" type="text" class="textfield-text" value="<?=$servidor->SERV_USER?>" style="width:220px; margin:0px;" />
            </label>
            
            <label style="display:block; overflow:auto;">Senha
                <br />
                <input name="SERV_PASS" type="password" class="textfield-text" value="<?=$servidor->SERV_PASS?>" style="width:220px; margin:0px;" />
            </label>
            
            <label style="display:block; overflow:auto;">Tipo
            <br />
            
            <select name="MODULO" class="easyui-combobox" panelHeight="auto" style="width:220px;">
                <option value=""></option>
                <option <?=($servidor->MODULO == "cpanel")? 'selected="selected"' : ''?> value="cpanel">cPanel / WHM</option>
                <option <?=($servidor->MODULO == "plesk")? 'selected="selected"' : ''?> value="plesk">Plesk</option>     
            </select>
            </label>
            
            <label style="display:block; overflow:auto;">Limite de contas
                <br />
                <input name="LIMITE_CONTAS" type="text" class="textfield-text" value="<?=$servidor->LIMITE_CONTAS?>" style="width:220px; margin:0px;" />
            </label>
            
			<label style="display:block; overflow:auto;">Senha HASH
                <br />
                <textarea name="SERV_HASH" style="width:550px; height:200px; resize:none;"><?=$servidor->SERV_HASH?></textarea>
            </label>
            
        </div><!-- ./line1 -->
        
        </div>
        </fieldset>
        <input name="CODIGO" type="hidden" value="<?=$servidor->CODIGO?>" />
    
    </div><!-- /Inicio-->
    </form>
</div><!-- /.easyui-tabs -->