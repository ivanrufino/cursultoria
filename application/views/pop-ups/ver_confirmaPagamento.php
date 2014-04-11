<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('[name="DATA"]').datebox();
	$('.easyui-combobox').combobox();

});
</script>
<div style="padding:5px;">
    <div id="pedido_header">
        <div class="pedido_numero" style="padding-top:8px;">
            <b>Fatura #<?=$fatura->CODIGO?></b>
        </div>
        <b class="tag_black pedido_status">R$ <?=numFormat($fatura->VALOR)?></b>
    </div>
    
    <div class="line" style="width:355px; overflow:auto; margin-right:0px; margin-top:10px;">
    	<form id="form_confirmaPagto" method="post">
        	<input type="hidden" name="FATURA" value="<?=$fatura->CODIGO?>" />
            <label>Data
                <br />
                <input name="DATA" type="text" value="<?=date('d/m/Y')?>" class="formatDATE" style="width:120px;" />
            </label>
            
            <label style="margin-right:0px;">Forma de Pagamento
                <br />
                <select name="FORMA_PAGTO" class="easyui-combobox" panelHeight="auto" style="width:195px;">
                    <option value="boleto">Boleto</option>
                    <option value="transferencia">Transferência Bancária</option>
                    <option value="cheque">Cheque</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
            </label>
        </form>
    </div>

</div>