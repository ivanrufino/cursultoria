<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>assets/images2/icons/home3.png" />
    <p>Home » Cadastros » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
<div id="tit_session">Alunos</div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/cadastros'); ?>

<div class="table_busca_div">
	<div class="fl_right">
        <img src="<?=site_url()?>assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Buscar:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif" />  
	</div>
    <div class="demo" style="float:left;"> 
    	<a class="btn btn-primary ico-user-add" rel='addCliente'>Adicionar contato</a>
        
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" style="margin-right:10px;">
            Ações 
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a class="ico-print" style="font-size:12px;">Imprimir</a></li>
              <li><a class="ico-upload" style="font-size:12px;">Importar contatos</a></li>
              <li><a class="ico-th" style="font-size:12px;">Exportar para CSV</a></li>
              <li><a class="ico-mail" rel="enviaMensagem" style="font-size:12px;">Enviar Mensagem</a></li>
              <li class="divider"></li>
              <li><a class="ico-trash" rel="delCliente" style="font-size:12px; color:#b54646">Excluir</a></li>
            </ul>
            
         </div>
    </div>
</div>

<div class="admin_list_table">
	<!-- Form de Selecionados -->    
    <form id="select_clientes" name="formulario" method="post" action="">
	<div id="users-contain" class="ui-widget">
    <table width="100%" id="list_cadastros" class="ui-widget ui-widget-content dataTable display">
        <thead id="seletor" title="<?=$nome_pagina?>">
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" class="selectAll" /></th>
                <th width="18%">Nome Completo</th>
                <th width="10%">Fone</th>
                <th width="16%">E-mail</th>
                <th width="12%">CPF / CNPJ</th>
                <th width="8%" align="center">Cidade</th>
                <th width="8%" align="center">Ativo</th>
            </tr>
        </thead>
        <tbody>        
        <?php
        
			foreach($lista_cadastros as $key =>$row):
			if($key % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
		?>
        
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
              	<td><a id="<?=$row->CODIGO?>" rel="exibeCliente"><i class="ico-user"></i> <?=$row->NOME_COMPLETO?>
                    </a>
                </td>
                <td><?=$row->TELEFONE?></td>
                <td>
                	<a href="#">
                    	<img src="<?=site_url()?>assets/images2/icons/email.png" alt="" border="0" /> 
						<?=$row->EMAIL?>
                    </a>
                </td>
                <td><?php echo  $row->CPF; ?></td>
              
                <td><?=$row->CIDADE?></td>
                 <td >
                        	<?=($row->STATUS == 1) ? '<p class="tag_green">Sim</p>': '<p class="tag_red">Não</p>';?>
                        </td>
            </label>
            
          </tr>
        <?php endforeach;?>
        
        </tbody>
    </table>
    </div>
    <?=form_close();?>
    <!-- ./Form de Selecionados -->
</div> 


</div>
<!-- pop-up de operações -->
<div id="pop_view"></div>
<div id="add_view"></div>
<div id="pop_enviaMensagem"></div>