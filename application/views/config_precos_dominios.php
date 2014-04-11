<?php $this->load->view('json/config');?>

<div class="breadcumb borda5px">
	<!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
    <a onClick="getURL('configuracoes/geral');">Painel de Controle</a> &raquo; <b>Preços de Domínios</b>
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
              <li><a tabindex="-1" rel="deleteDominios" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" rel="dominioAdd"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div>

<div id="precosDominios">
	<?php if($dominios == NULL){?>
    
    <!-- Caso não exista nenhum registro ************************************************* -->
    <div align="center" style="border:1px dotted #ddd; padding:10px; overflow:auto;">
        <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:350px;">
            <img src="<?=site_url()?>/assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
            <b style="float:left; font-weight:normal; margin-top:5px;">
                Ainda não existem <font style="text-transform:lowercase; font-weight:bold;">domínios</font> à venda no sistema.
            </b>
        </div>
    </div>
    <!-- Caso não exista nenhum registro ************************************************* -->
    <?php }else{?>
	<div id="users-contain" class="ui-widget">
    <form class="form_selectDominios" name="formulario" method="post" action="">
		<table width="100%" id="precos_dominios" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="1%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="1%">&nbsp;&nbsp;</th>
                <th width="15%">Extensão</th>
                <th width="10%">Custo</th>
                <th width="12%">Preço</th>
                <th width="14%">Registrante</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach($dominios as $key =>$dominio):
        		if($key % 2){
					echo '<tr class="td_line_alter">';
				}else{
					echo '<tr class="td_line">';
				}
			?>
                <td><input type='checkbox' id='item' name='item[]' value='<?=$dominio->CODIGO?>' /></td>
                <td align="center"><img style="cursor: move;" src="<?=site_url()?>/assets/img/icons/icon_flip_vertical2.png" /></td>
                <td><b><a rel='detalheDominio' id='<?=$dominio->CODIGO?>'> <?=$dominio->EXTENSAO?></a></b></td>
                <td>R$ <?=numFormat($dominio->VALOR_CUSTO)?></td>
                <td>R$ <?=numFormat($dominio->VALOR_REGISTRAR)?></td>
                <td>
				<?php
                switch($dominio->REGISTRANTE){
					case 'manual'	   : echo "** MANUAL **"; break;
					case 'resellerclub': echo "ResellerClub"; break;
					case 'resellbiz'   : echo "Resell.biz"; break;
					case 'enom'		   : echo "eNom"; break;
					case 'opensrs'	   : echo "OpenSRS"; break;
					case 'godaddy'	   : echo "GoDaddy"; break;
				}?>
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
<div id="pop_detalheDominio"></div>
<div id="pop_addDominio"></div>
