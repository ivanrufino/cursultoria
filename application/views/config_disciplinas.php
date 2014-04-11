<?php $this->load->view('json/config');?>

<script>

</script>
<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Disciplinas</b>
</div>

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
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Exportar para CSV</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-envelope"></i> Enviar Mensagem</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" rel="deleteDisciplinas" style="font-size:12px; color:#b54646"><i class="ico-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="disciplinaAdd"><i class="ico-plus"></i> Nova Disciplina</a>
         </div>
		
    </div>
</div>

<div id="precosDominios">
	<?php if($disciplinas == NULL){?>
    
    <!-- Caso não exista nenhum registro ************************************************* -->
    <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
        <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:350px;">
            <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
            <b style="float:left; font-weight:normal; margin-top:5px;">
                Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">Disciplinas</font> no sistema.
            </b>
        </div>
    </div>
    <!-- Caso não exista nenhum registro ************************************************* -->
    <?php }else{?>
    <form class="form_selectDisciplinas" name="formulario" method="post" action="">
	<div id="users-contain" class="ui-widget">
		<table width="100%" id="users" class="ui-widget ui-widget-content dataTable display">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="80%">Descrição</th>
                <th width="20%">Categoria</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach($disciplinas as $key =>$disciplina):
        		if($key % 2){
					echo '<tr class="td_line_alter">';
				}else{
					echo '<tr class="td_line">';
				}
			?>
                <td><input type='checkbox' id='item' name='item[]' value='<?=$disciplina->CODIGO?>' /></td>
                
                <td>
                    <b><a rel='verDisciplina' data-id="<?=$disciplina->CODIGO?>">
                        <?=$disciplina->DESCRICAO?>
                    </a></b>
                </td>
                <td><?=$disciplina->CATEGORIA?></td>
             </tr>
		<?php endforeach;?>
             
             
        </tbody>
        
    </table>
    </div>
    <?php }?>
    </form>
</div><!--precosDominios-->

<!-- pop-up de operações -->
<div id="pop_disciplina" ></div>
<div id="pop_addDisciplina" style="overflow:auto"></div>
