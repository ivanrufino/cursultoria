<script type="text/javascript">

$(document).ready(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-numberspinner').numberspinner();
	
	$('#selectModulo').combobox({
		mode:'remote',
		enabled:true,
	
		onChange:function(data) {
			$('#selectServidor').combobox({
				
				mode:'remote',
				enabled:true,
				url: "<?=site_url()?>/painel/json/submitModulo_servidor/" + data,
				valueField:'CODIGO',  
				textField:'DESCRICAO'	
			});
			
			if(data != ""){
				$("#load_config").load("<?=site_url()?>/painel/json/loadConfig/" + data);
			}else{
				$("#load_config").empty();
			}
		}
	});
	/*
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
	
	$('div.btn-group button').click(function(){
		$('[name="TIPO_CONTRATO"]').attr('value', $(this).attr('id'));
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	*/
	
	$("a[rel='respostaTicket']").click(function(){
		
		var n_ticket = $('[name="TICKET"]').val();
		
		$('#respostaTicket').ajaxForm({
	
			url: '<?=site_url()?>/admin/suporte/respostaTicket',
			resetForm: true,
			/*dataType: 'json',*/
			beforeSend: function(){
				$("#pop_ticketDetalhes").html(' <h2><img src="<?=site_url()?>assets/img/gif/loading2.gif" /> Aguarde, carregando...</h2>');
			},  
			success: function(response) {
				$.unblockUI();

				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					$(this).ticketDetalhes(n_ticket);
					getURL('suporte/tickets');
					
				}else{
					$.messager.alert('Aviso', response, 'error');
					$(this).ticketDetalhes(n_ticket);
					getURL('suporte/tickets');
				}
				
			}
		}).submit();
		
		
	});
	
});

</script>

<?php
	$cadastro = $this->cadastros->get_id($dados->CLIENTE);
?>

<div id="content_chamados" style="height:515px; overflow-y:scroll;">
	<div style="display:block; overflow:hidden; background:#f7f7f7;">
        <div class="header_cliente_chamado"><b>Cliente:</b> <?=$cliente->RAZAO_NOME?></div>
        <div class="header_cliente_chamado"><b>Criado em:</b> <?=dateFormat($dados->DATA, "d/m/Y H:i")?></div>
        <div class="header_cliente_chamado"><b>Domínio:</b> <?=$dados->DOMINIO?></div>
    </div>
    
	<div class="tit_chamado"><?=$dados->TITULO?></div>
    <div id="perfil_chamado">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="label_perfil_chamado" style="width:25%;">Ticket ID</td>
            <td class="label_perfil_chamado" style="width:30%;">Departamento</td>
            <td class="label_perfil_chamado" style="width:20%;">Atribuído</td>
            <td class="label_perfil_chamado" style="float:right;">Status</td>
          </tr>
          <tr>
            <td>#<?=$dados->CODIGO?></td>
            <td><?=$dpto->DESCRICAO?></td>
            <td><?=($atribuido != NULL) ? $atribuido->NOME : "Não atribuído";?></td>
            <td>
            	<?php 
				switch($dados->STATUS){
					case 1: echo "<div class='tag_green' style='margin:0px; font-size:14px; float:right;'>ABERTO</div>"; break;
					case 2: echo "<div class='tag_yellow' style='margin:0px; font-size:14px; float:right;'>PENDENTE</div>"; break;
					case 3: echo "<div class='tag_blue' style='margin:0px; font-size:14px; float:right;'>RESPONDIDO</div>"; break;
					case 4: echo "<div class='tag_red' style='margin:0px; font-size:14px; float:right;'>FECHADO</div>"; break;
					case 5: echo "<div class='tag_black' style='margin:0px; font-size:14px; float:right;'>RESOLVIDO</div>"; break;
				}
				?>
          </tr>
        </table>        
    </div>

    <div class="easyui-tabs" border="false" id="tt" style="background:#f1f1f1; padding:5px;">
        <ul>
            <li><a href="#tabs-1">Resposta</a></li>
            <!--li><a href="#tabs-2">Observação</a></li>
            <li><a href="#tabs-3">Dados de Acesso</a></li-->
        </ul>
        <div id="tabs-1" style="height:100px;">
        	<!--<p>Seu comentário será enviado para o solicitante do ticket</p>-->
            <form id="respostaTicket" method="post">
            <input type="hidden" name="TICKET" value="<?=$dados->CODIGO?>" />
            <input type="hidden" name="DEPARTAMENTO" value="<?=$dados->DEPARTAMENTO?>" />
            <input type="hidden" name="DOMINIO" value="<?=$dados->DOMINIO?>" />
            <input type="hidden" name="CLIENTE" value="<?=$dados->CLIENTE?>" />
            <input type="hidden" name="NOME_CLIENTE" value="<?=$dados->DOMINIO?>" />
            <input type="hidden" name="TIPO" value="operador" />
            <input type="hidden" name="RESPONSAVEL" value="<?=$this->session->userdata('usuario')?>" />
        	<textarea name="MENSAGEM" resize="" rows="3" style="width:650px; resize:none; height:60px; margin-top:5px;"></textarea>
            <div style="display:block;">
                 
                 <label style="float:left;">
                    <input type="checkbox" style="float:left" name="RESOLVIDO" /> <p style="float:left; margin-left:5px;">Marcar como Resolvido</p>
                </label>
                 
                 <div class="btn-group dropup" style="float:right; margin-top:5px; ">
                 	<a class="btn btn-primary" style="padding:4px 8px;" rel="respostaTicket">Adicionar Resposta</a>
                  	<button class="btn btn-primary dropdown-toggle" style=" height:30px;" data-toggle="dropdown">
                    	<span class="caret"></span>
                    </button>
                  
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                      <li>
                      	<a tabindex="-1" href="#" style="font-size:12px;">
                        	<i class="icon-file"></i> Anexar arquivo
                        </a>
                      </li>
                    </ul>
                 </div>
                 
                 
            </div>
            </form>
        </div>
        <!--div id="tabs-2" style="overflow:hidden;">
        	Anexos
        </div>
        <div id="tabs-3" style="overflow:hidden;">
        	Dados de Acesso
        </div-->
    
    </div>

<!-- ############################################################################################################# -->
	
    <div style="background:#fff; padding:10px 0;">
    	<?php foreach($mensagens as $msg):
					
			switch($msg->TIPO){
				case "operador": 
					$operador = $this->users->getUsuarioById($msg->RESPONSAVEL);
					$RESPONSAVEL = $operador->NOME;
				break;
				case "cliente" :
					$cadastro = $this->cadastros->get_id($msg->RESPONSAVEL);
					$RESPONSAVEL = $cadastro->RAZAO_NOME;
				break;  
			}
		?>
        <div class="ticket_pergunta_resposta borda5px <?=($msg->TIPO == "cliente") ? "well-condensed" : "alert"?>" style=" padding:0px;">
            <div class="ticket_nome_data" style=" background:#<?=($msg->TIPO == "cliente") ? "f6f6f6" : "FEE4CB"?>;">
                <div class="ticket_nome">
                    <b><?=$RESPONSAVEL?> <?=($msg->TIPO == "cliente") ? "(Cliente)" : "(Operador)"?></b>
                </div> 
                <div class="ticket_data">
                    <?=dateFormat($msg->DATA, "d/m/Y - H:i")?>
                </div>
            </div>
            <div class="ticket_area_texto">
                <?=nl2br($msg->MENSAGEM)?>
            </div>
        </div>
        
        <?php endforeach;?>
        
    </div>
    
</div>