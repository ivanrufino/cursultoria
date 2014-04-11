<?php $this->load->view('json/config');?>
<?php $this->load->view('json/config_projetos');?>
<?php $this->load->view('json/multselect');?>

<div class="breadcumb borda5px">
    <a onclick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b><?=$nome_pagina?></b>
</div>

<div class="table_busca_div">

	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />  
    
    
	
    <div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="margin-right:10px;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Exportar para CSV</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-tag"></i> Gerenciar Categorias</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" href="#" rel="excluirSelecionados" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="projetoAdd"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>
<!-- ./table_busca_div -->
	
    <?php foreach($lista_categorias as $categoria):?>   	
	
        <div class="accordion" id="lista_servicos" style="float:left; width:100%;">
            <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#lista_servicos" href="#cod_<?=limpaChars($categoria->CODIGO);?>">
                
                <?php 
				$lista_projetos = $this->projetos->getProjetosByCatg($categoria->CODIGO);
				?>
                
                <?=$categoria->DESCRICAO;?> &nbsp;(<?=count($lista_projetos)?>)
              </a>
            </div>
           
            <div id="cod_<?=limpaChars($categoria->CODIGO);?>" class="accordion-body collapse">
                
            <?php if($lista_projetos == NULL){?>
                
            <!-- Caso não exista nenhum registro ************************************************* -->
            <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
                <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:320px;">
                    <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                    <b style="float:left; font-weight:normal; margin-top:5px;">
                        Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">projetos</font> nesta categoria.
                    </b>
                </div>
            </div>
            <!-- Caso não exista nenhum registro ************************************************* -->
            <?php }else{?> 
            <script type="text/javascript">
				$('#all_<?=limpaChars($categoria->DESCRICAO);?>').toggle(
					
					function() {
						$('.table_<?=limpaChars($categoria->DESCRICAO);?> .ck_<?=limpaChars($categoria->DESCRICAO);?>').prop('checked', true);
						$(".ck_<?=limpaChars($categoria->DESCRICAO);?>").parent().parent('.td_line, .td_line_alter').addClass("td_line_selected");
					},
					function() {
						$('.table_<?=limpaChars($categoria->DESCRICAO);?> .ck_<?=limpaChars($categoria->DESCRICAO);?>').prop('checked', false);
	
						$(".ck_<?=limpaChars($categoria->DESCRICAO);?>").parent().parent('.td_line, .td_line_alter').removeClass("td_line_selected");
					}
				);
            </script>
            <form class="form_select" name="formulario" method="post" action="">
            <div id="users-contain" class="ui-widget">
                <table width="100%" id="users" class="table_<?=limpaChars($categoria->DESCRICAO);?> ui-widget ui-widget-content">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" id="all_<?=limpaChars($categoria->DESCRICAO);?>" /></th>
                            <th width="20%">Nome</th>
                            <th width="20%">Descricão</th>
                            <th width="20%" colspan="2" style="text-align:center">Disciplinas</th>
                            <th width="20%">Data</th>
                            <th width="15%">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
        
                    <?php 
					foreach($lista_projetos as $key =>$row):
						
						
                        if($key % 2){
                            echo '<tr class="td_line_alter">';
                        }else{
                            echo '<tr class="td_line">';
                        }
                    
                    ?>
                    <!--<tr class="td_line">-->
                    <label for="item" style="margin:0px;">
                      <td><input type="checkbox" id="item" class="ck_<?=limpaChars($categoria->DESCRICAO);?>" name="item[]" value="<?=$row->CODIGO?>" /></td>
                        <td>
                            <a id="<?=$row->CODIGO?>" rel="projetoDetalhe">
                                <b><?=$row->NOME?></b>
                            </a>
                        </td>
                        <td ><?=$row->DESCRICAO?></td>
                        <td ><a id="<?=$row->CODIGO?>" rel="verDisciplinas"><b>Ver disciplinas</b></a>  </td>
                        <td > <a id="<?=$row->CODIGO?>" data-id="<?=$row->CODIGO?>" rel="vincularDisciplinas"><b>Vincular disciplinas</b></a></td>
                        <td ><?=$row->DATA?></td>
                        <td>
                        	<?=($row->STATUS == 1) ? '<p class="tag_green">Sim</p>': '<p class="tag_red">Não</p>';?>
                        </td>
                    </label>
                 </tr>
                 <?php endforeach; ?>
                </tbody>
            </table>
        	</div>
            </form>
			<?php }?>
        </div>
      </div><!-- ./accordion-group -->
      
      
      
      <?php endforeach;?>
    </div>

<!--</div>-->
<!-- ************************************************* -->


<div id="pop_addProjeto"></div>
<div id="pop_projeto"></div>
<div id="pop_vincularDisciplina"></div>