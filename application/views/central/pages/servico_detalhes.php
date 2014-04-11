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
	
	// VERIFICA SE POSSUI SENHA, CASO NÃO TENHA, EXIBE A TAB [TROCAR SENHA]
	<?php if($servico->MOD_USUARIO != ""){?>
		
	<?php }else{?>
	
		$('#tab_gerenciamentoDetalhesServico > li:first').hide();
		$('#mudarSenha').hide();
		
		$('#check_active').addClass('active');
		$('#trocarPlano').addClass('active');
	<?php }?>
	
	<?php if($servico->MOD_USUARIO != "0"){?>
		
	<?php }else{?>
	
		$('#tab_gerenciamentoDetalhesServico > li:first').hide();
		$('#mudarSenha').hide();
		
		$('#check_active').addClass('active');
		$('#trocarPlano').addClass('active');
	<?php }?>

});
</script>
<div id="central_tit">Detalhes do Serviço</div>
<input type="hidden" value="<?=($servico->MOD_USUARIO != "" or $servico->MOD_USUARIO != "0")? 'active' : '' ?>" id="mod_senha" />
	<?php
		$categoria = $this->produtos->getCategoriasById($dados->CATG_PRODUTO);
    	$produto = $this->produtos->getProdutosById($dados->COD_PRODUTO);
	?>
    <table class="table" id="table_detalhesServico">
        <thead>
            <tr>
                <th>
                <?php switch($dados->STATUS){
                    
					case 0: echo "<span class='label label-danger'>INATIVO</span>";
                        break;
                    case 1: echo "<span class='label label-success'>ATIVO</span>";
                        break;
                }?>
                </th>
                <th>

                <div id="dataServico">
                	Desde: <?=dateFormat($dados->DATA, 'd/m/Y')?>
                </div>
                </th>
            </tr>
        </thead>
        <tr>
            <td>Cliente</td>
            <td><?=$cliente->RAZAO_NOME?></td>
        </tr>
        <tr>
            <td>Produto/Serviço</td>
            <td><b><?=$categoria->DESCRICAO?> - <?=$produto->DESCRICAO?></b>
                <?=($dados->DOMINIO !="") ? '<br/><img height="15px" src="'.site_url().'assets/images2/icons/web-browser.png" /> '.$dados->DOMINIO : ''; ?></td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>R$ 
            	<?php
                    switch($dados->CICLO){
                        case 'mensal'		: echo ($produto->PRECO_MENSAL != 0.00) 	? numFormat($produto->PRECO_MENSAL) : numFormat($produto->PRECO_MENSAL * 1); break;
                        case 'trimestral'	: echo ($produto->PRECO_TRIMESTRAL != 0.00) ? numFormat($produto->PRECO_TRIMESTRAL) : numFormat($produto->PRECO_MENSAL * 3); break;
                        case 'semestral'	: echo ($produto->PRECO_SEMESTRAL != 0.00) 	? numFormat($produto->PRECO_SEMESTRAL) : numFormat($produto->PRECO_MENSAL * 6); break;
                        case 'anual'		: echo ($produto->PRECO_ANUAL != 0.00) 		? numFormat($produto->PRECO_ANUAL) : numFormat($produto->PRECO_MENSAL * 12); break;
                        case 'bienal'		: echo ($produto->PRECO_BIENAL != 0.00) 	? numFormat($produto->PRECO_BIENAL) : numFormat($produto->PRECO_MENSAL * 24); break;
                    }
                ?>
            </td>
        </tr>
         <tr>
            <td>Ciclo</td>
            <td style="text-transform:capitalize;"><?=$dados->CICLO?></td>
        </tr>
        <tr>
            <td>Vencimento</td>
            <td><?=dateFormat($dados->PROX_VENCIMENTO,'d/m/Y')?></td>
        </tr>
    </table>

<div id="central_subtit" style="padding-top:10px; border-bottom:1px dotted #eee;">Faturas</div>

<table class="table table-striped table-hover tabela_meusProdutos">
    <thead>
        <tr>
          <th width="10%">Fatura #</th>
          <th width="12%">Data</th>
          <th width="12%">Vencimento</th>
          <th width="15%">Valor</th>
          <th width="12%">Status</th>
          <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td><b>#0000</b></td>
          <td>00/00/0000</td>
          <td>00/00/0000</td>
          <td>R$ 0,00</td>
          <td>
          	<span class="label label-important">NÃO PAGO</span>
          </td>
          <td>
          	
                <a style="float:right;" onclick="redirecionaPainel('<?=site_url()?>fatura/')" class="btn btn-info btn-small">
                    <i class="icon-search icon-white"></i> Detalhes
                </a>
          </td>
        </tr>
    </tbody>
    
</table>

