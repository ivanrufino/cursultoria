<?php $this->load->view('json/config');?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Departamentos de Suporte</b>
</div>

<div class="table_busca_div">

	<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />  
    
    
	
    <div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="font-family:Arial, Helvetica, sans-serif; padding:6px; margin-right:10px; font: 12px Arial, Helvetica, sans-serif; font-weight: bold;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Exportar para CSV</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-envelope"></i> Enviar Mensagem</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" rel="bt_excluirDepartamento" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="bt_addSuporteDepartamento"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>

<div id="precosDominios">
	<?php if($departamentos == NULL){?>
    
    <!-- Caso não exista nenhum registro ************************************************* -->
    <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
        <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:350px;">
            <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
            <b style="float:left; font-weight:normal; margin-top:5px;">
                Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">departamentos</font> no sistema.
            </b>
        </div>
    </div>
    <!-- Caso não exista nenhum registro ************************************************* -->
    <?php }else{?>
	<div id="users-contain" class="ui-widget">
    <form id="form_selectDepartamentos" name="formulario" method="post" action="">
		<table width="100%" id="suporte_departamentos" class="ui-widget ui-widget-content dataTable display">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="25%">Descrição</th>
                <th width="30%">E-mail</th>
                <th width="20%">Grupo de Usuários</th>
                <th width="14%">Privacidade</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach($departamentos as $key =>$depto):
			
        		if($key % 2){
					echo '<tr class="td_line_alter">';
				}else{
					echo '<tr class="td_line">';
				}
				$grupo = $this->users->get_grupo($depto->GRUPO_USUARIOS);
			?>
                <td><input type='checkbox' id='item' name='item[]' value='<?=$depto->CODIGO?>' /></td>
                
                <td><b><a rel='ver_suporteDepartamento' data-id="<?=$depto->CODIGO?>"><?=$depto->DESCRICAO?></a></b></td>
                <td><?=$depto->EMAIL?></td>
                <td><?=$grupo->DESCRICAO?></td>
                <td>
                <?php
					switch($depto->PRIVACIDADE){
						case 'publico': echo "<i class='icon-globe'></i>Público"; break;
						case 'privado': echo "<i class='icon-user'></i>Privado"; break;
					}
				?>
                </td>
             </tr>
		<?php endforeach;?>
             
             
        </tbody>
        
    </table>
    </div>
    <?php }?>
    </form>
</div><!--precosDominios-->

<!-- pop-up de operações -->
<div id="pop_suporteDepartamento"></div>
<div id="pop_addDepartamento"></div>
