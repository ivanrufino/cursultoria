<script type="text/javascript" src="<?=site_url();?>assets/js/dataTables_Frontend.js"></script>

<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	<div id="central_tit">Resumo da conta</div>
    <div id="central_destaque">
    	<div class="c_left borda5px">
        	<span class="tit_box">Dados de Cadastro</span>
            
            <table width="370" id="table_destaque" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th>Titular:</th>
                <td><?=$cadastro->RAZAO_NOME;?></td>
              </tr>
              <tr>
                <th>CPF / CNPJ:</th>
                <td><?=($cadastro->TIPO_PESSOA == "juridica") ? $cadastro->CNPJ : $cadastro->CPF;?></td>
              </tr>
              <tr>
                <th>E-mail:</th>
                <td><?=$cadastro->EMAIL?></td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td>+55 <?=$cadastro->TELEFONE?></td>
              </tr>
            </table>
            
			<p class="ui-alert">Você pode visualizar e alterar todos os seus dados na página Meus Dados.</p>
        </div><!-- ./c_left -->
        
        <div class="c_right borda5px">
        	<span class="tit_box2">Pagamentos</span>
            
            <?php if($fatura != NULL){
				foreach ($fatura as $item) {
					$total[] = $item->VALOR;
					$vencimento[] = $item->VENCIMENTO;
				}	
			?>
            	
                <p>Você tem pagamentos pendentes:</p>
                <h2>R$ <?=numFormat(array_sum($total))?></h2>
                
                <div style="float:left;">
                    <p style="padding-bottom:2px;">Próximo vencimento:</p>
                    <h3><?=dateFormat($vencimento[0], "d/m/Y")?></h3>
                </div>
                
                <a href="<?=site_url()?>cliente/financeiro" class="btn btn-danger btPag">Quitar Débitos</a>
                
                <div class="extrato">
                    <a href="<?=site_url()?>cliente/financeiro" title="Extrato financeiro" class="btn btn-link btn-large" style="font-weight:600;">Exibir extrato financeiro</a>
                </div>
            <?php }else{?>
            	<img src="<?=site_url()?>/assets/img/icons/48x48/accept.png" style="padding:15px; margin:40px 0 0 110px;" />
            	<div class="extrato">Você está em dia conosco.</div>
            <?php }?>
            
        </div><!-- ./c_right -->
    </div>
    <!--
    <div id="central_subtit" style="padding-top:0px;">Serviços ativos</div>
    <div id="other_content" class="borda5px" style="border:0px;">        
        <ul class="thumbnails">

          <li style="margin-left:30px;">
			<div class="thumbnail">
              
              <h3>Hospedagem de Sites</h3>
              
              <img src="<?=site_url()?>/assets/img/icons/black/_icon_servers2.png" alt="">
              <a href="<?=site_url()?>/cliente/meusProdutos/#hospedagem"title="Painel de Hospedagem de Sites"><button class="btn btn-small btn-primary buttonServ">Gerenciar</button></a>
            </div>
          </li>
          
          <li style=" margin-left:11px;">
			<div class="thumbnail">
              
              <h3>Servidores Cloud</h3>
              
              <img src="<?=site_url()?>/assets/img/icons/black/_icon_cloud2.png" alt="">
              <a href="<?=site_url()?>/cliente/meusProdutos/#servidor_cloud" title="Painel de Servidores Cloud"><button class="btn btn-small btn-primary buttonServ">Gerenciar</button></a>
            </div>
          </li>
          
          <li style=" margin-left:11px;">
			<div class="thumbnail">
              
              <h3>Registro de Domínio</h3>
              
              <img src="<?=site_url()?>/assets/img/icons/black/_icon_domain2.png" alt="">
              <a href="<?=site_url()?>/cliente/meusProdutos/#registro_dominio" title="Painel de Registro de Domínio"><button class="btn btn-small btn-primary buttonServ">Gerenciar</button></a>
            </div>
          </li>
          
          <li style=" margin-left:11px;">
			<div class="thumbnail">
              
              <h3>Streaming</h3>
              
              <img src="<?=site_url()?>/assets/img/icons/black/_icon_streaming2.png" alt="">
              <a href="<?=site_url()?>/cliente/meusProdutos/#streaming" title="Painel de Streaming"><button class="btn btn-small btn-primary buttonServ">Gerenciar</button></a>
            </div>
          </li>
          
        </ul>
    </div>
    -->
    
    <div id="central_subtit" style="padding-top:10px;">Tickets de Suporte ativos</div>
    	<div id="other_content" class="borda5px">
        <table class="table table-striped table-hover tabela_cicloPagamento dataTable display">
            <thead>
                <tr>
                  <th width="47%">Assunto</th>
                  <th width="20%">Data</th>
                  <th style="text-align: right;" width="15%">Status</th>
                  <th width="18%"></th>
                </tr>
            </thead>
        <?php 
            if($tickets != NULL) {
            
            foreach($tickets as $row):?>
            <tbody>
                
                <tr>
                  <td><a class="btn btn-link btn-small" style="text-transform:none; text-decoration:none; padding:2px;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>"><span class="btn-link">#<?=$row->CODIGO ?> - <?=$row->TITULO ?></span></a></td>
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
                  <td>
                        <a class="btn btn-link btn-small" style="text-transform:none;  padding:2px; text-decoration:none;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>">
                            <i class="ico-right-open"></i>Ver Detalhes
                        </a>
                  </td>
                </tr>
            <?php endforeach;
            
                } else {
                echo "<tbody>
                        
                        <tr>
                            <td colspan='4'><p style='text-align: center'>Não existem tickets ativos!</p></td>
                        </tr>
                     </tbody>";
                }; ?>
		</table>
	</div>	
</div><!-- ./wrap -->