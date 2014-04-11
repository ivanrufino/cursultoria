<!--<?php $this->load->view('json/default');?>-->
<?php $this->load->view('json/config');?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Bibliografia</b>
</div>

<div class="table_busca_div">
	<div class="fl_right">
        <img src="<?=site_url()?>assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Buscar:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif" />  
	</div>
    <div class="demo" style="float:left;"> 
    	<a class="btn btn-primary" rel='addLivro'>Adicionar Bibliografia</a>
        
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
              <li><a class="ico-trash" rel="deleteLivros" style="font-size:12px; color:#b54646">Excluir</a></li>
            </ul>
            
         </div>
    </div>
</div>

<form id="form_selecLivros"  class="form_selecLivros" name="formulario" method="post" action="">
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
        if($bibliografias!=NULL){
        foreach($bibliografias as $key =>$bibliografia):
            if($key % 2){
          echo '<tr class="td_line_alter">';
        }else{
          echo '<tr class="td_line">';
        }
      ?>
      <label for="item">
                <td><input type='checkbox' id='item' name='item[]' value='<?=$bibliografia->CODIGO?>' /></td>
                
                <td valign="top">
                    <b><a rel='exibeLivro' id="<?=$bibliografia->CODIGO?>" data-id="<?=$bibliografia->CODIGO?>">
                       <img src="<?=site_url()?>uploads/livros/<?=$bibliografia->FOTO?>" style="float: left; width: 50px; margin-right: 10px;" />
                       <b><?=$bibliografia->DESCRICAO?></b><br />
                        Autores: <?=$bibliografia->AUTOR ?>
                    </a>
                </td>
                 <td valign="top"><a id="CODIGO" rel="verEditora"><?=$bibliografia->NOME_EDITORA?></a></td>
                  <td valign="top"><?=$bibliografia->EDICAO?> - <?=$bibliografia->ANO?></td>
                  <?php $video="";
                  if ($bibliografia->TIPO =='Video') {$video="label-warning";} ?>
                <td valign="top"><p class="label <?=$video; ?> " style="padding:5px;"><?=$bibliografia->TIPO?></p>
                    <!--<p class="label label-warning" style="padding:5px;">Vídeo</p>-->
                </td>
                 </label>
             </tr>
    <?php endforeach;
    }else{?>
      <td colspan="5">Não existem Bibliografias cadastradas</td>
      
    <? }
    ?>
    

        </tbody>
    </table>
    </div>
</div>

<div id="pop_addLivro"></div>

<div id="pop_viewLivro"></div>
