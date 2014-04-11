<?php //$this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session">Projetos Contratados</div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/cadastros'); ?>





<div class="table_busca_div">
    
    <div class="fl_right">
    	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
        <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Buscar:</font>
        <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    </div>

    <div class="demo" style="float:left;"> 
    		<a class="btn btn-primary ico-plus" rel="addServico">Adicionar Projeto</a>
            
            <div class="btn-group2">
                <a class="btn dropdown-toggle" data-toggle="dropdown" style="margin-right:10px; ">
                    Ações
                    <span span class="caret"></span>
                </a>
              
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a class="ico-download" style="font-size:12px;">Exportar para CSV</a></li>
                  <li><a class="ico-ccw" style="font-size:12px;">Reativar</a></li>
                  <li><a class="ico-block" style="font-size:12px;">Suspender</a></li>
                  <li class="divider"></li>
                  <li><a class="ico-trash" rel="excluirSelecionados" style="font-size:12px; color:#b54646">Excluir</a></li>
                </ul>
            
            </div>
            
     </div>
</div>
<!-- ./table_busca_div -->
	
    <?php foreach($lista_categorias as $categoria):?>   	
	
        <div class="accordion" id="lista_servicos" style="float:left; width:100%;">
            <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#lista_servicos" href="#<?=limpaChars($categoria->DESCRICAO);?>">
                
                <?php 

				
				$lista_produtos = $this->servicos->getByCatg($categoria->CODIGO);				
				?>
                
                <?=$categoria->DESCRICAO;?> &nbsp;(<?=($lista_produtos == NULL) ? 0 : count($lista_produtos)?>)
              </a>
            </div>
            <div id="<?=limpaChars($categoria->DESCRICAO);?>" class="accordion-body collapse">
            <?php if($lista_produtos == NULL){?>
    
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
                <table width="100%" id="users" class="ui-widget ui-widget-content dataTable display">
                    <thead>
                        <tr class="ui-widget-header">
                            <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                            
                            <th width="28%">Curso</th>
                            
                            <th width="18%">Aluno</th>
                            <th width="7%">Ciclo Atual</th>
                            <th width="8%" align="center">Vencimento</th>
                            <th width="2%" align="center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($lista_produtos as $key =>$row):
						
						$produto = $this->produtos->getProdutosById($row->COD_PRODUTO);
						switch ($row->CICLO) {
							case 'mensal': 	   $valor = $produto->PRECO_MENSAL; break;
							case 'trimestral': $valor = $produto->PRECO_TRIMESTRAL; break;
							case 'semestral':  $valor = $produto->PRECO_SEMESTRAL; break;
							case 'anual': 	   $valor = $produto->PRECO_ANUAL; break;
							case 'bienal': 	   $valor = $produto->PRECO_BIENAL; break;
						}
						
						$cadastro = $this->cadastros->get_id($row->CLIENTE);
						
                        if($key % 2){
                            echo '<tr class="td_line_alter">';
                        }else{
                            echo '<tr class="td_line">';
                        }
                    ?>
                    
                        
                          <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
                          	
                            
                            <td><a data-id="<?=$row->CODIGO?>" rel="exibeServico"><b>
							BB, CEF e BASA (Escriturário/Técnico Bancário)</b>
                            </a></td>
                            
                            <td><a id="<?=$cadastro->CODIGO?>" rel="exibeCliente"><?=$cadastro->RAZAO_NOME?></a></td>
                            <td>Ciclo 1</td>
                            <td><?=dateFormat($row->PROX_VENCIMENTO, "d/m/Y")?></td>
                            <td><?=($row->STATUS == 1) ? '<p class="tag_green">Ativo</p>' : '<p class="tag_red">Inativo</p>';?></td>
                        
                        
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


</div>
<!-- pop-up de operações -->
<div id="pop_view"></div>
<div id="pop_viewServico"></div>
<div id="pop_addServico"></div>