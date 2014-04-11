<script type="text/javascript">
$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	$('#list_estados_add').combobox({
		editable:false,
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			$('#list_cidades_add').combobox({
				editable:false,
				mode:'remote',
				enabled:true,		
				url: "<?=site_url()?>/json/lista_cidades/" + newValue,
				valueField:'CODIGO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
	$("[name='STATUS']").click(function(){
		alert($("#form_EditProdutos").serialize());
	});
	/*
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	*/
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	
	if($("#add_tipo_pessoa").val() == 'juridica'){
		$("#add_exibe_juridica").show();
		$("#add_exibe_fisica").hide();
	}else{
		$("#add_exibe_fisica").show();
		$("#add_exibe_juridica").hide();
	}
	
	$('input.unique').click(function() {
		$('input.unique:checked').not(this).removeAttr('checked');
		$("#add_tipo_pessoa").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$("#add_exibe_juridica").show();
			$("#add_exibe_fisica").hide();
		}else{
			$("#add_exibe_fisica").show();
			$("#add_exibe_juridica").hide();
		}
		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	
	$('input[id=lefile]').change(function() {
	   $('#photoCover').val($(this).val());
	   
	});
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
				
				var largura = $('#img_prev').width();
				var altura = $('#img_prev').height();
				
				$('#img_prev').attr('src', e.target.result);								
				$("#data_prev").html("<b>Tamanho:</b> "+largura+"x"+altura+" px");			
		};

		reader.readAsDataURL(input.files[0]);
	}
}
</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
    </ul>
    <form id="form_addDocumentos" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 

        <fieldset>
        <div class="line">
            <div style=" float:left;">
            	<label style=" float:left; width:450px;">
            
                    <input id="lefile" name="arquivo" type="file" style="display:none;" />
                    <span style="">Selecione o arquivo</span>
                    <div class="input-append" style="margin-top:5px;">
                       <input id="photoCover" style="width:360px; height:22px;" class="input-large textfield-text" type="text">
                       <a class="btn" onclick="$('#lefile').click();">Arquivo</a>
                    </div>
                    <p style="line-height:16px; font:11px Arial; color:#888;">
                        Tamanho máximo: 2 MB
                    </p>
                </label>  
                
                
            </label>  
            	
            </div>               
        </div>

        <div class="line" style=" display:block;">
        	<label style=" float:left; width:70px;">
                Código<br/>
                <input name="CODIGO_ID" type="text" class="textfield-text" style="width:60px;" />
            </label>  
            <label style=" float:left; width:310px;">
                	Título<br/>
                	<input name="TITULO" type="text" class="textfield-text" style="width:300px;" />
                </label>
            
            <label style=" float:left; width:40px;">
                Revisão<br/>
                <input name="REVISAO" type="text" class="textfield-text" style="width:40px;" />
            </label>         
        </div>
        
        	<div class="line" style=" float:right; margin-top:10px;"> 
        		<label style=" float:left;">Tipo de acesso</label>
                <div class="btn-group" data-toggle="buttons-radio">  
                  <button id="pessoa_fisica" type="button" data-toggle="button" value="publico" class="btn unique active"><i class="icon-globe"></i> Público</button>
                  <button id="pessoa_juridica" type="button" data-toggle="button" value="administrador" class="btn unique"><i class="icon-user"></i> Administrador</button>
                  <button id="pessoa_juridica" type="button" data-toggle="button" value="privado" class="btn unique"><i class="icon-eye-close"></i> Por usuário</button>
                </div>  
        	</div>
        
    </div><!-- /Inicio-->
    </fieldset>
    <input type="hidden" name="GRUPO_ACESSO" value="" />
    </form>
</div><!-- /.easyui-tabs -->