<script type="application/javascript">
	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	
	$("#btCancelaDominio_central").click(function(){
		$(this).submitCancelamento();
	});
	
</script>

<div class="modal-header" style="background-color:#<?php echo $cor_default?>">
        <a type="button" class=" close" rel="fecharModal" data-dismiss="modal" aria-hidden="true">×</a>
        <h3 id="myModalLabel"><b>Cancelar domínio</b></h3>
    </div>
    <div class="modal-body">
		
        <div class="alert">
        <form id="form_cancelamentoServico" method="post" >
        	<input type="hidden" value="<?=$servico->CODIGO?>" />
        	<div id="infCancelamento">
                <span>
                    Você solicitou a exclusão do domínio:<br />
                </span>
                <div id="dominioCancelar">
                	<?=$servico->DOMINIO?>
                </div>
                <span><b>ESTA OPERAÇÃO É IRREVERSÍVEL</b></span><br/>
                <span>Tem certeza de que deseja excluir ?</span>
                <li>Todos os <b>arquivos</b> (permanentemente removidos)</li>
                <li>Todos os <b>emails</b></li>
                <li>Todos os <b>backups</b> do domínio</li>
            </div><!--infCancelamento-->
            
            <div id="icon_alertCancelamento">
            
            </div><!--icon_alertCancelamento-->
            
        </div>
        
    </div>
    <div class="modal-footer">
    	<a rel="fecharModal" class="btn btn-danger">Fechar</a>
        <button class="btn btn-success" id="btCancelaDominio_central">Cancelar</button>
        </form>
    </div>