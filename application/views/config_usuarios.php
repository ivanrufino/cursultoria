<?php $this->load->view('json/config');?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b><?=$nome_pagina?></b>
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
              <li><a tabindex="-1" rel="deleteUsuarios" style="font-size:12px; color:#b54646"><i class="ico-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="usuarioAdd"><i class="ico-plus"></i> Novo Usuário</a>
         </div>
		
    </div>
</div>

<div id="precosDominios">
	<?php if($usuarios == NULL){?>
    
    <!-- Caso não exista nenhum registro ************************************************* -->
    <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
        <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:350px;">
            <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
            <b style="float:left; font-weight:normal; margin-top:5px;">
                Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">usuários</font> no sistema.
            </b>
        </div>
    </div>
    <!-- Caso não exista nenhum registro ************************************************* -->
    <?php }else{?>
    <form class="form_selectUsuarios" name="formulario" method="post" action="">
	<div id="users-contain" class="ui-widget">
		<table width="100%" id="users" class="ui-widget ui-widget-content dataTable display">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="25%">Nome</th>
                <th width="30%">E-mail</th>
                <th width="20%">Permissão</th>
                <th width="14%">Status</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $key =>$user):
        		if($key % 2){
					echo '<tr class="td_line_alter">';
				}else{
					echo '<tr class="td_line">';
				}
			?>
                <td><input type='checkbox' id='item' name='item[]' value='<?=$user->CODIGO?>' /></td>
                
                <td>
                    <b><a rel='verUsuario' data-id="<?=$user->CODIGO?>">
                        <img src="<?="http://www.gravatar.com/avatar/". md5(strtolower(trim( $user->USUARIO ))) ."?d="."&s=35";?>" width="35" />
                        
                        <?=$user->NOME?>
                    </a></b>
                </td>
                <td><?=$user->USUARIO?></td>
                <td>
				<?php
					switch($user->PERMISSAO){
						case 'admin': 	 echo 'Administrador'; break;
						case 'usuario': echo 'Operador'; break;
					}
				?>
                </td>
                <td>
                <?php
					switch($user->STATUS){
						case 0: echo '<p class="tag_red">Inativo</p>'; break;
						case 1: echo '<p class="tag_green">Ativo</p>'; break;
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
<div id="pop_usuario"></div>
<div id="pop_addUsuario"></div>
