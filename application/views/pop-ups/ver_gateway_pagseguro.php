<p style="padding:10px; color:#666;">
	Os campos abaixo devem ser preenchidos com as informações referentes ao convênio para integração entre seu painel e o(a) <b>PagSeguro</b>.
</p>

<form id="form_editGateway" name="form_add" method="post" action="">
    <fieldset>
        <div class="line">
            <div style=" float:left;">
                <label style=" float:left; width:320px;margin-right:0px;">
                    E-mail do PagSeguro<br/>
                    <input name="EMAIL" type="text" value="<?=($dados['email'] != NULL)? $dados['email'] : "";?>" class="textfield-text" style="width:255px; " />
                </label>
            </div>               
        </div>

        <div class="line">
            <div style=" float:left;">
                <label style=" float:left; width:320px;">
                    Token<br/>
                    <input name="TOKEN" type="text" value="<?=($dados['token'] != NULL)? $dados['token'] : "";?>" class="textfield-text" style="width:315px;" />
                    <input name="COD_CHAVE" type="hidden" value="<?=userKey()?>" />
                    <input name="GATEWAY" type="hidden" value="pagseguro" />
                </label>                    
            </div>               
        </div>
        
    </fieldset>   
</form>

<div class="alert" style=" margin:5px; font:12px Arial; padding:8px;">
  Não sabe como gerar o Token? <a href="https://pagseguro.uol.com.br/integracao/token-de-seguranca.jhtml" target="_blank">
  <b>Saiba mais</b></a>
</div>