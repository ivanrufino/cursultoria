
<?php $this->load->view('json/default');?>
<?php $this->load->view('json/config');?>
<?php require('assets/scripts.php'); ?>

<script type="text/javascript">

$(function () {
    var chart;
		
		
		
        chart = new Highcharts.Chart({
            chart: {
				width: $("#mainframe").width() / 2 - 15,
                renderTo: 'container2',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Imprimir / Salvar'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
			exporting: {
				enabled: false
			},
			credits: {
				enabled: false
			},
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Status',
                data: [
					['Web <br/>',25],
					['E-mail', 25],
                    ['Média',       25],
                    ['Banco',  25],
                    ['Livre',  25],
                ]
            }]
        });
    
    var chart2;
        chart2 = new Highcharts.Chart({
            chart: {
				width: $("#mainframe").width() / 2 - 15,
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
			exporting: {
				enabled: false
			},
			credits: {
				enabled: false
			},
            title: {
                text: 'Imprimir / Salvar'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },

            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Status',
                data: [
					['Livre <br/>',30],
					['Ocupado', 70],
                ]
            }]
        });
    
});

</script>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <?=$nome_pagina?></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
	<div id="tit_session"><?=$nome_pagina?></div>
          <table style="display:block; ">
            <tr>
              <td><div id="container2"></div></td>
              <td><div id="container"></div></td>
            </tr>
          </table>
          
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
          <!-- ********************************************************************* -->
          <div class="well well-large">
            <b style="display:block; overflow:auto; padding-bottom:10px; margin-bottom:10px; border-bottom: 1px dotted; red;">Legenda</b>
  				  <ul>
              <li><b>Alocado</b> - Espaço configurado para utilização do domínio</li>
              <li><b>Virtual</b>  - Espaço configurado para visualização no painel de controle de clientes</li>
              <li><b>Ocupado</b>  - Espaço ocupado atualmente no FTP do cliente (atualização diária)</li>
              <li><b>Média</b>  - Média de espaço ocupado nos últimos 30 dias</li>
              <li><b>% Ocupado</b>  - Percentual do espaço ocupado / espaço alocado</li>
              <li><b> % Virtual</b>  - Percentual do espaço virtual / espaço alocado</li>
              <li><b>% Média</b>  - Percentual do espaço médio dos últimos 30 dias / espaço alocado</li>
            </ul>
          </div> <!--./well well-large -->
        </div> <!--./accordion-inner -->
     			</div><!--./accordion-body collapse in -->
   			</div> <!-- ./accordion-group -->
		</div>
        <div class="accordion-group" style="margin-bottom: 0px;">
     		<div class="accordion-heading">
        		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
        			Relatório de consumo de tráfego
        		</a>
      		</div>

			<div id="collapse2" class="accordion-body collapse">
          <div class="accordion-inner" >
            <table class="table table-bordered table-striped" >
              <thead>
                <tr bgcolor="#d8dde1">
                  <th><i class="icon-globe"></i> Domínio</th>
                  <th colspan="5"><i class="icon-random"></i> TRÁFEGO</th>
                </tr>
                <tr bgcolor="#edeeef">
                  <th></th>
                  <th>Alocado</th>
                  <th>Atual</th>
                  <th>Projeção</th>
                  <th>% Utilizado</th>
                  <th>% Projeção</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>alfaunlock.com.br</td>
                  <td>2,93 Gb</td>
                  <td>126,59 Mb	</td>
                  <td>135,63 Mb</td>
                  <td>4,22</td>
                  <td>4,52</td>
                </tr>
                <tr>
                  <td>google.com.br</td>
                  <td>2,93 Gb</td>
                  <td>1226,59 Mb</td>
                  <td>1 GB</td>
                  <td>6,22</td>
                  <td>1,2</td>
                </tr>
                <tr>
                  <td>facebook.com.br</td>
                  <td>6,93 Gb</td>
                  <td>526,59 Mb</td>
                  <td>212 Mb</td>
                  <td>2,22</td>
                  <td>3,6</td>
                </tr>
                <tr bgcolor="#edeeef">
                  <td><b>Total</b></td>
                  <td>6,93 Gb</td>
                  <td>526,59 Mb</td>
                  <td>120 Mb</td>
                  <td>7,1</td>
                  <td>6,1</td>
                </tr>
                <tr>
                  <td class="cinzaEscuro"><b>Média</b></td>
                  <td class="cinzaEscuro">6,93 Gb</td>
                  <td class="cinzaEscuro">526,59 Mb</td>
                  <td class="cinzaEscuro">1,3 Gb</td>
                  <td class="cinzaEscuro">9.2</td>
                  <td class="cinzaEscuro">9,5</td>
                </tr>
              </tbody>
            </table>
            <div class="well well-large">
              <b style="display:block; overflow:auto; padding-bottom:10px; margin-bottom:10px; border-bottom: 1px dotted; red;">Legenda</b>
              <ul>
                <li><b>Alocado</b> - Tráfego configurado para utilização do domínio</li>
                <li><b>Atual</b>  - Tráfego utilizado até o momento (atualização diária)</li>
                <li><b>Projeção</b>  - Cálculo estimado para o final deste mês</li>
                 <li><b>% Utilizado</b>  - Percentual do espaço utilizado / tráfego alocado</li>
                 <li><b>% Projeção</b>  - Percentual da projeção / tráfego alocado/li>
              </ul>
            </div> <!-- ./well well-large" -->
          </div> <!-- ./accordion-inner -->
        </div><!-- ./collapse2 -->        
        </div>
<!-- pop-up de operações -->
<div id="pop_trocaLogo"></div>
<div id="add_view"></div>