
<?php $this->load->view('json/default');?>
<?php $this->load->view('json/config');?>
<?php require('assets/scripts.php'); ?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
	<div id="tit_session"><?=$nome_pagina?></div>
<!-- ********************************************************************* -->
         	<div class="admin_list_table">
                <!-- Form de Selecionados -->
                <div style="float:left; width:300px; padding-top:10px">           
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                </div>
                <div id="data_relatorio"> 
                	<input class="datepicker" style="width:100px;" type="date" name="DATA_INICIO" /> 
                   até 
                	<input class="datepicker" style="width:100px;" type="date" name="DATA_FIM" /> 
               
                   <div class="btn-group" style=" margin-left:10px;">
                      <button class="btn">Dia</button>
                      <button class="btn">Semana</button>
                      <button class="btn">Mês</button>
                    </div>
               
               </div>
               
                <div id="users-contain" class="ui-widget">
                    <table width="100%" id="list_cadastros" class="ui-widget ui-widget-content">
    
                        <thead>
                            <tr class="ui-widget-header">
                                <th width="1%"></th>
                                <th width="30%"><i class="icon-globe"></i> Domínio</th>
                                <th width="10%">Alocado</th>
                                <th width="8%">Virtual</th>
                                <th width="11%">Ocupado</th>
                                <th width="8%">Média</th>
                                <th width="11%">% Ocupado</th>
                                <th width="12%">% Virtual</th>
                                <th width="10%">% Média</th>
                            </tr>
                        </thead>
                        <tbody>        
                        <?php /*
                        if($lista_cadastros == NULL){?>
                            <tr class="td_line">
                                <td colspan="8" height="30" align="center">
                                    <div style="font:14px Tahoma, Arial; color:#666; overflow:auto; text-align:center; width:360px;">
                                        <img src="<?=site_url()?>assets/img/icons/32x32/info2.png" style=" float:left; margin-right:5px;">
                                        <b style="float:left; font-weight:normal; margin-top:5px;">
                                            Ainda não existem <font style="text-transform:lowercase; font-weight:bold;"><?=$nome_pagina?></font> no seu sistema.
                                        </b>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            
                        }else{*/
                            for($key =0; $key < 10; $key++){
                            
                            if($key % 2){
                                echo '<tr class="td_line_alter">';
                            }else{
                                echo '<tr class="td_line">';
                            }
                            
                            
                        ?>
                        
                            <label for="item">
                              <td><input type="checkbox" id="item" name="item[]" value="CODIGO" /></td>
                                <td>
                                    <a id="CODIGO" rel="exibeCliente">
                                        google.com.br
                                    </a>
                                </td>
    
                                <td> 251,2 Mb</td> <!--Alocado-->
                                <td>253,Gb</td><!--Virtual-->
                                <td>236,9 Mb</td><!--Ocupado-->
                                <td>14,2</td><!--Média-->
                                <td>12%</td><!--% Ocupado-->
                                <td>16/04/2012</td><!--% Virtual-->
                                <td>25</td><!--% Média-->
                            </label>
                            
                          </tr>
                        <?php }?>
							<tr>
								<th></th>
                                    <th><b> Total: </b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                    <th align="center"><b>120 Gb</b></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th><b> Média:  </b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                    <th align="center"><b>500 Gb</b></th>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <?=form_close();?>
                <!-- ./Form de Selecionados -->
            </div>
	
</div>
<!-- pop-up de operações -->
<div id="pop_trocaLogo"></div>
<div id="add_view"></div>