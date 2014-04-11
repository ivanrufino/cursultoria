<script type="text/javascript" src="<?=site_url();?>assets/js/dataTables_Frontend.js"></script>
<style type="text/css">
.status{ font: 11px "Open Sans", Helvetica, sans-serif;float: right;width: auto;font-weight: 600;margin: 0px;color: white;padding: 3px 8px;text-transform: uppercase;}
</style>
<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	<div id="central_tit">Suporte técnico</div>
    
    <div id="boxes_suporte">
        <div class="box_tipo_suporte2">
            <div class="tit_suporte">
                <b>Helpdesk</b>
                <p>
                    Resolva questões técnicas, comerciais ou financeiras.
                </p>
                <a href="<?=site_url()?>cliente/novo_ticket" class="btn btn-danger btSub">Abrir novo chamado</a>
            </div>
        </div><!-- ./box_tipo_suporte2 -->
        <!--
        <div class="box_tipo_suporte2" style="width:210px">
            <div class="tit_suporte">
                <b>Dúvidas?</b>
                <p>
                    Consulte nossos textos de ajuda e aprenda a utilizar nossos serviços.
                </p>
                <a href="#" class="btn btn-inverse btSub">Consultar ajuda</a>
            </div>
        </div>
        -->
        <div class="box_tipo_suporte">
            <div class="tit_suporte">
                <b>Telefones</b>
                <p style="height:80px;">
                    Capitais e regiões metropolitanas: <br/> <b><?=$chave->TELEFONE?></b>
                    <?php if($chave->TEL_0800 != ""):?>
                    Demais localidades: <br/> <b><?=$chave->TEL_0800?></b>
                    <?php endif;?>
                </p>
             </div>
        </div><!-- ./box_tipo_suporte -->
    </div><!-- ./boxes_suporte -->
    
    <div id="duvidas_suporte" class="borda5px">
        <!--<div align="center" class="well" style="padding:10px; overflow:auto;">
            <div style="font:16px Lucida Sans, Arial, sans-serif; overflow:auto; text-align:center; width:340px;">
                
                <b style="float:left; font-weight:normal; margin-top:5px;">
                    Você ainda não criou nenhum chamado.
                </b>
            </div>
        </div>-->
        
        <div id="mainframe" style="padding:0px;"><!-- wrap -->
            <div id="central_subtit" style="padding-top:0px; margin-bottom:0px;">Chamados</div>
            
            <ul class="nav nav-tabs" id="tab1_pagamento">
                <li class="active">
                    <a href="#todos_tickets" data-toggle="tab" style="height:15px;">
                        <div class="tit_tabs">
                            <b>TODOS OS CHAMADOS</b>
                        </div>
                   </a>
                </li>
                <li>
                    <a href="#ticekts_abertos" data-toggle="tab" style="height:15px;">
                        <div class="tit_tabs">
                        <b>ABERTOS</b>
                        </div>
                   </a>
                </li>   
                <li>
                    <a href="#ticekts_resolvidos" data-toggle="tab" style="height:15px;">
                        <div class="tit_tabs">
                            <b>RESOLVIDOS</b>
                        </div>
                   </a>
                </li>
                <li>
                    <a href="#ticekts_cancelados" data-toggle="tab" style="height:15px;">
                        <div class="tit_tabs">
                            <b>CANCELADOS</b>
                        </div>
                   </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="todos_tickets">
                	
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
										<td colspan='4'><p style='text-align: center'>Não existem tickets cancelados!</p></td>
									</tr>
								 </tbody>";
							}; ?>
                        
                    </table>
                    
                </div>
                <div class="tab-pane" id="ticekts_abertos" style="padding:3px; color: #666666!important;">
                    <table class="table table-striped table-hover tabela_cicloPagamento">
                        <thead style="background-color: #eeeeee!important;">
                            <tr>
                              <th width="40%">Assunto</th>
                              <th width="20%">Data</th>
                              <th style="text-align: right;" width="20%">Status</th>
                              <th width="20%"></th>
                            </tr>
                        </thead>
                        <?php 
						if($ticekts_abertos != NULL){ 
						foreach($ticekts_abertos as $row):?>
                            <tbody>
                                
                                <tr>
                                  <td><a class="btn btn-link btn-small" style="text-transform:none; text-decoration:none; padding:2px;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>"><span class="btn-link">#<?=$row->CODIGO ?> - <?=$row->TITULO ?></span></a></td>
                                  <td><?=dateFormat($row->DATA, "d/m/Y H:i");?></td>
                                  <td>
                                  	<?php 
										switch($row->STATUS){
											case 1 : echo "<span class='label label-success status'>ABERTO</span>"; break;
											case 2 : echo "<span class='label label-info status'>ENVIADO</span>"; break;
											case 3 : echo "<span class='label label-warning status'>RESPONDIDO</span>"; break;
										}
									?>
                                  </td>
                                  <td>
                                        <a class="btn btn-link btn-small" style="text-transform:none; padding:2px; text-decoration:none;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>">
                                            <i class="ico-right-open"></i>Ver Detalhes
                                        </a>
                                  </td>
                                </tr>
                        <?php endforeach;
							} else {
							echo "<tbody>
									
									<tr>
										<td colspan='4'><p style='text-align: center'>Não existem tickets abertos!</p></td>
									</tr>
								 </tbody>";
						}; ?>
                    </table>
                </div>
                <div class="tab-pane" id="ticekts_resolvidos" style="padding:3px; color: #666666!important;">
                    <table class="table table-striped table-hover tabela_cicloPagamento">
                        <thead style="background-color: #eeeeee!important;">
                            <tr>
                              <th width="40%">Assunto</th>
                              <th width="20%">Data</th>
                              <th style="text-align: right;" width="20%">Status</th>
                              <th width="20%"></th>
                            </tr>
                        </thead>
                        <?php
						if($ticekts_resolvidos != NULL){ 
                        foreach($ticekts_resolvidos as $row):?>
                            <tbody>
                                
                                <tr>
                                  <td><a class="btn btn-link btn-small" style="text-transform:none;text-decoration:none;padding:2px;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>"><span class="btn-link">#<?=$row->CODIGO ?> - <?=$row->TITULO ?></span></a></td>
                                  <td><?=dateFormat($row->DATA, "d/m/Y H:i");?></td>
                                  <td><?=($row->STATUS == 5) ? "<span class='label label-inverse status'>RESOLVIDO</span>" : ""; ?></td>
                                  <td>
                                        <a class="btn btn-link btn-small" style="text-transform:none; padding:2px; text-decoration:none;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>">
                                            <i class="ico-right-open"></i>Ver Detalhes
                                        </a>
                                  </td>
                                </tr>
                        <?php endforeach;
						} else {
							echo "<tbody>
									
									<tr>
										<td colspan='4'><p style='text-align: center'>Não existem tickets resolvidos!</p></td>
									</tr>
								 </tbody>";
						}; ?>
                    </table>
                </div>
                
                <div class="tab-pane" id="ticekts_cancelados" style="padding:3px; color: #666666!important;">
                    <table class="table table-striped table-hover tabela_cicloPagamento">
                        <thead style="background-color: #eeeeee!important;">
                            <tr>
                              <th width="40%">Assunto</th>
                              <th width="20%">Data</th>
                              <th style="text-align: right;" width="20%">Status</th>
                              <th width="20%"></th>
                            </tr>
                        </thead>
                        <?php if($ticekts_cancelados != NULL){
						
							foreach($ticekts_cancelados as $row):?>
								<tbody>
									
									<tr>
									  <td><a class="btn btn-link btn-small" style="text-transform:none; text-decoration:none; padding:2px;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>"><span class="btn-link">#<?=$row->CODIGO ?> - <?=$row->TITULO ?></span></a></td>
									  <td><?=dateFormat($row->DATA, "d/m/Y H:i");?></td>
									  <td><?=($row->STATUS == 4) ? "<span class='label label-important status'>FECHADO</span>" : ""; ?></td>
									  <td>
											<a class="btn btn-link btn-small" style="text-transform:none; padding:2px; text-decoration:none;" href="<?=site_url()?>cliente/suporte/tickets/<?=$row->CODIGO ?>">
												<i class="ico-right-open"></i>Ver Detalhes
											</a>
									  </td>
									</tr>
							<?php endforeach;
							} else {
							echo "<tbody>
									
									<tr>
										<td colspan='4'><p style='text-align: center'>Não existem tickets cancelados!</p></td>
									</tr>
								 </tbody>";
						}; ?>
                        
                    </table>
                </div>
            </div>
             
            
        </div>

        
    </div><!-- ./duvidas_suporte -->
    
    
</div><!-- ./wrap -->