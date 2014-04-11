
<div id="mainframe" style="float: left; width: 690px; padding: 0 10px;"><!-- wrap -->
	<div id="central_tit">Produtos contratados</div>
    
	<p>Consulte abaixo os produtos que você assinou. É possível obter informações sobre seu uso e configurações.</p>
    
    <?php foreach($lista_categorias as $categoria):?>   	
	
        <div class="accordion" id="lista_servicos" style="float:left; width:100%;">
            <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#lista_servicos" href="#<?=limpaChars($categoria->DESCRICAO);?>">
                
                <?php 
				switch($categoria->CODIGO){
					case 1: echo '<i class="icon-hdd"></i>'; break;
					case 2: echo '<i class="icon-hdd"></i>'; break;
					case 3: echo '<i class="icon-tasks"></i>'; break;
					case 4: echo '<i class="icon-headphones"></i>'; break;
					case 5: echo '<i class="icon-star"></i>'; break;
				}
				
				$idCliente = $this->cadastros->getDados($this->session->userdata('clienteLogado'));
				$cliente_produtos = $this->servicos->getByCliente($idCliente->CODIGO, $categoria->CODIGO);

				?>
                
                <?=$categoria->DESCRICAO;?> &nbsp;(<?=($cliente_produtos == NULL) ? 0 : count($cliente_produtos)?>)
              </a>
            </div>
            <div id="<?=limpaChars($categoria->DESCRICAO);?>" class="accordion-body collapse">
            <?php if($cliente_produtos == NULL){?>
    
            <!-- Caso não exista nenhum registro ************************************************* -->
            <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
                <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:320px;">
                    <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                    <b style="float:left; font-weight:normal; margin-top:5px;">
                        Você ainda não tem <font style="text-transform:lowercase; font-weight:bold;">produtos</font> nesta categoria.
                    </b>
                </div>
            </div>
            <!-- Caso não exista nenhum registro ************************************************* -->
            <?php }else{
				?>
                <div class="accordion" id="list_items">
                <?php
				foreach($cliente_produtos as $lista){
					$produto = $this->produtos->getProdutosById($lista->COD_PRODUTO);
					$servidor = $this->produtos->getServidoresById($lista->COD_SERVIDOR);
					?>
                    
                    
                    <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#list_items" href="#<?=limpaChars($lista->DOMINIO)?>">
                            <?php
								switch($servidor->OS){
									case 'linux': echo '<img src="'.site_url().'/assets/img/icons/24x24/linux.png" border="0" />'; break;	
									case 'windows': echo '<img src="'.site_url().'/assets/img/icons/24x24/windows.png" border="0" />'; break;	
								}
							?>
                            
                            <?=$lista->DOMINIO?>
                          </a>
                          <div class="status">
                          		
                                <img src="<?=site_url()?>/assets/images2/ico_<?=($lista->STATUS == 1)? "green" : "red";?>1.png" border="0" />
                                <span><strong>Status:</strong> <?=($lista->STATUS == 1)? "Ativo" : "Inativo";?></span>
                            </div>
                        </div>
                        <div id="<?=limpaChars($lista->DOMINIO)?>" class="accordion-body collapse">
                        	<div class="servDetalhes_left">
                            	<!-- 1º accordion - lado esquerdo -->
                            	<div id="revenda">
                                	<div class="box">
                                    	<div class="logotipo_revenda">
                                        	<b>Painel de Controle</b>
                                            <?php
												switch($servidor->MODULO){
													case 'cpanel': echo '<img src="'.site_url().'/assets/images/cpanel.png" alt=""> '; break;	
													case 'plesk': echo '<img src="'.site_url().'/assets/images/plesk.png" alt="">'; break;	
												}
											?>
                                            <button type="submit" class="btn btn-mini btn-danger"
                                            onclick="redirecionaPainel('http://<?=$servidor->IP?>:2082/login?user=<?=$lista->MOD_USUARIO?>&pass=<?=$lista->MOD_SENHA?>')">Ir para painel de controle</button>
                                        </div>
                                        
                                    </div>
                                    <div class="box">
                                    	<div class="logotipo_revenda">
                                       		<b>Sistema Operacional</b>
                                            <?php
												switch($servidor->OS){
													case 'linux': echo '<img src="'.site_url().'/assets/images/linux_logo.png" alt="">'; break;	
													case 'windows': echo '<img src="'.site_url().'/assets/images/windows_logo.png" alt="">'; break;	
												}
											?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="serv_adicional">
                                    <p><b>Serviços Adicionais</b></p>
                                    <ul>
                                    	<!--<li><b>IP Dedicado:</b> 10.1.1.1</li>-->
                                        <li>Nenhum</li>
                                    </ul>
                                </div>
 							 </div><!-- Fim - 1º accordion - lado esquerdo -->
                            
                            <div class="servDetalhes_right"><!-- 1º accordion - lado direito -->
                            	<div id="monitoracao">
                                	
                                	<div id="status_monitoracao">
                                        <div class="btn-group" data-toggle="dropdown">
                                          <button class="btn"><i class="icon-wrench"></i> Gerenciar</button>
                                          <button class="btn dropdown-toggle btIcon2" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            <!-- dropdown menu links -->
                                            <li class="dropdown"><a rel="trocarSenha"  data-id="<?=$lista->CODIGO?>"><i class="icon-user"></i> Mudar senha</a></li>
                                            <li class="dropdown"><a rel="trocarPlano"  data-id="<?=$lista->CODIGO?>"><i class="icon-refresh"></i> Trocar de plano</a></li>
                                            <li class="dropdown"><a rel="infoTecnicas" data-id="<?=$lista->CODIGO?>"><i class="icon-info-sign"></i> Informações técnicas</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown"><a rel="solicCancelamento" data-id="<?=$lista->CODIGO?>" data-toggle="modal" role="button" class="alertaRed"><i class="icon-off"></i> Solicitar cancelamento</a></li>
                                          </ul>
                                        </div>
                                    </div>
                                    <p>Detalhes do Produto/serviço</p>
                                    <table class="table table-striped gridDatalhes_servico" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                            	<th width="50%">Plano</th>
                                            	<td><?=$produto->DESCRICAO?></td>
                                            </tr>
                                            <tr>
                                            	<th width="50%">Prox. Vencimento</th>
                                            	<td><?=dateFormat($lista->PROX_VENCIMENTO, "d/m/Y")?></td>
                                            </tr>
                                            <tr>
                                            	<th width="50%">Ciclo de Pagamento</th>
                                            	<td style="text-transform:capitalize"><?=$lista->CICLO?></td>
                                            </tr>
                            
                                        </tbody>
                                    </table>
                                </div>
                           </div><!-- Fim - 1º accordion - lado direito -->
                        </div>
                    </div><!-- ./accordion-group -->
                    
                
                    <?php
				}
			?>
            	</div><!-- ./list_items -->
            <?php } ?>
           
        </div>
      </div><!-- ./accordion-group -->
      
       <?php endforeach;?>

</div><!-- ./wrap -->

<!-- Janela Modal - MUDAR SENHA -->
<div id="modalMudarSenha" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - TROCAR PLANO -->
<div id="modalTrocarPlano" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - INFORMAÇÕES TÉCNICAS -->
<div id="modalInfoTecnica" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Janela Modal - SOLICITAR CANCELAMENTO -->
<div id="modalSolicCancelamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

