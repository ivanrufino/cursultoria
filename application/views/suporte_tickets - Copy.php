<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>
<?php //$this->load->view('json/suporte');?>

<script type="text/javascript">

	$('.easyui-tabs').tabs();

</script>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<!--
<div class="table_busca_div">

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
                <th width="5%">Nº Chamado</th>
                <th width="8%">Departamento</th>
                <th width="12%">Categoria</th>
                <th width="14%">Cliente</th>
                <th width="7%">Data</th>
                <th width="5%" align="center">Status</th>
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
              	<td><a id="<?=$row->id?>" rel="exibeTicket"><b>#00910293</b></a></td>
                <td>Comercial / Vendas</td>
                <td>UniPago (ex-KingBank)</td>
                <td>Maptec Comércio e Resentações Ltda</td>
                <td>23/08/2011 10:35</td>
                <td><p class="tag_yellow">Aguardando</p></td>
            </label>
            
          </tr>
        <?php endforeach; ?>
        
          
         
        </tbody>
    </table>
    </div>
</div>
-->





<div id="lista_chamados" style="height:540px;">

	<div class="table_busca_div" style="margin:0px; padding-left:0px; background:#e8e8e8; border:0px;">

<!--<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    <form name="formulario" id="deleteItem" method="post" action="?action=del">-->

    <div class="demo" style="float:right;"> 
    
            <div class="dropdown">
                <a href="#" class="button" style="width:175px">
                    <span class="icon icon96"></span><span class="label">Opções</span><span class="toggle"></span>
                </a>
                <div class="dropdown-slider">
                    <a class="ddm">
                        <span class="icon icon127"></span><span class="label">Atribuir um Operador</span>
                    </a>
                    <!--
                    <a class="ddm" id="bt_exportar">
                        <span class="icon icon67"></span><span class="label">Exportar para CSV</span>
                    </a>
                    <a class="ddm">
                        <span class="icon icon125"></span><span class="label">Enviar Mensagem</span>
                    </a>
                    <a class="ddm">
                        <span class="icon icon167"></span><span class="label">Configurações</span>
                    </a>
                    -->
                    <a class="ddm">
                        <span class="icon icon177"></span><span class="label">Acompanhar</span>
                    </a>
                    
                    <a class="ddm"id="bt_excluir">
                        <span class="icon icon186"></span><span class="label">Excluir</span>
                    </a>
                    <a class="ddm">
                        <span class="icon icon151"></span><span class="label">Fechar Ticket</span>
                    </a>
                </div>
            
            </div>
            
            <a id="bt_adicionar" class="button left"><span class="icon icon3"></span><span class="label">Adicionar</span></a>
            
        </div>
    </div>

<!-- ******************************************************* L I S T A   D E   C H A M A D O S **************************************** -->
    <div id="cont_lista_chamados" style="height:480px;">
        <div class="admin_list_table" style="float:left;">
            <div id="users-contain" class="ui-widget">
            <table width="100%" id="users" class="ui-widget ui-widget-content">
                <thead>
                    <tr class="ui-widget-header">
                        <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                        <th width="99%">Descricão</th>
                    </tr>
                </thead>
                <tbody>

                <?php for($i = 0; $i < 12; $i++):
				
                    if($i % 2){
                        echo '<tr class="td_line_alter">';
                    }else{
                        echo '<tr class="td_line">';
                    }
                ?>
                <!--<tr class="td_line">-->
                    <label for="item">
                      <td valign="top"><input type="checkbox" id="item" name="item[]" value="1" /></td>
                      <td style="padding:5px 0;">                          
                          
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="float:left; border:0px;">

                              <tr>
                                <td style="font:12px Tahoma; padding:2px 0 0 5px; width:230px; border:0px; float:left;">
                                	<a style=" color:#666;" id="1" rel="">Ajuda para configurar o DNS</a>
                                </td>
                                <td style="font:12px Tahoma; padding:2px; color:#666;  border:0px; float:right;">
                                	03/08
                                </td>
                              </tr>
                              
                              <tr>
                                <td style="font:11px Arial; color:#909090; padding:2px 0 0 5px; width:230px; border:0px; float:left;">
                                	Configuração de DNS Linux
                                </td>
                                <td style=" padding:2px; border:0px; float:right;">
                                	<img style="float:left; margin-right:3px;" src="<?=site_url()?>/assets/img/icons/32x32/flag_red.png" />
                                </td>
                              </tr>
                              
                          </table>

                      </td>
                        
                    </label>
                  </tr>
                <?php endfor; ?>
                 
                </tbody>
            </table>
            </div>
        </div> 
    </div><!-- ./cont_lista_chamados -->
</div>

<!-- ******************************************************* L I S T A   D E   C H A M A D O S **************************************** -->
<div id="content_chamados" style="height:515px">
	<div style="display:block; overflow:hidden; background:#f7f7f7;">
        <div class="header_cliente_chamado"><b>Cliente:</b> Fulano de tal</div>
        <div class="header_cliente_chamado"><b>Última modificação:</b> 03/08/2012 16:10</div>
        <div class="header_cliente_chamado"><b>Domínio:</b> codemax.com.br</div>
    </div>
    
	<div class="tit_chamado">Ajuda para configurar o DNS</div>
    <div id="perfil_chamado">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="label_perfil_chamado" style="width:25%;">Ticket ID</td>
            <td class="label_perfil_chamado" style="width:30%;">Departamento</td>
            <td class="label_perfil_chamado" style="width:20%;">Atribuído</td>
            <td class="label_perfil_chamado" style="float:right; width:17%;">Status</td>
          </tr>
          <tr>
            <td>SNH-082012-00001</td>
            <td>Comercial / Vendas</td>
            <td>Lucas Maia</td>
            <td><div class="tag_yellow" style="margin:0px; float:right;">Aguardando operador</div></td>
          </tr>
        </table>        
    </div>
    
    <div class="easyui-tabs" fit="true" border="false" id="tt" style="background:#f1f1f1; padding:5px;">
        <ul>
            <li><a href="#tabs-1">Mensagens</a></li>
            <li><a href="#tabs-2">Anexos</a></li>
            <li><a href="#tabs-3">Dados de Acesso</a></li>
        </ul>
        <div id="tabs-1" style="overflow:hidden;">
        	Mensagens
        </div>
        <div id="tabs-2" style="overflow:hidden;">
        	Anexos
        </div>
        <div id="tabs-3" style="overflow:hidden;">
        	Dados de Acesso
        </div>
    
    </div>
</div>

<!-- pop-up de operações -->
<div id="pop_view"></div>