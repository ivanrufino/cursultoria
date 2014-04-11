<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	<div id="central_tit">Resumo da conta</div>
    <div class="alert">
   		<i class="icon-exclamation-sign"></i>Antes de abrir um ticket, verifique se sua dúvida já está respondida em nosso FAQ e Tutoriais.
    </div>
    <div id="tickets" class="well">
    	<div id="texto_quantidade_tickets">
        	Você tem <b><?=count($tickets)?></b> tickets não resolvidos e <b> -- </b> respondidos

        </div>
        <a href="<?=site_url()?>cliente/novo_ticket" class="btn btn-primary btSub">Novo Ticket</a>
    </div>
    <div id="tit_tickets_abertos">
    	<b>Tickets abertos</b>
            <?php if($tickets != NULL){?>
            <table class="table table-striped table-hover" id="tickets_fechados">
					<thead>
						<tr style="color:#666666!important">
						  <th width="70%">ASSUNTO</th>
						  <th width="20%">DATA</th>
						  <th width="10%">STATUS</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tickets as $row):?>
						<tr>
						  <td><a href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>"><span class="btn-link">#<?=$row->CODIGO ?> - <?=$row->TITULO ?></span></a></td>
						  <td><?=dateFormat($row->DATA, "d/m/Y H:i");?></td>
						  <td>
								<?php 
									switch($row->STATUS){
										case 1 : echo "<span class='label label-success'>ABERTO</span>"; break;
										case 2 : echo "<span class='label label-info'>ENVIADO</span>"; break;
										case 3 : echo "<span class='label label-warning'>RESPONDIDO</span>"; break;
										case 4 : echo "<span class='label label-important'>FECHADO</span>"; break;
										case 5 : echo "<span class='label label-inverse'>RESOLVIDO</span>"; break;
									}
								?>
						  </td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
                <?php }else{?>
                    <div style="padding:25px 0;"><center>Você não possui faturas em aberto</center></div>
            <?php }?>
		</div>
<!-- Janela Modal 
<div id="modalTicket" class="modal hide fade in" style="display: none; ">
	<div class="modal-header" style="background-color:#<?php echo$cor_default?>">
        <!--<a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
        <a class="close" id="fechar" data-dismiss="modal">×</a> 
        <h3 id="myModalLabel"><b>Novo ticket de suporte</b></h3>
    </div>
    <div class="modal-body" style="max-height:none!important;">
    	<p class="alert alert-block">
            	Se você não puder encontrar uma solução em nosso FAQ e Tutoriais, você pode enviar um Ticket selecionando o departamento desejado.

        </p>
        <div id="campos_novo_ticket" style=" margin-top:10px;">
        	<form method="post" id="submit_novoTicket">
            <input type="hidden" name="RESPONSAVEL" value="" />
            <input type="hidden" value="<?=$this->session->userdata('clienteLogado')?>" name="CLIENTE" />
        	<div class="campo">
                <p>Selecione um departamento<br/>
                    <select id="lista_departamentos" class="easyui-combobox" style="width:200px" name="DEPARTAMENTO">
                     	<option></option>
						<?php foreach($dpto as $rs){
                            echo "<option value=".$rs->CODIGO.">".$rs->DESCRICAO."</option>";
                        }?>
                	</select>
                 </p>
        	</div>
            <div class="campo" style=" margin-left:40px;">
                <p>Selecione uma categoria<br/>
                	 <select name="CATEGORIA" class="easyui-combobox" style="width:200px" id="lista_categorias"></select>
                 </p>
        	</div>
        </div>
        <div id="campos_novo_ticket">
			<p>Digite seu domínio<br/>
            	<input type="text" class="easyui-validatebox"   required="required" data-options="required:true" style=" width:515px;" name="DOMINIO" placeholder="Escolha o domínio ao qual se refere sua dúvida ou dificuldade." /><br/>
                Assunto<br/>
                <input type="text" class="easyui-validatebox"  required="required" style=" width:515px;" name="TITULO" placeholder=" bla bla assunto"  data-options="required:true" />
                Mensagem<br/>
                <textarea class="easyui-validatebox"  required="required" style=" width:515px;" type="text" name="MENSAGEM"  data-options="required:true"></textarea>
            </p>
        </div>
	</div>
    <div class="modal-footer">
    	<button class="btn btn-close-modal" id="fecharModal">Cancelar</button>
        
        <button class="btn btn-primary btNovoTicket_cliente">Enviar ticket</button>
    </div>
    </form>
</div>-->
