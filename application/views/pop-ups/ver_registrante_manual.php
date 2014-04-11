<p style="padding:10px; color:#666;">
	Você pode configurar um email válido de sua preferência para receber as notificações de registros de domínio a serem configurados <b>manualmente</b>.
</p>

<form id="form_editRegistrante" name="form_add" method="post" action="">
    <fieldset>

        <div class="line">
            <div style=" float:left; margin-left:10px;">
                <label style=" float:left; width:320px;">
                     E-mail de Notificação<br/>
                    <input name="EMAIL" type="text" value="<?=($dados['email'] != NULL)? $dados['email'] : "";?>" class="textfield-text" style="width:315px;" />
                    <input name="COD_CHAVE" type="hidden" value="<?=userKey()?>" />
                    <input name="REGISTRANTE" type="hidden" value="manual" />
                </label>                    
            </div>               
        </div>
        
    </fieldset>   
</form>