<div id="central_subtit" style="padding-top:10px; border-bottom:1px dotted #eee;">Gerenciamento</div>
<ul class="nav nav-tabs" id="tab_gerenciamentoDetalhesServico">
    <li class="active">
        <a href="#mudarSenha" data-toggle="tab">
            <div class="img_tbs">
                <i class="icon-lock"></i>
            </div>
            <div class="tit_tabs">
                <b>Mudar senha</b>
            </div>
       </a>
    </li>
    <li id="check_active">
        <a href="#trocarPlano" data-toggle="tab">
            <div class="img_tbs">
                <i class="icon-refresh"></i>
            </div>
            <div class="tit_tabs">
            <b>Trocar plano</b>
            </div>
       </a>
    <li>   
    <li>
        <a href="#solicitarEncerramento" data-toggle="tab">
            <div class="img_tbs">
                <i class="icon-ban-circle"></i>
            </div>
            <div class="tit_tabs">
                <b>Solicitar encerramento</b>
            </div>
       </a>
    <li>
</ul>
<div class="tab-content" id="content_gerenciamentoDetalhesServico">
    
    <div class="tab-pane <?=($servico->MOD_USUARIO != "" or $servico->MOD_USUARIO != "0")? 'active' : '' ?>" id="mudarSenha">
        <form id="form_trocaSenhaCliente" method="post">
        	<input type="hidden" name="CLIENTE" value="<?=$cliente->CODIGO?>"/>
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
    		<a class="btn btn-success" rel="btn_alteraSenhaServico" data-loading-text="Carregando...">Alterar senha</a>
		</form>
    </div>
    
    <div class="tab-pane " id="trocarPlano">
		<?php foreach($produtos as $plano):
          $modulo = $this->produtos->getModulosById($plano->COD_SERVIDOR, $plano->CODIGO);
        ?>
        
        <form id="form_alterarPlanoDetalheCliente" method="post" >
            <input type="hidden" name="COD_SERVICO" value="<?=$dados->CODIGO?>"/>
            <input type="hidden" name="DESCRICAO" value="" />
            <input type="hidden" name="TIPO" value="Alterar"/>
            <div class="novoPlano">
                <div class="label"><input id="id_plano" type="radio" <?=($dados->COD_PRODUTO == $plano->CODIGO) ? " checked" : ''?> name="NOVO_PLANO" value="<?=$plano->CODIGO?>" /></div>
                <div class="nome_plano">
                    <b><?=$plano->DESCRICAO?></b>
                    
                    <b class="preco">R$ <?=numFormat($plano->PRECO_MENSAL)?> /mês</b>
                </div>
                
                <div class="desc_plano" style="width:90px;">
                    <p>Disco</p>
                    <b><?=($modulo->HOST_DISCO != 99999999999)? convertSize('GB', $modulo->HOST_DISCO) : "Ilimitado"?></b>
                </div>
                <div class="desc_plano" style="width:90px;">
                    <p>Tráfego</p>
                    <b><?=($modulo->HOST_TRAFEGO != 99999999999)? convertSize('GB', $modulo->HOST_DISCO) : "Ilimitado"?></b>
                </div>
                <div class="desc_plano" style="width:90px;">
                    <p>E-mails</p>
                    <b><?=($modulo->HOST_EMAILS != 999)? $modulo->HOST_EMAILS : "Ilimitado"?></b>
                </div>
            </div>
            <?php endforeach;?>
            <div id="msgTrocaPlano"></div>
            <a rel="btn_alterPlanoServico" class="btn btn-success">Solicitar troca de plano</a>
        </form>
    </div>
    
    <div class="tab-pane" id="solicitarEncerramento">
    <?php if($servico->STATUS == 1){ ?>
        <form id="form_cancelamentoServico" method="post" >
        	<div id="msgCancelServico"></div>
            <input type="hidden" name="COD_SERVICO" value="<?=$dados->CODIGO?>"/>
            <input type="hidden" name="TIPO" value="Cancelamento"/>

            <div class="alert">
            	Solicitação de cancelamento para: <b><?=$categoria->DESCRICAO?> - <?=$produto->DESCRICAO?></b> (<?=$dados->DOMINIO?>)<br/>
			</div>
            Tipo de Cancelamento<br/>
            <select name="PRAZO">
            	<option value="Imediato">Imediato</option>
                <option value="Final do Período de Cobrança">Final do Período de Cobrança</option>
            </select>
            <br/>
            Por favor, informe a razão do cancelamento<br/>
            <textarea name="DESCRICAO" style=" width:660px; resize:none;height:80px" required></textarea>
        	<a class="btn btn-danger" rel="btn_solicitaCancelServico" >Solicitar Cancelamento</a>
		</form>
	<?php } else {?>
    	<div class="alert">
            O Serviço <b><?=$categoria->DESCRICAO?> - <?=$produto->DESCRICAO?></b> está em processo de cancelamento!<br/>
        </div>
    <?php } ?>
    </div>
</div>