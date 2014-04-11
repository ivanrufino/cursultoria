<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	
	$('.getUsuarios').multiSelect();
	
	$('[rel="addItens"]').live('click',function(){

		var linha = '<tr class="td_line itens" style="background:#eee;">';
				linha += '<td style="padding:3px;">';
					linha += '<select name="COD_USUARIO" class="easyui-combobox getUsuarios" style="width:410px;"></select>';
				linha += '</td>';
				
				linha += '<td style="width:16px;"><img src="<?=site_url()?>/assets/img/icons/cancel.png" class="deleteItem" /></td>';
			linha += '</tr>';
				
		$("#campos").append(linha);
		return false;
	});
	
	$('.deleteItem').live('click', function(){
		$(this).parent().parent('.itens').remove();
		return false;
	});
});

</script>
<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Grupo</a></li>
    </ul>
    <form id="form_addGrupoUsuarios" name="form_add" method="post" action="" style="overflow-y:visible;">
        <div id="tabs-1" style="height:300px; overflow-y:scroll;"> 
            <fieldset>
                <label>Nome<br/>
                	<input type="text" name="DESCRICAO" class="textfield-text" style="width:200px" />
                </label>
                <label style="margin-right:0px;"">E-mail<br/>
                	<input type="text" name="EMAIL" class="textfield-text" style="width:240px;"/>
                </label>
            </fieldset>
            <fieldset style="margin-bottom: 5px !important;"><legend>Usuários do grupo</legend>
            <div class="line">

                <table width="100%" class="ui-widget ui-widget-content" style="border: 0px dotted #ccc !important; ">
                    <tbody id="campos">
                        <tr class="td_line" style="background:#eee;">
                            <td style="padding:3px;">
                            	<select name="COD_USUARIO[]" class="getUsuarios" multiple='multiple' style="width:410px;">
                                	<?php foreach($usuarios as $usuario):?>
                                	<option value="<?=$usuario->CODIGO?>"><?=$usuario->NOME?></option>
                                	<?php endforeach;?>
                                </select>
                            </td>

                            <td></td>
                        </tr>       
                    </tbody>
                </table>
            </div>

            </fieldset>
        </div>
    </form>
</div>