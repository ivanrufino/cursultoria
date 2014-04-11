<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/comercial'); ?>

<div style="width:80%; float:left;">
<div class="table_busca_div" style="width:99%">

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
          	</div>
        
        </div>
        
        <a id="bt_adicionar" class="button left"><span class="icon icon3"></span><span class="label">Adicionar</span></a>
		
    </div>
</div>

    <div class="admin_list_table">
        <div id="users-contain" class="ui-widget"> 
        <table width="100%" id="users" class="ui-widget ui-widget-content">
            <thead>
                <tr class="ui-widget-header">
                    <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                    <th width="35%">Descrição</th>
                    <th width="7%">Previsão</th>
                    <th width="7%">Validade</th>
                    
                    <th width="6%">Total</th>
                    <th width="6%" align="center">Status</th>
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
                    <td>
                        <a style="font-weight:bold" id="<?=$row->id?>" rel="exibeFatura">
                            Desenvolvimento de sistema E-commerce
                        </a>
                        <p style="font-size:11px; color:#777;">Para Maptec Comércio e Resentações Ltda</p>
                    </td>
                    <td>40 dias</td>
                    <td>
                        <p style="float:left;">27/06/2012</p> <a href="#">
                        <img src="<?=site_url()?>/assets/images2/icons/flag_orange.png" border="0" class="flag" /></a>
                    </td>
                    
                    <td>R$ 2.600,00</td>
                    <td>
                    <!--<img src="<?=site_url()?>/assets/images/icons/ico_green1.png" alt="" border="0" /> On-->
                    <p class="tag_green">Aceita</p>
                    </td>
                </label>
                
              </tr>
            <?php endforeach; ?>
            
              
             
            </tbody>
        </table>
        </div>
    </div>
</div>

<div style="width:19%; float:right; margin-top:5px; background:#f3f3f3;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="border-bottom:1px dotted #ccc; padding:10px; text-align:center;" colspan="2">
        	<div style=" font:70px 'Franklin Gothic Medium Cond'; color:#666; line-height:60px; display:block;">
            	57%
            </div>
            <div style=" font:12px Arial; font-weight:bold; color:#999; display:block;">
            	Média Positiva
            </div>
        </td>
      </tr>
      <tr>
        <td style="border-bottom:1px dotted #ccc; padding:10px; text-align:left">
        	<div style=" font:13px Arial; font-weight:bold; color:#999; display:block;">
            	Aceitas
            </div>
        </td>
        <td style="border-bottom:1px dotted #ccc; padding:10px; text-align:right">
        	<div style=" font:28px 'Franklin Gothic Medium Cond'; color:#666; line-height:25px; display:block;">
            	12
            </div>
        </td>
      </tr>
      <tr>
        <td style="border-bottom:1px dotted #ccc; padding:10px; text-align:left">
        	<div style=" font:13px Arial; font-weight:bold; color:#999; display:block;">
            	Recusadas
            </div>
        </td>
        <td style="border-bottom:1px dotted #ccc; padding:10px; text-align:right">
        	<div style=" font:28px 'Franklin Gothic Medium Cond'; color:#666; line-height:25px; display:block;">
            	3
            </div>
        </td>
      </tr>
      <tr>
        <td style="padding:10px; text-align:left">
        	<div style=" font:13px Arial; font-weight:bold; color:#999; display:block;">
            	Enviadas
            </div>
        </td>
        <td style="padding:10px; text-align:right">
        	<div style=" font:28px 'Franklin Gothic Medium Cond'; color:#666; line-height:25px; display:block;">
            	5
            </div>
        </td>
      </tr>
    </table>

</div>


<!-- pop-up de operações -->
<div id="pop_view"></div>