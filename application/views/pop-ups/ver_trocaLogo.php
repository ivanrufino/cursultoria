
<script type="text/javascript">
$(document).ready(function(){
	
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
<script type="text/javascript">
var myPicker = new jscolor.color(document.getElementById('myField1'), {});
</script>

<div style="padding:10px;">
	
    <form id="enviaLogo" method="post" enctype="multipart/form-data">
    
    <table width="100%" border="0">
      <tr>
        <td valign="top" style=" border-bottom:1px dotted #ccc;">
            <input id="lefile" name="logoImage" onchange="readURL(this);" type="file" style="display:none;" />
            <span style="margin-top:10px;">Selecione o seu logotipo</span>
            <div class="input-append" style="margin-top:5px;">
               <input id="photoCover" style="width:240px; height:22px;" class="input-large textfield-text" type="text">
               <a class="btn" onclick="$('#lefile').click();">Arquivo</a>
            </div>
            <p style="line-height:16px; font-size:11px; color:#888;">
            	Formatos permitidos: *.png ou *.gif (transparente)<br />
				<b>Tamanho máximo: 200x70 px</b>
            </p>
        </td>
        <td style=" width:220px; overflow:auto; text-align:center; border-bottom:1px dotted #ccc;">
        	<div class="well" style="padding:5px;">
            	<img id="img_prev" style="margin-top:5px;" src="http://placehold.it/200x70" alt="">
            	<p id="data_prev" style=" margin-top:6px; font-size:11px; color:#888;">
                	Pré-visualização
                </p>
            </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        	<div style="float:left">
                <span style="margin-top:10px;">Cor padrão</span>
                <!--<div class="input-prepend" style="margin-top:5px;">
                  <span class="add-on">#</span>-->
                  <br />
                  <input name="cor_padrao" id="myField1" type="text" value="<?=$this->temas->getCor()?>" class="textfield-text color" style="width:80px; height:22px; margin-top:5px;" />
                <!--</div>-->
                <p style="line-height:16px; font-size:11px; color:#888;">
                    Defina uma cor de sua escolha.<br />
                    Exemplo: "#cc0000"
                </p>
            </div>
            
            <div style="float:right">
        		<img style="margin-top:5px;" src="<?=site_url()?>/assets/images/template_central.jpg" alt="">
            </div>
        </td>
      </tr>
    </table>
    </form>

</div>

<?php //endforeach;?>