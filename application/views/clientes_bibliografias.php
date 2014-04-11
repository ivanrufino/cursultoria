<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session">Bibliografias</div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/cadastros'); ?>

<div class="table_busca_div">
	<div class="fl_right">
        <img src="<?=site_url()?>assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Buscar:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif" />  
	</div>
    <div class="demo" style="float:left;"> 
    	<a class="btn btn-primary" rel='addCliente'>Adicionar Bibliografia</a>
        
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

<form id="form_selecionados" name="formulario" method="post" action="">
<div class="admin_list_table">
    <div id="users-contain" class="ui-widget"> 
    <table width="100%" id="users" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="40%">Descrição</th>
                <th width="10%">Editora</th>
                <th width="10%">Edição</th>
                <th width="9%">Tipo</th>
                
            </tr>
        </thead>
        <tbody>
        
		<?php 
		/*foreach($lista_dominios as $key =>$row):
			if($key % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
			
			$cadastro = $this->cadastros->get_id($row->CLIENTE);
			*/
		?>
        
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="CODIGO" /></td>
              	<td valign="top">
                	<a id="CODIGO" rel="exibeLivro">
                        <img src="<?=site_url()?>uploads/livros/teste.jpg" style="float: left; width: 50px; margin-right: 10px;" />
                        
                        <b>Como Estudar Direito Constitucional para Concursos</b><br />
                        Autores: Marcelo Alexandrino e Vicente Paulo, Frederico Dias
                    </a>
                </td>
                <td valign="top">
                	<a id="CODIGO" rel="exibeCliente">Editora Abril</a>
                    
                </td>
                <td valign="top">
					2ª - 2013
                
                </td>
                <td valign="top">
					<p class="label" style="padding:5px;">Leitura</p>
                    <p class="label label-warning" style="padding:5px;">Vídeo</p>
                </td>
                
                
            </label>
            
          </tr>
        <?php //endforeach; ?>

        </tbody>
    </table>
    </div>
</div>

</div>
<!-- pop-up de operações -->
<div id="pop_addDominioCliente"></div>
<div id="pop_viewLivro"></div>