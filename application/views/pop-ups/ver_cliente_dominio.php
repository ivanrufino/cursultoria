<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	
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
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatIP").mask("999.999.999.999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	
});

</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
    </ul>
    <form id="form_EditClienteDominio" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 
    	<input type="hidden" name="CODIGO" id="id_cadastro" value="<?=$xml->CODIGO?>"/>
        <fieldset>
        <div class="line">

            <label>Domínio<br />
                <input value="<?=$xml->DOMINIO?>" name="DOMINIO" type="text" class="textfield-text" style="width:240px;" />
           </label>
            
            <label>Registrante<br />
                <select name="REGISTRANTE" class="easyui-combobox" panelHeight="auto" style="width:180px;">
                    <option value=""></option>
                    <option <?=($xml->REGISTRANTE == "manual") ? 'selected="selected"' : '';?> value="manual">** MANUAL **</option>
                    <option <?=($xml->REGISTRANTE == "resellerclub") ? 'selected="selected"' : '';?> value="resellerclub">ResellerClub</option>
                    <option <?=($xml->REGISTRANTE == "resellbiz") ? 'selected="selected"' : '';?> value="resellbiz">Resell.biz</option>
                    <option <?=($xml->REGISTRANTE == "enom") ? 'selected="selected"' : '';?> value="enom">eNom</option>
                    <option <?=($xml->REGISTRANTE == "opensrs") ? 'selected="selected"' : '';?> value="opensrs">OpenSRS</option>
                    <option <?=($xml->REGISTRANTE == "godaddy") ? 'selected="selected"' : '';?> value="godaddy">GoDaddy</option>
				</select>
            </label>
            
            <label>Ciclo<br />
            	<select name="CICLO" class="easyui-combobox" panelHeight="auto" style="width:90px;">
                	<option value=""></option>
                    <option <?=($xml->CICLO == "anual") ? 'selected="selected"' : '';?> value="anual">1 ano(s)</option>
                    <option <?=($xml->CICLO == "bienal") ? 'selected="selected"' : '';?> value="bienal">2 ano(s)</option>
                    <option <?=($xml->CICLO == "trienal") ? 'selected="selected"' : '';?> value="trienal">3 ano(s)</option>
				</select>
                
            </label>
        </fieldset>
        
         <fieldset><legend>Configurações de DNS</legend>
            <div class="line">
                <div style="float:left; width:100%; overflow:auto;">
                    <table width="99%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
                      <tr class="tr_sim">
                        <th width="25%" >&nbsp;</th>
                        <th width="20%" ><b>Nome do servidor</b></th>
                        <th width="25%" ><b>IP</b></th>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Primário</td>
                        <td align="center"> <input name="NS1" type="text" class="textfield-text" style=" margin:0px;" value="<?=$xml->NS1?>" /></td>
                        <td align="center"> <input name="IP1" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="<?=$xml->IP1?>" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 1</td>
                        <td align="center"> <input name="NS2" type="text" class="textfield-text" style=" margin:0px;" value="<?=$xml->NS2?>" /></td>
                        <td align="center"> <input name="IP2" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="<?=$xml->IP2?>" /></td>
                      </tr>
                      <tr>
                        <td class="extrato">Servidor Secundário 2</td>
                        <td align="center"> <input name="NS3" type="text" class="textfield-text" style=" margin:0px;"  value="<?=$xml->NS3?>"/></td>
                        <td align="center"> <input name="IP3" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="<?=$xml->IP3?>" /></td>
                      </tr>
                      <tr class="tr_sim">
                        <td class="extrato">Servidor Secundário 3</td>
                        <td align="center"> <input name="NS4" type="text" class="textfield-text" style="margin:0px;" value="<?=$xml->NS4?>" /></td>
                        <td align="center"> <input name="IP4" type="text" class="textfield-text formatIP" style="width:90%; margin:0px;" value="<?=$xml->IP4?>" /></td>
                      </tr>
                      
                    </table>
                </div>
			</div>
            
            <div class="line" style=" float:left; margin-top:20px;">
                <label>Cliente Desde 
                    <br />
                    <input value="<?=dateFormat($xml->DATA, "d/m/Y")?>" disabled="disabled" type="text" class="textfield-text" style="width:105px;" />
                </label>
                
                <label>Próx. Vencimento
                    <br />
                    <input value="<?=dateFormat($xml->VENCIMENTO, "d/m/Y")?>" name="VENCIMENTO" type="text" class="textfield-text" style="width:105px;" />
            	</label>
            </div>
            <div class="line" style=" float:right; text-align:right; margin-top:40px;">
            	
                 <p style=" float:right; font-size:11px; line-height:16px; color:#666;">
                    <font style="font-size:12px;">Para: <a id="6" rel="exibeCliente"><b><?=$cliente->RAZAO_NOME?></b> <i class="icon-user"></i></a></font><br />
                    <?=$cliente->EMAIL?>
                </p>
            </div>    
        </fieldset>
        
    </div><!-- /Inicio-->

    </form>
</div><!-- /.easyui-tabs -->