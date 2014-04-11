<?php $this->load->view('json/frontend');?>
<script type="text/javascript">
$(document).ready(function () {  
	$(".password_adv").passStrength({
		shortPass: 		"top_shortPass",
		badPass:		"top_badPass",
		goodPass:		"top_goodPass",
		strongPass:		"top_strongPass",
		baseStyle:		"top_testresult",
		userid:			".pstrength",
		messageloc:		0
	});
	

	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	

});
</script>

<div class="modal-header" style="background-color:#<?php echo$cor_default?>">
    <a type="button" class=" close" rel="fecharModal" data-dismiss="modal" aria-hidden="true">×</a>
    <h3 id="myModalLabel"><b>Mudar senha de acesso</b></h3>
</div>
<div class="modal-body">
    <div id="tipoPagamento">
        <form id="trocaSenhaCliente" method="post">
        		<div class="control-group">
                  <label class="control-label" for="SENHA_ATUAL">Senha Atual:</label>
                  <div class="controls">
                    <input type="password" name="SENHA_ATUAL" id="SENHA_ATUAL"  required class="password" autocomplete="off" />
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="NOVA_SENHA">Nova Senha:</label>
                  <div class="controls">
                    <input type="password" name="NOVA_SENHA" id="NOVA_SENHA"  required class="password_adv" autocomplete="off" />
                  </div>
                  <div class="pstrength"></div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="CONFIRMA_SENHA">Confirme a nova senha:</label>
                  <div class="controls">
                    <input type="password" name="CONFIRMA_SENHA" id="CONFIRMA_SENHA"  required class="password_adv" autocomplete="off" />
                  </div>
                  <div class="pstrength"></div>
                </div>

        </form>
    </div>
    

</div>
<div class="modal-footer">
	<a rel="fecharModal" class="btn">Cancelar</a>
    <button class="btn btn-success btSubmitSenhaCliente"data-loading-text="Carregando...">Alterar</button>
    
    
</div>