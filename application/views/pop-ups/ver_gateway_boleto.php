<script type="text/javascript">
$(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	
	
	function somenteNumeros(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	}
	$('[name="CONTA"]').keypress(somenteNumeros);
	$('[name="AGENCIA"]').keypress(somenteNumeros);
});
</script>


<p style="padding:10px; color:#666;">
	Para receber pagamentos via boleto, sua conta bancária deve estar habilitada para este tipo de recebimento, entre em contato com o gerente/banco e informe que deseja receber pagamentos via boleto.
</p>


<form id="form_gatewayBoleto" class="form_editPopUp" method="post" action="" style="margin-top:-10px;">
    <fieldset>
        <div class="line">
            <div style=" float:left;">
            	<input name="COD_CHAVE" type="hidden" value="<?=$userKey?>" />
                <label style=" float:left;">
                    Banco<br/>
                    <select name="BANCO"  class="easyui-combobox" panelHeight="auto" style="width:320px; color:#fff;">
                    	<option value=""> </option>
                        <option value="237" <?=($dados != NULL && $dados->BANCO == "237")? 'selected="selected"' : "";?>>237 - Banco Bradesco S.A.</option>
                        <option value="356" <?=($dados != NULL && $dados->BANCO == "356")? 'selected="selected"' : "";?>>356 - Banco Real S.A.</option>
                        <option value="341" <?=($dados != NULL && $dados->BANCO == "341")? 'selected="selected"' : "";?>>341 - Itaú Unibanco S.A.</option>
                        <option value="399" <?=($dados != NULL && $dados->BANCO == "399")? 'selected="selected"' : "";?>>399 - HSBC Bank Brasil S.A.</option>
                        <option value="104" <?=($dados != NULL && $dados->BANCO == "104")? 'selected="selected"' : "";?>>104 - Caixa Econômica Federal</option>
                    </select>
                </label>
            </div>
            <div style=" float:left;">
                <label style=" float:left; width:60px;">
                    Carteira<br/>
                    <input name="CARTEIRA" type="text" value="<?=($dados != NULL)? $dados->CARTEIRA : "";?>" class="textfield-text" style="width:55px;" />
                </label>                    
            </div>             
        </div>

        <div class="line">
            <div style=" float:left;">
                <label style=" float:left; width:85px;">
                    Agência<br/>
                    <input name="AGENCIA" type="text" value="<?=($dados != NULL)? $dados->AGENCIA : "";?>" class="textfield-text" style="width:70px;" />
                </label>                    
            </div>
            <div style=" float:left;">
                <label style=" float:left; width:105px;">
                    Conta<br/>
                    <input name="CONTA" type="text" value="<?=($dados != NULL)? $dados->CONTA : "";?>" class="textfield-text" style="width:90px;" />
                </label>                    
            </div>
            <div style=" float:left;">
                <label style=" float:left; width:125px;">
                    Cod. Cedente<br/>
                    <input name="CEDENTE" type="text" value="<?=($dados != NULL)? $dados->CEDENTE : "";?>" class="textfield-text" style="width:110px;" />
                </label>                    
            </div>
            <div style=" float:left;">
                <label style=" float:left; width:60px;">
                    Taxa<br/>
                    <input name="TAXA" type="text" value="<?=($dados != NULL)? $dados->TAXA : "";?>" class="textfield-text formatMONEY" style="width:55px;" />
                </label>                    
            </div>
        </div>
        
    </fieldset>
    <fieldset><legend>Instruções do Boleto</legend>
		<div class="line">
            <div style=" float:left;">
                <input name="INSTRUCAO1" type="text" value="<?=($dados != NULL)? $dados->INSTRUCAO1 : "";?>" placeholder="Instruções 1" class="textfield-text" style="width:410px;" />
                <input name="INSTRUCAO2" type="text" value="<?=($dados != NULL)? $dados->INSTRUCAO2 : "";?>" placeholder="Instruções 2" class="textfield-text" style="width:410px; margin-top:5px;" />
                <input name="INSTRUCAO3" type="text" value="<?=($dados != NULL)? $dados->INSTRUCAO3 : "";?>" placeholder="Instruções 3" class="textfield-text" style="width:410px; margin-top:5px;" />
            </div>
		</div>
    </fieldset>
</form>

<div class="alert" style=" margin:0 10px; font:12px Arial; padding:8px;">
	A confirmação de pagamento em boleto deverá ser feito <b>manualmente</b>.
</div>