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
		$('[name="STATUS"]').attr("value",$(this).val());		
	});
	


	
});
</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
<form id="form_addUsuarios" name="form_edit" method="post" action="">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
        <!--<li><a href="#tabs-2">Restrições</a></li>-->
    </ul>
    
    <div id="tabs-1" style="height:405px; overflow:hidden;"> 
	
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px;">
        	Status
        </div>
        <div class="configCol_right" style="width:270px;">
        	<label>
            	<div class="btn-group" data-toggle="buttons-radio">  
                  <button style="height:30px;" type="button" data-toggle="button" value="1" class="btn unique active">
                    Ativo
                  </button>
                  <button style="height:30px;" type="button" data-toggle="button" value="0" class="btn unique">
                    Inativo
                  </button>
                </div>            
            </label>
            <input type="hidden" name="STATUS" value="1" />
        </div>
    </div>
    
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px;">
        	Nome Sobrenome
        </div>
        <div class="configCol_right" style="width:270px;">
        	<label>
                <input name="NOME" type="text" class="textfield-text" required="required" value="" style="width:250px;" />
            </label>
        </div>
    </div>
    
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px;">
        	E-mail de Login
        </div>
        <div class="configCol_right" style="width:270px;">
        	<label>
                <input name="USUARIO" type="text" class="textfield-text" required="required" value="" style="width:250px;" />
            </label>
        </div>
    </div>
    
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px;">
        	Senha
        </div>
        <div class="configCol_right" style="width:270px;">
        	<label>
                <input name="SENHA" type="password" class="textfield-text" required="required" value="" style="width:120px;" />
            </label>
            <a href="#" style="float:left; margin-top:5px;" class="btn-mini btn-link">Gerar nova senha?</a>
        </div>
    </div>
    
    <div class="line" style=" overflow-x:hidden; display:block;">
    	<div class="configCol_left" style="width:165px; padding-top: 5px;">
        	Permissão
        </div>
        <div class="configCol_right" style="width:280px; height:auto;">
        	<label><input type="checkbox" name="PERMISSAO" value="admin" style="float:left; margin-right:5px;" /><b style="font:12px Lucida Sans, Arial, sans-serif; font-weight:bold;">Esse usuário é Administrador</b><br />
        	<p style="font-size:11px; line-height:16px; color:#666; font-weight:normal; margin-bottom:5px;">O administrador tem acesso a todas as funções. Para realizar restrições desmarque a opção acima.</p></label>
        </div>
    </div>


        
</div>