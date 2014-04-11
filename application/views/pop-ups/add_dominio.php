<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-numberspinner').numberspinner();
	
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
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	
});

</script>


<div id="detalheDominio">
	<form id="form_addDominio" name="form_add" method="post" action="">
    	<input type="hidden" name="COD_CHAVE" value="<?=$this->session->userdata('userKey')?>" />
        <fieldset>
            <div class="line">
                <label class="extensao">
                    Extensão
                    <br />
                     <input type="text" name="EXTENSAO" class="textfield-text" style="width:100px; font-weight:bold;" />
                </label>
                <label style=" float:left; width:320px">
                    Registrante
                    <br />
                     <select name="REGISTRANTE" class="easyui-combobox" panelHeight="auto" style="width:300px;">
                        <option value=""></option>
                        <option value="manual">** MANUAL **</option>
                        <option value="resellerclub">ResellerClub</option>
                        <option value="resellbiz">Resell.biz</option>
                        <option value="enom">eNom</option>
                        <option value="opensrs">OpenSRS</option>
                        <option value="godaddy">GoDaddy</option>
                        <option value="uolhost">UOLHOST</option>
                        
                    </select>
                </label>
            </div>
        </fieldset>
        
        <fieldset><legend>Informações de Preço</legend>
            <div class="line">
                <div style="float:left; width:100%; overflow:auto;">
                    <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
                      <tr class="tr_sim">
                        <th class="extrato" width="15%"><b>Custo</b></th>
                        <th width="15%"><b>Registrar</b></th>
                        <th width="15%"><b>Transferir</b></th>
                        <th width="15%" class="final"><b>Renovar</b></th>
                      </tr>
                      <tr>
                        <td class="extrato" align="center"> <input name="VALOR_CUSTO" type="text" class="textfield-text formatMONEY" style="width:75px; margin:0px;" /></td>
                        <td align="center"> <input name="VALOR_REGISTRAR" type="text" class="textfield-text formatMONEY" style="width:75px; margin:0px;" /></td>
                        <td align="center"> <input name="VALOR_TRANSFERIR" type="text" class="textfield-text formatMONEY" style="width:75px; margin:0px;" /></td>
                        <td class="final" align="center"> <input name="VALOR_RENOVAR" type="text" class="textfield-text formatMONEY" style="width:75px; margin:0px;" /></td>
                      </tr>
                      
                    </table>
                </div>
                
                <p style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">Atenção: </b> Lembre-se que ao editar os valores de um plano caso ele já esteja vinculado a algum pedido / fatura, os mesmos não serão alterados em lançamentos financeiros já efetuados.</p>
            </div>
        </fieldset>

        </form>
    </div>
</div>