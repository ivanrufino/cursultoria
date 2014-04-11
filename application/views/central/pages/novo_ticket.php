<style type="text/css"><?php require('assets/css/central_novo_ticket.css'); ?></style>
<script type="text/javascript">
$(document).ready(function(){
	$('.easyui-combobox').combobox();
	$('#lista_departamentos').combobox({
		mode:'remote',
		enabled:true,
		//panelHeight: 'auto',
		onChange:function(newValue) {
			$('#lista_categorias').combobox({
				mode:'remote',
				enabled:true,	
				url: "<?=site_url()?>admin/json/lista_categoris/" + newValue,
				valueField:'CODIGO',  
				textField:'DESCRICAO'
				//panelHeight: 'auto',
			});	
		}
	});
});
</script>
<style type="text/css">
	.panel {overflow: visible!important;top: 220px!important;}
	.panel .combo-panel{width: 260px!important; position:}
</style>
<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
    <div id="central_tit">Novo Chamado</div>
    <form method="post" class="borda5px" id="submit_novoTicket">
        <input type="hidden" name="RESPONSAVEL" value="" />
        <input type="hidden" name="ATRIBUIDO" value="0" />
        <input type="hidden" value="<?=$this->session->userdata('clienteLogado')?>" name="CLIENTE" />
        <div style=" padding:0px 15px;overflow:auto;padding-top:20px;">
            <label style="float:left; margin-right:15px;">Selecione um departamento <b class="obrigatorio">*</b><br/>
            
                <select name="DEPARTAMENTO" class="easyui-combobox" id="lista_departamentos">
                    <option></option>
                    <?php foreach($dpto as $rs){
                        echo "<option value=".$rs->CODIGO.">".$rs->DESCRICAO."</option>";
                    }?>
                </select>
             </label>
             <label style="float:left;">Selecione uma categoria <b class="obrigatorio">*</b><br/>
             	<select name="CATEGORIA" class="easyui-combobox" id="lista_categorias"></select>
       		 </label>
        </div>

        <div id="campos_novo_ticket">
            <p>Digite seu domínio <span style="color:#999">(Opcional)</span><br/>
                <input type="text" class="easyui-validatebox" style=" width:515px;" name="DOMINIO" /><br/>
                Assunto <b class="obrigatorio">*</b><br/>
                <input type="text" class="easyui-validatebox"  style=" width:515px;" name="TITULO"  />
                <br/>Mensagem <b class="obrigatorio">*</b><br/>
                <textarea class="easyui-validatebox" style=" width:515px; height:150px;" type="text" name="MENSAGEM" ></textarea>
            </p>
        </div>
    
    	<div id="botoes">
            <button class="btn btn-close-modal" id="fecharModal">Cancelar</button>
            <button class="btn btn-success btNovoTicket_cliente">Enviar chamado</button>
		</div>
    
    </form>
</div>