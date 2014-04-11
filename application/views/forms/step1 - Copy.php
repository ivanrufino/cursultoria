<!-- Step 1 -->

<form id="form_step1" class="steps" name="steps" method="post">
<div style=" width:690px; margin-right:10px; float:right; ">
    
    <div style="height:40px; display:block; padding-top:10px; border-bottom:1px dotted #e8e8e8;">
        <b style="font:28px Franklin Gothic Medium Cond, sans-serif; font-weight:normal; color:<?=$cor_default;?>; float:left; text-transform:uppercase;">Processo de Contratação &nbsp;(1/4)</b>
    </div>
    
    <div class="titulo_operacao borda">
        Domínio da hospedagem:
        <a class="info" href="#">O que é?</a>
    </div>
    
    
    <table width="100%" id="registro" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%"><input name="registrar" id="plano_1" type="radio" value="sim" /></td>
        <td>
            <label for="plano_1">Contratar o serviço e registrar o meu domínio.</label>
            <span>Crie um novo endereço para o seu site e aproveite as nossas promoções</span>
        </td>
      </tr>
      <tr>
        <td width="2%"><input name="registrar" id="plano_2" type="radio" value="nao" /></td>
        <td>
            <label for="plano_2">Apenas contratar o serviço, já possuo um domínio registrado.</label>
            <span>Já tem o seu domínio registrado? Então contrate agora!</span>
        </td>
      </tr>

    </table>
    <div class="titulo_registro" style="margin-top:20px;">
        <b class="left">Informe o domínio que deseja utilizar</b>                    
            <div class="box_input_registro borda5px">
                www.
                <input id="domain" name="dominio" type="text" />
                <select id="ext" name="extensao">
                    <option value=".com.br">.com.br</option>
                    <option value=".com">.com</option>
                    <option value=".net">.net</option>
                </select>
            </div>
            <a id="submit_whois" class="form_submit borda5px">Verificar Disponibilidade</a>
            <div class="registro_txt_resposta"></div>
        
    </div>
    
    <a class="continuar_submit borda5px">Continuar</a>
    <a href="#" class="voltar_submit">voltar</a>

    
</div>
</form>