<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>
<?php $this->load->view('json/financeiro');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session">Gerenciar Cobranças</div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/financeiro'); ?>

<div class="table_busca_div">


	<div class="fl_right">
    	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Buscar:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    </div>

    <div class="demo" style="float:left;"> 
    		<a class="btn btn-primary ico-dollar" rel="addFatura">Efetuar cobrança</a>
            
            <div class="btn-group2">
                <a class="btn dropdown-toggle" data-toggle="dropdown" style="margin-right:10px; ">
                    Ações
                    <span span class="caret"></span>
                </a>
              
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a class="ico-download" style="font-size:12px;">Alterar vencimento</a></li>
                  <li><a class="ico-mail" style="font-size:12px;">Reenviar</a></li>
                  <li><a class="ico-mail" style="font-size:12px;">Enviar mensagem</a></li>
                  <li><a class="ico-mail" style="font-size:12px;">Confirmar pagamento</a></li>
                  <li><a class="ico-mail" style="font-size:12px;">Cancelar</a></li>
                  <li class="divider"></li>
                  <li><a class="ico-trash" rel="delFatura" style="font-size:12px; color:#b54646">Excluir</a></li>
                </ul>
            
            </div>
            
     </div>
</div>

<div class="admin_list_table">
	<form name="formulario" id="deleteFaturas" method="post" action="?action=del">
    <div id="users-contain" class="ui-widget"> 
    
    <table width="100%" id="users" class="ui-widget ui-widget-content dataTable display">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" class="selectAll" /></th>
                <th width="7%">Nº da Fatura</th>
                <th width="16%">Destinatário</th>
                <th width="9%">Emissão</th>
                <th width="9%">Vencimento</th>
                <th width="6%">Valor</th>
                <th width="8%" align="center">Status</th>
            </tr>
        </thead>
        <tbody>
        
		<?php
		foreach($lista_faturas as $key =>$row):
			if($key % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
			
			$cadastro = $this->cadastros->get_id($row->CLIENTE);
		?>
        
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
              	<td><a id="<?=$row->CODIGO?>" rel="exibeFatura"><b>#<?=$row->CODIGO?></b></a></td>
                
                <td><a id="<?=$cadastro->CODIGO?>" rel="exibeCliente"><?=$cadastro->RAZAO_NOME?></a></td>
                <td><p style="float:left;"><?=dateFormat($row->DATA, "d/m/Y")?></p></td>
                <td><p style="float:left;"><?=dateFormat($row->VENCIMENTO, "d/m/Y")?></p> <a href="#"><img src="<?=site_url()?>/assets/images2/icons/flag_orange.png" border="0" class="flag" /></a></td>
                <td>R$ <?=numFormat($row->VALOR)?></td>
                <td>
				<?php switch($row->STATUS){
					case 'nao pago': echo '<p class="tag_red">Não Pago</p>'; break;
					case 'em aberto': echo '<p class="tag_yellow">Aguardando Pagto</p>'; break;
					case 'pago': echo '<p class="tag_green">Pago</p>'; break;
				}
				?>
                </td>
            </label>
            
          </tr>
        <?php endforeach;?>

         
        </tbody>
    </table>
    </div>
    </form>
</div>

</div>
<!-- pop-up de operações -->
<div id="pop_view"></div>
<div id="pop_faturas"></div>
<div id="pop_addFatura"></div>
<div id="pop_confirmaPagamento"></div>