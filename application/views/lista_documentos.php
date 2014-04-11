
<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » Documentos » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php //$this->load->view('buttons/_blank'); ?>

<div class="table_busca_div">

	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />  
    
    <form id="form_selecionados" name="formulario" method="post" action="">
	
    <div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="font-family:Arial, Helvetica, sans-serif; padding:6px; margin-right:10px; font: 12px Arial, Helvetica, sans-serif; font-weight: bold;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Fazer Backup</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-envelope"></i> Marcar como Absoleto</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" rel="excluir" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="addDocumento"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>



<div class="admin_list_table">
	<!-- Form de Selecionados -->
    
	<div id="users-contain" class="ui-widget">
    <table width="100%" id="list_cadastros" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="35%">Descrição</th>
                <th width="10%">Arquivo</th>
                <th width="5%">Tamanho</th>
                
                <th width="15%">Autor</th>
                <th width="8%" align="center">Criado</th>
                <th width="2%" align="center">Permissão</th>
            </tr>
        </thead>
        <tbody>        
        <?php
			if($lista_documentos == NULL){?>

			<tr class="td_line">
            	<td colspan="8" height="30" align="center">
                	<div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:380px;">
                    	<img src="<?=site_url()?>assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                        <b style="float:left; font-weight:normal; margin-top:5px;">
                        	Ainda não existem <font style="text-transform:lowercase; font-weight:bold;"><?=$nome_pagina?></font> no seu sistema.
                        </b>
                    </div>
                </td>
            </tr>
				<?php

                    }else{
                        foreach($lista_documentos as $key =>$row):
                        if($key % 2){
                            echo '<tr class="td_line_alter">';
                        }else{
                            echo '<tr class="td_line">';
                        }

                ?>
        	<tr class="td_line">
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="<?=$row->CODIGO?>" /></td>
              	<td>
                    <a data-id="<?=$row->CODIGO?>" rel="exibeDocumento">
                    	<img src="<?=site_url()?>assets/images2/icons/file.png" />
                    	<b><?=$row->DESCRICAO?> - Rev.<?=$row->REVISAO?></b>
                    </a>
                </td>
                <td>
                	<a data-id="<?=$row->ARQUIVO?>" rel="baixarDocumento" class="btn btn-mini">
                    	<!--<img src="<?=site_url()?>/assets/images2/icons/ico_save1.png" alt="" border="0" /> -->
                        <i class="icon-download-alt"></i>
						Download
                    </a>
                </td>
                <td><?=fileFormat($row->TAMANHO)?></td>
                
                <td><?=$this->users->nomeUsuario($row->AUTOR)?></td>
                <td><?=dateFormat($row->DATA, "d/m/Y H:i")?></td>
                <td><?=$row->GRUPO_ACESSO?><!-- <p class="tag_green">Admin</p>--></td>
            </label>
            
          </tr>
        <?php endforeach;}?>
        
          
         
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