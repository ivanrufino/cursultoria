<p style="padding:10px; color:#666;">
	Os campos abaixo devem ser preenchidos com as informações referentes ao convênio para integração entre seu painel e o(a) <b>Moip</b>.
</p>

<form id="form_editGateway" name="form_add" method="post" action="">
    <fieldset>
        

        <div class="line">
            <div style=" float:left;">
                <label style=" float:left; width:320px;">
                    Token<br/>
                    <input name="TOKEN" type="text" value="<?=($dados != NULL)? $dados->TOKEN : "";?>" class="textfield-text" style="width:315px;" />
                    <input name="COD_CHAVE" type="hidden" value="<?=$userKey?>" />
                    <input name="GATEWAY" type="hidden" value="moip" />
                </label>                    
            </div>               
        </div>
        
        <div class="line">
            <div style=" float:left;">
                <label style=" float:left; width:320px;margin-right:0px;">
                    Chave de Acesso<br/>
                    <input name="KEY" type="text" value="<?=($dados != NULL)? $dados->KEY : "";?>" class="textfield-text" style="width:325px; " />
                </label>
            </div>               
        </div>
        
        <div class="line">
            <div style=" float:left;  padding:0px; width:370px;">
            	<label style=" float:left;">
                	Checkout transparente
            		<input name="PAGTO_DIRETO" type="checkbox" <?=($dados != NULL && $dados->PAGTO_DIRETO == 1)? 'checked="checked"' : "";?> value="1" style="float:left; margin-right:5px;" />
                    <p style="font-size:11px; font-weight:normal;">Quero que o cliente seja redirecionado direto para o Boleto Moip</p>
                </label>
            </div>
        </div>
    </fieldset>   
</form>