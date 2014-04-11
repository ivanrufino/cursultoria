<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>
<?php //$this->load->view('json/produto');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » Estoque » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->

<div style=" display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/estoque'); ?>

<div class="table_busca_div" style="margin-bottom:10px;">
    <img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    <form name="formulario" id="deleteItem" method="post" action="?action=del">
    <div class="demo" style="float:right;">
        
        <div class="dropdown">
          	<a href="#" class="button" style="width:155px">
          		<span class="icon icon96"></span><span class="label">Opções</span><span class="toggle"></span>
            </a>
          	<div class="dropdown-slider">
                <a class="ddm">
                    <span class="icon icon127"></span><span class="label">Exibir Perfil</span>
                </a>
                <a class="ddm" id="bt_exportar">
                    <span class="icon icon67"></span><span class="label">Exportar para CSV</span>
                </a>
                <a class="ddm">
                    <span class="icon icon125"></span><span class="label">Enviar Mensagem</span>
                </a>
                <a class="ddm">
                    <span class="icon icon167"></span><span class="label">Configurações</span>
                </a>
                <a class="ddm">
                    <span class="icon icon145"></span><span class="label">Editar</span>
                </a>
                <a class="ddm"id="bt_excluir">
                    <span class="icon icon186"></span><span class="label">Excluir</span>
                </a>
                <a class="ddm">
                    <span class="icon icon151"></span><span class="label">Desligar</span>
                </a>
          	</div> <!-- /.dropdown-slider -->
        
        </div> <!-- /.dropdown -->
        
        <a id="bt_adicionar" class="button left"><span class="icon icon3"></span><span class="label">Adicionar</span></a>

    </div>
</div>

<div class="admin_list_table">
    <div id="users-contain" class="ui-widget"> 
    <table width="100%" id="users" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="5%">Nº Produto</th>
                <th width="8%">Série / Modelo</th>
                <th width="25%">Descrição</th>
                <th width="4%">Unidade</th>
                <th width="6%">Preço</th>
                <th width="5%" align="center">Estoque</th>
            </tr>
        </thead>
        <tbody>
        
		<?php foreach($lista_pedidos as $key =>$row):
			if($key % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
		?>
        
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->id?>" /></td>
              	<td><a id="<?=$row->id?>" rel="exibeProduto"><b>#00910293</b></a></td>
                <td>MTC2420</td>
                <td>GPS Aquarius Discovery 4,3" Slim</td>
                <td>UN</td>
                <td>R$ 321,10</td>
                <td>
                	<!--<img src="<?=site_url()?>/assets/images/icons/ico_warning.png" style="float:left;" border="0" />-->
                	<p class="tag_yellow">250</p>
                </td>
            </label>
            
          </tr>
        <?php endforeach; ?>
        
          
         
        </tbody>
    </table>
    </div>
</div>
</div>

<!-- pop-up de operações -->
<div id="pop_view"></div>