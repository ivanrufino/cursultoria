<!-- Step 1 -->

<form id="form_step1" class="steps" name="steps" method="post">
<div style=" width:690px; margin: 0 10px; float:right; ">
    
    <div style="height:40px; display:block; padding-top:10px; border-bottom:1px dotted #e8e8e8;">
        <b style="font:28px Franklin Gothic Medium Cond, sans-serif; font-weight:normal; color:<?=$cor_default;?>; float:left; text-transform:uppercase;">Processo de Contratação &nbsp;(1/4)</b>
    </div>
    
    <div class="titulo_operacao borda">
       O serviço selecionado requer um domínio, por favor informe-o
        <a class="info" href="#">O que é?</a>
    </div>
    <?php
    $existeDom = $this->dominios->getAll();
    ?>
    <table width="100%" id="registro" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%"><input name="registrar" <?=($existeDom == NULL)? 'disabled="disabled"': '';?> id="registra_sim" type="radio" value="sim" /></td>
        <td>
            <label for="registra_sim">Contratar o serviço e registrar o meu domínio.</label>
            <span>Crie um novo endereço para o seu site e aproveite as nossas promoções</span>
        </td>
      </tr>
      <tr>
        <td width="2%"><input name="registrar" id="registra_nao" type="radio" value="nao" /></td>
        <td>
            <label for="registra_nao">Apenas contratar o serviço, já possuo um domínio registrado.</label>
            <span>Já tem o seu domínio registrado? Então contrate agora!</span>
        </td>
      </tr>

    </table>
    
    <div class="titulo_registro" style="margin-top:20px;">
        <b class="left">Informe o domínio que deseja utilizar</b>                    
            <div class="box_input_registro borda5px" style="overflow:auto;">
                <div style="float:left; height:44px; line-height:40px;">
                	www.
                	<input id="domain" style="margin-bottom: 0px;" type="text" />
                </div>
                <div id="select_extensao" style=" float:right; clear:right;"></div>
            </div>
            <a id="submit_whois" class="form_submit borda5px">Verificar Disponibilidade</a>
            <input name="dominio" id="dominio_copia" type="hidden" value="" />
            <div class="registro_txt_resposta"></div>
        
    </div>
    
    <div id="tab_precos_dominios" style="display:none;"></div>
    
    <a class="continuar_submit borda5px">Continuar</a>

    
</div>
</form>