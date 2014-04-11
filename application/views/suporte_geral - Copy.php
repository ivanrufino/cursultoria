<?php $this->load->view('json/suporte');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » Cadastros » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/suporte_tickets'); ?>

<div class="table_busca_div">

	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />  
    <div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="font-family:Arial, Helvetica, sans-serif; padding:6px; margin-right:10px; font: 12px Arial, Helvetica, sans-serif; font-weight: bold;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" rel="bt_resolvidoTicket" style="font-size:12px;"><i class="ico-check-1"></i> Marcar como resolvido</a></li>
              <li><a tabindex="-1" rel="bt_fechaTicket"style="font-size:12px;"><i class="ico-blocked"></i> Fechar tickets</a></li>
              <li class="divider"></li>
              <li><a rel="bt_deletaTickets" style="font-size:12px;"><i class="ico-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" href="#"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>

<div class="admin_list_table">
	<!-- Form de Selecionados -->    
	<form id="select_clientes" name="formulario" method="post" action="">
	<div id="users-contain" class="ui-widget">
    <table width="100%" id="list_cadastros" class="ui-widget ui-widget-content dataTable display">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" class="selectAll" /></th>
                <th width="30%">Assunto</th>
                <th width="10%">Cliente</th>
                <th width="12%">Departamento</th>
                <th width="9%" align="center">Criado</th>
                <th width="2%" align="center">Status</th>
            </tr>
        </thead>
        <tbody>  
			<?php
			
            if($lista_tickets == NULL){?>
                <tr class="td_line">
                    <td colspan="8" height="30" align="center">
                        <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:360px;">
                            <img src="<?=site_url()?>assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                            <b style="float:left; font-weight:normal; margin-top:5px;">
                                Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">tickets</font> nessa situação.
                            </b>
                        </div>
                    </td>
                </tr>
            <?php
                }else{
                    foreach($lista_tickets as $key =>$row):
						if($key % 2){
							echo '<tr class="td_line_alter">';
						}else{
							echo '<tr class="td_line">';
						}
                    
                $cadastro = $this->cadastros->getDados($row->CLIENTE);
			?>
        	
            <label for="item">
            
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
              	<td><a data-id="<?=$row->CODIGO?>" rel="ticketDetalhes">
                		<b>#<?=$row->CODIGO?> - <?=$row->TITULO?></b>
                    </a>
                </td>
                <td><a href="#"><?=($cadastro->TIPO_PESSOA == "juridica") ? $cadastro->RAZAO_SOCIAL : $cadastro->NOME_COMPLETO?></a></td>
                <td>Suporte Técnico</td>
                <td><?=dateFormat($row->DATA, "d/m/Y H:i")?></td>
                <td>
                	<?php 
					switch($row->STATUS){
						case 1: echo "<span class='tag_green'>ABERTO</span>"; break;
						case 2: echo "<span class='tag_yellow'>PENDENTE</span>"; break;
						case 3: echo "<span class='tag_blue'>RESPONDIDO</span>"; break;
						case 4: echo "<span class='tag_red'>FECHADO</span>"; break;
						case 5: echo "<span class='tag_black'>RESOLVIDO</span>"; break;
					}
					?>
                </td>
            </label>
            
          </tr>
        <?php endforeach;}?>
		</form>
        </tbody>
    </table>
    </div>
    <!-- ./Form de Selecionados -->
</div> 


</div>
<!-- pop-up de operações -->
<div id="pop_ticketDetalhes"></div>
<div id="add_view"></div>