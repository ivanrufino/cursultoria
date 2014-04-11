<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$('[name="PRIVACIDADE"]').attr("value",$(this).val());		
	});
});
</script>


<form id="edit_suporteDepartamentos" name="form_edit" method="post" action="">
<div style="padding:10px;">
<div class="line">
            <label>Nome do Departamento
                <br />
                <input name="DESCRICAO" type="text" class="textfield-text" value="<?=$depto->DESCRICAO?>" style="width:280px;" />
            </label>
            
            <input type="hidden" name="PRIVACIDADE" value="<?=$depto->PRIVACIDADE?>" />
            <input type="hidden" name="CODIGO" value="<?=$depto->CODIGO?>" />
            
            <label>Privacidade
                <br />
                <div class="btn-group" data-toggle="buttons-radio">  
                  <button style="height:30px;" type="button" data-toggle="button" value="publico" class="btn unique <?=($depto->PRIVACIDADE == 'publico')? 'active' : ''?>">
                    <i class='icon-globe'></i>Público
                  </button>
                  <button style="height:30px;" type="button" data-toggle="button" value="privado" class="btn unique <?=($depto->PRIVACIDADE == 'privado')? 'active' : ''?>">
                    <i class='icon-user'></i>Privado
                  </button>
                </div>            
            </label>
        </div>
            
        
        <div class="line">

            <label>E-mail do Departamento
                <br />
                <input name="EMAIL" class="textfield-text" type="text" value="<?=$depto->EMAIL?>" style="width:250px;" />
            </label>
            
            <label>Grupo de Usuários
                <br />
                <select name="GRUPO_USUARIOS" id="list_estados_edit" class="easyui-combobox" style="width:175px;">                	
                    <option value="1" <?=($depto->GRUPO_USUARIOS == '1')? 'selected="selected"' : ''?>>Suporte</option>
                    <option value="2" <?=($depto->GRUPO_USUARIOS == '2')? 'selected="selected"' : ''?>>Financeiro</option>
                    <option value="3" <?=($depto->GRUPO_USUARIOS == '3')? 'selected="selected"' : ''?>>Comercial</option> 
                </select>
            </label>
        </div>
        

        <div class="line" style="margin-top:5px; float:left; overflow:auto;">
        	<legend>Configurações de Importação POP3</legend>
            
            <label>Servidor
                <br />
                <input name="MAIL_SERVIDOR" class="textfield-text" type="text" value="<?=$depto->MAIL_SERVIDOR?>" style="width:355px;" />
            </label>
            
            <label>Porta
                <br />
                <input name="MAIL_PORTA" class="textfield-text" type="text" value="<?=$depto->MAIL_PORTA?>" style="width:70px;" />
            </label>
            
            <label>Usuário
                <br />
                <input name="MAIL_USUARIO" class="textfield-text" type="text" value="<?=$depto->MAIL_USUARIO?>" style="width:245px;" />
            </label>
            
            <label>Senha
                <br />
                <input name="MAIL_SENHA" class="textfield-text" type="password" value="<?=$depto->MAIL_SENHA?>" style="width:180px;" />
            </label>
            
        </div>
</div>