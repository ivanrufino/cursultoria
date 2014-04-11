
<div id="mainframe" style="float: left; width: 690px; padding: 0 10px;overflow: hidden;"><!-- wrap -->
	<div id="central_tit">Serviços contratados</div>
    
	<p>Consulte abaixo os serviços que você contratou. É possível obter informações sobre seu uso e configurações.</p>
    
    <!-- Caso não exista nenhum registro ************************************************* -->
    <?php if($cliente_produtos == NULL){?>
    <div align="center" class="alert" style="padding:10px; overflow:auto;">
        <div style="font:16px Lucida Sans, Arial, sans-serif; overflow:auto; text-align:center; width:340px;">
            <img src="<?=site_url()?>/assets/images/error_icon3.png" style=" text-align:center; margin-right:5px;">
            <b style="float:left; font-weight:normal; margin-top:5px;">
                Você ainda não tem <font style="text-transform:lowercase; font-weight:bold;">serviços</font> contratados.
            </b>
        </div>
    </div>
    <?php }else{?>
    
	<div id="buscaProdutos">
    	<div id="tit-buscaProdutos"><b><?=($cliente_produtos == NULL) ? 0 : count($cliente_produtos)?></b> Produtos encontrados, Página 1 de 1</div>
        <div id="campoBuscaProdutos">
        	<div class="input-append borda5px">
              <input class="span2" id="appendedInputButtons" type="text">
              <button class="btn btn-info" type="button">Filtrar</button>
            </div>
        </div>
    </div>
            
	<table class="table table-striped table-hover tabela_meusProdutos">
		<thead>
            <tr>
              <th width="28%">Produto / Serviço</th>
              <th width="12%">Preço</th>
              <th width="10%">Vencimento</th>
              <th width="8%">Status</th>
              <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cliente_produtos as $row) :
        
            $categoria = $this->produtos->getCategoriasById($row->CATG_PRODUTO);
            $produto = $this->produtos->getProdutosById($row->COD_PRODUTO);

        ?>
            <tr>
              <td>
                <b><?=$categoria->DESCRICAO?> - <?=$produto->DESCRICAO?></b>
                <?=($row->DOMINIO !="") ? '<br/><img height="18px" src="'.site_url().'assets/images2/icons/web-browser.png" /> '.$row->DOMINIO : ''; ?>
              </td>
              <td>R$ 
                <?php
                    switch($row->CICLO){
                        case 'mensal'		: echo ($produto->PRECO_MENSAL != 0.00) 	? numFormat($produto->PRECO_MENSAL) : numFormat($produto->PRECO_MENSAL * 1); break;
                        case 'trimestral'	: echo ($produto->PRECO_TRIMESTRAL != 0.00) ? numFormat($produto->PRECO_TRIMESTRAL) : numFormat($produto->PRECO_MENSAL * 3); break;
                        case 'semestral'	: echo ($produto->PRECO_SEMESTRAL != 0.00) 	? numFormat($produto->PRECO_SEMESTRAL) : numFormat($produto->PRECO_MENSAL * 6); break;
                        case 'anual'		: echo ($produto->PRECO_ANUAL != 0.00) 		? numFormat($produto->PRECO_ANUAL) : numFormat($produto->PRECO_MENSAL * 12); break;
                        case 'bienal'		: echo ($produto->PRECO_BIENAL != 0.00) 	? numFormat($produto->PRECO_BIENAL) : numFormat($produto->PRECO_MENSAL * 24); break;
                    }
                ?>
              </td>
              <td><?=dateFormat($row->PROX_VENCIMENTO, "d/m/Y")?></td>
              <td>
                 
                <?php 
                switch($row->STATUS){
                    case 0: echo "<span class='label label-danger'>INATIVO</span>";
                        break;
                    case 1: echo "<span class='label label-success'>ATIVO</span>";
                        break;
                }?>                  
              </td>
              <td class="btnDropdown">
                <div class="btn-group" data-toggle="dropdown">
                  <a class="btn" rel="servico_detalhes" id="<?=$row->CODIGO?>"><i class="icon-wrench"></i> Gerenciar</a>
                  <button class="btn dropdown-toggle btIcon2" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu pull-right">
                    <!-- dropdown menu links -->
                    <li class="dropdown"><a rel="trocarSenha"  data-id="<?=$row->CODIGO?>"><i class="icon-user"></i> Mudar senha</a></li>
                    <li class="dropdown"><a rel="trocarPlano"  data-id="<?=$row->CODIGO?>"><i class="icon-refresh"></i> Trocar de plano</a></li>
                    <li class="dropdown"><a rel="infoTecnicas" data-id="<?=$row->CODIGO?>"><i class="icon-info-sign"></i> Informações técnicas</a></li>
                    <li class="divider"></li>
                    <li class="dropdown"><a rel="solicCancelamento" data-id="<?=$row->CODIGO?>" data-toggle="modal" role="button" class="alertaRed"><i class="icon-off"></i> Solicitar cancelamento</a></li>
                  </ul>
                </div>
              </td>
            </tr>
       <?php endforeach; ?>
       </tbody>
	</table>

	<?php }?>
    

</div><!-- ./wrap -->

<!-- Janela Modal - MUDAR SENHA -->
<div id="modalMudarSenha" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - TROCAR PLANO -->
<div id="modalTrocarPlano" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - INFORMAÇÕES TÉCNICAS -->
<div id="modalInfoTecnica" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - SOLICITAR CANCELAMENTO -->
<div id="modalSolicCancelamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

