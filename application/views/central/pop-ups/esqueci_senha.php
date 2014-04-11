<?php $this->load->view('json/frontend');?>
<script type="text/javascript">
$(document).ready(function () {  

	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	

});
</script>

<div class="modal-header" style="background-color:#<?php echo$cor_default?>">
    <a type="button" class=" close" rel="fecharModal" data-dismiss="modal" aria-hidden="true">×</a>
    <h3 id="myModalLabel"><b>Recuperar senha</b></h3>
</div>

<div id="respostaJSON">

<div class="modal-body">
    <div id="tipoPagamento">
        <form id="trocaEsqueciCliente" method="post">
        		<div class="control-group">
                  <label class="control-label" for="EMAIL_LOGIN">Digite o seu e-mail para recuperar a senha</label>
                  <div class="controls">
                    <input type="text" name="EMAIL" id="EMAIL_LOGIN"  required autocomplete="off" />
                    
                  </div>
                </div>

                

        </form>
    </div>

    <div class="modal-footer">
        <a rel="fecharModal" class="btn">Cancelar</a>
        <button class="btn btn-success btSubmitEsqueciSenha"data-loading-text="Carregando...">Próximo</button>    
    </div>

</div>

