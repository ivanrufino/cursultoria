<script type="text/javascript">
$(document).ready(function(){
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();

	$('.easyui-numberspinner').numberspinner();
	
	$('.getClientes').combobox({
		mode:'remote',
		enabled:true,
		url: "<?=site_url()?>/admin/json/getClientes",
		valueField:'CODIGO',  
		textField:'RAZAO_NOME',
		
		panelHeight: 'auto',
		formatter:function(row){  
			return '<span style="font: 13px Open Sans; font-weight:600;"><i class="icon-user"></i>' + row.RAZAO_NOME + '</span><br/>' + 
				'<span style="color:#888; font-size:11px">' + row.EMAIL + '</span>';    
		}
					
	});	
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	$('[rel="trocaStatus"]').click(function(){
		$('[name="STATUS"]').attr("value", $(this).data('id'));
		
		if($('[name="STATUS"]').val() == 1){
			$('li#trocaStatus').html('<a data-id="0" rel="trocaStatus"><i class="icon-ban-circle"></i> Suspender</a>');
		}
		else if($('[name="STATUS"]').val() == 0){
			$('li#trocaStatus').html('<a data-id="1" rel="trocaStatus"><i class="icon-ok"></i> Ativar</a>');
		}
	});
	
	
	if($("#add_tipo_pessoa").val() == 'juridica'){
		$("#add_exibe_juridica").show();
		$("#add_exibe_fisica").hide();
	}else{
		$("#add_exibe_fisica").show();
		$("#add_exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#novo_ciclo").attr("value",$(this).val());		
	});
	
	$(".formatIP").mask("999.999.999.999");
	
});

</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
    </ul>
    <form id="form_addDominioCliente" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 
        <fieldset style=" padding:5px; background: #eee; border: 1px dotted #ccc !important; margin-bottom: 5px !important;">
        <div class="line">
            <label>Cliente<br />
                <select name="CLIENTE" class="easyui-combobox getClientes" style="width:310px;">
                </select>
            </label>
            
            <label>Ciclo<br />
                <select class="easyui-combobox" panelHeight="auto" name="CICLO" style="width:125px;">
                	<option value=""></option>
                    <option value="anual">1 ano(s)</option>
                    <option value="bienal">2 ano(s)</option>
                    <option value="trienal">3 ano(s)</option>
				</select>
            </label>
       
        </div>
        </fieldset>
        
        <fieldset>
        	 <label>Domínio<br />
                <input name="DOMINIO" type="text" class="textfield-text" style="width:260px;" />
            </label>
            <label>Registrante<br />
                <select name="REGISTRANTE" id="codProduto" class="easyui-combobox" panelHeight="auto" style="width:180px;">
                	<option value=""></option>
                    <option value="manual">** MANUAL **</option>
                    <option value="resellerclub">ResellerClub</option>
                    <option value="resellbiz">Resell.biz</option>
                    <option value="enom">eNom</option>
                    <option value="opensrs">OpenSRS</option>
                    <option value="godaddy">GoDaddy</option>
				</select>
            </label>
        </fieldset>   
                 
         <fieldset><legend>Configurações de DNS</legend>
            <div class="line">
                <div style="float:left; width:100%; overflow:auto;">
                    <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
                      <tr class="tr_sim">
                        <th width="25%" >&nbsp;</th>
                        <th width="10%" ><b>Nome do servidor</b></th>
                        <th width="25%" ><b>IP</b></th>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Primário</td>
                        <td align="center"> <input name="NS1" type="text" class="textfield-text" style=" margin:0px;" value="" /></td>
                        <td align="center"> <input name="IP1" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 1</td>
                        <td align="center"> <input name="NS2" type="text" class="textfield-text" style=" margin:0px;" value="" /></td>
                        <td align="center"> <input name="IP2" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="" /></td>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Secundário 2</td>
                        <td align="center"> <input name="NS3" type="text" class="textfield-text" style=" margin:0px;"  value=""/></td>
                        <td align="center"> <input name="IP3" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 3</td>
                        <td align="center"> <input name="NS4" type="text" class="textfield-text" style="margin:0px;" value="" /></td>
                        <td align="center"> <input name="IP4" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="" /></td>
                      </tr>
                      
                    </table>
                </div>
			</div>
           
        </fieldset>
        
    </div><!-- /Inicio-->

    </form>
</div><!-- /.easyui-tabs -->