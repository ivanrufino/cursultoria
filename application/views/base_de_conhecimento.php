<?php $this->load->view('json/default');?>
<?php $this->load->view('json/config');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->

<div style=" display:block; padding:5px;">
	<div id="tit_session"><?=$nome_pagina?></div>

    <div class="table_busca_div">
    
        <img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px;" />  
        
        <div class="demo" style="float:right;"> 
            <div class="btn-group2">
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="margin-right:10px;">
                <i class="ico-wrench"></i> Opções
                <span span class="caret"></span>
              </a>
              
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a tabindex="-1" rel="bt_resolvidoTicket" style="font-size:12px;"><i class="ico-check-1"></i> Marcar como resolvido</a></li>
                  <li><a tabindex="-1" rel="bt_fechaTicket"style="font-size:12px;"><i class="ico-blocked"></i> Fechar tickets</a></li>
                  <li class="divider"></li>
                  <li><a rel="bt_delBase" style="font-size:12px;"><i class="ico-trash"></i> Excluir</a></li>
                </ul>
                <a class="btn" rel="bt_addBase"><i class="ico-pin"></i> Abrir Ticket</a>
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
                <label for="item">
                  <td><input type="checkbox" id="item" name="item[]" value="" /></td>
                    <td><a data-id="" rel="ticketDetalhes">
                            <b># </b>
                        </a>
                    </td>
                    <td><a id="" rel="exibeCliente"> XXXXX </a></td>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>
                        
                    </td>
                </label>
		</form>
              </tr>   
            </tbody>
        </table>
        </div>
        <?=form_close();?>
        <!-- ./Form de Selecionados -->
    </div> 
</div>

<!-- pop-up mudar senha -->
<div id="pop_base"></div>

<!-- pop-up altgerar dados de cadastro -->
<div id="pop_addBase"></div>
