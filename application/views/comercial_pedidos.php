<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>
<?php $this->load->view('json/financeiro');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/comercial'); ?>

<div class="table_busca_div">

<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    <form name="formulario" id="deleteItem" method="post" action="?action=del">

	<div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="font-family:Arial, Helvetica, sans-serif; padding:6px; margin-right:10px; font: 12px Arial, Helvetica, sans-serif; font-weight: bold;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Exportar para CSV</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-envelope"></i> Enviar Mensagem</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" href="#"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>


<div class="admin_list_table">
    <div id="users-contain" class="ui-widget"> 
    <table width="100%" id="users" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="7%">Nº do Pedido</th>
                <th width="9%">Data</th>
                <th width="16%">Cliente</th>
                <th width="11%">Forma de Pagamento</th>
                <th width="5%">Total</th>
                <th width="8%" align="center">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        	if($lista_pedidos == NULL){?>
				<tr class="td_line">
            	<td colspan="8" height="30" align="center">
                	<div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:360px;">
                    	<img src="<?=site_url()?>assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                        <b style="float:left; font-weight:normal; margin-top:5px;">
                        	Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">pedidos</font> no seu sistema.
                        </b>
                    </div>
                </td>
            </tr>
            <?php
			}else{
			foreach($lista_pedidos as $key =>$row):
			if($key % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
		?>
        
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
              	<td><a id="<?=$row->CODIGO?>" rel="exibePedido"><b>#<?=sprintf("%011d", $row->CODIGO)?></b></a></td>
                <td><?=dateFormat($row->DATA)?></td>
                <td><a href="#"><?=$this->cadastros->isThis($row->CLIENTE)?></a></td>
                <td>
                <?php switch($row->FORMA_PAGTO){
					case 'boleto': echo "Boleto Bancário"; break;
					case 'cartao': echo "Cartão de Crédito"; break;
				}?>
                </td>
                <td>R$ <?=numFormat($row->VALOR)?></td>
                <td><?php switch($this->pedidos->getStatus($row->CODIGO)){
					case 0: echo '<p class="tag_red">Cancelado</p>'; break;
					case 1: echo '<p class="tag_yellow">Pendente</p>'; break;
					case 2: echo '<p class="tag_green">Completo</p>'; break;
				}?>
                </td>
            </label>
            
          </tr>
        <?php endforeach;
			}?>
        
          
         
        </tbody>
    </table>
    </div>
</div>


</div>
<!-- pop-up de operações -->
<div id="pop_faturas"></div>